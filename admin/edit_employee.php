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
        <div class="col-md-4">
		<form role="form" method="post" action="employee_master.php">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Employee</h3>
					<a href="employee_master.php" class="pull-right"> Add New</a>
				</div>
				<?php 
				$id=base64_decode($_GET['id']); 
				$edit_query=mysqli_query($db,"select * from employee_master where id = '$id' and status =1");
				while($row=mysqli_fetch_array($edit_query)){ ?>
				<div class="box-body">
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input class="form-control" name="name" type="text" placeholder="edit name" value='<?php echo $row['name']; ?>' required>
							<label for="email">Email</label>
							<input class="form-control" name="email" type="email" placeholder="edit email" value='<?php echo $row['email']; ?>' required>
							<label for="mobile_no">Mobile No</label>
							<input class="form-control" name="mobile_no" type="text" placeholder="edit mobile-no" value='<?php echo $row['mobile_no']; ?>' required>
							<label for="name">Department</label>
							<select name="department" class="form-control">
							<?php
							$department_id=$row['department']; 
							$department_query=mysqli_query($db,"SELECT	* FROM department");
							while($department_row=mysqli_fetch_array($department_query)){
								if($department_id == $department_row['id']){
									echo "<option value=".$department_row['id']." selected>".$department_row['name']."</option>";
								}else{
									echo "<option value=".$department_row['id'].">".$department_row['name']."</option>";
								}
									
							}
							?>	
						</select>
							<input class="form-control" name="id" type="hidden" value='<?php echo $id; ?>' required>
					   </div>
					</div>
				 </div>
				<?php } ?> 
			</div>

			<div class="box-footer">
			 <button type="submit" class="btn btn-info pull-right" name="edit">Submit</button>
			</div>
			
		 </form>
      <!-- /.box -->
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
  
 <?php require('footer.php'); ?>
 <script src="<?php echo base_url(); ?>admin_assest/plugins/jQuery/jQuery-2.2.0.min.js"></script>