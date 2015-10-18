<? 
session_start(); 
include"ceksession.php"; 
?> 


<?php
include "koneksi.php";
$benar = 0;
$salah = 0;
if($_POST['soal']){
foreach($_POST['soal'] as $key => $value){
    $cek = mysql_query("SELECT * FROM tsoal WHERE soalid=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['jawaban'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}
$jumlah = $_POST['jumlahsoal'];
$jumlahbenar=$benar*4+4;
$nilai = $jumlahbenar - $salah;
echo "jumlah soal = $jumlah";
echo "Benar = $jumlahbenar <br>";
echo "Salah = $salah <br>";
echo "Total Niali = $nilai";
}

   $nim=$_SESSION['username'];
   $query="INSERT INTO tjawab VALUES('$nim', '$nilai')";
	if(!mysql_query($query))
		{
			echo("<h6>Anda Sudah menjawab soal bagian ini<h6>");
			echo('<a href="jenis_soal.php">Klik Disini untuk Kembalai Ke Halaman Utama Untuk Mengerjakan Jenis Ujian Yang Lain</a>');
			exit;
	}
               echo("Anda berhasil Input Jawaban dan Anda haya di kasih 1 kesepatan untuk menjawab<br>");
				echo('<a href="jenis_soal.php">Klik Disini untuk Kembalai Ke Halaman Utama Untuk Mengerjakan Jenis Ujian Yang Lain</a>');

?>
