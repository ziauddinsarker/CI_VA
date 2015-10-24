<div role="tabpanel" class="tab-pane" id="blog">
			  <!--Blog Post Modal -->
			  
			<?php if($this->session->userdata('user_id')) { ?>
			<div class="row">
				<!-- Trigger the modal with a button -->
				<button type="button" title="Hooray!" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#blog-modal">+</button>

				<!-- Blog Modal -->
				<div id="blog-modal" class="modal fade" role="dialog">
				  <div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>						
					  </div>
					  <div class="modal-body">						
							<legend>Add New Post</legend>							
							<fieldset>
							<?= form_open('home/new_post') ?>
								<div class="form-group">
									<div class="row colbox">
										<div class="col-lg-4 col-sm-4">
											<label for="post_title" class="control-label">Post Title</label>
										</div>
										<div class="col-lg-8 col-sm-8">
											<input id="post_title" name="post_title" placeholder="Enter Title Here" type="text" class="form-control"  value="<?php echo set_value('employeeno'); ?>" />
											<span class="text-danger"><?php echo form_error('post_title'); ?></span>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row colbox">
										<div class="col-lg-4 col-sm-4">
											<label for="post" class="control-label">Post Content</label>
										</div>
										<div class="col-lg-8 col-sm-8">
											<textarea id="post" name="post" placeholder="Enter Content Here" type="textarea" class="form-control"  value="<?php echo set_value('employeename'); ?>">Enter text here...</textarea>
											<span class="text-danger"><?php echo form_error('post'); ?></span>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="row colbox">
										<div class="col-lg-4 col-sm-4">
											
										</div>
										<div class="col-lg-8 col-sm-8"><!-- the Submit input field -->
										<input class="btn btn-default" type="submit"  name="submit" value="Publish" />
											
										</div>
									</div>
								</div>								
							</fieldset>
							
							<?php echo form_close(); ?>
							
							<?php echo $this->session->flashdata('msg'); ?>
							
						
					  </div>

					</div>

				  </div>
				</div>
			</div>
			<?php } ?>			
			  
			  <!-- All Blog and News -->			  
			 <?php foreach($blogs as $blog){?>
				<div class="row">
					<div class="col-md-12">
					<h3><a href="<?=  base_url()?>blog/post/<?= $blog->post_id;?>"> <?php echo $blog->post_title;?></a></h3>
					<!-- <p>Author: </p> -->
					<?php if($this->session->userdata('user_id')) { ?>
					<p>
						<a href="<?=  base_url()?>blog/editpost/<?= $blog->post_id;?>"><span class="glyphicon glyphicon-edit" title="Edit post"></span></a> | 
						<a href="<?=  base_url()?>blog/deletepost/<?= $blog->post_id;?>"><span style="color:#f77;" class="glyphicon glyphicon-remove-circle" title="Delete post"></span></a>
					</p>						
					<?php } ?>
						<p><?php echo $blog->post;?></p>					    
					</div>								
				</div>
			 <?php }?>  
</div>