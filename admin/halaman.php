<?php
class kelas_halaman
{
   // Properti
   var $halaman_sekarang;
   var $jumlah_data;
   var $jumlah_halaman;
   var $baris_per_halaman;
   
   // Konstruktor
   function kelas_halaman($jum_baris_per_hal)
   {
      $this->baris_per_halaman = $jum_baris_per_hal;
	  
      $this->halaman_sekarang = $_GET['page'];
      if (empty($this->halaman_sekarang))
         $this->halaman_sekarang = 1;
   }
   
   function tentukan_total_baris($jumlah)
   {
      $this->jumlah_data = $jumlah;
	  $this->jumlah_halaman= 
	     ceil($jumlah / $this->baris_per_halaman);
   }   

   function peroleh_awal_record()
   {
      $awal_record = ($this->halaman_sekarang - 1) * 
	                 $this->baris_per_halaman;
	  return $awal_record;				 
   }   
   
   function tampilkan_link_halaman()
   {
	  if ($this->jumlah_halaman > 1)
	  {
	    print("Halaman: ");
		for ($hal = 1; $hal <= $this->jumlah_halaman; $hal++)
		{
		   if ($hal == $this->halaman_sekarang)
			  echo "$hal | ";
		   else   
			  {
			     $nama_skrip = $_SERVER['PHP_SELF'];
				 
			     echo "<a href=\"$nama_skrip?page=$hal\">$hal</a> |\n";
			  }
		}	
	  }
   }   
}
?>
