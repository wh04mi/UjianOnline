<html>
<head>
<title>Memproses File yang Di-Upload</title>
</head>
<body>

<?php
include "../koneksi.php";
  // Info file

  $jumlah_file = count($_FILES["fileunggah"]);
  
  $kosong_semua = TRUE;
  for ($i=0; $i<$jumlah_file; $i++)
     if (!empty($_FILES["fileunggah"]["name"][$i]))
	    $kosong_semua = FALSE;
		
  if ($kosong_semua)
     die("Paling tidak ada satu file yang akan di-upload");
  
  // Proses penyalinan file ke folder upload
  for ($i=0; $i<$jumlah_file; $i++)
  {
     $namafile = $_FILES["fileunggah"]["name"][$i];
	 if (!empty($namafile))
	 {
        $tipe = $_FILES["fileunggah"]["type"][$i];
        $ukuran = $_FILES["fileunggah"]["size"][$i];
        $file_sementara = $_FILES["fileunggah"]["tmp_name"][$i];
		
	$query = mysql_query("insert into upload values( '$namafile', '$tipe', '$ukuran','$file_sementara')") or die(mysql_error());

  
        print("Nama :" . $namafile);
        print(" ($ukuran byte), ");
        print("tipe " . $tipe);

        // Salin ke lokasi
        if (copy($file_sementara, $_SERVER['DOCUMENT_ROOT'] .
              "/pegawai/data/$namafile"))
        {
           print(" telah disalin\n<br>");
		   print(" <meta http-equiv='refresh' content='2; url=upload.php'>");
           unlink($file_sementara);
        }
        else
           print(" gagal disalin\b<br>");
		   print(" <meta http-equiv='refresh' content='2; url=upload.php'>");
     }	   
  }	 
?>

</body>
</html>
