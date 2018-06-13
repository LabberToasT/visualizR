
# visualizR How-Tos for Devs
This document serves as guidelines for fellow devs who want to carry on the
great quest that is developing visualizR.

Authors:
@ChristianSchulz
@LucasReich
@AgnèsGresset

## XAMPP/Apache config:

- Start the XAMPP Server and modify its httpd.conf data text by replacing following information:
```
shell
DocumentRoot "C:/xampp/htdocs"
```
should be replaced with

```
shell
DocumentRoot "C:/Users/user/Desktop/visualizR"
```

```
shell
<Directory "C:/xampp/htdocs">
```
should be replaced with

```
shell
<Directory "C:/Users/user/Desktop/visualizR">
```

## Database Configurations

### Create a database "visualizr"
Once the server has been launched, create a new database in the phpMyAdmin section of XAMPP.
Use following credentials for this purpose:
- Database name: visualizr
- Database password: contact our sysadmin

### Import data into the new Database

- In the visualizr project, you will find an sql file "berlin_elections.sql".
Import this file into phpMyAdmin. A table "berlin_elections" should be visible in the database visualizr.

### Updating library dependencies

- To install or update library dependencies, install composer locally. See:
* https://getcomposer.org/download/
- To install new or update existing components and their dependencies:
```
shell
composer install
```
or

```
shell
composer update
```

Triumvirat GmbH @ 2018
