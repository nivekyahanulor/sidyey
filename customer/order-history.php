	<?php include("header.php");?>
	<?php include('controller/order-history.php');?>
	<br><br><br><br>
				<div class="row justify-content-center">
				<div class="col-lg-10">
				<?php if(isset($_GET['approved'])){ ?>
			   <div class="alert alert-info alert-dismissable">
					<strong>Success!</strong> Qoutation Approved.
				</div>
				<?php } if(isset($_GET['declined'])){ ?>
			   <div class="alert alert-warning alert-dismissable">
					<strong>Success!</strong> Qoutation Declined.
				</div>
			<?php } ?>
				<h2> Order History </h2>
					<table class="table table-bordered table-hover" id="table_id">
		                 <thead>
                            <tr>
                                <th class="text-center">Transaction Code</th>
                                <th class="text-center">Total Qoutation Amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Order Date</th>

                            </tr>
                        </thead>
                        <tbody><!-- Button trigger modal -->

						<?php while($val1 = $checkout1->fetch_object()){	?>
                            <tr>
                                <td class="text-center">
								<a href="tracking.php?id=<?php echo $val1->order_id;?>">Tracking Details</a>
								<br>
								<a href="#" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val->trans_code;?>">Services Details</a>
								</td>
                                <td class="text-center"><?php if($val1->amount ==""){ echo "---";} else {?>  ₱ <?php echo number_format($val1->amount ,2); }?></td>
                                <td class="text-center"><?php 
								if($val1->status==1){ echo 'Pending'; } 	
								else if($val1->status==2){ echo 'Approved'; } 
								else if($val1->status==3){ echo 'Cancelled'; } 
								else if($val1->status==11){ echo 'Received'; } 
								else if($val1->status==12){ echo 'Declined'; } 
								else if($val1->status==7){ ?> For Delivery <br> <a href="#" data-bs-toggle="modal" data-bs-target="#received<?php echo $val1->trans_code;?>" class="btn btn-sm btn-info"> Received Order </a>
								<?php } 
								else if($val1->status==10){?> 
								<a href="#" data-bs-toggle="modal" data-bs-target="#received<?php echo $val1->trans_code;?>" class="btn btn-sm btn-info"> Received Order </a>
								<?php } 
								else if($val1->status==6){ echo 'Completed'; } 
								else if($val1->status==9){ ?>
									<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#view-details<?php echo $val1->trans_code;?>">Approved Qoutation </button>
									<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#view-declined<?php echo $val1->trans_code;?>">Decline Qoutation </button>
									<button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#view-cancel<?php echo $val1->trans_code;?>">Cancel  </button>
								<?php	} 
								?></td>
                                <td class="text-center"><?php echo $val1->date_added;?></td>
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
						
						<?php
						$transcode  = $val1->trans_code;
						$orders1    = $mysqli->query("SELECT b.name , b.description as descs , a.* from pos_order a left join pos_item_category b on a.service_id = b.category_id   where a.trans_code='$transcode' ");
						while($val2 = $orders1->fetch_object()){	
						?>
						 <b>Service Details </b> <br>
						 <hr>
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
							<div class="modal fade" id="view-details<?php echo $val1->trans_code;?>"  role="dialog"  tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title"> Qoutation Details </h5>
								  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								<form method="post">
								Qoutation : <br>
								<?php echo $val1->qoutesdetails;?>
								Qoutation Amount : <br>
								<?php echo number_format($val1->amount);?>
								<input type="hidden" name="transcode" value="<?php echo $val1->trans_code;?>">
								<input type="hidden" name="order_id" value="<?php echo $val1->order_id;?>">
								<br>
								<label> <b> Delivery Method </b> </label>
									<select class="form-control" name="delivery" required>
										<option value=""> - Select - </option>
										<option> Pick Up </option>
										<option> For Deliver </option>
									</select>
								</div>
								<div class="modal-footer">
								<button type="submit" class="btn btn-default btn-info" name="approved">Approve Quotation</button>
								<button type="button" class="btn btn-default btn-warning" data-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
						</div>
						<div class="modal fade" id="view-declined<?php echo $val1->trans_code;?>"  role="dialog"  tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title"> Decline Details </h5>
								  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								<form method="post">
								Qoutation : <br>
								<?php echo $val1->qoutesdetails;?>
								Qoutation Amount : <br>
								<?php echo number_format($val1->amount);?>
								<input type="hidden" name="transcode" value="<?php echo $val1->trans_code;?>">
								<input type="hidden" name="order_id" value="<?php echo $val1->order_id;?>">
								<br>
								<label> <b> Reason </b> </label>
									<textarea name="reason" class="form-control"></textarea>
								</div>
								<div class="modal-footer">
								<button type="submit" class="btn btn-default btn-info" name="declined">Declined Quotation</button>
								<button type="button" class="btn btn-default btn-warning" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
						</div>
						<div class="modal fade" id="received<?php echo $val1->trans_code;?>"  role="dialog"  tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title"> Received Order </h5>
								  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								<form method="post">
									Update order to received ?
								<input type="hidden" name="transcode" value="<?php echo $val1->trans_code;?>">
								<input type="hidden" name="order_id" value="<?php echo $val1->order_id;?>">
								</div>
								<div class="modal-footer">
								<button type="submit" class="btn btn-default btn-info" name="received">Received</button>
								<button type="button" class="btn btn-default btn-warning" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
						</div>
						<div class="modal fade" id="view-cancel<?php echo $val1->trans_code;?>"  role="dialog"  tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
							  <div class="modal-content">
								<div class="modal-header">
								  <h5 class="modal-title"> Received Order </h5>
								  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
								<form method="post">
									Cancel this service ?
									<br>
								<label> <b> Reason </b> </label>
									<textarea name="reason" class="form-control"></textarea>
								<input type="hidden" name="transcode" value="<?php echo $val1->trans_code;?>">
								<input type="hidden" name="order_id" value="<?php echo $val1->order_id;?>">
								</div>
								<div class="modal-footer">
								<button type="submit" class="btn btn-default btn-danger" name="cancel">Cancel</button>
								<button type="button" class="btn btn-default btn-warning" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
							  </div>
							</div>
						<?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
     
    <br> <br> <br> <br> <br>
    <br> <br> <br> <br> <br>
	<?php include("footer.php");?>