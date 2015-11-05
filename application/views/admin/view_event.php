
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Events</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				
				<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>			
					<th>Title</th>
					<th>Event Area</th>
					<th>Event On</th>
					<th>Event Date</th>
				 </tr>
				</thead>
				<tbody>
                <?php // admin/getAllPostOfUser ?>
				<?php foreach($events as $event){?>
					<tr class="odd gradeX">					
						<td><?php echo $event->events_name;?></td>
						<td><?php echo $event->events_area;?></td>
						<td><?php echo $event->events_on;?></td>
						<td><?php echo $event->events_date;?></td>

						<td><a href="<?php echo base_url("admin/editEvent"). "/". $event->events_id; ?>">Edit</a> | <a href="<?php echo base_url("admin/deleteEvent"). "/". $event->events_id; ?>">Delete</a></td>
					</tr>
				<?php }?> 
				</tbody>
				
				</table>
								
				<p><a href="<?php echo base_url("admin/addNewEvent") ?>">New Event</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
