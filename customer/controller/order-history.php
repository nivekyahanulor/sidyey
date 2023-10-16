<?php

			
$customerid = $_SESSION['id'];


// $orders     = $mysqli->query("SELECT a.* ,b.* from pos_order a left join pos_item_category b on a.service_id = b.category_id  where a.status = 1 and a.customer_id='$customerid' group by a.transcode ");

// $checkout   = $mysqli->query("	SELECT a.* ,b.*, c.* , sum(b.item_price * a.qty)price,c.status as order_status from pos_order a 
								// left join pos_item_category b on a.service_id = b.category_id 
								// where a.status = 1 and a.customer_id='$customerid' group by a.trans_code");

$checkout1   = $mysqli->query("	SELECT a.* ,b.*  from pos_order a 
								left join pos_item_category b on a.service_id = b.category_id 
								where  a.customer_id='$customerid' group by a.trans_code");



if(isset($_POST['cancel-order'])){
	
	
	$transcode	 = $_POST['transcode'];
	
	$mysqli->query("UPDATE pos_order set status='5'  where trans_code='$transcode'");
	$mysqli->query("UPDATE pos_checkout_order set status='5'  where transcode='$transcode'");
		
		
	echo '<script>window.location.href="order-history.php?cancelled"</script>';
	
}
if(isset($_POST['approved'])){
	
	
	$transcode	 = $_POST['transcode'];
	$order_id	 = $_POST['order_id'];
	$delivery	 = $_POST['delivery'];
	
	$mysqli->query("UPDATE pos_order set status='2' , delivery = '$delivery'  where trans_code='$transcode'");
	$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Qoutation Approved')");
	
		
		
	echo '<script>window.location.href="order-history.php?approved"</script>';
	
}

if(isset($_POST['declined'])){
	
	
	$transcode	 = $_POST['transcode'];
	$order_id	 = $_POST['order_id'];
	$reason	     = $_POST['reason'];
	
	$mysqli->query("UPDATE pos_order set status='12' , reason = '$reason'  where trans_code='$transcode'");
	$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Qoutation Declined')");
	
		
		
	echo '<script>window.location.href="order-history.php?declined"</script>';
	
}
if(isset($_POST['cancel'])){
	
	
	$transcode	 = $_POST['transcode'];
	$order_id	 = $_POST['order_id'];
	$reason	     = $_POST['reason'];
	
	$mysqli->query("UPDATE pos_order set status='3' , reason = '$reason'  where trans_code='$transcode'");
	$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Service Cancelled')");
	
		
		
	echo '<script>window.location.href="order-history.php?declined"</script>';
	
}
if(isset($_POST['received'])){
	
	
	$transcode	 = $_POST['transcode'];
	$order_id	 = $_POST['order_id'];
	
	$mysqli->query("UPDATE pos_order set status='11'  where trans_code='$transcode'");
	$mysqli->query("INSERT INTO tracking_orders (order_id,status) 
						VALUES ('$order_id','Order Received')");
	
		
	echo '<script>window.location.href="order-history.php?received"</script>';
	
}
