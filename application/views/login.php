<div id="titlebar1" class="single">
	<div class="container">

		<div class="col-md-12 col-lg-12">
			<h2>My Account</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="#">Home</a></li>
					<li>My Account</li>
				</ul>
			</nav>
		</div>

	</div>
</div>
<!-- Container -->
<div class="container">

	<div class="my-account">

		<ul class="tabs-nav">
			<li class="login activetab"><a href="<?= base_url()?>index.php/login">Login</a></li>
			<li class="register"><a href="<?= base_url()?>index.php/register"> Register</a></li>
		</ul>
		<div class="tabs-container">
			<!-- Login -->

			<?php if($this->session->flashdata('success')){?>
			<div class="success">
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?= $this->session->flashdata('success') ?>
				</div>
			</div>
			<?php } ?>

			<?php if($this->session->flashdata('error')){?>
			<div class="success">
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?= $this->session->flashdata('error') ?>
				</div>
			</div>
			<?php } ?>

			<div class="tab-content" id="tab1">

				<h3 class="margin-bottom-10 margin-top-10">Login</h3>
				<form method="post" class="login" role="form">
					<div class="form-group">
						<label>Username or Email Address :</label>
						<input class="form-control" name="username" id="username" type="text" required>
					</div>
					<div class="form-group">
						<label>Password :</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="submit" class="button" name="login" value="Login" />
						<label for="rememberme" class="rememberme">
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
					</div>
					<p class="lost_password">
						<a href="#">Lost Your Password?</a>
					</p>
				</form>
			</div>

			<!-- Register -->

		</div>
	</div>
</div>
