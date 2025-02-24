<?php 
require('top.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}
?>
<body>
	<?php 
	require('header.php');
	?>
	
	<section class="LoginForm">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-6">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2>Login</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="form-group">
								<label>Email:</label>
								<input type="email" class="form-control" name="login_email" id="login_email" placeholder="Your Email*" style="width:100%">
								<span class="field_error" id="login_email_error"></span>
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" class="form-control" name="login_password" id="login_password" placeholder="Your Password*" style="width:100%">
								<span class="field_error" id="login_password_error"></span>
							</div>
							<button type="button" class="btn btn-primary" onclick="user_login()">Login</button>
						</form>
					</div>
					<div class="form-output login_msg">
						<p class="form-messege field_error"></p>
					</div>
				</div> 
				<div class="col-md-6">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2>Register</h2>
						</div>
					</div>
					<div class="col-xs-12">
						<form id="register-form" method="post">
							<div class="form-group">
								<label>Name:</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Your Name*" style="width:100%">
								<span class="field_error" id="name_error"></span>
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email*" style="width:100%">
								<span class="field_error" id="email_error"></span>
							</div>
							<div class="form-group">
								<label>Mobile No:</label>
								<input type="tel" class="form-control" name="mobile" id="mobile" placeholder="Your Mobile*" style="width:100%">
								<span class="field_error" id="mobile_error"></span>
							</div>
							<div class="form-group">
								<label>Password:</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Your Password*" style="width:100%">
								<span class="field_error" id="password_error"></span>
							</div>
							<button type="button" class="btn btn-primary" onclick="user_register()">Register</button>
						</form>
					</div>
					<div class="form-output register_msg">
						<p class="form-messege field_error"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="js/main.js"></script> 
<?php
include('footer.php');
?>       

</body>
</html>