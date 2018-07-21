<?php
 if(isset($_GET[p])){
  //echo "<script>window.location = '?menu=lap-nasabah'</script>";
  echo "<script>window.location = 'modul/cetak/$_GET[p].php?id=$_GET[trdid]'</script>";
 }
 $w=cari("select * from transaksi left outer join pelanggan on transaksi.Id_Pelanggan=pelanggan.Id_Pelanggan
			left outer join harga_sampah on transaksi.Id_Harga=harga_sampah.Id_Harga
			left outer join jenis_sampah on harga_sampah.Id_Jenis=jenis_sampah.Id_Jenis
			left outer join users on transaksi.Id_User=users.Id_User
			where transaksi.Id_Tr='$_GET[trdid]'");
			
					$hargasampah = number_format( $w[Harga] , 0 , '' , '.' ).",-";
					$total_harga = number_format( $w[Total_Harga] , 0 , '' , '.' ).",-";
					$saldo_tabungan = number_format( $w[Saldo_Tabungan] , 0 , '' , '.' ).",-";
echo '
  <!-- begin col-6 -->
			    <div class="col-md-11 ui-sortable">
			        <!-- begin panel -->
                    
                    <!-- end panel -->
                <div class="panel panel-inverse" data-sortable-id="form-stuff-3" data-init="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="?menu=kwitansi_pencairan&p=kwitansi_pencairan&trdid='.$_GET[trdid].'" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-print"><i class="fa fa-print"></i></a>
                            </div>
                            <h4 class="panel-title">Kwitansi Pencairan Saldo Nasabah</h4>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST">
<table width="100%">
  <tr>
    <td width="240"><b><h4>No Rekening</td>
    <td width="198"><h6>'.$w[Id_Pelanggan].'</td>
    <td width="240"><b><h4>Jenis Transaksi</td>
    <td width="198"><h6>'.$w[Jenis_Tr].'</td>
  </tr>
  <tr>
    <td><b><h4>Nama Pemilik</td>
    <td><h6>'.$w[Nama_Pelanggan].'</td>
    <td width="240"><b><h4>Waktu Transaksi</td>
    <td width="198"><h6>'.$w[Tanggal_Tr].'</td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="240"><b><h4>Umur Rekening</td>
    <td width="198"><h6>'.$w[Id_Pelanggan].'</td>
    <td width="240"><b><h4></td>
    <td width="198"><h6></td>
  </tr>
</table><br><br><br><br>

<table width="100%">
  <tr>
    <td width="240"><b><h5>Total Penarikan Saldo</td>
    <td width="198"><b><h5>Saldo Tabungan Akhir</td>
  </tr>
  <tr>
    <td>Rp. '.$total_harga.'</td>
    <td>Rp. '.$saldo_tabungan.'</td>
  </tr>
</table><br><br><br><br><br><br>

<table width="100%">
  <tr>
    <td width="240"><h5>Nasabah</td>
    <td width="198"><h5>Kasir</td>
  </tr>
  <tr>
    <td><br><br><br><br><br><br><h5><b>'.$w[Nama_Pelanggan].'</td>
    <td><br><br><br><br><br><br><h5><b>'.$w[Nama_User].'</td>
  </tr>
</table>
                            </form>
                        </div>
                    </div></div>
                <!-- end col-6 -->
';
?>