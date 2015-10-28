<div role="tabpanel" class="tab-pane" id="doctor">
    <article id="doctor-tab">
        <h4>Doctor's Categories</h4>
        <div class="row">
            <div class="col-md-6">

				<ul>
					<?php foreach($doctors_category_22_1 as $category){?>
						<li><a href="#" id="<?php echo $category->doctor_category_name;?>" onclick="getDistrictOnDoctorTab(this)"><b><?php echo $category->doctor_category_name;?></b><?php echo $category->doctor_category_description;?></a></li>
					<?php }?>
				</ul>
            </div>

            <div class="col-md-6">
				<ul>
					<?php foreach($doctors_category_22_2 as $category){?>
						<li><a href="#" id="<?php echo $category->doctor_category_name;?>" onclick="getDistrictOnDoctorTab(this)"><b><?php echo $category->doctor_category_name;?></b><?php echo $category->doctor_category_description;?></a></li>
					<?php }?>
				</ul>
				<?php /*
                <div class="btn-group" data-toggle="buttons" id="filters">
                    <?php foreach($doctors_category_22_2 as $category){?>
                        <label class="btn btn-primary">
                            <input type="radio" name="district" class="track-order-change" id="<?php echo $category->doctor_category_name;?>" value="<?php echo $category->doctor_category_name;?>">
                            <?php echo $category->doctor_category_name;?>
                        </label>
                    <?php }?>
                </div>
 				*/?>
            </div>
        </div>

		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Barisal</th>
				<th>Chittagong</th>
				<th>Dhaka</th>
				<th>Khulna</th>
				<th>Rajshahi</th>
				<th>Rangpur</th>
				<th>Sylhet</th>
			</tr>
			<tr>
				<td>
					<ul>
						<?php foreach($barisal_division as $barisal){?>
							<li><a href="#" id="<?php echo $barisal->district_name;?>" onclick="getDoctorsOnDoctorTab(this)"><b><?php echo $barisal->district_name;?></b></a></li>
						<?php }?>
					</ul>
				</td>
				<td>
					<ul>
						<?php foreach($chittagong_division as $chittagong){?>
							<li><?php echo $chittagong->district_name; ?></li>
						<?php }?>
					</ul>
				</td>
				<td>
					<ul>
						<?php foreach($dhaka_division as $dhaka){?>
							<li><?php echo $dhaka->district_name; ?></li>
						<?php }?>
					</ul>
				</td>
				<td>
					<ul>
						<?php foreach($khulna_division as $khulna){?>
							<li><?php echo $khulna->district_name; ?></li>
						<?php }?>
					</ul>
				</td>
				<td>
					<ul>
						<?php foreach($rajshahi_division as $rajshahi){?>
							<li><?php echo $rajshahi->district_name; ?></li>
						<?php }?>
					</ul>
				</td>
				<td>
					<ul>
						<?php foreach($rangpur_division as $rangpur){?>
							<li><?php echo $rangpur->district_name; ?></li>
						<?php }?>
					</ul>
				</td>
				<td><ul>
						<?php foreach($sylhet_division as $sylhet){?>
							<li><?php echo $sylhet->district_name; ?></li>
						<?php }?>
					</ul>
				</td>
			</tr>
		</table>

    </article>





				
				<?php /*
			
				<!-- Get All Doctor -->	
				<?php foreach($all_doctors as $doctor){?>	
					<div class="panel-group" id="accordion">
	
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<div data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $doctor->doctor_id ; ?>">                        
									<div class="row">
										<div class="col-md-3">
											<img src="<?php echo base_url("assets/images/avatar.png"); ?>" alt="" height="100" width="100"/>
										</div>
										<div class="col-md-9">
											<h4><?php echo $doctor->doctor_name ; ?><sup> <?php echo $doctor->RSB;?> RSB<sup></h4>									
											<p><b>Title/Degree :</b> <?php echo $doctor->doctor_title ; ?></p>
											<p><b>Specialist :</b> <?php echo $doctor->doctor_category_name ; ?></p>
										</div>
									</div>
								</div>	
							</div>
						</div>
						
						<div id="collapse<?php echo $doctor->doctor_id ; ?>" class="panel-collapse collapse">
							<div class="panel-body">
							
								<div class="col-md-12 doctor-description">							
									<div class="col-md-6">											
										<p><b>New Visit Fee :</b> <?php echo $doctor->doctors_chambers_new_visit ; ?></p>
										<p><b>Revisit Fee :</b> <?php echo $doctor->doctors_chambers_re_visit ; ?></p>														
									</div>
									
									<div class="col-md-6">
										<p><b>Phone :</b> <?php echo $doctor->doctor_phone; ?></p>
										<p><b>Email :</b> <?php echo $doctor->doctor_email; ?></p>
										<p><b>Call/SMS Appointment :</b> <?php echo $doctor->doctors_chambers_call_for_apointment; ?></p>
										<p><b>Website :</b> <?php echo $doctor->doctor_website ; ?></p>
									</div>
								</div>
							
								<table border="1" style="width:100%">
								  <tr>
									<td></td>
									<td><?php echo $doctor->doctors_chamber_address_1 ; ?></td>		
									<td><?php echo $doctor->doctors_chamber_address_2 ; ?></td>		
									<td><?php echo $doctor->doctors_chamber_address_3 ; ?></td>						
								  </tr> 
								  
								  <tr>
									<td><b>Saturday</b></b></td>
									<td><?php echo $doctor->doctors_chambers_time_11; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_12; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_13; ?></td>
								  </tr>
								  <tr>
									<td><b>Sunday</b></td>
									<td><?php echo $doctor->doctors_chambers_time_21; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_22; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_23; ?></td>
								  </tr>
								  <tr>
									<td><b>Monday</b></td>
									<td><?php echo $doctor->doctors_chambers_time_31; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_32; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_33; ?></td>
								  </tr>
								  <tr>
									<td><b>Tuesday</b></td>
									<td><?php echo $doctor->doctors_chambers_time_41; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_42; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_43; ?></td>
								  </tr> 
								  
								  <tr>
									<td><b>Wednesday</b></td>
									<td><?php echo $doctor->doctors_chambers_time_51; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_52; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_53; ?></td>
								  </tr>
								  
								  <tr>
									<td><b>Thursday</b></td>
									<td><?php echo $doctor->doctors_chambers_time_61; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_62; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_63; ?></td>
								  </tr>
								  
								  <tr>
								  <td><b>Friday</b></td>
									<td><?php echo $doctor->doctors_chambers_time_71; ?></td>		
									<td><?php echo $doctor->doctors_chambers_time_72; ?></td>
									<td><?php echo $doctor->doctors_chambers_time_73; ?></td>
								  </tr>
								  
								</table>
								
								<?php if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'admin') { ?>
								
									<h4>Click To View RSB History<sup>(by admin)</sup></h4>
									<!-- Trigger the modal with a button -->
								<button type="button" title="Hooray!" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#doctor_rsb<?php echo $doctor->doctor_id ; ?>">+</button>

									<table border="1" style="width:100%">
									  <tr>								
										<td>Date</td>		
										<td>Descriptin</td>		
										<td>RSB Points</td>						
									  </tr> 
									  
									  <tr>
										<td>14-8-15</td>
										<td>He make a good event</td>		
										<td>20</td>								
									  </tr>
									</table>
								<?php }?>  
								
								<!-- Doctor Modal-->
								<div class="row">
								
									<!-- Modal -->
								<div id="doctor_rsb<?php echo $doctor->doctor_id ; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										
									  </div>
									  <div class="modal-body">
										<div class="">
											  <legend>Add RSB for Doctor</legend>
											<?= form_open('home/add_rsb') ?>
											<fieldset>

												<div class="form-group">
													<div class="row colbox">
														<div class="col-lg-4 col-sm-4">
															<label for="rsb_description" class="control-label">Description</label>
														</div>
														<div class="col-lg-8 col-sm-8">
															<input id="rsb_description" name="rsb_description" placeholder="RSB Description" type="text" class="form-control"  value="<?php echo set_value('rsb_description'); ?>" />
															<span class="text-danger"><?php echo form_error('rsb_description'); ?></span>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row colbox">
														<div class="col-lg-4 col-sm-4">
															<label for="rsb_date" class="control-label">Date</label>
														</div>
														<div class="col-lg-8 col-sm-8">
															<input id="rsb_date" name="rsb_date" placeholder="Date" type="text" class="form-control"  value="<?php echo set_value('rsb_date'); ?>" />
															<span class="text-danger"><?php echo form_error('rsb_date'); ?></span>
														</div>
													</div>
												</div>	
												
												<div class="form-group">
													<div class="row colbox">
														<div class="col-lg-4 col-sm-4">
															<label for="rsb_point" class="control-label">Point</label>
														</div>
														<div class="col-lg-8 col-sm-8">
															<input id="rsb_point" name="rsb_point" placeholder="RSB Point" type="text" class="form-control"  value="<?php echo set_value('rsb_point'); ?>" />
															<span class="text-danger"><?php echo form_error('rsb_point'); ?></span>
														</div>
													</div>
												</div>

												<div class="form-group">
													<div class="row colbox">
														<div class="col-lg-4 col-sm-4">
															<input id="doctor_id" type="hidden" name="doctor_id" value="<?php echo $doctor->doctor_id; ?>">
														</div>
														<div class="col-lg-8 col-sm-8"><!-- the Submit input field -->
														<input class="btn btn-default" type="submit"  name="submit" value="Publish" />
															
														</div>
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
							<!-- Row End-->
						</div>
					</div>	
				</div>
			</div>
			<?php } ?>
			
			*/?>
</div>