<!-- begin #page-container -->
<div id="page-container" class="fade">
    <!-- begin login -->
    <div class="login animated fadeInDown">
        <!-- begin brand -->
        <div class="login-header">
            <div class="brand text-black"><i class="fa fa-dragon cyan-text"></i>
             <b>Kadalz</b>VPN
                <small class="text-black">by Big kadalz-Family</small>
            </div>
            <div class="icon">
                <i class="fa fa-dragon cyan-text"></i>
            </div>
        </div>
        <!-- end brand -->
        <!-- begin login-content -->
        <div class="login-content">
                <?php if ($message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>"><?php echo $message['data']; ?></div>
                <?php endif; ?>
            <form action="/login" method="post" class="margin-bottom-0">
                <div class="form-group m-b-20">
                    <input type="text" class="form-control form-control-lg text-black" id="username" name="username" name="username" placeholder="Username" required />
                </div>
                <div class="form-group m-b-20">
                    <input type="password" class="form-control form-control-lg text-black" id="password" name="password" type="password" placeholder="Password" required />
                </div>
                <div class="login-buttons">
                    <button type="submit" mame="submit" class="btn btn-block btn-lg aqua-gradient text-white text-capitalize">Login</button>
                </div>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end login -->
</div>
