<?php
include('config.php');
$status='';
$message='';
@$id=base64_decode($_GET['id']);
$detail_query="select * FROM registration WHERE id=$id";

include('header.php');
?>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>User Detail</h3>
					</div>
						
					<div class="box-body">
					<form method="post" enctype="multipart/form-data">
					
	<div class="col-md-6">
		<form role="form" method="post" action="#">
			<div class="box">
				
				<?php 
				$edit_query=mysqli_query($db,"select * FROM registration WHERE id=$id");
						while($edit_result=mysqli_fetch_array($edit_query))
						{
				?>
				<div class="box-body">
					<div class="box-body">
						<div class="box-body">
					<?php
						$result=mysqli_query($db,$detail_query);
						while($row=mysqli_fetch_array($result))
						{

					?>
						<div class="col-md-6">
					<div class="form-group">
						<a class="mb-control1 btn btn-info btn-rounded btn-sm pull-right" href="edit_user_detail.php?id=<?php echo base64_encode($id); ?> ">
							<span class="fa fa-edit">Edit Profile</span>
						</a>
					
							<div class="form-group">
								<label class="form-data">First Name:   </label>
								<?= $row['first_name'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Last Name:   </label>
								<?= $row['last_name'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Email:   </label>
								<?= $row['email'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Mobile No:   </label>
								<?= $row['mobile_no'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Company Name:   </label>
								<?= $row['company_name'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Brand Name:   </label>
								<?= $row['brand_name'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Registration Type:   </label>
								<?= $row['reg_type'] ?>
							</div>
							<div class="form-group">
								<label class="form-data">Emoployee:   </label>
								<?php $employee_id= $row['employee_id'] ;
									$employee_query=mysqli_query($db,"select name from employee_master where id=$employee_id");
									$employee_result=mysqli_fetch_array($employee_query);
										echo $employee_result['name'];
								?>
							</div>
							
						</div>
				<?php } ?>
					
					</div>
					</div>
				 </div>
				<?php } ?> 
			</div>

			<div class="box-footer">
			 <button type="submit" class="btn btn-info pull-right" name="edit">Update</button>
			</div>
			
		 </form>
      <!-- /.box -->
  </div> 
					</div>
				</div>
			</div>
		</div>
			<!-- /.box -->
	</section>
</div>



<?php
include('footer.php');
?>