<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
	if(isset($_POST['add']))
	{
		echo$name= mysqli_real_escape_string($db,$_POST['name']);
		echo$email= mysqli_real_escape_string($db,$_POST['email']);
		echo$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		echo$city= mysqli_real_escape_string($db,$_POST['city']);
		echo$address= mysqli_real_escape_string($db,$_POST['address']);
		echo$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		echo$pin_code= mysqli_real_escape_string($db,$_POST['pin_code']);
		echo$no= mysqli_real_escape_string($db,$_POST['time_frame']);
		echo$time= mysqli_real_escape_string($db,$_POST['times']);
		echo$time_frame="$no"."$time";
		echo$status= mysqli_real_escape_string($db,$_POST['status']);
		echo$other= mysqli_real_escape_string($db,$_POST['other']);
		if(!empty($other))
		{
			$response= mysqli_real_escape_string($db,$_POST['other']);
		}
		else
		{
			$response= mysqli_real_escape_string($db,$_POST['response']);
		}
		$Company_name= mysqli_real_escape_string($db,$_POST['company_name']);
	
		echo$sql="INSERT INTO investor_datas(name,mobile_no,email,city,address,brand_id,pin_code,time_frame,status,company_name,response,created_by,edited_by) VALUES ('$name','$mobile_no','$email','$city','$address','$brand_id','$pin_code','$time_frame','$status','$Company_name','$response','$created_by','$edited_by')";	
		
		if($db->query($sql) === TRUE)
		{
			$status = 'success';
			$message = 'Data added successfully !';
		} 
		else 
		{
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
	}
		if(isset($_POST['edit']))
		{$name= mysqli_real_escape_string($db,$_POST['name']);
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$city= mysqli_real_escape_string($db,$_POST['city']);
		$address= mysqli_real_escape_string($db,$_POST['address']);
		$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		$pin_code= mysqli_real_escape_string($db,$_POST['pin_code']);
		$time_frame= mysqli_real_escape_string($db,$_POST['time_frame']);
		$status= mysqli_real_escape_string($db,$_POST['status']);
		$response= mysqli_real_escape_string($db,$_POST['response']);
		$Company_name= mysqli_real_escape_string($db,$_POST['company_name']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
			$data_update = "update employee_master set name = '$name',email='$email',mobile_no='$mobile_no',city='$city',address='$address',brand_id='$brand_id',pin_code='$pin_code',time_frame='$time_frame', status='$status',company_name='$company_name' where id = '$id'";
			if ($db->query($data_update) === TRUE) {
				
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
		$delete_query = "update investor_datas set status ='Deactive' where id = '$id'";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$_SESSION['message'] = 'Data deleted successfully !';
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
		}
	}

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
		<div class="col-md-12">
		<form role="form" method="post" action="" enctype="multipart/form-data">
		<div class="box box-primary">

			<div class="box-header with-border">
			  <h3 class="box-title">Add Investor Data</h3>
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="Name">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="mobile_no">Mobile NO</label>
							<input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter mobile no">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
						</div>
					</div>
					
				<div class="col-md-4">
					<div class="form-group">
						<label for="address">Brand</label>
						<select name="brand_id" multiple class="form-control select2" >
							<option value="">--Select Brand--</option>
							<?php
								$brand_query="SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'";
								$brand_result=mysqli_query($db,$brand_query);
								while($brand_row=mysqli_fetch_array($brand_result))
								{
									echo"<option value=".$brand_row['id'].">".$brand_row['name']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="pin_code">Pin Code</label>
						<input type="text" class="form-control" id="pin_code" name="pin_code" placeholder="Enter pin code">
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status"  class="form-control " >
							<option value="">--Status--</option>
							<option value="open">Open</option>
							<option value="close">Close</option>
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="Company_name">Company Name</label>
						<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="response">Response</label>
						<?php

						?>
						<select name="response" id="response" class="form-control">
							<option value="">Response</option>
							<option value="Good">Good</option>
							<option value="Bad">Bad</option>
							<option value="other">Other</option>
							<input type="text" id="other" name="other" class="form-control">
						</select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="address">Address</label>
						<textarea type="text" class="form-control" id="address" name="address" placeholder="Enter address"></textarea>
					</div>
				</div>   
			<div class="col-md-4">
				
					<div class="form-group">
					<div class="col-md-12">	
						<label>Time Frame</label>
						
						<div class="col-md-6>"
							<input type="text" class="form-control" id="time_frame" name="time_frame" placeholder="Enter time">
						</div>
						<div class="col-md-6">
						<select name="times"  class="form-control " >
							<option value="">--Time--</option>
							<option value="Minute">Minute</option>
							<option value="hour">Hour</option>
							<option value="day">Day</option>
							<option value="week">Week</option>
							<option value="month">Month</option>
							<option value="year">Year</option>
						</select>
						</div>
					</div>
				</div>
			</div>    
        </div>

		
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
      </form>
	</div>
    </div>
      

 
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Investor Data Form</h3>

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
				  <th>City</th>
				  <th>Address</th>
				  <th>Brand</th>
				  <th>Pin Code</th>
				  <th>Time Frame</th>
				  <th>Status</th>
				  <th>Company Name</th>
				  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from investor_datas order by id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php echo $row['city']; ?></td>
							<td><?php echo $row['address']; ?></td>
							<td><?php 
								$brand_id=$row['brand_id'];
									$brand_query=mysqli_query($db,"SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'");
									while($brand_row=mysqli_fetch_array($brand_query))
									{
										echo $brand_row['name'];
									}
							?></td>
							<td><?php echo $row['pin_code']; ?></td>
							<td><?php echo $row['time_frame']; ?></td>
							<td><?php echo $row['status']; ?></td>
							<td><?php echo $row['company_name']; ?></td>
						 
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_investordata.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
							
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="investor_dataform.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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
    <!-- /.content -->
   </div>
</div>

  
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
 <?php require('footer.php'); ?>
 <script>

 $(document).ready(function()
 {
 	$('#other').hide();
 	//$('#other').css('display','none');
 $('#response').on('change',function () {
 	var response= $(this).val();
 	
 	if(response == "other")
 	{
 		$('#other').show();
 		//$('#other').css('display','block');
 	}else{
 		$('#other').hide();
 	}
 });
});

</script>