<?php

# left navigation bar
# tony baldwin | http://tonybaldwin.me
#

$url = "http://tonybaldwin.homelinux.net/mine/tpcloud";

echo "<div id=\"navbar\">";
echo "<a href=\"http://tonyb.us/transprocloud\"><img src=\"$url/images/tpnavbutton.jpg\" border=\"0\"></a>";
echo "<h4>Navigation:</h4>";
echo "<ul><li><a href=\"$url/index.php\">HOME</a>";
echo "</li><li><a href=\"$url/projects/\">PROJECTS</a></li>";
echo "<li><a href=\"$url/clients/\">CLIENTS</a></li>";
echo "<li><a href=\"$url/providers/\">PROVIDERS</a></li>";
echo "<li><a href=\"$url/admin/\">ADMIN</a></li>";
echo "<li><a href=\"$url/help.php\">HELP</a></li>";
echo "<li><a href=\"$url/about.php\">ABOUT</a></li></ul>";
echo "</div>";
?>
