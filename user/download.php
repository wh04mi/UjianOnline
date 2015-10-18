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
<script src="files/tiny_mce.js" type="text/javascript"></script>
<script src="files/tiny_miniw0rm.js" type="text/javascript"></script>

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
<img src="images/images_admin/icon_admin_home.png" align="absmiddle" class="img_title" /> Form Download
</div>
<div id="aldyupload">
<?php
	include "../mini-config/mini-config.php";
   $sql = "SELECT file, ukuran, tipe, keterangan FROM upload";
   $hasil = mysql_query($sql);
   echo '<center>';
   print("<table  width=\"75%\" border=\"0\"\n" .
         "cellspacing=\"-\" cellpadding=\"-\">");
   $nomor = 1;
   while ($baris = mysql_fetch_row($hasil))    
   {
	  $file = $baris[0];
	  $ukuran = $baris[1];
	  $tipe = $baris[2];
	  $keterangan = $baris[3];
	
	  // Tentukan warna latar belakang  
	  if ($nomor % 2 == 1)
	     $warna = "#747474";
	  else
	     $warna = "#b8b8b7";
	  		 
	  print("<tr bgcolor=\"$warna\">\n");
      print("<td>Nama :</td>\n");
	  print("<td>$file</td>\n");
      print("</tr>\n");
	  
	  print("<tr bgcolor=\"$warna\">\n");
      print("<td>Ukuran:</td>\n");
	  print("<td>$ukuran</td>\n");
      print("</tr>\n");
	  
      print("<tr bgcolor=\"$warna\">\n"); 
      print("<td>Tipe:</td>\n");
	  print("<td>$tipe</td>\n");
      print("</tr>\n");
      
	  print("<tr bgcolor=\"$warna\">\n"); 
      print("<td>Keterangan:</td>\n");
	  print("<td>$keterangan</td>\n");
      print("</tr>\n");
	  
	  print("<tr bgcolor=\"$warna\">\n"); 
      print("<td align=\"right\"colspan=\"2\">" . 
	    "<a href='../data/$file'>Download File</a>" .
		"</td>\n");
      print("</tr>\n");
	  
	  $nomor++;
   }
   
   print("</table>");
      
?>
</div>
</div>
</div>
</div>
<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>