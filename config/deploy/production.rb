set :stage, :production

# Extended Server Syntax
# ======================

# SSHKit.config.command_map[:composer] = "/usr/local/php72/bin/php /usr/bin/composer"

server "", user: "", port: "", roles: %w{web app db}
set :deploy_to, ""
set :wpcli_remote_url, ''
set :wpcli_local_url, ''
set :keep_releases, 2
set :branch, 'master'

# you can set custom ssh options
# it's possible to pass any option but you need to keep in mind that net/ssh understand limited list of options
# you can see them in [net/ssh documentation](http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start)
# set it globally
set :ssh_options, {
  auth_methods: %w(publickey),
  user: '',
}

fetch(:default_env).merge!(wp_env: :production)
