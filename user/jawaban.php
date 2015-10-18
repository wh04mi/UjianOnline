<div>
<?php
if(isset($_SESSION['id_user'])){
?>
        <h1>Hasil Jawaban <?php echo ucwords($_SESSION['username']);?></h1>
        
	   <?php 
       if(isset($_POST['submit'])){
			$pilihan=$_POST["pilihan"];
			$id_soal=$_POST["id"];
			$jumlah=$_POST['jumlah'];
			
			$score=0;
			$benar=0;
			$salah=0;
			$kosong=0;
			
			for ($i=0;$i<$jumlah;$i++){
				//id nomor soal
				$nomor=$id_soal[$i];
				
				//jika user tidak memilih jawaban
				if (empty($pilihan[$nomor])){
					$kosong++;
				}else{
					//jawaban dari user
					$jawaban=$pilihan[$nomor];
					
					//cocokan jawaban user dengan jawaban di database
					$query=mysql_query("select * from tabel_soal where id_soal='$nomor' and jawaban='$jawaban'");
					
					$cek=mysql_num_rows($query);
					
					if($cek){
						//jika jawaban cocok (benar)
						$benar++;
					}else{
						//jika salah
						$salah++;
					}
					
				} 
				$score = $benar*5;
			}
		}
		?>
        <form action="?page=simpan" method="post">
		<table width="100%" border="0">
		<tr>
			<td width="12%"><font color="#FFFFFF">Benar</font></td><td width="88%"><font color="#FFFFFF">= <?php echo $benar;?> soal x 5 point</font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF">Salah</font></td><td><font color="#FFFFFF">= <?php echo $salah;?> soal </font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF">Kosong</font></td><td><font color="#FFFFFF">= <?php echo $kosong;?> soal </font></td>
		</tr>
		<tr>
			<td><font color="#FFFFFF"><b>Score</b></font></td><td><font color="#FFFFFF">= <b><?php echo $score;?></b> Point</font></td>
		</tr>
		</table> 
        
        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']?>" />
        <input type="hidden" name="benar" value="<?php echo $benar;?>" />
        <input type="hidden" name="salah" value="<?php echo $salah;?>" />
        <input type="hidden" name="kosong" value="<?php echo $kosong;?>" />
        <input type="hidden" name="point" value="<?php echo $score;?>" />
        <p></p>
        <input type="submit" name="submit" value="Simpan Nilai" onclick="return confirm('Apakah Anda yakin akan menyimpan nilai ujian?')"/>
        
        </form> 
		
<?php
}else{
	?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}
?>
</div>
