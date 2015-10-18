<?php
function ubah_teks($teks)
{
   $teks = strrev($teks);
  
   $st = "";
   for ($i=0; $i < strlen($teks); $i++)
   {
      $ascii = ord(substr($teks,  $i, 1));
	  
	  $hex = dechex($ascii);
      if (strlen($hex) == 1)
         $hex = "0" . $hex;
		 
	  $st = $st . $hex;
   }
   
   return $st;
}

function balik_teks($teks)
{
   $st = "";
   for ($i=0; $i < strlen($teks) / 2; $i++)
   {
      $dua_angka = substr($teks,  2 * $i, 2);	  
	  $des = hexdec($dua_angka);
      $kar = chr($des);
		 
	  $st = $st . $kar;
   }
   
   $st = strrev($st);
   return $st;
}
?>