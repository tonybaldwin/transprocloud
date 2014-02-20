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
<h4>Client Management:</h4>

<ul>
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$cquery = "SELECT * FROM clients";
$cres = mysql_query($cquery);
$crows = mysql_num_rows($cres);
echo "<li>Clients listed: $crows</li>";
?>
<li><a href="clientlist.php">client list</a></li>
<li><a href="addclient.php">add client</a></li>
</ul>

<h4>Search:</h4>

<form action="index.php" method="post">
	<input type=text name=sterm size=50 value="enter search term"></input>
	<input type="hidden" name="act" value="post"></input>
	<input type=submit name="submit" value="Submit"></input>
</form>

<?php
$act = $_POST['act'];
if($act == "post") {
	$sterm = $_POST['sterm'];
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die (mysql_error());
	$query="SELECT * FROM clients WHERE name = \"$sterm\"";
	$result = @mysql_query($query);
	if(mysql_num_rows($result)==0) {
	echo "<h4>Search Results:</h4><p>no such client...sorry</p>";
	mysql_close();
	} else {
	echo "<h4>Search Results:</h4><ul>
		<li><a href=\"editclient.php?name=$sterm\">edit $sterm</a></li>
		<li><a href=\"listproj.php?name=$sterm\">list $sterm projects</a></li>
	      </ul>";
	mysql_close();
    }
}
?>

<div style="clear:both"></div>
<p><br /><br /><br /></p>
</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
