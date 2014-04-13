# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  # select box type and configure
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  config.vm.provider :virtualbox do |vb|
    vb.customize ["modifyvm", :id, "--memory", "512"]
  end

  # forward web ports
  config.vm.network "forwarded_port", guest: 80, host: 8080

  # sync the web folder
  config.vm.synced_folder "./", "/home/vagrant/public_html/trakcoin", :owner => "vagrant", :group => "www-data", :mount_options => ["dmode=775", "fmode=664"]

  # installer
  config.vm.provision "shell", path: "provision.sh", :keep_color => true
end
