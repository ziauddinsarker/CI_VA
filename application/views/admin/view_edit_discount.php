
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Update Discount</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <?php echo form_open('admin/updateDiscount', 'role="form"'); ?>
        <div class="form-group">
            <label for="discount-title">Title:</label>
            <input type="text" class="form-control" name="discount-title" value="<?php echo $discount_name; ?>" id="discount-title">
        </div>
        <div class="form-group">
            <label for="discount-area">Business Area:</label>
            <input type="text" class="form-control" name="discount-area" value="<?php echo $discount_area; ?>" id="discount-area">
        </div>

        <div class="form-group">
            <label for="discount-on">Discount On:</label>
            <input type="text" class="form-control" name="discount-on" value="<?php echo $discount_on; ?>" id="discount-on">
        </div>


        <div class="form-group">
            <label for="discount-phone">Phone:</label>
            <input type="text" class="form-control" name="discount-phone" value="<?php echo $discount_phone; ?>" id="discount-phone">
        </div>

        <div class="form-group">
            <label for="discount-contact-time">Contact Time:</label>
            <input type="text" class="form-control" name="discount-contact-time" value="<?php echo $discount_contact_time; ?>" id="discount-contact-time">
        </div>

        <div class="form-group">
            <label for="discount-email">Email:</label>
            <input type="text" class="form-control" name="discount-email" value="<?php echo $discount_email; ?>" id="discount-email">
        </div>

        <div class="form-group">
            <label for="discount-web-or-page">Website/Page Link:</label>
            <input type="text" class="form-control" name="discount-web-or-page" value="<?php echo $discount_website_or_page; ?>" id="discount-web-or-page">
        </div>

        <div class="form-group">
            <label for="discount-on">Discount On:</label>
            <input type="text" class="form-control" name="discount-on" value="<?php echo $discount_on; ?>" id="discount-on">
        </div>

        <div class="form-group">
            <label for="discount-duration">Discount Duration:</label>
            <input type="text" class="form-control" name="discount-duration" value="<?php echo $discount_duration; ?>" id="discount-duration">
        </div>


        <div class="form-group">
            <label for="discount-instruction">Discount Instruction:</label>
            <input type="text" class="form-control" name="discount-instruction" value="<?php echo $discount_instruction; ?>"id="discount-instruction">
        </div>

        <input type="hidden" name="discount-id" value="<?php echo $discount_id ?>">
        <button type="submit" name="updatediscount" class="btn btn-default" value="Update">Update</button>
        <button type="button" onclick="location.href='<?php echo site_url('admin/getAllDiscountOfUser') ?>'" class="btn btn-success">Back</button>

        <?php echo form_close(); ?>

    </div>
    <!-- /.col-lg-12 -->
</div>

</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->
