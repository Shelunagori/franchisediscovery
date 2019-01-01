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
		<form role="form" method="post" action="investor_dataform.php">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Investor Data</h3>
					<a href="investor_dataform.php" class="pull-right"> Add New</a>
				</div>
				<?php 
				@$id=base64_decode($_GET['id']); 
				$edit_query=mysqli_query($db,"select * from investor_datas where id = '$id'");
				while($row=mysqli_fetch_array($edit_query)){ ?>
				<div class="box-body">
						<div class="col-md-4">
						<div class="form-group">
							<label for="name">Name</label>
							<input class="form-control" name="name" type="text" placeholder="edit name" value='<?php echo $row['name']; ?>' required>
						</div>
					</div>
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
							<label for="name">City</label>
							<input class="form-control" name="city" type="text" placeholder="edit mobile-no" value='<?php echo $row['city']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Address</label>
							<input class="form-control" name="address" type="text" placeholder="edit mobile-no" value='<?php echo $row['address']; ?>' required>
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
							<label for="name">Pin code</label>
							<input class="form-control" name="pin_code" type="text" placeholder="edit mobile-no" value='<?php echo $row['pin_code']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Time Frame</label>
							<input class="form-control" name="time_frame" type="text" placeholder="edit time_frame" value='<?php echo $row['time_frame']; ?>' required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="name">Status</label>
							<select  name="status" class="form-control select2" style="width: 100%;">
								
								<?php
									if($row['status'] == "open")	
									{
										echo"<option value=".$row['status']."selected>".$row['status']."</option>";
									}
									echo"<option value=".$row['status'].">".$row['status']."</option>"
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
							<label for="name">Response</label>
							<select  name="response" class="form-control select2" style="width: 100%;">
								
								<?php
										
									echo"<option value=".$row['response'].">".$row['response']."</option>"
								?>
							</select>
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
  
   
 </section>
</div>
</div>
   
    <!-- /.content -->
  
 <?php require('footer.php'); ?>
 <script src="<?php echo base_url(); ?>admin_assest/plugins/jQuery/jQuery-2.2.0.min.js"></script>