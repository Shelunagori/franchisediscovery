<?php
require('config.php');

$status = '';
$message = '';
	if(isset($_POST['add']))
	{
		$name= mysqli_real_escape_string($db,$_POST['name']);
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$department=mysqli_real_escape_string($db,$_POST['department']);
		$sql="INSERT INTO employee_master(name,email,mobile_no,department) VALUES ('$name','$email','$mobile_no','$department')";	
		
		if($db->query($sql) === TRUE)
		{
			$status = 'success';
			$message = 'Employee added successfully !';
		} 
		else 
		{
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
	}
		if(isset($_POST['edit']))
		{
			$name = mysqli_real_escape_string($db,$_POST['name']);
			$email = mysqli_real_escape_string($db,$_POST['email']);
			$mobile_no = mysqli_real_escape_string($db,$_POST['mobile_no']);
			$department = mysqli_real_escape_string($db,$_POST['department']);
			$id = mysqli_real_escape_string($db,$_POST['id']);
			$employee_update = "update employee_master set name = '$name',email='$email',mobile_no='$mobile_no',department='$department' where id = '$id'";
			if ($db->query($employee_update) === TRUE) {
				
				$status='success';
			}
			 else {
				header('location:edit_employee.php');
				$status = 'fail';
			}
		}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "update employee_master set status = 0 where id = '$id' and status = 1";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$_SESSION['message'] = 'Employee deleted successfully !';
			header('location:employee_master.php'); exit;
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
			header('location:employee_master.php'); exit;
		}
	}
require('header.php');
?>

<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-12">
		<?php if(isset($_SESSION['message'])):?>
		  <?php if($_SESSION['message'] == 'Something went wrong !'):?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></strong> 
				</div>
		  <?php else: ?>	
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></strong> 
				</div>
		  <?php endif; ?>
		<?php endif;?>

		  </div>
        <!-- left column -->
		<div class="col-md-4">
		<form role="form" method="post" action="" enctype="multipart/form-data">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Employee</h3>
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
				<div class="box-body">
					<div class="form-group">
						<label for="Name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="mobile_no">Mobile NO</label>
						<input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter mobile no">
					</div>
					<div class="form-group">
						<label for="department">Department</label>
						<select name="department" class="form-control" required>
						<option value="">Choose Department</option>
						<?php
							$department_query=mysqli_query($db,"SELECT	* FROM department");
							while($department_row=mysqli_fetch_array($department_query)){
								echo "<option value=".$department_row['id'].">".$department_row['name']."</option>";	
							}
						?>	
						</select>
					</div>
					
				 </div>
			</div>       
        </div>

		
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
      </form>
	</div>
      

 
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Employee</h3>

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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
				  <th>Department</th>
				  <th>Edit</th>
				  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from employee_master where status ='1' order by id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php $department_id=$row['department']; 
									  $query_department=mysqli_query($db,"SELECT name FROM department WHERE id=$department_id");
									  while($result_department=mysqli_fetch_array($query_department)){
										  echo $result_department['name'];
									  }
								?></td>
						 
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_employee.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
							</td>
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="employee_master.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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

</div>
</div>
    </section>
    <!-- /.content -->
   </div>
  
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
 <?php require('footer.php'); ?>
