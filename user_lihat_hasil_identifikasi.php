<?php
	require_once('auth.php');
?>

<link href="style.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

<?php
	require_once('otentifikasi.php');
	include("koneksi_db.php");
	$act=$_GET['act'];
	$username=$_GET['u'];
	include("paging.php");
	if ($act=="0"){
	
	$cek_hasil=mysql_num_rows(mysql_query("SELECT * FROM hasil_identifikasi WHERE  username='$username'"));
		
		if ($cek_hasil>0){
		
?><br>
<div class="text-area-user" align="justify">    
<div class="title"> Data Hasil identifikasi</div>

<table width="100%" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#666666">
  <tr bgcolor="#0066CC" align="center">
    <td width="4%" align="center"><b><font color="white" size=2>No</font></b></td>
    <td width="14%" align="center"><b><font color="white" size=2>Tanggal identifikasi</font></b></td>
    <td width="15%" align="center"><b><font color="white" size=2>Nama</font></b></td>
    <td width="55%" align="center"><b><font color="white" size=2>Hasil identifikasi</font></b></td>
	<td width="12%" align="center"><b><font color="white" size=2>Proses</font></b></td>
	
    </tr>
<?php


$username=$_GET['u'];
$no=0;
$qlog = mysql_query("SELECT * FROM hasil_identifikasi WHERE username='$username' ORDER BY tanggal_identifikasi DESC");
while($data = mysql_fetch_array($qlog)){
$tanggal = tgl_indo($data['tanggal_identifikasi']);
$no++;
?>

  <tr class="<?php if($no%2==1) echo "isitabelganjil"; else echo "isitabelgenap";?>">
    <td align="center"><?php echo $no;?></td>
    <td><div align="center"><?php echo $tanggal;?></div></td>
    <td>
	<?php 
	
	$dnama = mysql_query("SELECT * FROM data_user WHERE username='$username'");
    $nama = mysql_fetch_array($dnama);
	
	echo $nama['nama_user'];?></td>
    <td>
			<?php 
				$qgolongan = mysql_query("SELECT * FROM golongan WHERE kode_golongan='$data[kode_golongan]'");
				if(mysql_num_rows($qgolongan)){
					$golongan = mysql_fetch_array($qgolongan);
          $persentase = $data['persentase'];
          if($persentase>100){
            $persentase = 100;
          }else{
            $persentase = $persentase;
          }
					echo $golongan['nama_golongan']."&nbsp;(".$persentase."%)";
				}
				else{
					echo 'Tidak Mengalami golongan';
				}
			?>
	</td>
    <td><div align="center"><a href="?page=8&act=detail&u=<?php echo $username;?>&id=<?php echo $data['id_identifikasi'];?>"><img src="images/Text preview.png" width="24" height="24" border="0" align="absmiddle"> Detail</a></div></td>
  </tr>
<?php
}
?>
	
</table>
</div>
<?php
}else{
?>
<br>
<div class="text-area-user" align="justify">    
<div class="title"> Data Hasil identifikasi Masih Kosong</div>
<br><br>
<div class="subtitle"> Anda Belum Melakukan identifikasi</div>
</div>
<?php
}

}

if ($act=='detail'){

$id=$_GET['id'];
$username=$_GET['u'];
$qry = mysql_query("SELECT * FROM hasil_identifikasi,data_user WHERE hasil_identifikasi.id_identifikasi='$id' AND hasil_identifikasi.username=data_user.username");
$data = mysql_fetch_array($qry);
       
	if ($data['kode_golongan']!=''){

	$qry = mysql_query("SELECT * FROM hasil_identifikasi, golongan,data_user WHERE golongan.kode_golongan=hasil_identifikasi.kode_golongan AND id_identifikasi='$id' AND hasil_identifikasi.username=data_user.username");
$data = mysql_fetch_array($qry);
?>
<div class="text-area-user" align="justify">  
<br>
<div class="title">Hasil identifikasi</div>
<br />
<form action="javascript: void(0)"  method="post" align="left" cellpadding="5">
<table  cellpadding="5" width="100%">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle">Biodata User </td>
    </tr>
  <tr>
    <td width="21%"><strong>Nama </strong></td>
    <td width="2%">:</td>
    <td width="77%"><?php 	echo $data['nama_user'];?></td>
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
    <td valign="top"><div align="right"><strong>Tipe golongan Vertebrata </strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['nama_golongan'];?></td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Persentase</strong></div></td>
    <td valign="top">:</td>
    <td valign="top">
    <?php
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
  <!--<tr>
    <td valign="top"><div align="right"><strong>Pengobatan</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['pengobatan'];?></td>
  </tr>
  <tr>
    <td valign="top"><div align="right"><strong>Pencegahan</strong></div></td>
    <td valign="top">:</td>
    <td valign="top"><?php echo $data['pencegahan'];?></td>
  </tr>
-->
  <tr>
    <td><div align="right"><strong>Waktu identifikasi</strong></div></td>
    <td>:</td>
    <td><?php echo tgl_indo($data['tanggal_identifikasi']);?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
<input type="submit" onclick="popup('cetak.php?act=detail&u=<?php echo $username;?>&id=<?php echo $id;?>')" name="submit" value="Cetak"/></td>
    </tr>
</table>
</div>
<?php
	
	
	
}else{
echo "<meta http-equiv=\"refresh\" content=\"0; url=user_index.php?page=8&act=detail0&id=$id&u=$username\">";
}	


}

if ($act=="detail0"){
$id=$_GET['id'];
$username=$_GET['u'];
$qry = mysql_query("SELECT * FROM hasil_identifikasi, data_user WHERE  id_identifikasi='$id' AND hasil_identifikasi.username=data_user.username");
$data = mysql_fetch_array($qry);
?>
<div class="text-area-user" align="justify">  
<br>
<div class="title">Hasil identifikasi</div>
<br />
<form action="javascript: void(0)" onclick="popup('cetak2.php?u=<?php echo $username;?>&id=<?php echo $id;?>')" method="post" align="left" cellpadding="5">
<table  cellpadding="5">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle">Biodata User</td>
  </tr>
  <tr>
    <td width="177"><strong>Nama User</strong></td>
    <td width="7">:</td>
    <td width="889"><?php echo $data['nama_user'];?></td>
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
    <td valign="top">Hasil kesimpulan identifikasi, hewan tersebut tidak termasuk dalam jenis golongan hewan Vertebrata, disebabkan tidak ada ciri yang merujuk kepada golongan Vertebrata.</td>
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
