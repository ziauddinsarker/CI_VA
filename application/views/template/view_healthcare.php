<div role="tabpanel" class="tab-pane" id="healthcare">
				<?php if($this->session->userdata('user_id')) { ?>
				<div class="row">
				<!-- Trigger the modal with a button -->
				<button type="button" title="Hooray!" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#healthcare-modal">+</button>

				<!-- Modal -->
				<div id="healthcare-modal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						
					  </div>
					  <div class="modal-body">
						<div class="">
							  <legend>Add New Healthcare</legend>
							<?php echo form_open("home/company");?>
							<fieldset>

								<div class="form-group">
									<div class="row colbox">

										<div class="col-lg-4 col-sm-4">
											<label for="companyname" class="control-label">Company Name</label>
										</div>
										<div class="col-lg-8 col-sm-8">
											<input id="companyname" name="companyname" placeholder="companyname" type="text" class="form-control"  value="<?php echo set_value('companyname'); ?>" />
											<span class="text-danger"><?php echo form_error('companyname'); ?></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row colbox">
										<div class="col-lg-4 col-sm-4">
											<label for="companyaddress" class="control-label">Company Address</label>
										</div>
										<div class="col-lg-8 col-sm-8">
											<input id="companyaddress" name="companyaddress" placeholder="companyaddress" type="text" class="form-control"  value="<?php echo set_value('companyaddress'); ?>" />
											<span class="text-danger"><?php echo form_error('companyaddress'); ?></span>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="row colbox">
										<div class="col-lg-4 col-sm-4">
											<label for="companycontact" class="control-label">Company Contact</label>
										</div>
										<div class="col-lg-8 col-sm-8">
											<input id="companycontact" name="companycontact" placeholder="companycontact" type="text" class="form-control"  value="<?php echo set_value('companycontact'); ?>" />
											<span class="text-danger"><?php echo form_error('companycontact'); ?></span>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="row colbox">
										<div class="col-lg-4 col-sm-4">
											<label for="companybusinesstype" class="control-label">Company Business Type</label>
										</div>
										<div class="col-lg-8 col-sm-8">
											<input id="companybusinesstype" name="companybusinesstype" placeholder="companybusinesstype" type="text" class="form-control"  value="<?php echo set_value('companybusinesstype'); ?>" />
											<span class="text-danger"><?php echo form_error('companybusinesstype'); ?></span>
										</div>
									</div>
								</div>
								
								
								<div class="form-group">
									<div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
										<input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
										<input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger" value="Clear" />

										<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>

									</div>
								</div>
							</fieldset>
							<?php echo form_close(); ?>
							<?php echo $this->session->flashdata('msg'); ?>
							
						</div>
					  </div>

					</div>

				  </div>
				</div>


				</div>
				<?php } ?>
				<!--End Modal for Healthcare Details-->
				
				<h3>Healthcare Business By Category</h3>
				
				<div class="btn-group" id="filters">
					<article class="row">
						<div class="col-md-5">

							<ul>
								<?php foreach($company_category_first as $company){?>
									<li><a href="#" id="<?php echo $company->company_cat_name; ?>" onclick="getHealthcareByCat(this)" ><?php echo $company->company_cat_name; ?></a></li>
								<?php }?>
							</ul>
						</div>


						<div class="col-md-5">

							<ul>
								<?php foreach($company_category_middle as $company){?>
									<li><a href="#" id="<?php echo $company->company_cat_name; ?>" onclick="getHealthcareByCat(this)" ><?php echo $company->company_cat_name; ?></a></li>
								<?php }?>
							</ul>

						</div>

						<div class="col-md-2">
							<ul>
								<?php foreach($company_category_last as $company){?>
									<li><a href="#" id="<?php echo $company->company_cat_name; ?>" onclick="getHealthcareByCat(this)" ><?php echo $company->company_cat_name; ?></a></li>
								<?php }?>
							</ul>
						</div>
					</article>


				</div>
	
	
				<div id="healthcare_content"></div>
			<?php /*
				
				<?php foreach($companys as $company){?>	
				<!--Doctors Details-->

					<div class="panel-group" id="accordion">
					
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="panel-title">
									<div data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $company->company_id ; ?>">                        
										<h4><?php echo $company->company_name ; ?> <sup>0 RSB (Auto add from history update by admin)<sup></h4>
										
										<p>About(facilities) : <?php echo $company->company_description ; ?></p>
									</div>	
								</div>
							</div>
							<div id="collapse<?php echo $company->company_id ; ?>" class="panel-collapse collapse">
								<div class="panel-body">
								
										<div class="col-md-12 doctor-description">							
											
											
											<div class="col-md-6">
											<p>Phone: <?php echo $company->company_mobile ; ?></p>
												<p>Email: <?php echo $company->company_email ; ?></p>
												<p>Address: <?php echo $company->company_address ; ?></p>
												<p>Website: <?php echo $company->company_website ; ?></p>
											</div>
										</div>	
									<h4>Click To View RSB History<sup>(by admin)</sup></h4>
									<table border="1" style="width:100%">
									  <tr>								
										<td>Date</td>		
										<td>Descriptin</td>		
										<td>RSB Points</td>						
									  </tr> 
									  
									  <tr>
										<td>(+Add New Field by Admin)</td>
										<td>+Add New Field by Admin)</td>		
										<td>+Add New Field by Admin)</td>								
									  </tr>						  
									</table>
								</div>
							</div>
						</div>
					</div>
					
				<?php } ?>

				
				*/?>
</div>