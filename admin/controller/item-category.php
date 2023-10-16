<?php
include('../controller/database.php');


$category = $mysqli->query("SELECT * from pos_item_category");

if(isset($_POST['add-category'])){
	
	$name       = $_POST['category'];
	$description       = $_POST['description'];

	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/menu/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	
	$mysqli->query("INSERT INTO pos_item_category (name,description,photo) VALUES ('$name','$description','$location')");

	
  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Service Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "category.php";
							});
			</script>';
	
}

if(isset($_POST['delete-category'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  pos_item_category where category_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Service is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "category.php";
							});
			</script>';
	
}

if(isset($_POST['update-category'])){
	
	$id            = $_POST['id'];
	$name          = $_POST['category'];
	$description   = $_POST['description'];

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
	

	$mysqli->query("UPDATE  pos_item_category SET name ='$name', description ='$description', photo ='$location' WHERE category_id ='$id'	");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Service is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "category.php";
							});
			</script>';
	
}