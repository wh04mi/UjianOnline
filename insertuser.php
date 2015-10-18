<?php
//panggil file config.php untuk menghubung ke server
include "koneksi.php";

//tangkap data dari form
$nopeserta = $_POST['nopeserta'];
$nama= $_POST['nama'];
$kelas = $_POST['kelas'];
$telepon = $_POST['telepon'];
$password = $_POST['password'];
$tanggal=date("Y-m-d");

//simpan data ke database
$query = mysql_query("insert into tuser values('','$nopeserta', '$nama', '$kelas','$telepon', '$password','$tanggal')") or die(mysql_error());

if ($query) {
	header('location:loginmhs.php');
}
?>