<?php
session_start();
include "koneksi.php";

?>

<?php 
error_reporting(0);
?>

<?php
$conf 	   = mysql_query("select * from mini_config");
$view_conf = mysql_fetch_array($conf);
?>
<html>
<head>
<title>.::Registrasi::.</title>

<link rel="stylesheet" type="text/css" href="admin/files/style_admin.css" />
<link rel="shorcut icon" href="images/images_admin/img_icon.gif" />
<script src="files/jquery.js" type="text/javascript"></script>
<script src="files/sdmenu.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_mce.js" type="text/javascript"></script>
<script src="tinymce/jscripts/tiny_mce/tiny_miniw0rm.js" type="text/javascript"></script>

<script type="text/javascript">
	var myMenu;
	window.onload = function() {
	myMenu = new SDMenu("my_menu");
	myMenu.init();
	};
</script>
</head>

<body>
<div id="main2">

<!-- Menu Left -->



<!-- Right Content -->
<div id="right">

<!-- Header Right -->


<!-- Content Right -->

<?php
echo"
<div id=\"\" style=\"height:650px\">
<div id=\"\">
<img src=\"admin/images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> <font size=\"5px\" color=\"white\">REGISTRATION</font><br>

</div>
<a href ='loginmhs.php'> I Have Acoount. </a>
";
 if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                echo '<h3>Berhasil menambah data!</h3>';
            }
			
echo "
<form action=\"insertuser.php\" method=\"post\" id=\"form-area\" style=\"width:400px;\">
<div style=\"width:100px\" id=\"form-label\">No Peserta</div>
<input type=\"text\" name=\"nopeserta\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Nama</div>
<input type=\"text\" name=\"nama\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Program Keahlan</div>
<select name=\"kelas\" id=\"form-input\">

    <option value=\"Teknik Informatika\">Teknik Informatika</option>
    <option value=\"Komputer Akuntasi\">Komputer Akutansi </option>
    <option value=\"Office Management\">Office Management</option>
    <option value=\"Teknik Otomotif\">Teknik Otomotfi</option>
    <option value=\"Business Administration\">Bisnis Administrasi</option>

</select>
<br />

<div style=\"width:100px\" id=\"form-label\">No Telepon</div>
<input type=\"text\" name=\"telepon\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Password</div>
<input type=\"password\" name=\"password\" id=\"form-input\" required=\"required\" size=\"40\" />
<br />
<input type=\"submit\" name=\"Submit\" value=\"REGISTER\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
</form>
</div>

";
?>


<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>

