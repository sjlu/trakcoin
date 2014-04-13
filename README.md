## Trakcoin

Google Finance but for cryptocurrencies like Bitcoin.

### Install

* Make sure you have [VirtualBox](https://www.virtualbox.org/wiki/Downloads) and [Vagrant](http://www.vagrantup.com/downloads.html) installed.

* In the root directory of your project, run this command to instantiate VM instance.

        vagrant up

* After the machine is running, you can login to your VM.

        vagrant ssh

    * While in the VM, you may find these commands useful.

        * To browse MySQL

                mysql -u root -d workouts

        * To migrate and/or seed your database.

                cd public_html/workouts
                php artisan migrate
                php artisan db:seed

        * To start Grunt (frontend resource compiler).

                cd public_html/workouts
                grunt watch

* You can now view your local instance at [localhost:8080](http://localhost:8080).
