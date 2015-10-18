<?php
// Paging Administrator
class Paging{
function cariPosisi($batas){
if(empty($_GET['halaman'])){
$posisi=0;
$_GET['halaman']=1;
}
else{
$posisi = ($_GET['halaman']-1) * $batas;
}
return $posisi;
}
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
if($halaman_aktif > 1){
$prev = $halaman_aktif-1;
$link_halaman .= "<a href='?page=$_GET[page]&halaman=1' class='pagging'>&laquo; First</a> 
                  <a href='?page=$_GET[page]&halaman=$prev' class='pagging'>&laquo; Previous</a> ";
}
else{ 
$link_halaman .= "<a href='#' class='pagging-off'>&laquo; First</a> <a href='#' class='pagging-off'>&laquo; Prev</a> ";
}


$angka = ($halaman_aktif > 3 ? " ... " : " "); 
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
  if ($i < 1)
  	continue;
	  $angka .= "<a href='?page=$_GET[page]&halaman=$i' class='pagging'>$i</a> ";
  }
	  $angka .= " <b>$halaman_aktif</b> ";
	  
    for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
    if($i > $jmlhalaman)
      break;
	  $angka .= "<a href='?page=$_GET[page]&halaman=$i' class='pagging'>$i</a> ";
    }
	  $angka .= ($halaman_aktif+2<$jmlhalaman ? " ... <a href='?page=$_GET[page]&halaman=$jmlhalaman' class='pagging'>
	  $jmlhalaman</a>  " : " ");

$link_halaman .= "$angka";


if($halaman_aktif < $jmlhalaman){
	$next = $halaman_aktif+1;
	$link_halaman .= " <a href=?page=$_GET[page]&halaman=$next class='pagging'>Next &raquo;</a> 
                     <a href=?page=$_GET[page]&halaman=$jmlhalaman' class='pagging'>Last &raquo;</a> ";
}
else{
	$link_halaman .= "<a href='#' class='pagging-off'>Next &raquo;</a> 
                  <a href='#' class='pagging-off'>Last &raquo;</a> ";
}
return $link_halaman;
}
}
?>
