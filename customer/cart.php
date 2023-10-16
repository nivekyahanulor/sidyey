	<?php include("header.php");?>

    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Size</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
						<?php
							while($val = $orders->fetch_object()){	
							$total += $val->item_price * $val->qty;
						?>
						<form method="post">
                        <tr>
	                                <td><?php echo $val->item_name;?></td>   
									<td>₱ <?php echo number_format($val->item_price,2);?></td>
	                                <td>
									<?php if($val->size == "small"){ $length = $val->small;}
										  if($val->size == "meduim"){ $length = $val->meduim;}
										  if($val->size == "large"){ $length = $val->large; }
										  if($val->size == "xl"){$length = $val->xl;}
										  if($val->size == "xxl"){$length = $val->xxl;}
										  if($val->size == "xxxl"){$length = $val->xxxl;}
										 ?>
	                                  	<input type="number" name="cnt" class="" min="1" value="<?php echo $val->qty;?>" max="<?php echo $length;?>" style="width:70px" >	
	                                </td> 
	                                <td><?php echo $val->size;?></td>   
	                                <td>₱ <?php echo number_format($val->item_price * $val->qty,2);?> </td>
	                                <td> 
	                                  	<input type="hidden" name="order_id" class="form-control" value="<?php echo $val->order_id;?>" >	
										<button type="submit" class="btn btn-sm btn-info" name="update-cart"> Update </button> 
										<button  type="submit" class="btn btn-sm btn-warning" name="delete-cart"> Remove </button> 
									</td>
	                              
	                            </tr>
                       </form>
					<?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
              <form method="post">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
						<h4> Delivery Address </h4>
						<p class="mb-4"><b>Name :</b> <br>
						<div class="col-12">
							<input type="text"  class="form-control"  name="name" value="<?php echo $_SESSION['name'] ;?>">
						</div>
						</p>
						<p class="mb-4"><b>Email :</b> <br>
						<div class="col-12">
							<input type="text" class="form-control"  name="email" value="<?php echo $_SESSION['email'] ;?>">
						</div>
						</p>
						<p class="mb-4"><b>Contact :</b> <br>
						<div class="col-12">
							<input type="text"  class="form-control"  name="contact" value="<?php echo $_SESSION['contact'] ;?>">
						</div>
						</p>
						<p class="mb-4"><b>Address :</b> <br>
						<div class="col-12">
							<input type="text"  class="form-control"  name="address" value="<?php echo $_SESSION['address'] ;?>">
						</div>
						</p>	
						<p class="mb-4"><b>Street :</b> <br>
						<div class="col-12">
							<input type="text"  class="form-control"  name="street" value="<?php echo $_SESSION['street'] ;?>">
						</div>
						</p>
						<p class="mb-4"><b>Barangay :</b> <br>
						<div class="col-12">
							<input type="text"  class="form-control"  name="barangay" value="<?php echo $_SESSION['barangay'] ;?>">
						</div>
						</p>
						<p class="mb-4"><b>City :</b> <br>
						<div class="col-12">
							<input type="text"  class="form-control"  name="city" value="<?php echo $_SESSION['city'] ;?>">
						</div>
						</p>
						<hr>
						<p class="mb-4"><b>Payment Method :</b> <br>
						<div class="col-12">
							<select class="form-control" name="delivery_option" required>
								<option value=""> - Select Type -  </option>
								<option> COD </option>
								<option> GCASH </option>
							</select>
						</div>
						</p>
						<hr>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">₱ <?php echo number_format($total,2);?></h6>
                        </div>
                      
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₱ <?php echo number_format($total,2);?></h5>
                        </div>
						<input type="hidden" id="total" value="<?php echo $total;?>">
						<input type="hidden" name="transcode" value="<?php echo $_SESSION['transcode'];?>">
						<input type="hidden" name="customerid" value="<?php echo $_SESSION['id'];?>">
                        <button class="btn btn-block btn-primary my-3 py-3" name="checkout-order">Proceed To Checkout</button>
                    </div>
                </div>
				</form>
            </div>
        </div>
    </div>
    <!-- Cart End -->
	<?php include("footer.php");?>