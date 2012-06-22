<?php
// transprocloud footer
if (file_exists('../admin/config.php')) {
include '../admin/config.php';
} else {
include 'admin/config.php';
}

echo "<div id=\"footer\">";
echo "<small><a href=\"http://tonyb.us/transprocloud\">TransProCloud</a> by <a href=\"http://tonybaldwin.me\">Tony Baldwin</a> is FREE and Open Source Software, released according to the terms of the <a href=\"$url/license.php\">Gnu Affero Public License.</small>";
echo "</div>";
?>
