<?php
$data=split("	","KodeBencana	KodeLokasi	Keterangan	Tahun");
$db="db_ririn";
$jd="    LAPORAN DATA BENCANA ";
$alamat="Jl.  ";
$tb="konfirmasi";
$kd=trim($data[0]);
?>

< ?php

mysql_connect("localhost","root","");
mysql_select_db("<?php echo $db; ?>");
include("mpdf.php");

 
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
          <i class='fa fa-globe'></i> LAPORAN  <?php echo $jd; ?>
 
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
		  <?php
		  for ($i=0; $i<=count($data)-1; $i++) {
			  $k=trim($data[$i]);
		 
		  echo"
					<th>  $k</th>";
			}
			?>
			
          </tr>
          </thead>
          <tbody>
 
 ";

							$sql="select  * from <?php echo $tb; ?>";
							 

				
						
					$r=mysql_query($sql); while($w=mysql_fetch_array($r)){ 
					$n++;
						 
$t="$t	
		<tr >
 		  <?php
		  for ($i=0; $i<=count($data)-1; $i++) {
			  $k=trim($data[$i]);
			  echo"
		  <td align=left> &nbsp;	\$w[$k]  </td> ";}
		  ?>
 
										
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
           
          
           

 
 
 
 