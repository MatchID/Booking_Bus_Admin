 <?php
function pagging($n,$nil,$href){
$w=_selek("select count(*) as j from $n");
		$bagi=$w[j]/$nil;
		for($i=0; $i<=$bagi; $i++){
		$nilai=$i*$nil;
 		$tampil=$i+1;
		$x="$x <a href='?menu=$href&pag=$nilai'> $tampil | </a>";
		}
		$hasil ="<a href='?menu=$href&pag=0'> << </a>      $x       <a href='?menu=$href&pag=$nilai'> >> </a>";
		return $hasil;
}
 
 function thisCombo($sql,$pilih,$pilih2,$nama){
	 $r=mysql_query($sql); while($ww=mysql_fetch_array($r)){
		if($pilih2==$ww[$pilih]){
			 $t="$t <option value=$ww[$pilih] selected >$ww[$pilih] - $ww[$nama]</option>";
		}
		else
		{
			 $t="$t <option value=$ww[$pilih]>$ww[$pilih] - $ww[$nama]</option>";
		}
		
	 }
	  return $t;
 }
 
 function cari ($sql){
	$r=mysql_query($sql); 
	return $w=mysql_fetch_array($r);
	
}
function combo($sql,$cari){
	$r=mysql_query($sql);
	while($w=mysql_fetch_array($r)){
		if ($cari==$w[kd]){
			$sel="selected";
		}else{
			$sel="";
		}
		
		$x="$x <option value=$w[kd]> $w[f] </option>";
	}
	return $x;
	
}
 function judul($judul){
		$t= "$t
			<table border=0 style='font-size:11px; font-family:tahoma; width:100%; '>
				<tr> <td> <h1 style='line-height:4px; font-size:18px; color:#4d79ff;'>  $judul HANYA DEMO </h1></td>   </tr>
				<tr> <td style='font-size:11px; color:#001a00;'> Modul :  <i>$judul </i>   </td>   </tr>
				<tr> <td style='font-size:10px; border-top:1px solid #F0F0F0;'>   </td>   </tr>
				<tr> <td  height=20>   </td>   </tr>
			</table>
		
		";
		return $t;
	
}

 function judul2($judul){
		$t= "$t
			<table border=0 style='float:left;font-size:11px; font-family:tahoma; width:100%; '>
				<tr> <td> <h1 style='line-height:4px; font-size:13px; color:#4d79ff;'>  Keterangan :  </h1></td>   </tr>
				<tr> <td style='font-size:11px; color:#585858 ;'>    <b> 1. </b> Untuk proses simpan <b>klik</b> tombol <b>simpan</b>  </td>   </tr>
				<tr> <td style='font-size:11px; color:#585858;'>    <b> 2. </b>  Simbol ini <b style='color:red;'>  (*)  </b> data tidak boleh kosong </td>   </tr>
				<tr> <td style='font-size:10px; border-top:1px solid #F0F0F0;'>   </td>   </tr>
				<tr> <td  height=20>   </td>   </tr>
			</table>
		
		";
		return $t;
	
}
 
 function inklude($data){
	$h="	<script> window.open(
  '$data',
  '_blank'  );</script>";
  return $h;
 }
 function ico($nama){
	$hasil="<img src='img/$nama.png' width=21>";
	return $hasil;
 }
 
  function tambax(){
	$hasil="<img src='img/tambah.png'  >";
	return $hasil;
 }
 
function txt($data){
 
$lines = file($data); 
 
foreach ($lines as $line_num => $line){
	//print "<font color=red>Line #{$line_num}</font> : " . $line . "<br />\n"; 
	return  $line ;
	
}
}
 function _com($file,$nama,$arr)   {
 	$kata=split(",",$arr);
	$j=count($kata);
	for ($i=0; $i<=$j-1; $i++){
		$has="$has <option value='$kata[$i]'>$kata[$i]</option>";
	}
	$k="<option value=$file>$file</option>";
	$ka2="$k $has";
	return $ka2;
 }
 
 function masukGambar($nama){
 											$fileName = $_FILES[$nama]['name'];
											$fileSize = $_FILES[$nama]['size'];
											$fileError = $_FILES[$nama]['error'];
											if($fileSize > 0 || $fileError == 0){
											$move = move_uploaded_file($_FILES[$nama]['tmp_name'], 'berkas/'.$fileName);}
											
											$hasil="berkas/$fileName" ;
											return $hasil;
 }


function _ref($i,$kata){
 $rp=str_replace(' ','>',$kata);
 
 $k=$rp;
 $kt=split('>',$k);	
 	if (!empty($kt[$i])){
			
 $t="$t $kt[$i] "; 
 }
 return $t;
 }


function _jumlah($kata,$kir){
	 if(isset($_POST["$kir"])){
	$arr=split(">>",$kata);
	return $t=count($arr);
	}
}


function _wselek($sql){
  $r=mysql_query($sql); 
	return $r;
}

function td($arr,$j,$kode){
	$array=split(",",$arr);
	for ($i=1; $i <= $j ; $i++){
		$t="$t  $array[$i]  ";
	}
	return $t;
}

function td2($arr,$j, $kode){
	$ad="$arr";
	$array=split(",",$ad);
	for ($i=1; $i <= $j ; $i++){
			$a=$array[$i];
		$t="$t <td> $kode $array[$i]   </td>";
	}
	return $t;
}

function _tambahsub($file,$tambah){
if (isset($_POST[$tambah])){
	 $x++;
 	$t="$t
		<tr><td> $x  </td> <td> 
		</td> </tr>
	"; }
	return $t;
}

function _hit($file,$tambah,$post,$kode ){
if (isset($_POST[$tambah])){
	// $file +=1;
	 //$t="$t $file	"; 
 
	$xx= _hit_combo("$kode","$post");
	 $t="$t  <tr> <td>Sub </td>  <td><select Name=Sub>$xx </select></td> </tr>";
  }
	return $t;
 
}
 
function _hit_combo($kode,$post){
		$t="$t <option value='$post'>'$post'</option>";
	$r=mysql_query("select * from subelemen3 where KodeSubElemen2='$kode'");
	
	while($w=mysql_fetch_array($r)){
		$t="$t <option value='$w[NamaSub3]'>'$w[NamaSub3]'</option>";
	}
	return $t;
}
 

function pag_atas($minta,$tepat,$nilai){
	if (empty($minta))
			$t="$t $nilai";
			else
			$t="$t $tepat";
			
			return $t;

}

function pag_limit($dari ){
	if ( (empty($dari))  )
			$limit="$limit limit 1,$bayak";
			else
			$limit="$limit limit $dari , $batas";
			
			return $limit;

}


function pag($n,$banyak,$link){
	$x=sqrt($n);
	$a="$a <a href='$link&maju=0&banyak=$banyak'>0</a>";
		for ($i = 1 ; $i <= $x ; $i++){
				$h=$i*$n;
			$t="$t <a style='border:1px solid silver; padding:2px;' href='$link&maju=$h&banyak=$banyak'>  $i  </a>";
		
		}
		$c="$a $t";
		return $c;
}

 
function tahun($minta){
			$t="<option value=$minta>$minta</option>";
		for($i=2000; $i <= 2020 ; $i++){
			$t="$t <option value=$i>$i</option>";

}
			return $t;
}


  

function _tanggal($name,$value){
$hari=31;
$bulan=12;
$tahun_awal=1978;
$tahun=2025;

$date=split("-",$value);
		$date1=$kata[0];
		$date2=$kata[1];
		$date3=$kata[2];
		
		$opa=" <option value=$date[0]>$date[0]</option>";
		$opb="  <option value=$date[1]>$date[1]</option>";
		$opc="  <option value=$date[2]>$date[2]</option>";
		
	for($h=1; $h<$hari ; $h++){
		if($h < 10)
			$nol="0";
			else
			$nol="";
			
		$th="$th <option value=$nol$h>$nol$h</option>";
	}
	
	for($b=1; $b < $bulan ; $b++){
		if($b < 10)
			$nol="0";
			else
			$nol="";
			
		$tb="$tb <option value=$nol$b>$nol$b</option>";
	}	
	
	
		for($y=$tahun_awal; $y < $tahun ; $y++){
		$tt="$tt <option value=$y>$y</option>";
	}	
	$n1=1; $n2=2; $n3=3;
	return "<select name=$name$n1 >$opa $tt</select> <select name=$name$n2>$opb $tb</select> <select name=$name$n3>$opc $th</select> ";
}

function _selek($sql){
$r=mysql_query($sql); 
	return $w=mysql_fetch_array($r);
}



function _combo($sql,$nama,$kode,$file,$cari){

			 if (empty($cari))
			 		$where="";
					else
					$where="$cari";
					
			$r2=mysql_query("$sql  where $kode='$file' "); 	 $w2=mysql_fetch_array($r2) ;
			$a="$a <option value='$w2[$kode]'>$w2[$kode]  - $w2[$nama] </option> ";
				 
$r=mysql_query("$sql $where"); 	while($w=mysql_fetch_array($r)){
 
		$t="$t <option value='$w[$kode]'>$w[$kode]  - $w[$nama] </option> ";
	
	}
	$c="$k $a $t";
	return $c;
}

 
 
 
  function ckbox($minta,$jumlah,$nama,$jk){ 
  $jka=split(",",$jk);
  $j=count($jka);
  for ($i=0 ; $i <= $j-1; $i++){
  if ($minta==$jka[$i])
  $ckk="checked";
  else
  $ckk="";
	
	if($i<2)
		$maka="<br>";
 

  $t="$t 
<input style='border:1px solid silver;' name=$nama type=radio value='$jka[$i]' $ckk> $jka[$i] $maka "; }
  return $t ; 
  }
  
   function ckbox2($minta,$jumlah,$nama,$jk){ 
  $jka=split(",",$jk);
  $j=count($jka);
  for ($i=0 ; $i <= $j-1; $i++){
  if ($minta==$jka[$i])
  $ckk="checked";
  else
  $ckk="";
  $t="$t 
<input name=$nama type=radio value='$jka[$i]' $ckk> $jka[$i] "; }
  return $t ; 
  }
 
 function ckJenisKelamin($minta,$jumlah,$nama){ 
  $jk=array(
 
Lelaki,
Perempuan,
);
  for ($i=0 ; $i <= $jumlah; $i++){
  if ($minta==$jk[$i])
  $ckk="checked";
  else
  $ckk="";
  $t="$t 
<input name=$nama type=checkbox value='$jk[$i]' $ckk> $jk[$i] "; }
  return $t ; 
  }
  
  
 function ckAgama($minta,$jumlah,$nama){ 
  $jk=array(
 
"Islam",
"Kristen",
"Protestan",
"Hindu",
"Budha",
);
  for ($i=0 ; $i <= $jumlah; $i++){
  if ($minta==$jk[$i])
  $ckk="checked";
  else
  $ckk="";
  $t="$t 
<input name=$nama type=checkbox value='$jk[$i]' $ckk> $jk[$i] 
"; }
  
  return $t ; 
  }
  
function ckStatusAnakKandung($minta,$jumlah,$nama){ 
  $jk=array(
 
"AnakKandung",
"AnakTiri",
"AnakAngkat",
);
  for ($i=0 ; $i <= $jumlah; $i++){
  if ($minta==$jk[$i])
  $ckk="checked";
  else
  $ckk="";
  $t="$t 
<input name=$nama type=checkbox value='$jk[$i]' $ckk> $jk[$i] "; }
   return $t ; 
  }
  
  
  
   function subelemen3($minta){ 
  $subelemen3="subelemen3 

			
			<option value=$minta>$minta</option> 
			<option value=KodeSubElemen3>KodeSubElemen3</option>  
			
			<option value=KodeElemen>KodeElemen</option>  
			
			<option value=KodeSubElemen>KodeSubElemen</option>  
			
			<option value=KodeSubElemen2>KodeSubElemen2</option>  
			
			<option value=Sub>Sub</option>  
			
			<option value=NamaSub3>NamaSub3</option>  
			
			<option value=Nilai3>Nilai3</option>  
			"; 
 return $subelemen3 ;  }
  
  
 ?>