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

<h4>Provider List:</h4>
<ul>
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$query  = "SELECT name, website FROM providers";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	$name = $row['name'];
	$website = $row['website'];
	$srclangs = $row['srclangs'];
	$natlang = $row['natlang'];
	echo "<li>$name, $natlang to $srclangs, <a href=\"$website\">$website</a>, <a href=\"$url/providers/editprov.php?name=$name\">view/edit provider</a></li>";
}
echo "</ul>";
mysql_close();
echo "<p>return to <a href=\"$url\">home</a> or <a href=\"$url/providers/\">providers</a></p>";
?>

</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
