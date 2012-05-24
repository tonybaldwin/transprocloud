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
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$query  = "SELECT id, name, rate, email, website, bcountry, srclang1, srclang2, srclang3, natlang, country FROM providers";
$result = mysql_query($query);
echo "<ul>";
while($row = mysql_fetch_assoc($result))
{
	$id = $row['id'];
	$name = $row['name'];
	$website = $row['website'];
	$email = $row['email'];
	$rate = $row['rate'];
	$srclang1 = $row['srclang1'];
	$srclang2 = $row['srclang2'];
	$srclang3 = $row['srclang3'];
	$natlang = $row['natlang'];
	$country = $row['country'];
	$bcountry = $row['bcountry'];
	echo "<li>ID: $id, $name, $srclang1, $srclang2, $srclang3 to $natlang-$bcountry, rate USD $rate/word, <a href=\"mailto:$email\">$email</a>, <a href=\"$website\">$website</a>, <a href=\"$url/providers/editprov.php?name=$name\">view/edit provider</a></li>";
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
