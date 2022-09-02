<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="bg">

<div>
	<?php
	
	?>	
</div>

<div class="container h-100">
	<div class="d-flex justify-content-center h-100">
		<div class="user_card2">	
			<div class="d-flex justify-content-center">
				<form action="registration.php" method="post">		
						<div class="row">
							<div >
								<h1 class="text-success">Registration</h1>
								<hr class="mb-3">
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-user"></i></span>					
									</div>
									<input class="form-control" placeholder="First Name" id="firstname" type="text" name="firstname" required>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-user"></i></span>					
									</div>
									<input class="form-control" placeholder="Last Name" id="lastname"  type="text" name="lastname" required>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-envelope"></i></span>					
									</div>
									<input class="form-control" placeholder="Email id" id="email"  type="email" name="email" required>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-append">
										<span class="input-group-text"><i class="fas fa-lock"></i></span>					
									</div>
									<input class="form-control" placeholder="Password" id="password"  type="password" name="password" required>
								</div>
								<hr class="mb-3">
								<input class="btn btn-success" type="submit" id="register" name="create" value="Sign Up">
								<div class="d-flex justify-content-center links mt-2 text-white">
								Already have an account? <a href="login.php" class="ml-2">Log In</a>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){
			var firstname 	= $('#firstname').val();
			var lastname	= $('#lastname').val();
			var email 		= $('#email').val();
			var password 	= $('#password').val();
			
			e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: {firstname: firstname,lastname: lastname,email: email,password: password},
					success: function(data){
						Swal.fire({
								'title': 'Successfully Registered',							
								'type': 'success'
							})							
					},
					error: function(data){
						Swal.fire({
							'title': 'Errors',
							'text': 'There were errors while saving the data.',
							'type': 'error'
						 })
					}
				});
			}else{
				
			}
		});				
	});	
</script>
</body>
</html>