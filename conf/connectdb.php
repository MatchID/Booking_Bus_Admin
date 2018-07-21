<?php
 

  $db_username = "root";
  $db_hostname = "localhost";
  $db_password = "";
  $db_name = "db_busican";

  $con = _connect($db_hostname, $db_username, $db_password);
  $db  = _select_db($db_name, $con);


	
	
    $q = mysql_query("SELECT * FROM transaksi where Status_Pesanan='B' ");
    
    while($r=mysql_fetch_array($q)){
        
        date_default_timezone_set('Asia/Jakarta');
        $datedata = $r['Tanggal_Pesan']." ".$r['Jam_Pesan'];
        
        $waktupesan = strtotime($datedata);
        $waktusekarang = strtotime(date('Y-m-d H:i:s'));
        $selesai = $waktusekarang - $waktupesan;
        
        $hasil = floor($selesai / (60 ));
        if($hasil > 100){
            $cek = mysql_query("update transaksi set Status_Pesanan='C' WHERE Id_Transaksi='".$r['Id_Transaksi']."' ");
        }
    }
  
?>
