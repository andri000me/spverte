<?php
require('fpdf16\fpdf.php');

//Connect to your database
include("koneksi_db.php");

class PDF extends FPDF
{
//Page header
function Header()
{
    //Logo
    $this->Image('images/doctor2.jpg',10,8,33);
    //Arial bold 15
    $this->SetFont('Arial','B',15);
    
	//Line break
    $this->Ln(10);
	//Move to the right
    $this->Cell(80);
    //Title
    $this->Cell(20,10,'Hasil identifikasi',0,0,'C');
    //Line break
    $this->Ln(20);
}

}
$ip = $_SERVER['REMOTE_ADDR'];
$qry = mysql_query("SELECT * FROM hasil_identifikasi, golongan WHERE golongan.kode_golongan=hasil_identifikasi.kode_golongan AND hasil_identifikasi.ip='$ip' ORDER BY hasil_identifikasi.id_identifikasi DESC LIMIT 1");
$data = mysql_fetch_array($qry);

$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Ln(10);
$pdf->Cell(25);
$pdf->Cell(0,10,'Data Anak',0,1);
$pdf->Ln(5);
$pdf->Cell(20);
$pdf->Cell(0,10,'Nama Anak        : '.$data['nama_user'],0,1);

$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'Usia                   :'.$data['usia'],0,1);
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'Jenis Kelamin    :'.$data['jenis_kelamin'],0,1);
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'Alamat               :'.$data['alamat'],0,1);
$pdf->Ln(10);
$pdf->Cell(25);
$pdf->Cell(0,10,'Hasil identifikasi',0,1);
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'golongan               : Hewan tersebut besar kemungkinan tidak merupakan golongan Vertebrata',0,1);
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'ciri                   : ciri yang muncul bukan merupakan ciri dari golongan Vertebrata',0,1);
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'Solusi                   : Silahkan menghubungi pakar secara langsung.',0,1);
$pdf->Ln(3);
$pdf->Cell(20);
$pdf->Cell(0,10,'Waktu identifikasi    :'.$data['tanggal_identifikasi'],0,1);
$pdf->Output();
?>