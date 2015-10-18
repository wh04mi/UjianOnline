<?php
//panggil file config.php untuk menghubung ke server
include "../koneksi.php";

//tangkap data dari form
$nama = $_POST['nama'];
$email= $_POST['email'];
$password = $_POST['password'];
$jabatan = $_POST['jabatan'];

//simpan data ke database
$query = mysql_query("insert into member values('','$nama', '$email', '$password','$jabatan','admin')") or die(mysql_error());

if ($query) {
	header('location:inputuser.php?message=success');
}
?>