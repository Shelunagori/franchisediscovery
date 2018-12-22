<?php 
require('header.php');
require('config.php');

$status = '';
$message = '';
	if(@$_GET["del"] == "del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update enquire set status = 'Deactive' where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Enquire deleted successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}


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
				<?php 	if($status == 'success')
							{
								$status = 'success';
								$message = 'Brand created successfully !';
							} else if($status == 'fail') {
								$status = 'fail';
								$message = 'Something went wrong !';
							}
				if($status == 'success')
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
		</div>
		<div class="row">
			<div class="col-md-12">
					  <div class="box">
						<div class="box-header">
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Enquire Reports</h3>
						</div>
						<div class="box-body">
							
							<div id="exTab2">	
								<ul class="nav nav-tabs">
									<li class="active"><a  href="#1" data-toggle="tab">Franchise </a></li>
									<li><a href="#2" data-toggle="tab">Brand</a></li>
								</ul>
								<div class="tab-content">
								<div class="tab-pane active" id="1">

									<?php $query=mysqli_query($db,"SELECT * FROM enquire where enquire_type = 'franchise' and status = 'Active' order by id DESC ");  
										$sno = 1;
										if(!empty($query)){  ?>
									<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Date</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>City</th>
												<th>Brand Name</th>
												<th>Investment</th>
												<th>Requirement</th>
												<th>Message</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($query)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td> <?php echo $row['enquite_date'];  ?> </td>
												<td> <?php echo $row['name'];  ?> </td>
												<td> <?php echo $row['email'];  ?> </td>
												<td>  <?php echo $row['mobile']; ?></td>
												<td>  <?php echo $row['city']; ?></td>
												<td>  <?php echo $row['brand_name']; ?></td>
												<td>  <?php echo $row['investment']; ?></td>
												<td>  <?php echo $row['requirment']; ?></td>
												<td>  <?php echo $row['message']; ?></td>
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="enquire_report.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>								
									<?php  } else {  echo 'No Record Found !';  } ?>									
								</div>
									<div class="tab-pane" id="2">	
									<?php $query=mysqli_query($db,"SELECT * FROM enquire where enquire_type = 'brand' and status = 'Active' order by id DESC ");  
										$sno = 1;
										if(!empty($query)){  ?>
									<table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Date</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>Brand Name</th>
												<th>Brand Origin</th>
												<th>Message</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($query)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td> <?php echo $row['enquite_date'];  ?> </td>
												<td> <?php echo $row['name'];  ?> </td>
												<td> <?php echo $row['email'];  ?> </td>
												<td>  <?php echo $row['mobile']; ?></td>
												<td>  <?php echo $row['brand_name']; ?></td>
												<td>  <?php echo $row['brand_origin']; ?></td>
												<td>  <?php echo $row['message']; ?></td>
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="enquire_report.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>								
									<?php  } else {  echo 'No Record Found !';  } ?>	
									
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