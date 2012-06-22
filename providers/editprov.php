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
$name = isset($_GET['name']) ? htmlentities($_GET['name']) : false;
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (isset($name)) {
$query  = "SELECT * FROM providers where name = \"$name\"";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	$id = $row['id'];
	$name = $row['name'];
	$street = $row['street'];
	$city = $row['city'];
	$country = $row['country'];
	$bcountry = $row['bcountry'];
	$zip = $row['zip'];
	$email = $row['email'];
	$website = $row['website'];
	$natlang = $row['natlang'];
	$srclang1 = $row['srclang1'];
	$srclang2 = $row['srclang2'];
	$srclang3 = $row['srclang3'];
	$rate = $row['rate'];
	$notes = $row['notes'];
	$state = $row['state'];
}
echo "<h4>Provider Links:</h4>
<ul><li>ID: $id, Name: $name</li>
<li>website: <a href=\"$website\">$website</a></li>
<li>e-mail: <a href=\"mailto:$email\">$email</a></li>
<li>languages: $srclang1, $srclang2, $srclang3 to  $natlang-$bcountry</li>
<li>rate: $rate</li>
<li>projects: <a href=\"$url/projects/pplist.php?name=$name\">$name projects</a></li>
</ul><hr />";


echo "<h4>Edit Provider:</h4>
<table border=\"0\" cellspacing=\"5\" cellpadding=\"2\"><tbody><tr><td>
<form action=\"editprov.php?name=$name\" method=\"post\">
	Name:</td><td> <input type=text name=name value=\"$name\"></input></td></tr>
	<tr><td>Street: </td><td><input type=text name=street value=\"$street\"></input></td></tr>
	<tr><td>City: </td><td><input type=text name=city value=\"$city\"></input></td></tr>
	<tr><td>State:</td><td><input type=text name=state size=10 value=\"$state\"></input></td></tr>
	<tr><td>Zip or Postal Code:</td><td><input type=text size=10 name=zip value=\"$zip\"></input></td></tr>
	<tr><td>Country:</td><td><input type=text name=country size=10 value=\"$country\"></input></td></tr>
	<tr><td>Website or Profile:</td><td><input type=text size=40 name=website value=\"$website\"></input></td></tr>
	<tr><td>E-mail: </td><td><input type=text name=email size=40 value=\"$email\"></input></td></tr>
	<tr><td>Source Language 1<br />(comma separated list)</td><td><input type=text size=10 name=srclang1 value=\"$srclang1\"></input></td></tr>
	<tr><td>Source Language 2<br />(comma separated list)</td><td><input type=text size=10 name=srclang2 value=\"$srclang2\"></input></td></tr>
	<tr><td>Source Language 3<br />(comma separated list)</td><td><input type=text size=10 name=srclang3 value=\"$srclang3\"></input></td></tr>
	<tr><td>Native Tongue:</td><td><input type=text size=10 name=natlang value=\"$natlang\"></input></td></tr>
	<tr><td>Country of Origin:</td><td><input type=text name=bcountry size=10 value=\"$bcountry\"></input></td></tr>
	<tr><td>Rate (USD/word):</td><td><input type=text name=rate size=10 value=\"$rate\"></input></td></tr></tbody></table>
	<p>Notes: <input type=text name=notes size=100 value=\"$notes\"></input></p>
	<input type=\"hidden\" name=\"act\" value=\"post\"></input>
	<input type=submit name=\"submit\" value=\"Submit\"></input>
</form>";
}

mysql_close();


$act = $_POST['act'];
if($act == "post") {
	$name = $_POST['name'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$zip = $_POST['zip'];
	$state = $_POST['state'];
	$country = $_POST['country'];
	$bcountry = $_POST['bcountry'];
	$website = $_POST['website'];
	$email = $_POST['email'];
	$natlang = $_POST['natlang'];
	$srclang1 = $_POST['srclang1'];
	$srclang2 = $_POST['srclang2'];
	$srclang3 = $_POST['srclang3'];
	$rate = $_POST['rate'];
	$notes = $_POST['notes'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die(mysql_error());
	$query="UPDATE providers SET rate='$rate', name='$name', street='$street', city='$city', country='$country', bcountry='$bcountry', zip='$zip', email='$email', website='$website', natlang='$natlang', notes='$notes', state='$state', srclang1='$srclang1', srclang2='$srclang2', srclang3='$srclang3' WHERE id = '$id'";
	mysql_query($query) or die('Error, insert query failed');	
	mysql_close();
	echo "<h4>Provider updated.</h4> <p><a href=\"editprov.php?name=$name\">Refresh page to verify results</a>.</p>";
    }
?>

</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
