        <style type="text/css">
        tr.noBorder td {
          border: 0;
        }
        </style>
        <div id="content" class="content">
         <h3 class="page-header"><i class="fa fa-laugh cyan-text"></i> Account Successfully Created</h3>
            <div class="row">
                <div class="col-sm-10 col-md-10 col-lg-8">
                </div>
                <div class="col-sm-10 col-md-10 col-lg-8">
                    <div class="panel blue-gradient">
                        <div class="panel-heading">
                            <h4 class="panel-title text-white"><i class="fa fa-shield-alt text-white"></i> <?php echo $server->servername; ?></b> <?php echo $server->active==1?'':'( Locked )'; ?></h4>
                        </div>
                        <div class="panel-body bg-white">
                            <table class="table table-hover">
                                <tbody>
                                    <tr class="noBorder">
                                        <td>Username</td><td><?php echo $user->user; ?></td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>Password</td><td><?php echo $user->pass; ?></td>
                                    </tr>
<tr class="noBorder">
                                        <td>OpenSSH Port</td><td><?php echo $server->openssh; ?></td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>Dropbear Port</td><td><?php echo $server->dropbear; ?></td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>SSL Port</td><td><?php echo $server->stunnel; ?></td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>OpenVPN Link</td><td><a href="<?php echo $server->openvpn_link; ?>">Download Here</a></td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>Is this server Torrent Enabled?</td><td><?php echo $server->torrent; ?></td>
                                    <tr class="noBorder">
                                        <td>Is this server Abuse Enabled?</td><td><?php echo $server->torrent; ?></td>
                                    </tr>
                                    <tr class="noBorder">
                                        <td>Account Expiry</td><td><?php echo \Webmin::exp_decode($user->expire); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer bg-white" align="right">
                            <a href="/home/member/server" class="btn btn-default btn-fill text-white">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>