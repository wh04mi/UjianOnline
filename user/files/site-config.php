<?php
session_start();
if(empty($_SESSION[username]) || empty($_SESSION[username])) {
include "error/error-access-denied-module.php";
}
else{
if ($_SESSION[typeuser]=='admin'){

// Halaman Awal Untuk Menampilkan Data
switch($_GET[act]){
default:

$mod_config = mysql_query("select * from mini_config");
$rr		    = mysql_fetch_array($mod_config);

echo"
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Setting Configuration 
</div>
";

echo "
<form action=\"?page=config&act=update\" method=\"post\" id=\"form-area\" style=\"width:385px\">
<input type=hidden name='id' value='$rr[id_config]'>

<div style=\"width:90px\" id=\"form-label\">Title Site</div>
<input type=\"text\" name=\"title\" id=\"form-input\" size=\"40\" value=\"$rr[site_title]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Reason Site</div>
<input type=\"text\" name=\"reason\" id=\"form-input\" size=\"40\" value=\"$rr[site_reason]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Author</div>
<input type=\"text\" name=\"author\" id=\"form-input\" size=\"40\" value=\"$rr[site_author]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Site Email</div>
<input type=\"text\" name=\"email\" id=\"form-input\" size=\"40\" value=\"$rr[site_email]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Site URL</div>
<input type=\"text\" name=\"url\" id=\"form-input\" size=\"40\" value=\"$rr[site_url]\" />
<br />

<div style=\"width:90px\" id=\"form-label\">Keyword</div>
<input type=\"text\" name=\"keyword\" id=\"form-input\" size=\"40\" value=\"$rr[site_keyword]\" />
<br />

<textarea name=\"description\" cols=\"43\" rows=\"7\" id=\"form-input-textarea\">$rr[site_description]</textarea>
<br />

<input type=\"submit\" name=\"Submit\" value=\"Update And Save\" id=\"form-submit\" style=\"margin-bottom:5px;\"/>
</form>
</div>
";
break;


// Fungsi Untuk Prosess Update Data
case "update":
$author      = strip_tags($_POST["author"]);
$title       = strip_tags($_POST["title"]);
$keyword     = strip_tags($_POST["keyword"]);
$reason      = strip_tags($_POST["reason"]);
$email       = strip_tags($_POST["email"]);
$url         = strip_tags($_POST["url"]);
$description = $_POST["description"];
$valid_mail  = "^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

// Validation Form
if(empty($title)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Title Website Anda Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($reason)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Slogan/Reason Website Anda Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($author)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Author Website Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($email)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Website Anda Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if (!eregi($valid_mail, $email)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Email Website Tidak Valid. Isi Yang Benar! Contoh: virgiambar@yahoo.co.id :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($url)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Alamat Website Anda Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($keyword)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Meta Keyword Website Anda Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else if(empty($description)){
echo "
<div id=\"content\" style=\"height:650px\">
<div id=\"title_content\">
<img src=\"images/images_admin/icon_admin_setting.png\" align=\"absmiddle\" class=\"img_title\" /> Site Configuration
</div>
<div id=\"bg_content_error\">
<img src=\"images/images_admin/img_admin_error.png\" align=\"absmiddle\" class=\"img_del\" /> 
Maaf, Meta Description Website Anda Belum Di isi :) Silahkan Isi Lagi 
<a href='?page=config&act=edit&id=$_POST[id]' class='action'>Click Here</a>
</div>
</div>
";
}
else{
mysql_query("UPDATE mini_config SET   site_title  	   = '$title',
                                      site_author      = '$author',
									  site_keyword     = '$keyword',
									  site_description = '$description',
								      site_url	       = '$url',
									  site_reason      = '$reason',
									  site_email	   = '$email'
                              WHERE   id_config    	   = '$_POST[id]'");
						   
echo "<meta http-equiv='refresh' content='0; url=?page=config'>"; 
}
break;
}

}
else{
echo "<meta http-equiv='refresh' content='0; url=../../error/error-access-denied-page.php'>";
}

}
?>