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
          <i class='fa fa-globe'></i> LAPORAN DATA SAMPAH   
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
							<td>Jenis Sampah</td>
							<td>Harga Sampah</td>
							<td>Tanggal Harga Efektif</td>
							<td>Total Tabungan Sampah (Kg)</td>
							<td>Total Tabungan Sampah (Rp)</td>		
          </tr>
          </thead>
          <tbody>
 
 ";

							$sql="select * from jenis_sampah left outer join harga_sampah on jenis_sampah.Id_Jenis=harga_sampah.Id_Jenis
									order by jenis_sampah.Nama_Jenis ASC";
							 

				
						
					$r=mysql_query($sql); while($w=mysql_fetch_array($r)){ 
				$us=cari("select sum(Quantiti) as j, sum(Total_Harga ) as k from transaksi left outer join harga_sampah on transaksi.Id_Harga=harga_sampah.Id_Harga
								left outer join jenis_sampah on harga_sampah.Id_Jenis=jenis_sampah.Id_Jenis
								where jenis_sampah.Id_Jenis='$w[Id_Jenis]' and transaksi.Jenis_Tr='K' ");
					$saldo = number_format( $us[k], 0 , '' , '.' ).",-";
					$n++;
						 
$t="$t	
		<tr >
							<td>$w[Nama_Jenis]</td>
							<td>$w[Harga]</td>
							<td>$w[Tanggal]</td>
							<td>$us[j] Kg</td>
							<td>Rp. $saldo</td>
										
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
           
          
           

 
 
 
 