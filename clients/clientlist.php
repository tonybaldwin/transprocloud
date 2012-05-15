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
include 'config.php';
include '../templates/navbar.php';
?>

<div id="main">

<h4>Client List:</h4>
<ul>
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$query  = "SELECT name, website FROM clients";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	$name = $row['name'];
	$website = $row['website'];
	echo "<li>$name: <a href=\"$website\">$website</a>, <a href=\"$url/clients/editclient.php?name=$name\">view/edit client</a></li>";
}
echo "</ul>";
mysql_close();
echo "<p>return to <a href=\"$url\">home</a> or <a href=\"$url/clients/\">clients</a></p>";
?>

</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
