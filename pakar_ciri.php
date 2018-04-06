<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextArea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextArea.css" rel="stylesheet" type="text/css" />
<?php
	require_once('otentifikasi.php');
	include("koneksi_db.php");
	$act=$_GET['act'];
	include("paging.php");
	if ($act=="tampilciri"){
?>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<div class="text_area" align="justify">      
<br /><div class="title">Pengolahan Data ciri - ciri Vertebrata</div>
<form action="?page=5&act=cariciri" method="post">
<table align="center" cellpadding="5" cellspacing="0">
  
 <!-- <tr>
    <td class="subtitle">Cari Data ciri - ciri Vertebrata </td>
    <td class="subtitle">:</td>
    <td><input name="nama_ciri2" type="text" id="nama_ciri2" size="25" /></td>
    <td valign="middle"><span id="sprytextfield11">
      <input name="submit" type="submit" value="Cari" />
      <br />
	<span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Data yang akan dicari harus dii</span></span></td>
  </tr>-->
</table>
</form>
<?php  $jmldata= mysql_num_rows(mysql_query("SELECT * FROM ciri")); echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record ciri</center>";?>
<br><table border="1"  align="center" cellpadding="5" cellspacing="0" bordercolor="#666666">
  <tr bgcolor="#0066CC" align="center">
    <td width="21"><div align="center"><b><font color="white" size=3>Id</font></b></div></td>
    <td width="958"><b><font color="white" size=3>Nama ciri</font></b></td>
    <td colspan="2"><b><font color="white" size=3>Proses</font></b></td>
    </tr>
  <?php
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM ciri ORDER BY kode_ciri ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>
   	<tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
    <td align="center"><div align="center"><?php echo $data['kode_ciri'];?></div></td>
    <td><?php echo $data['nama_ciri'];?></td>
    <td width="33" align="center"><a href="?page=5t&amp;act=editciri&amp;kode_ciri=<?php echo $data['kode_ciri'];?>"><img src="images/Modify.png" width="18" height="18" border="0" align="absmiddle" /> Ubah</a></td>
    <td width="39" align="center"><a href="?page=5t&act=editciri&kode_ciri=<?php echo $data['kode_ciri'];?>"></a><a href="?page=5&act=hapusciri&kode_ciri=<?php echo $data['kode_ciri'];?>" onclick="return confirm('Apakah anda yakin data ciri ini akan dihapus?')"><img src="images/Erase.png" width="18" height="18" border="0" align="absmiddle"> Hapus</a></td>
  </tr>
  <?php }?>
  <tr>
	<td colspan="4" align="center"><a href="?page=5&act=tambahciri"><img src="images/95.png" width="24" height="24"  border="0" align="absmiddle"> Tambah</a></td>
    </tr>
  </table>
  <?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM ciri"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<br><center>$linkHalaman</center>";
?>
  
</div>   

		
<?php
}


if ($act=="berhasil"){
?>
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<div class="text_area" align="justify">      
<br /><div class="title">Data ciri Berhasil Disimpan</div>
<br />
<form action="?page=5&act=cariciri" method="post">
<table align="center" cellpadding="5" cellspacing="0">
  
  <tr>
    <td class="subtitle">Cari Data Nama ciri</td>
    <td class="subtitle">:</td>
    <td><input name="nama_ciri2" type="text" id="nama_ciri2" size="25" /></td>
    <td valign="middle"><span id="sprytextfield11">
      <input name="submit" type="submit" value="Cari" />
      <br />
	<span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Data yang akan dicari harus dii</span></span></td>
  </tr>
</table>
</form>
<?php  $jmldata= mysql_num_rows(mysql_query("SELECT * FROM ciri")); echo "<center style=text-decoration:blink>Terdapat <b>$jmldata</b> record ciri</center>";?>
<br><table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#666666">
  <tr bgcolor="#0066CC" align="center">
    <td width="3%"><b><font color="white" size=3>Id</font></b></td>
    <td width="88%"><b><font color="white" size=3>Nama ciri</font></b></td>
    <td colspan="2"><b><font color="white" size=3>Proses</font></b></td>
    </tr>
  <?php
$p = new Paging;
$batas = 10;
$posisi = $p->cariPosisi($batas);

$no=0;
$qlog = mysql_query("SELECT * FROM ciri ORDER BY kode_ciri ASC LIMIT $posisi,$batas");
while($data = mysql_fetch_array($qlog)){
$no++;
?>
   	<tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
    <td align="center"><?php echo $data['kode_ciri'];?></td>
    <td><?php echo $data['nama_ciri'];?></td>
    <td width="4%" align="center"><a href="?page=5t&amp;act=editciri&amp;kode_ciri=<?php echo $data['kode_ciri'];?>"><img src="images/Modify.png" width="20" height="20" border="0" align="absmiddle" /> Ubah</a></td>
    <td width="5%" align="center"><a href="?page=5&act=hapusciri&kode_ciri=<?php echo $data['kode_ciri'];?>" onclick="return confirm('Apakah anda yakin data ciri ini akan dihapus?')"><img src="images/Erase.png" width="20" height="20" border="0" align="absmiddle"> Hapus</a></td>
  </tr>
  <?php }?>
  <tr>
	<td colspan="4" align="center"><a href="?page=5&act=tambahciri"><img src="images/95.png" width="24" height="24"  border="0" align="absmiddle"> Tambah</a></td>
    </tr>
  </table>
  <?php
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM ciri"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET['hal'], $jmlhalaman);
echo "<br><center>$linkHalaman</center>";
?>
  
</div>   

		
<?php
}



elseif ($act=="editciri"){
	$kode_ciri = $_GET['kode_ciri'];
	$qry = mysql_query("SELECT * FROM ciri WHERE kode_ciri='$kode_ciri'");
	$data = mysql_fetch_array($qry);
	$ya = $data['kode_induk_ya'];
	$tidak = $data['kode_induk_tidak'];
	
	$qry1 = "SELECT * FROM ciri WHERE kode_ciri = '$ya'";
	$result1 = mysql_query($qry1);
	$data1 = mysql_fetch_array ($result1);
	
	$nama_ciri_ya = $data1['nama_ciri'];
	
	$qry2 = "SELECT * FROM ciri WHERE kode_ciri = '$tidak'";
	$result2 = mysql_query($qry2);
	$data2 = mysql_fetch_array ($result2);
	
	$nama_ciri_tidak = $data2['nama_ciri'];
	
?>
<br>
<div class="text_area" align="justify">
<div class="title">Ubah Data ciri</div>
<br>
<form action="?page=5&act=aceditciri" method="post">
<table>
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Kode</td>
    <td>:</td>
    <td><input name="kode_ciri" type="text" size="5" maxlength="5" disabled value="<?php echo $kode_ciri;?>" />
    <input name="kode_ciri" type="hidden" value="<?php echo $kode_ciri;?>" /></td>
  </tr>
  <tr>
    <td class="subtitle">Nama ciri</td>
    <td>:</td>
    <td><span id="sprytextfield22"><input name="nama_ciri" type="text" value="<?php echo $data['nama_ciri'];?>" size="30" />
	<br />
	<span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Nama ciri harus diisi</span></span></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td>ciri Ini Muncul Setelah</td>
    <td>:</td>
	<td></td>
  </tr>
   <tr>
    <td colspan="3"><br></td>
    
  </tr>
  <tr>
    <td class="subtitle">Jawaban YA pada</td>
    <td>:</td>
    <td><select name="kode_induk_ya" id="kode_induk_ya">
                  <?php
				   if ($ya=='') echo "<option value=''>- TIDAK ADA -</option>";
				   else{ echo "<option value='$ya'>[$ya] $nama_ciri_ya</option>";
				   echo "<option value=''>- TIDAK ADA -</option>";
				   }               
				$qryp = mysql_query("SELECT * FROM ciri where kode_ciri!='$ya'");
				while($datap = mysql_fetch_array($qryp)){
					echo "<option value='$datap[kode_ciri]'>[$datap[kode_ciri]] $datap[nama_ciri]</option>";
				}		  
				?>
                </select>
		</td>
  </tr>
  <tr>
    <td class="subtitle">Jawaban TIDAK pada</td>
    <td>:</td>
    <td><select name="kode_induk_tidak" id="kode_induk_tidak">
                  <?php
				   if ($tidak=='') echo "<option value=''>- TIDAK ADA -</option>";
				   else{ echo "<option value='$tidak'>[$tidak] $nama_ciri_tidak</option>";
				   echo "<option value=''>- TIDAK ADA -</option>";
				   }
				  
				$qryp = mysql_query("SELECT * FROM ciri where kode_ciri!='$tidak'");
				while($datap = mysql_fetch_array($qryp)){
					echo "<option value='$datap[kode_ciri]'>[$datap[kode_ciri]] $datap[nama_ciri]</option>";
				}
				?>
                </select>
		</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="simpan" value="Simpan" onclick="return confirm('Apakah anda yakin data ciri ini akan disimpan?')"/>
	<input type="button" name="batal" value="Batal" onclick="javascript:history.go(-1)" /></td>
    </tr>
</table>
</form>
</div>
<?php
}
elseif ($act=="aceditciri"){
	$kode_ciri = $_POST['kode_ciri'];
	$nama_ciri = $_POST['nama_ciri'];
	$kode_induk_ya = $_POST['kode_induk_ya'];
	$kode_induk_tidak = $_POST['kode_induk_tidak'];
	
	
	mysql_query("UPDATE ciri SET nama_ciri='$nama_ciri',kode_induk_ya='$kode_induk_ya',kode_induk_tidak='$kode_induk_tidak' WHERE kode_ciri='$kode_ciri'");
	echo "<meta http-equiv=\"refresh\" content=\"0; url=pakar_index.php?page=5&act=berhasil\">";
}
elseif ($act=="hapusciri"){
  $kode_ciri = $_GET['kode_ciri'];
  
  if(mysql_num_rows(mysql_query("SELECT * FROM relasi_golongan_ciri WHERE kode_ciri='$kode_ciri'")) < 1){	
	if ($kode_ciri != ""){
		mysql_query("DELETE FROM ciri WHERE kode_ciri='$kode_ciri'");
		echo "<meta http-equiv=\"refresh\" content=\"0; url=pakar_index.php?page=5&act=berhasil\">";
	}
	else {
		echo "Data ciri belum dipilih.";
	}
  }
  else{
    $qry = mysql_query("SELECT * FROM ciri WHERE kode_ciri='$kode_ciri'");
	$data = mysql_fetch_array($qry);
	echo "<center ><br><br><b>Maaf, ciri <font color=red> $data[nama_ciri]</font> tidak bisa dihapus karena sedang digunakan atau berelasi dengan suatu golongan.</b></center>";
  ?><br><center><input type="button" name="batal" value="Kembali" onclick="javascript:history.go(-1)" /></center>
	<?php
  }
}
if ($act=="tambahciri"){
?>

<div class="text_area" align="justify">      
<br /><div class="title">Tambah Data ciri</div>
<br />
<form action="?page=5&act=actambahciri" method="post">
<table>
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Kode ciri</td>
    <td>:</td>
    <td><input name="kode_ciri" type="text" size="5" maxlength="5" disabled value="<?php echo kdautociri("ciri", "G");?>" />
    <input name="kode_ciri" type="hidden" value="<?php echo kdautociri("ciri", "G");?>" /></td>
  </tr>
  
  <tr>
    <td class="subtitle">Nama ciri</td>
    <td>:</td>
    <td><span id="sprytextarea31"><textarea name="nama_ciri" cols="30" rows="3"></textarea><br />
	<span class="textareaRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Nama ciri masih kosong.</span></span></td>
  </tr>
  <tr>
   <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
 <tr>
    <td>ciri Ini Muncul Setelah</td>
    <td>:</td>
	<td></td>
  </tr>
   <tr>
    <td colspan="3"><br></td>
    
  </tr>
  <tr>
    <td class="subtitle">Jawaban YA pada</td>
    <td>:</td>
    <td><select name="kode_induk_ya" id="kode_induk_ya">
                  <option value=''>- TIDAK ADA -</option>
				  <?php
				   
				$qryp = mysql_query("SELECT * FROM ciri");
				while($datap = mysql_fetch_array($qryp)){
					echo "<option value='$datap[kode_ciri]'>[$datap[kode_ciri]] $datap[nama_ciri]</option>";
				}
				?>
                </select>
				</td>
  </tr>
  <tr>
    <td class="subtitle">Jawaban TIDAK pada</td>
    <td>:</td>
    <td><select name="kode_induk_tidak" id="kode_induk_tidak">
				<option value=''>- TIDAK ADA -</option>
	<?php
				  
				$qryp = mysql_query("SELECT * FROM ciri");
				while($datap = mysql_fetch_array($qryp)){
					echo "<option value='$datap[kode_ciri]'>[$datap[kode_ciri]] $datap[nama_ciri]</option>";
				}
				?>
                </select>
				</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="simpan" value="Simpan" />
	<input type="button" name="batal" value="Batal" onclick="javascript:history.go(-1)" />
      </td>
    </tr>
 
</table>
</form>
</div>
<?php
}
elseif ($act=="actambahciri"){
	$kode_ciri = $_POST['kode_ciri'];
	$nama_ciri = $_POST['nama_ciri'];
	$kode_induk_ya = $_POST['kode_induk_ya'];
	$kode_induk_tidak = $_POST['kode_induk_tidak'];
	
	
	$cek = mysql_query("SELECT * FROM ciri");
	$jumlah = mysql_num_rows($cek);
	$id = $jumlah+1;
		mysql_query("INSERT INTO ciri  (kode_ciri, nama_ciri, kode_induk_ya, kode_induk_tidak) VALUES  ('$kode_ciri','$nama_ciri','$kode_induk_ya', '$kode_induk_tidak')");
		
		
		echo "<meta http-equiv=\"refresh\" content=\"0; url=?page=5&act=berhasil\">";
}
elseif($act=="cariciri"){
  $nama_ciri = $_POST['nama_ciri'];
  $cari=mysql_query("SELECT * FROM ciri WHERE nama_ciri='$nama_ciri'");
  $jumlah=mysql_num_rows($cari);
  if($jumlah<1){
  ?>
  <div class="text_area" align="justify">      
<br /><div class="title">Data ciri Tidak Ditemukan</div>
<br />
  <form action="?page=5&act=cariciri" method="post">
<table align="center" cellpadding="5" cellspacing="0">
<tr>
    <td colspan="3">&nbsp;</td>
</tr>
 <!-- <tr>
    <td class="subtitle">Cari Data Nama ciri</td>
    <td>:</td>
    <td><span id="sprytextfield21"><input name="nama_ciri" type="text" id="nama_ciri" size="25" />
	<br />
	<span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Data yang akan dicari harus diisi</span></span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td  align="right"><input type="submit" value="Cari" /></td>
    </tr>-->
</table>
</form>
</div>
  <?php
    echo "<center style=text-decoration:blink><br><br><b>Maaf, data <font color=red>'$nama_ciri'</font> tidak ditemukan dalam database.</b><br></center>";
	?><br><center><input type="button" name="batal" value="Kembali" onclick="javascript:history.go(-1)" /></center>
	<?php

  }else{
  ?>
<div class="text_area" align="justify">      
<br /><div class="title">Data ciri Ditemukan</div>
<br />
<form action="?page=5&act=cariciri" method="post">
<table align="center" cellpadding="5" cellspacing="0">
   <tr>
     <td colspan="3">&nbsp;</td>
   </tr>
  <tr>
    <!--<td class="subtitle">Cari Data Nama ciri</td>
    <td>:</td>
    <td><span id="sprytextfield21"><input name="nama_ciri" type="text" id="nama_ciri" size="25" />
	<br />
	<span class="textfieldRequiredMsg"><img src="images/cancel_f2.png"width="10" height="10"> Data yang akan dicari harus diisi</span></span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
  <td></td>
  <td></td>
  <td  align="right"><input type="submit" value="Cari" /></td>
    </tr>-->
</table>
</form>
<br>
<br><table border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#666666">
  <tr bgcolor="#0066CC" align="center">
    <td><b><font color="white" size=3>Nama ciri</font></b></td>
    <td colspan="2"><b><font color="white" size=3>Proses</font></b></td>
    </tr>
  <?php
$qry = mysql_query("SELECT * FROM ciri WHERE nama_ciri='$nama_ciri' ");
	while($data=mysql_fetch_array($qry)){

?>
   	<tr>
    <td><?php echo $data['nama_ciri'];?></td>
    <td align="center"><a href="?page=5t&amp;act=editciri&amp;kode_ciri=<?php echo $data['kode_ciri'];?>"><img src="images/Modify.png" width="20" height="20" border="0" align="absmiddle" /> Ubah</a> </td>
    <td align="center"><a href="?page=5&act=hapusciri&kode_ciri=<?php echo $data['kode_ciri'];?>" onclick="return confirm('Apakah anda yakin data ciri ini akan dihapus?')"><img src="images/Erase.png" width="20" height="20" border="0" align="absmiddle"> Hapus</a></td>
  </tr>
  <?php }?>
  
  </table>
  <br><center><input type="button" name="batal" value="Kembali" onclick="javascript:history.go(-1)" /></center>
  
</div>   
	</div>
    <?php
  }

}
?>

	
<script type="text/javascript">
<!--
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11");
var sprytextfield22 = new Spry.Widget.ValidationTextField("sprytextfield22");

var sprytextarea31 = new Spry.Widget.ValidationTextarea("sprytextarea31");

//-->
</script>
