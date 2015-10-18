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
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Soal Kuantitatif
</div>";
?>
<?php
include "koneksi.php";

       if(isset($_POST['submit'])){
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
					//echo $kosong;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					//echo $jawaban;
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from tsoal1 where soalid='$nomor' and jawaban='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				$score = $benar*4;
			}
		}
		?>
        <form action="simpankuantitatif.php" method="post" id="form-area">
		
		<?php 
		if($kosong==0){
		echo " Terimakasih Anda Sudah Menjawab Semua Soal Silahkan Simpan Soal";
		}else{ echo "Anda Belum Menjawab $kosong Soal <a href='soalinggris.php'> <blink><strong>silahkan isi kembali soal</strong></blink></a> atau Simpan";
		} 
		?>
        
        <input type="hidden" name="username" value="<?php echo $_SESSION['username']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
		
        <input type="submit" name="submit" value="Simpan Nilai" onClick="return confirm('Apakah Anda yakin akan menyimpan nilai ujian?')"/>
        
        </form> 
		

</div>
</ol>

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

