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
	<link href="<?php echo $this->webroot.'viewPlugins/bootstrap/css/doc.css'; ?>"rel="stylesheet" media="screen">
	<?php echo $this->Html->css('BBT'); ?>
	<?php echo $this->Html->script('jQuery_v1.10.2'); ?>
	
	<script src="<?php echo $this->webroot.'viewPlugins/bootstrap/js/bootstrap.min.js'; ?>"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php echo $this->element('navigation_bar'); ?>
	<script type="text/javascript">
		var selected_bar  = "manager-nav-bar";
		var webroot = "<?=$this->webroot?>";
	</script>
	<?php echo $this->Html->script('active_navigation_bar'); ?>
	
	<div class="container">
		<div class="row">
			<div class="span3 bs-docs-sidebar hidden-phone">
				<ul class="nav nav-list bs-docs-sidenav">
					<li><a href="<?php echo $this->webroot.'Users/showAllUsers'; ?>"><i class="icon-chevron-right is-selected"></i>全员列表</a></li>
					<li><a href="<?php echo $this->webroot.'Users/checkTimetable'; ?>"><i class="icon-chevron-right is-selected"></i>审核课表</a></li>
					<li><a href="<?php echo $this->webroot.'Users/logout'; ?>"><i class="icon-chevron-right is-selected"></i>注销</a></li>
				</ul>
			</div>
			<div class="span9">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>

<!--	<div id="mid">
		<div class="row">
			<div class="nav nav-list">
				<ul class="nav nav-list bs-docs-sidenav">
					<li><i class="icon-chevron-right"></i>< ?php echo $this->Html->link('个人资料',array('controller' => 'Users','action' => 'showUserInformation')); ?></li>
					<li><i class="icon-chevron-right"></i>< ?php echo $this->Html->link('修改课表',array('controller' => 'Timetables','action' => 'edit')); ?></li>
					<li><i class="icon-chevron-right"></i>< ?php echo $this->Html->link('注销',array('controller' => 'Users','action' => 'logout')); ?></li>
				</ul>
			</div>
		</div>
		<div id="content">
			< ?php echo $this->fetch('content'); ?>
		</div>
	</div> -->
</body>
</html>