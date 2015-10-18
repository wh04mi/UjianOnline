	  <?php
	
	include "../koneksi.php";
	$no=$_POST[no];
	$kd_mp=$_POST[kd_mp];
	$kelas=$_POST[kelas];
	$soalt=$_POST[soalt];
	$keyjab=$_POST[keyjab];
	$pil_1=$_POST[pil_1];
	$pil_2=$_POST[pil_2];
	$pil_3=$_POST[pil_3];
	$pil_4=$_POST[pil_4];
	$query="INSERT INTO tsoal
	VALUES('$no','mp1','9','$keyjab','$soalt','$pil_1','$pil_2','$pil_3','$pil_4')";
		if(!mysql_query($query))
			{
				echo("Invalid Query!<br> Please Register Again...<br>");
				exit;
			}
		echo("Anda berhasil input soal...<br>");
?>
     
	  <form id="input" name="input" method="post" action="inputsoal.php">
        <table width="452" border="0" align="center">
          <tr>
            <td class="style">No</td>
            <td><input type="text" name="no" id="no" /></td>
          </tr>
          <tr>
            <td height="451" colspan="2"><p class="style"><strong>Inputkan Soal:
              </strong></p>
              <p>
                <textarea name="soalt" cols="45" id="soalt"></textarea>
              </p>
            <p class="style">Pilihan jawaban:</p>
            <p><span class="style">Pilihan <span class="style">A</span></span>
              <input type="text" name="pil_1" id="pil_1" />
</p>
            <p><span class="style">Pilihan <span class="style">B</span></span>
              <input type="text" name="pil_2" id="pil_2" />
            </p>
            <p><span class="style">Pilihan </span><span class="style">C</span>
              <input type="text" name="pil_3" id="pil_3" />
</p>
            <p><span class="style">Pilihan </span><span class="style">D</span>
              <input type="text" name="pil_4" id="pil_4" />
            </p>
            <p>&nbsp;</p>
            <p><span class="style">Kunci Jawaban</span> 
              <input type="text" name="keyjab" id="keyjab" />
            </p>
            <p>
              <label>
              <input type="reset" name="cancel" id="cancel" value="CANCEL"/>
              </label>
              <label>
              <input type="submit" name="input" id="input" value="SAVE" />
              </label>
            </p></td>
          </tr>
        </table>
        <p><label></label>
        </p>
      </form>
   