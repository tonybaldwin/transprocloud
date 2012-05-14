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
<p><a href="http://tonyb.us/transprocloud"><img src="images/tpcloud.png"></a></p>
<p>nothing here yet...working on building a client/project database with functions based on <a href="http://tonyb.us/tpcalc">TransProCalc</a>, the tcl/tk, translation project management tool.</p>
<p>TransProCloud will allow creation and management of a client database, provider database, and project database.</p>
<p>Eventually, it will include invoicing and other matters, as well.</p>
<p>This is my first attempt to create a webapplication in php that works with a database.</p>

</div>

<?php
include 'templates/footer.php';
?>
</body>
</html>
