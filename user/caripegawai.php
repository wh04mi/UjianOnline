<?php
session_start();

// Halaman Awal Untuk Menampilkan Data
switch($_GET[act]){
default:

echo "
<script type=\"text/javascript\">
function warning() {
return confirm('Are You Sure To Delete This Data?');
}
</script>
";

echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Pencarian Pegawai
<br><br>
<form action=\"user-home.php?page=caripegawai\" method=\"post\" name=\"pencarian\"  id=\"signupForm\">
              <input type=\"text\" name=\"search\" id=\"search\">
              <input type=\"submit\" name=\"submit\"  value=\"CARI\">
            </form>
</div>
";
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {
              $search = $_POST['search'];
              $sql = mysql_query("SELECT * FROM pegawai WHERE kode_pegawai LIKE '%$search%' or  nama_pegawai LIKE '%$search%' or umur LIKE '%$search%' or agama LIKE '%$search%' or alamat LIKE '%$search%'") or die(mysql_error());
              //menampilkan jumlah hasil pencarian
              $jumlah = mysql_num_rows($sql); 
              if ($jumlah > 0) {
                echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';
               		$no = 1;
                    
					
echo"
<table width=\"730\" id=\"table1\">
<tr>
<td>
";


echo"
<div id=\"bg_content_data_title\">
<div style=\"width:10px\">No</div>
<div style=\"width:90px\" align=\"center\">Kode pegawai</div>
<div style=\"width:140px\" align=\"center\">Nama pegawai</div>
<div style=\"width:70px\" align=\"center\">Umur</div>
<div style=\"width:70px\" align=\"center\">Agama</div>
<div style=\"width:120px\" align=\"center\">Alamat</div>

</div>
";
      while ($r=mysql_fetch_array($sql)) {

echo "
<div id=\"content_data\">
<div style=\"width:10px\">$no.</div>
<div style=\"width:90px\" align=\"center\">$r[kode_pegawai]</div>
<div style=\"width:140px\" align=\"center\">$r[nama_pegawai]</div>
<div style=\"width:70px\" align=\"center\">$r[umur]</div>
<div style=\"width:70px\" align=\"center\">$r[agama]</div>
<div style=\"width:120px\" align=\"center\">$r[alamat]</div>
</div>
";


					$no++;
                     }
              }
              else {
               // menampilkan pesan zero data
                echo 'Maaf, hasil pencarian tidak ditemukan.';
              }
            } 
            else { echo 'Masukkan dulu kata kuncinya';}


echo "
</td>
</tr>
</table>
";
echo "</div>";
break;




// Halaman Untuk Edit Data
case "edit":
$msql = mysql_query("select * from pegawai where kode_pegawai='$_GET[id]'");
$rr   = mysql_fetch_array($msql);

echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Edit Data Pegawai 
</div>
";

echo "
<form action=\"updatepegawai.php\" method=\"post\" id=\"form-area\" style=\"width:385px;\">
<input type=hidden name='id' value='$rr[kode_pegawai]'>

<div style=\"width:90px\" id=\"form-label\">Kode Pegawai</div>
<input type=\"text\" name=\"kode_pegawai\" id=\"form-input\" size=\"40\" value=\"$rr[kode_pegawai]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Nama Pegawai</div>
<input type=\"text\" name=\"nama_pegawai\" id=\"form-input\" size=\"40\" value=\"$rr[nama_pegawai]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Umur</div>
<input type=\"text\" name=\"umur\" id=\"form-input\" size=\"40\" value=\"$rr[umur]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">agama</div>
<select name=\"agama\" id=\"form-input\">
<option value='Islam'selected>Islam</option>
<option value='Kristen' >Kristen</option>
</select>

<br />
<div style=\"width:90px\" id=\"form-label\">Alamat</div>
<input type=\"text\" name=\"alamat\" id=\"form-input\" size=\"40\" value=\"$rr[alamat]\" />
<br />
";

echo"
<input type=\"submit\" name=\"Submit\" value=\"Update And Save\" id=\"form-submit\" style=\"margin-bottom:5px;\"/>
</form>
</div>
";
break;

// Validation Form
if(empty($kode_pegawai)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Kode Pegawai Belum Di isi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($_POST["nama_pegawai"])){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Nama Pegawai Belum Di isi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($umur)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Umur Belum Diisi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($agama)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Belum Diisi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($alamat)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Belum Diisi :) Silahkan Isi Lagi <a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
else{
$process = mysql_query("INSERT INTO  pegawai(
  								     kode_pegawai,
                                     nama_pegawai,
                                     umur,
									 agama,
									 alamat,
									 ) 
	                          VALUES('$kode_pegawai',
                                     '$nama_pegawai',
                                     '$umur',
                                     '$agama'
									 '$alamat'
									 )");

// Check If Exsist Username
if($process){
echo "<meta http-equiv='refresh' content='0; url=admin-home.php?page=datapegawai'>";
}
else{
echo "
<div id=\"content\" style=\"height:650px;\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Data Pegawai
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Username Sudah Ada Yang Memakai :) Silahkan Coba Username Yang Lain. 
<a href='admin-home.php?page=datapegawai' class='action'>Click Here</a>
</div>
</div>
";
}
}
break;


// Fungsi Untuk Prosess Delete Data
}

?>