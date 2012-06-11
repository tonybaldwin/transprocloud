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

<h4>Project Management: Documents</h4>
<hr />
<?php
$projno = isset($_GET['projno']) ? htmlentities($_GET['projno']) : false;
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (isset($projno)) {
$getpro = "SELECT id FROM projects WHERE projno = \"$projno\"";
$projid = mysql_query($getpro);
while($row = mysql_fetch_assoc($projid))
{ 
	$projid = $row['id'];
}
echo "<p>Documents for <a href=\"edproject.php?id=$projid\">$projno</a></p>";
$query = "SELECT * FROM prodocs WHERE projno = \"$projno\"";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	$id = $row['id'];
	$title = $row['title'];
	$projno = $row['projno'];
	$units = $row['units'];
	$srclang = $row['srclang'];
	$targlangs = $row['targlangs'];
	$notrans = $row['notrans'];
	$notes = $row['notes'];
}
echo "<ul><li>Document ID: $id, Title: $title;<br />Source Language: $srclang; Target Languages: $targlangs;<br />Units: $units; No. of Translations: $notrans;<br />Notes: $notesi<br /><a href=\"eddoc.php?id=$id\">Edit this document</a></li></ul>";
}
mysql_close();

echo "<hr />";
echo "<h5>Add a new document to this project:</h5>
<form action=\"prodocs.php?projno=$projno\" method=\"post\">
	<input type=text name=title  value=\"title\"></input><br />
	<input type=text name=srclang value=\"source language\"></input>
	<input type=text name=targlangs value=\"target languages\"></input><br />
	<input type=text name=notrans value=\"number of translations\"></input>
	<input type=text name=units value=\"units (word count)\"></input><br />
	<br /><input type=text name=notes size=\"100\" value=\"Notes\"></input>
	<input type=\"hidden\" name=\"act\" value=\"post\"></input>
	<input type=submit name=\"submit\" value=\"Submit\"></input>
</form>";

$act = $_POST['act'];
if($act == "post") {
	$title = $_POST['title'];
	$units = $_POST['units'];
	$srclang = $_POST['srclang'];
	$targlangs = $_POST['targlangs'];
	$notrans = $_POST['notrans'];
	$notes = $_POST['notes'];
	
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die(mysql_error());
	$docin="INSERT INTO prodocs (title, units, srclang, targlangs, notrans, notes, projno) values('$title', '$units', '$srclang', '$targlangs', '$notrans', '$notes', '$projno')";

	mysql_query($docin) or die('Error, insert query failed');	
	mysql_close();
    }
?>

</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
