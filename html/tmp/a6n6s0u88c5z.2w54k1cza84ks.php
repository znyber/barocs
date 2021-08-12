    <style type="text/css">
    tr.noBorder td {
      border: 0;
    }
    </style>
    <div id="content" class="content">  
      <ol class="breadcrumb">
      	<li><a href="/home/setting"><div class="badge blue-gradient text-white">Dashboard</div>➜</a></li>
      	<li><a href="/home/member/server"><div class="badge purple-gradient text-white">Server List </div></a></li>
      	</ol><br />
      <h2 class="page-header"><i class="fa fa-laptop cyan-text"></i> Servers List</h2>
      <div class="row">
        <?php foreach (($servers?:array()) as $server): ?>
          <div class="col-sm-7 col-md-6 col-lg-8">
            <?php if ($message): ?>     
              <div class="alert alert-<?php echo $message['type']; ?>">
                <?php echo $message['data']; ?>
              </div>
            <?php endif; ?>
            <div class="panel blue-gradient">
              <div class="panel-heading">
                <h4 class="panel-title text-white"><i class="fa fa-server"></i> <?php echo $server->servername; ?></b> <?php echo $server->active==1?'':'( Locked )'; ?></h4>
              </div>
              <div class="panel-body bg-white text-black">
                <table class="table">
                  <tr class="noBorder">
                    <td>Location</td><td><?php echo $server->country; ?></td>
                  </tr>
                  <tr class="noBorder">
                    <td>Host Address</td><td><?php echo $server->host; ?></td>
                  </tr>
                  <tr class="noBorder">
                    <td>Validity</td><td>25 days</td>
                  </tr>
                  <tr class="noBorder">
                    <td>Server Owner</td><td><?php echo $server->server_owner; ?></td>
                   </tr>
                </table>
              </div>
              <div class="panel-footer bg-white text-right">
                <a href="<?php echo $URI.'/'.$server->id; ?>" class="btn aqua-gradient text-white text-capitalize"> <i class="fa fa-hourglass fa-spin"></i> Create</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
