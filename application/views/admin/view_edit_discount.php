
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
            <label for="discount-duration">Discount Duration:</label>
            <input type="text" class="form-control" name="discount-duration" value="<?php echo $discount_duration; ?>"id="discount-duration">
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
