<?php
include('../controller/database.php');


if($_GET['data'] == 'pending'){
	$status = 1;
} else if($_GET['data'] == 'approved'){
	$status = 2;
}if($_GET['data'] == 'cancelled'){
	$status = 3;
}if($_GET['data'] == 'reschedule'){
	$status = 4;
}if($_GET['data'] == 'completed'){
	$status = 6;
}if($_GET['data'] == 'ongoing'){
	$status = 8;
}if($_GET['data'] == 'fordelivery'){
	$status = 7;
}if($_GET['data'] == 'qoutation'){
	$status = 9;
}if($_GET['data'] == 'received'){
	$status = 11;
}if($_GET['data'] == 'pickup'){
	$status = 10;
}if($_GET['data'] == 'declined'){
	$status = 12;
}
$checkout   = $mysqli->query("	SELECT a.* ,b.*,d.* from pos_order a 
								left join pos_inventory b on a.service_id = b.inventory_id 
								left join pos_customer d on d.customer_id =a.customer_id 
								where a.status = '$status'  group by a.trans_code");
if(isset($_GET['data-transcode'])){		
$transcode = $_GET['data-transcode'];					
$checkout   = $mysqli->query("	SELECT a.* ,b.*,d.* from pos_order a 
								left join pos_inventory b on a.service_id = b.inventory_id 
								left join pos_customer d on d.customer_id =a.category_id 
								where  a.transcode='$transcode'  group by a.trans_code");
}
if(isset($_POST['send-qoute'])){
	
	$order_id    = $_POST['order_id'];
	$trans_code  = $_POST['trans_code'];
	$statuses    = $_POST['status'];
	

		$amount        = $_POST['amount'];
		$qoutesdetails = $_POST['qoutesdetails'];
		$mysqli->query("UPDATE pos_order set  status ='9' , amount='$amount' , qoutesdetails = '$qoutesdetails' where order_id='$order_id'");
		$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Qoutation Sent for Approval')");
	
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Quotation Details Successfully Sent",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "order.php?updated&data='.$_GET['data'].'";
							});
			</script>';
	
}

if(isset($_POST['update-order'])){
	
	$order_id    = $_POST['order_id'];
	$trans_code  = $_POST['trans_code'];
	$statuses    = $_POST['status'];
	
	if($statuses == 2){
		$amount       = $_POST['amount'];
		$mysqli->query("UPDATE pos_order set status ='$statuses' , amount='$amount' where order_id='$order_id'");
		$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Order Approved')");
	} if($statuses == 3){
		$reason       = $_POST['reason'];
		$mysqli->query("UPDATE pos_order set status ='$statuses' , reason='$reason' where order_id='$order_id'");
		//echo "UPDATE pos_order set status ='$status' , reason='$reason' where order_id='$order_id'";
		$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
					VALUES ('$order_id','Cancelled Approved')");
	} if($statuses == 7){
		$image = addslashes(file_get_contents($_FILES['proof']['tmp_name']));
		$image_name = addslashes($_FILES['proof']['name']);
		$image_size = getimagesize($_FILES['proof']['tmp_name']);
		move_uploaded_file($_FILES["proof"]["tmp_name"], "assets/proof/" . $_FILES["proof"]["name"]);
		$photo_1   =  $_FILES["proof"]["name"];
	
		$mysqli->query("UPDATE pos_order set status ='$statuses' , proof='$photo_1' where order_id='$order_id'");
		//echo "UPDATE pos_order set status ='$status' , reason='$reason' where order_id='$order_id'";
		$mysqli->query("INSERT INTO tracking_orders (order_id,status,proof) 
					VALUES ('$order_id','Order Ready for Delivery','$photo_1')");
	} else {
		
		$mysqli->query("UPDATE pos_order set status ='$statuses' where order_id='$order_id'");
		// if($statuses ==7){
			// $mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						// VALUES ('$order_id','Order ready for Delivery')");
		// }
		if($statuses ==6){
			$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Order Completed!')");
		}
	}
		

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Order  Data Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "order.php?updated&data='.$_GET['data'].'";
							});
			</script>';
	
}
