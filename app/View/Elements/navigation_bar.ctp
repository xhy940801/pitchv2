	<div class="navbar navbar-inverse navbar-static-top">
		<div class="navbar-inner" id="navigation-bar">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户信息</a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('个人资料',array('controller' => 'Users','action' => 'showUserInformation')); ?></li>
							<li><?php echo $this->Html->link('注销',array('controller' => 'Users','action' => 'logout')); ?></li>
						</ul>
					</li>
					<li  class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">摆摊信息</a>
						<ul class="dropdown-menu">
							<li><?php echo $this->Html->link('增加项目',array('controller' => 'Projects','action' => 'addProject')); ?></li>
							<li><?php echo $this->Html->link('查看项目',array('controller' => 'Projects','action' => 'showAllProjects')); ?></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>