<?php
 $w=cari("select * from bus where Id_Bus='$_GET[kd]'");
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
                            <h4 class="panel-title">Form Bus </h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend>Form Bus     </legend>';
										if (isset($_GET[kd])){
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">ID Bus</label>
												<input class="form-control" id="IDUSER" readonly placeholder="ID BUS" name=IDBUS value="'.$w[Id_Bus].'" type="text">
											</div>';
										}
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Bus</label>
												<input class="form-control" required id="NAMA" placeholder="Nama Bus" name=NAMA value="'.$w[Nama_Bus].'" type="text">
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">Kode Bus</label>
												<input class="form-control" required id="KODE" placeholder="Kode Bus" value="'.$w[Kode_Bus].'" name=KODE type="text">
											</div>
                      
                                    <input type="submit" class="btn btn-sm btn-primary m-r-5" name=simpan value=proses>
                                    <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                                </fieldset>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
if (isset($_POST[simpan])){
	$w=cari("select * from bus where Id_Bus='$_POST[IDBUS]'");
	if (empty($w)){
	$ww=cari("select count(*) as a from bus");
	$hasil = $ww[a] + 01;
	if ($hasil < 10){
		$hasil = "0".$hasil;
	}else{
		$hasil = $hasil;
	}
		mysql_query("insert into bus set 
							Id_Bus='BB-$hasil',
							Nama_Bus='$_POST[NAMA]', 
							Kode_Bus='$_POST[KODE]' ");
							//echo "Input";
			echo "<script>window.location = '?menu=bus'</script>";
	}else{
		mysql_query("update bus set 
							Nama_Bus='$_POST[NAMA]', 
							Kode_Bus='$_POST[KODE]'

							where Id_Bus='$_POST[IDBUS]'    ");
							//echo "Update";
			echo "<script>window.location = '?menu=bus'</script>";	
	}
	}
if (isset($_GET[hapus])){
mysql_query("delete from bus where Id_Bus='$_REQUEST[hapus]'" );
			echo "<script>window.location = '?menu=bus'</script>";	
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
                            <h4 class="panel-title">Form Bus </h4>
                        </div>
                        <div class="panel-body">
						<table class="table table-condensed">
						';	
						
				$r=mysql_query("select * from bus ");
				while($w=mysql_fetch_array($r)){
					$n++;
					echo"
 
						<tr>
							<td>$w[Nama_Bus]</td>
							<td>$w[Kode_Bus]</td>
							<td>
								<a href='?menu=bus&kd=$w[Id_Bus]'> <i class='fa fa-edit'></i> </a>
								<a href='?menu=bus&hapus=$w[Id_Bus]'> <i class='fa fa-trash'></i> </a>
							</td>
						</tr>";
				}
	
	
               echo'
			   </table>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>