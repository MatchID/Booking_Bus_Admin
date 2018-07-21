<?php
include_once "../method/dwo.lib.php";
include_once "../method/db.mysql.php";
include_once "../method/connectdb.php";
include_once "../method/ClassRC.php";
 
include("mpdf.php");
  
$mpdf=new mPDF('c'); 
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('fullpage','two');

$mpdf->AddPage('P',100);
$tx=lap();
$html ="$tx ";
$mpdf->WriteHTML($html);


function lap(){
$tgl=date('d-m-Y');	
 $r=mysql_query("select * from  produk where KodeProduk='$_REQUEST[kd]'"); 
  while($w=mysql_fetch_array($r)){
$res="$res 


<!doctype html>
<html>
<head>
<title> Laporan Perhitungan EOQ </title>
</head>


  
<body>
<p align='center'><strong>PT. PUTRIINDAH  INFORMATIKA SOLUSI</strong><br>
  <img width='98' height='58' src='../assets/img/clip_image002_0004.jpg' align='left' hspace='12'>Blok B No 5/7, Jl. Brigjen Hasan Kasim No.6,  Sialang, Sako, Kota Palembang, Sumatera Selatan 30961,  Telp. <strong><a href='javascript:void(0)' title='Call via Hangouts'>(0711) 716363</a></strong><br>
<img width='616' height='5' src='../assets/img/clip_image003_0009.png'><strong>&nbsp;</strong></p>
 <p> <strong>Tanggal Laporan  : $tgl</strong></p>
 <p align=center><strong>Hasil Economic Order Quality Dari Produk $w[Nama] </strong></p>
  <center><br>
Tabel Kebutuhan<br>
<table align=center border='1' cellspacing='0' cellpadding='0'>
  <tr>
	<td width='259' valign='top'><p align='center'>No</p></td>
    <td width='259' valign='top'><p align='center'>Bulan</p></td>
    <td width='259' valign='top'><p align='center'>Jumlah kebutuhan</p></td>
  </tr>

";
  }
  $r=mysql_query("select * from  bulan where KodeProduk='$_REQUEST[kd]'"); 
  while($w2=mysql_fetch_array($r)){
 $n++;
		
			
$res="$res

  <tr>
	<td width='259' valign='top'><p align='center'>$n</p></td>
    <td width='259' valign='top'><p align='center'>$w2[Bulan]</p></td>
    <td width='259' valign='top'><p align='center'>$w2[JumlahProduk]</p></td>
  </tr>
 
   
";
			}
			$r=mysql_query("select * from  bulan where KodeProduk='$_REQUEST[kd]'"); 
  while($w2=mysql_fetch_array($r))
	  $a=$a+$w2[JumlahProduk];	
	$res="$res	
</table>
<table align=center border='1' cellspacing='0' cellpadding='0'>
 <tr>
 <td width='518' valign='top'><p align='center'>Total kebutuhan</p></td>
 <td width='259' valign='top'><p align='center'>$a</p></td>
  </tr>
</table>	

";
	$res="$res	
	<br>
Tabel Penyimpanan<br>
<table align=center border='1' cellspacing='0' cellpadding='0'>
  <tr>
	<td width='259' valign='top'><p align='center'>No</p></td>
    <td width='259' valign='top'><p align='center'>Biaya Penyimpanan</p></td>
    <td width='259' valign='top'><p align='center'>Estimasi</p></td>
  </tr>
  ";
 $r=mysql_query("select * from  penyimpanan where KodeProduk='$_REQUEST[kd]'"); 
  while($w3=mysql_fetch_array($r)){
 $b++;
	$res="$res	
  <tr>
	<td width='259' valign='top'><p align='center'>$b</p></td>
    <td width='259' valign='top'><p align='center'>$w3[Penyimpanan]</p></td>
    <td width='259' valign='top'><p align='center'>$w3[Estimasi]</p></td>
  </tr>
  ";
  }
  $r=mysql_query("select * from  penyimpanan where KodeProduk='$_REQUEST[kd]'"); 
  while($w3=mysql_fetch_array($r))
	  $simpan=$simpan+$w3[Estimasi];	
	$res="$res	 
	</table>
<table align=center border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='518' valign='top'><p align='center'>Total Biaya</p></td>
    <td width='259' valign='top'><p align='center'>$simpan</p></td>
  </tr>
</table>
";
	$res="$res	
<br>Tabel Pemesanan<br>
<table  align=center border='1' cellspacing='0' cellpadding='0'>
  <tr>
	<td width='259' valign='top'><p align='center'>No</p></td>
    <td width='259' valign='top'><p align='center'>Biaya Pemesanan</p></td>
    <td width='259' valign='top'><p align='center'>Estimasi</p></td>
  </tr>
 ";
 $r=mysql_query("select * from  estimasi_pesan where KodeProduk='$_REQUEST[kd]'"); 
  while($w4=mysql_fetch_array($r)){
 $c++;
 $res="$res
  <tr>
	 <td width='259' valign='top'><p align='center'>$c</p></td>
    <td width='259' valign='top'><p align='center'>$w4[BiayaPesan]</p></td>
    <td width='259' valign='top'><p align='center'>$w4[Estimasi]</p></td>
  </tr>
  ";
  }
   $r=mysql_query("select * from  estimasi_pesan where KodeProduk='$_REQUEST[kd]'"); 
  while($w4=mysql_fetch_array($r))
 $pesan=$pesan+$w4[Estimasi];
  $res="$res
	</table>
<table align=center border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='518' valign='top'><p align='center'>Total Biaya</p></td>
    <td width='259' valign='top'><p align='center'>$pesan</p></td>
  </tr>
</table>
";
$tot=(2* $pesan * $a)/$simpan;
$res="$res
<p>Hasil EOQ</p>
<table border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td width='518' valign='top'><p align='center'>Total Kebutuhan</p></td>
    <td width='259' valign='top'><p align='center'>$a</p></td>
  </tr>
  <tr>
    <td width='518' valign='top'><p align='center'>Total Penyimpanan</p></td>
    <td width='259' valign='top'><p align='center'>$simpan</p></td>
  </tr>
  <tr>
    <td width='518' valign='top'><p align='center'>Total Pemesanan</p></td>
    <td width='259' valign='top'><p align='center'>$pesan</p></td>
  </tr>
  <tr>
    <td width='518' valign='top'><p align='center'>Perhitungan EOQ</p></td>
    <td width='259' valign='top'><p align='center'>$tot</p></td>
  </tr>
</table>
";
$res="$res
</center>
<p>&nbsp;</p>
</body>

</html>



";
  			

return $res;
}




$mpdf->Output();
exit;

 

 
?>
 
 
 