    <style type="text/css">
    tr.noBorder td {
      border: 0;
    }
    </style>
  <!-- Content Wrapper. Contains page content -->
  <div id="content" class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h2 class="page-header"><i class="fa fa-desktop cyan-text"></i> User List | <small><?php echo $server->servername; ?></small></h2>
      <ol class="breadcrumb">
      	<li><a href="/home/setting"><div class="badge thirdy text-white">Dashboard</div>➜</a></li>
      	<li><a href="/home/admin/server"><div class="badge thirdy text-white">Server List </div>➜</a></li>
       <li><div class="badge badge-success">User List </div></li>
      	</ol><br />
    </section>

    <!-- Main content -->
      <div class="row">
      <div class="col-lg-4">
        <!-- <div class="col-xs-1"> -->
          <div class="box box-primary">
          <a href="<?php echo $URI; ?>/add" class="btn btm-sm light-green accent-4 text-white pull-right"><i class="fa fa-plus"></i> Add User</a>
            <div class="box-header">
              <i class="fa fa-group fa-fw"></i><h3 class="box-title">User List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="fornesia" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>St</th>
                  <th>Username</th>
                  <th>Create By</th>
                  <th>Exp</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                                <?php if ($users): ?>
                                    
                                        <?php $no=0; foreach (($users?:array()) as $user): $no++; ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $user->user; ?></td>
                  <td><?php echo $user->real; ?></td>
                  <td><?php echo $user->exp; ?></td>
                  <td>
                                                    <a href="<?php echo $URI.'/'.$user->uid; ?>" class="btn btn-primary">Edit</a>
                                                    <?php if ($user->lock): ?>
                                                        
                                                            <a href="<?php echo $URI.'/'.$user->uid; ?>/active/1" class="btn btn-success">Unlock</a>
                                                        
                                                        <?php else: ?>
                                                            <a href="<?php echo $URI.'/'.$user->uid; ?>/active/0" class="btn btn-warning">Lock</a>
                                                        
                                                    <?php endif; ?>
              <a href="<?php echo $URI.'/'.$user->uid; ?>/delete" class="btn btn-danger">Delete</a>
                                                </td>
                                             </tr>
                                        <?php endforeach; ?>
                                    
                                    <?php else: ?>
                                        <tr>
                                            <td class="text-muted text-center" colspan="6">User Not available</td>
                                        </tr>
                                    

                                <?php endif; ?>
				  

                <tfoot>
                <tr>
                  <th>St</th>
                  <th>Username</th>
                  <th>Create By</th>
                  <th>Exp</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    

    
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->