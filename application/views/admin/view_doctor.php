
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Doctor</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>			
					<th>Doctors Name</th>
					<th>Doctors Designation</th>
					<th>Doctors Address</th>
					<th>Doctors Category</th>
					 </tr> 
				</thead>
				<tbody>		
				<?php foreach($doctors as $doctor){?>
					<tr class="odd gradeX">					
						<td><?php echo $doctor->doctor_name;?></td>
						<td><?php echo $doctor->doctor_title;?></td>
						<td><?php echo $doctor->doctors_chamber_address_1;?></td>
						<td><?php echo $doctor->doctor_category_name;?></td>
											
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					</tr>
				<?php }?> 
				</tbody>
				
				</table>		
					 
					<p><a href="new.php">Add a new Doctor</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
