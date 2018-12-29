<?php 
require('config.php');
require('header.php'); 
$status='';
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-12">
			<?php if($status == 'success')
			{ ?>
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>employee updated successfully !</strong> 
				</div>
		  <?php }?>
		  <?php if($status == 'fail')
			{ ?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>Something went wrong !</strong> 
				</div>
		  <?php }?>		

		  </div>
        <!-- left column -->
       <div class="col-md-12">
		<form role="form" method="post" action="brand_enquiry.php">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Brand Enquiry</h3>
					<a href="brand_enquiry.php" class="pull-right"> Add New</a>
				</div>
				<?php 
				@$id=base64_decode($_GET['id']); 
				$edit_query=mysqli_query($db,"select * from brand_enquiry where id = '$id'");
				while($row=mysqli_fetch_array($edit_query)){ ?>
				<div class="box-body">
						
					<div class="col-md-4">
						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" name="email" type="email" placeholder="edit email" value='<?php echo $row['email']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="mobile_no">Mobile No</label>
							<input class="form-control" name="mobile_no" type="text" placeholder="edit mobile-no" value='<?php echo $row['mobile_no']; ?>' required>
						</div>
					</div>
					
					
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Brand</label>
							<select  name="brand_id" class="form-control select2" style="width: 100%;">
								<option value="">Select Brand</option>
								<?php
									$brand_id=$row['brand_id'];
									$brand_query=mysqli_query($db,"SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'");
									while($brand_row=mysqli_fetch_array($brand_query)){
										if($brand_id == $brand_row['id']){
											echo "<option value=".$brand_row['id']." selected>".$brand_row['name']."</option>";
										}
										else{
											echo "<option value=".$brand_row['id'].">".$brand_row['name']."</option>";
										}
									}
								?>
							</select>
						</div>
					</div>
					
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Company_name</label>
							<input class="form-control" name="company_name" type="text" placeholder="edit mobile-no" value='<?php echo $row['company_name']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Landline No</label>
							<input class="form-control" name="landline_no" type="text" placeholder="edit mobile-no" value='<?php echo $row['company_name']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Brand Origin</label>
							<input class="form-control" name="brand_origin" type="text" placeholder="edit mobile-no" value='<?php echo $row['company_name']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Person Name</label>
							<input class="form-control" name="Person_name" type="text" placeholder="edit mobile-no" value='<?php echo $row['company_name']; ?>' required>
						</div>
					</div>
					
							<input class="form-control" name="id" type="hidden" value='<?php echo $id; ?>' required>
				
				<?php } ?> 
						</div>

			<div class="box-footer">
			 <button type="submit" class="btn btn-info pull-right" name="edit">Submit</button>
			</div>
		 </form>
      <!-- /.box -->
  </div> 
 </div>
  
  <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Brand Enquiry</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="admin/update_Sequence" method="post">
          <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
				  <th>Brand</th>
				  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from brand_enquiry order by id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['company_name'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php 
								$brand_id=$row['brand_id'];
									$brand_query=mysqli_query($db,"SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'");
									while($brand_row=mysqli_fetch_array($brand_query))
									{
										echo $brand_row['name'];
									}
							?></td>
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_login_enquiry.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="view_login_enquiry.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-eye"></span>
								</a>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="brand_enquiry.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
					<?php } ?>
               </tbody>
              </table>
            </form> 
      </div>
      <!-- /.box -->
  </div>
 </section>
</div>
</div>
   
    <!-- /.content -->
  
 <?php require('footer.php'); ?>
 <script src="<?php echo base_url(); ?>admin_assest/plugins/jQuery/jQuery-2.2.0.min.js"></script>