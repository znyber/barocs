    <style type="text/css">
    tr.noBorder td {
      border: 0;
    }
    </style>
    <div id="content" class="content">  
      <ol class="breadcrumb pull-right">
      </ol>
      <button href="<?php echo $URI; ?>/add" class="btn light-green accent-4 pull-right text-white"><i class="fa fa-plus fa-fw"></i> Add Server</button>
      <h1 class="page-header"><i class="fa fa-desktop cyan-text"></i> Server List</h1>
      <div class="row">
        <?php foreach (($servers?:array()) as $server): ?>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <?php if ($message): ?>     
              <div class="alert alert-<?php echo $message['type']; ?>">
                <?php echo $message['data']; ?>
              </div>
            <?php endif; ?>
            <br />
            <div class="panel blue-gradient">
              <div class="panel-heading">
                <h4 class="panel-title text-white"><b><i class="fa fa-torah"></i></b> <?php echo $server->servername; ?> <?php echo $server->active==1?'':'( Locked )'; ?></h4>
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
                    <td>SSH Port</td><td><?php echo $server->openssh; ?></td>
                  </tr>
                  <tr class="noBorder">
                    <td>Dropbear Port</td><td><?php echo $server->dropbear; ?></td>
                  </tr>
                  <tr class="noBorder">
                    <td>SSL Port</td><td><?php echo $server->stunnel; ?></td>
                  </tr>
                  <tr class="noBorder">
                    <td>Price</td><td>₱ <?php echo $server->price; ?>.00</td>
                  </tr>
                  <tr class="noBorder">
                    <td>Server Owner</td><td><?php echo $server->server_owner; ?></td>
                  </tr>
                </table>
              </div>
              <div class="panel-footer text-right">
                <a href="<?php echo $URI.'/'.$server->id; ?>" class="btn bg-blue text-white"><i class="fa fa-edit fa-fw text-white"></i> Edit</a>
<a href="<?php echo $URI.'/'.$server->id; ?>/account" class="btn bg-blue text-white"><i class="fa fa-user fa-fw text-white"></i>User List</a> 

              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>