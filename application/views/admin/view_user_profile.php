
    <?php if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'doctor'){ ?>

        <?php foreach($profiles as $profile){ ?>
            <h1>Hello  <?php echo $profile->doctor_name; ?></h1>

            <p><b>Title:</b>  <?php echo $profile->doctor_title; ?></p>
            <p><b>BMDC:</b>  <?php echo $profile->doctor_bmdc_no; ?></p>
        <?php   } ?>

        <?php
    } else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'pharmacist'){ ?>

        <?php foreach($profiles as $profile){ ?>
            <h1>Hello  <?php echo $profile->pharmacist_name; ?></h1>

            <p><b>Email:</b>  <?php echo $profile->pharmacist_email; ?></p>
            <p><b>Title:</b>  <?php echo $profile->pharmacist_title; ?></p>
            <p><b>Contact:</b>  <?php echo $profile->pharmacist_contact; ?></p>
            <p><b>Other Contact:</b>  <?php echo $profile->pharmacist_other_contact; ?></p>
            <p><b>Phone:</b>  <?php echo $profile->pharmacist_phone; ?></p>
            <p><b>Registration No:</b>  <?php echo $profile->pharmacist_reg_no; ?></p>
        <?php   } ?>



        <?php

    }else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'health-business'){ ?>
        <?php foreach($profiles as $profile){ ?>
            <h1>Hello  <?php echo $profile->health_business_name; ?></h1>

            <p><b>Email:</b>  <?php echo $profile->health_business_email; ?></p>
            <p><b>Experties:</b>  <?php echo $profile->health_business_experties; ?></p>
            <p><b>Facebook Page:</b>  <?php echo $profile->health_business_facebook_link; ?></p>
        <?php   } ?>

    <?php } else if($this->session->userdata('user_id') && $this->session->userdata('user_type') == 'fan'){ ?>

        <?php foreach($profiles as $profile){ ?>
            <h1>Hello  <?php echo $profile->fan_name; ?></h1>
            <p><b>Email:</b>  <?php echo $profile->fan_email; ?></p>
        <?php   } ?>

    <?php } ?>





    </div>
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->