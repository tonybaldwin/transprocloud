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
<li><a href="editprov.php">edit provider</a></li>
</ul>

<h4>Search:</h4>

<form action="index.php" method="post">
	<input type=text name=sterm size=100 value="enter search term"></input>
	<input type="hidden" name="act" value="post"></input>
	<input type=submit name="submit" value="Submit"></input>
</form>

<?php
$act = $_POST['act'];
if($act == "post") {
	$sterm = $_POST['sterm'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die (mysql_error());
	$query="SELECT * FROM providers WHERE name = \"$sterm\"";
	$result = @mysql_query($query);
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
