<?php include("header.php");?>
    <section id="details" class="details">
      <div class="container">

        <div class="row content justify-content-center">
        
          <div class="col-md-12 pt-4" data-aos="fade-up">
			<?php if(isset($_GET['added'])){ ?>
			   <div class="alert alert-info alert-dismissable">
					<strong>Success!</strong>Product Qoutation submitted to admin.
				</div>
			<?php } ?>
            <h3> Select your product</h3>
           <div class="row">
			<?php $category = $mysqli->query("SELECT * from pos_item_category");
										while($val2 = $category->fetch_object()){
			?>
			<div class="col-4">
			  <div class="card mt-3 tab-card">
				<a href="qoutation.php?data=<?php echo $val2->category_id;?>&name=<?php echo $val2->name;?>">
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">
					<h5 class="card-title"><?php echo $val2->name;?></h5>
					<p class="card-text"><?php echo $val2->description;?></p>
				   <img src="../admin/assets/menu/<?php echo $val2->photo;?>" width="100%" height="200px">
				  </div>
				 
				</div>
				</a>
			  </div>
			</div>
			<?php } ?>
		  </div>
          </div>
        </div>

    

      </div>
    </section>

  <?php include("footer.php");?>