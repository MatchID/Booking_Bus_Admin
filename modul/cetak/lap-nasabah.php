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
          <i class='fa fa-globe'></i> LAPORAN DATA NASABAH   
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
							<td>No Rekening</td>
							<td>Nama Nasabah</td>
							<td>Alamat</td>
							<td>Telepon</td>
							<td>Tanggal Pendaftaran</td>
							<td>Tanggal Pengaktifan Rekening</td>
							<td>Tanggal Jatuh Tempo</td>
							<td>Jumlah Sampah Tabungan</td>
							<td>Jumlah Saldo Tabungan</td>		
          </tr>
          </thead>
          <tbody>
 
 ";

							$sql="select * from pelanggan order by Id_Pelanggan ASC";
							 

				
						
					$r=mysql_query($sql); while($w=mysql_fetch_array($r)){ 
				$us=cari("select sum(Quantiti) as j from transaksi where Id_Pelanggan='$w[Id_Pelanggan]' ");
					$saldo_tabungan = number_format( $w[Saldo_Tabungan] , 0 , '' , '.' ).",-";
					$n++;
						 
$t="$t	
		<tr >
							<td>$w[Id_Pelanggan]</td>
							<td>$w[Nama_Pelanggan]</td>
							<td>$w[Alamat_Pelanggan]</td>
							<td>$w[Telepon]</td>
							<td>$w[Tanggal_Daftar]</td>
							<td>$w[Tanggal_Tabung]</td>
							<td>$w[Tanggal_Tempo]</td>
							<td>$us[j] Kg</td>
							<td>Rp. $saldo_tabungan</td>
										
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
           
          
           

 
 
 
 