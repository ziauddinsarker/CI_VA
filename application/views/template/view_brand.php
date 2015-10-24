<div role="tabpanel" class="tab-pane active" id="price">
	<div class="result-medicine" id="shop-result" >
		
		<article class="row">
					<div class="col-md-6 col-md-offset-2">
						<div class="form-group table-input">
						   <input type="text" class="form-control typeahead tt-query" autocomplete="off" spellcheck="false" name="name" id="name" placeholder="Enter Name">
						</div>
					</div>
		</article>
	
		<article class="row" id="div-dis-tha">
			<div class="col-md-1 col-md-offset-2">
			<h4>Division</h4>
			</div>
			<div class="col-md-7" id="location">				
				<div class="btn-group" id="division">					
				<?php foreach($divisions as $division){?>
					<label class="btn btn-primary">
					<input type="radio" name="division" class="track-order-change" id="<?php echo $division->division_name;?>" value="<?php echo $division->division_name;?>" onclick="getDistrictFromDivision(this)"><?php echo $division->division_name;?>
					</label>
				<?php }?>	
				</div>				
			</div>
		</article>
	</div>
</div>