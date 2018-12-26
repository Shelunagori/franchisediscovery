<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
	@$id=base64_decode($_GET['id']);
	if(!empty($id))
	{
		$sql="SELECT * FROM listing_request WHERE register_id='$id'";
	}
	else
	{
	$sql="SELECT * FROM listing_request";
	}
		if(isset($_GET['ok']))
			{
				$brand_name=$_GET['brand_name'];
				
				if(!$brand_name == null)
				{
					$sql="SELECT * FROM listing_request WHERE brand_name LIKE '%$brand_name%' ";
				}
				
			}
			if(@$_GET["Action"] == "Del")
			{
			 $id = mysqli_real_escape_string($db,base64_decode($_GET['id'])); 
				$delete_query = "DELETE FROM listing_request WHERE id='$id'"; 
					if ($db->query($delete_query) === TRUE) {
						$status = 'success';
						$message = 'Customer deleted successfully !';
					} else {
						$status = 'fail';
						$message = 'Something went wrong !';
					}
			}
?>

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
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Request Listing</h3>
						  
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
					<form method="get" enctype="multipart/form-data">
						<table class='table table-striped'>
							<tr>
								
								<td width="20%">
									<input type="text" name="brand_name" placeholder="Enter brand" class="form-control">
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
								<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Customer Name</th>
												<th>Brand Name</th>
												<th>No of outlets</th>
												<th>Investment Details</th>
												<th>Expansion Plan</th>
												<th>Attachment</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$result=$db->query($sql);
												$count=0;
												while($rows =mysqli_fetch_array($result)){ $count++;
												 ?>
											<tr>
												<td><?php echo $count;?></td>
												<td><?php $customer_id= $rows['register_id'];
												$customer_query=mysqli_query($db,"SELECT * FROM registration WHERE id='$customer_id'");
												while($customer_row=mysqli_fetch_array($customer_query)){	
														echo $customer_row['first_name'];
												}
												?></td>
												<td><?php echo $rows['brand_name']; ?></td>
												<td><?php echo $rows['outlet_qty']; ?></td>
												<td><?php echo $rows['investment_required']; ?></td>
												<td><?php echo $rows['market_area']; ?></td>
												<td>
													<?php if(!empty($rows['file_path'])) { ?>
													<a class="mb-control1 btn btn-rounded btn-sm" href="../<?php echo $rows['file_path']; ?>" target="_blank" >Click Here</a>
													<?php } ?>
												</td>

												
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="listing_request.php?Action=Del&id=<?php echo base64_encode($rows['id']); ?>">
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
       

