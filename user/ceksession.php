<?php
session_start();

if (!isset($_SESSION['username']))
{
	echo "Anda belum login<br>";
	echo "Silakan Login terlebih dahulu";
	exit;
	
}
 
?>