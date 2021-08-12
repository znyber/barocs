    <style type="text/css">
    a:link { text-decoration: none; }
    </style>
    <div id="content" class="content"> 
      <ol class="breadcrumb pull-right">
        <?php if ($seller->id): ?>
          
            <li class="breadcrumb-item"><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/home/admin/seller">List Seller</a></li>
            <li  class="breadcrumb-item active">Edit Seller</li>
          
          <?php else: ?>
            <li class="breadcrumb-item"><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/home/admin/seller">List Seller</a></li>
            <li class="breadcrumb-item active">Add Seller</li>
          
        <?php endif; ?>  
      </ol>
      <h1 class="page-header">
        <?php if ($seller->id): ?>
          
            Edit Seller
          
          <?php else: ?>
            Add Seller
          
        <?php endif; ?>
      </h1>
      <?php if ($message): ?>     
        <div class="alert alert-<?php echo $message['type']; ?>">
          <?php echo $message['data']; ?>
        </div>
      <?php endif; ?>
      <div class="row">
        <?php if ($seller->id): ?>
           
            <div class="col-lg-6">
          
          <?php else: ?>
            <div class="col-lg-12">
          
        <?php endif; ?>
          <div class="panel blue-gradient">
            <div class="panel-heading">
              <h4 class="panel-title text-white">        
              <?php if ($seller->id): ?>
                
                  <?php echo $seller->firstname; ?> <?php echo $seller->lastname; ?>
                
                <?php else: ?>
                  <i class="fa fa-plus"></i>
                
              <?php endif; ?>
              </h4>
            </div>
            <div class="panel-body bg-white text-black">
              <form role="form" action="<?php echo $URI; ?>" method="POST">
                <div class="form-group">
                  <label>First name</label>
                  <input class="form-control" placeholder="First name" name="firstname" type="text" value="<?php echo $seller->firstname; ?>" required>
                </div>
                <div class="form-group">
                  <label>Last name</label>
                  <input class="form-control" placeholder="Last name" name="lastname" type="text" value="<?php echo $seller->lastname; ?>" required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo $seller->username; ?>" required>
                </div>
                <?php if (!$seller->id): ?>
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" placeholder="New Password" name="password" type="password" required>
                  </div>
                  <div class="form-group">
                    <label>Re-enter Password</label>
                    <input class="form-control" placeholder="Re-enter Password" name="password_confirmation" type="password" required>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="Email" name="email" type="text" value="<?php echo $seller->email; ?>" required>
                </div>
                <div class="form-group">
                  <label>Balance</label>
                  <div class="input-group">
                    <span class="input-group-addon">₱ </span>
                    <input class="form-control" placeholder="100" name="saldo" type="number" step="1" value="<?php echo $seller->saldo; ?>" required>
                  </div>
                </div>
                <div align="right">
                  <button type="submit" class="btn btn-primary text-white">Save</button>
                  <?php if ($seller->id): ?>
                    
                      <?php if ($seller->active==1): ?>
                      
                        <a href="<?php echo $URI.'/active/0'; ?>" class="btn btn-warning">Locked</a>
                      
                      <?php else: ?>
                        <a href="<?php echo $URI.'/active/1'; ?>" class="btn btn-success">Unlocked</a>
                      
                      <?php endif; ?>
                      <a href="<?php echo $URI.'/delete'; ?>" class="btn btn-danger hapus">Delete</a>
                    
                    <?php else: ?>
                      <a href="/home/admin/seller" class="btn btn-default text-white">Back</a>
                    
                  <?php endif; ?>
                </div>
              </form>
            </div>
          </div>
        </div>
        <?php if ($seller->id): ?>  
          <div class="col-lg-6">
            <div class="panel blue-gradient">
              <div class="panel-heading">
                <h4 class="panel-title text-white"><i class="fa fa-lock"></i> Change Password</h4>
              </div>
              <div class="panel-body bg-white text-black">
                <form role="form" action="<?php echo $URI; ?>" method="POST">
                  <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" placeholder="New Password" name="password" type="password" required>
                  </div>
                  <div class="form-group">
                    <label>Re-enter New Password</label>
                    <input class="form-control" placeholder="Re-enter New Password" name="password_confirmation" type="password" required>
                  </div>

                  <div align="right">
                    <button type="submit" class="btn btn-primary text-white">Save</button>
                    <a href="/home/admin/seller" class="btn btn-default text-white">Back</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
