<?php
 $w=cari("select * from pembayaran left outer join transaksi on pembayaran.Id_Tr=transaksi.Id_Tr
			left outer join user on transaksi.Id_User=user.Id_User
			left outer join bank on pembayaran.Id_Bank=bank.Id_Bank where pembayaran.Id_Tr='$_GET[kd]'");
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
                            <h4 class="panel-title">Form Data Pemesanan</h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend>Form Data Pemesanan</legend>

											<div class="form-group">
												<label for="exampleInputEmail1">Nama Pemesan</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[Nama].'" type="text" readonly>
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Tanggal Pemberangkatan</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[Tanggal_Pemesanan].'" type="text" readonly>
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Total Harga</label>
												<input class="form-control" required id="MAX" placeholder="Maksimal Penumpang" value="'.$w[Total_Harga].'"  name=MAX type="text" readonly>
											</div>

                                    <legend>Form Data Pembayaran</legend>

											<div class="form-group">
												<label for="exampleInputEmail1">Bank Penerima</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[Nama_Bank].'" type="text" readonly>
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Bank Pengirim</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[Bank_User].'" type="text" readonly>
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Rekening Pengirim</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[No_Rek_User].'" type="text" readonly>
											</div>

											<div class="form-group">
												<label for="exampleInputEmail1">Berita</label>
												<input class="form-control" required id="HARGA" placeholder="Harga" name=HARGA value="'.$w[Berita].'" type="text" readonly>
											</div>';
										if (isset($_GET[cek])){
echo'
										<input type="submit" class="btn btn-sm btn-primary m-r-5" name=simpan value=proses>
                                    <button type="submit" class="btn btn-sm btn-default">Cancel</button>';
										}
echo'
                      
                                    
                                </fieldset>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->';
if (isset($_POST[simpan])){
		mysql_query("update transaksi set 
							Status_Pesanan='L'

							where Id_Tr='$_REQUEST[kd]'    ");
			echo "<script>window.location = '?menu=konfirmasi'</script>";	
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
                            <h4 class="panel-title">Foto Bukti Pembayaran</h4>
                        </div>
                        <div class="panel-body">
						<img src="http://lokakito.com/projek/android/ican-uin/images/'.$w[Gambar].'" style="width: 50%; height: 50%;">
				
                        </div>
                    </div></div>
                <!-- end col-6 -->';
	
				?>