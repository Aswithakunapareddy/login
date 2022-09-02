<?php 

	session_start();
	
	if(isset($_SESSION['userlogin'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="bg">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">	
				<div class="d-flex justify-content-center form_container">
					<form action="index.php" method="POST">
						<div class="d-flex justify-content-center">
							<div class="brand_logo_container">
								<img src="img/login_logo.png" class="brand_logo" alt="Programming Knowledge logo">
							</div>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-envelope"></i></span>					
							</div>
							<input type="text" placeholder="Email id" name="username" id="username" class="form-control input_user" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>					
							</div>
							<input type="password" placeholder="Password" name="password" id="password" class="form-control input_pass" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="rememberme" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label text-white" for="customControlInline">Remember me</label>
							</div>
						</div>					
				        </div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="button" name="button" id="login" class="btn btn-primary" onclick="handleSubmit()">Login</button> 
						</div>
				</form>
				 <div class="mt-4">
					<div class="d-flex justify-content-center links text-white">
						Don't have an account? <a href="registration.php" class="ml-2">Sign Up</a>
				 </div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	function handleSubmit() {
		const name = document.getElementById('username').value;
		localStorage.setItem("Name", name);
		return;
	}
	$(function(){
		$('#login').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
				var username = $('#username').val();
				var password = $('#password').val();

			e.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {username: username, password: password},
				success: function(data){
					if($.trim(data) === "1"){
				        window.location.href =  "index.php"
					}
					else
					{
				 Swal.fire({
						'title': 'Error',
						'text': 'User not found.',
						'type': 'error'
				   })
					}
				},
				error: function(data){
				   Swal.fire({
						'title': 'Error',
						'text': 'oops...there was an issue while logging..Please try again later!',
						'type': 'error'
				   })
				}
			});

			}else{
				Swal.fire({
					'title': 'Error',
					'text' : 'Please provide username and password to login!',
					'type' : 'error'
				})
			}
		});				
	});
</script>
</body>
</html>