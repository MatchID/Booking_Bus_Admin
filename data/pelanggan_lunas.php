<?php
echo '
  <!-- begin col-6 -->
			    <div class="col-md-8 ui-sortable">
			        <!-- begin panel -->
                    
                    <!-- end panel -->
                <div class="panel panel-inverse" data-sortable-id="form-stuff-3" data-init="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Laporan Pelanggan Lunas</h4>
                        </div>
                        <div class="panel-body">
						<table class="table table-condensed">
						';	
						
				$r=mysql_query("select * from transaksi left outer join jadwal on transaksi.Id_Jadwal=jadwal.Id_Jadwal left outer join rute on jadwal.Id_Rute=rute.Id_Rute
								left outer join bus on rute.Id_Bus=bus.Id_Bus
								left outer join user on transaksi.Id_User=user.Id_User where transaksi.Status_Pesanan='L' and bus.Id_Bus='$_SESSION[IDBUS]' GROUP BY transaksi.Id_Tr");
				while($w=mysql_fetch_array($r)){
					
					$o=cari("select group_concat(No_Kursi) as j from transaksi where Id_Tr='$w[Id_Tr]'");
					$n++;
					echo"
 
						<tr>
							<td>#$w[Id_Tr]</td>
							<td>$w[Nama]</td>
							<td>$w[Nama_Bus] - $w[Kota_Asal] -> $w[Kota_Tujuan]</td>
							<td>$w[Tanggal_Pemesanan]</td>
							<td>$w[Hari]</td>
							<td>$w[Jam]</td>
							<td>$o[j]</td>
							<td>
								<a href='?menu=konfirmasi-cek&kd=$w[Id_Tr]'> <i class='fa fa-edit'></i> </a>
							</td>
						</tr>";
				}
	
	
               echo'
			   </table>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>