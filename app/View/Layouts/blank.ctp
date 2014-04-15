<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		百步梯人员管理系统子系统之摆摊系统:
	</title>
	<link href="/pitchv2/bbtFavicon.ico" type="image/x-icon" rel="icon" />
	<link href="/pitchv2/bbtFavicon.ico" type="image/x-icon" rel="shortcut icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo $this->webroot.'viewPlugins/bootstrap/css/bootstrap.min.css'; ?>"rel="stylesheet" media="screen">
	<link href="<?php echo $this->webroot.'viewPlugins/bootstrap/css/bootstrap-responsive.min.css'; ?>" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php echo $this->Html->script('jQuery_v1.10.2'); ?>
	<script src="<?php echo $this->webroot.'viewPlugins/bootstrap/js/bootstrap.min.js'; ?>"></script>
	<div id="content">
		<?php echo $this->fetch('content'); ?>
	</div>
</body>
</html>