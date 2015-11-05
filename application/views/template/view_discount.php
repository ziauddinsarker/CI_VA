<div role="tabpanel" class="tab-pane" id="discount">
	<h3>Find Discount By Category</h3>
	<div class="btn-group" data-toggle="buttons" id="division"> 
		<?php foreach($doctors_category_only as $doc_cat){?>		
			<label class="btn btn-primary">
				<input type="radio" name="doc_category" class="track-order-change" id="<?php echo $doc_cat->doctor_category_name;?>" value="<?php echo $doc_cat->doctor_category_name;?>">
				 <?php echo $doc_cat->doctor_category_name;?>
			</label>			    
		
	 <?php }?>  
	</div>		
	<!--Discount---->
	<h2>Latest Discount </h2>


	<article class="container">

		<?php //From Home controller and home model ?>
		<?php foreach($all_discount as $discount){?>
		<div class="row up-doc">
			<div class="col-md-4 doctor-info-upper">

				<p><?php echo $discount->discount_name;?><sup>500 PP</sup></p>
				<img class="img-responsive" src="<?php echo base_url("assets/images/banner-120x728.jpg"); ?>" alt="">
				<ul class="doctor-info-unorder">
					<li><b>Business Area*:</b> <?php echo $discount->discount_area;?></li>
					<li><b>Discount On.*:</b> <?php echo $discount->discount_on;?></li>

				</ul>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-4 doctor-info-all">

				<div class="row social-doctor">
					<div class="col-md-4">
						<a href="#">fb</a>
					</div>

					<div class="col-md-4">
						<a href="#">tw</a>
					</div>

					<div class="col-md-4">
						<a href="#">copy link</a>
					</div>
				</div>

				<div class="row contact-doctor">
					<div class="col-md-12">
						<a href="#">Contact detail</a>
					</div>
				</div>


				<div class="row contact-doctor-details">
					<ul>
						<li><b>Phone:</b> <?php echo $discount->discount_phone;?></li>
						<li><b>Contact Time:</b> <?php echo $discount->discount_contact_time;?></li>
						<li><b>Email:</b> <?php echo $discount->discount_email;?></li>
						<li><b>Website/Page:</b> <?php echo $discount->discount_website_or_page;?></li>
					</ul>
				</div>


				<div class="row pp-doctor">
					Discount Details
				</div>

				<div class="row contact-doctor-details">
					<ul>
						<li><b>Discount Duration:</b> <?php echo $discount->discount_time_start;?></li>
						<li><b>Discount Instruction:</b> <?php echo $discount->discount_instruction;?></li>

					</ul>
				</div>
			</div>
		</div>
		<?php }?>
	</article>


	<!-- Discount End -->
</div>