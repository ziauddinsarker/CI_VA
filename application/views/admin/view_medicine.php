
          <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Medicine</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">			
				
			<table class="table table-striped table-bordered table-hover" id="dataTables-example"><thead>
				<tr>
					<th>Brand Name</th>
					<th>Company</th>
					<th>Form</th>
					<th>Strength</th>
					<th>Package</th>
					<th>Price</th>
				</tr> 
				</thead>
				<tbody>
				
				<?php foreach($medicines as $medicine){?>		
					
						<tr class="odd gradeX">
						<td><?php echo $medicine->brand_name; ?></td>
						<td><?php echo $medicine->manufacturer_name; ?></td>
						<td><?php echo $medicine->brand_dosage_form_name; ?></td>
						<td><?php echo $medicine->brand_strength_name; ?></td>
						<td><?php echo $medicine->brand_quantity; ?></td>
						<td><?php echo $medicine->brand_price;?></td>
						<!-- <td><a href="#">Edit</a> | <a href="#">Delete</a></td>-->
						<td><a class='btn btn-default btn-info' href="<?=  base_url()?>brand/edit_brand/<?php echo $medicine->brand_id; ?>">Edit</a> <a class='btn btn-default btn-info' href="#">Delete</a> </td>
						</tr>
				 <?php }?>  
				</tbody>
			</table>
					<?php echo $this->pagination->create_links(); ?>
				<p><a href="medicine_new">Add a new Medicine</a></p>
                    
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
