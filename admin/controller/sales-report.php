<?php
include('../controller/database.php');


$sales = $mysqli->query("SELECT a.* , b.* , c.firstname , c.lastname  from pos_order a 
							LEFT JOIN  pos_item_category b on b.category_id = a.service_id
							LEFT JOIN  pos_customer c on c.customer_id = a.customer_id
							WHERE a.status  = 6
							");

