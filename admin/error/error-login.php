<?php
// Warning Error To Login Admin Page
$error_login = "Maaf, Username atau Password Salah! ";

// View Error Message To Browser
echo "
<html>
<head>
<title>Login Panel</title>
<link rel=\"stylesheet\" type=\"text/css\" href=\"files/style_login.css\" />
<link rel=\"shorcut icon\" href=\"../../images/images_admin/img_icon.gif\" />
</head>
<body>

<div id=\"main\" style=\"width:640px;\">
<div id=\"error_login\">
<img src=\"images/images_login/img_login_lock.png\" width=\"30\" height=\"31\" align=\"absmiddle\" class=\"img_lock\"/> 
$error_login
<a href=\"index.php\" class=\"clickhere\">Login lagi</a>
</div>

<div class=\"clear\"></div>
<div id=\"vertical_effect\">&nbsp;</div>
</div>

</body>
</html>
";
?>