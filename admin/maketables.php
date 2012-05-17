<?php
// create tables for transprocloud database
// run this ONLY ONCE, after install
// make sure first you have created your db

include 'config.php';

// Make a MySQL Connection
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());

// Create a MySQL table in the selected database
mysql_query("CREATE TABLE providers(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 name VARCHAR(100),
 natlang varchar(5),
 srclangs varchar(200),
 street varchar(200),
 city varchar(100),
 state varchar(100),
 country varchar(20),
 zip varchar(20),
 email varchar(200),
 website varchar(200),
 notes varchar(500))")
 or die(mysql_error());  

echo "Providers Table Created!";

mysql_query("CREATE TABLE clients(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 name VARCHAR(100),
 street varchar(200),
 city varchar(20),
 state varchar(20),
 country varchar(20),
 bcountry varchar(20),
 zip varchar(20),
 email varchar(200),
 website varchar(200),
 provsys varchar(200),
 notes varchar(500))")
 or die(mysql_error());  

echo "Clients Table Created!";

mysql_query("CREATE TABLE projects(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 client VARCHAR(30),
 indate varchar(20),
 dudate varchar(20),
 outdate varchar(20),
 invdate varchar(20),
 srclangs varchar(20),
 targlangs varchar(200),
 docs varchar(500),
 units INT,
 rate INT,
 payouts INT,
 price INT,
 currency varchar(10),
 paidate varchar(20),
 addcharges INT,
 providers varchar(500),
 website varchar(20))")
 or die(mysql_error());  

echo "Projects Table Created!";

mysql_close();
?>
