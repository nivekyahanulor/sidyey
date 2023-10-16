  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/orders.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			
              <div class="col-lg-12 col-md-12 order-1">
			   <?php if($_GET['data']=='approved' || $_GET['data']=='ongoing' || $_GET['data']=='fordelivery' || $_GET['data']=='pickup'){?>
					<?php if($_GET['data'] == 'approved') {
							$approved = 'active';
							$ongoing = 'a';
							$fordelivery = 'a';
							$pickup = 'a';
						 } else if($_GET['data'] == 'ongoing') {
							$approved = 'a';
							$ongoing = 'active';
							$fordelivery = 'a';
							$pickup = 'a';
						 } else if($_GET['data'] == 'fordelivery') {
							$approved = 'a';
							$ongoing = 'a';
							$fordelivery = 'active';
							$pickup = 'a';
						 } else if($_GET['data'] == 'pickup') {
							$approved = 'a';
							$ongoing = 'a';
							$fordelivery = 'a';
							$pickup = 'active';
						 }
					?>
				
			    <ul class="nav nav-pills mb-3" role="tablist">
                      <li class="nav-item ">
                        <a
						  href="order.php?data=approved" 
                          type="button"
                          class="nav-link <?php echo $approved;?>"
                        >
                          Approved
                        </a>
                      </li>
                     
                     <li class="nav-item ">
                        <a
						  href="order.php?data=fordelivery" 
                          type="button"
                          class="nav-link <?php echo $fordelivery;?>"
                        >
                          For Delivery
                        </a>
                      </li>
				
                      <li class="nav-item ">
                        <a
						  href="order.php?data=pickup" 
                          type="button"
                          class="nav-link <?php echo $pickup;?>"
                        >
                         Pick  Up
                        </a>
                      </li>
				
                     
                    </ul>
				 <?php }?>
				<div class="card">
				
				<?php if(isset($_GET['updated'])){?>
				<div class="alert alert-info alert-dismissable">
					<strong>Order Updated!</strong> 
				</div>
				<?php } ?>
				
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Transaction Code</th>
                    <th scope="col"  class="text-center">Customer Name</th>
                    <th scope="col"  class="text-center">Total Price</th>
                    <th scope="col"  class="text-center">Date Ordered</th>
					<?php if($_GET['data'] == 'approved'){?>
                    <th scope="col"  class="text-center">Delivery Status</th>
					<?php } ?>
					<?php if($_GET['data'] == 'declined'){?>
                    <th scope="col"  class="text-center">Reason</th>
					<?php } ?>
					
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $checkout->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val->trans_code;?>"><?php echo $val->trans_code;?></a></td>
                    <td class="text-center"><?php echo $val->firstname .' '. $val->lastname;?></td>
                    <td class="text-center"> ₱ <?php if($val->amount ==""){ echo "0.00";} else { echo number_format($val->amount,2); }?></td>
                    <td class="text-center"><?php echo $val->created_at;?></td>
					<?php if($_GET['data'] == 'approved'){?>
                    <td class="text-center"><?php echo $val->delivery;?></td>
					<?php } ?>
					<?php if($_GET['data'] == 'declined'){?>
                    <td class="text-center"><?php echo $val->reason;?></td>
					<?php } ?>
                    <td class="text-center">
					<?php if($val->status == 6 || $val->status ==3  ){ }  else if($val->status == 1 || $val->status == 9|| $val->status == 12) { ?>
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderqoutes<?php echo $val->order_id;?>"> <i class="bi bi-circle"></i> Send Qoutation</button>
					<?php } else {?>
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->order_id;?>"> <i class="bi bi-pencil-square"></i> </button>
					<?php } ?>
					</td>
                  </tr>
				   <div class="modal fade" id="view-details<?php echo $val->trans_code;?>" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"> Qoutation Details </h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						<div class="row">
						<div class="col-lg-5">
						<b> Customer Details </b>
						<hr>
								<p> Transaction Code : <?php echo $val->trans_code;?> </p>
								<p> Customer Name: <?php echo $val->firstname .' '. $val->lastname;?> </p>
								<p> Contact Number: <?php echo $val->contact;?> </p>
								<p> Email Address: <?php echo $val->email;?> </p>
						<hr>
						<?php
						$transcode  = $val->trans_code;
						$orders1    = $mysqli->query("SELECT b.name , b.description as descs , a.* from pos_order a left join pos_item_category b on a.service_id = b.category_id   where a.trans_code='$transcode' ");
						while($val2 = $orders1->fetch_object()){	
						?>
						 <b>Service Details </b> <br>
							<b>Service Type : </b>  </b> <br> <?php echo $val2->name;?><br>
							<b>Description :  </b> <br> <?php echo $val2->descs;?><br><br>
						</div>
						<div class="col-lg-7">
						<b> Qoutation Details  </b>
						<hr>
						
						 <div class="alert">
						<?php if($val2->name== '12 PIECES INSTAX INSPIRED FRAME'){?>
							<b>Dedication / Greetings / Any text for upper part :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'DOUBLE GLASS FRAME') { ?>
								<b>Celebration Date :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'SPOTIFY KEYCHAIN') { ?>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
						<?php } else if ($val2->name == 'THANK YOU CARD') { ?>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'SPRAY BOTTLE') { ?>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'MINI PHOTO ALBUM KEYCHAIN') { ?>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
						<?php } else if ($val2->name == 'PHOTO FILM STRIP') { ?>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Size   :</b> <br>
								- One Size <br>
						<?php } else if ($val2->name == 'REF MAGNET') { ?>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- One Size <br>
						<?php } else if ($val2->name == 'HOUSE ADDRESS PLATE') { ?>
								<b>Full Address  :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Size   :</b> <br>
								- One Size <br>
						<?php } else if ($val2->name == 'GIVE AWAY KEYCHAIN') { ?>
							
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Size   :</b> <br>
								- One Size <br>
						<?php } else if ($val2->name == 'SINTRA BOARD') { ?>
								<b>Texture   :</b> <br>
								- <?php echo $val2->texture;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- One Size <br>
						<?php } else if ($val2->name == 'CALLING CARD') { ?>
							
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- One Size <br>
								
						<?php } else if ($val2->name == 'PHOTO WITH DEDICATION FRAME') { ?>
								<b>Dedication / Greetings   :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'LABEL STICKER') { ?>
								<b>Product Label   :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Font    :</b> <br>
								- <?php echo $val2->font;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'HEART-SHAPED PHOTO FRAME') { ?>
								<b>Dedication and Greetings  :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'INVITATION CARD') { ?>
								<b>Invitation Details   :</b> <br>
								- <?php echo $val2->invitation;?> <br>
								<b>Print  :</b> <br>
								- <?php echo $val2->print;?> <br>
								<b>Theme:</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'MILESTONE PHOTO FRAME') { ?>
								<b>Full Name:</b> <br>
								- <?php echo $val2->fullname;?> <br>
								<b>Dedication / Greetings  :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Theme Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'PHOTO FRAME') { ?>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'INSTAGRAM INSPIRED FRAME') { ?>
								<b>Instagram User Name:</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'SUBJECT STICKER') { ?>
								<b>Subject Name :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Font  :</b> <br>
								- <?php echo $val2->fonts;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'SPOTIFY SONG FRAME') { ?>
								<b>Song Choice :</b> <br>
								- <?php echo $val2->label;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'NEWBORN PHOTO FRAME') { ?>
								<b>New Born Full Name:</b> <br>
								- <?php echo $val2->fullname;?> <br>
								<b>Date and Time of Birth :</b> <br>
								- <?php echo $val2->daytimebirth;?> <br>
								<b>Height and Weigth:</b> <br>
								- <?php echo $val2->hw;?> <br>
								<b>Type of Delivery:</b> <br>
								- <?php echo $val2->deliverytype;?> <br>
								<b>Frame Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Background Color  :</b> <br>
								- <?php echo $val2->bgcolor;?> <br>
								<b>Theme Color  :</b> <br>
								- <?php echo $val2->theme;?> <br>
								<b>Packaging  :</b> <br>
								- <?php echo $val2->package;?> <br>
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
						<?php } else if ($val2->name == 'NAME TAG') { ?>
								<b>Full Name:</b> <br>
								- <?php echo $val2->fullname;?> <br>
								<b>Nick Name :</b> <br>
								- <?php echo $val2->nickname;?> <br>
								<b>Grade and Section:</b> <br>
								- <?php echo $val2->gradesection;?> <br>
								<b>Lace   :</b> <br>
								- <?php echo $val2->lace;?> <br>
								<b>Theme   :</b> <br>
								- <?php echo $val2->theme;?> <br>
								
								<b>Quantity   :</b> <br>
								- <?php echo $val2->qty;?> <br>
								<b>Size   :</b> <br>
								- <?php echo $val2->size;?> <br>
								
						<?php } ?>
						
						
							<b>Customer Note :  </b> <br> <?php echo $val2->description;?><br><br>
							
							<b>List of Picture </b> <br>
							
							<?php $p = 1 ; foreach( json_decode($val2->photo_1) as $a){ ?>
									 <a href="../customer/assets/order/<?php echo $a;?>" target="_blank"> <i class="bi bi-check"></i> Picture  <?php echo $p++;?></a><br>
							<?php } ?>
						</div>
						
						
							
						<?php } ?>
						</div>
						</div>
						</div>
						<div class="modal-footer">
						 
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				</div>
					 <div class="modal fade" id="edit-item<?php echo $val->order_id ;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Order Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
							   <div class="row">
									<div class="col-12">
									  <label for="inputNanme4" class="form-label"> Order Status: </label>
									  <input type="hidden" class="form-control" name="order_id" value="<?php echo $val->order_id;?>" required>
									  <input type="hidden" class="form-control" name="trans_code" value="<?php echo $val->trans_code;?>" required>
									  <select  class="form-control" name="status"  id="order_statuse" required>
									  <?php if($val->status == 1 || $val->status == 4){?>
										<option value ="" > - Select - </option>
										<option value ="2" > Approved </option>
										<option value ="3" > Cancel </option>
									  <?php } else if($val->status == 2){?>
									    <option value ="" > - Select - </option>
										<option value ="7" > For Delivery  </option>
										<option value ="10" > Pick Up </option>
										<option value ="3" > Cancel </option>
									  <?php } else if($val->status == 8){?>
									    <option value ="" > - Select - </option>
										<option value ="7" > For Delivery  </option>
									  <?php } else if($val->status == 7 || $val->status == 10|| $val->status == 11){?>
										<option value ="6" > Completed  </option>
									  <?php } ?>
									  </select>
									</div>
									<div class="col-12" id="price_value" style="display:none;">
									  <label for="inputNanme4" class="form-label"> Price Amount: </label>
									  <input type="text" class="form-control" name="amount">
									</div>	
									<br>
									<div class="col-12" id="upload_proof" style="display:none;">
									  <label for="inputNanme4" class="form-label"> Upload Proof of Delivery: </label>
									  <input type="file" class="form-control" name="proof">
									</div>
									
									<div class="col-12" id="cancel_reason" style="display:none;">
									  <label for="inputNanme4" class="form-label"> Reason: </label>
									  <textarea type="date" class="form-control" name="reason"></textarea>
									</div>	
									
								</div>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-order">Update </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					
					 <div class="modal fade orderqoutes" id="orderqoutes<?php echo $val->order_id ;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Send Qoutation</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" enctype="multipart/form-data" method="post">
							   <div class="row">
									<div class="col-12">
									  <label for="inputNanme4" class="form-label"> Qoutation Details: </label>
									  <input type="hidden" class="form-control" name="order_id" value="<?php echo $val->order_id;?>" required>
									  <input type="hidden" class="form-control" name="trans_code" value="<?php echo $val->trans_code;?>" required>
									  <textarea class="summernote" name="qoutesdetails" height="200px"><?php echo $val->qoutesdetails;?></textarea>
									</div>
									<br><br><br><br>
									<div class="col-12" id="price_value">
									  <label for="inputNanme4" class="form-label"> Qoutation Amount: </label>
									  <input type="text" class="form-control" name="amount" value="<?php echo $val->amount;?>">
									</div>	
									
									
									
								</div>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="send-qoute">Send Qoute </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
				
                <?php } ?>
                </tbody>
              </table>
                </div>
                </div>
         
              </div>
            
            </div>
            <!-- / Content -->

    <?php include("footer.php");?>      