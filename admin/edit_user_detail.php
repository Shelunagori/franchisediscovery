<?php
include('config.php');
$status='';
$message='';
$id=base64_decode($_GET['id']);
if(isset($_POST['edit']))
{
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$mobile_no=$_POST['mobile_no'];
	$email=$_POST['email'];
	$company_name=$_POST['company_name'];
	$brand_name=$_POST['brand_name'];
	$reg_type=$_POST['reg_type'];
	$employee_id=$_POST['employee_id'];

	$update_user="UPDATE registration set first_name='$first_name',last_name='$last_name',mobile_no='$mobile_no',email='$email',company_name='$company_name',brand_name='$brand_name',reg_type='$reg_type',employee_id='$employee_id' where id='$id'";
	if ($db->query($update_user) === TRUE)
	{
		$status="success";
		$message="updated successfully";
	}
	else
	{
		echo"something went wrong";
	}
}
include('header.php');
?>
<style>

.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }
#exTab1 .tab-content {
color : white;
background-color: #428bca;
padding : 5px 15px;
}

#exTab2 h3 {
color : white;
background-color: #428bca;
padding : 5px 15px;
}
.Profile
{
	margin-left: 158px;
	width:124px;
}
.Request
{
	margin-left: 172px;
}
.Ticket
{
	margin-left: 6px;
	width: 112px;
}
.link{
padding : 5px 15px;
}
.favrouite
{
	margin-left: 10px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
color : white;
background-color: #428bca;
padding : 5px 15px;
}
</style>

	
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
						<div class="form-group">
							<label for="name">First Name</label>
							<input class="form-control" name="first_name" type="text" value='<?php echo $edit_result['first_name']; ?>' >
							<label for="name">Last Name</label>
							<input class="form-control" name="last_name" type="text" value='<?php echo $edit_result['last_name']; ?>' >
							<label for="name">Email</label>
							<input class="form-control" name="email" type="email" value='<?php echo $edit_result['email']; ?>' >
							<label for="name">Mobile No</label>
							<input class="form-control" name="mobile_no" type="text" value='<?php echo $edit_result['mobile_no']; ?>' >
							<label for="name">Company Name</label>
							<input class="form-control" name="company_name" type="text" value='<?php echo $edit_result['company_name']; ?>' >
							<label for="name">Brand Name</label>
							<input class="form-control" name="brand_name" type="text" value='<?php echo $edit_result['brand_name']; ?>' >
							<label for="name">Registration Type</label>
							<input class="form-control" name="reg_type" type="text" value='<?php echo $edit_result['reg_type']; ?>' 	>
							<label for="name">Employee</label>
							<select  name="employee_id" class="form-control select2" style="width: 100%;">
								<option value="">Select Employee</option>
								<?php
									$employee_id=$edit_result['employee_id'];
									$employee_query=mysqli_query($db,"SELECT * FROM employee_master");
									while($employee_row=mysqli_fetch_array($employee_query)){
										if($employee_id == $employee_row['id']){
											echo "<option value=".$employee_row['id']." selected>".$employee_row['name']."</option>";
										}
										else{
											echo "<option value=".$employee_row['id'].">".$employee_row['name']."</option>";
										}
									}
								?>
							</select>
							
							
							
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