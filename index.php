<?php 
session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
	      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
	      crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body class="bg2">
<div>
	<?php
	
	?>	
</div>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
    <i class="fa fa-home" aria-hidden="true"></i>
    <a href="index.php?logout=true" class="btn btn-primary" id="logout" tabindex="-1" role="button" aria-disabled="true">Logout</a>
  </a>
</nav>
<div class="container h-100">
	<div class="d-flex justify-content-center">
		<div class="user_card2">	
			<div class="d-flex justify-content-center">
				<form action="index.php" method="post">
					<h5 id="welcome" class="mb-4"></h5>
					<h3 class="text-primary mb-3 d-flex justify-content-center">Additional details</h3>
					<input class="hidden" id="user"  type="hidden" name="user" value="">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>					
							</div>
							<input class="form-control" placeholder="Phone Number" id="phonenumber"  type="tel" name="phonenumber" onkeypress="return isNumber(event)" maxlength="10" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-child"></i></span>					
							</div>
							<input class="form-control" type="text" class="form-control" placeholder="Age" name="age" id="age"onkeypress="return isNumber(event)"maxlength="2" class="form-control">
						</div>
						 <div class="input-group mb-3">
						 	<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>					
							</div>
						     <select id="gender" name="gender"class="form-control">
							    <option value="male">Male</option>
							    <option value="female">Female</option>
							 </select>
					      </div>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-address-card"></i></span>					
							</div>
							<input type="text" class="form-control" placeholder="Address" name="address" id="address" class="form-control">
						</div>
					
				    </div>
					<div class="d-flex justify-content-center mt-3 login_container">
						<input type="submit" name="create" id="register" class="btn btn-primary" value="Submit"> 
					</div>
			    </form>
		    </div>
	   </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">

   $(document).ready(function () {
            var value = localStorage.getItem("Name");
            document.getElementById("user").value = value;
           })
      $(document).ready(function () {
             var value2 = localStorage.getItem("Name").toUpperCase();
            document.getElementById("welcome").innerHTML = 'Welcome  '+ value2.replace('@GMAIL.COM','');
           })



   function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
  }

	$(function(){
		$('#register').click(function(e){

			var valid = this.form.checkValidity();
			if(valid){
			var phonenumber	= $('#phonenumber').val();
			var age	        = $('#age').val();
			var gender		= $('#gender').val();
			var address     = $('#address').val();
            var user        = $('#user').val();

			e.preventDefault();	
				$.ajax({
					type: 'POST',
					url: 'process2.php',
					data: {phonenumber: phonenumber,age: age,gender: gender,address: address,user: user},
					success: function(data){
						Swal.fire({
								'title': 'Successfully Updated',							
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
			}
		});			
	});
	
</script>
</body>
</html>