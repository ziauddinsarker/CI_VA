		<section class="signup">
				
			<article class="row">					
			
				<div role="tabpanel" id="main-tab">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				
				  <li role="presentation" class="active"><a href="#doctors" aria-controls="home" role="tab" data-toggle="tab">Register Doctors</a></li>
				  <li role="presentation"><a href="#pharmacist" aria-controls="home" role="tab" data-toggle="tab">Register Pharmacist</a></li>
				  <li role="presentation"><a href="#company" aria-controls="profile" role="tab" data-toggle="tab">Register Healthcare Business</a></li>
				  
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="doctors">
							<?php if (validation_errors()) : ?>
								<div class="col-md-12">
									<div class="alert alert-danger" role="alert">
										<?= validation_errors() ?>
									</div>
								</div>
							<?php endif; ?>




					<div class="row">
						<div class="col-md-6">
						<?php echo form_open("register/register_doctor",array('class' => 'form-horizontal')) ?>


							<!-- the name input field -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="doctor_full_name">Name*</label>
									<div class="col-sm-7">
										<input id="doctor_full_name" class="form-control login_input" type="text" name="doctor_full_name" placeholder="Enter Full Name" required />
									</div>
								</div>

								<!-- the email input field uses a HTML5 email type check -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="doctor_user_email">Email*</label>
									<div class="col-sm-7">
										<input id="doctor_user_email" class="form-control  login_input" type="email" name="doctor_user_email" placeholder="johndoe@example.com" required />
									</div>
								</div>

								<!-- the Title/Degree input field -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="doctor_title">Title/Degree</label>
									<div class="col-sm-7">
										<input id="doctor_title" class="form-control login_input" type="text" name="doctor_title" />
									</div>
								</div>

								<!-- the Specialist input field -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="doctor_specility">Speciality</label>
									<div class="col-sm-7">
										<?php
											$attributes = 'class = "form-control" id = "doctor_specility"';
											echo form_dropdown('specility',$specility,set_value('specility'),$attributes);
										?>
										<span class="text-danger"><?php echo form_error('doctor_specility'); ?></span>
									</div>
								</div>

								<!-- the BDMC input field -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="doctor_bmdc">BMDC No.</label>
									<div class="col-sm-7">
										<input id="doctor_bmdc" class="form-control  login_input" type="text" name="doctor_bmdc" />
									</div>
								</div>

								<div class="form-group">
									<!-- the District field -->
									<label class="control-label col-sm-5" for="doctor_district">District</label>
									<div class="col-sm-7">
										<?php
										$attributes = 'class = "form-control" id = "doctor_district"';
										echo form_dropdown('district',$district,set_value('district'),$attributes);
										?>
										<span class="text-danger"><?php echo form_error('district'); ?></span>
									</div>
								</div>

								<div class="form-group">
									<!-- the user name input field uses a HTML5 pattern check -->
									<label class="control-label col-sm-5" for="doctor_user_name">Username*</label>
									<div class="col-sm-7">
										<input id="doctor_user_name" class="form-control login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="doctor_user_name" required />
									</div>
								</div>

								<div class="form-group">
									<!-- the Password input field -->
									<label class="control-label col-sm-5" for="doctor_user_password_new">Password*</label>
									<div class="col-sm-7">
										<input id="doctor_user_password_new" class="form-control login_input" type="password" placeholder="Password (min. 6 characters)*" name="doctor_user_password_new" pattern=".{6,}" required autocomplete="off" />
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-5" for="doctor_user_password_repeat">Repeat Password*</label>
									<div class="col-sm-7">
										<input id="doctor_user_password_repeat" class="form-control login_input" type="password" placeholder="Repeat password (min. 6 characters)*" name="doctor_user_password_repeat" pattern=".{6,}" required autocomplete="off" />
									</div>
								</div>

								<input id="doctor_user_type" type="hidden" name="doctor_user_type" value="doctor">

								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-7">
										<!-- the Submit input field -->
										<input class="btn btn-default" type="submit"  name="registerDoctor" value="Register Doctor" />

										<button type="submit" class="btn btn-primary" value="doctor" >Submit</button>
									</div>
								</div>
								</form>
							<!-- Form End -->
							</div>
						<!-- Col-md-6 End -->
						</div>
						<!-- row End -->
					</div>
					<!--  Pharmacist Tab -->
					<div role="tabpanel" class="tab-pane" id="pharmacist">
							<?php if (validation_errors()) : ?>
								<div class="col-md-12">
									<div class="alert alert-danger" role="alert">
										<?= validation_errors() ?>
									</div>
								</div>
							<?php endif; ?>
							<?php if (isset($error)) : ?>
								<div class="col-md-12">
									<div class="alert alert-danger" role="alert">
										<?= $error ?>
									</div>
								</div>
							<?php endif; ?>
					
					
					
					<?php echo form_open("register/register_pharmacist",array('class' => 'form-horizontal'));?>

						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<!-- the name input field -->
									<label class="control-label col-sm-5" for="pharmacist_fullname">Name*</label>
									<div class="col-sm-7">
										<input id="pharmacist_fullname" class="form-control login_input" type="text" name="pharmacist_fullname" />
									</div>
								</div>

								<!-- the email input field uses a HTML5 email type check -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="pharmacist_user_email">Email Address</label>
									<div class="col-sm-7">
										<input id="pharmacist_user_email" class="form-control  login_input" type="email" name="pharmacist_user_email" required />
									</div>
								</div>

								<!-- the Title/Degree input field -->
								<div class="form-group">
									<label class="control-label col-sm-5" for="pharmacist_title">Title/Degree</label>
									<div class="col-sm-7">
										<input id="pharmacist_title" class="form-control login_input" type="text" name="pharmacist_title" />
									</div>
								</div>


								<div class="form-group">
									<!-- the user name input field uses a HTML5 pattern check -->
									<label class="control-label col-sm-5" for="pharmacist_user_name">Username</label>
									<div class="col-sm-7">
										<input id="pharmacist_user_name" class="form-control login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="pharmacistuser_name" required placeholder="Username (only letters and numbers, 2 to 64 characters)"/>
									</div>
								</div>

								<div class="form-group">
									<!-- the Password input field -->
									<label class="control-label col-sm-5" for="pharmacist_user_password_new">Password*</label>
									<div class="col-sm-7">
										<input id="pharmacist_user_password_new" class="form-control login_input" type="password" name="pharmacist_user_password_new" pattern=".{6,}" required autocomplete="off" placeholder="Password (min. 6 characters)"/>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-sm-5" for="pharmacist_user_password_repeat">Repeat password</label>
									<div class="col-sm-7">
										<input id="pharmacist_user_password_repeat" class="form-control login_input" type="password" name="pharmacist_user_password_repeat" pattern=".{6,}" required autocomplete="off" placeholder="Repeat password" />
									</div>
								</div>


								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-7">
										<!-- the Submit input field -->
										<input class="btn btn-default" type="submit"  name="registerDoctor" value="Register Doctor" />

									</div>
								</div>
								</form>
							</div>
						</div>


					</div>

					
					<div role="tabpanel" class="tab-pane" id="company">
						<?php echo form_open("register/register_company",array('class' => 'form-horizontal'));?>
						<div class="row">
							<div class="col-md-6">

							<div class="form-group">
							<!-- the name input field -->
								<label class="control-label col-sm-5" for="company_fullname">Name</label>
								<div class="col-sm-7">
									<input id="company_fullname" class="form-control login_input" type="text" name="company_fullname" />
								</div>
							</div>

							<div class="form-group">
								<!-- the email input field uses a HTML5 email type check -->
								<label class="control-label col-sm-5" for="company_user_email">Email Address</label>
								<div class="col-sm-7">
									<input id="company_user_email" class="form-control  login_input" type="email" name="company_user_email" required />
								</div>
							</div>

							<div class="form-group">
								<!-- the Specialist input field -->
								<label class="control-label col-sm-5" for="company_business_type">Area of Expertise/Business</label>
								<div class="col-sm-7">
									<?php
									$attributes = 'class = "form-control" id = "company_business_type"';
									echo form_dropdown('business_type',$business_type,set_value('business_type'),$attributes);?>
									<span class="text-danger"><?php echo form_error('business_type'); ?></span>
								</div>
							</div>

							<div class="form-group">
								<!-- the Address input field -->
								<label class="control-label col-sm-5" for="fb_address">Facebook Page link</label>
								<div class="col-sm-7">
									<input id="fb_address" class="form-control login_input" type="text" name="fb_address"/>
								</div>
							</div>

							<div class="form-group">
								<!-- the user name input field uses a HTML5 pattern check -->
								<label class="control-label col-sm-5"for="company_user_name">Usernames</label>
								<div class="col-sm-7">
									<input id="company_user_name" class="form-control login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" placeholder="Username (only letters and numbers, 2 to 64 characters)" name="company_user_name" required />
								</div>
							</div>
							
							<div class="form-group">
								<!-- the Password input field -->
								<label class="control-label col-sm-5" for="company_user_password_new">Password</label>
								<div class="col-sm-7">
									<input id="company_user_password_new" class="form-control login_input" type="password" name="company_user_password_new" placeholder="Password (min. 6 characters)" pattern=".{6,}" required autocomplete="off" />
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-5" for="company_user_password_repeat">Repeat password</label>
								<div class="col-sm-7">
									<input id="company_user_password_repeat" class="form-control login_input" type="password" name="company_user_password_repeat" pattern=".{6,}" required autocomplete="off" />
								</div>
							</div>
							<!-- the Submit input field -->


							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-7">
									<!-- the Submit input field -->
									<input class="btn btn-default" type="submit"  name="registerCompany" value="Register Healthcare Business" />

								</div>
							</div>

							</form>
								</div>
							</div>
					</div>				  
				</div>
				<!-- Tab panes end -->
			  </div>  
			  
			</article>
			
		</section>

