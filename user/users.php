<?php
session_start();
if(empty($_SESSION[username]) || empty($_SESSION[username])) {
include "error/error-access-denied-module.php";
}
else{
if ($_SESSION[typeuser]=='user'){


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
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Users 
</div>
";

echo"
<table width=\"730\" id=\"table1\">
<tr>
<td>
";

echo"
<div id=\"bg_content_data_title\">
<div style=\"width:10px\">#</div>
<div style=\"width:100px\" align=\"center\">Username</div>
<div style=\"width:150px\" align=\"center\">Type User</div>

</div>
";

$p       = new Paging;
$batas   = 10;
$posisi  = $p->cariPosisi($batas);
$no		 = 1;
$sql	 = mysql_query("select * from users order by username ASC LIMIT $posisi,$batas");
while($r = mysql_fetch_array($sql)){

echo "
<div id=\"content_data\">
<div style=\"width:10px\">$no.</div>
<div style=\"width:100px\" align=\"center\">$r[username]</div>
<div style=\"width:150px\" align=\"center\">$r[typeuser]</div>

</div>
";

$no++;
}

echo "
</td>
</tr>
</table>
";

$jmldata=mysql_num_rows(mysql_query("SELECT * FROM users"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
echo "<div id=\"pagging\">$linkHalaman</div>";
echo "</div>";
break;




// Halaman Untuk Edit Data
case "edit":
$msql = mysql_query("select * from users where username='$_GET[id]'");
$rr   = mysql_fetch_array($msql);

echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Edit User 
</div>
";

echo "
<form action=\"updateuser.php\" method=\"post\" id=\"form-area\" style=\"width:385px;\">
<input type=hidden name='id' value='$rr[username]'>

<div style=\"width:90px\" id=\"form-label\">Username</div>
<input type=\"text\" name=\"username\" id=\"form-input\" size=\"40\" value=\"$rr[username]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Password</div>
<input type=\"text\" name=\"password\" id=\"form-input\" size=\"40\" value=\"$rr[password]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Type User</div>
<select name=\"typeuser\" id=\"form-input\">
<option value='admin'selected>Admin</option>
<option value='user' >User</option>
</select>
<br />
";

echo"
<div style=\"width:90px\" id=\"form-label\">Nama Lengkap</div>
<input type=\"text\" name=\"nama\" id=\"form-input\" size=\"40\" value=\"$rr[nama]\" />
<br />

<input type=\"submit\" name=\"Submit\" value=\"Update And Save\" id=\"form-submit\" style=\"margin-bottom:5px;\"/>
</form>
</div>
";
break;

// Validation Form
if(empty($username)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Users
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Username Belum Di isi :) Silahkan Isi Lagi <a href='?page=users&act=new' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($_POST["password"])){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Users
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Password Belum Di isi :) Silahkan Isi Lagi <a href='?page=users&act=new' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($nama)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Users
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Nama Lengkap Belum Diisi :) Silahkan Isi Lagi <a href='?page=users&act=new' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($typeuser)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Users
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Belum Diisi :) Silahkan Isi Lagi <a href='?page=users&act=new' class='action'>Click Here</a>
</div>
</div>
";
}
else{
$process = mysql_query("INSERT INTO  users(
  								     username,
                                     password,
                                     typeuser,
									 nama, 
									 ) 
	                          VALUES('$username',
                                     '$password',
                                     '$usertype',
                                     '$nama'
									 )");

// Check If Exsist Username
if($process){
echo "<meta http-equiv='refresh' content='0; url=?page=users'>";
}
else{
echo "
<div id=\"content\" style=\"height:650px;\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_user.png\" align=\"absmiddle\" class=\"img_title\" /> Users
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Username Sudah Ada Yang Memakai :) Silahkan Coba Username Yang Lain. 
<a href='?page=users&act=new' class='action'>Click Here</a>
</div>
</div>
";
}
}
break;


// Fungsi Untuk Prosess Delete Data
case "delete":
mysql_query("DELETE FROM users WHERE username='$_GET[id]'");
echo "<meta http-equiv='refresh' content='0; url=?page=users'>"; 
break;



break;
}

}
else{
echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
}

}
?>