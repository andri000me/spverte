<?php
	include('otentifikasi.php');
?>

<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<?php  
include("koneksi_db.php");
$act = $_GET['act'];
if($act=="relasi"){
@$kode_golongan = $_GET['kode_golongan'];
?>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<div class="text_area" align="justify">
      
<br />
<div class="title">Pengolahan Data Relasi </div>

<form method="post" action="?page=6&act=simpanrelasi">
<table cellpadding="5" width="90%">
<tr>
    <td colspan="3"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Tipe golongan Vertebrata</td>
  </tr>
  <tr>
    <td>
      <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="?page=6&act=relasi&kode_golongan" selected="selected">[ Tipe golongan Vertebrata ]</option>
        <?php
				$qryp = mysql_query("SELECT * FROM golongan");
				while($datap = mysql_fetch_array($qryp)){
					if($datap['kode_golongan']==$kode_golongan){
						$cek = "selected";
					}
					else{
						$cek = "";
					}
					echo "<option value='?page=6&act=relasi&kode_golongan=$datap[kode_golongan]' $cek>$datap[nama_golongan]</option>";
				}
				?>
      </select>
      <input type="hidden" name="kode_golongan" value="<?php echo $kode_golongan;?>" /></td>
    </tr>
	<br>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="3"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Daftar ciri</td>
  </tr>
	<?php
	$no=0;
  $qry = mysql_query("SELECT * FROM ciri ORDER BY kode_ciri");
	while ($data=mysql_fetch_array($qry)){
		$no++;
		$qryr = mysql_query("SELECT * FROM relasi_golongan_ciri WHERE kode_golongan='$kode_golongan' AND kode_ciri='$data[kode_ciri]'");
		$cocok = mysql_num_rows($qryr);
		if($cocok==1){
			$cek = "checked";
		}
		else{
			$cek = "";
		}
	?>
  <tr>
    <td><input type="checkbox" name="cekciri[]" value="<?php echo $data['kode_ciri'];?>" <?php echo $cek;?> />&nbsp;<?php echo "[".$data['kode_ciri']."]&nbsp;".$data['nama_ciri'];?></td>
    </tr>
  <?php }?>
  <tr><td></td></tr>
  <tr>
    <td colspan="3"></td>
    
  </tr>
  <tr>
    <td align="center" class="judul"><input type="submit" name="simpan" value="Simpan" onclick="return confirm('Apakah anda yakin data relasi ini akan disimpan?')"/></td>
    </tr>
</table>
</form>
</div>
<?php
}

if($act=="berhasil"){
$kode_golongan = $_GET['kode_golongan'];
?>

<script type="text/javascript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<div class="text_area" align="justify">
      
<br /><div class="title">Data Relasi Berhasil Disimpan</div>

<form method="post" action="?page=6&act=simpanrelasi">
<table width="100%" align="center" cellpadding="5">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Nama golongan</td>
  </tr>
  <tr>
    <td>
      <select name="jumpMenu" id="jumpMenu" onChange="MM_jumpMenu('parent',this,0)">
        <option value="?page=6&act=relasi&kode_golongan">[ Daftar golongan ]</option>
        <?php
				$qryp = mysql_query("SELECT * FROM golongan");
				while($datap = mysql_fetch_array($qryp)){
					if($datap['kode_golongan']==$kode_golongan){
						$cek = "selected";
					}
					else{
						$cek = "";
					}
					echo "<option value='?page=6&act=relasi&kode_golongan=$datap[kode_golongan]' $cek>$datap[nama_golongan]</option>";
				}
				?>
      </select>
      <input type="hidden" name="kode_golongan" value="<?php echo $kode_golongan;?>" /></td>
    </tr>
	<br>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td class="subtitle">Daftar ciri</td>
  </tr>
	<?php
	$no=0;
  $qry = mysql_query("SELECT * FROM ciri ORDER BY kode_ciri");
	while ($data=mysql_fetch_array($qry)){
		$no++;
		$qryr = mysql_query("SELECT * FROM relasi_golongan_ciri WHERE kode_golongan='$kode_golongan' AND kode_ciri='$data[kode_ciri]'");
		$cocok = mysql_num_rows($qryr);
		if($cocok==1){
			$cek = "checked";
		}
		else{
			$cek = "";
		}
	?>
  <tr>
    <td><input type="checkbox" name="cekciri[]" value="<?php echo $data['kode_ciri'];?>" <?php echo $cek;?> />&nbsp;<?php echo "[".$data['kode_ciri']."]&nbsp;".$data['nama_ciri'];?></td>
    </tr>
  <?php }?>
  <tr><td></td></tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
    
  </tr>
  <tr>
    <td align="center" class="judul"><input type="submit" name="simpan" value="Simpan" onclick="return confirm('Apakah anda yakin data relasi ini akan disimpan?')"/></td>
    </tr>
</table>
</form>
</div>
<?php
}


elseif($act=="simpanrelasi"){
	$kode_golongan = $_POST['kode_golongan'];
	@$cekciri = $_POST['cekciri'];
	
	$jum = count($cekciri);
	if($jum==0){
		echo "<meta http-equiv=\"refresh\" content=\"0; url=pakar_index.php?page=6&act=relasi\">";
	}
	else{
		$qpil = mysql_query("SELECT * FROM relasi_golongan_ciri WHERE kode_golongan='$kode_golongan'");
		while($datapil = mysql_fetch_array($qpil)){
			for($i = 0; $i < $jum; ++$i){
				if($datapil['kode_ciri'] != $cekciri[$i]){
					mysql_query("DELETE FROM relasi_golongan_ciri WHERE kode_golongan='$kode_golongan' AND NOT kode_ciri IN('$cekciri[$i]')");
				}
			}
		}
		for($i = 0; $i < $jum; ++$i){
			$qryr = mysql_query("SELECT * FROM relasi_golongan_ciri WHERE kode_golongan='$kode_golongan' AND kode_ciri='$cekciri[$i]'");
			$cocok = mysql_num_rows($qryr);
			if(!$cocok==1){
				mysql_query("INSERT INTO relasi_golongan_ciri(kode_golongan, kode_ciri) VALUES('$kode_golongan', '$cekciri[$i]')");
				$ciri = $cekciri[$i].",";
				echo "<meta http-equiv=\"refresh\" content=\"0; url=pakar_index.php?page=6&act=berhasil\">";
			}
		}
		echo "<meta http-equiv=\"refresh\" content=\"0; url=?page=6&act=relasi&kode_golongan&act=berhasil\">";
	}
}
?>

	
