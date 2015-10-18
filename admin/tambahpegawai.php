<?php
session_start();
include "../koneksi.php";

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
<title>Login Panel</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />
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
<div id="main">

<!-- Menu Left -->
<div id="left">
<img src="images/images_admin/bg_admin_banner.png" alt="Aldyfrz" class="aldyfrz" />
<?php include "menu-left.php"; ?> 
</div>


<!-- Right Content -->
<div id="right">

<!-- Header Right -->
<div id="header-content">
<?php include "header.php"; ?>
</div>

<!-- Content Right -->
<?
echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Input Data Pegawai
</div>
";

echo "
<form action=\"insertpegawai.php\" method=\"post\" id=\"form-area\" style=\"width:385px;\">
<div style=\"width:90px\" id=\"form-label\">Kode Pegawai</div>
<input type=\"text\" name=\"kode\" id=\"form-input\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Nama Pegawai</div>
<input type=\"text\" name=\"nama\" id=\"form-input\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Agama</div>
<select name=\"agama\" id=\"form-input\">
<option value='Islam'selected>Islam</option>
<option value='Kristen' >Kristen</option>
<option value='Kristen' >Hindu</option>
<option value='Kristen' >Budha</option>
</select>
<br />

<div style=\"width:90px\" id=\"form-label\">Umur</div>
<input type=\"text\" name=\"umur\" id=\"form-input\" size=\"40\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Alamat</div>
<input type=\"text\" name=\"alamat\" id=\"form-input\" size=\"40\" />
<br />

<input type=\"submit\" name=\"Submit\" value=\"Add New And Save\" id=\"form-submit\" style=\"margin-bottom:5px\"/>
</form>
</div>
";
break;
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>

