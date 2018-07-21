<?php
include_once "../../conf/db.mysql.php";
include_once "../../conf/connectdb.php";
include("mpdf.php");

 function cari ($sql){
	$r=mysql_query($sql); 
	return $w=mysql_fetch_array($r);
	
}
 
$mpdf=new mPDF('c'); 
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('fullpage','two');

 
$tx=tx();
 
$html ="$tx ";
$mpdf->WriteHTML($html);
$mpdf->Output();
exit;

					
function tx(){
 $date=date("d-M-Y");
$t="$t
  
<div class='wrapper'>
  <!-- Main content -->
  <section class='invoice'>
    <!-- title row -->
    <div class='row'>
      <div class='col-xs-12'>
        <h2 class='page-header'>
          <i class='fa fa-globe'></i> KWITANSI PENDAFTARAN NASABAH   
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class='row invoice-info'>
      <div class='col-sm-4 invoice-col'>
	  
       
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>
         
        <address>
          
        </address>
      </div>
      <!-- /.col -->
      <div class='col-sm-4 invoice-col'>";
  
 $w=cari("select * from transaksi left outer join pelanggan on transaksi.Id_Pelanggan=pelanggan.Id_Pelanggan
			left outer join harga_sampah on transaksi.Id_Harga=harga_sampah.Id_Harga
			left outer join jenis_sampah on harga_sampah.Id_Jenis=jenis_sampah.Id_Jenis
			left outer join users on transaksi.Id_User=users.Id_User
			where pelanggan.Id_Pelanggan='$_GET[id]'");
			
					$hargasampah = number_format( $w[Harga] , 0 , '' , '.' ).",-";
					$total_harga = number_format( $w[Total_Harga] , 0 , '' , '.' ).",-";
					$saldo_tabungan = number_format( $w[Saldo_Tabungan] , 0 , '' , '.' ).",-";
     
       
 
$t="$t
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class='row'>
      <div class='col-xs-12 table-responsive'>
          <thead>
<table width='100%'>
  <tr>
    <td width='240'><b><h4>No Rekening</td>
    <td width='198'><h6>$w[Id_Pelanggan]</td>
    <td width='240'><b><h4>NIK Pemilik</td>
    <td width='198'><h6>$w[NIK]</td>
  </tr>
  <tr>
    <td><b><h4>Nama Pemilik</td>
    <td><h6>$w[Nama_Pelanggan]</td>
    <td width='240'><b><h4>Tanggan Pendaftaran</td>
    <td width='198'><h6>$w[Tanggal_Daftar]</td>
  </tr>
</table><br><br>

<table width='100%'>
  <tr>
    <td width='240'><b>Alamat Nasabah</td>
    <td width='198'>$w[Alamat_Pelanggan]</td>
    <td width='240'><b>Telepon</td>
    <td width='198'>$w[Telepon]</td>
  </tr>
</table>
<table width='100%'>
  <tr>
    <td width='240'><b>Pekerjaan</td>
    <td width='198'>$w[Pekerjaan]</td>
    <td width='240'><b></td>
    <td width='198'></td>
  </tr>
</table>";
  

 
$t="$t
          </tbody>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
 
";

return $t;
}

function sela($sql){
	$r=mysql_query($sql);
	return $w=mysql_fetch_array($r);
}

 
?>  
           
          
           

 
 
 
 