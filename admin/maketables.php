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
 srclang1 varchar(200),
 srclang2 varchar(200),
 srclang3 varchar(200),
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
 clientID VARCHAR(30) NOT NULL,
 projno	varchar(20) NOT NULL,
 indate varchar(20),
 duedate varchar(20),
 outdate varchar(20),
 invdate varchar(20),
 units INT,
 rate decimal(5,2),
 payouts decimal(5,2),
 price decimal(5,2),
 currency varchar(10),
 paidate varchar(20),
 addcharges decimal(9,2),
 totpaidout decimal(9,2),
 totreceived decimal(9,2),
 grossprofit decimal(9,2),
 estax decimal(9,2),
 netprofit decimal(9,2)")
 or die(mysql_error());  

echo "Projects Table Created!";

mysql_query("CREATE TABLE docs(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
 projectno varchar(20),
 docname varchar(30),
 units INT,
 srclang varchar(5),
 targlangs varchar(10),
 notes varchar(500),
 notrans INT)")
 or die(mysql_error());

echo "Documents Table Created!";

mysql_query("CREATE TABLE assign(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
  projectno varchar(20),
  provider varchar(20),
  units INT,
  rate  decimal(5,2),
  provcost decimal(5,2),
  assdate DATE,
  deldate DATE,
  invdate DATE,
  paidate DATE)")
  or die(mysql_error());

echo "Assignments Table Created!";

mysql_close();
?>
