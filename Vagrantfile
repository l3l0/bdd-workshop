# http://vagrantup.com/v1/docs/vagrantfile.html

Vagrant::Config.run do |config|
  config.vm.box = "quantal64"
  config.vm.box_url = "https://github.com/downloads/roderik/VagrantQuantal64Box/quantal64.box"

  config.vm.network :hostonly, "33.33.33.10"

  config.vm.customize ["modifyvm", :id, "--memory", 1024]

  # config.vm.share_folder "symfony", "/home/vagrant/symfony", ".", :nfs => true

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = ".puppet/manifests"
    puppet.module_path = ".puppet/modules"
    puppet.manifest_file  = "symfony-standard-dev.pp"
  end
end
