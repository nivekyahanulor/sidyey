<?php include("header.php");?>
    <section id="details" class="details">
      <div class="container">

        <div class="row content justify-content-center">
        
          <div class="col-md-6 pt-4" data-aos="fade-up">
            <h3> Get your Qoutation now</h3>
            <form method="POST" enctype="multipart/form-data" >
			<br>
			<div class="form-group">
			  <label> Service :</label>
			  <br>
			  <b><?php echo $_GET['name'];?></b>
			  <br>
			  <input type="hidden" class="form-control" name="category" value ="<?php echo $_GET['data'];?>">

			</div>
			<br>
			
			<?php 
				if( $_GET['name'] == 'CALENDAR'){ 
						$photo =4;
				} 
				if( $_GET['name'] == 'INSTAX INSPIRED PRINT'){ 
						$photo =10;
				} 
				if( $_GET['name'] == 'PHOTO CARD'){ 
						$photo =10;
				} 
				if( $_GET['name'] == 'SPOTIFY KEYCHAIN'){ 
						$photo =2;
				} 
				if( $_GET['name'] == 'MINI PHOTO ALBUM KEYCHAIN'){ 
						$photo =20;
				} 
				if( $_GET['name'] == 'PHOTO FILM STRIP'){ 
						$photo =4;
				} 
				if( $_GET['name'] == 'PLAIN KEYCHAIN'){ 
						$photo =2;
				} 
				if( $_GET['name'] == 'INVITATION CARD'){ 
						$photo =2;
				} 
				if( $_GET['name'] == 'CUSTOMIZED STICKER'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'LABEL STICKER'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'GIVE AWAY KEYCHAIN'){ 
						$photo =2;
				} 
				if( $_GET['name'] == 'SINTRA BOARD'){ 
						$photo =3;
				} 
				if( $_GET['name'] == 'CALLING CARD'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'THANK YOU CARD'){ 
						$photo =2;
				} 
				if( $_GET['name'] == 'SPRAY BOTTLE'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'REF MAGNET'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'PHOTO FRAME'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'SPOTIFY SONG FRAME'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'HEART-SHAPED PHOTO FRAME'){ 
						$photo =27;
				} 
				if( $_GET['name'] == '12 PIECES INSTAX INSPIRED FRAME'){ 
						$photo =12;
				} 
				if( $_GET['name'] == 'MILESTONE PHOTO FRAME'){ 
						$photo =12;
				} 
				if( $_GET['name'] == 'PHOTO WITH DEDICATION FRAME'){ 
						$photo =2;
				} 
				if( $_GET['name'] == 'INSTAGRAM INSPIRED FRAME'){ 
						$photo =1;
				} 
				if( $_GET['name'] == 'NEWBORN PHOTO FRAME'){ 
						$photo =3;
				} 
				if( $_GET['name'] == 'DOUBLE GLASS FRAME'){ 
						$photo =10;
				} 
				
			?>
			<?php if( $_GET['name'] == 'NAME TAG'){?>
			<div class="form-group">
			  <label> Full Name :</label>
			  <input type="text" class="form-control" name="fullname" >
			</div>
			<br>
			<div class="form-group">
			  <label> Nick Name :</label>
			  <input type="text" class="form-control" name="nickname" >
			</div>
			<br>
			<div class="form-group">
			  <label> Grade and Section :</label>
			  <input type="text" class="form-control" name="gradesection" >
			</div>
			<?php } else if( $_GET['name'] == 'SUBJECT STICKER'){ ?>
			<div class="form-group">
			  <label> Subject Name :</label>
			  <input type="text" class="form-control" name="fullname" >
			</div>
			<?php  } else if( $_GET['name'] == 'HOUSE ADDRESS PLATE'){ ?>
			<div class="form-group">
			  <label> Full Address:</label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
			  </select>
			</div>
			<?php } else { ?>
			<div class="form-group">
			  <label>Photo (Max of <?php echo $photo;?> Attach Picture) :</label>
			  <input type="file" class="form-control"multiple="multiple" onchange="checkFiles(this.files,<?php echo $photo;?>)" id="photo" name="upload[]" >
			</div>
			<?php } ?>
			
			<br>
			<?php if( $_GET['name'] == 'CALENDAR'){ ?>
			<div class="form-group">
			  <label> Surname (Optional):</label>
			  <input type="text" class="form-control" name="surname" >
			</div>
			<br>
			
			<?php } if( $_GET['name'] == 'DOUBLE GLASS FRAME'){ ?>
			<div class="form-group">
			  <label> Celebration Date:</label>
			  <input type="text" class="form-control" name="label" placeholder="(anniv, monthsary, birthday, xmas, etc.)" >
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="theme" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> Brown  </option>
					<option> Yellow </option>
					<option> Red </option>
					<option> Blue </option>
					<option> Green </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'NEWBORN PHOTO FRAME'){ ?>
			<div class="form-group">
			  <label> New Born Full Name:</label>
			  <input type="text" class="form-control" name="fullname" >
			</div>
			<br>
			<div class="form-group">
			  <label> Date and Time of Birh:</label>
			  <input type="text" class="form-control" name="daytimebirth" >
			</div>
			<br>
			<div class="form-group">
			  <label> Height and Weigth:</label>
			  <input type="text" class="form-control" name="hw" >
			</div>
			<br>
			<div class="form-group">
			  <label> Type of Delivery:</label>
			  <select class="form-control" name="deliverytype" >
					<option> - Select  - </option>
					<option> CS  </option>
					<option> Normal  </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label>  Theme Colour:</label>
			  <select class="form-control" name="theme" >
					<option> - Select Theme - </option>
					<option> Blue   </option>
					<option> Pink </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'INSTAGRAM INSPIRED FRAME'){ ?>
			<div class="form-group">
			  <label> Instagram User Name:</label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'PHOTO WITH DEDICATION FRAME'){ ?>
			<div class="form-group">
			  <label> Dedication / Greetings</label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> Brown  </option>
					<option> Yellow </option>
					<option> Red </option>
					<option> Blue </option>
					<option> Green </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'MILESTONE PHOTO FRAME'){ ?>
			<div class="form-group">
			  <label> Full Name:</label>
			  <input type="text" class="form-control" name="fullname" >
			</div>
			<br>
			<div class="form-group">
			  <label> Dedication / Greetings</label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label>  Theme Colour:</label>
			  <select class="form-control" name="theme" >
					<option> - Select Theme - </option>
					<option> Blue   </option>
					<option> Pink </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'LABEL STICKER'){ ?>
			<div class="form-group">
			  <label> Product Label</label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<?php } if( $_GET['name'] == '12 PIECES INSTAX INSPIRED FRAME'){ ?>
			<div class="form-group">
			  <label> Dedication / Greetings / Any text for upper part</label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
					<option> Beige </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'HEART-SHAPED PHOTO FRAME'){ ?>
			<div class="form-group">
			  <label> Dedication and Greetings </label>
			  <input type="text" class="form-control" name="label" >
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="theme" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
					<option> Beige </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> Brown  </option>
					<option> Yellow </option>
					<option> Red </option>
					<option> Blue </option>
					<option> Green </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<?php } if( $_GET['name'] == 'SPOTIFY SONG FRAME'){ ?>
			<div class="form-group">
			  <label> Song Choice</label>
			  <input type="text" class="form-control" name="label" placeholder="[sample guide: song title – singer]">
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
					<option> Beige </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> Brown  </option>
					<option> Yellow </option>
					<option> Red </option>
					<option> Blue </option>
					<option> Green </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<?php } ?>
			<div class="form-group">
			  <label> Quantity :</label>
			  <input type="number" class="form-control" name="qty" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  >
			</div>
			<br>
			<?php if(   $_GET['name'] == 'REF MAGNET' || $_GET['name'] == 'CALENDAR' || $_GET['name'] == 'SPRAY BOTTLE' || $_GET['name'] == 'INSTAX INSPIRED PRINT' || $_GET['name'] == 'THANK YOU CARD' || $_GET['name'] == 'SPOTIFY KEYCHAIN'|| $_GET['name'] == 'CALLING CARD' || $_GET['name'] == 'PLAIN KEYCHAIN' || $_GET['name'] == 'NAME TAG'|| $_GET['name'] == 'SINTRA BOARD'|| $_GET['name'] == 'GIVE AWAY KEYCHAIN'){ ?>
			<div class="form-group">
			  <label> Size :</label>
			  <input type="text" class="form-control" name="size"  value="One Size" readonly>
			</div>
			<br>
			<?php } else if($_GET['name'] == 'NEWBORN PHOTO FRAME' ||$_GET['name'] == 'INSTAGRAM INSPIRED FRAME' ||$_GET['name'] == 'PHOTO WITH DEDICATION FRAME' ||$_GET['name'] == 'HEART-SHAPED PHOTO FRAME' || $_GET['name'] == 'SPOTIFY SONG FRAME' ||  $_GET['name'] == '12 PIECES INSTAX INSPIRED FRAME'||  $_GET['name'] == 'MILESTONE PHOTO FRAME'){?>
			<div class="form-group">
			  <label> Size :</label>
			  <input type="text" class="form-control" name="size"  value="One Size A4" readonly>
			</div>
			
			<?php } else if($_GET['name'] == 'DOUBLE GLASS FRAME'){?>
			<div class="form-group">
			  <label> Size :</label>
			  <input type="text" class="form-control" name="size"  value="One Size 5R" readonly>
			</div>
			
			<?php } else if($_GET['name'] == 'PHOTO FRAME'  ){?>
			<div class="form-group">
			  <label> Size :</label>
			  <input type="text" class="form-control" name="size"  value="One Size A4" readonly>
			</div>
			<br>
			<div class="form-group">
			  <label> Frame Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> White  </option>
					<option> Black  </option>
					<option> Beige </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Packaging  :</label>
			  <select class="form-control" name="package" >
					<option> - Select  - </option>
					<option> With Box  </option>
					<option> Without Box  </option>
			  </select>
			</div>	
			
			<?php } else if( $_GET['name'] == 'PHOTO CARD'){ ?>
			<div class="form-group">
			  <label> Size :</label>
			  <select class="form-control" name="size" >
					<option> - Select Size - </option>
					<option> Cute  </option>
					<option> Mini Wallet  </option>
					<option> Wallet </option>
					<option> 3R </option>
					<option> 4R </option>
					<option> A4 </option>
			  </select>
			</div>	
			<?php } else if( $_GET['name'] == 'INVITATION CARD'){ ?>
			<div class="form-group">
			  <label> Size :</label>
			  <select class="form-control" name="size" >
					<option> - Select Size - </option>
					<option> 3R </option>
					<option> 4R </option>
					<option> 5R </option>
			  </select>
			</div>
			<?php } else if( $_GET['name'] == 'MINI PHOTO ALBUM KEYCHAIN'){ ?>
			<div class="form-group">
			  <label> Size :</label>
			  <select class="form-control" name="size" >
					<option> - Select Size - </option>
					<option> Small Size (16 Photos)  </option>
					<option> Meduim Size (20 Photos)  </option>
			  </select>
			</div>
			<?php } else if( $_GET['name'] == 'SUBJECT STICKER' || $_GET['name'] == 'CUSTOMIZED STICKER'|| $_GET['name'] == 'LABEL STICKER'){ ?>
			<div class="form-group">
			  <label> Size :</label>
			  <select class="form-control" name="size" >
					<option> - Select Size - </option>
					<option> 1 x 1 Inch</option>
					<option> 2 x 2 Inch  </option>
					<option> 2 x 3.5 Inch  </option>
					<option> 3.5 x 2 Inch  </option>
					<option> 4 x 6 Inch  </option>
			  </select>
			</div>
			
			<?php } ?>
			<?php if( $_GET['name'] == 'SPOTIFY KEYCHAIN' ||  $_GET['name'] == 'MINI PHOTO ALBUM KEYCHAIN'||  $_GET['name'] == 'PLAIN KEYCHAIN' ||  $_GET['name'] == 'GIVE AWAY KEYCHAIN' ){?>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> Brown  </option>
					<option> Yellow </option>
					<option> Red </option>
					<option> Blue </option>
					<option> Green </option>
					<option> White </option>
			  </select>
			</div>
			<?php } else if($_GET['name'] == 'PHOTO FILM STRIP'){ ?>
			
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> White </option>
			  </select>
			</div>
			
			<?php } else if($_GET['name'] == 'SINTRA BOARD'){ ?>
			
			<div class="form-group">
			  <label> Texture :</label>
			  <select class="form-control" name="texture" >
					<option> - Select Texture - </option>
					<option> Glitter  </option>
					<option> Glossy </option>
					<option> Matte </option>
					<option> Canvass Matte </option>
					<option> 3D </option>
					<option> Satin </option>
			  </select>
			</div>
			<?php } else if($_GET['name'] == 'SUBJECT STICKER' || $_GET['name'] == 'LABEL STICKER'){ ?>
			<br>
			<div class="form-group">
			  <label> Background Color :</label>
			  <select class="form-control" name="bgcolor" >
					<option> - Select Color - </option>
					<option> Black  </option>
					<option> Brown  </option>
					<option> Yellow </option>
					<option> Red </option>
					<option> Blue </option>
					<option> Green </option>
					<option> White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label> Font :</label>
			  <select class="form-control" name="fonts" >
					<option> - Select Font - </option>
					<option> Algerian  </option>
					<option> Arial </option>
					<option> Calibri </option>
					<option> Lucida Caligrahy </option>
					<option> Times New Romans </option>
			  </select>
			</div>
			<?php } else if($_GET['name'] == 'NAME TAG'){ ?>
			<div class="form-group">
			  <label> Select Theme :</label>
			  <select class="form-control" name="theme" >
					<option> - Select Theme - </option>
					<option> Sponge Bob  </option>
					<option> Barbie </option>
					<option> Sofia the First </option>
					<option> Frozen </option>
					<option> Thinker Bell </option>
					<option> Spiderman </option>
					<option> Batman </option>
					<option> Plain White </option>
			  </select>
			</div>
			<br>
			<div class="form-group">
			  <label>  Lace :</label>
			  <select class="form-control" name="lace" >
					<option> With Lace </option>
					<option> Without Lace </option>
				</select>
			</div>
			<br>
			<?php } ?>
			<?php if( $_GET['name'] == 'INVITATION CARD'){ ?>
			<br>
			<div class="form-group">
			  <label>Invitation Details:</label>
			  <textarea name="invitation" class="form-control"placeholder="[event name, address, name of celebrant, etc.]" ></textarea>
			</div>
			<br>
			<div class="form-group">
			  <label>  Print :</label>
			  <select class="form-control" name="print" >
					<option> Front Only </option>
					<option> Front and Back  </option>
				</select>
			</div>
			<br>
			<div class="form-group">
			  <label> Select Theme :</label>
			  <select class="form-control" name="theme" >
					<option> - Select Theme - </option>
					<option> Butteryfly   </option>
					<option> Dark </option>
					<option> Pastel </option>
					<option> Plain Colour </option>
			  </select>
			</div>
			<?php } ?>
			<br>
			<div class="form-group">
			  <label>Note:</label>
			  <textarea name="description" class="form-control"placeholder="Enter your note here." ></textarea>
			</div>
			
			<br>
			<button type="submit" class="btn btn-primary"  name="add-order" >Submit</button>
		  </form>
          </div>
        </div>

    

      </div>
    </section>

  <?php include("footer.php");?>