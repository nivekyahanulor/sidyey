  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/inventory.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
			  <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-category"> <i class="bi bi-plus"></i> Add Inventory</button></h5>

              <div class="col-lg-12 col-md-12 order-1">
			  <div class="card">

                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">Name</th>
                    <th class="text-center" scope="col">Description</th>
                    <th class="text-center" scope="col">Quantity</th>
                    <th class="text-center" scope="col">Price</th>
                    <th class="text-center" scope="col">Photo</th>
                    <th class="text-center" scope="col">Date Added</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $pos_inventory->fetch_object()){ ?>
                  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center"><?php echo $val->description;?></td>
                    <td class="text-center"><?php echo $val->qty;?></td>
                    <td class="text-center"><?php echo $val->price;?></td>
                    <td class="text-center"><img src="assets/menu/<?php echo $val->photo;?>" width="150px;"></td>
                    <td class="text-center"><?php echo $val->date_added;?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-category<?php echo $val->inventory_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-category<?php echo $val->inventory_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
					 <div class="modal fade" id="edit-category<?php echo $val->inventory_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Category</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Name: </label>
							  <input type="text" class="form-control" name="name" value="<?php echo $val->name;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->inventory_id;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Description: </label>
							  <textarea type="text" class="form-control" name="description" required><?php echo $val->description;?></textarea>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Price: </label>
							  <input type="text" class="form-control" name="price"  value="<?php echo $val->price;?>"  required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity: </label>
							  <input type="number" class="form-control" name="qty"  value="<?php echo $val->qty;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Photo: </label>
							  <input type="file" class="form-control" name="image" >
							  <input type="hidden" class="form-control" name="image1" value="<?php echo $val->photo;?>" >
							</div>
							
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="update-inventory">Update </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
					 <div class="modal fade" id="delete-category<?php echo $val->inventory_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Inventory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Inventory?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->inventory_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-inventory">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
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
			 <div class="modal fade" id="add-category" tabindex="-1">
					<div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title"> Inventory Details</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post" enctype="multipart/form-data">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Description: </label>
							  <textarea type="text" class="form-control" name="description" required></textarea>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity: </label>
							  <input type="number" class="form-control" name="qty" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Price: </label>
							  <input type="text" class="form-control" name="price" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Photo: </label>
							  <input type="file" class="form-control" name="image" required>
							</div>
							
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-primary" name="add-item">Save </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
			</div>
			
		
    <?php include("footer.php");?>      