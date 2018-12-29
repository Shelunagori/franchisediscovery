<?php
include('config.php');
$status='';
$message='';
@$id=base64_decode($_GET['id']);
$detail_query="select * FROM brand_enquiry WHERE id=$id";

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
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>View Brand Enquiry</h3>
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
														<label class="form-data">Email:   </label>
														<?= $row['email'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Mobile No:   </label>
														<?= $row['mobile_no'] ?>
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
														<label class="form-data">Company Name</label>
														<?= $row['company_name'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Person Name</label>
														<?= $row['consult_person_name'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Brand Origin</label>
														<?= $row['brand_origin'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Landline No</label>
														<?= $row['landline_no'] ?>
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