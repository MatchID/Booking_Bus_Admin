<?php
 $w=cari("select * from rute where Id_Rute='$_GET[kd]'");
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
                            <h4 class="panel-title">Form Rute</h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend>Form Rute</legend>';
										if (isset($_GET[kd])){
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Kode Rute</label>
												<input class="form-control" id="IDRUTE" readonly placeholder="IDRUTE" name=IDRUTE value="'.$w[Id_Rute].'" type="text">
											</div>';
										}
										if (!isset($_GET[kd])){
echo'
											
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Bus</label>
												<select class="form-control" required name=BUS id="BUS" >
												<option selected disabled >- Pilih Base Bus -</option>';
												$queryw = mysql_query("SELECT * FROM bus ");
												while($wr=mysql_fetch_array($queryw)){
													echo '<option value='.$wr[Id_Bus].' >'.$wr[Nama_Bus].'</option>';
												}
												echo'
												</select>
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">Kota Pemberangkatan</label>
												<select class="form-control" required name=KOTAASAL id="KOTAASAL" >
												<option selected disabled >- Pilih Kota Pemberangkatan -</option>';
												$queryw = mysql_query("SELECT * FROM kota ");
												while($wr=mysql_fetch_array($queryw)){
													echo '<option value='.$wr[Nama_Kota].' >'.$wr[Nama_Kota].'</option>';
												}
												echo'
												</select>
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">E-Mail</label>
												<select class="form-control" required name=KOTATUJUAN id="KOTATUJUAN" >
												<option selected disabled >- Pilih Kota Tujuan -</option>';
												$queryw = mysql_query("SELECT * FROM kota ");
												while($wr=mysql_fetch_array($queryw)){
													echo '<option value='.$wr[Nama_Kota].' >'.$wr[Nama_Kota].'</option>';
												}
												echo'
												</select>
											</div>';
										}
echo'

											<div class="form-group">
												<label for="exampleInputEmail1">Harga</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[Harga].'" type="text">
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">Max Penumpang</label>
												<input class="form-control" required id="MAX" placeholder="Maksimal Penumpang" value="'.$w[Max_Penumpang].'"  name=MAX type="text">
											</div>

                      
                                    <input type="submit" class="btn btn-sm btn-primary m-r-5" name=simpan value=proses>
                                    <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                                </fieldset>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
if (isset($_POST[simpan])){
	$w=cari("select * from rute where Id_Rute='$_POST[IDRUTE]'");
	if (empty($w)){
		mysql_query("insert into rute set 
							Id_Bus='$_POST[BUS]', 
							Kota_Asal='$_POST[KOTAASAL]', 
							Kota_Tujuan='$_POST[KOTATUJUAN]', 
							Harga='$_POST[HARGA]',  
							Max_Penumpang='$_POST[MAX]' ");
			echo "<script>window.location = '?menu=rute'</script>";
	}else{
		mysql_query("update rute set 
							Harga='$_POST[HARGA]',  
							Max_Penumpang='$_POST[MAX]'

							where Id_Rute='$_POST[IDRUTE]'    ");
			echo "<script>window.location = '?menu=rute'</script>";	
	}
	}
if (isset($_GET[hapus])){
mysql_query("delete from rute where Id_Rute='$_REQUEST[hapus]'" );
			echo "<script>window.location = '?menu=rute'</script>";	
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
                            <h4 class="panel-title">Form Rute</h4>
                        </div>
                        <div class="panel-body">
						<table class="table table-condensed">
						';	
						
				$r=mysql_query("select * from rute left outer join bus on rute.Id_Bus=bus.Id_Bus");
				while($w=mysql_fetch_array($r)){
					$n++;
					echo"
 
						<tr>
							<td>$w[Nama_Bus]</td>
							<td>$w[Kota_Asal]</td>
							<td>$w[Kota_Tujuan]</td>
							<td>$w[Harga]</td>
							<td>$w[Max_Penumpang]</td>
							<td>
								<a href='?menu=rute&kd=$w[Id_Rute]'> <i class='fa fa-edit'></i> </a>
								<a href='?menu=rute&hapus=$w[Id_Rute]'> <i class='fa fa-trash'></i> </a>
							</td>
						</tr>";
				}
	
	
               echo'
			   </table>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>