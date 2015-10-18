 <?php
	
	include "../koneksi.php";
	$no=$_POST['no'];
	$kd_mp=$_POST['kd_mp'];
	$kelas=$_POST['kelas'];
	$soalt=$_POST['soalt'];
	$keyjab=$_POST['keyjab'];
	$pil_1=$_POST['pil_1'];
	$pil_2=$_POST['pil_2'];
	$pil_3=$_POST['pil_3'];
	$pil_4=$_POST['pil_4'];
	
	$query=mysql_query("INSERT INTO tsoal2 VALUES('$no','$keyjab','$soalt','$pil_1','$pil_2','$pil_3','$pil_4')")or die(mysql_error());

if ($query) {
?>
	<script> document.location.href='inputsoalinggris.php?message=success';</script>
<?php }
?>