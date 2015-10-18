<?php
session_start();
if(empty($_SESSION[username])) {
include "error/error-access-denied-page.php";
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
else if($_GET['page']=="soalanalisa"){
include "soalanalisa.php";

}



// Users
else if($_GET['page']=="users"){
if ($_SESSION[typeuser]=='user'){
include "/users.php";
}
else{
echo "<meta http-equiv='refresh' content='0; url=error/error-access-denied-page.php'>";
}
}


// Data Pegawai
else if($_GET['page']=="datapegawai"){
include "datapegawai.php";
}

// Cari Pegawai
else if($_GET['page']=="caripegawai"){
include "caripegawai.php";
}

else{
include "home.php";
}

}
?>