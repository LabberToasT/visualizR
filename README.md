- Apache config:
* Pfad zur Startseite in der httpd.conf ändern
DocumentRoot "C:/xampp/htdocs" -> DocumentRoot "C:/Users/user/Desktop/visualizR"
<Directory "C:/xampp/htdocs"> -> <Directory "C:/Users/user/Desktop/visualizR">

- config für die DB: 

* Name der Datenbank: visualizr
* Name der Tabelle: berlin_elections

- falls neue Dependencies gebraucht: install composer und composer update