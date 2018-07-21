<?php
session_start();
error_reporting(0);
include_once "conf/dwo.lib.php";
include_once "conf/db.mysql.php";
include_once "conf/connectdb.php";
 include_once "conf/ClassRC.php";
require_once "conf/lib.session.php";

if (!login_check()){
  echo "<script>window.location = 'index.php'</script>";
  exit(0);
}

?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en"><!--<![endif]--><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>HALAMAN    | Administrator</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="adm_rc/css.css" rel="stylesheet">
	<link href="adm_rc/jquery-ui.css" rel="stylesheet">
	<link href="adm_rc/bootstrap.css" rel="stylesheet">
	<link href="adm_rc/font-awesome.css" rel="stylesheet">
	<link href="adm_rc/animate.css" rel="stylesheet">
	<link href="adm_rc/style.css" rel="stylesheet">
	<link href="adm_rc/style-responsive.css" rel="stylesheet">
	<link href="adm_rc/default.css" rel="stylesheet" id="theme">
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script async="" src="adm_rc/analytics.js"></script><script src="adm_rc/pace.js"></script>
	<!-- ================== END BASE JS ================== -->
</head>
<body class="  pace-done"><div class="pace  pace-inactive"><div class="pace-progress" style="width: 100%;" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in hide"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed in">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="" class="navbar-brand">
					<span class="navbar-logo"></span> BUS BOOKING   </a>
					
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar">s</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div style="position:absolute; top:18px; left:200px;">
								Palembang     <br> <i>Leadership Quality Feedback</i>
					</div>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="adm_rc/user-13.jpg" alt=""> 
							<span class="hidden-xs">Login Sebagai <?php echo $_SESSION[JABATAN]; ?>  </span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
			 
							<li class="divider"></li>
							<li><a href="index.php?keluar">Log Out</a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;"><div data-scrollbar="true" data-height="100%" style="overflow: hidden; width: auto; height: 100%;" data-init="true">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<div class="image">
							<a href="javascript:;"><img src="adm_rc/user-13.jpg" alt=""></a>
						</div>
						<div class="info">
							Selamat Datang
							<small><?php echo $_SESSION[NAMAUSER]; ?></small>
						</div>
					</li>
				</ul>
				<!-- end sidebar user -->
				
				
				<?php
					include "modul/modul.php";
				?>
				
				
				
			</div><div class="slimScrollBar" style="background: rgb(0, 0, 0) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 282.558px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<?php
				if (empty($_GET[menu])){
					include "tengah.php";
				}else{
					include "data/$_GET[menu].php";
				}
			
			?>
            <!-- end row -->
		</div>
		<!-- end #content -->
		
		
		
		
		
       
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="adm_rc/jquery-1.js"></script>
	<script src="adm_rc/jquery-migrate-1.js"></script>
	<script src="adm_rc/jquery-ui.js"></script>
	<script src="adm_rc/bootstrap.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="adm_rc/jquery.js"></script>
	<script src="adm_rc/jquery_002.js"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="adm_rc/apps.js"></script>
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