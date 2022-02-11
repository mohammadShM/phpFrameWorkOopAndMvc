$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
// for show in xampp ######################################################################################
1 = Write below code in httpd.conf
# For start phpMvc2 ========================================================================================
<VirtualHost 127.0.0.1:80>
	ServerName phpmvc2.devme
    DocumentRoot "C:\Users\MohammadShM\Desktop\ProjectMe\phpMvc2\public"
</VirtualHost>

<Directory "C:\Users\MohammadShM\Desktop\ProjectMe\phpMvc2\public">
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order Allow,Deny
    Allow From All
	Require all granted
</Directory>
# For end phpMvc2 ======================================================================================+
2 = change file System32 hosts
file write === 127.0.0.1      phpmvc2.devme       #Xampp magic! For Me ==================================
file address === C:\Windows\System32\drivers\etc ==>> for change hosts file
3 = site address
site name = http://phpmvc2.devme
$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
// create composer ########################################################################################
1 = create composer.json file
2 = composer install
