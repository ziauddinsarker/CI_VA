
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <?php echo form_open('admin/updatePost', 'role="form"'); ?>
                        <div class="form-group">
                           <label for="post-title">Title:</label>
                            <input type="text" class="form-control" name="post-title" value="<?php echo $post_title; ?>" id="post-title">
                        </div>
                        <div class="form-group">
                            <label for="post-description">Body:</label>
                            <textarea class="form-control" rows="5" id="post-description" name="post-description"><?php echo $post_desc ;?></textarea>
                        </div>

                        <input type="hidden" name="post-id" value="<?php echo $post_id ?>">
                        <button type="submit" name="updatepost" class="btn btn-default" value="Update">Update</button>
                    <button type="button" onclick="location.href='<?php echo site_url('admin/getAllPostOfUser') ?>'" class="btn btn-success">Back</button>
                    <?php echo form_close(); ?>

                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
