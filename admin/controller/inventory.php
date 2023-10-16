<?php
include('../controller/database.php');


$pos_inventory = $mysqli->query("SELECT * from pos_inventory");



if(isset($_POST['add-item'])){
	
	$name           = $_POST['name'];
	$description    = $_POST['description'];
	$qty            = $_POST['qty'];
	$price          = $_POST['price'];
	
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO pos_inventory (name,description,qty,photo ,price) 
						VALUES ('$name','$description','$qty','$location','$price')");
		
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Inventory Data Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}

if(isset($_POST['delete-inventory'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_inventory where inventory_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Inventory Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}


if(isset($_POST['update-inventory'])){
	
	$name           = $_POST['name'];
	$description    = $_POST['description'];
	$qty            = $_POST['qty'];
	$id             = $_POST['id'];
	$price          = $_POST['price'];
	$letter  	    = $_POST['image1'];
	
	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}
	
	$mysqli->query("UPDATE pos_inventory  SET name      = '$name',
										  description   = '$description',
										  photo         = '$location',
										  price         = '$price',
										  qty          = '$qty'
					WHERE inventory_id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Inventory Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}