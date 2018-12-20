<?php 

require('config.php');
require('header.php');
if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "DELETE FROM contact_brands where id = '$id'";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$message = 'Employee deleted successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}
?>
<style>
	.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }

</style>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-12">
				<?php if(!empty($_SESSION["status"])) 
						{  $status = $_SESSION["status"];
							if($status == 'success')
							{
								$status = 'success';
								$message = 'Brand created successfully !';
							} else if($status == 'fail') {
								$status = 'fail';
								$message = 'Something went wrong !';
							}else if($status == 'delete_success')
							{
								$status = 'success';
								$message = 'Brand deleted successfully !';
							}
							else if($status == 'delete_fail')
							{
								$status = 'fail';
								$message = 'Something went wrong !';
							}
							unset($_SESSION["status"]);	
						} 
						else { $status = ''; }
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
			<div class="col-xs-12">
					  <div class="box">
						<div class="box-header">
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Brands Enquire</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<?php $query=mysqli_query($db,"SELECT * FROM contact_brands order by id DESC ");  
								$sno = 1;
								if(!empty($query)){  ?>
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th>Sno</th>
										<th>Brand</th>
										<th>Name</th>
										<th>Email</th>
										<th>Contact Number</th>
										<th>Date n Time</th>
										<th>Budget</th>
										<th>Message</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php while($row=mysqli_fetch_array($query)){ ?>
									<tr role="row" class="odd">
									  <td> <?php echo $sno; ?> </td>	
										<td>
										<?php $catId = $row['brand_id'];
											$query_cat=mysqli_query($db,"select * from brands where id = '$catId'");
											while($row_cat=mysqli_fetch_array($query_cat)){
											echo $row_cat['name'];  } 
										?>
									  
										</td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['contact_no']; ?></td>
										<td><?php echo $row['date_time']; ?></td>
										<td><?php echo $row['investment_budget']; ?></td>
										<td><?php echo $row['message']; ?></td>
										<td>
											<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="brand_enquire_report.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
											<span class="fa fa-times"></span>
											</a>
										</td>
									</tr>													
									<?php $sno++; } ?>	
								</tbody>
							</table>								
							<?php  } else {  echo 'No Record Found !';  } ?>						
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->
					</div>		
		</div>
	</section>
</div>	

<?php
require('footer.php');
?>