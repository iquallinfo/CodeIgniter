<div id="titlebar1" class="single">
	<div class="container">

		<div class="col-md-12 col-lg-12">
			<h2>My Account</h2>
			<nav id="breadcrumbs">
				<ul>
					<li>You are here:</li>
					<li><a href="<?= base_url() ?>">Home</a></li>
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
			<li class="login"><a href="<?= base_url()?>index.php/login">Login</a></li>
			<li class="register activetab"><a href="<?= base_url()?>index.php/register"> Register</a></li>
		</ul>
		<div class="tabs-container">
			<!-- Register -->
				<div class="tab-content" id="tab2">

					<h3 class="margin-bottom-10 margin-top-10">Register</h3>
					<form method="post" class="register" data-toggle="validator" id="form" role="form" enctype="multipart/form-data" >
						<div class="form-group">
							<label for="inputName" class="control-label">Username</label>
							<input class="form-control" name="username" id="username" type="text" required>
                                                        <div class="alert alert-danger alert-dismissable hideerror username">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            User already Exists
                                                        </div>
						</div>
						<div class="form-group">
							<label>Location :</label>
							<input class="form-control" name="location" id="location" type="text" required>
						</div>
						<div class="form-group">
							<label>Email Address :</label>
                                                        <input class="form-control" id="email" name="email" type="email">
                                                        <div class="alert alert-danger alert-dismissable hideerror email">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            Email already Exists
                                                        </div>
						</div>
                                                 <div class="form-group">
							<label>Register as:</label>
							<ul class="radiobutton">
                                                            <li>
                                                                    <input id="check-1" type="radio" name="userrole" value="customer" checked="" class="first">
                                                                    <label for="check-1">Customer</label>
                                                            </li>
                                                            <li>
                                                                    <input id="check-2" type="radio" name="userrole" value="worker">
                                                                    <label for="check-2">Worker</span></label>
                                                            </li>
                                                        </ul>
						</div>
						<div class="form-group">
                                                    <label>Phone Number :</label>
                                                    <input class="form-control" name="number" id="number" type="text" required>
						</div>
						<div class="form-group">
							<label>Profile Pic :</label>
							<input name="profile" id="profile" type="file">
						</div>
						<div class="form-group">
							<label>Password :</label>
							<input id="password" class="form-control" name="password" id="username" type="password" required>
						</div>
						<div class="form-group">
							<label>Repeat Password :</label>
							<input id="confpass" class="form-control" name="repassword" onblur="checkpassword(this.value)" id="username" type="password" required>
						</div>
                                                
                                            <?php if($this->session->flashdata('mismatch')){?>
                                            <div class="errormismatch">
                                            <div class="alert alert-danger alert-dismissable">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                              <?= $this->session->flashdata('mismatch') ?>
                                            </div>
                                            </div>
                                            <?php } ?>
                                            <div class="mismatch">
                                              <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                               Password Mismatch
                                              </div>
                                              </div>
						
                                            <div class="form-group">
                                                    <input type="submit" class="button" name="register" value="Register" />
                                            </div>
                                                 
					</form>
				</div>
		</div>
	</div>
</div>
<script>
function checkpassword(value)    
{
    var password =$("#password").val();
    if(password != value)
    {
        $(".mismatch").show();
        $("#confpass").focus();
    }
    else
    {
        $(".mismatch").hide();
    }
}
$(document).ready(function(){
   $("#username").blur(function(){
      var username = $(this).val();
      checkuserdata("username",username)
   });
   
   $("#email").blur(function(){
      var email = $(this).val();
      checkuserdata("email",email)
   });
   
});

function checkuserdata(column,value){
$.ajax({
    type: "POST",
    url: "<?= base_url()?>index.php/users/checkuserdata/",
    data: {'column':column,
           'value':value,
    },
    dataType: 'text',
    success: function(data){
        if(data > 0)
        {
            $("."+column).show();
            $("#"+column).focus();
        }
        else
        {
               $("."+column).hide();
        }
    }
});
}
</script>