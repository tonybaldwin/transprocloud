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
<h4>Provider Management:</h4>

<ul>
<li><a href="provlist.php">provider list</a></li>
<li><a href="addprov.php">add provider</a></li>
</ul>

<h4>Search by name:</h4>

<form action="index.php" method="post">
	<input type="text" name="sterm" size="20" value="search by name"></input>
	<input type="hidden" name="act" value="post"></input>
	<input type="submit" name="submit" value="Submit"></input>
</form>
<h4>Search by language pair:</h4>
<form action="index.php" method="post">
	<input type="text" name="slang" size="10" value="source language"></input>
	<input type="text" name="tlang" size="10" value="target language"></input>
	<input type="hidden" name="lact" value="post"></input>
	<input type="submit" name="lsubmit" value="Submit"></input>
</form>

<?php
$lact = $_POST['lact'];
if($lact == "post") {
	$slang = $_POST['slang'];
	$tlang = $_POST['tlang'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die (mysql_error());
	$lquery="SELECT * FROM providers WHERE srclangs = \"$slang\" and natlang=\"$tlang\"";
	$lresult = mysql_query($lquery);
	if(mysql_num_rows($lresult)==0) {
	echo "<h4>Search Results:</h4><p>no such provider...sorry</p>";
	mysql_close();
	} else {
	echo "<h4>Search Results:</h4><ul>";
	while($row = mysql_fetch_assoc($lresult))
	{
		$name = $row['name'];
		$country = $row['country'];
		$bcountry = $row['bcountry'];
		$email = $row['email'];
		$website = $row['website'];
		$natlang = $row['natlang'];
		$srclangs = $row['srclangs'];
		echo "<li>$name, $country, $srclangs to $natlang-$bcountry, <a href=\"mailto:$email\">$email</a>, <a href=\"$website\">$website</a>, <a href=\"editprov.php?name=$name\">edit $name</a>, <a href=\"listproj.php?name=$name\">list $name projects</a></li>";
	}
	echo "</ul>";
	mysql_close();
   } 
  }

$act = $_POST['act'];
if($act == "post") {
	$sterm = $_POST['sterm'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die (mysql_error());
	$query="SELECT * FROM providers WHERE name = \"$sterm\"";
	$result = mysql_query($query);
	if(mysql_num_rows($result)==0) {
	echo "<h4>Search Results:</h4><p>no such provider...sorry</p>";
	mysql_close();
	} else {
	echo "<h4>Search Results:</h4><ul>
		<li><a href=\"editprov.php?name=$sterm\">edit $sterm</a></li>
		<li><a href=\"listproj.php?name=$sterm\">list $sterm projects</a></li>
	      </ul>";
	mysql_close();
    }
 }

?>
</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
