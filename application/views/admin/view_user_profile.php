<?php if($this->session->userdata('user_id') && ($this->session->userdata('user_type') == 'admin')){ ?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
					
					
					<?php //echo "<h3>Welcome " . $username . "</h3>"; ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <?php foreach($profiles as $profile){?>						
						<?php echo $profile->username; ?>
						<?php echo $profile->email; ?>						
				 <?php }?>  
            </div>
			
			
<?php }elseif($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'doctor'){ ?>

    <?php foreach($profiles as $profile){ ?>

        <h1>Hello  <?php echo $profile->username; ?></h1>
        <?php echo $profile->username; ?>
        <?php echo $profile->email; ?>

    <?php } ?>

    <?php
}
?>





            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->