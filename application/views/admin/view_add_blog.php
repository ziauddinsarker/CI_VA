
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <?php echo form_open('admin/SaveNewPost', 'role="form"'); ?>
                        <div class="form-group">
                            <label for="post-title">Title:</label>
                            <input type="text" class="form-control" name="post-title" id="post-title">
                        </div>
                        <div class="form-group">
                            <label for="post-description">Body:</label>
                            <textarea class="form-control" rows="5" id="post-description" name="post-description"></textarea>
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
