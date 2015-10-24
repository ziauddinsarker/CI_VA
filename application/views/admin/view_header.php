<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">


<?php if($this->session->userdata('user_id')) {

} else {
	 
	 redirect('login', 'refresh');
	//header("location:  redirect('login', 'refresh');");
}
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Deshboard - Admin Panel</title>

    <!-- Bootstrap Core CSS --><!--link the bootstrap css file-->
    <link href="<?php echo base_url("assets/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/bower_components/metisMenu/dist/metisMenu.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/dist/css/timeline.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/dist/css/sb-admin-2.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/bower_components/morrisjs/morris.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/bower_components/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet" type="text/css" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
				<a class="navbar-brand" href="<?php echo site_url();?>"><img src="<?php echo base_url("assets/images/logo_v4.png"); ?>" height="100" width="80"/></a>
		  
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
           
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="admin/profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="users/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
<?php if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'admin') { ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
				
                    <ul class="nav" id="side-menu">
              
                        <li>
                            <a href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						
                       
                        <li>
                            <a href="<?php echo site_url('admin/medicine');?>"><i class="fa fa-table fa-fw"></i> Medicine </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/shop');?>"><i class="fa fa-edit fa-fw"></i> Shop</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/doctor');?>"><i class="fa fa-wrench fa-fw"></i>Doctors</a>
                        </li>
						 <li>
                            <a href="<?php echo site_url('admin/user');?>"><i class="fa fa-bar-chart-o fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/blog');?>"><i class="fa fa-sitemap fa-fw"></i> Blog</a>
                        </li>
                 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
<?php }elseif($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'doctor') { ?>
			
		<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
				
                    <ul class="nav" id="side-menu">
              
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
				
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Post Blog</a>
                        </li>
						 <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Post Event</a>
                        </li>                       
                 
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>	
			
<?php } ?>
            <!-- /.navbar-static-side -->
        </nav>
		
        <div id="page-wrapper">


