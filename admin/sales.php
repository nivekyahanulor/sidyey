  <?php include("header.php");?>
  <?php include("nav.php");?>
  <?php include('controller/sales-report.php');?>

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 col-md-12 order-1">
				<div class="card">
				<br>
                 <table class="table table-striped table-bordered" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Service Name</th>
                    <th scope="col"  class="text-center"> Transaction Code</th>
                    <th scope="col"  class="text-center"> Quantity</th>
                    <th scope="col"  class="text-center"> Total Amount</th>
                    <th scope="col"  class="text-center">Date Ordered</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $sales->fetch_object()){ ?>
				  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center"><?php echo $val->trans_code;?></td>
                    <td class="text-center"><?php echo $val->qty;?></td>
                    <td class="text-center">₱ <?php echo number_format($val->amount,2);?></td>
                    <td class="text-center"><?php echo $val->created_at;?></td>
                  
                  </tr>
		
                <?php } ?>
                </tbody>
                </table>
                </div>
                </div>
         
              </div>
            
            </div>

		
    <?php include("footer.php");?>      