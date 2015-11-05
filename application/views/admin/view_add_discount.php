
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Discount</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <?php echo form_open('admin/SaveNewDiscount', 'role="form"'); ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="social-usr-id" id="social-usr-id" value="<?php foreach ($sui as $so): ?><?php echo $so['social_login_id']?><?php endforeach; ?>">
                            <label for="discount-title">Title:</label>
                            <input type="text" class="form-control" name="discount-title" id="discount-title">
                        </div>
                        <div class="form-group">
                            <label for="discount-area">Business Area:</label>
                            <input type="text" class="form-control" name="discount-area" id="discount-area">
                        </div>

                        <div class="form-group">
                            <label for="discount-on">Discount On:</label>
                            <input type="text" class="form-control" name="discount-on" id="discount-on">
                        </div>

                        <div class="form-group">
                            <label for="discount-duration">Discount Duration:</label>
                            <input type="text" class="form-control" name="discount-duration" id="discount-duration">
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
