<?php
if($_SESSION[LEVELAKSES] == "0"){
											?><!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Menu Administrator</li>
					<li class="has-sub">
						<a href="adm.php">
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
				 
					</li>
 
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-folder"></i>
						    <span>Pengguna</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="?menu=user">User Sistem</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-folder"></i>
						    <span>Master</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="?menu=bus">Bus</a></li>
							<li><a href="?menu=kota">Kota Perjalanan</a></li>
							<li><a href="?menu=rute">Rute Perjalanan</a></li>
							<li><a href="?menu=jadwal">Jadwal Perjalanan</a></li>
						</ul>
					</li>
 
 					<li>
					    <a href="?menu=konfirmasi">
					        <i class="fa fa-file"></i>
					        <span>Konfirmasi</span>
					    </a>
					</li>
 
 					<li>
					    <a href="index.php?keluar">
					        <i class="fa fa-lock"></i>
					        <span>  Logout</span>
					    </a>
					</li>
	 
 
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
<?php
}else if($_SESSION[LEVELAKSES] == "2"){
											?><!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Menu Kasir</li>
					<li class="has-sub">
						<a href="adm.php">
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
				 
					</li>
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-folder"></i>
						    <span>Data</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="?menu=pelanggan_lunas">Pelanggan Lunas</a></li>
						</ul>
					</li>
					
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-folder"></i>
						    <span>Laporan</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="?menu=lap-pemberangkatan">Pemberangkatan</a></li>
						</ul>
					</li>
 
 					<li>
					    <a href="index.php?keluar">
					        <i class="fa fa-lock"></i>
					        <span>Logout</span>
					    </a>
					  
					</li>
	 
 
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
<?php
}else if($_SESSION[LEVELAKSES] == "3"){
											?><!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Menu Direktur</li>
					<li class="has-sub">
						<a href="adm.php">
						    <i class="fa fa-laptop"></i>
						    <span>Dashboard</span>
					    </a>
				 
					</li>
 
					<li class="has-sub">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-folder"></i>
						    <span>Laporan</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="?menu=lap-pemberangkatan">Pemberangkatan</a></li>
						</ul>
					</li>
 
 					<li>
					    <a href="index.php?keluar">
					        <i class="fa fa-lock"></i>
					        <span>  Logout</span>
					    </a>
					  
					</li>
	 
 
			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
<?php
}
?>