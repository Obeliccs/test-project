# -*- mode: ruby -*-
# vi: set ft=ruby :

#REQUIRED:
#vagrant plugin install vagrant-hostsupdater

#Vagrantfile API/syntax version. Don't touch unless you know what you're doing!

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "ubuntu/trusty64"

    config.vm.provider "virtualbox" do |vb|
        vb.memory = 1024
        vb.cpus = 1
        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
      end

    config.vm.network :private_network, ip: "192.168.57.20"
    config.vm.hostname = "app"
    config.hostsupdater.aliases = ["app.int", "www.app.int"]

    config.vm.provision "shell", path: "./build/install-software.sh"
    config.vm.provision "shell", path: "./build/reload-configs.sh", run: "always"
end
