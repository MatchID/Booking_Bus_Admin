<?php
 $w=cari("select * from user where Id_User='$_GET[kd]'");
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
                            <h4 class="panel-title">Form User </h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend>Form User     </legend>';
										if (isset($_GET[kd])){
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Kode User</label>
												<input class="form-control" id="IDUSER" readonly placeholder="IDUSER" name=IDUSER value="'.$w[Id_User].'" type="text">
											</div>';
										}
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Lengkap</label>
												<input class="form-control" required id="NAMA" placeholder="Nama User" name=NAMA value="'.$w[Nama].'" type="text">
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">Telepon</label>
												<input class="form-control" required id="TEL" placeholder="Telepon User" value="'.$w[Telepon].'" name=TEL type="text">
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">E-Mail</label>
												<input class="form-control" id="EMAIL" placeholder="Email User" name=EMAIL value="'.$w[Email].'" type="text">
											</div>';
											
										if (!isset($_GET[kd])){
echo'
											<div class="form-group">
												<label for="exampleInputEmail1">Level Akses</label>
												<select class="form-control" required name=LEVEL id="LEVEL" >
												<option selected disabled >- Pilih Level Akses -</option>
													<option value=0 >Administrator</option>
													<option value=2 >Petugas PO</option>
													<option value=3 >Pimpinan</option>
												</select>
											</div>
											
											
											<div class="form-group">
												<label for="exampleInputEmail1">Base Bus</label>
												<select class="form-control" required name=BUS id="BUS" >
												<option selected disabled >- Pilih Base Bus -</option>';
												$queryw = mysql_query("SELECT * FROM bus ");
												while($wr=mysql_fetch_array($queryw)){
													echo '<option value='.$wr[Id_Bus].' >'.$wr[Nama_Bus].'</option>';
												}
												echo'
												</select>
											</div>';
										}
echo'

											<div class="form-group">
												<label for="exampleInputEmail1">Username</label>
												<input class="form-control" required id="Username" placeholder="Username" name=Username value="'.$w[Username].'" type="text">
											</div>


											<div class="form-group">
												<label for="exampleInputEmail1">Password</label>
												<input class="form-control" required id="Password" placeholder="Password" value="'.$w[Password].'"  name=Password type="Password">
											</div>

                      
                                    <input type="submit" class="btn btn-sm btn-primary m-r-5" name=simpan value=proses>
                                    <button type="submit" class="btn btn-sm btn-default">Cancel</button>
                                </fieldset>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
if (isset($_POST[simpan])){
	$w=cari("select * from user where Id_User='$_POST[IDUSER]'");
	if (empty($w)){
		mysql_query("insert into user set 
							Username='$_POST[Username]', 
							Password='".md5($_POST[Password])."', 
							Nama='$_POST[NAMA]', 
							Email='$_POST[EMAIL]',  
							Telepon='$_POST[TEL]', 
							Status_Akses='Y', 
							Level_Akses='$_POST[LEVEL]',
							Id_Bus='$_POST[BUS]' ");
			echo "<script>window.location = '?menu=user'</script>";
	}else{
		mysql_query("update user set 
							Username='$_POST[Username]', 
							Password='".md5($_POST[Password])."', 
							Nama='$_POST[NAMA]', 
							Email='$_POST[EMAIL]',  
							Telepon='$_POST[TEL]', 
							Status_Akses='Y', 
							Level_Akses='$_POST[LEVEL]',
							Id_Bus='$_POST[BUS]'

							where Id_User='$_POST[IDUSER]'    ");
			echo "<script>window.location = '?menu=user'</script>";	
	}
	}
if (isset($_GET[hapus])){
mysql_query("delete from user where Id_User='$_REQUEST[hapus]'" );
			echo "<script>window.location = '?menu=user'</script>";	
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
                            <h4 class="panel-title">Form User </h4>
                        </div>
                        <div class="panel-body">
						<table class="table table-condensed">
						';	
						
				$r=mysql_query("select * from user left outer join bus on user.Id_Bus=bus.Id_Bus where Level_Akses !='1' ");
				while($w=mysql_fetch_array($r)){
					if($w[Level_Akses] == "0"){
						$JABATANUSER = "Admin";
						$BUSUSER = "-";
					}else{
						if($w[Level_Akses] == "2"){
						$JABATANUSER = "Petugas PO";
						$BUSUSER = $w[Nama_Bus];
						}else {
						$JABATANUSER = "Pimpinan";
						$BUSUSER = $w[Nama_Bus];
						}
					}
					$n++;
					echo"
 
						<tr>
							<td>$w[Nama]</td>
							<td>$JABATANUSER</td>
							<td>$BUSUSER</td>
							<td>
								<a href='?menu=user&kd=$w[Id_User]'> <i class='fa fa-edit'></i> </a>
								<a href='?menu=user&hapus=$w[Id_User]'> <i class='fa fa-trash'></i> </a>
							</td>
						</tr>";
				}
	
	
               echo'
			   </table>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>