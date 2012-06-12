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

<h4>Project Management:</h4>
<hr />
<h5>Add a new project:</h5>
<form action="index.php" method="post">
	<input type=text name=clientid value="Client ID"></input>
	<input type=text name=projno value="Project No."></input>
	<input type=text name=indate value="In Date"></input>
	<input type=text name=duedate value="Due Date"></input>
	<br /><input type=text name=notes size="100" value="Notes"></input>
	<input type="hidden" name="act" value="post"></input>
	<input type=submit name="submit" value="Submit"></input>
</form>

<?php
$act = $_POST['act'];
if($act == "post") {
	$clientid = $_POST['clientid'];
	$projno = $_POST['projno'];
	$indate = $_POST['indate'];
	$duedate = $_POST['duedate'];
	$notes = $_POST['notes'];
	
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die(mysql_error());
	$projectin="INSERT INTO projects (clientid, projno, indate, duedate, notes) values('$clientid', '$projno', '$indate', '$duedate', '$notes')";

	mysql_query($projectin) or die('Error, insert query failed');	
	mysql_close();
    }
?>

<hr />
<?php
$datenow = date(Ymd);
$monthago = strtotime("-1 month");

mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$pquery = "SELECT id, notes, projno, clientid, indate, duedate  FROM projects WHERE indate <= $datenow and indate >= $monthago";
$pros = mysql_query($pquery);
$prows = mysql_num_rows($pros);
echo "<p>Recent Projects: $prows in this past month</p>";
echo "<ul>";
while($row = mysql_fetch_assoc($pros))
{
	$id = $row['id'];
	$clientid = $row['clientid'];
	$projno = $row['projno'];
	$notes = $row['notes'];
	$indate = $row['indate'];
	$duedate = $row['duedate'];
	echo "<li>ID: $id; project no.: <a href=\"edproject.php?id=$id\">$projno</a>; Client: <a href=\"../clients/editclient.php?clinick=$clientid\">$clientid</a>; Start date: $indate; Due: $duedate.<br />Notes: $notes</li>";
}
echo "</ul>";

?>
</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
