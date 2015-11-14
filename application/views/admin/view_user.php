
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
					
				<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>			
					<th>Name</th>
					<th>Email</th>
					<th>type</th>
					<th>provider</th>
					<th>provider ID</th>
					<th>Active</th>
					<th>Update/Delete</th>
				 </tr> 
				</thead>
				<tbody>		
				<?php foreach($users as $user){?>
					<tr class="odd gradeX">					
						<td><?php echo $user->social_login_user;?></td>
						<td><?php echo $user->social_login_email;?></td>
						<td><?php echo $user->social_login_user_type;?></td>
						<td><?php echo $user->hybridauth_provider_name;?></td>
						<td><?php echo $user->hybridauth_provider_uid;?></td>
						<td><?php echo $user->published;?></td>
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					</tr>
				<?php }?> 
				</tbody>
				
				</table>
				<p><a href="new.php">Add a new User</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
