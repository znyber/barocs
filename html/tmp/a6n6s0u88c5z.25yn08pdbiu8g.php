    <style type="text/css">
    tr.noBorder td {
      border: 0;
    }
    </style>
    <div id="content" class="content">  
      <ol class="breadcrumb">
      	<li><a href="/home/setting"><div class="badge blue-gradient text-white">Dashboard</div>➜</a></li>
      	<li><a href="/home/member/server"><div class="badge blue-gradient text-white">Server List</div>➜</a></li>
      	<li class="active text-warning"><div class="badge purple-gradient text-white"><?php echo $server->servername; ?></div></li> </ol><br />
      <h1 class="page-header"><i class="fa fa-feather-alt cyan-text"></i> <?php echo $server->servername; ?></h1>
      <div class="row">
        <div class="col-lg-4">
          <div class="panel blue-gradient">
            <div class="panel-heading">
              <h4 class="panel-title text-white"><i class="fa fa-angry text-white"></i> Account Rules</h4>
            </div>
            <div class="panel-body bg-white text-black">
            <ul>
               <li>No Torrent, Hacking, DDos</li>
               <li>Use strong password</li>
               <li>Username without spaces</li>
               <li>Username and password can not be the same</li>
            </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="panel blue-gradient">
            <div class="panel-heading">
              <h4 class="panel-title text-white"><i class="fa fa-shield-alt text-white"></i> <?php echo $server->servername; ?></b> <?php echo $server->active==1?'':'( Locked )'; ?></h4>
            </div>
            <div class="panel-body bg-white text-black">
              <?php if ($message): ?>     
                <div class="alert alert-<?php echo $message['type']; ?>">
                  <?php echo $message['data']; ?>
                </div>
              <?php endif; ?>
              <form role="form" action="<?php echo $URI; ?>" method="POST">
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" placeholder="Type Username" name="user" type="text" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" placeholder="Type Password" name="pass" type="text" required>
                </div>
                <div class="form-group">
                  <label>Re-enter Password</label>
                  <input class="form-control" placeholder="Type Re-enter Password" name="pass_confirmation" type="text" required>
                </div>       
                <div align="right">                
                  <button class="btn aqua-gradient text-white">Create</button>
                  <a href="/home/member/server" class="btn btn-default text-white">Back</a>               
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>