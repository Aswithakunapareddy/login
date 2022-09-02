<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){
	$phonenumber= $_POST['phonenumber'];
	$age 		= $_POST['age'];
	$gender 	= $_POST['gender'];
	$address	= $_POST['address'];
	$user	    = $_POST['user'];

		$sql = "UPDATE users set phonenumber=? , age=?, gender=?, address=? WHERE email=?";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$phonenumber,$age, $gender, $address, $user]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}
