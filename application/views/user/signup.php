<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/css/form-elements.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css"); ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	

								<?php echo form_open("login/register_new_user",array('class' => 'registration-form','role' => 'form'));?>

                        		<fieldset>
								<input type="hidden" name="Provider" value="<?php echo $soc; ?>">									
								<input type="hidden" name="provider-id" value="<?php echo $user_profile->identifier; ?>">									
										
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Hello! <?php echo $user_profile->displayName; ?></h3>

		                            	
		                        		</div>
		                        		<div class="form-top-right">
										<img src="<?php echo $user_profile->photoURL; ?>" alt="Your Photo">
		                        		
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
									
									<div id="donate">
										<h4>Please choose your profile</h4>
										
										<label class="blue">
											<input id="doctor" name="user-type" type="radio" value="doctor" placeholder="You Are" data="required"/><span>Doctor</span>
										</label>
										<label class="green">
											<input id="pharmacist" name="user-type" type="radio" value="pharmacist" placeholder="You Are" data="required"/><span>Pharmacist</span>
										</label>
										<label class="yellow">
											<input id="health-business" name="user-type" type="radio" value="health-business" placeholder="You Are" data="required"/><span>Health Business</span>
										</label>
										<label class="purple">
											<input id="fan" name="user-type" type="radio" value="fan" placeholder="You Are" data="required"/><span>Fan</span>
										</label>
									</div>
								
				                        <button type="button" class="btn btn-next">Next</button>
				                    </div>
			                    </fieldset>
			                    
			                    <fieldset>
		                        	<div class="form-top">
		                        		<div class="form-top-left">
		                        			<h3>Your Information</h3>
		                        		</div>
		                        		<div class="form-top-right">
		                        			<i class="fa fa-key"></i>
		                        		</div>
		                            </div>
		                            <div class="form-bottom">
									
										<div class="form-group">
				                        	<label class="sr-only" for="form-name">Name</label>
				                        	<input type="text" name="form-name" placeholder="Name..." class="form-name form-control" value="<?php echo $user_profile->displayName; ?>" id="form-name">
				                        </div>
									
									<!--
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="form-email" placeholder="Email..." class="form-email form-control" value="<?php //echo $user_profile->email; ?>" id="form-email">
				                        </div>
										-->

										<div class="form-group">
				                        	<label class="sr-only" for="form-title">Title/Degree</label>
				                        	<input type="text" name="form-title" placeholder="Title/Degree..." class="form-title form-control" id="form-title">
				                        </div>

										<div class="form-group">
											<label class="sr-only" for="form-specility">Specialist</label>
											<?php
												$attributes = 'class="form-control" id="form-specility"';
												echo form_dropdown('form-specility',$specility,set_value('specility'),$attributes);
											?>
										</div>

										<div class="form-group">
				                        	<label class="sr-only" for="form-bmdc">BMDC No</label>
				                        	<input type="text" name="form-bmdc" placeholder="BMDC No..." class="form-bmdc form-control" id="form-bmdc">
				                        </div>
										<!--
										<div class="form-group">
											<label class="sr-only" for="form-dist">District</label>
											<input type="text" name="form-dist" placeholder="District..." class="form-dist form-control" id="form-dist">
										</div>
										-->
										<div class="form-group">
											<!-- the District field -->
											<label class="sr-only" for="form-dist">District</label>
												<?php
												$attributes = 'class="form-control" id="form-dist"';
												echo form_dropdown('form-dist',$district,set_value('district'),$attributes);
												?>
										</div>

										<div class="form-group">
				                        	<label class="sr-only" for="form-pcrn">Pharmacy Council Registration no</label>
				                        	<input type="text" name="form-pcrn" placeholder="Pharmacy Council Reg. No...." class="form-pcrn form-control" id="form-pcrn">
				                        </div>
										
										<div class="form-group">
				                        	<label class="sr-only" for="form-experties">Area of Expertise/Business</label>
				                        	<input type="text" name="form-experties" placeholder="Area of Expertise/Business...." class="form-experties form-control" id="form-experties">
				                        </div>
										
										<div class="form-group">
				                        	<label class="sr-only" for="form-fbpagelink">Facebook Page Link</label>
				                        	<input type="text" name="form-fbpagelink" placeholder="Facebook Page Link...." class="form-fbpagelink form-control" id="form-fbpagelink">
				                        </div>
										

										


										<div class="signup-notice">
											<h5>Notice!!!</h5>
											<p><b>Terms and conditions:</b> By creating your profile on bhalo-achee.com, you confirm that all the
											information you have provided herein are correct. Bhalo-Achee.com team may verify your profile
											information manually to know if you are a doctor or a pharmacist or other health expert or business,
											and deactivate your account if any untrue information is found. Bhalo-Achee.com also reserves the
											right to deactivate your account in the following cases:</p>
											<ul>
											<li>For providing wrong profile information.</li>
												<li>For posting obscene, offensive, racist, threatening, hatred provoking, defaming, extreme, vulgar, illegal and fraudulent contents.</li>
												<li>For Spamming/Advertising/Self-promoting posts.</li>
												<li>For posting copyright-infringing materials without consent of the owner.</li>
												<li>For posting Banglish (writing Bangla words in English/Roman alphabets).</li>
											Please write in either Bangla or English.
											</ul>
										</div>
				                    										
				                        <button type="button" class="btn btn-previous">Previous</button>
										<button type="submit" class="btn">Submit!</button>
				                    </div>
			                    </fieldset>
		                    
		                    </form>
		                    
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

	<!-- Javascript -->		
	<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.backstretch.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/retina-1.1.0.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>

 
		<script type="text/javascript">
			$(function () {
				$("input[name='user-type']").click(function () {
					if ($("#doctor").is(":checked")) {
						$("#form-title").show();
						$("#form-bmdc").show();
						$("#form-dist").show();
						$("#form-experties").hide();
						$("#form-fbpagelink").hide();
						$("#form-pcrn").hide();
						$("#form-specility").show();
					}
					
					if ($("#pharmacist").is(":checked")) {
						$("#form-title").show();
						$("#form-bmdc").hide();
						$("#form-dist").hide();
						$("#form-experties").hide();
						$("#form-fbpagelink").hide();
						$("#form-specility").hide();
						$("#form-pcrn").show();
					}
					
					if ($("#health-business").is(":checked")) {
						$("#form-title").hide();
						$("#form-bmdc").hide();
						$("#form-dist").hide();
						$("#form-experties").show();
						$("#form-fbpagelink").show();
						$("#form-pcrn").hide();
						$("#form-specility").hide();
					}
					
					if ($("#fan").is(":checked")) {
						$("#form-title").hide();
						$("#form-bmdc").hide();
						$("#form-dist").hide();
						$("#form-experties").hide();
						$("#form-fbpagelink").hide();
						$("#form-pcrn").hide();
						$("#form-specility").hide();
					}				
				});
			});
		</script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>