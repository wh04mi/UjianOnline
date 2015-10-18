
<form action=isinilai.php method=post id=formulir>
<ol>
<?php
include "koneksi.php";

$soal = mysql_query("SELECT * FROM tsoal LIMIT 25"); //mengambil soal 10
$no = 1;


while($s = mysql_fetch_array($soal)){
    echo "<li><b>".$s['pertanyaan']."</b><br>\n";
    echo "<input type=radio name=soal[".$s['soalid']."] value='a'>A. ".$s['pilihan_a']."<br>\n";
    echo "<input type=radio name=soal[".$s['soalid']."] value='b'>B. ".$s['pilihan_b']."<br>\n";
    echo "<input type=radio name=soal[".$s['soalid']."] value='c'>C. ".$s['pilihan_c']."<br>\n";
    echo "<input type=radio name=soal[".$s['soalid']."] value='d'>D. ".$s['pilihan_d']."<br>\n";
    $no++;
}
$jumlahsoal = $no - 1;
echo "<input type=hidden name=jumlahsoal value=$jumlahsoal>";
$benar = 0;
$salah = 0;
if($_POST['tsoal']){
foreach($_POST['tsoal'] as $key => $value){
    $cek = mysql_query("SELECT * FROM tsoal WHERE soalid=$key");
    while($c = mysql_fetch_array($cek)){
        $jawaban = $c['jawaban'];
    }
    if($value==$jawaban){
        $benar++;
    }else{
        $salah++;
    }
}
$jumlah = $_POST['jumlahsoal'];
$jumlahbenar=$benar*4;
$tidakjawab = $jumlahbenar - $salah;
echo "Benar = $jumlahbenar <br>";
echo "Salah = $salah <br>";
echo "Total Niali = $tidakjawab";

}
?>
</ol>
<input type="submit" name="button2" id="button2" value="submit" />

</form>
