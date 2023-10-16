<?php include("header.php");?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-center align-items-stretch pt-5 pt-lg-0 order-2 order-lg-1" data-aos="fade-up">
          <div>
		  <center>
            <h1>Welcome to <br> <b> Sidyey Print Stuff </b> </h1>
          </center>
          </div>
        </div>
        <div class="col-lg-6 d-lg-flex flex-lg-column align-items-stretch order-1 order-lg-2 hero-img" data-aos="fade-up">
          <img src="../assets/img/hero-img.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= App Features Section ======= -->
    <section id="features" class="features">
     <div class="container">

        <div class="section-title">
          <h2>Our Services</h2>
        </div>

        <div class="row no-gutters">
          <div class="col-xl-12 d-flex align-items-stretch order-2 order-lg-1">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
				<?php
					$services   = $mysqli->query("SELECT * from pos_item_category ");
					while($val3 = $services->fetch_object()){
				?>
                <div class="col-md-6 icon-box" data-aos="fade-up">
                  <i class="bx bx-check"></i>
                  <h4><?php echo $val3->name;?></h4>
                  <p><?php echo $val3->description;?></p>
                </div>
				<?php } ?>
              </div>
            </div>
          </div>
       
        </div>

      </div>
    </section><!-- End App Features Section -->


      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
<?php include("footer.php");?>

