

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="icon" type="image/gif" href="images/favicon.gif" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Pakar identifikasi golongan Diabetes Melitus</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<?php  include("library.php"); include("koneksi_db.php");?>

</head>

<body onLoad="javascript: window.print()"> 

<div id="container">
    <div class="line"></div>   
    
  <div class="line"></div> 
  <div id="header">
  <div id="site_title"></div>
  <div id="site_slogan"></div>
  </div>
  
  <div class="line"></div>    
	
    <div id="content" align="center">
	
      
      
      <div id="right_column" align="center">
	  <center>
	  <?php
	  
	  
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
<div class="title">
  <div align="center">Hasil identifikasi</div>
</div>
<br />
<table  cellpadding="5" width="100%">
<tr>
    <td colspan="3"><hr color="#AAAAAA"></td>
  </tr>
  <tr>
    <td height="30" colspan="3" class="subtitle">Biodata User </td>
    </tr>
  <tr>
    <td width="33%"><strong>Nama </strong></td>
    <td width="2%">:</td>
    <td width="65%"><?php 	echo $data['nama_user'];?></td>
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
    <td valign="top"><?php echo $data['persentase'];?> persen</td>
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
</table>
</div>

   	 		
    </div>
	<div id="footer" align="center">
    
    </div>
</div>
</center>
</body>
</html>
<?php
}