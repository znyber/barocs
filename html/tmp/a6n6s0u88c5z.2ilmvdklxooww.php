		<div id="content" class="content">  
			<h1 class="page-header">Dashboard <small>(<?php echo $me->username; ?>)</small></h1>

			<div class="row">
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats aqua-gradient">
						<div class="stats-icon"><i class="fa fa-desktop"></i></div>
						<div class="stats-info">
							<h4>User Rank</h4>
							<p><?php echo $me->type==1?'Admin':'Premium'; ?></p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats aqua-gradient">
						<div class="stats-icon"><i class="fa fa-user"></i></div>
						<div class="stats-info">
							<h4>Username</h4>
							<p><?php echo $me->username; ?></p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats aqua-gradient">
						<div class="stats-icon"><i class="fa fa-envelope"></i></div>
						<div class="stats-info">
							<h4>Email</h4>
							<p><?php echo $me->email; ?></p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				
				<?php if ($me->type==1): ?>
        <?php else: ?>
				<!-- begin col-3 -->
				<div class="col-lg-3 col-md-6">
					<div class="widget widget-stats aqua-gradient">
						<div class="stats-icon"><i class="fa fa-money-bill-alt"></i></div>
						<div class="stats-info">
							<h4>Balance</h4>
							<p>₱ <?php echo $me->saldo; ?>.00</p>	
						</div>
					</div>
				</div>
				<!-- end col-3 -->
			
			<?php endif; ?>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
					<div class="panel blue-gradient">
						<div class="panel-heading">
							<div class="panel-title text-white"><i class="fa fa-bullhorn"></i> Announcements</div>
						</div>
						<div class="panel-body bg-white">
							<ul class="media-list media-list-with-divider media-messaging">
								<li class="media media-sm">
									<a href="javascript:;" class="pull-left">
										<h1><i class="fa fa-clock"></i></h1>
									</a>
									<div class="media-body">
										<h5 class="media-heading">Server Reset Time</h5>
										<p>4:00AM GMT+07:00 ID Standard Time</p>
									</div>
								</li>
								<li class="media media-sm">
									<a href="javascript:;" class="pull-left">
										<h1><i class="fa fa-exclamation-triangle"></i></h1>
									</a>
									<div class="media-body">
										<h5 class="media-heading">Warning</h5>
										<p>Please follow the rules carefully to avoid account blocking</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
					<div class="panel blue-gradient">
						<div class="panel-heading">
							<div class="panel-title text-white"><i class="fa fa-newspaper"></i> News</div>
						</div>
						<div class="panel-body bg-white text-black">
							<ul class="media-list media-list-with-divider media-messaging">
								<li class="media media-sm">
									<a href="javascript:;" class="pull-left">
										<img src="/images/logo.png" alt="" class="media-object rounded-corner">
									</a>
									<div class="media-body">
										<h5 class="media-heading">Welcome to KadalzVPN Panel</h5>
										<p>All Servers are ready for account creation, Enjoy our fast service<br/></p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
