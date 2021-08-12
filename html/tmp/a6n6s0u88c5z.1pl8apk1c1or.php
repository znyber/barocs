    <style type="text/css">
    a:link { text-decoration: none; }
    </style>
    <div id="content" class="content"> 
      <ol class="breadcrumb pull-right">
      </ol>
      <button href="<?php echo $URI; ?>/add" class="btn btn-sm light-green accent-4 pull-right text-white"><i class="fa fa-plus"></i> Add Seller</button>
      <h1 class="page-header">List Seller</h1><br />
      <div class="row">
        <?php if ($message): ?>     
          <div class="alert alert-<?php echo $message['type']; ?>">
            <?php echo $message['data']; ?>
          </div>
        <?php endif; ?>
        <div class="col-lg-4">
          <div class="panel blue-gradient">
            <div class="panel-heading">
              <h4 class="panel-title text-white"><i class="fa fa-money-bill-alt fa-fw"></i> Quick Deposit</h4>
            </div>
            <div class="panel-body bg-white text-white">
              <form role="form" action="/home/admin/seller/deposit" method="POST">
                <div class="form-group">
                  <label>Seller</label>
                  <select class="form-control" name="id">
                    <?php foreach (($sellers?:array()) as $seller): ?>
                      <option value="<?php echo $seller->id; ?>"><?php echo $seller->username; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Deposit</label>
                  <div class="input-group">
                    <span class="input-group-addon">₱ </span>
                    <input class="form-control" placeholder="100" name="deposit" type="number" min="1" step="1" required>
                  </div>
                </div>
                <div align="right">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="reset" class="btn btn-danger">Reset</button>                        
                </div>

              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="panel blue-gradient">
            <div class="panel-heading">
              <h4 class="panel-title text-white"><i class="fa fa-hand-holding-usd text-white"></i> Seller List</h4>
            </div>
            <div class="panel-body bg-white text-black">
              <table id="fornesia" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                <thead>
                  <tr>
                    <th width="25%">No#</th>
                    <th width="25%">Username</th>
                    <th width="25%">Balance</th>   
                    <th width="25%">Action</th>             
                  </tr>
                </thead>
                <tbody>
                  <?php $no=0; foreach (($sellers?:array()) as $seller): $no++; ?>
                  <tr>
                    <td width="25%"><?php echo $no; ?></td>
                    <td width="25%"><?php echo $seller->username; ?></td>                                    
                    <td width="25%">RM <?php echo $seller->saldo; ?></td>                                     
                    <td width="25%"> 
                      <a href="/home/admin/seller/<?php echo $seller->id; ?>" class="btn btn-primary">Edit</a>&nbsp;
                      <?php if ($seller->active==1): ?>
                        
                          <a href="/home/admin/seller/<?php echo $seller->id; ?>/active/0" class="btn btn-warning">Lock</a>
                        
                        <?php else: ?>
                          <a href="/home/admin/seller/<?php echo $seller->id; ?>/active/1" class="btn btn-success">Unlock</a>
                        
                      <?php endif; ?>
                    </td>  
                  </tr>
                  <?php endforeach; ?>   
                </tbody>                             
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>