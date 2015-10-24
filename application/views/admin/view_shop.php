
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Shop</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				
				<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>
					<th>Shop Name</th>
					<th>Shop Address</th>
					<th>24 Hours</th>
					<th>Cell</th>	
					<th>Home Delivery</th>	
				</tr> 
				</thead>
				<tbody>		
				<?php foreach($shops as $shop){?>
					<tr class="odd gradeX">					
						<td><?php echo $shop->shop_name;?></td>
						<td><?php echo $shop->shop_address;?></td>
						<td><?php echo $shop->twenty_four_hours;?></td>
						<td><?php echo $shop->call;?></td>
						<td><?php echo $shop->home_delivery;?></td>						
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
					</tr>
				<?php }?> 
				</tbody>
				
				</table>		
					<p><a href="new.php">Add a new Shop</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
