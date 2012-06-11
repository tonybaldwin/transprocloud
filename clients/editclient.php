<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" title="Orig" href="../main.css" media="screen,projection" />
<meta name="Author" content="Anthony Baldwin" />
<title>TransProCloud</title>
</head>
<body>
<!-- transprocloud index --!>
<?php
include '../templates/header.php';
include '../admin/config.php';
include '../templates/navbar.php';
?>

<div id="main">

<?php
$clinick = isset($_GET['clinick']) ? htmlentities($_GET['clinick']) : false;
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (isset($clinick)) {
$query  = "SELECT * FROM clients where clinick = \"$clinick\"";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	$id = $row['id'];
	$name = $row['name'];
	$clinick = $row['clinick'];
	$street = $row['street'];
	$city = $row['city'];
	$country = $row['country'];
	$zip = $row['zip'];
	$email = $row['email'];
	$website = $row['website'];
	$provsys = $row['provsys'];
	$notes = $row['notes'];
	$state = $row['state'];
}
echo "<h4>Client Links:</h4>
<ul><li>ID: $id, Name: $name, Nick: $clinick</li>
<li>website: <a href=\"$website\">$website</a></li>
<li>provider portal: <a href=\"$provsys\">$provsys</a></li>
<li>projects: <a href=\"$url/projects/clist.php?clientid=$clinick\">$name projects</a></li>
</ul><hr />";


echo "<h4>Edit Client:</h4>
<form action=\"editclient.php?name=$name\" method=\"post\">
	<input type=text name=name value=\"$name\"></input>
	<input type=text name=clinick value=\"$clinick\"></input>
	<input type=text name=street value=\"$street\"></input>
	<input type=text name=city value=\"$city\"></input>
	<input type=text name=state value=\"$state\"></input>
	<input type=text name=country value=\"$country\"></input>
	<input type=text name=zip value=\"$zip\"></input>
	<input type=text name=website value=\"$website\"></input>
	<input type=text name=email value=\"$email\"></input>
	<input type=text name=provsys value=\"$provsys\"></input>
	<input type=text name=notes size=100 value=\"$notes\"></input>
	<input type=\"hidden\" name=\"act\" value=\"post\"></input>
	<input type=submit name=\"submit\" value=\"Submit\"></input>
</form>";
}

mysql_close();


$act = $_POST['act'];
if($act == "post") {
	$name = $_POST['name'];
	$clinick = $_POST['clinick'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$website = $_POST['website'];
	$email = $_POST['email'];
	$provsys = $_POST['provsys'];
	$notes = $_POST['notes'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die(mysql_error());
	$query="UPDATE clients SET name='$name', clinick='$clinick', street='$street', city='$city', country='$country', zip='$zip', email='$email', website='$website', provsys='$provsys', notes='$notes', state='$state' WHERE id = '$id'";
	mysql_query($query) or die('Error, insert query failed');	
	mysql_close();
	echo "<h4>Client updated.</h4> <p><a href=\"editclient.php?clinick=$clinick\">Refresh page to verify results</a>.</p>";
    }
?>

</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
