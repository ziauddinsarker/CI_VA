
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Discount</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
				
				<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>			
					<th>Title</th>
					<th>Business Area</th>
					<th>Discount On</th>
					<th>Discount Duration</th>
				 </tr>
				</thead>
				<tbody>
                <?php // admin/getAllPostOfUser ?>
				<?php foreach($discounts as $discount){?>
					<tr class="odd gradeX">					
						<td><?php echo $discount->discount_name;?></td>
						<td><?php echo $discount->discount_area;?></td>
						<td><?php echo $discount->discount_on;?></td>
						<td><?php echo $discount->discount_duration;?></td>

						<td><a href="<?php echo base_url("admin/editDiscount"). "/". $discount->discount_id; ?>">Edit</a> | <a href="<?php echo base_url("admin/deleteDiscount"). "/". $discount->discount_id; ?>">Delete</a></td>
					</tr>
				<?php }?> 
				</tbody>
				
				</table>
								
				<p><a href="<?php echo base_url("admin/addNewDiscount") ?>">New Discount</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
