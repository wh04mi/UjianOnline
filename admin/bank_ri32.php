<html>
<head>
	<title>LAPORAN HASIL UJIAN</title>
    <link rel="stylesheet" href="tabel.css" />
	 <link rel="stylesheet" href="tombol.css" />
</head>
<body onLoad="document.postform.elements['nasabah'].focus();">

<?php  //untuk koneksi database
include "koneksi.php";
	
//untuk menantukan tanggal awal dan tanggal akhir data di database
$min_tanggal=mysql_fetch_array(mysql_query("select min(tanggal) as min_tanggal from tuser"));
$max_tanggal=mysql_fetch_array(mysql_query("select max(tanggal) as max_tanggal from tuser"));
?>

<form action="bank_ri32.php" method="get" name="postform">
<table width="435" border="0">
<tr>
    <td width="111">Nama Mahasiswa</td>
    <td colspan="2"><input type="text" name="nasabah" value="<?php  if(isset($_GET['nasabah'])){ echo $_GET['nasabah']; }?>"/></td>
</tr>
<tr>
    <td>Tanggal Awal</td>
    <td colspan="2"><input type="text" name="tanggal_awal" size="15" value="<?php  echo $min_tanggal['min_tanggal'];?>"/>
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
    </td>
</tr>
<tr>
    <td>Tanggal Akhir</td>
    <td colspan="2"><input type="text" name="tanggal_akhir" size="15" value="<?php  echo $max_tanggal['max_tanggal'];?>"/>
    <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calender.jpeg" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>				
    </td>
</tr>
<tr>
    <td><input type="submit" value="Tampilkan Data" name="cari"></td>
    <td colspan="2">&nbsp;</td>
</tr>
</table>
</form>


<p>

<?php  //di proses jika sudah klik tombol cari
if(isset($_GET['cari'])){
	
	//menangkap nilai form
	$nasabah=$_GET['nasabah'];
	$tanggal_awal=$_GET['tanggal_awal'];
	$tanggal_akhir=$_GET['tanggal_akhir'];
	
	if(empty($nasabah) and empty($tanggal_awal) and empty($tanggal_akhir)){
		//jika tidak menginput apa2
		$query=mysql_query("SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim");
		
	}else{
		$query=mysql_query("select * from tuser where nama like '%$nasabah%' and tanggal between '$tanggal_awal' and '$tanggal_akhir'");	
		?><i>Jumlah Record : <?php echo mysql_num_rows($query);?><b> Informasi : </b> Pencarian Nama Mahasiswa <b><?php  echo ucwords($nasabah);?></b> dari tanggal <b><?php  echo $tanggal_awal;?></b> sampai dengan tanggal <b><?php  echo $tanggal_akhir; ?></b></i><?php  

	}

}else{
	$query=mysql_query("select * from tuser");
	
}
?>

</p>

<?php  
	$entries=50; //nilai awal==jumlah data yang ditampilkan setiap halaman
	$get_pages=mysql_num_rows($query); //dapatkan jumlah semua data
	
	if ($get_pages>$entries)  //jika jumlah semua data lebih banyak dari nilai awal yang diberikan
	{
		echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			if ($pages!=1)
			{
				echo " | ";
			}
		?>
		<!--Membuat link sesuai nama halaman-->
		<a href="bank_ri32.php?page=<?php  echo ($pages-1); ?><?php if(isset($_GET['cari'])){ echo "&nasabah=".$_GET['nasabah']."&tanggal_awal=".$_GET['tanggal_awal']."&tanggal_akhir=".$_GET['tanggal_akhir']."&cari=Tampilkan+Data";} ?>" style="text-decoration:none"><font size="2" face="verdana" color="#009900"><?php  echo $pages; ?></font></a>
		 <?php 
				$pages++;
		}
	}else{
		$pages=0;
	}
	
	//**************akhir paging*****************//
	?></font><?php
	$page=(int)$_GET['page'];
	$offset=$page*$entries;
	
	if(isset($_GET['cari'])){
		//ambil parameter dari link GET
		$nasabah=$_GET['nasabah'];
		$tanggal_awal=$_GET['tanggal_awal'];
		$tanggal_akhir=$_GET['tanggal_akhir'];
		
		
		
		//menampilkan data dengan menggunakan limit sesuai parameter paging yang diberikan
		$result=mysql_query("SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim where tuser.nama like '%$nasabah%' and tuser.tanggal between '$tanggal_awal' and '$tanggal_akhir' limit $offset,$entries"); //output
	}else{
		$result=mysql_query("SELECT tuser.tanggal, tuser.nim, tuser.nama, kelas, tlp,  tjawab.nilai, tjawab1.nilai1, tjawab2.nilai2 FROM tuser INNER JOIN tjawab ON tuser.nim = tjawab.nim INNER JOIN tjawab1 ON tuser.nim = tjawab1.nim INNER JOIN tjawab2 ON tuser.nim = tjawab2.nim  limit $offset,$entries");
	}
	
?>
<center><h3>LAPORAN DATA HASIL UJIAN<br>
MAHASISWA BARU</h3></center>

<?php
echo "<a href =\"download.php?nasabah=$nasabah&tanggal_awal=$tanggal_awal&tanggal_akhir=$tanggal_akhir\"><img src=\"excel-icon.jpeg\"> Export to Excel</a><br><br>";
?>


<table class="datatable">
	<tr>
    	<th width="34">No</th>
    	<th width="90">Tanggal</th>
    	<th width="200">Nama Mahasiswa </th>
    	<th width="200">Jurusan</th>
		<th width="200">Telepon</th>
		<th width="100">Analisa</th>
		<th width="100">Kuantitatif</th>
		<th width="100">B. Inggris</th>
    </tr>
	<?php  //untuk penomoran data
	$no=0;
	
	//menampilkan data
	while($row=mysql_fetch_array($result)){
	?>
    <tr>
    	<td><?php  echo $offset=$offset+1; ?></td>
		<td><?php  echo $row['tanggal']; ?></td>
		<td><?php  echo $row['nama'];?></td>
		<td align="center"><?php  echo $row['kelas'];?></td>
			<td align="center"><?php  echo $row['tlp'];?></td>
		<td align="center"><?php  echo $row['nilai'];?></td>
		<td align="center"><?php  echo $row['nilai1'];?></td>
		<td align="center"><?php  echo $row['nilai2'];?></td>
		
    </tr>
    <?php  }
	?>
         
    <tr>
    	<td colspan="4" align="center"> 
		<?php  //jika data tidak ditemukan
		if(mysql_num_rows($query)==0){
			echo "<font color=red><blink>Tidak ada data yang dicari!</blink></font>";
		}
		?>
        </td>
    </tr>
     
</table>

<iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>
</body>
</html>