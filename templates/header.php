<?php
// transprocloud header
if (file_exists('../admin/config.php')) {
include '../admin/config.php';
} else {
include 'admin/config.php';
}

echo "<div id=\"header\">";
echo "<a href=\"http://tonyb.us/transprocloud\"><img src=\"$url/images/tpnavbutton.jpg\" alt=\"TransProCloud\" border=\"0\"></a>";
echo "</div>";
?>
