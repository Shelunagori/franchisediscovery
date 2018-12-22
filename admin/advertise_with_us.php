<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
	$sql="SELECT * FROM advertise_with_us ";
		
		if(isset($_POST['ok']))
			{
				$first_name=$_POST['name'];
				$email=$_POST['email'];
				$company_name=$_POST['company_name'];
				if(!$first_name == null && $email == null && $company_name== null)
				{
					$sql="SELECT * FROM advertise_with_us WHERE name LIKE '%'.$first_name.'%' ";
				}
				else if($first_name == null && !$email == null && $company_name== null)
				{
					$sql="SELECT * FROM advertise_with_us WHERE email LIKE '%'.$email.'%' ";
				}
				else if($first_name == null && $email == null && !$company_name== null)
				{
					$sql="SELECT * FROM advertise_with_us WHERE company_name LIKE '%'.$company_name.'%' ";
				}
				else if(!$first_name == null && !$email == null && !$company_name== null)
				{
					$sql="SELECT * FROM advertise_with_us WHERE company_name LIKE '%'.$company_name.'%' AND name LIKE '%'.$first_name.'%' AND email LIKE '%'.$email.'%'  ";
				}
				
			}
			if(@$_GET["Action"] == "Del")
			{
				$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
				$delete_query = "DELETE FROM advertise_with_us WHERE id='$id'";
					if ($db->query($delete_query) === TRUE) {
						$status = 'success';
						$message = 'deleted successfully !';
					} else {
						$status = 'fail';
						$message = 'Something went wrong !';
					}
			}
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />

<div class="content-wrapper">
    <section class="content">
		
		<div class="row">
		<div class="col-md-12">
			<?php if($status == 'success')
			{ ?>
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $message; ?></strong> 
				</div>
		  <?php }?>
		  <?php if($status == 'fail')
			{ ?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $message; ?></strong> 
				</div>
		  <?php }?>		

		 </div>
			<div class="col-md-12">
					  <div class="box">
						<div class="box-header">
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Advertise With Us</h3>
						  
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
.link{
	padding : 5px 15px;
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
						</div>
						
						<form method="post" enctype="multipart/form-data">
						<table class='table table-striped'>
							<tr>
								<td width="20%">
									<input type="name" name="name" placeholder="Enter name" class="form-control">
								</td>
								<td width="20%">
									<input type="email" name="email" placeholder="Enter email" class="form-control">
								</td>
								<td width="20%">
									<input type="text" name="company_name" placeholder="Enter company name" class="form-control">
								</td>
								<td>
									<button class="btn btn-primary" type="submit" name="ok">Filter</button>
								</td>
							</tr>
						</table>
					</form>
						<div class="box-body">
							
							<div id="exTab2">	
								
								<div class="tab-content">
								<div class="tab-pane active" id="1">
								<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Date Time</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile No</th>
												<th>Pin Code</th>
												<th>Company Name</th>
												<th>Company Location</th>
												<th>Message</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$result=$db->query($sql);
												$count=0;
												while($rows = mysqli_fetch_array($result)){ $count++;
												 ?>
											<tr>
												<td><?php echo $count;?></td>
												<td><?php echo $rows['created_on']; ?></td>
												<td><?php echo $rows['name']; ?></td>
												<td><?php echo $rows['email']; ?></td>
												<td><?php echo $rows['mobile_no']; ?></td>
												<td><?php echo $rows['pincode']; ?></td>
												<td><?php echo $rows['company_name']; ?></td>
												<td><?php echo $rows['company_location']; ?></td>
												<td><?php echo $rows['message']; ?></td>
												
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="advertise_with_us.php?Action=Del&id=<?php echo base64_encode($rows['id']); ?>">
													<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>
											<?php  } ?>
										</tbody>
									</table>								
																	
								</div>
							
								</div>
							</div>						
											
						</div>
					  </div>
					  <!-- /.box -->
					</div>		
		</div>
	</section>
</div>	
<?php
require('footer.php');
?>
 
  <script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
       

