<?php
// session_start();
include("otentifikasi.php");
include ("koneksi_db.php");
$act=$_GET['act'];
@$induk=$_GET['induk'];
$u=$_SESSION['SESS_USERNAME'];
@$s=$_GET['s'];
if($act=="identifikasi"){
	if($induk==""){
	  $induk='';
	  $s ='';
	  $sqlg = "SELECT * FROM ciri where  kode_induk_ya='$induk' AND kode_induk_tidak='$s'";
	  }else{
	  $induk   = $_GET['induk'];
	  $sqlg = "SELECT * FROM ciri where  kode_induk_ya='$induk'";
	  }
	
	if($s!=''){
	  $s   = $_GET['s'];
	  $sqlg = "SELECT * FROM ciri where  kode_induk_tidak='$s'";
	}
	$qryg = mysql_query($sqlg);
	$datag = mysql_fetch_array($qryg);
	
	$kode_ciri  = $datag['kode_ciri'];
	$nama_ciri  = $datag['nama_ciri'];

?>

<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {font-weight: bold}
-->
</style>
<div class="text-area-user" align="justify">  
<br>
<form action="?page=7&act=diagnosis" method="post">
<input  name="kode_ciri" value="<?php echo $kode_ciri;?>" type="hidden"/>
<table width="100%" align="center" cellpadding="5">
	<tr>
		<td colspan="2"><div class="title">Jawablah pertanyaan di bawah ini :</div></td>
  </tr>
  <tr>
		<td></td>
  </tr>
	<tr>
  	<td colspan="2" align="center"><div class="pertanyaan"><?php echo " &nbsp; Apakah Anda mengalami <b>$nama_ciri</b> ?";?></div></td>
  </tr>
  <tr>
    <td width="50%" align="right"><label><input type="radio" name="jawaban" value="Y" checked="checked" />Ya (Benar)</label></td>
    <td width="50%" align="left"><label><input type="radio" name="jawaban" value="T" />Tidak (Salah)</label></td>
  </tr>
	<tr>
  	<td colspan="2" align="center"><input type="submit" value="Jawab" /></td>
  </tr>
</table>
</form>
</div>
<?php
$u=$_SESSION['SESS_USERNAME'];
$cek_induk=mysql_num_rows(mysql_query("SELECT * FROM ciri where  kode_induk_ya='$induk'"));
$cek_simpul=mysql_num_rows(mysql_query("SELECT * FROM ciri where  kode_induk_tidak='$s'"));
$sql_cekh = "SELECT * FROM tmp_golongan 
			 WHERE username='$u' 
			 GROUP BY kode_golongan";
$qry_cekh = mysql_query($sql_cekh);
$hsl_cekh = mysql_num_rows($qry_cekh);
if ($cek_induk == 0 or $cek_simpul==0) {
	
	$hsl_data = mysql_fetch_array($qry_cekh);
	$cek_ciri_valid=mysql_num_rows(mysql_query("SELECT * FROM tmp_ciri where status='1'"));
	$cek_ciri_golongan=mysql_num_rows(mysql_query("SELECT relasi_golongan_ciri.* FROM relasi_golongan_ciri,tmp_golongan where relasi_golongan_ciri.kode_golongan=tmp_golongan.kode_golongan"));
	$hasilbobot= mysql_query("SELECT bobot
FROM relasi_golongan_ciri, tmp_ciri
WHERE kode_golongan = '$hsl_data[kode_golongan]'
AND relasi_golongan_ciri.kode_ciri = tmp_ciri.kode_ciri
AND tmp_ciri.status =1");
	
	$bobot = mysql_fetch_array($hasilbobot);
	$jum = mysql_num_rows($hasilbobot);
	$persentase = 0;
	for($i = 0; $i < $jum; ++$i){
			$persentase=$persentase + $bobot[bobot];
			}
	
	if ($persentase==0){
		$sql_pasien = "SELECT * FROM data_user WHERE username='$u'";
	    $qry_pasien = mysql_query($sql_pasien);
	    $hsl_pasien = mysql_fetch_array($qry_pasien);
		$sql_in = "INSERT INTO hasil_identifikasi SET
				  username='$hsl_pasien[username]',
				  kode_golongan='',
				  tanggal_identifikasi=NOW(),
				  persentase='0'";
		mysql_query($sql_in);
					   
	echo "<meta http-equiv=\"refresh\" content=\"0; url=user_index.php?page=7&act=hasil0\">";
	exit;
	}else{	
	$sql_pasien = "SELECT * FROM data_user WHERE username='$u'";
	$qry_pasien = mysql_query($sql_pasien);
	$hsl_pasien = mysql_fetch_array($qry_pasien);
		$sql_in = "INSERT INTO hasil_identifikasi SET
				  username='$hsl_pasien[username]',
				  kode_golongan='$hsl_data[kode_golongan]',
				  tanggal_identifikasi=NOW(),
				  persentase='$persentase'";
		mysql_query($sql_in);
					   
	echo "<meta http-equiv=\"refresh\" content=\"0; url=user_index.php?page=7&act=hasil\">";
	exit;
	}
}



}


if($act=="diagnosis"){
	
# Baca variabel Form (If Register Global ON)
$jawaban 	= $_REQUEST['jawaban'];
$kode_ciri   = $_REQUEST['kode_ciri'];

# Mendapatkan username
$u=$_SESSION['SESS_USERNAME'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kode_ciri, $u) {
	$sql_sakit = "SELECT relasi_golongan_ciri.* FROM relasi_golongan_ciri,tmp_golongan 
				  WHERE relasi_golongan_ciri.kode_golongan=tmp_golongan.kode_golongan 
				  AND username='$u' ORDER BY relasi_golongan_ciri.kode_golongan,relasi_golongan_ciri.kode_ciri";
	$qry_sakit = mysql_query($sql_sakit);
	while ($data_sakit = mysql_fetch_array($qry_sakit)) {
		$sqltmp = "INSERT INTO tmp_analisa (username, kode_golongan,kode_ciri)
					VALUES ('$u','$data_sakit[kode_golongan]','$data_sakit[kode_ciri]')";
		mysql_query($sqltmp);
	}
}

# Fungsi hapus tabel tmp_ciri
function AddTmpciri($kode_ciri, $u,$status) {
	$sql_ciri = "INSERT INTO tmp_ciri (username,kode_ciri,status) VALUES ('$u','$kode_ciri','$status')";
	mysql_query($sql_ciri);
}

# Fungsi hapus tabel tmp_sakit
function DelTmpSakit($u) {
	$sql_del = "DELETE FROM tmp_golongan WHERE username='$u'";
	mysql_query($sql_del);
}

# Fungsi hapus tabel tmp_analisa
function DelTmpAnlisa($u) {
	$sql_del = "DELETE FROM tmp_analisa WHERE username='$u'";
	mysql_query($sql_del);
}

# Random
if ($jawaban == "Y") {
	$sql_analisa = "SELECT * FROM tmp_analisa ";
	$qry_analisa = mysql_query($sql_analisa);
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		DelTmpSakit($u);
		$sql_tmp = "SELECT * FROM tmp_analisa 
					WHERE kode_ciri='$kode_ciri' 
					AND username='$u'";
		$qry_tmp = mysql_query($sql_tmp);
		while ($data_tmp = mysql_fetch_array($qry_tmp)) {
			$sql_rsakit = "SELECT * FROM relasi_golongan_ciri 
							WHERE kode_golongan='$data_tmp[kode_golongan]' 
							GROUP BY kode_golongan";
			$qry_rsakit = mysql_query($sql_rsakit);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data golongan yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_golongan (username,kode_golongan)
							 VALUES ('$u','$data_rsakit[kode_golongan]')";
				mysql_query($sql_input);
			}
		} 
		// Gunakan Fungsi
		DelTmpAnlisa($u);
		AddTmpAnalisa($kode_ciri, $u);
		$status = '1';
		AddTmpciri($kode_ciri, $u,$status);
		
		
	}	
	else {
		# Kode saat tmp_analisa kosong
		$sql_rciri = "SELECT * FROM relasi_golongan_ciri WHERE kode_ciri='$kode_ciri'";
		$qry_rciri = mysql_query($sql_rciri);
		while ($data_rciri = mysql_fetch_array($qry_rciri)) {
			$sql_rsakit = "SELECT * FROM relasi_golongan_ciri 
						   WHERE kode_golongan='$data_rciri[kode_golongan]' 
						   GROUP BY kode_golongan";
			$qry_rsakit = mysql_query($sql_rsakit);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data golongan yang mungkin dimasukkan ke tmp
				$sql_input = mysql_query("INSERT INTO tmp_golongan (username,kode_golongan)
							 VALUES ('$u','$data_rsakit[kode_golongan]')");
			}
		} 
		// Menggunakan Fungsi
		AddTmpAnalisa($kode_ciri, $u);
		$status = '1';
		AddTmpciri($kode_ciri, $u,$status);
		
	}
	echo "<meta http-equiv=\"refresh\" content=\"0; url=user_index.php?page=7&act=identifikasi&induk=$kode_ciri\">";
}


if ($jawaban == "T") {
	$sql_analisa = "SELECT * FROM tmp_analisa ";
	$qry_analisa = mysql_query($sql_analisa);
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		DelTmpSakit($u);
		$sql_tmp = "SELECT * FROM tmp_analisa 
					WHERE kode_ciri='$kode_ciri' 
					AND username='$u'";
		$qry_tmp = mysql_query($sql_tmp);
		while ($data_tmp = mysql_fetch_array($qry_tmp)) {
			$sql_rsakit = "SELECT * FROM relasi_golongan_ciri 
							WHERE kode_golongan='$data_tmp[kode_golongan]' 
							GROUP BY kode_golongan";
			$qry_rsakit = mysql_query($sql_rsakit);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data golongan yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_golongan (username,kode_golongan)
							 VALUES ('$u','$data_rsakit[kode_golongan]')";
				mysql_query($sql_input);
			}
		} 
		// Gunakan Fungsi
		DelTmpAnlisa($u);
		AddTmpAnalisa($kode_ciri, $u);
		$status = '1';
		AddTmpciri($kode_ciri, $u,$status);
	}	
	else {
		# Kode saat tmp_analisa kosong
		$sql_rciri = "SELECT * FROM relasi_golongan_ciri WHERE kode_ciri='$kode_ciri'";
		$qry_rciri = mysql_query($sql_rciri);
		while ($data_rciri = mysql_fetch_array($qry_rciri)) {
			$sql_rsakit = "SELECT * FROM relasi_golongan_ciri 
						   WHERE kode_golongan='$data_rciri[kode_golongan]' 
						   GROUP BY kode_golongan";
			$qry_rsakit = mysql_query($sql_rsakit);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data golongan yang mungkin dimasukkan ke tmp
				$sql_input = mysql_query("INSERT INTO tmp_golongan (username,kode_golongan)
							 VALUES ('$u','$data_rsakit[kode_golongan]')");
			}
		} 
		// Menggunakan Fungsi
		AddTmpAnalisa($kode_ciri, $u);
		$status = '0';
		AddTmpciri($kode_ciri, $u,$status);
	}
	echo "<meta http-equiv=\"refresh\" content=\"0; url=user_index.php?page=7&act=identifikasi&s=$kode_ciri&induk=$kode_ciri\">";
}



}
if ($act=="hasil"){
$u=$_SESSION['SESS_USERNAME'];
$qry = mysql_query("SELECT * FROM hasil_identifikasi, golongan, data_user WHERE golongan.kode_golongan=hasil_identifikasi.kode_golongan AND hasil_identifikasi.username='$u' AND hasil_identifikasi.username=data_user.username ORDER BY hasil_identifikasi.id_identifikasi DESC LIMIT 1");
$data = mysql_fetch_array($qry);
$id = $data['id_identifikasi'];
mysql_query("TRUNCATE TABLE `tmp_analisa`");
mysql_query("TRUNCATE TABLE `tmp_ciri`");
mysql_query("TRUNCATE TABLE `tmp_golongan`");
?>
<div class="text-area-user" align="justify">  
<br>
<div class="title">Hasil identifikasi</div>
<br />
<form action="javascript: void(0)" method="post" align="left" cellpadding="5">
<table width="100%"  cellpadding="5">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle">Biodata User</td>
  </tr>
  <tr>
    <td width="22%"><strong>Nama  </strong></td>
    <td width="2%">:</td>
    <td width="76%"><?php echo $data['nama_user'];?></td>
  </tr>
   <tr>
    <td><strong>Usia</strong></td>
    <td>:</td>
    <td><?php echo $data['usia'];?> tahun</td>
  </tr>
  <tr>
    <td><strong>Jenis Kelamin</strong></td>
    <td>:</td>
    <td><?php if ($data['jenis_kelamin']=='L') echo "Laki-laki"; else echo "Perempuan";?></td>
  </tr>
  <tr>
    <td><strong>Alamat</strong></td>
    <td>:</td>
    <td><?php echo $data['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA" class="style3"></td>
  </tr>
  <tr>
    <td colspan="3" class="subtitle"><strong>Hasil identifikasi</strong></td>
  </tr>
  
  <tr>
    <td><div align="right"><strong>Tipe golongan Vertebrata</strong></div></td>
    <td>:</td>
    <td><?php echo $data['nama_golongan'];?></td>
  </tr>
  <tr>
    <td><div align="right"><strong>Persentase</strong></div></td>
    <td>:</td>
    <td><?php 
    $persentase = $data['persentase'];
    if($persentase>100){
    	 echo '100';
    }else{
    	 echo $data['persentase'];
    }
   ?> persen</td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>ciri Umum</strong></div></td>
    <td valign="top">:</td>
    <td>
    	<?php
		$sql_ciri = "SELECT ciri.* FROM ciri,relasi_golongan_ciri
						WHERE ciri.kode_ciri=relasi_golongan_ciri.kode_ciri
						AND relasi_golongan_ciri.kode_golongan='$data[kode_golongan]'";
		$qry_ciri = mysql_query($sql_ciri);
			$i=0;
			while($hsl_ciri=mysql_fetch_array($qry_ciri)){
				$i++;
				echo "$i. $hsl_ciri[nama_ciri] <br>";
			} 
			?>    </td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Definisi</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['definisi'];?></td>
  </tr>
    <tr>
    <td><div align="right"><strong>Waktu identifikasi</strong></div></td>
    <td>:</td>
    <td><?php echo tgl_indo($data['tanggal_identifikasi']);?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  
</table>
</div>


<?php
}


if ($act=="hasil0"){
$u=$_SESSION['SESS_USERNAME'];
$qry = mysql_query("SELECT * FROM hasil_identifikasi, data_user WHERE hasil_identifikasi.username='$u' AND hasil_identifikasi.username=data_user.username ORDER BY hasil_identifikasi.id_identifikasi DESC LIMIT 1");
$data = mysql_fetch_array($qry);
$id = $data['id_identifikasi'];
mysql_query("TRUNCATE TABLE `tmp_analisa`");
mysql_query("TRUNCATE TABLE `tmp_ciri`");
mysql_query("TRUNCATE TABLE `tmp_golongan`");
?>
<div class="text-area-user" align="justify">  
<br>
<div class="title">Hasil identifikasi</div>
<br />
<form action="javascript: void(0)" onclick="popup('cetak2.php?u=<?php echo $u;?>&id=<?php echo $id;?>')" method="post" align="left" cellpadding="5">
<table  cellpadding="5">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle">Biodata User</td>
  </tr>
  <tr>
    <td width="170"><strong>Nama </strong></td>
    <td width="7">:</td>
    <td width="896"><?php echo $data['nama_user'];?></td>
  </tr>
   <tr>
    <td><strong>Usia</strong></td>
    <td>:</td>
    <td><?php echo $data['usia'];?> tahun</td>
  </tr>
  <tr>
    <td><strong>Jenis Kelamin</strong></td>
    <td>:</td>
    <td><?php if ($data['jenis_kelamin']=='L') echo "Laki-laki"; else echo "Perempuan";?></td>
  </tr>
  <tr>
    <td><strong>Alamat</strong></td>
    <td>:</td>
    <td><?php echo $data['alamat'];?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td colspan="3" class="subtitle">Hasil identifikasi</td>
  </tr>
  
  <tr>
    <td valign="top"><div align="right"><strong>Kesimpulan</strong></div></td>
    <td valign="top">:</td>
    <td valign="top">Hasil kesimpulan identifikasi, ciri-ciri tersebut tidak terdeteksi sebagai hewan Vertebrata</td>
  </tr>
   <tr>
    <td><div align="right"><strong>Waktu identifikasi</strong></div></td>
    <td>:</td>
    <td><?php echo tgl_indo($data['tanggal_identifikasi']);?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  
</table>
</div>


<?php
}
?>


