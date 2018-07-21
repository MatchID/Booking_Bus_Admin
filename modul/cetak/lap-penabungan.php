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
          <i class='fa fa-globe'></i> LAPORAN DATA PENABUNGAN NASABAH   
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
      <div class='col-sm-4 invoice-col'>
  
     
       
 
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class='row'>
      <div class='col-xs-12 table-responsive'>
        <table class='table table-striped' style='width:800px; border-collapse:collapse;' border=1 >
          <thead>
          <tr>
							<td>Rekening Nasabah</td>
							<td>Nama Nasabah</td>
							<td>Tanggal Transaksi</td>
							<td>Jenis Sampah</td>
							<td>Harga Sampah (Kg)</td>
							<td>Berat Sampah</td>
							<td>Total Harga</td>		
          </tr>
          </thead>
          <tbody>
 
 ";

							$sql="select * from transaksi left outer join pelanggan on transaksi.Id_Pelanggan=pelanggan.Id_Pelanggan
			left outer join harga_sampah on transaksi.Id_Harga=harga_sampah.Id_Harga
			left outer join jenis_sampah on harga_sampah.Id_Jenis=jenis_sampah.Id_Jenis
			left outer join users on transaksi.Id_User=users.Id_User where transaksi.Jenis_Tr='K'  order by transaksi.Tanggal_Tr DESC";
							 

				
						
					$r=mysql_query($sql); while($w=mysql_fetch_array($r)){ 
					$hargasampah = number_format( $w[Harga] , 0 , '' , '.' ).",-";
					$total_harga = number_format( $w[Total_Harga] , 0 , '' , '.' ).",-";
					$saldo_tabungan = number_format( $w[Saldo_Tabungan] , 0 , '' , '.' ).",-";
					$n++;
						 
$t="$t	
		<tr >
							<td>$w[Id_Pelanggan]</td>
							<td>$w[Nama_Pelanggan]</td>
							<td>$w[Tanggal_Tr]</td>
							<td>$w[Nama_Jenis]</td>
							<td>Rp. $hargasampah</td>
							<td>$w[Quantiti] Kg</td>
							<td>Rp. $total_harga</td>
										
</tr>";}

 
$t="$t
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class='row'>
      <!-- accepted payments column -->
      <div class='col-xs-6'>
 
      </div>
      <!-- /.col -->
      <div class='col-xs-6'>
 

        <div class='table-responsive'>
          <table class='table'>
             <tr>
              <th  align=right style='width:50%'>Total Data  : $n</th>
              <td align=right> </td>
            </tr>
      
            
             
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
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
           
          
           

 
 
 
 