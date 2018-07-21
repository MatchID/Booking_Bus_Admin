<?php
 if(isset($_GET[p])){
  //echo "<script>window.location = '?menu=lap-nasabah'</script>";
  echo "<script>window.location = 'modul/cetak/$_GET[p].php'</script>";
 }
 
	echo "<!-- begin col-10 -->
			    <div class='col-md-11 ui-sortable'>
			        <!-- begin panel -->
                    
                    <!-- end panel -->
                <div class='panel panel-inverse' data-sortable-id='form-stuff-3' data-init='true'>
                        <div class='panel-heading'>
                            <div class='panel-heading-btn'>
                                <a href='javascript:;' class='btn btn-xs btn-icon btn-circle btn-default' data-click='panel-expand'><i class='fa fa-expand'></i></a>
                                <a href='?menu=lap-nasabah&p=lap-pencairan' class='btn btn-xs btn-icon btn-circle btn-success' data-click='panel-print'><i class='fa fa-print'></i></a>
                                <a href='javascript:;' class='btn btn-xs btn-icon btn-circle btn-warning' data-click='panel-collapse'><i class='fa fa-minus'></i></a>
                            </div>
                            <h4 class='panel-title'>Laporan Data Pencairan Nasabah</h4>
                        </div>
                        <div class='panel-body'>				
				<form method=post action=''>
				<table class='table table-condensed'>
						<tr>
							<td>Rekening Nasabah</td>
							<td>Nama Nasabah</td>
							<td>Tanggal Transaksi</td>
							<td>Total Pencairan Dana</td>
						</tr>";
							
				$r=mysql_query("select * from transaksi left outer join pelanggan on transaksi.Id_Pelanggan=pelanggan.Id_Pelanggan
			left outer join harga_sampah on transaksi.Id_Harga=harga_sampah.Id_Harga
			left outer join jenis_sampah on harga_sampah.Id_Jenis=jenis_sampah.Id_Jenis
			left outer join users on transaksi.Id_User=users.Id_User where transaksi.Jenis_Tr='D'  order by transaksi.Tanggal_Tr DESC");
				
				while($w=mysql_fetch_array($r)){
					$hargasampah = number_format( $w[Harga] , 0 , '' , '.' ).",-";
					$total_harga = number_format( $w[Total_Harga] , 0 , '' , '.' ).",-";
					$saldo_tabungan = number_format( $w[Saldo_Tabungan] , 0 , '' , '.' ).",-";
						echo"
						<tr>
							<td>$w[Id_Pelanggan]</td>
							<td>$w[Nama_Pelanggan]</td>
							<td>$w[Tanggal_Tr]</td>
							<td>Rp. $total_harga</td>
						</tr>
						";
				}
echo"
	</table>
	</form>";
	
	?>
	