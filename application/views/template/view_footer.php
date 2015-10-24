</div>
    
				</article>


				<article class="row all-top">

							<div class="row top-title">
							<h2>Public Points<sup><i>PP</i></sup></h2>
								<div class="col-md-4">Top Pharmacists</div>
                    			<div class="col-md-4">Top Doctors</div>
                    			<div class="col-md-4">Top Health Businesses</div>
							</div>

							<div class="row top-upper">
								<div class="col-md-4 top-pharmacist top-style">

									<ul>
										<li>Ziauddin Sarker 1<sup><span class="rsb-value"> 0 </span><span class="rsb-text">RSB</span></sup></li>
										<li>Pharmacist 2<sup><span class="rsb-value"> 0 </span><span class="rsb-text">RSB</span></sup></li>
									</ul>
								</div>
								<div class="col-md-4 top-doctor top-style">

									<ul>
										<?php foreach($get_top_ten_doctor as $top_doctor){?>
											<li><a href=""><?php echo $top_doctor->doctor_name ; ?><sup><span class="rsb-value"> <?php echo $top_doctor->RSB;?></span> <span class="rsb-text"> RSB </span></sup></a></li>
										<?php } ?>
									</ul>
								</div>

								<div class="col-md-4 top-doctor top-style">

									<ul>
										<?php foreach($get_top_ten_doctor as $top_doctor){?>
											<li><a href=""><?php echo $top_doctor->doctor_name ; ?><sup><span class="rsb-value"> <?php echo $top_doctor->RSB;?></span> <span class="rsb-text"> RSB </span></sup></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
				</article>
				<!--
				<article>
					<h2>We were seen</h2>
					<div class="slider1">
						<div class="slide"><img src="<?php //echo base_url(); ?>assets/images/nuvista.png"></div>
						<div class="slide"><img src="<?php //echo base_url(); ?>assets/images/nuvista.png"></div>
						<div class="slide"><img src="<?php //echo base_url(); ?>assets/images/nuvista.png"></div>
						<div class="slide"><img src="<?php //echo base_url(); ?>assets/images/nuvista.png"></div>
						<div class="slide"><img src="<?php //echo base_url(); ?>assets/images/nuvista.png"></div>
						<div class="slide"><img src="<?php //echo base_url(); ?>assets/images/Square.png"></div>
					</div>
				</article>

				<article>
					<h2>Our Partners</h2>
					<div class="slider1">
					  <div class="slide"><h1>We Are Looking For Partner</h1></div>
					</div>
				</article>
				-->
			</section>
		</div>

	 	<!--End Container -->	
		<!--Footer Start Here -->

	</div>

	<footer id="footer">
      <div class="container">
<!--
		<div class="row">		
			<div class="col-md-6 footer-navigation">
			 </div>
			<div class="col-md-6 copyright">	
				<p><b>&copy; Bhalo-Aachee - 2015. All Rights Reserved.</b></p>
			</div>
      </div>
      -->
		  <div class="row disclaimer">
			  <p><b>Disclaimer:</b> We provide no guarantee of accuracy of the information on Bhalo-Achee.com. Besides, all the contents herein are to provide information only, and not
				  intended to prevent or treat any disease. Please read more at the About tab.</p>
			  <p><b>Contact Us:</b> Please visit our Facebook (insert link: https://www.facebook.com/BhaloAchee) page to send your private message.</p>

		  </div>
		  </div>
    </footer>
	  <!--Footer Ends Here -->	 
	  
	  <!--include jquery library-->
	<!-- 	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script> 
        <script>window.jQuery || document.write('<script src="<?php //echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"><\/script>')</script>
-->
		
		<script src="<?php echo base_url('assets/js/jquery-1.11.3.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/hogan-3.0.2.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/typeahead.jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bloodhound.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bxslider/jquery.bxslider.min.js'); ?>"></script>

<!--		<script src="--><?php ////echo base_url('assets/js/main.js'); ?><!--"></script>-->

		<script>
			//This is for search option
			var brands = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.whitespace,
				/* datumTokenizer: function(d) {
					return Bloodhound.tokenizers.whitespace(d.tokens.join(' '));
				}, */
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				prefetch: '<?php echo base_url().'search/get_brand_form_strength'; ?>',
				  remote: {
					url: '<?php echo base_url().'search/get_brand_form_strength?name=%QUERY' ?>',
					wildcard: '%QUERY'
				}  
			});
			//brands.initialize();
			$('.table-input .typeahead').typeahead(null, {
				name: 'typeahead',
				valueKey:'brand_name',				
				source: brands.ttAdapter()
				});
		</script>


		<script>
			//This is for we were seen slider
			$(document).ready(function(){
				$('.slider1').bxSlider({
					slideWidth: 200,
					minSlides: 2,
					maxSlides: 5,
					slideMargin: 10
				});
			});
		</script>

		<!-- Get More doctor  -->
		<script>
			/* function filter(type) {
				var url = "http://127.0.0.1/CI_VA/home/give_more_doctor";
				var postdata = {type: type};
				$.post(url, postdata, function(data) {
					var results = JSON.parse(data);
					$('#more-doctor-content-container').html(results);
				});
			}

			filter("All"); //runs at load

			$('#filters input').click(function() {
				var type = $(this).val();
				filter(type);
			}); */
		</script>
		
		
		<script>
			/* $("#doc-description").click(function () {

				$header = $(this);
				//getting the next element
				$content = $header.next();
				//open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
				$content.slideToggle(500, function () {
					//execute this after slideToggle is done
					//change text of header based on visibility of content div
					$header.text(function () {
						//change text based on condition
						return $content.is(":visible") ? "Collapse" : "Expand";
					});
				});

			}); */
		</script>
	
		<script type="text/javascript">
			//Get Healthcare By Category in healthecare tab
			function getHealthcareByCat(catId){     
				var currentValue = catId.id;

				  $.ajax({
						type: "POST",
						url: "<?php echo site_url('home/get_com_by_cat') ?>",
						data: { data: currentValue },
						dataType:'json',
						success: function(result){

						document.getElementById("healthcare_content").style.display = "block";
						document.getElementById("healthcare_content").innerHTML = "";
						var company = $("#healthcare_content");


						// here is a simpe way
						$.each(result, function (i, me) {
							// create a p tag
							// insert it to the 
							// html element with an id of load_company_name
							var div = $('<div/>');
								// you can access the current iterate element
								// of the array
								// me = current iterated object
								// you can access its property using
								// me.company_name or me['company_name']
								//company.innerHTML = company.innerHTML('<p>' + this.company_name + '</p>');
								//company.innerHTML('<p>Company Name: ' + me.company_name + '</p>');
								 div.html('<div class="panel-group" id="accordion">'+
											'<div class="panel panel-default">'+
											'<div class="panel-heading">'+
												'<div class="panel-title">'+
													'<div data-toggle="collapse" data-parent="#accordion" href="#collapse'+ me.company_id+'">' +                       
														'<h4>'+ me.company_name +' <sup>0 RSB (Auto add from history update by admin)<sup></h4>'+
														
														'<p>About (facilities) : '+ me.company_description +'</p>'+
													'</div>'+
												'</div>'+
											'</div>'+
											'<div id="collapse'+ me.company_id+'" class="panel-collapse collapse">'+
												'<div class="panel-body">'+
												
														'<div class="col-md-12 doctor-description">'+							
															
															
															'<div class="col-md-6">'+
															'<p>Phone: '+ me.company_mobile +'</p>'+
																'<p>Email: '+ me.company_email +'</p>'+
																'<p>Address: '+ me.company_address +'</p>'+
																'<p>Website: '+ me.company_website +'</p>'+
															'</div>'+
														'</div>'+
													'<h4>Click To View RSB History<sup>(by admin)</sup></h4>'+
													'<table border="1" style="width:100%">'+
													  '<tr>'+					
														'<td>Date</td>'+		
														'<td>Descriptin</td>'+		
														'<td>RSB Points</td>'+						
													 '</tr>'+
													  
													  '<tr>'+
														'<td>(+Add New Field by Admin)</td>'+
														'<td>+Add New Field by Admin)</td>'+		
														'<td>+Add New Field by Admin)</td>'+								
													  '</tr>'+						  
													'</table>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</div>');
								company.prepend(div); 
								
						});
					},
					error: function() {
						alert('Not OKay');
					}
					
					});
				}

/**********************Doctors Tab Starts ***************************/

			//Get Division On Doctors Tab
			function getDivisionOnDoctorTab(doctorCategory){
				docCategory = doctorCategory.id;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('home/get_division') ?>",
					data: { data: docCategory },
					dataType:'json',
					success: function(result){

						document.getElementById("doctor-tab").innerHTML = "";
						var location = $("#doctor-tab");

						// here is a simpe way
						$.each(result, function (i, division) {

							var div = $('<division/>');

							div.html('<div class="btn-group"  id="division">'+
								'<label class="btn btn-primary">'+
								'<input type="radio" name="division" class="track-order-change" id="'+ division.division_name +'" value="'+ division.division_name +'" onclick="getDistrictOnDoctorTab(this)" >'+ division.division_name +''+
								'</label>' );
							location.prepend(div);

						});
					},
					error: function() {
						alert('Not OKay');
					}

				});
			}

			//Get Districts from Division
			function getDistrictOnDoctorTab(division){
				var currentValue = division.value;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('home/get_district') ?>",
					data: { data: currentValue },
					dataType:'json',
					success: function(result){

						document.getElementById("doctor-tab").innerHTML = "";
						var location = $("#doctor-tab");

						// here is a simpe way
						$.each(result, function (i, districts) {

							var div = $('<division/>');

							div.html('<div class="btn-group"  id="district">'+
							'<label class="btn btn-primary">'+
							'<input type="radio" name="division" class="track-order-change" id="'+ districts.district_name +'" value="'+  districts.district_name +'" onclick="getDoctorsOnDoctorTab(this)" >'+  districts.district_name +''+
							'</label>');
							location.prepend(div);

						});
					},
					error: function() {
						alert('Not OKay');
					}

				});
			}


			//Get Doctors on Doctors Tab from Doctors Category and district
			function getDoctorsOnDoctorTab(district){
				var districtValue = district.value;
				$.ajax({
					type: "POST",
					url: "<?php echo site_url('home/get_doctor') ?>",
					data: { district: districtValue, doctorCategory: docCategory },
					dataType:'json',
					success: function(result){

						document.getElementById("doctor-tab").innerHTML = "";
						var location = $("#doctor-tab");

						// here is a simpe way
						$.each(result, function (i, doctors) {

							var div = $('<div/>');

							div.html('<div class="row doctor-single">' +
								'<div class="col-md-12"><a href="http://127.0.0.1/CI_VA/"><< Back</a>'+
								'<article class="container">'+

							'<div class="row">'+
							'<div class="col-md-4 doctor-info-upper">'+

							'<p>'+ doctors.doctor_name +'<sup>500 PP</sup></p>'+
							'<img src="<?php echo base_url('assets/images/avatar.png');?>" height="90" width="90" alt="Doctor\'s Image">'+
											'<ul class="doctor-info-unorder">'+
											'<li><b>Specialist*:</b> '+ doctors.doctor_category_name +'</li>'+
										'<li><b>Degree*:</b> (input by user)</li>'+
										'<li><b>BMDC no*.:</b> '+ doctors.doctor_bmdc_no +'</li>'+
										'<li><b>New visit fee:</b> (input by user)</li>'+
										'<li><b>Phone/Video call fee:</b> (input by user)</li>'+
										'</ul>'+
										'</div>'+
										'</div>'+

										'<div class="row ">'+
											'<div class="col-md-4 doctor-info-all">'+

											'<div class="row social-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#">fb</a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">tw</a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">copy link</a>'+
										'</div>'+
										'</div>'+

										'<div class="row contact-doctor">'+
											'<div class="col-md-12">'+
											'<a href="#">Contact detail</a>'+
										'</div>'+
										'</div>'+

										'<div class="row contact-doctor-details">'+
											'<ul>'+
											'<li><b>Phone:</b> '+ doctors.doctor_phone +'</li>'+
										'<li><b>Appointment-SMS: e.g.:</b> app, add2</li>'+
										'<li><b>Email:</b> '+ doctors.doctor_email +'</li>'+
										'<li><b>bKash:</b></li>'+
										'<li><b>DBBL Mobile:</b></li>'+
										'</ul>'+
										'</div>'+

										'<div class="row address-doctor">'+
											'<div class="col-md-6">'+
											'<a href="#">Address 1</a>'+
										'</div>'+

										'<div class="col-md-6">'+
											'<a href="#">Address 2</a>'+
										'</div>'+
										'</div>'+

										'<div class="row address-info-doctor">'+
											'<div class="col-md-6">'+
											'<a href="#"></a>'+
											'<br>'+
											'<br>'+
											'<br>'+
											'<br>'+
											'<br>'+
											'</div>'+

											'<div class="col-md-6">'+
											'<a href="#">'+
											'<br>'+
											'<br>'+
											'<br>'+
											'<br>'+
											'<br>'+
											'</a>'+
											'</div>'+
											'</div>'+

											'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#">04 pm - 10 pm</a>'+
										'</div>'+

										'<div class="col-md-4">'+
											'<a href="#">< Saturday ></a>'+
											'</div>'+
											'<a href="#"></a>'+
											'<div class="col-md-4">'+

											'</div>'+
											'</div>'+

											'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">< Sunday ></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+
											'</div>'+

											'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">< Monday ></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+
											'</div>'+

											'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">< Tuesday ></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+
											'</div>'+

											'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">< Wednesday ></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#"> 05 pm – 10 pm</a>'+
										'</div>'+
										'</div>'+

										'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">< Thursday ></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+
											'</div>'+

											'<div class="row day-time-doctor">'+
											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#">< Friday ></a>'+
											'</div>'+

											'<div class="col-md-4">'+
											'<a href="#"></a>'+
											'</div>'+
											'</div>'+

											'<div class="row pp-doctor">'+
											'Click here to see PP details >>'+
										'</div>'+

										'<div class="row doctor-pp">'+
											'<div class="col-md-6">'+
											'<a href="#">By(members Name)</a>'+
										'</div>'+

										'<div class="col-md-6">'+
											'<a href="#">PP</a>'+
											'</div>'+
											'</div>'+
											'</div>'+
											'</div>'+

											'</article>'+

								'</div>'+

								'</div>' );
							location.prepend(div);

						});
					},
					error: function() {
						alert('Not OKay');
					}

				});
			}


/**********************Doctors Tab Ends ***************************/



		//Get Districts from Division
		function getDistrictFromDivision(divisionId){     
				var currentValue = divisionId.value;					
				  $.ajax({
						type: "POST",
						url: "<?php echo site_url('home/get_dist_from_division') ?>",
						data: { data: currentValue },
						dataType:'json',
						success: function(result){
				
						document.getElementById("location").innerHTML = "";
						var location = $("#location");
						
						// here is a simpe way
						$.each(result, function (i, dist) {
					
							var div = $('<division/>');
							
								 div.html('<div class="btn-group"  id="district">'+
								 '<label class="btn btn-primary">'+
								'<input type="radio" name="division" class="track-order-change" id="' + dist.district_id + '" value="' + dist.district_name + '" onclick="getThanaFromDistrict(this)" >'+ dist.district_name +''+
								'</label>' );
								location.prepend(div); 
								
						});
					},
						error: function() {
							alert('Not OKay');
						}
					
					});
				}

				
				//Get Thana from District
				function getThanaFromDistrict(distId){     
						var currentValue = distId.value;					
						  $.ajax({
								type: "POST",
								url: "<?php echo site_url('home/get_thana_from_district') ?>",
								data: { data: currentValue },
								dataType:'json',
								success: function(result){
						
								document.getElementById("location").innerHTML = "";
								var location = $("#location");
								
								// here is a simpe way
								$.each(result, function (i, thana) {
							
									var div = $('<thana/>');
									
										 div.html('<div class="btn-group" id="thana">'+
										 '<label class="btn btn-primary">'+
										'<input type="radio" name="division" class="track-order-change" id="' + thana.thana_id + '" value="' + thana.thana_name + '" onclick="getShopBasedOnThanaAndBrand(this)">'+ thana.thana_name +''+
										'</label>' );
										location.prepend(div); 
										
								});
							},
								error: function() {
									alert('Not OKay');
								}
							
							});
						}

				//Get shop based on thana and brand
				function getShopBasedOnThanaAndBrand(thanaId){     
						var thanaValue = thanaId.value;	
						var brandValue = document.getElementById("name").value;
							
						console.log(thanaValue);
					
						  $.ajax({
								type: "POST",
								url: "<?php echo site_url('home/get_shop_based_on_thana_and_brand') ?>",
								data: { thana: thanaValue, brand: brandValue },
								dataType:'json',
								success: function(result){
						
								document.getElementById("shop-result").innerHTML = "";
								var shop = $("#shop-result");
								
								// here is a simpe way
								$.each(result, function (i, brand) {
							
									var div = $('<div/>');
									
										 div.html('<article class="row medicine-description">' +
													'<div class="col-md-4 medicine-desc-image">' +
														'<img class="img-responsive" src="http://127.0.0.1/CI_VA/assets/images/naftin.jpg" alt="" />' +
													'</div>' +
													'<div class="col-md-4 medicine-result-middle">' +
														'<h5><span class="shop-result-brand_name">Brand Name</span></h5>' +
														'<a href="#">Ace</a> ' +
														'<h5><span class="shop-result-generic-name">Generic name(s)<span></h5>' +
														'<a href="#">[Glimepiride ; Rosiglitazone]</a> ' +
														'<h5><span class="shop-result-manufacturer">Manufacturer’s name</span></h5>' +
														'<a href="#">Square Pharmaceutical Ltd.</a> ' +
													'</div>' +

													'<div class="col-md-4 medicine-result-description">' +
														'<h5><b>Packaging:</b></h5>' +
														'<p>Dosage Form: Syrup<p>' +
														'<p>Strength: 50mg/ml<p>' +
														'<p>Amount: 100ml<p>' +
														'<p>Piece(s): 1<p>' +
														'<p>Manufacturer: Square Pharmacuticals<p>' +
														'<p><b>Retail price(+/-):</b> 100 BDT</p>' +
													'</div>' +
													'</article>' +


											'<article class="row">' +
												'<div class="col-md-4 col-md-offset-1 shop-single">' +
												'<div>shopname: ' + shop.thana_name + '</div>'+

												'</div>' +

												'<div class="col-md-7 medicine-price-graph" id="price-filter">' +
													'<div>' +
																'<h5><a href="#">Brand Name</a><span class="brand-rating"> <a href="">(2)</a></span>' +
																'<br/><a href="#">Company Name</a><span class=" brand-rating company-rating"> <a href="#">(2)</a></span></h5>' +
																'<div class="progress">' +
																'<div class="progress-bar" style="width:20%">' +
																'</div>' +
																'<span>Npa</span>'+
															'</div>' +
														'</div>' +
												 '</div>' +
											 '</article>' );
											shop.prepend(div);
										
								});
							},
								error: function() {
									alert('Not OKay');
								}
							
							});
						}
		</script>
		

    </body>
</html>