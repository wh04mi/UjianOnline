<?php
//panggil file config.php untuk menghubung ke server
include "../koneksi.php";

//tangkap data dari form
$username = $_POST['username'];
$password= $_POST['password'];
$typeuser = $_POST['typeuser'];
$nama = $_POST['nama'];

//simpan data ke database
$query = mysql_query("UPDATE users SET username='$username', password='$password', typeuser='$typeuser', nama='$nama' where username='$username'") or die(mysql_error());

if ($query) {
	header('location:admin-home.php?page=users');
}
?>