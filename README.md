#QR Scavenger Hunt

##Application Login Credentials
###Normal User:
Phone Number(used as username):01536478832
Password:password

###Administrator:
Username: foobar
Password: fubar

##Managing The Application
To add other administrators, or peices of treasure, simply visit:
http://servername/admin/login
and sign in with the Administrator account listed above. Adding other Administrators will give them access to this area of the application. If you installed this application in a subdirectory named "treasurehunt" on the server domain.com, you should use the following URL:
http://domain.com/treasurehunt/admin/login

##The Database Dump
Also included with this application is a mysqldump of a working database. Please upload this to your database server and ensure the database credentials in application/config/database.php match those of your database.

##EU Cookie Compliancy
Since this applicaiton was developed within the EU it is fully compliant with EU cookie laws. If you wish to remove this functionality, then you can also turn it off in the Admin Panel - however - the JavaScript can be found in application/views/templates/template.php 