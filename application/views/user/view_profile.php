	
<section class="signup">
				
			<article class="row">					
			
				<div role="tabpanel" id="main-tab">				
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
				
				  <li role="presentation" class="active"><a href="#doctors" aria-controls="home" role="tab" data-toggle="tab">Sign In</a></li>
				  
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="doctors">
					
							<h4>Log in with your credentials</h4><br/>
							
									 
								<div class="row">
								<div class="col-md-8">
									<form action="<?=  base_url()?>users/login/" method="post">
									<div class="form_settings">
									<p><span>Username</span><input class="" type="text" name="username" value="" /></p>
										<p><span>Password</span><input class="" type="password" name="password" value="" /></p>
										<p><span>User Type</span>
											<select class="form-control" name="user_type">
											<option value="admin">Admin</option>
											<option value="doctor" selected>Doctor</option>
											<option value="pharmacist" >Pharmacist</option>
										</select>
										<p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="add" value="Login" /></p>
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
		</div>
	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>