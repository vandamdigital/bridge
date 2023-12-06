set :stage, :staging

# Extended Server Syntax
# ======================

server "web0080.zxcs.nl", user: "u52612p61907", port: "", roles: %w{web app db}
set :deploy_to, "/domains/developmentzone.nl/public_html/bridge"
set :wpcli_remote_url, 'bridge.developmentzone.nl'
set :wpcli_local_url, 'bridge.test'
set :tmp_dir, '/domains/developmentzone.nl/tmp'
set :keep_releases, 2

current_branch = `git branch`.match(/\* (\S+)\s/m)[1]
set :branch, current_branch

# you can set custom ssh options
# it's possible to pass any option but you need to keep in mind that net/ssh understand limited list of options
# you can see them in [net/ssh documentation](http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start)
# set it globally
set :ssh_options, {
  auth_methods: %w(publickey),
  user: 'u52612p61907',
}

fetch(:default_env).merge!(wp_env: :staging)