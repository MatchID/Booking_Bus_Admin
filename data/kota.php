<?php
 $w=cari("select * from kota where Id_Kota='$_GET[kd]'");
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
                            <h4 class="panel-title">Form Kota</h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend>Form Kota</legend>';
										if (isset($_GET[kd])){
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">ID Kota</label>
												<input class="form-control" id="IDKOTA" readonly placeholder="ID KOTA" name=IDKOTA value="'.$w[Id_Kota].'" type="text">
											</div>';
										}
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Kota</label>
												<input class="form-control" required id="NAMA" placeholder="Nama Bus" name=NAMA value="'.$w[Nama_Kota].'" type="text">
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Provinsi</label>
												<select class="form-control" required name=PROV id="PROV" >
												<option selected disabled >- Pilih Provinsi -</option>
													<option value="Aceh" >Aceh</option>
													<option value="Bali" >Bali</option>
													<option value="Bangka Belitung" >Bangka Belitung</option>
													<option value="Banten" >Banten</option>
													<option value="Bengkulu" >Bengkulu</option>
													<option value="DI Yokyakarta" >DI Yogyakarta</option>
													<option value="DKI Jakarta" >DKI Jakarta</option>
													<option value="Jambi" >Jambi</option>
													<option value="Jawa Barat" >Jawa Barat</option>
													<option value="Jawa Tengah" >Jawa Tengah</option>
													<option value="Jawa Timur" >Jawa Timur</option>
													<option value="Kalimantan Barat" >Kalimantan Barat</option>
													<option value="Lampung" >Lampung</option>
													<option value="Riau" >Riau</option>
													<option value="Sumatera Barat" >Sumatera Barat</option>
													<option value="Sumatera Utara" >Sumatera Utara</option>
													<option value="Sumatera Selatan" >Sumatera Selatan</option>
												</select>
											</div>
                      
                                    <input type="submit" class="btn btn-sm btn-primary m-r-5" name=simpan value=proses>
                                    <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                                </fieldset>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
if (isset($_POST[simpan])){
	$w=cari("select * from kota where Id_Kota='$_POST[IDKOTA]'");
	if (empty($w)){
		mysql_query("insert into kota set 
							Nama_Kota='$_POST[NAMA]', 
							Prov='$_POST[PROV]' ");
							//echo "Input";
			echo "<script>window.location = '?menu=kota'</script>";
	}else{
		mysql_query("update kota set 
							Nama_Kota='$_POST[NAMA]', 
							Prov='$_POST[PROV]'
							where Id_Kota='$_POST[IDKOTA]'    ");
							//echo "Update";
			echo "<script>window.location = '?menu=kota'</script>";	
	}
	}
if (isset($_GET[hapus])){
mysql_query("delete from kota where Id_Kota='$_REQUEST[hapus]'" );
			echo "<script>window.location = '?menu=kota'</script>";	
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
                            <h4 class="panel-title">Form Kota</h4>
                        </div>
                        <div class="panel-body">
						<table class="table table-condensed">
						';	
						
				$r=mysql_query("select * from kota ");
				while($w=mysql_fetch_array($r)){
					$n++;
					echo"
 
						<tr>
							<td>$w[Nama_Kota]</td>
							<td>$w[Prov]</td>
							<td>
								<a href='?menu=kota&kd=$w[Id_Kota]'> <i class='fa fa-edit'></i> </a>
								<a href='?menu=kota&hapus=$w[Id_Kota]'> <i class='fa fa-trash'></i> </a>
							</td>
						</tr>";
				}
	
	
               echo'
			   </table>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>