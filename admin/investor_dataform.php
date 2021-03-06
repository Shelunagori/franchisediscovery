<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
	if(isset($_POST['add']))
	{
		$name= mysqli_real_escape_string($db,$_POST['name']);
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$city= mysqli_real_escape_string($db,$_POST['city']);
		$address= mysqli_real_escape_string($db,$_POST['address']);
		$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		$pin_code= mysqli_real_escape_string($db,$_POST['pin_code']);
		$no= mysqli_real_escape_string($db,$_POST['time_frame']);
		$time= mysqli_real_escape_string($db,$_POST['times']);
		$time_frame="$no"."$time";
		$status= mysqli_real_escape_string($db,$_POST['status']);
		$other= mysqli_real_escape_string($db,$_POST['other']);
		$comment= mysqli_real_escape_string($db,$_POST['comment']);
		$reminder= mysqli_real_escape_string($db,$_POST['reminder']);
		$date_on = date('Y-m-d', strtotime($reminder));
		$time_on = date('H:i:s', strtotime($reminder));
		if(!empty($other))
		{
			$response= mysqli_real_escape_string($db,$_POST['other']);
		}
		else
		{
			$response= mysqli_real_escape_string($db,$_POST['response']);
		}
		$Company_name= mysqli_real_escape_string($db,$_POST['company_name']);
	
		$sql="INSERT INTO investor_datas(name,mobile_no,email,city,address,brand_id,pin_code,time_frame,status,company_name,response,created_by,edited_by) VALUES ('$name','$mobile_no','$email','$city','$address','$brand_id','$pin_code','$time_frame','$status','$Company_name','$response','$created_by','$edited_by')";	
		
		if($db->query($sql) === TRUE)
		{
			$investor_query=mysqli_query($db,"SELECT * FROM investor_datas");
			while($inv_result=mysqli_fetch_array($investor_query))
			{
				$investor_data_id=$inv_result['id'];
				
			}
			$inv_rows=mysqli_query($db,"INSERT INTO investor_data_rows(comment,investor_datas_id,date_on,time_on) VALUES ('$comment','$investor_data_id','$date_on','$time_on')");

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
		{
		$name= mysqli_real_escape_string($db,$_POST['name']);
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$city= mysqli_real_escape_string($db,$_POST['city']);
		$address= mysqli_real_escape_string($db,$_POST['address']);
		$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		$pin_code= mysqli_real_escape_string($db,$_POST['pin_code']);
		$time_frame= mysqli_real_escape_string($db,$_POST['time_frame']);
		$status= mysqli_real_escape_string($db,$_POST['status']);
		$response= mysqli_real_escape_string($db,$_POST['response']);
		$company_name= mysqli_real_escape_string($db,$_POST['company_name']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$data_update = "update investor_datas set name='$name',email='$email',mobile_no='$mobile_no',city='$city',address='$address',brand_id='$brand_id',pin_code='$pin_code',time_frame='$time_frame', status='$status',response='$response',company_name='$company_name' where id = '$id'";
			if ($db->query($data_update) === TRUE) {
				
				$status='success';
			}
			 else {
				$status = 'fail';
			}
		}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "DELETE FROM investor_datas where id = '$id'";
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
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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
			<div class="col-md-2">
				<label >Time Frame</label>
				<input type="text" class="form-control" id="time_frame" name="time_frame" placeholder="Enter time">
			</div>
			<div class="col-md-2">	
				<div class="form-group">
					<label >Time</label>
					<select name="times"  class="form-control " >
						<option value="">--Time--</option>
						<option value="minute">Minute</option>
						<option value="hour">Hour</option>
						<option value="day">Day</option>
						<option value="week">Week</option>
						<option value="month">Month</option>
						<option value="year">Year</option>
					</select>
				</div>
			</div> 
		</div>
        <div class="row">
        	<div class="col-md-4">
        		<div class="form-group">
        			<label>Comment</label>
        			<textarea class="form-control" name="comment" id="comment">
        			</textarea>
        		</div>
        	</div>
        	<div class="col-md-4">
				<div class="form-group"><label>Reminder</label>
					<div class='input-group date' id='datetimepicker1'>
						<input type='text' name="reminder" class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
        	</div>
		</div>
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
    </div>
      </form>
	</div>
    </div>
 
</section>
    <!-- /.content -->
   </div>
</div>

   <?php require('footer.php'); ?>
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

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

$(function () {
	$('#datetimepicker1').datetimepicker();
});
 	



</script>
 
    