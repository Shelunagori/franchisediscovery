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
	$date_on = date('Y-m-d', strtotime($reminder));
	$time_on = date('H:i:s', strtotime($reminder));
	$add_comm=mysqli_query($db,"INSERT INTO investor_data_rows(comment,date_on,time_on,investor_datas_id) VALUES ('$comment','$date_on','$time_on','$id')");

}
if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "DELETE FROM investor_data_rows where id = '$id'";
		if ($db->query($delete_query) === TRUE) {
			
			header('location:view_investordata.php?id='.$_GET['investor_id']);
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
		}
	}

include('header.php');
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />

<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<style>
.right
{
	margin-left: 20px;
}
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
																
																 $comment=$com_result['comment'];
												  				 echo wordwrap($comment,20,"<br>\n",TRUE);	
															}
														?>
													</div>
													<div class="form-group">
														<label class="form-data">Reminder </label>
														<?php
														$investor_datas_id=$row['id'];
															$com_query=mysqli_query($db,"SELECT * FROM investor_data_rows WHERE investor_datas_id=$investor_datas_id");
															while($com_result=mysqli_fetch_array($com_query))
															{
																
															$date_on=$com_result['date_on'];	
																$time_on=$com_result['time_on'];	
																echo$reminder="$date_on &nbsp;"."$time_on<br>";	
															}
														?>
													</div>

												</div>
												<?php } ?>
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
												<td><button type="submit" name="add" class="btn btn-primary" style="float:right;">Add</button></td>
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
											<th>Action</th>
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
											<td><?php $comment=$com_result['comment'];
												   echo wordwrap($comment,20,"<br>\n",TRUE);

											?>
											</td>
											<td>
												<?php 
												$date_on=$com_result['date_on'];	
																$time_on=$com_result['time_on'];	
																echo$reminder="$date_on &nbsp;"."$time_on";	
												
												?>
											</td>
											<td>
												<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="view_investordata.php?Action=Del&id=<?php echo base64_encode($com_result['id'])?>&investor_id=<?php echo base64_encode($investor_datas_id) ?>">
													<span class="fa fa-times"></span>
												</a>
														
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
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

 <script>
 $(document).ready(function()
 {
	
$(function () {
	$('#datetimepicker1').datetimepicker();
});
 });
</script>