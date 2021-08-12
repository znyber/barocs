    <style type="text/css">
    a:link { text-decoration: none; }
    </style>
    <div id="content" class="content"> 
      <ol class="breadcrumb pull-right">
        <?php if ($server->id): ?>
          
            <li class="breadcrumb-item"><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/home/admin/server">List Server</a></li>
            <li  class="breadcrumb-item active">Edit Server (<?php echo $server->servername; ?>)</li>
          
          <?php else: ?>
            <li class="breadcrumb-item"><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/home/admin/server">List Server</a></li>
            <li class="breadcrumb-item active">Add Server</li>
          
        <?php endif; ?>  
      </ol>
      <h1 class="page-header">
        <?php if ($server->id): ?>
          
            <?php echo $server->servername; ?>
          
          <?php else: ?>
            Add Server
          
        <?php endif; ?>
      </h1>
      <div class="panel blue-gradient">
        <div class="panel-heading">
          <h4 class="panel-title text-white"><i class="fa fa-plus text-white"> Add Server</i></h4>
        </div>
        <div class="panel-body bg-white text-black">
          <?php if ($message): ?>     
            <div class="alert alert-<?php echo $message['type']; ?>">
              <?php echo $message['data']; ?>
            </div>
          <?php endif; ?>
          <form role="form" action="<?php echo $URI; ?>" method="POST">
          	<div class="form-group">
              <label>Server Name</label>
              <input class="form-control" placeholder="Server 01" name="servername" type="text" value="<?php echo $server->servername; ?>" required>
            </div>
            <div class="form-group">
              <label>Server Location</label>
              <input class="form-control" placeholder="Singapore, USA" name="country" type="text" value="<?php echo $server->country; ?>" required>
            </div>
            <div class="form-group">
              <label>IP Address / Hostname</label>
              <input class="form-control" placeholder="128.199.xxx.xx or etc." name="host" type="text" value="<?php echo $server->host; ?>" required>
            </div>
            <div class="form-group">
              <label>SSH Port</label>
              <input class="form-control" placeholder="22" name="openssh" type="text" value="<?php echo $server->openssh; ?>" required>
            </div>
            <div class="form-group">
              <label>Dropbear Port</label>
              <input class="form-control" placeholder="none kung wala" name="dropbear" type="text" value="<?php echo $server->dropbear; ?>" required>
            </div>
            <div class="form-group">
              <label>SSL Port</label>
              <input class="form-control" placeholder="none kung wala" name="stunnel" type="text" value="<?php echo $server->stunnel; ?>" required>
            </div>
            <div class="form-group">
              <label>OpenVPN Port</label>
              <input class="form-control" placeholder="465" name="openvpn_port" type="openvpn_port" value="<?php echo $server->openvpn_port; ?>" required>
            </div>
            <div class="form-group">
              <label>OpenVPN Link</label>
              <input class="form-control" placeholder="your-ip:88/GTMConfig.ovpn or your own link" name="openvpn_link" type="text" value="<?php echo $server->openvpn_link; ?>" required>
            </div>
            <div class="form-group">
              <label>Squid Port</label>
              <input class="form-control" placeholder="8080, 3128, 8000, 80" name="proxy" type="text" value="<?php echo $server->proxy; ?>" required>
            </div>
            <div class="form-group">
              <label>Server Owner</label>
              <input class="form-control" name="server_owner" type="text" value="Bon-chan" required>
            </div>
            <div class="form-group">
              <label>Torrent Allow ?</label>
              <select class="form-control" name="torrent" value="<?php echo $server->torrent; ?>">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
            </div>
            <!-- <div class="form-group">
              <label>User limit</label>
              <input class="form-control" placeholder="this function is not working, use 0 instead" name="limitacc" type="text" value="<?php echo $server->limitacc; ?>" required>
            </div> -->
            <div class="form-group">
              <label>Price</label>
              <div class="input-group">
                <span class="input-group-addon">₱</span>
                <input class="form-control" placeholder="10" name="price" type="number" step="1" value="<?php echo $server->price; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label>Root Password</label>
              <input class="form-control" placeholder="root" name="root_pass" type="password">
            </div>
            <div align="right">
              <button type="submit" class="btn btn-primary text-white">Save</button>
              <?php if ($server->id): ?>
                <?php if ($server->active==1): ?>
                  
                    <a href="<?php echo $URI.'/active/0'; ?>" class="btn btn-warning text-white">Lock</a>
                  
                  <?php else: ?>
                    <a href="<?php echo $URI.'/active/1'; ?>" class="btn btn-success text-white">Unlock</a>
                  
                <?php endif; ?>
                <a href="<?php echo $URI.'/delete'; ?>" class="btn btn-danger hapus text-white">Delete</a>
              <?php endif; ?>
              <a href="/home/admin/server" class="btn btn-default text-white">Back</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>