<?php if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'admin') { ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
					
					
					<?php //echo "<h3>Welcome " . $username . "</h3>"; ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
								
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
																								
									</div>
                                    <div>Medicine!</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/medicine">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">									
									
									</div>
                                    <div>Shop!</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/shop">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
										
									</div>
                                    <div>Doctors!</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/doctor">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">	
									
									</div>
                                    <div>Blog & News!</div>
                                </div>
                            </div>
                        </div>
                        <a href="admin/blog">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<?php }else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'doctor'){ ?>


    <?php foreach($singleDoctor as $docinfo){?>

        <div class="row">
            <div class="col-md-6">
                <h1>Doctor Info</h1>
            <?php echo form_open('admin/updateDocInfo', 'role="form" class="form-horizontal"'); ?>

                <div class="form-group">
                    <label for="doctor-name" class="control-label col-xs-2">Name:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-name" value="<?php echo $docinfo->doctor_name;?>" id="doctor-name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="doctor-title" class="control-label col-xs-2">Title:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-title" value="<?php echo $docinfo->doctor_title;?>" id="doctor-title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-2" for="doctor-specility">Specialist</label>
                    <div class="col-xs-10">
                    <?php
                        $attributes = 'class="form-control" id="doctor-specility"';
                        echo form_dropdown('form-specility',$specility,set_value('specility'),$attributes);
                    ?>
                        </div>
                </div>


                <div class="form-group">
                    <label for="doctor-gender" class="control-label col-xs-2">Gender:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-gender" value="<?php echo $docinfo->doctor_gender;?>" id="doctor-gender">
                    </div>
                </div>

                <div class="form-group">
                    <label for="doctor-email" class="control-label col-xs-2">Email:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-email" value="<?php echo $docinfo->doctor_email;?>" id="doctor-email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="doctor-bmdc-no" class="control-label col-xs-2">BMDC No.:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-bmdc-no" value="<?php echo $docinfo->doctor_bmdc_no;?>" id="doctor-bmdc-no">
                    </div>
                </div>

                <div class="form-group">
                    <label for="doctor-phone" class="control-label col-xs-2">Phone:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-phone" value="<?php echo $docinfo->doctor_phone;?>" id="doctor-phone">
                    </div>
                </div>

                <div class="form-group">
                    <!-- the District field -->
                    <label class="col-xs-2" for="doctor-dist ">District</label>
                    <div class="col-xs-10">
                        <?php
                        $attributes = 'class="form-control" id="doctor-dist"';
                        echo form_dropdown('doctor-dist',$district,set_value('district'),$attributes);
                        ?>
                        </div>
                </div>

                <div class="form-group">
                    <label for="doctor-address" class="control-label col-xs-2">Address:</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="doctor-address" value="<?php echo $docinfo->doctor_address;?>" id="doctor-address">
                    </div>
                </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <h1>Chember 1 Info</h1>
                        <div class="form-group">

                            <label for="doctor-chamber-1" class="control-label col-xs-2">Address:</label>
                            <div class="col-xs-10">
                                <textarea class="form-control" rows="5" id="doctor-chamber-1" name="doctor-chamber-1"><?php echo $docinfo->doctors_chamber_address_1;?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-11" class="control-label col-xs-2">Saturday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-11" value="<?php echo $docinfo->doctors_chambers_time_11;?>" id="doctor-chamber-time-11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-21" class="control-label col-xs-2">Sunday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-21" value="<?php echo $docinfo->doctors_chambers_time_21;?>" id="doctor-chamber-time-21">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-31" class="control-label col-xs-2">Monday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-31" value="<?php echo $docinfo->doctors_chambers_time_31;?>" id="doctor-chamber-time-31">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-41" class="control-label col-xs-2">Tuesday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-41" value="<?php echo $docinfo->doctors_chambers_time_41;?>" id="doctor-chamber-time-41">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-51" class="control-label col-xs-2">Wednesday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-51" value="<?php echo $docinfo->doctors_chambers_time_51;?>" id="doctor-chamber-time-51">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-61" class="control-label col-xs-2">Thursday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-61" value="<?php echo $docinfo->doctors_chambers_time_61;?>" id="doctor-chamber-time-61">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doctor-chamber-time-71" class="control-label col-xs-2">Friday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-71" value="<?php echo $docinfo->doctors_chambers_time_71;?>" id="doctor-chamber-time-71">
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <h1>Chember 2 Info</h1>
                        <div class="form-group">
                            <label for="doctor-chamber-2" class="control-label col-xs-2">Address:</label>
                            <div class="col-xs-10">
                                <textarea class="form-control" rows="5" id="doctor-chamber-2" name="doctor-chamber-2"><?php echo $docinfo->doctors_chamber_address_2;?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-12" class="control-label col-xs-2">Saturday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-12" value="<?php echo $docinfo->doctors_chambers_time_12;?>" id="doctor-chamber-time-12">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-22" class="control-label col-xs-2">Sunday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-22" value="<?php echo $docinfo->doctors_chambers_time_22;?>" id="doctor-chamber-time-22">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-32" class="control-label col-xs-2">Monday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-32" value="<?php echo $docinfo->doctors_chambers_time_32;?>" id="doctor-chamber-time-32">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-42" class="control-label col-xs-2">Tuesday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-42" value="<?php echo $docinfo->doctors_chambers_time_42;?>" id="doctor-chamber-time-42">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-52" class="control-label col-xs-2">Wednesday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-52" value="<?php echo $docinfo->doctors_chambers_time_52;?>" id="doctor-chamber-time-52">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="doctor-chamber-time-62" class="control-label col-xs-2">Thursday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-62" value="<?php echo $docinfo->doctors_chambers_time_62;?>" id="doctor-chamber-time-62">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="doctor-chamber-time-72" class="control-label col-xs-2">Friday:</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control" name="doctor-chamber-time-72" value="<?php echo $docinfo->doctors_chambers_time_72;?>" id="doctor-chamber-time-72">
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
            <input type="hidden" name="doctor-id" value="<?php echo $docinfo->doctor_id;?>">
                <button type="submit" name="updatedoctor" class="btn btn-default" value="updatedoctor">Update</button>
                <?php echo form_close(); ?>
            </div>

        </div>



    <?php }?>

    <?php
} else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'pharmacist'){ ?>

<?php foreach($singlePharmacist as $pharmainfo){?>

    <div class="row">
        <div class="col-md-6">
            <h1>Pharmacist Info</h1>

            <?php echo form_open('admin/updatePharmaInfo', 'role="form" class="form-horizontal"'); ?>

            <div class="form-group">
                <label for="pharma-name" class="control-label col-xs-2">Name:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-name" value="<?php echo $pharmainfo->pharmacist_name;?>" id="pharma-name">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-title" class="control-label col-xs-2">Title:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-title" value="<?php echo $pharmainfo->pharmacist_title;?>" id="pharma-title">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-gender" class="control-label col-xs-2">Gender:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-gender" value="<?php echo $pharmainfo->pharmacist_gender;?>" id="pharma-gender">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-email" class="control-label col-xs-2">Email:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-email" value="<?php echo $pharmainfo->pharmacist_email;?>" id="pharma-email">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-bmdc-no" class="control-label col-xs-2">BMDC No.:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-reg-no" value="<?php echo $pharmainfo->pharmacist_reg_no;?>" id="pharma-reg-no">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-phone" class="control-label col-xs-2">Phone:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-phone" value="<?php echo $pharmainfo->pharmacist_phone;?>" id="pharma-phone">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-address" class="control-label col-xs-2">Address 1:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-address" value="<?php echo $pharmainfo->pharmacist_contact;?>" id="pharma-address">
                </div>
            </div>

            <div class="form-group">
                <label for="pharma-otheraddress" class="control-label col-xs-2">Address 2:</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" name="pharma-other-address" value="<?php echo $pharmainfo->pharmacist_other_contact;?>" id="pharma-other-address">
                </div>
            </div>
            <input type="hidden" name="pharma-id" value="<?php echo $pharmainfo->pharmacist_id;?>">
                <button type="submit" name="updatepharma" class="btn btn-default" value="updatepharma">Update</button>
                <?php echo form_close(); ?>

        </div>
    </div>
<?php } ?>

<?php

}else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'health-business'){ ?>

<h1>Hello Health Business</h1>
<p> This page is under construction</p>

<?php } else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'fan'){ ?>

<h1>Hello People</h1>
<p> This page is under construction</p>

<?php } ?>





            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->