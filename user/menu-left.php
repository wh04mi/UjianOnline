<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['username'])) {
include "error/error-access-denied-page.php";
}else{
if ($_SESSION['typeuser']=='admin'){
?>
<div style="float: left" id="my_menu" class="sdmenu">
</div>

<?php
}
else{
?>
<div style="float: left" id="my_menu" class="sdmenu">
	<div style="margin-bottom:15px;" id="round1">
		<span id="round1">Dashboard</span>
		<a href="user-home.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Dashboard
		</a>
		
		
		<a href="logout.php" style="padding-bottom:10px;">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Logout
		</a>
	</div>

	<!-- Post Menu -->
	
	<div class="collapsed" style="margin-bottom:15px;">
		<span id="round1">Lembar Soal</span>
		<a href="soalanalisa.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Analisa
		</a>
		
		<a href="soalkuantitatif.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Kemampuan Kuantitatif
		</a>
		
		<a href="soalinggris.php">
		<img src="images/images_admin/img_admin_arrow.png" border="0" /> Bahasa Inggris
		</a>
		
	</div>
	
	
	<!-- Comment Menu -->
	

	<!-- Help & Learn -->

</div>
<?php 
}
?>
<?php
}
?>