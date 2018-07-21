<?php
session_start();
error_reporting(0);
include_once "conf/dwo.lib.php";
include_once "conf/db.mysql.php";
include_once "conf/connectdb.php";
include_once "conf/ClassRC.php";
require_once "conf/lib.session.php";

if (isset($_GET[keluar])){
  session_destroy();
  echo "<script>window.location = '?'</script>";  
}

if (login_check()){
  echo "<script>window.location = 'adm.php'</script>";
  exit(0);
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Halaman    | Login Page</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="login/css.css" rel="stylesheet">
	<link href="login/jquery-ui.css" rel="stylesheet">
	<link href="login/bootstrap.css" rel="stylesheet">
	<link href="login/font-awesome.css" rel="stylesheet">
	<link href="login/animate.css" rel="stylesheet">
	<link href="login/style.css" rel="stylesheet">
	<link href="login/style-responsive.css" rel="stylesheet">
	<link href="login/default.css" rel="stylesheet" id="theme">
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script async="" src="login/analytics.js"></script><script src="login/pace.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top  pace-done">

<div class="pace  pace-inactive"><div class="pace-progress" style="width: 100%;" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in hide"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade in">
	    <!-- begin login -->
		
        <div class="login bg-black animated fadeInDown">
            <!-- begin brand -->
            <div class="login-header">
                <div class="brand">
                    <span class="logo"></span> Halaman Administrator  
                    <small>isilah username dan password dengan benar dibawah ini</small>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in"></i>
                </div>
            </div>
            <!-- end brand -->
            <div class="login-content">
                <form action="" method="POST" class="margin-bottom-0">
                    <div class="form-group m-b-20">
                        <input name=Username class="form-control input-lg inverse-mode no-border" placeholder="Username  " required="" type="text">
                    </div>
                    <div class="form-group m-b-20">
                        <input name=Password class="form-control input-lg inverse-mode no-border" placeholder="Password" required="" type="password">
                    </div>
                    <div class="login-buttons">
                        <input  type="submit" class="btn btn-success btn-block btn-lg" name=log value=login>
                    </div>
                </form>
            </div>
        </div>
		
		<?php
			if(isset($_POST[log])){
				if (!empty($_POST[Username])){
									$w=cari("select * from user where Username='".$_POST[Username]."' and Password='".md5($_POST[Password])."'  and Status_Akses='Y' and Level_Akses='0' ");
									if (empty($w)){
										$ww=cari("select * from user where Username='".$_POST[Username]."' and Password='".md5($_POST[Password])."'  and Status_Akses='Y' and Level_Akses='2' ");
										if (empty($ww)){
											$www=cari("select * from user where Username='".$_POST[Username]."' and Password='".md5($_POST[Password])."'  and Status_Akses='Y' and Level_Akses='3' ");
											if (empty($www)){
												echo "<script>alert('Maaf login anda ditolak ');</script>";
											}else{
												session_start();
												$_SESSION[IDUSER]=$www[Id_User];
												$_SESSION[USERNAME]=$www[Username];
												$_SESSION[NAMAUSER]=$www[Nama];
												$_SESSION[JABATAN]="Pimpinan";
												$_SESSION[LEVELAKSES]=$www[Level_Akses];
												$_SESSION[IDBUS]=$www[Id_Bus];
												login_validate();
													echo "<script> location.href='adm.php' </script>";
											}
										}else{
											session_start();
											$_SESSION[IDUSER]=$ww[Id_User];
											$_SESSION[USERNAME]=$ww[Username];
											$_SESSION[NAMAUSER]=$ww[Nama];
											$_SESSION[JABATAN]="Petugas PO";
											$_SESSION[LEVELAKSES]=$ww[Level_Akses];
											$_SESSION[IDBUS]=$ww[Id_Bus];
											login_validate();
												echo "<script> location.href='adm.php' </script>";
										}
									}else{
										session_start();
										$_SESSION[IDUSER]=$w[Id_User];
										$_SESSION[USERNAME]=$w[Username];
										$_SESSION[NAMAUSER]=$w[Nama];
										$_SESSION[JABATAN]="Admin";
										$_SESSION[LEVELAKSES]=$w[Level_Akses];
										$_SESSION[IDBUS]="null";
										login_validate();
											echo "<script> location.href='adm.php' </script>";
									}
				}
			}
		?>
        <!-- end login -->
        
       
	</div>
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="login/jquery-1.js"></script>
	<script src="login/jquery-migrate-1.js"></script>
	<script src="login/jquery-ui.js"></script>
	<script src="login/bootstrap.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="login/jquery.js"></script>
	<script src="login/jquery_002.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="login/apps.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');

</script>


</body></html>