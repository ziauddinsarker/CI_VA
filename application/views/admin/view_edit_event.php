<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Event</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <?php echo form_open('admin/updateEvent', 'role="form"'); ?>
        <div class="form-group">
             <label for="event-title">Title:</label>
            <input type="text" class="form-control" name="event-title" value="<?php echo $event_name; ?>" id="event-title">
        </div>
        <div class="form-group">
            <label for="event-area">Business Area:</label>
            <input type="text" class="form-control" name="event-area" value="<?php echo $event_area; ?>" id="event-area">
        </div>

        <div class="form-group">
            <label for="event-on">Event On:</label>
            <input type="text" class="form-control" name="event-on" value="<?php echo $event_on; ?>" id="event-on">
        </div>

        <div class="form-group">
            <label for="event-date">Event Date:</label>
            <input type="text" class="form-control" name="event-date" value="<?php echo $event_date; ?>" id="event-date">
        </div>
        <div class="form-group">
            <label class="radio-inline"><input type="radio" name="published" value="1">Active</label>
            <label class="radio-inline"><input type="radio" name="published" value="0">Draft</label>
        </div>

        <input type="hidden" name="event-id" value="<?php echo $event_id ?>">
        <button type="submit" name="updateevent" class="btn btn-default" value="Update">Update</button>
        <button type="button" onclick="location.href='<?php echo site_url('admin/getAllEventOfUser') ?>'" class="btn btn-success">Back</button>

        <?php echo form_close(); ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->