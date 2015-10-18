<?php
// Warning Error To Access Denied Page
$error_access_page = "Maaf, Anda Tidak Berhak Mengakses Halaman Ini, Karena Status Anda Bukan Administrator ^_^";

// View Error Message To Browser
echo "
<html>
<head>
<title>Access Denied</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"../files/style_login.css\" />
<link rel=\"shorcut icon\" href=\"../images/images_admin/img_icon.gif\" />
</head>
<body>

<div id=\"main\" style=\"width:670px;\">
<div id=\"error_login\">
<img src=\"../images/images_login/img_login_lock.png\" width=\"30\" height=\"31\" align=\"absmiddle\" class=\"img_lock\"/> 
$error_access_page
</div>

<div class=\"clear\"></div>
<div id=\"vertical_effect\">&nbsp;</div>
</div>

</body>
</html>
";
?>