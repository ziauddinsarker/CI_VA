    <?php foreach($profiles as $profile){ ?>
        <h1>Hello  <?php echo $profile->doctor_name; ?></h1>

        <p><b>Title:</b>  <?php echo $profile->doctor_title; ?></p>
        <p><b>BMDC:</b>  <?php echo $profile->doctor_bmdc_no; ?></p>
    <?php   } ?>



            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->