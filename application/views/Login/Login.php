<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
		<link rel="icon" href="<?=base_url('assets/img/Icon.png')?>" type="imagef">
		
		<!-- Our Styles -->
		<link href="<?=base_url('assets/vendor/Login.css')?>" rel="stylesheet">

		<!-- using bootstrap 3.3.7 -->
		<link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

		<link href="<?=base_url('assets/vendor/css/Util.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/vendor/css/Login.css')?>" rel="stylesheet">

	</head>
	<body>
		<div class="limiter">
			<div class="container-login100" >
				<div class="wrap-login100">
					<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="<?php echo base_url()?>Login/process/">
						<span class="login100-form-title">
							Chicken Resto Form Login
						</span>
						<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
							<input class="input100"  type="text" name="username" placeholder="Username" onkeyup="filter(this)" required>
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Please enter password">
							<input class="input100" type="password" name="password" placeholder="Password" onkeyup="filter(this)">
							<span class="focus-input100"></span>
						</div>

						<div class="text-right p-t-13 p-b-23">
							<span class="txt1">
								Forgot
							</span>
							<a href="#" class="txt2" onclick="alert('Please contact the administrator to reset your password! \nEmail : admin@gmail.com')">
								Username / Password?
							</a>
						</div>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit">
							Sign in
							</button>
						</div>
						<br><br>
					</form>
				</div>
			</div>
		</div>

		<script>
			<?php if(!empty($this->input->get('msg')) && $this->input->get('msg') == 1) { ?>
				alert("Username and password do not match !!!")
			<?php } ?>
			<?php if(!empty($this->input->get('msg')) && $this->input->get('msg') == 3) { ?>
				alert("Password has been changed, please login first")
			<?php } ?>
		</script>


	</body>
</html>