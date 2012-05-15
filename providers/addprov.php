<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" title="Orig" href="../main.css" media="screen,projection" />
<meta name="Author" content="Anthony Baldwin" />
<title>TransProCloud</title>
</head>
<body>

<?php
include '../templates/header.php';
include '../admin/config.php';
include '../templates/navbar.php';
?>

<div id="main">
<h4>Add Provider:</h4>

<form action="addprov.php" method="post">
	<input type=text name=name value="provider name"></input>
	<input type=text name=street value="street"></input>
	<input type=text name=city value="city"></input>
	<input type=text name=state value="state or province"></input>
	<input type=text name=country value="country"></input>
	<input type=text name=zip value="zip or postal code"></input>
	<input type=text name=email value="email"></input>
	<input type=text name=website value="website or profile"></input>
	<input type=text name=natlang value="native tongue"></input>
	<input type=text name=srclangs value="source languages"></input>
	<input type=text name=notes size=100 value="notes"></input>
	<input type="hidden" name="act" value="post"></input>
	<input type=submit name="submit" value="Submit"></input>
</form>

<?php
$act = $_POST['act'];
if($act == "post") {
	$name = $_POST['name'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$website = $_POST['website'];
	$email = $_POST['email'];
	$natlang = $_POST['natlang'];
	$srclangs = $_POST['srclangs'];
	$notes = $_POST['notes'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die(mysql_error());
	$query="INSERT INTO providers (name, street, city, state, country, zip, email, website, natlang, srclangs, notes) VALUES('$name', '$street', '$city', '$state', '$country', '$zip', '$email', '$website', '$natlang', '$srclangs', '$notes')";
	mysql_query($query) or die('Error, insert query failed');	
	mysql_close();
    }
?>

</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>