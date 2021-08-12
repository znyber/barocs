<!-- begin page-cover -->
	<div class="page-cover"></div>
	<!-- end page-cover -->
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header blue-gradient">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="/" class="navbar-brand"><font color="white"><i class="fa fa-dragon text-white"></i> <b>Kadalz</b>VPN</a></font>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar bg-white"></span>
					<span class="icon-bar bg-white"></span>
					<span class="icon-bar bg-white"></span>
				</button>
			</div>
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
		<li class="nav-profile">
		<a href="javascript:;" data-toggle="nav-profile">
		<div class="cover with-shadow"></div>
		<div class="image">
		<img src="/images/logo.png" alt="" />
		</div>
		<div class="info">	
		<b class="caret pull-right"></b>
		<b>Kadalz</b>VPN
		<small>by Big kadalz Family</small>						
	</div>
	</a></li>	<li>
	<ul class="nav nav-profile">
	<li><a href="javascript:;"><i class="fa fa-crown"></i> User Rank: <?php echo $me->type==1?'Admin':'Premium'; ?></a></li>
	<?php if ($me->type==1): ?>
  <?php else: ?>
	<li><a href="javascript:;"><i class="fa fa-money-bill-alt"></i> Balance: ₱<?php echo $me->saldo; ?>.00</a></li>
	
	<?php endif; ?>
	<li><a href="javascript:;"><i class="fa fa-user"></i> Username: <?php echo $me->username; ?></a></li>
	</ul>	</li></ul>
	<!-- end sidebar user -->
	<!-- begin sidebar nav -->
    <br />
				<ul class="nav">
					<li><a href="/"><i class="fa fa-th-large cyan-text"></i> <span>Home</span></a></li>
                    <?php if ($me->type==1): ?>
   
   <li class="has-sub">
	 <a href="javascript:;">
	<b class="caret"></b>
	<i class="fa fa-server cyan-text"></i><span>Server</span></a>
	
	<ul class="sub-menu">
	<li><a href="/home/admin/server"> <small><i class="fa fa-circle cyan-text"></i></small> List Server</a></li>
									<li><a href="/home/admin/server/add"> <small><i class="fa fa-circle cyan-text"></i></small> Add Server</a></li>
								</ul>
							</li>
							<li class="has-sub">
							    <a href="javascript:;">
							        <b class="caret"></b>
							        <i class="fa fa-users cyan-text"></i>
							        <span>Seller</span>
							    </a>
								<ul class="sub-menu">
									<li><a href="/home/admin/seller"> <small><i class="fa fa-circle cyan-text"></i></small> List Seller</a></li>
									<li><a href="/home/admin/seller/add"> <small><i class="fa fa-circle cyan-text"></i></small> Add Seller</a></li>
								</ul>
							</li>
						
						<?php else: ?>
							<li><a href="/home/member/server"><i class="fa fa-pencil-alt cyan-text"></i> <span>Create Account</span></a></li>
						
					<?php endif; ?>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-download cyan-text"></i>
					        <span>Extras</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="#"> <small><i class="fa fa-circle cyan-text"></i></small>Server Monitor</a></li>
						</ul>
					</li>
					<li><a href="/logout"><i class="fa fa-minus-circle cyan-text"></i> <span>Log Out</span></a></li>
					<li class="has-sub">
					    <a href="javascript:;">
					        <b class="caret"></b>
					        <i class="fa fa-tags cyan-text"></i>
					        <span>Credits</span>
					    </a>
						<ul class="sub-menu">
							<li><a href="https://t.me/znyber"> <small><i class="fa fa-user cyan-text"></i></small>znyber</a></li>
						</ul>
					</li>
<!--					<li><a href="https://www.phcorner.net"><i class="fa fa-globe cyan-text"></i> <span>PHCorner</span></a></li>-->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<?php echo $this->render($subcontent,$this->mime,get_defined_vars()); ?> 
