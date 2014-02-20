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

<h4>Project Management: Client Projects</h4>

<?php
$clientid = isset($_GET['clientid']) ? htmlentities($_GET['clientid']) : false;
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (isset($clientid)) {
echo "<h5>Client:<a href=\"../clients/editclient.php?clinick=$clientid\">$clientid</a></h5>";
$query = "SELECT * FROM projects WHERE clientid = \"$clientid\"";
$result = mysql_query($query);
while($row = mysql_fetch_assoc($result))
{
	$id = $row['id'];
	$projno = $row['projno'];
	$clientid = $row['clientid'];
	$indate = $row['indate'];
	$outdate = $row['outdate'];
	$invdate = $row['invdate'];
	$duedate = $row['duedate'];
	$paidate = $row['paidate'];
	$units = $row['units'];
	$rate = $row['rate'];
	$payouts = $row['payouts'];
	$totprice = $row['totprice'];
	$notes = $row['notes'];
}
echo "<ul><li>Project ID: $id</li>
<li>Project No.: <a href=\"edproject.php?id=$id\">$projno</a></li>
<li>IN Date: $indate</li>
<li>Due Date: $duedate</li>
<li>Invoiced: $invdate</li>
<li>Paid: $paidate</li>
<li>Price: $totprice</li>
<li>Notes: $notes</li>
<li><a href=\"edproject.php?id=$id\">view/edit this project</a>.</li>
</ul><hr />";
}
mysql_close();

?>

<div style="clear:both"></div>
<p><br /><br /><br /></p>
</div>

<?php
include '../templates/footer.php';
?>
</body>
</html>
