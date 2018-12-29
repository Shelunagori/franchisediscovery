<?php
include('config.php');
$status='';
$message='';
@$id=base64_decode($_GET['id']);
$detail_query="select * FROM investor_datas WHERE id=$id";
if(isset($_POST['add']))
{
	$comment=$_POST['comment'];
	$reminder=$_POST['reminder'];
}

include('header.php');
?>
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<style>
.dot {
  height: 55px;
  width: 150px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
</style>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Profile</h3>
					</div>
						
					<div class="box-body">
						<form method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								<div class="box">
									
									<div class="box-body">
										<?php
												$result=mysqli_query($db,$detail_query);
												while($row=mysqli_fetch_array($result))
												{

											?>
											
											<div class="col-md-12">
												<div class="form-group">
													<div class="form-group">
													<center><h2>
														<?= $row['name'] ?>
													</h2></center>
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
														<label class="form-data">City Name:   </label>
														<?= $row['city'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Brand Name:   </label>
														<?php 
															$brand_id=$row['brand_id'];
																$brand_query=mysqli_query($db,"SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'");
																while($brand_row=mysqli_fetch_array($brand_query))
																{
																	echo $brand_row['name'];
																}
														?>
													</div>
													<div class="form-group">
														<label class="form-data">Pin Code  </label>
														<?= $row['pin_code'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Status   </label>
														<?= $row['status'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Company Name</label>
														<?= $row['company_name'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Response</label>
														<?= $row['response'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Address</label>
														<?= $row['address'] ?>
													</div>

													<div class="form-group">
														<label class="form-data">Time Frame</label>
														<?= $row['time_frame'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Comment</label>
														<?php 
															$investor_datas_id=$row['id'];
															$com_query=mysqli_query($db,"SELECT * FROM investor_data_rows WHERE investor_datas_id=$investor_datas_id");
															while($com_result=mysqli_fetch_array($com_query))
															{
																echo $com_result['comment'];		
															
														?>
													</div>
													<div class="form-group">
														<label class="form-data">Reminder </label>
														<?php
															$date_on=$com_result['date_on'];	
																$time_on=$com_result['time_on'];	
																echo$reminder="$date_on &nbsp;"."$time_on";	
															}
														?>
													</div>

												</div>
												<?php } ?>
											</div>	
									</div>
								</div>
							</div>
						</form>
					</div> 

				</div>
			</div>
			<div class="col-md-6">
					<div class="box box-primary">
								<div class="box-header with-border">
				  					<h3 class="box-title">Add</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
										<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				  					</div>
								</div>
								<div class="box-body">
									<div class="form-group">
										<form role="form" method="post" action="#" enctype="multipart/form-data">
											<table>
												<tr>
													<td class="col-md-12">
														<label>comment</label>
														<textarea class="form-control" name="comment" id="comment">
        												</textarea>
													</td>
												</tr>
												<tr>
													<td class="col-md-12">
														<label>Reminder</label>
														<div class='input-group date' id='datetimepicker1'>
															<input type='text' name="reminder" class="form-control" />
															<span class="input-group-addon">
																<span class="glyphicon glyphicon-calendar"></span>
															</span>
														</div>
													</td>
												</tr>
												<tr>
													<td><button type="submit" name="add" class="btn btn-primary pull-right ">Add</button></td>
												</tr>
											</table>
										</form>
									</div>
				 				</div>
				</div>
				<div class="box">
					<div class="box-header">
						
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>List</h3>
					</div>
						
					<div class="box-body">
							
				 				<div class="box-body">
				 				<form method="get" action="favrouite.php?id=<?= $id?>">
				 					<table class="table table-striped">
										<tr>
											<th>S.no</th>
											<th>Comment</th>
											<th>Reminder</th>
										</tr>
											<?php 
											$i=0;
											$investor_datas_id=$id;
											$com_query=mysqli_query($db,"SELECT * FROM investor_data_rows WHERE investor_datas_id=$investor_datas_id");
											while($com_result=mysqli_fetch_array($com_query))
											{
								
												$i++;
											?>
										<tr>
											<td><?= $i ?></td>
											<td><?php echo wordwrap( $com_result['comment'], 20, "<br />\n") ?>
											</td>
											<td>
												<?php 
												$date_on=$com_result['date_on'];	
																$time_on=$com_result['time_on'];	
																echo$reminder="$date_on &nbsp;"."$time_on";	
												
												?>
											</td>
											
										</tr>		
										<?php } ?> 
									</table>
								</form>
				 				</div>
        				</div>
  					</div> 
		</div>
	</section>
</div>
<?php
include('footer.php');
?>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<script>
	
$(function () {
	$('#datetimepicker1').datetimepicker();
});
 
</script>