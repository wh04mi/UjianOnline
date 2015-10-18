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

<?php
echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Input Soal Bahasa Inggris
</div>
";
 if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                echo '<h3>Berhasil menambah data!</h3>';
            }
			
echo "
<form action=\"insertinggris.php\" method=\"post\" id=\"form-area\" style=\"width:700px;\">
<div style=\"width:90px\" id=\"form-label\">No</div>
<input type=\"text\" name=\"no\" id=\"form-input\" required=\"required\" size=\"8\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Input Soal</div>
<input type=\"textarea\" name=\"soalt\" id=\"form-input\" required=\"required\" size=\"90\" />
<br />

<div style=\"width:100px\" id=\"form-label\">Pilihan Jawaban :</div><br><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan A</div>
<input type=\"text\" name=\"pil_1\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan B</div>
<input type=\"text\" name=\"pil_2\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan C</div>
<input type=\"text\" name=\"pil_3\" id=\"form-input\" required=\"required\" size=\"40\" /><br>
<div style=\"width:90px\" id=\"form-label\">Pilihan D</div>
<input type=\"text\" name=\"pil_4\" id=\"form-input\" required=\"required\" size=\"40\" /><br>



<br />

<div style=\"width:90px\" id=\"form-label\">Kunci Jawaban</div>
<input type=\"text\" name=\"keyjab\" id=\"form-input\" required=\"required\" size=\"10\" />
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

