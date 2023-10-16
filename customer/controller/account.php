<?php

$customerid = $_SESSION['id'];


$account     = $mysqli->query("SELECT * from pos_customer where customer_id ='$customerid' ");


if(isset($_POST['update-profile'])){
	
	
	$fname	     = $_POST['fname'];
	$lastname	 = $_POST['lastname'];
	$contact	 = $_POST['contact'];
	$username	 = $_POST['username'];
	$password	 = $_POST['password'];
	$address	 = $_POST['address'];
	$street	     = $_POST['street'];
	$barangay	 = $_POST['barangay'];
	$city	     = $_POST['city'];
	$email	     = $_POST['email'];
	
	$mysqli->query("UPDATE 
					pos_customer set 
					firstname='$fname' ,
					lastname='$lastname' ,
					contact='$contact' ,
					username='$username' ,
					password='$password',
					email='$email',
					address='$address',
					street='$street',
					barangay='$barangay',
					city='$city'
					where customer_id='$customerid'");
		
		
	echo '<script>window.location.href="profile.php?updated"</script>';
	
}
