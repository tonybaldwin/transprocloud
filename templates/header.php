<?php
// transprocloud header
if (file_exists('../admin/config.php')) {
include '../admin/config.php';
} else {
include 'admin/config.php';
}

echo "<div id=\"header\"><p><strong><a href=\"http://tonyb.us/transprocloud\">TransProCloud</a></strong> - translation project management in the cloud</p></div>";
?>
