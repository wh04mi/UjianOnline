<?php


// nama file

$namaFile = "hasilujian.xls";

// Function penanda awal file (Begin Of File) Excel

function xlsBOF() {
echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}

// Function penanda akhir file (End Of File) Excel

function xlsEOF() {
echo pack("ss", 0x0A, 0x00);
return;
}

// Function untuk menulis data (angka) ke cell excel

function xlsWriteNumber($Row, $Col, $Value) {
echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
echo pack("d", $Value);
return;
}

// Function untuk menulis data (text) ke cell excel

function xlsWriteLabel($Row, $Col, $Value ) {
$L = strlen($Value);
echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
echo $Value;
return;
}

// header file excel

header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,
        pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

// header untuk nama file
header("Content-Disposition: attachment;
        filename=".$namaFile."");

header("Content-Transfer-Encoding: binary ");

// memanggil function penanda awal file excel
xlsBOF();

// ------ membuat kolom pada excel --- //

// mengisi pada cell A1 (baris ke-0, kolom ke-0)
xlsWriteLabel(0,0,"NO");               

// mengisi pada cell A2 (baris ke-0, kolom ke-1)
xlsWriteLabel(0,1,"NIM");              

// mengisi pada cell A3 (baris ke-0, kolom ke-2)
xlsWriteLabel(0,2,"NAMA MAHASISWA");

// mengisi pada cell A4 (baris ke-0, kolom ke-3)
xlsWriteLabel(0,3,"Tanggal");   

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,4,"Program Keahlian"); 

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,5,"Kemampuan Analisa"); 

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,6,"Bahasa Kuanttitatif"); 

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,7,"Kemampuan Kuantitafi");

// mengisi pada cell A5 (baris ke-0, kolom ke-4)
xlsWriteLabel(0,8,"No Telepon");
 
// -------- menampilkan data --------- //

// koneksi ke mysql

mysql_connect("localhost", "root", "");
mysql_select_db("dbujian");

// query menampilkan semua data

//tangkap data dari form

$tanggal_awal= $_GET['tanggal_awal'];
$tanggal_akhir = $_GET['tanggal_akhir'];
$nasabah = $_GET['nasabah'];


$query = "SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim where tuser.nama like '%$nasabah%' and tuser.tanggal between '$tanggal_awal' and '$tanggal_akhir'";
$hasil=mysql_query($query) or die (" Maaf ada kesalahan");
	
// nilai awal untuk baris cell
$noBarisCell = 1;

// nilai awal untuk nomor urut data
$noData = 1;

while ($data = mysql_fetch_array($hasil))
{
   // menampilkan no. urut data
   xlsWriteNumber($noBarisCell,0,$noData);

   // menampilkan data nim
   xlsWriteLabel($noBarisCell,1,$data['nim']);
   
   // menampilkan data nim
   xlsWriteLabel($noBarisCell,2,$data['tanggal']);

   // menampilkan data nama mahasiswa
   xlsWriteLabel($noBarisCell,3,$data['nama']);

// menampilkan data nama mahasiswa
   xlsWriteLabel($noBarisCell,4,$data['kelas']);

   // menampilkan data nilai
   xlsWriteNumber($noBarisCell,5,$data['nilai']);
   // menampilkan data nilai
   xlsWriteNumber($noBarisCell,6,$data['nilai1']);
   
// menampilkan data nilai
   xlsWriteNumber($noBarisCell,7,$data['nilai2']);
   
   // menampilkan data nilai
   xlsWriteNumber($noBarisCell,8,$data['tlp']);
   // menampilkan status kelulusan
   //xlsWriteLabel($noBarisCell,4,$status);

   // increment untuk no. baris cell dan no. urut data
   $noBarisCell++;
   $noData++;
}

// memanggil function penanda akhir file excel
xlsEOF();
exit();

?>
