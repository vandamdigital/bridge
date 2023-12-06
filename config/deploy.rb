set :application, 'vandamdigital'
set :repo_url, 'git@github.com:vandamdigital/bridge.git'

# Encoding
Encoding.default_external = 'UTF-8'

# Local domain for WP-CLI
set :wpcli_local_url, 'bridge.test'

# Branch options
# Prompts for the branch name (defaults to current branch)
#ask :branch, -> { `git rev-parse --abbrev-ref HEAD`.chomp }
# Hardcoded branch to always be master
# This could be overridden in a stage config file
set :branch, :master

# Apache users with .htaccess files:
# it needs to be added to linked_files so it persists across deploys:
set :linked_files, fetch(:linked_files, []).push('.env', 'web/.htaccess')
set :linked_dirs, fetch(:linked_dirs, []).push('web/app/uploads', 'web/app/cache', 'web/app/languages', 'log')

# The above restart task is not run by default
# Uncomment the following line to run it on deploys if needed
# after 'deploy:publishing', 'deploy:restart'

# Composer
set :composer_install_flags, '--no-interaction --quiet --ignore-platform-reqs'

namespace :deploy do
  desc 'Update WordPress template root paths to point to the new release'
  task :update_option_paths do
    on roles(:app) do
      within fetch(:release_path) do
        if test :wp, :core, 'is-installed'
          [:stylesheet_root, :template_root].each do |option|
            # Only change the value if it's an absolute path
            # i.e. The relative path "/themes" must remain unchanged
            # Also, the option might not be set, in which case we leave it like that
            value = capture :wp, :option, :get, option, raise_on_non_zero_exit: false
            if value != '' && value != '/themes'
              execute :wp, :option, :set, option, fetch(:release_path).join('web/wp/wp-content/themes')
            end
          end
        end
      end
    end
  end
end

namespace :deploy do
  desc 'Restart application'
  task :restart do
    on roles(:app), in: :sequence, wait: 5 do
      # Your restart mechanism here, for example:
      # execute :service, :nginx, :reload
    end
  end
end

# Setup theme_path and local_app_path
# Composer install for theme folder
# Build dist folder and upload to release
set :theme_path, Pathname.new('web/app/themes/sage')
set :local_app_path, Pathname.new(Dir.pwd)
set :local_theme_path, fetch(:local_app_path).join(fetch(:theme_path))

namespace :assets do
  desc 'Yarn install and compile assets locally'
  task :install do
    run_locally do
      within fetch(:local_theme_path) do
        execute :yarn
      end
    end
  end

  task :compile do
    run_locally do
      within fetch(:local_theme_path) do
        execute :yarn, 'build:production'
      end
    end
  end

  task :copy do
    on roles(:web) do
      upload! "#{fetch(:local_theme_path).join('public')}/", release_path.join(fetch(:theme_path)), recursive: true
    end
  end

  task deploy: %w(install compile copy)
end

before 'deploy:updated', 'assets:deploy'

# The above update_option_paths task is not run by default
# Note that you need to have WP-CLI installed on your server
# Uncomment the following line to run it on deploys if needed
# after 'deploy:publishing', 'deploy:update_option_paths'

time             = Time.new
backup_timestamp = time.strftime("%Y%m%d%H%M")

set :db_backup_file_name,        -> {"wpcli_db_backup.#{backup_timestamp}.sql.gz"}
set :local_db_folder_path,       -> {"./db_backups"}
set :local_db_folder_file_path,  -> {"./db_backups/#{fetch(:db_backup_file_name)}"}
set :remote_db_folder_path,      -> {"#{fetch(:deploy_to)}/db_backups"}
set :remote_db_folder_file_path, -> {"#{fetch(:deploy_to)}/db_backups/#{fetch(:db_backup_file_name)}"}

before 'wpcli:db:pull', :backup_local_db do
  run_locally do
    execute :mkdir, "-p", fetch(:local_db_folder_path)
    execute :wp, :db, :export, "- |", :gzip, ">", fetch(:local_db_folder_file_path)
  end
end

before 'wpcli:db:push', :backup_remote_db do
  on roles(:web) do
    within release_path do
      execute :mkdir, "-p", fetch(:remote_db_folder_path)
      execute :wp, :db, :export, "- |", :gzip, ">", fetch(:remote_db_folder_file_path)
    end
  end
end
