<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" title="Orig" href="main.css" media="screen,projection" />
<meta name="Author" content="Anthony Baldwin" />
<title>TransProCloud</title>
</head>
<body>
<!-- transprocloud index --!>
<?php
include 'templates/header.php';

include 'templates/navbar.php';

ini_set('display_errors', "1");
ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>

<div id="main">
<a href="http://tonyb.us/transprocloud"><img src="images/tpcloud.png" width="600" alt="TransProCloud"></a>
<h4><a href="http://tonyb.us/transprocloud">TransProCloud</a> - online translation project management tools.</h4>
<?php
echo "TIME: ";
echo date('H:i');
echo " DATE: ";
echo date('m/d/Y');
?>
<ul>
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$cquery = "SELECT * FROM clients";
$cres = mysql_query($cquery);
$crows = mysql_num_rows($cres);
echo "<li>Clients listed: $crows</li>";
?>
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$pquery = "SELECT * FROM providers";
$pres = mysql_query($pquery);
$prows = mysql_num_rows($pres);
echo "<li>Providers listed: $prows</li>";
?>
<?php
mysql_connect("$dbhost", "$dbuser", "$dbpass") or die(mysql_error());
mysql_select_db("$dbname") or die(mysql_error());
$tquery = "SELECT * FROM projects";
$tres = mysql_query($tquery);
$trows = mysql_num_rows($tres);
echo "<li>Projects listed: $trows</li>";
?>
<li>Projects Due: -</li>
<li>Invoice Payable: -</li>
<li>Invoices Due: - </li>
<li>Gross Income, Current Year: -</li>
<li>Net Income Current Year: -</li>
<li>Gross Income Current Month: -</li>
<li>Words Translated, Current Year: -</li>

</ul>
</div>

<?php
include 'templates/footer.php';
?>
</body>
</html>
