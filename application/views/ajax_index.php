	
<section class="signup">
				
			<article class="row">					
			
				<div role="tabpanel" id="main-tab">				
				<!-- Nav tabs -->
				

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="doctors">
				<?php if (!isset($ajax_req)): ?>
				<div class="show-gallery"><p>View only Gallery</p></div>
				<div class="show-images"><p>View only Images</p></div>
				<div class="show-articles"><p>View only Articles</p></div>
				<?php endif; ?>
				 
				<div id="ajax-content-container">
				  <table class="table table-bordered table-condensed table-striped">
					<tr>
					  <th>Title</th>
					  <th>Type</th>
					</tr>
					<?php foreach ($node_list as $key=>$value): ?>
					  <tr>
						<td><?php print $value->title; ?></td>
						<td width="10%"><?php print ucfirst($value->type); ?></td>
					  </tr>
					<?php endforeach; ?>
				  </table>
				</div>
   	  
				</div>
				<!-- Tab panes end -->
			  </div> 			  
			
			
				
		</div>
		</article>
	 	<!--End Container -->	
		<!--Footer Start Here -->
</section>	
