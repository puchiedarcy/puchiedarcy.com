puchiedarcy.com

1. Fresh install of Ubuntu 10.04.2 LTS

    If on local Virtual Box VM:
    1a. Install Guest Additions
    1b. Create Shared Folder
        1bi.   Create shared folder in virtual box; make permanent
        1bii.  Create folder in home
        1biii. Edit rc.local: sudo mount -t vboxsf puchiedarcy.com /home/puchie/puchiedarcy.com
        1biv.  Reboot VM
        
2. Install Apache2

    2a. Install Apache 2: sudo apt-get install apache2
    2b. Create Symlink: sudo ln -s /home/puchie/puchiedarcy.com/web/ /srv/puchiedarcy.com
    2c. Set default apache config: /etc/apache2/sites-available/default
    2d. Enable mod_rewrite: sudo /usr/sbin/a2enmod rewrite
    2e. Restart apache: sudo /etc/init.d/apache2 restart
    
    If on local Virtual Box VM:
    2f. Port forward guest :80 to host :8080 under network adapters
    
3. Install PHP5

    3a. Install PHP5: sudo apt-get install php5
    3b. Stop and Start Apache2 (not restart!)
    
4. Install mysql

    4a. Install mysql: sudo apt-get install mysql-server
    4b. Install php5-mysql connector: sudo apt-get install php5-mysql
    4c. Make database and user: GRANT ALL PRIVILEGES ON mydb.* TO 'myuser'@'localhost' IDENTIFIED BY 'mypassword';
    4d. Restart apache.
