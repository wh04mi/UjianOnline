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
<title>::LP3I Tasikmalaya Online Test::.</title>

<link rel="stylesheet" type="text/css" href="files/style_admin.css" />

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

<script type="text/javascript">
function validasi_input(form){
  function check_radio(radio)
  {
// memeriksa apakah radio button sudah ada yang dipilih
    for (i = 0; i < radio.length; i++)
    {
      if (radio[i].checked === true)
      {
        return radio[i].value;
      }
    }
   return false;
   }

   var radio_val = check_radio(form.pilihan);
   if (radio_val === false)
    {
      alert("Anda belum memilih Jenis Kelamin!");
      return false;
    }
   return (true);
}
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
<div id=\"content\" style=\"height:autopx\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Soal Bahasa Inggris
</div>";
?>
<form action=nilaikuantitatif.php method=post id="form-area" onSubmit="return validasi_input(this)">
<ol>
  <?php
		$hasil=mysql_query("select * from tsoal1 LIMIT 30");
		$jumlah=mysql_num_rows($hasil);
		$urut=0;
		while($row =mysql_fetch_array($hasil))
		{
			$id=$row["soalid"];
			$pertanyaan=$row["pertanyaan"];
			$pilihan_a=$row["pilihan_a"];
			$pilihan_b=$row["pilihan_b"];
			$pilihan_c=$row["pilihan_c"];
			$pilihan_d=$row["pilihan_d"]; 
			
			?>
		
			<input type="hidden" name="id[]" value=<?php echo $id; ?>>
			<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
			
			<table width="650" border="0" class="font" >
			<tr>
			  	<td width="17"><font color="#FFFFFF"><?php echo $urut=$urut+1; ?></font></td>
			  	<td width="430"><font color="#FFFFFF"><strong><?php echo "$pertanyaan"; ?></strong></font></td>
			</tr>
			<tr>
			  	<td height="21">&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="a"> <font color="#FFFFFF"><?php echo "A. $pilihan_a";?></font> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="b"> <font color="#FFFFFF"><?php echo "B. $pilihan_b";?></font> </td>
			</tr>
			<tr>
			  	<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="c"> <font color="#FFFFFF"><?php echo "C. $pilihan_c";?></font> </td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			  	<td><input name="pilihan[<?php echo $id; ?>]" type="radio" value="d"> <font color="#FFFFFF"><?php echo "D. $pilihan_d";?></font> </td>
            </tr>
			</table>
		<?php
		}
		?>
        	<tr>
				<td>&nbsp;</td>
			  	<td><input type="submit" name="submit" value="Jawab" )"></td>
            </tr>
		</form>
        </p>

</div>


<?php
echo"</div>
";
break;
?>

<!-- don't Change it ;) -->
<div class="clear"></div>

</div>
</body>
</html>

