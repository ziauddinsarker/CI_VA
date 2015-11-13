
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Event</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <?php echo form_open('admin/SaveNewEvent', 'role="form"'); ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="social-usr-id" id="social-usr-id" value="<?php foreach ($sui as $so): ?><?php echo $so['social_login_id']?><?php endforeach; ?>">
                            <label for="event-title">Title:</label>
                            <input type="text" class="form-control" name="event-title" id="event-title">
                        </div>
                        <div class="form-group">
                            <label for="event-area">Business Area:</label>
                            <input type="text" class="form-control" name="event-area" id="event-area">
                        </div>

                        <div class="form-group">
                            <label for="event-phone">Phone:</label>
                            <input type="text" class="form-control" name="event-phone" id="event-phone">
                        </div>

                        <div class="form-group">
                            <label for="event-contact-time">Contact Time:</label>
                            <input type="text" class="form-control" name="event-contact-time" id="event-contact-time">
                        </div>

                        <div class="form-group">
                            <label for="event-email">Email:</label>
                            <input type="text" class="form-control" name="event-email" id="event-email">
                        </div>

                        <div class="form-group">
                            <label for="event-web-or-page">Website/Page Link:</label>
                            <input type="text" class="form-control" name="event-web-or-page" id="event-web-or-page">
                        </div>

                        <div class="form-group">
                            <label for="event-on">Event On:</label>
                            <input type="text" class="form-control" name="event-on" id="event-on">
                        </div>

                        <div class="form-group">
                            <label for="event-date">Event Date:</label>
                            <input type="text" class="form-control" name="event-date" id="event-date">
                        </div>

                        <div class="form-group">
                            <label for="event-time">Event Time:</label>
                            <input type="text" class="form-control" name="event-time" id="event-time">
                        </div>

                    <div class="form-group">
                            <label for="event-location">Event Location:</label>
                            <input type="text" class="form-control" name="event-location" id="event-location">
                        </div>



                        <div class="form-group">
                            <label class="radio-inline"><input type="radio" name="published" value="1">Active</label>
                            <label class="radio-inline"><input type="radio" name="published" value="0">Draft</label>
                        </div>


                        <button type="submit" class="btn btn-default">Submit</button>
                    <?php echo form_close(); ?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
