<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['username'])) {
include "error/error-access-denied-page.php";
}
else{
?>
<div id="header-content1">

		<b><?=$view_conf[site_title]?></b><br />
		Login Date: <?php $date = date("l, d F, Y - H:i A"); echo "$date";?>
		<br>Anda Login sebagai <?php  echo $_SESSION['username'] ?>
</div>
		
<div id="header-content2">
<?php
if ($_SESSION['typeuser']==''){
?>
	<img src="images/images_admin/img_admin_home.png" align="absmiddle" class="img_header" /> 
	<a href="user-home.php">Dashboard</a> 
		
	<img src="images/images_admin/img_admin_user.png" align="absmiddle" class="img_header" /> 
	<a href="user-home.php?page=users">Users</a> 
		
	<img src="images/images_admin/img_admin_logout.png" width="22" height="20" align="absmiddle" class="img_header" /> 
	<a href="logout.php">Logout</a>
<?php
}
else{
?>
	<img src="images/images_admin/img_admin_home.png" align="absmiddle" class="img_header" /> 
	<a href="user-home.php">Dashboard</a> 
		
	<img src="images/images_admin/img_admin_logout.png" width="22" height="20" align="absmiddle" class="img_header" /> 
	<a href="logout.php">Logout</a>
<?php
}
?>

</div>
<?php
}
?>