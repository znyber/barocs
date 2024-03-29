<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8">
<![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Kadalz VPN </title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="https://t.me/znyber" name="author" />
    <meta name="theme-color" content="#29b6f6" />
    
	<!-- CSS Design -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="/asset/bonveizen/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" />
	<link href="/asset/bonveizen/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/css/mdb.min.css" rel="stylesheet">
	<link href="/asset/bonveizen/plugins/animate/animate.min.css" rel="stylesheet" />
	<!-- / CSS Design-->

	<!-- Javascript -->
	<script src="/asset/bonveizen/plugins/pace/pace.min.js"></script>
	<!-- / Javascript -->
	
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap4.min.css">
    	
</head>
<body class="pace-top">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	<link href="/asset/bonveizen/css/default/style.min.css" rel="stylesheet" />
	<link href="/asset/bonveizen/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="/asset/bonveizen/css/default/theme/yellow.css" rel="stylesheet" id="theme" />
	<?php echo $this->render($content,$this->mime,get_defined_vars()); ?>
  <!-- Base JS -->
<script src="/asset/bonveizen/plugins/jquery/jquery-3.2.1.min.js"></script>
<script src="/asset/bonveizen/plugins/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.5/js/mdb.min.js"></script>
<script src="/asset/bonveizen/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<!--[if lt IE 9]>
<script src="/asset/bonveizen/crossbrowserjs/html5shiv.js"></script>
<script src="/asset/bonveizen/crossbrowserjs/respond.min.js"></script>
<script src="/asset/bonveizen/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="/asset/bonveizen/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/asset/bonveizen/plugins/js-cookie/js.cookie.js"></script>
<script src="/asset/bonveizen/js/theme/transparent.min.js"></script>
<script src="/asset/bonveizen/js/apps.min.js"></script>
<!-- / Base JS -->

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
	App.init();
});
</script>
<script>
$(function () {
	$('#fornesia').DataTable({
	"paging": true,
	"lengthChange": false,
	"searching": false,
	"ordering": true,
	"info": true,
	"autoWidth": false
	});
});
</script>
</body>
</html>
