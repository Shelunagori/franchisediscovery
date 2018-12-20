<?php require('admin/config.php'); 
    
	$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 12;
	$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
	$id = @$_GET['catId'];
	$cname = @$_GET['cname']; 
		$query_brand=mysqli_query($db,"select * from brands where status = 'Active' and category_id = '$id' LIMIT $limit OFFSET $offset");
		if($query_brand->num_rows > 0)
		{	
			while($row_brand=mysqli_fetch_array($query_brand)){ 
		?>
		
			<div class="col-sm-4 col-12">
				<div class="brand-details">
					<h4> <?php echo $row_brand['name']; ?> </h4>
					<div class="brand-details-left">
						<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
						<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_brand['brand_image']); ?>">
						</a>
					</div>
					<div class="brand-details-right">
						<p> <?php echo substr($row_brand['title'],0,75).'...'; ?>, 
							<a href="<?php echo $baseURL; ?>brand-detail/<?php echo $cname; ?>/<?php echo $row_brand['seo_name']; ?>">
								read more 
							</a>
						</p>
					</div>
				  <div class="brand-details-footer"> 
						<button type="button" data-toggle="modal" data-target="#myModal<?php echo base64_encode($row_brand['id']); ?>"  class="btn btn-danger">Contact Brand</button>
						
						<div class="modal fade" id="myModal<?php echo base64_encode($row_brand['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Brand Enquiry</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
										<div class="contact_from">
											<div class="contact_input_area">
												<div id="success_fail_info"></div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<input type="text" name="CB_brandName" id="CB_brandName<?php echo $row_brand['id']; ?>" disabled value="<?php echo $row_brand['name'];  ?>" class="form-control" />
															<input type="hidden" value="<?php echo base64_encode($row_brand['id']); ?>" name="CB_brandValue" id="CB_brandValue<?php echo $row_brand['id']; ?>" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<input type="date" class="form-control" name="CB_date_time" id="CB_date_time<?php echo $row_brand['id']; ?>"    required>
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
														
															<select name="CB_time" id="CB_time<?php echo $row_brand['id']; ?>" class="form-control">
															<option value="8:00 to 9:00" selected>Preferred Time</option>
															<option value="8:00 to 9:00">8:00 to 9:00</option>
															<option value="9:00 to 10:00">9:00 to 10:00</option>
															<option value="10:00 to 1:00">10:00 to 1:00</option>
														</select>
														</div>
													</div>
													<div class="col-md-6 ">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Customer Name"  name="CB_name" id="CB_name<?php echo $row_brand['id']; ?>" required>
														</div>
													</div>
													<div class="col-md-6 ">
														<div class="form-group">
															<input type="Email" name="CB_email" id="CB_email<?php echo $row_brand['id']; ?>" class="form-control "  placeholder="Email " required>
														</div>
													</div>
													<div class="col-md-6 ">
														<div class="form-group">
															<input type="text" required name="CB_contact_no" id="CB_contact_no<?php echo $row_brand['id']; ?>" placeholder="Enter Your Contact Number" class="form-control" />
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<select name="CB_investment_budget" id="CB_investment_budget<?php echo $row_brand['id']; ?>" class="form-control">
															<option value="8:00 to 9:00" selected> Investment Budget</option>
															<option value="8:00 to 9:00">5 Lakhs to 10 Lakhs</option>
															<option value="8:00 to 9:00">10 Lakhs to 20 Lakhs</option>
															<option value="8:00 to 9:00">20 Lakhs to 50 Lakhs</option>
														</select>
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
															<textarea name="CB_message" id="CB_message<?php echo $row_brand['id']; ?>" placeholder="Enter Message" class="form-control"cols="30" rows="3"  required></textarea>
														</div>
													</div>
													<div class="col-12 text-center">
														<button type="button" contactBrand="<?php echo $row_brand['id']; ?>" class="btn bigshop-btn contactBrand" style="padding: 0px;">Send Message</button>
													</div>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>					
					</div>
				</div>
			</div>
		
		<?php } 
		}    ?>
				