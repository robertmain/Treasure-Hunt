# QR Scavenger Hunt

## Application Login Credentials

### Normal User

Phone Number(used as username): `01536478832`
Password: password

### Administrator

Username: foobar
Password: fubar

## Managing The Application

To add other administrators, or pieces of treasure, simply visit:
[http://servername/admin/login](http://servername/admin/login) and sign in with the Administrator account listed above.
Adding other Administrators will give them access to this area of the application.

If you installed this application in a subdirectory named `treasurehunt` on the server `domain.com`, you should use
the following URL: [http://domain.com/treasurehunt/admin/login](http://domain.com/treasurehunt/admin/login)

## The Database Dump

Also included with this application is a mysqldump of a working database. Please upload this to your database server and ensure the database credentials in application/config/database.php match those of your database.

## EU Cookie Compliancy

Since this applicaiton was developed within the EU it is fully compliant with EU cookie laws. If you wish to remove this functionality, then you can also turn it off in the Admin Panel - however - the JavaScript can be found in application/views/templates/template.php

## Composer Scripts

Composer scritps have also been provided to help manage the development of the application. These are:

- `test:models` - Test the application models
- `test:controllers` - Test the application controllers
- `test` - Test models and controllers
- `docs` Generate php docs from the models and controllers
- `migrate:latest` - Run the latest database migration and upgrade the database to the latest version
- `migrate:flush` - Drop the entire database and re-create it. For safety reasons, the application will raise an exception if asked to drop it's database in a production environment
