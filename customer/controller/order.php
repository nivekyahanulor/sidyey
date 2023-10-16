<?php
error_reporting(0);

$customerid = $_SESSION['id'];
$transcodes = $_SESSION['transcode'];

$ordercnt   = $mysqli->query("select count(*)count_val from pos_order where status = 0 and customer_id='$customerid'");
$cntrow     = $ordercnt->fetch_assoc();

$orders     = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_items b on a.order_id  = b.item_id where a.status = 0 and a.customer_id='$customerid'");
$checkout   = $mysqli->query("SELECT * from pos_checkout_order where status = 0 and transcode='$transcodes' and customer_id='$customerid'");




if(isset($_POST['add-order'])){
	error_reporting(0);
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
	}
	
    $transcode =  implode($pass);
	
	$description	= $_POST['description'];
	$category		= $_POST['category'];
	$qty			= $_POST['qty'];
	$size			= $_POST['size'];
	$bgcolor		= $_POST['bgcolor'];
	$fullname		= $_POST['fullname'];
	$nickname		= $_POST['nickname'];
	$gradesection	= $_POST['gradesection'];
	$theme			= $_POST['theme'];
	$lace		    = $_POST['lace'];
	$fonts		    = $_POST['fonts'];
	$invitation		= $_POST['invitation'];
	$print		    = $_POST['print'];
	$label		    = $_POST['label'];
	$texture		= $_POST['texture'];
	$package		= $_POST['package'];
	$daytimebirth	= $_POST['daytimebirth'];
	$hw				= $_POST['hw'];
	$deliverytype	= $_POST['deliverytype'];
	
	
	// photo 1
	$location = json_encode($_FILES['upload']['name']);
	$files = array_filter($_FILES['upload']['name']); 
	$total_count = count($_FILES['upload']['name']);
	for( $i=0 ; $i < $total_count ; $i++ ) {
	   $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
	   if ($tmpFilePath != ""){
		  $newFilePath =  "assets/order/" . $_FILES['upload']['name'][$i];
		  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
		  }
	   }
	}
	
	
	// $image = addslashes(file_get_contents($_FILES['photo1']['tmp_name']));
    // $image_name = addslashes($_FILES['photo1']['name']);
    // $image_size = getimagesize($_FILES['photo1']['tmp_name']);
    // move_uploaded_file($_FILES["photo1"]["tmp_name"], "assets/order/" . $_FILES["photo1"]["name"]);
	// $photo_1   =  $_FILES["photo1"]["name"];
	
	
	$mysqli->query("INSERT INTO pos_order (customer_id ,trans_code, service_id,qty,description,photo_1,size,bgcolor,status,fullname,nickname,gradesection,theme,lace,fonts,invitation,print,label,texture,package,daytimebirth,hw,deliverytype) 
						VALUES ('$customerid','$transcode','$category','$qty','$description','$location','$size','$bgcolor',1,'$fullname','$nickname','$gradesection','$theme','$lace','$fonts','$invitation','$print','$label','$texture','$package','$daytimebirth','$hw','$deliverytype')");
		
		
	echo '<script>window.location.href="products.php?added"</script>';
	
}

if(isset($_POST['confirm-order'])){
	
		$transcode      = $_SESSION['transcode'];
	
	
	$mysqli->query("UPDATE pos_order set status='1'  where trans_code='$transcode'");
	$mysqli->query("UPDATE pos_checkout_order set status='1'  where transcode='$transcode'");
	
	
	$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
	}
	
    $transcode1 =  implode($pass);
	$_SESSION['transcode']    = $transcode1;
		
	echo '<script>window.location.href="order-history.php?success"</script>';
	
}

if(isset($_POST['update-cart'])){
	
	
	$order_id	 = $_POST['order_id'];
	$cnt		 = $_POST['cnt'];
	
	$mysqli->query("UPDATE pos_order set qty='$cnt' where order_id='$order_id'");
		
		
	echo '<script>window.location.href="cart.php?updated"</script>';
	
}

if(isset($_POST['delete-cart'])){
	
	$order_id	 = $_POST['order_id'];

	$mysqli->query("DELETE FROM  pos_order where order_id ='$order_id' ");
	
	
	echo '<script>window.location.href="cart.php?deleted"</script>';

}
