# QR Scavenger Hunt

## Getting Started

1. Clone the application using either Git or Http
1. Update `./.env` with your database server credentials
1. Run `docker-compose up` to bring the application up using docker compose(you will need to install docker/docker compose first)
1. Run `composer run-script migrate:latest`(if you run the application as a docker container this will need to be run in the context of the docker-container using `docker exec <container name here> composer run-script migrate:latest`). See "Composer Scripts" below for the full list of composer commands that can be run

## Application Login Credentials

<table>
  <tr>
    <th colspan="2">Normal User</th>
  </tr>
  <tr>
    <td>Phone number (used as username)</td> <td><code>01536478832</code></td>
  </tr>
  <tr>
    <td>Password</td> <td><code>password</code></td>
  </tr>
  <tr>
    <th colspan="2">Administrative User</th>
  </td>
  <tr>
    <td>Username</td> <td><code>foobar</code></td>
  </tr>
  <tr>
    <td>Password</td> <td><code>fubar</code></td>
  </tr>
</table>

## Managing The Application

To add other administrators, or pieces of treasure, simply visit: `http://APP_URL/admin/login` and sign in with the Administrator account listed above.
Adding other Administrators will give them access to this area of the application.

## EU Cookie Compliancy

Since this applicaiton was developed within the EU it is fully compliant with EU cookie laws. If you wish to remove this functionality, then you can also turn it off in the Admin Panel.

## Composer Scripts

- `test:models` - Test the application models
- `test:controllers` - Test the application controllers
- `test` - Test models and controllers
- `docs` Generate php docs from the models and controllers
- `migrate:latest` - Run the latest database migration and upgrade the database to the latest version
- `migrate:flush` - Drop the entire database and re-create it. For safety reasons, the application will raise an exception if asked to drop it's database in a production environment
