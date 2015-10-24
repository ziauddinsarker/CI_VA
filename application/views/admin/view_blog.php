
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				
				<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>			
					<th>Blog Title</th>
					<th>Blog Description</th>	
				 </tr> 
				</thead>
				<tbody>		
				<?php foreach($blogs as $blog){?>
					<tr class="odd gradeX">					
						<td><?php echo $blog->post_title;?></td>
						<td><?php echo $blog->post;?></td>
											
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					</tr>
				<?php }?> 
				</tbody>
				
				</table>
								
				<p><a href="new.php">Add a new Blog</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
