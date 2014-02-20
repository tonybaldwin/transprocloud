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
<?php
$id = isset($_GET['id']) ? htmlentities($_GET['id']) : false;
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (isset($id)) {
$getdoc = "SELECT * FROM prodocs WHERE id = \"$id\"";
$result = mysql_query($getdoc);
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

mysql_close();

echo "<hr />";
echo "<h5>Edit this document:</h5>
<form action=\"eddocs.php?id=$id\" method=\"post\">
	<input type=text name=title  value=\"$title\"></input><br />
	<input type=text name=srclang value=\"$srclang\"></input>
	<input type=text name=targlangs value=\"$targlangs\"></input><br />
	<input type=text name=notrans value=\"$notrans\"></input>
	<input type=text name=units value=\"$units\"></input><br />
	<input type=text name=projno value=\"$projno\"></input><br />
	<br /><input type=text name=notes size=\"100\" value=\"$notes\"></input>
	<input type=\"hidden\" name=\"act\" value=\"post\"></input>
	<input type=submit name=\"submit\" value=\"Submit\"></input>
</form>";


if (isset($projno)) {
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$getpro = "SELECT id FROM projects WHERE projno = \"$projno\"";
$projid = mysql_query($getpro);
while($row = mysql_fetch_assoc($projid))
{ 
	$projid = $row['id'];
}
echo "<p>Return to project <a href=\"edproject.php?id=$projid\">$projno</a>
<br /><a href=\"prodocs.php?projno=$projno\">Return to project documents</a></p>";
}

}
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

<div style="clear:both"></div>
<p><br /><br /><br /></p>
</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
