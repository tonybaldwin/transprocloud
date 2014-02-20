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

<h4>Project Management: Edit Project</h4>

<?php
$id = isset($_GET['id']) ? htmlentities($_GET['id']) : false;
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
if (isset($id)) {
$query = "SELECT * FROM projects WHERE id = \"$id\"";
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
	$grossprof = $row['grossprof'];
	$netprofit = $row['netprofit'];
	$notes = $row['notes'];
}
echo "<ul><li>Project ID: $id</li>
<li>Project No.: $projno</li>
<li>Client ID: <a href=\"../clients/editclient.php?clinick=$clientid\">$clientid</a></li>
<li>IN Date: $indate</li>
<li><a href=\"prodocs.php?projno=$projno\">Project Documents</a></li>
<li><a href=\"passign.php?projno=$projno\">Project Assignments</a></li>
</ul>";

$grossprof = ($totprice - $payouts);
$tax2pay = round($grossprof * $estax);
$netprofit = ($grossprof - $tax2pay);


echo "<h4>Edit Project:</h4>
<table border=\"0\" cellspacing=\"5\" cellpadding=\"2\"><tbody><tr><td>
<form action=\"edproject.php?id=$id\" method=\"post\">
Project No.:</td><td> <input type=text name=projno value=\"$projno\"></input></td></tr>
<tr><td>Client ID:</td><td><input type=text name=clientid value=\"$clientid\"></input></td></tr>
<tr><td>IN Date:</td><td><input type=text name=indate value=\"$indate\"></input></td></tr>
<tr><td>DUE Date: </td><td><input type=text name=duedate value=\"$duedate\"></input></td></tr>
<tr><td>OUT Date (date delivered):</td><td><input type=text name=outdate value=\"$outdate\"></input></td></tr>
<tr><td>Date Paid: </td><td><input type=text name=paidate value=\"$paidate\"></input></td></tr>
<tr><td>Units:</td><td><input type=text name=units value=\"$units\"></input></td></tr>
<tr><td>Rate:</td><td><input type=text name=rate value=\"$rate\"></input></td></tr>
<tr><td>Payouts: </td><td><input type=text name=payouts value=\"$payouts\"></input></td></tr>
<tr><td>Total Price: </td><td><input type=text name=totprice value=\"$totprice\"></input></td></tr>
<tr><td>Gross Profit: </td><td><input type=text name=grossprof value=\"$grossprof\"></input></td></tr>
<tr><td>Estimated Tax (rate = $estax): </td><td><input type=text name=tax2pay value=\"$tax2pay\"></input></td></tr>
<tr><td>Net Profit: </td><td><input type=text name=netprofit value=\"$netprofit\"></input></td></tr>
</tbody></table>
	<p>Notes: <input type=text name=notes size=100 value=\"$notes\"></input></p>
	<input type=\"hidden\" name=\"act\" value=\"post\"></input>
	<input type=submit name=\"submit\" value=\"Submit\"></input>
</form>";
}

mysql_close();

$act = $_POST['act'];
if($act == "post") {
	$projno = $_POST['projno'];
	$clientid = $_POST['clientid'];
	$indate = $_POST['indate'];
	$outdate = $_POST['outdate'];
	$invdate = $_POST['invdate'];
	$duedate = $_POST['duedate'];
	$paidate = $_POST['paidate'];
	$units = $_POST['units'];
	$rate = $_POST['rate'];
	$payouts = $_POST['payouts'];
	$totprice = $_POST['totprice'];
	$notes = $_POST['notes'];
	
 	mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
	mysql_select_db("$dbname") or die(mysql_error());
	$query="UPDATE projects SET projno='$projno', clientid='$clientid', indate='$indate', outdate='$outdate', invdate='$invdate', duedate='$duedate', paidate='$paidate', units='$units', rate='$rate', payouts='$payouts', totprice='$totprice', notes='$notes' WHERE id = '$id'";
	mysql_query($query) or die('Error, insert query failed');	
	mysql_close();

	echo "<h4>Project updated.</h4><p><a href=\"edproject.php?id=$id\">Refresh page to verify results</a>.</p>";
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
