# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  # All Vagrant configuration is done here. The most common configuration
  # options are documented and commented below. For a complete reference,
  # please see the online documentation at vagrantup.com.
  # https://docs.vagrantup.com/v2/vagrantfile/machine_settings.html

  config.vm.box = "centos65_x86_64"
  config.vm.box_url = "https://github.com/2creatives/vagrant-centos/releases/download/v6.5.3/centos65-x86_64-20140116.box"

  # config.vm.box_check_update = false
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.network "forwarded_port", guest: 8080, host: 8081
  #config.vm.network "private_network", ip: "192.168.33.10"
  # config.vm.network "public_network"
  config.vm.hostname = "md-micro-wiki"

  config.vm.synced_folder "./", "/vagrant",
                          :owner => "vagrant", :group => "vagrant",
                          :mount_options => ["dmode=777,fmode=777"]

  # config.ssh.forward_agent = true
  # config.vm.synced_folder "../data", "/vagrant_data"

  config.vm.provision :shell, :path => "vagrant/provision.sh"

end
