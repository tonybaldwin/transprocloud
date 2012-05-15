<?php
// create tables for transprocloud database
// run this ONLY ONCE, after install
// make sure first you have created your db

include 'config.php';

// Make a MySQL Connection
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());

// Create a MySQL table in the selected database
$provtable = mysql_query("CREATE TABLE providers(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 name VARCHAR(30),
 natlang varchar(2),
 srclangs varchar(20),
 streetno INT,
 street varchar(20),
 city varchar(20),
 country varchar(20),
 zip varchar(20),
 email varchar(20),
 sitelink varchar(20))")
 or die(mysql_error());  

echo "Providers Table Created!\n";

$clitable = mysql_query("CREATE TABLE clients(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 name VARCHAR(30),
 streetno INT,
 street varchar(20),
 city varchar(20),
 country varchar(20),
 zip varchar(20),
 email varchar(20),
 sitelink varchar(20),
 provsys varchar(20),
 notes varchar(500))")
 or die(mysql_error());  

echo "Clients Table Created!\n";

$projtable = mysql_query("CREATE TABLE projects(
id INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id),
 client VARCHAR(30),
 indate varchar(2),
 srclangs varchar(20),
 streetno INT,
 street varchar(20),
 city varchar(20),
 country varchar(20),
 zip varchar(20),
 email varchar(20),
 sitelink varchar(20))")
 or die(mysql_error());  

echo "Projects Table Created!\n";

?>
