<?php
include('config.php');
$status='';
$message='';
@$id=base64_decode($_GET['id']);
$detail_query="select * FROM investor_datas WHERE id=$id";

include('header.php');
?>
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
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Profile</h3>
					</div>
						
					<div class="box-body">
						<form method="post" enctype="multipart/form-data">
							<div class="col-md-6">
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
													<center><h2 class="dot">
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
															$com_query=mysqli_query($db,"SELECT * FROM investor_data_rows WHERE investor_data_id=$id");
															while($com_result=mysqli_fetch_array($com_query))
															{
																echo $com_result['comment'];		
															}
														?>
													</div>
													<div class="form-group">
														<label class="form-data">Reminder </label>
														<?php 
															$rem_query=mysqli_query($db,"SELECT * FROM investor_data_rows WHERE investor_data_id=$id");
															while($rem_result=mysqli_fetch_array($rem_query))
															{
																echo $rem_result['reminder'];		
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
		</div>
	</section>
</div>
<?php
include('footer.php');
?>