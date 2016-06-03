<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pagetitle ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.css">	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style1.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/validate.js"></script>
        <script src="<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js"></script>
  </head>
<body style="color:#666;">
 <nav class="navbar navbar-default barnav">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <div class="col-md-12 col-lg-12">
		<div id="logo">
			<h1><a href="<?= base_url();?>"><img src="<?php echo base_url();?>assets/images/logo.png" alt="Work Scout" /></a></h1>
		</div>
		<div id="navigation" class="menu">
			<ul class="nav navbar-nav">
				<li><a href="<?= base_url() ?>" id="current">Home</a></li>
                                <li><a href="<?= base_url();?>jobs/employees/">Browse Employees</a></li>
                                <li><a href="<?= base_url();?>jobs/jobslist">Browse Jobs</a></li>
<!--                                <li><a href="#">Pages  <i class="fa fa-angle-down"></i></a> 
					<ul class="submenu">
						<li><a href="<?= base_url();?>jobs/jobslist">Job List</a></li>
						<li><a href="<?= base_url();?>jobs/jobfinder">Job Find</a></li>
						<li><a href="<?= base_url();?>jobs/manage_application">Manage Application</a></li>
						<li><a href="<?= base_url();?>jobs/resume_alt">Resume Alt</a></li>
						
					</ul>
				</li>-->
				
				<li><a href="#">Blog</a></li>
			</ul>
			<?php if($this->session->userdata('id')){?>
			<ul class="userdata float-right">
				<!--<li><a href="<?php echo base_url();?>logout"><i class="fa fa-lock"></i> Log Out</a></li>-->  
                                <li>
                                <?php  
                                    $profile = ($this->session->userdata("profilepic") != "")?$this->session->userdata("profilepic"):"default.jpg";
                                ?>
                                    <div class="udata">
                                    <div class="profile">
                                        <img width="25" height="25"  class="img-circle" src="<?= base_url() ?>/assets/images/users/<?= $profile ?>" />
                                    </div>
                                    <div class="username">
                                        <span><?= $this->session->userdata("username") ?> </span>
                                    </div>
                                        <i class="fa fa-angle-down"></i>
                                        <div class="clearfix"></div>
                                    </div>   
                                    <ul class="usersubmenu submenu">
                                        <?php if($this->session->userdata('userrole') == "customer"){ ?>
                                            <li><a href="<?= base_url();?>users/manageprofile">Manage Profile</a></li>
                                            <li><a href="<?= base_url();?>jobs/managejobs">Manage Job</a></li>
                                            <li><a href="<?= base_url();?>jobs/postjob">Post Job</a></li> 
                                        <?php } 
                                              else if($this->session->userdata('userrole') == "worker"){
                                        ?>
                                                <li><a href="<?= base_url();?>users/manageprofile">Manage Profile</a></li>
                                                <li><a href="<?= base_url();?>jobs/myjobs">My Job</a></li>
                                        <?php        
                                              }
                                        ?>
                                        <li><a href="<?php echo base_url();?>logout"><i class="fa fa-lock"></i> Log Out</a></li>
                                    </ul>
                                </li>
			</ul>
		
			
<?php }else{?>
			<ul class="float-right">
				<li><a href="<?php echo base_url();?>register"><i class="fa fa-user"></i> Sign Up</a></li>
				<li><a href="<?php echo base_url();?>login"><i class="fa fa-lock"></i> Log In</a></li>
			</ul>
			<?php }?>
		</div>
	</div>
    </div>
  </div>
</nav>