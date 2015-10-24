<section class="signup">
			<article class="row">					
			
				<div role="tabpanel" id="main-tab">				
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				
				  <li role="presentation" class="active"><a href="#doctors" aria-controls="home" role="tab" data-toggle="tab">Healthcare</a></li>
				  
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="doctors">
					
					<section class="shop-result medicine-result">	
					<h3>Healthcare Center</h3>
					<?php foreach($healthcares as $healthcare){?>						 
						
								
								<div class="row event-single">
								<div class="col-md-12">
									<h3><a href="#"><?php echo $healthcare->company_name;?></a></h3>
								</div>
								<div class="col-md-4">					
									<h5><?php echo $healthcare->company_address;?></h5>								
									<h5><?php echo $healthcare->compnay_mobile;?></h5>
														
								</div>
								<div class="col-md-8">
									<h5>Email:<?php echo $healthcare->company_email;?></h5>						
									<h5>Contact: <?php echo $healthcare->compnay_mobile;?></h5>
									<h5>Address: <?php echo $healthcare->company_address;?></h5>
									
								 </div>				
					
						 
					 <?php }?> 
			
					<?php
				
							
								  
							

					?>
						
				</section>
					
					
					
					</div>	  
				</div>
				<!-- Tab panes end -->
			  </div> 			  
			</article>
			
		</section>			
		</div>
	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>