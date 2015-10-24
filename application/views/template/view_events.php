<div role="tabpanel" class="tab-pane" id="events">
		<?php if($this->session->userdata('user_id')) { ?>
	  <!-- Events Modal -->
	  <div class="row">
		<!-- Trigger the modal with a button -->
		<button type="button" title="Hooray!" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">+</button>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			  </div>
			  <div class="modal-body">
				<div class="">
					  <legend>Add New Event</legend>
					<?= form_open('home/new_event') ?>
					<fieldset>
						<div class="form-group">
						<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="event_name" class="control-label">Event Name</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<input id="events_name" name="events_name" placeholder="Event Name" type="text" class="form-control"  value="<?php echo set_value('events_name'); ?>" />
									<span class="text-danger"><?php echo form_error('events_name'); ?></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="events_time" class="control-label">Event Time</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<input id="events_time" name="events_time" placeholder="Event Time" type="text" class="form-control"  value="<?php echo set_value('events_time'); ?>" />
									<span class="text-danger"><?php echo form_error('events_time'); ?></span>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="events_address" class="control-label">Event Address</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<input id="events_address" name="events_address" placeholder="Enter Events Address Here" type="text" class="form-control"  value="<?php echo set_value('events_address'); ?>" />
									<span class="text-danger"><?php echo form_error('events_address'); ?></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="events_phone" class="control-label">Event Phone</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<input id="events_phone" name="events_phone" placeholder="Enter Phone Number Here" type="text" class="form-control"  value="<?php echo set_value('events_phone'); ?>" />
									<span class="text-danger"><?php echo form_error('events_phone'); ?></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="events_contact_time" class="control-label">Event Contact TIme</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<input id="events_contact_time" name="events_contact_time" placeholder="Enter Contact Time Here" type="text" class="form-control"  value="<?php echo set_value('events_contact_time'); ?>" />
									<span class="text-danger"><?php echo form_error('events_contact_time'); ?></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="events_email" class="control-label">Event Email</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<input id="events_email" name="events_email" placeholder="Enter Email Here" type="text" class="form-control"  value="<?php echo set_value('events_email'); ?>" />
									<span class="text-danger"><?php echo form_error('events_email'); ?></span>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									<label for="events_content" class="control-label">Post Content</label>
								</div>
								<div class="col-lg-8 col-sm-8">
									<textarea id="events_content" name="events_content" placeholder="Enter Content Here" type="text" class="form-control"  value="<?php echo set_value('events_content'); ?>" /></textarea>
									<span class="text-danger"><?php echo form_error('events_content'); ?></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row colbox">
								<div class="col-lg-4 col-sm-4">
									
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
		<?php } ?>
		
		
		<!-- All Events -->
		<?php foreach($events as $event){?>
			<div class="row event-single">
			<br>
				<div class="col-md-12 banner">
					<img class="img-responsive" src="<?php echo base_url("assets/images/banner-120x728.jpg"); ?>" alt="">
				</div>
			
				<div class="col-md-12">
					<a><h3><?php echo $event->events_name;?></h3></a><sup>By: <?php echo $event->username;?></sup>
					<div class="fb-share-button" data-href="<?php echo site_url();?>"/"<?php echo $event->events_id;?>" data-layout="button_count"></div>
				</div>
				<div class="col-md-4">				
					<h5><b>Events Time:</b> <?php echo $event->events_time;?></h5>							
					<h5><b>Phone: </b><?php echo $event->events_phone;?></h5>
					<h5><b>Email: </b><?php echo $event->events_email;?></h5>					
				</div>
				<div class="col-md-8">			
					<h5><b>Contact Time: </b> <?php echo $event->events_contact_time;?></h5>
					<h5><b>Address: </b><?php echo $event->events_address;?></h5>
				</div>							
			  </div>
		 <?php }?>  				
	
  </div>
