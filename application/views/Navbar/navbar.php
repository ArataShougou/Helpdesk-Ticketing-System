<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #035efc;" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"><span  style="color: #fff;">IT HELPDESK</span></a>
			<ul class="user-menu">
				<li class="dropdown pull-right">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fas fa-user-circle fa-lg"></span>&ensp;<?php echo $this->session->userdata('nama');?> <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?php echo base_url();?>index.php/profile"><span class="fas fa-id-badge fa-lg"></span>&ensp;&nbsp;Profile</a></li>
						<li><a href="<?php echo base_url();?>index.php/login/logout"><span class="fas fa-door-closed"></span>&ensp;Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>

	</div><!-- /.container-fluid -->
</nav>