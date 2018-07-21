 			<?php
				$keg=cari("select count(*) as j from transaksi");
				$us=cari("select count(*) as j from user where Level_Akses='1' ");
				$peg=cari("select count(*) as j from user where Level_Akses!='1' ");
			?>
			<!-- begin row -->
			<div class="row">
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-green">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>TOTAL TRANSAKSI</h4>
							<p><?php 
							echo $keg[j]." Transaksi"; ?> </p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon"><i class="fa fa-users"></i></div>
						<div class="stats-info">
							<h4>TOTAL PELANGGAN</h4>
							<p><?php echo $us[j]." Orang"; ?> </p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-purple">
						<div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
						<div class="stats-info">
							<h4>TOTAL PEGAWAI</h4>
							<p><?php echo $peg[j]." Orang"; ?></p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-md-3 col-sm-6">
					<div class="widget widget-stats bg-red">
						<div class="stats-icon"><i class="fa fa-clock-o"></i></div>
						<div class="stats-info">
							<h4>WAKTU SEKARANG</h4>
							<p id=jam> </p>	
						</div>
						<div class="stats-link">
							<a href="javascript:;"></a>
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			</div>
			<!-- end row -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-8 -->
				<div class="col-md-12 ui-sortable">
		 
					<div class="tab-content" data-sortable-id="index-1">
						<div class="tab-pane fade active in" id="latest-post">
							<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
							<div class="height-sm"  >
								<ul class="media-list media-list-with-divider" style="height:  120px;">
								
 
								</ul>
							</div>
							</div>
						</div>
	
					</div>
					
				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->
<script>
 
	var d=Date();
	var st=d.split(" ");
	document.getElementById("jam").innerHTML=st[0]+" "+st[1]+" "+st[2]+" "+st[3] ;

</script>