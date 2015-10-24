<?php if($this->session->userdata('user_id') && ($this->session->userdata('user_type') == 'doctor') || $this->session->userdata('user_type') == 'pharmacist')||$this->session->userdata('user_type') == 'business')){ ?>
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
                        <a href="http://localhost/dev_final/deshboard/pages/medicine.php">
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
                        <a href="http://localhost/dev_final/deshboard/pages/shop.php">
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
                        <a href="http://localhost/dev_final/deshboard/pages/doctors.php">
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
                        <a href="http://localhost/dev_final/deshboard/pages/blog.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<?php }else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'admin'){ ?>

<h1>Hello Doctor</h1>
<?php	
}
?>





            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->