<?php
include('../controller/database.php');

if(isset($_POST['status'])){

$status   = $_POST['status'];
$datefrom = $_POST['datefrom'];
$dateend  = $_POST['dateend'];

$order = $mysqli->query("SELECT *,po.trans_code as transcode,sm.name as sm, SUM(po.qty*pi.item_price) as amount from pos_order AS po 
							LEFT JOIN pos_customer as pc on pc.customer_id  = po.customer_id
							LEFT JOIN pos_items as pi on pi.item_code  = po.item_code
							LEFT JOIN pos_payment as pp on pp.trans_code  = po.trans_code
							LEFT JOIN pos_salesman as sm on sm.sm_id  = pc.sm_id
							WHERE po.status ='$status' and  (DATE(po.created_at) between '$datefrom' and '$dateend')
							GROUP BY po.trans_code 
							ORDER BY po.order_id DESC");
							
} else {
	$order = $mysqli->query("SELECT *,po.trans_code as transcode,sm.name as sm, SUM(po.qty*pi.item_price) as amount from pos_order AS po 
							LEFT JOIN pos_customer as pc on pc.customer_id  = po.customer_id
							LEFT JOIN pos_items as pi on pi.item_code  = po.item_code
							LEFT JOIN pos_payment as pp on pp.trans_code  = po.trans_code
							LEFT JOIN pos_salesman as sm on sm.sm_id  = pc.sm_id
							GROUP BY po.trans_code 
							ORDER BY po.order_id DESC");
	
}
							
							
$inventory = $mysqli->query("SELECT a.* , b.name as category, c.name as supplier from pos_items a 
							LEFT JOIN pos_item_category b on b.category_id  = a.item_category_id
							LEFT JOIN pos_supplier c on c.supplier_id   = a.item_supplier_id");