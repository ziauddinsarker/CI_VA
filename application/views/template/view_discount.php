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
	<?php foreach($all_discount as $discount){?>	
		<div class="row event-single" id="<?php echo $discount->discount_id;?>">
			<div class="col-md-12">
				<h3><?php echo $discount->discount_name;?></h3>
				<div class="fb-share-button" data-href="<?php echo site_url();?>'<?php echo $discount->discount_id;?>" data-layout="button_count"></div>
			</div>
			<div class="col-md-4">					
				<h5><b>Discount starts on:</b> <?php echo $discount->discount_time_start;?></h5>
			</div>
		</div>
	<?php }?> 
	<!-- Discount End -->
</div>