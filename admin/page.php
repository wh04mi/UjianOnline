<?php
session_start();
if(!empty($_SESSION[username]) || !empty($_SESSION[username])) {
include './error/error-access-denied-page.php';
}
else{
include "../koneksi.php";
include "files/pagging.php";

// Dashboard
if($_GET['page']=="home"){
include "home.php";
}

// Site Configuration
else if($_GET['page']=="config"){
if ($_SESSION[typeuser]=='admin'){
include "files/site-config.php";
}
else{
echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
}
}

// Cari Pegawai
else if($_GET['page']=="caripegawai"){
if ($_SESSION[typeuser]=='admin'){
include "caripegawai.php";
}
else{
echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
}
}

// Users
else if($_GET['page']=="users"){
if ($_SESSION[typeuser]=='admin'){
include "user.php";
}
else{
echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
}
}


// Soal
else if($_GET['page']=="listsoalanalisa"){
include "listsoalanalisa.php";
}

// Cari Pegawai
else if($_GET['page']=="listsoalkuantitatif"){
include "listsoalkuantitatif.php";
}

else if($_GET['page']=="listsoalinggris"){
include "listsoalinggris.php";
}

else{
include "home.php";
}

}
?>