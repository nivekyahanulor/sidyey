	<?php include("header.php");?>
	<?php include('controller/order-history.php');?>
	<style>
	ul.timeline {
    list-style-type: none;
    position: relative;
	}
	ul.timeline:before {
		content: ' ';
		background: #d4d9df;
		display: inline-block;
		position: absolute;
		left: 29px;
		width: 2px;
		height: 100%;
		z-index: 400;
	}
	ul.timeline > li {
		margin: 20px 0;
		padding-left: 20px;
	}
	ul.timeline > li:before {
		content: ' ';
		background: white;
		display: inline-block;
		position: absolute;
		border-radius: 50%;
		border: 3px solid #22c0e8;
		left: 20px;
		width: 20px;
		height: 20px;
		z-index: 400;
	}
	</style>
	<br><br><br><br>
				<div class="row justify-content-center">
				<div class="col-lg-10">
				
				<h2> Tracking History </h2>
								
				<div class="container mt-5 mb-5">
					<div class="row">
						<div class="col-md-6 offset-md-3">
							<h4>Latest Tracking</h4>
							<ul class="timeline">
								<?php
									$order  	= $_GET['id'];
									$orders1    = $mysqli->query("SELECT * from tracking_orders where order_id = '$order' ");
									while($val2 = $orders1->fetch_object()){	
								?>
								<li>
									<a href="#"><?php echo $val2->status;?> </a><br>
									<?php if($val2->status == 'Order Ready for Delivery'){?>
										- View proof of delivery (click <a href="../admin/assets/proof/<?php echo $val2->proof;?>" target="_blank">here</a>).
									<?php } ?>
									<a href="#" class="float-right"><?php echo $val2->date_added;?></a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>

            </div>
        </div>
     
    <br> <br> <br> <br> <br>
    <br> <br> <br> <br> <br>
	<?php include("footer.php");?>