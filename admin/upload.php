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
<div id="content" style="height:650px;">
<div id="title_content">
<img src="images/images_admin/icon_admin_home.png" align="absmiddle" class="img_title" /> Form Upload
</div>

<div id="aldyupload">
<form action="prosmulti.php" method="post" enctype="multipart/form-data"><center>
  Nama File 1: 
  <input type="file" name="fileunggah[]"><br>
  Nama File 2:
  <input type="file" name="fileunggah[]"><br>
  Nama File 3:
  <input type="file" name="fileunggah[]"><br>
  Nama File 4:
  <input type="file" name="fileunggah[]"><br>
  Nama File 5:
  <input type="file" name="fileunggah[]"><br><br>
  
  <input type="submit" value="Upload"></center>
</form>
</div>
</div>


</div>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>