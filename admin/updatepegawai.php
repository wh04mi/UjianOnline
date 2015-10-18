<?php
include "../koneksi.php";

$kode_pegawai = $_POST['kode_pegawai'];
$nama_pegawai = $_POST['nama_pegawai'];
$umur = $_POST['umur'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];

$query = mysql_query("UPDATE pegawai SET  nama_pegawai='$nama_pegawai', umur='$umur', agama='$agama', alamat='$alamat' where kode_pegawai='$kode_pegawai'") or die(mysql_error());

if ($query) {
	header('location:admin-home.php?page=datapegawai');
}
?>