<?php
 $w=cari("select * from jadwal where Id_Jadwal='$_GET[kd]'");
echo '
  <!-- begin col-6 -->
			    <div class="col-md-4 ui-sortable">
			        <!-- begin panel -->
                    
                    <!-- end panel -->
                <div class="panel panel-inverse" data-sortable-id="form-stuff-3" data-init="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            </div>
                            <h4 class="panel-title">Form Jadwal</h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend>Form Jadwal</legend>';
										if (isset($_GET[kd])){
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Kode Jadwal</label>
												<input class="form-control" id="IDJADWAL" readonly placeholder="ID Jadawal" name=IDJADWAL value="'.$w[Id_Jadwal].'" type="text">
											</div>';
										}
										if (!isset($_GET[kd])){
echo'
											
											<div class="form-group">
												<label for="exampleInputEmail1">Rute Keberangkatan</label>
												<select class="form-control" required name=RUTE id="RUTE" >
												<option selected disabled >- Pilih Rute Bus -</option>';
												$queryw = mysql_query("SELECT * FROM rute left outer join bus on rute.Id_Bus=bus.Id_Bus ");
												while($wr=mysql_fetch_array($queryw)){
													echo '<option value='.$wr[Id_Rute].' >'.$wr[Nama_Bus].'-'.$wr[Kota_Asal].'->'.$wr[Kota_Tujuan].'</option>';
												}
												echo'
												</select>
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">Hari Pemberangkatan</label>
												<select class="form-control" required name=HARI id="HARI" >
												<option selected disabled >- Pilih Hari Pemberangkatan -</option>
												<option value="Senin" >Senin</option>
												<option value="Selasa" >Selasa</option>
												<option value="Rabu" >Rabu</option>
												<option value="Kamis" >Kamis</option>
												<option value='."Jum'at".' >'."Jum'at".'</option>
												<option value="Sabtu" >Sabtu</option>
												<option value="Minggu" >Minggu</option>
												</select>
											</div>';
										}
echo'

											<div class="form-group">
												<label for="exampleInputEmail1">Jam</label>
												<input class="form-control" required id="JAM" placeholder="Jam" name=JAM value="'.$w[Jam].'" type="time">
											</div>

                      
                                    <input type="submit" class="btn btn-sm btn-primary m-r-5" name=simpan value=proses>
                                    <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                                </fieldset>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
if (isset($_POST[simpan])){
	$w=cari("select * from jadwal where Id_Jadwal='$_POST[IDJADWAL]'");
	if (empty($w)){
		mysql_query("insert into jadwal set 
							Id_Rute='$_POST[RUTE]', 
							Hari='$_POST[HARI]', 
							Jam='$_POST[JAM]' ");
			echo "<script>window.location = '?menu=jadwal'</script>";
	}else{
		mysql_query("update jadwal set 
							Jam='$_POST[JAM]'

							where Id_Jadwal='$_POST[IDJADWAL]'    ");
			echo "<script>window.location = '?menu=jadwal'</script>";	
	}
	}
if (isset($_GET[hapus])){
mysql_query("delete from jadwal where Id_Jadwal='$_REQUEST[hapus]'" );
			echo "<script>window.location = '?menu=jadwal'</script>";	
}

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
                            <h4 class="panel-title">Form Jadwal</h4>
                        </div>
                        <div class="panel-body">
						<table class="table table-condensed">
						';	
						
				$r=mysql_query("select * from jadwal left outer join rute on jadwal.Id_Rute=rute.Id_Rute
								left outer join bus on rute.Id_Bus=bus.Id_Bus ORDER BY jadwal.Hari");
				while($w=mysql_fetch_array($r)){
					$n++;
					echo"
 
						<tr>
							<td>$w[Nama_Bus] - $w[Kota_Asal] -> $w[Kota_Tujuan]</td>
							<td>$w[Hari]</td>
							<td>$w[Jam]</td>
							<td>
								<a href='?menu=jadwal&kd=$w[Id_Jadwal]'> <i class='fa fa-edit'></i> </a>
								<a href='?menu=jadwal&hapus=$w[Id_Jadwal]'> <i class='fa fa-trash'></i> </a>
							</td>
						</tr>";
				}
	
	
               echo'
			   </table>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>