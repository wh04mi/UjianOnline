<?php
session_start();
error_reporting(0);
if(empty($_SESSION['username']) || empty($_SESSION['username'])) {
include "error/error-access-denied-page.php";
}
else{
?>
<div id="content" style="height:650px;">
<div id="title_content">
<img src="images/images_admin/icon_admin_home.png" align="absmiddle" class="img_title" /> Dashboard
</div>

<div id="bg_content_welcome">
Selamat Datang Di Dashboard, Anda Login Sebagai User | Jangan Lupa Logout Setelah Selesai Membuka Halaman Ini :)
</div>
</div>
<?php
}
?>