set :stage, :development

# Extended Server Syntax
# ======================
server "bridge.developmentzone.nl", user: "enabl", port: "6811", roles: %w{web app db}
set :deploy_to, "/home/enabl/PROJECTNAAM.dev.enabl.nl"
set :wpcli_remote_url, 'bridge.dev.enabl.nl'
set :wpcli_local_url, 'bridge.test'
set :wpcli_rsync_options, '-avz -e "ssh -p 6811"'
set :tmp_dir, '/home/enabl/PROJECTNAAM.dev.enabl.nl/tmp'
set :keep_releases, 1

# parses out the current branch you're on. See: http://www.harukizaemon.com/2008/05/deploying-branches-with-capistrano.html
current_branch = `git branch`.match(/\* (\S+)\s/m)[1]

# use the branch specified as a param, then use the current branch. If all fails use master branch
set :branch, current_branch

# you can set custom ssh options
# it's possible to pass any option but you need to keep in mind that net/ssh understand limited list of options
# you can see them in [net/ssh documentation](http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start)
# set it globally
set :ssh_options, {
  auth_methods: %w(publickey),
  user: 'enabl',
}

fetch(:default_env).merge!(wp_env: :development)
