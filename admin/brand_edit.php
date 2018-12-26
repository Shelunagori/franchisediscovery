<?php 
require('header.php');
require('config.php');
$status='';
 ?>
<style>
.gallery > img{
	width: 100px;
    height: 100px;
    padding: 10px;
}
.menu > img{
	width: 200px;
    height: 150px;
    padding: 10px;
}
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
		<?php $brand_id = base64_decode($_GET['rowvalue']);
		
		 $sql = "select brands.id,brands.chart_id,brands.name,brands.title,brands.contact_no,brands.rating,brands.avg_rating,brands.food_type,brands.area_reqired,brands.investment_range,brands.investment_range_in_words,brands.franchise_outlets,brands.brand_image,brands.address,brands.seo_name,brands.footer_content,brands.status,brand_rows.category_id from brands LEFT JOIN brand_rows ON brand_rows.brand_id=brands.id where status = 'Active' and brands.id = '$brand_id' ";
		
			  $query_brand=mysqli_query($db,$sql);
			  
			 $query_brands=mysqli_query($db,$sql);
			 if($query_brands->num_rows > 0){
				 $arrayCategory=array();
				while($row_brands=mysqli_fetch_array($query_brands)){ 
					$arrayCategory[] = $row_brands['category_id'];
					
				}
			 }
			
			 if($query_brand->num_rows > 0)
		     {
				$row_brand=mysqli_fetch_array($query_brand);
		?>
		<form role="form" method="post" action="save_edit_brand.php" enctype="multipart/form-data">
		<input type="hidden" name="brand_id" value="<?php echo $brand_id ?>" />
        <div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create New Brand</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body">
							<div class="box-body">
								<div class="col-md-6">
									<div class="form-group">
										<select name="category_id[]" class="form-control select2" style="width: 100%;" data-placeholder="---Select Category---" multiple="multiple">
											<?php
												$query=mysqli_query($db,"select * from categories where status = 0");
												while($row=mysqli_fetch_array($query)){
											?>
												<option value="<?php echo $row['id']; ?>" <?php 
												foreach($arrayCategory as $a){
													if($a == $row['id']){
														echo 'selected'; 
													}
												}?>>
												<?php echo $row['name']; ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<input class="form-control" name="name" type="text" placeholder="Brand Name" value='<?php echo $row_brand['name'];?>' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="rating" type="number" placeholder="500+ Rating" value='<?php echo $row_brand['rating'];?>' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="avg_rating" type="text" placeholder="Average Rating" value='<?php echo $row_brand['avg_rating'];?>' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="area_reqired" type="number" placeholder="Area Required" value='<?php echo $row_brand['area_reqired'];?>' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="franchise_outlets" type="number" placeholder="Franchise Outlets" value='<?php echo $row_brand['franchise_outlets'];?>' required>
									</div>
									
									<div class="form-group">
										<input class="form-control" name="investment_range" type="number" placeholder="Investment Range" value='<?php echo $row_brand['investment_range'];?>' required>
									</div>
									
									<div class="form-group">
										<input class="form-control" name="investment_range_in_words" type="text" placeholder="Investment Range (In Words) " value='<?php echo $row_brand['investment_range_in_words'];?>' required>
									</div>
									
								</div>
								<div class="col-md-6">	
									<div class="form-group">
										<input class="form-control" name="address" type="text" placeholder="Address" value='<?php echo $row_brand['address'];?>' required>
									</div>
									<div class="form-group">
										<select name="chart_id" class="form-control select2" style="width: 100%;">
										  <option value='' selected="selected">Select Chart</option>
											<?php
												$query_chart=mysqli_query($db,"select * from chart");
												while($rowChart=mysqli_fetch_array($query_chart)){
											?>
												<option value="<?php echo $rowChart['id']; ?>" <?php if($rowChart['id'] == $row_brand['chart_id']) { echo 'selected';  }  ?>    ><?php echo $rowChart['name']; ?></option>
											<?php } ?>
										</select>
									</div>								
									<div class="form-group">
										<input class="form-control" name="description" type="text" placeholder="Short Description" value='<?php echo $row_brand['title'];?>' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="contact_no" type="number" placeholder="Contact No" value='<?php echo $row_brand['contact_no'];?>' required>
									</div>
									<div class="form-group" style="padding-top: 8px;">
										<label>
											<input type="radio" name="food_type" value="Veg" class="flat-red" <?php if($row_brand['food_type'] == 'Veg'){ echo 'checked'; } ?>>
											Veg
										</label>
										<label style="margin-left: 30px;">
											<input type="radio" name="food_type" value="Non-Veg" <?php if($row_brand['food_type'] == 'Non-Veg'){ echo 'checked'; } ?> class="flat-red">
											Non-Veg
										</label>
										<label style="margin-left: 30px;">
											<input type="radio" name="food_type" value="Non + Veg Both" class="flat-red" <?php if($row_brand['food_type'] == 'Non + Veg Both'){ echo 'checked'; } ?> >
											Non + Veg Both
										</label>
									</div>
									<div class="form-group">
										  <label for="exampleInputFile">Brand Image</label>
										  <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
										    <?php $path = ''; 
												if(!empty($row_brand['brand_image'])) 
												{ $path = $row_brand['brand_image']; } 
												else { $path = 'admin_assest/img/icon.ico';  }
											?>
										  
										  <img src="<?php echo $path;?>" width="172" height="183"  id="img_prev" style="float:right;margin-top: -46px;" />
									</div>
									
								</div>
							</div>
						</div>
				</div> 
			</div>

        <div class="col-md-12">
			<div class="box box-warning">
				<div class="box-header with-border">
				  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Menu Details</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						  <i class="fa fa-minus"></i>
						</button>
				  </div>
				</div>
				<div class="box-body">
					<div class="box-body">
						<div class="form-group">
							<label>Upload menu pdf</label>  (Select multiple pdf files)	
							<input type="file" name="menudetail[]" accept="application/pdf" multiple id="menu-photo-add">
						</div>	
						
						<div class="menu">
							<?php $menu_sql = mysqli_query($db,"SELECT * from brand_menu_images where brand_id = '$brand_id'  ");
									if(!empty($menu_sql))
									{
									while($menu_gallery = mysqli_fetch_array($menu_sql)){ 
									if (strpos($menu_gallery['image_path'], '.pdf') !== false) { ?>

										<img src="admin_assest/img/pdficon.png" width="172" height="183"  id="img_prev<?php echo $menu_gallery['id']; ?>"  />
										
										<a href="#" class="menuLinks" id=<?php echo $menu_gallery['id']; ?> style="font-size: 30px;margin-left: -21px;color: red;position: absolute;top: 112px;">×</a>
									<?php }else{ ?>
										<img src="<?php echo $menu_gallery['image_path']; ?>" width="172" height="183"  id="img_prev<?php echo $menu_gallery['id']; ?>"  />
										
										<a href="#" class="menuLinks" id=<?php echo $menu_gallery['id']; ?> style="font-size: 30px;margin-left: -21px;color: red;position: absolute;top: 112px;">×</a>
										
									<?php }	} } else { echo '<center>No menu card found</center>';  } ?>
						</div>
					</div>
				</div>
			</div> 
		</div>					
		<div class="col-md-12">
			<div class="box box-warning">
				<div class="box-header with-border">
				  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Brand Menu Details</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						  <i class="fa fa-minus"></i>
						</button>
				  </div>
				</div>
				<div class="box-body">
				<?php $no = 0; $count = 0;
				$brandDetail = mysqli_query($db,"select * from brand_details where brand_id = '$brand_id' ");
				if(!empty($brandDetail))
				{
					while($row_detail=mysqli_fetch_array($brandDetail)){ 
					$brand_detail_id = $row_detail['id'];
					if($row_detail['is_gallery'] == 'No') {
				?>
					<div class="col-md-6">
						<div class="form-group">
							<label>Menu Name</label>
							<input type="hidden" name="brand_details[<?php echo $no;?>][id]" value="<?php echo $row_detail['id']; ?>" />
							<input class="form-control" name="brand_details[<?php echo $no;?>][left_menu_name]" type="text" placeholder="Menu name" value='<?php echo $row_detail['left_menu_name']; ?>'>
						</div>
						<div class="form-group">
							<div class="box-body pad">
							<?php if($row_detail['left_menu_name'] == "ROI"){ ?>
								<label>Upload ROI pdf/excel/word</label>  (Select pdf/excel/word files)	
								<input type="file" name="brand_details[1][content]" accept="application/pdf,application/msword, application/vnd.ms-excel" id="roi-photo-add">
								<input type="hidden" name="brand_details[1][content_old]" value="<?php echo $row_detail['content']; ?>">
								<div class="roi">
									<?php  
									if (strpos($row_detail['content'], '.pdf') !== false) { ?>

										<img src="admin_assest/img/pdficon.png" style="height:120px"   />
										
										<a href="<?php echo $row_detail['content']; ?>" target="_blank"></a>
									<?php }else if (strpos($row_detail['content'], '.xls') !== false || strpos($row_detail['content'], '.xlsx') !== false){ ?>
									
										
										
										<a href="<?php echo $row_detail['content']; ?>" target="_blank"><img src="admin_assest/img/Excel.png" style="height:120px"  /></a>
										
									<?php }else if (strpos($row_detail['content'], '.doc') !== false || strpos($row_detail['content'], '.docx') !== false){ ?>
									
										<img src="admin_assest/img/word-icon-png-6.png" style="height:120px" />
										
										<a href="<?php echo $row_detail['content']; ?>" target="_blank"></a>
										
					<?php } else { echo '<center>No menu card found</center>';  } ?>
								
								
								
								</div>
							<?php }else{ ?>
								<textarea id="editor1" name="brand_details[<?php echo $no;?>][content]" rows="10" cols="80">
									<?php echo $row_detail['content']; ?>
								</textarea>
							<?php } ?>
								
							</div>
						</div>
						<?php  if($row_detail['is_country'] == 'Yes') { ?>
						<div class="form-group">
							<select name="brand_details[<?php echo $no;?>][brand_country][<?php echo $count;?>][country_id][]" multiple="multiple" data-placeholder="Select Country" class="form-control select2" style="width: 100%;">
									<?php 
									$brand_country=mysqli_query($db,"select * from country");
									while($rowCountry=mysqli_fetch_array($brand_country)){
										$query=mysqli_query($db,"SELECT * FROM brand_country where brand_id = '$brand_id' and brand_detail_id = '$brand_detail_id' ");
										while($row=mysqli_fetch_array($query)){
										$brand_country_id = $row['id'];
										?>		
										
										<?php if($rowCountry['id'] ==  $row['country_id']) { ?> 
										<option value="<?php echo $rowCountry['id']; ?>" selected>
											<?php echo $rowCountry['name']; ?>
										</option>										
										<?php } else  { ?>
										
										<option value="<?php echo $rowCountry['id']; ?>" >
											<?php echo $rowCountry['name']; ?>
										</option>
										<?php } } } ?>
							</select>
							
						</div>
						<?php } ?>
						
						
						
						
						<?php  if($row_detail['is_city'] == 'Yes') {  ?>

						<div class="form-group">
							<select name="brand_details[<?php echo $no;?>][brand_state][<?php echo $count;?>][state_id][]" multiple="multiple" data-placeholder="Select State" class="form-control select2" style="width: 100%;">
								<?php
									$query=mysqli_query($db,"select * from state");
									while($row=mysqli_fetch_array($query)){
									$q_state = mysqli_query($db,"SELECT * FROM brand_state where brand_id = '$brand_id' and brand_detail_id = '$brand_detail_id'");
									while($rowData=mysqli_fetch_array($q_state)){
										$brand_state_id = $rowData['id'];
									if($rowData['state_id'] ==  $row['id']) { ?> 
											<option value="<?php echo $row['id']; ?>" selected>
												<?php echo $row['name']; ?>
											</option>										
									<?php }  ?>
									<?php } ?>
											<option value="<?php echo $row['id']; ?>" >
												<?php echo $row['name']; ?>
											</option>
									<?php } ?>
							</select>
							
						</div>						
						
						<div class="form-group">
							<select name="brand_details[<?php echo $no;?>][brand_city][<?php echo $count;?>][city_id][]" multiple="multiple" data-placeholder="Select City" class="form-control select2" style="width: 100%;">
								<?php
									$query1=mysqli_query($db,"select * from cities ");
									while($row1=mysqli_fetch_array($query1)){
									$q_city = mysqli_query($db,"SELECT * FROM brand_city where brand_id = '$brand_id' and brand_detail_id = '$brand_detail_id'");
									while($rowData1=mysqli_fetch_array($q_city)){
										
								?>
									<?php if($rowData1['city_id'] ==  $row1['id']) { ?> 
										<option value="<?php echo $row1['id']; ?>" selected>
											<?php echo $row1['name']; ?>
										</option>										
										<?php } else  { ?>
										<option value="<?php echo $row1['id']; ?>" >
											<?php echo $row1['name']; ?>
										</option>
									<?php }   ?>
								<?php } } ?>
							</select>
							
						</div>
						
						<?php } ?>
						
						
					</div>
					<?php $no++;  $count++; } } } ?>	
				</div> 
			</div>
		</div>
	
		
        <div class="col-md-12">
			<div class="box box-warning">
				<div class="box-header with-border">
				  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Gallery</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						  <i class="fa fa-minus"></i>
						</button>
				  </div>
				</div>
				<div class="box-body">
					<div class="box-body">
						<div class="form-group">
							<label>Upload gallery images</label>  (Select multiple images)	
							<input type="file" name="upload[]" multiple id="gallery-photo-add">
						</div>	
						<div class="gallery">
						<?php
						$gallery_sql = mysqli_query($db,"SELECT * from brand_gallery where brand_id = '$brand_id'  ");
						if(!empty($gallery_sql))
						{
						while($gallery = mysqli_fetch_array($gallery_sql)){ 
						?> 
							<img src="<?php echo $gallery['gallery_image_path']; ?>" width="172" height="183"  id="gallery_prev<?php echo $gallery['id']; ?>"  />
										
							<a href="#" class="galleryLinks" id=<?php echo $gallery['id']; ?> style="font-size: 30px;margin-left: -22px;color: red;position: absolute;top: 112px;">×</a>
						<?php }  
						}?>
						</div>
					</div>
				</div>
			</div> 
		</div>		

		        <div class="col-md-12">
			<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Footer Content</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>					
					<div class="box-body">
						<div class="box-body">
							<div class="form-group">
								<div class="box-body pad">
									<textarea id="editor1" name="footer_content" rows="10" cols="80"><?php echo $row_brand['footer_content'];?></textarea>
								</div>
							</div>
						</div>
					</div>					
			</div> 
		</div>

<?php

$query_seo=mysqli_query($db,"SELECT * FROM page_seo where page_id = '3' and brand_id = '$brand_id' ");  
	if($query_seo->num_rows > 0)
	{ 

	while($row_seo=mysqli_fetch_array($query_seo)){ ?>	   
		<input type="hidden" name="seo_id" value="<?php echo $row_seo['id']; ?>" />
        <div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Update SEO</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body">
							<div class="box-body">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputFile">Meta Description</label>
										<textarea  name="meta_description" rows="2" cols="80"><?php echo $row_seo['meta_description']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Keywords</label>
										<textarea  name="meta_keywords" rows="2" cols="80"><?php echo $row_seo['meta_keywords']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Robots</label>
										<textarea  name="meta_robots" rows="2" cols="80"><?php echo $row_seo['meta_robots']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Abstract</label>
										<textarea  name="meta_abstract" rows="2" cols="80"><?php echo $row_seo['meta_abstract']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Topic</label>
										<textarea  name="meta_topic" rows="2" cols="80"><?php echo $row_seo['meta_topic']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Meta URL</label>
										<textarea  name="meta_url" rows="2" cols="80"><?php echo $row_seo['meta_url']; ?></textarea>
									</div>


									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Name</label>
										<textarea  name="g_name" rows="2" cols="80"><?php echo $row_seo['g_name']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Description</label>
										<textarea  name="g_description" rows="2" cols="80"><?php echo $row_seo['g_description']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Image</label>
										<textarea  name="g_image" rows="2" cols="80"><?php echo $row_seo['g_image']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Twitter Description</label>
										<textarea  name="t_description" rows="2" cols="80"><?php echo $row_seo['t_description']; ?></textarea>
									</div>
							
								</div>
								<div class="col-md-6">	
									<div class="form-group" style="margin-bottom: 10px;">
										<label for="exampleInputFile">Page Title</label>
										<textarea name="title" rows="2" cols="80"><?php echo $row_seo['title']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Title</label>
										<textarea  name="og_title" rows="2" cols="80"><?php echo $row_seo['og_title']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">OG Type</label>
										<textarea  name="og_type" rows="2" cols="80"><?php echo $row_seo['og_type']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">OG URL</label>
										<textarea  name="og_url" rows="2" cols="80"><?php echo $row_seo['og_url']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Image</label>
										<textarea  name="og_image" rows="2" cols="80"><?php echo $row_seo['og_image']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Description</label>
										<textarea  name="og_description" rows="2" cols="80"><?php echo $row_seo['og_description']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">OG Site Name</label>
										<textarea  name="og_site_name" rows="2" cols="80"><?php echo $row_seo['og_site_name']; ?></textarea>
									</div>


									<div class="form-group">
										<label for="exampleInputFile">FB Admins</label>
										<textarea  name="fb_admins" rows="2" cols="80"><?php echo $row_seo['fb_admins']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Canonical</label>
										<textarea  name="canonical" rows="2" cols="80"><?php echo $row_seo['canonical']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Twitter Title</label>
										<textarea  name="t_name" rows="2" cols="80"><?php echo $row_seo['t_title']; ?></textarea>
									</div>
									
										
									<div class="form-group">
										<label for="exampleInputFile">Twitter Image</label>
										<textarea  name="t_image" rows="2" cols="80"><?php echo $row_seo['t_image']; ?></textarea>
									</div>
								</div>
							</div>
						</div>
				</div> 
			</div>
		<?php  } 		
			}else
			{ ?>
				
		<input type="hidden" name="seo_id" value="0" />
        <div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create SEO</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body">
							<div class="box-body">
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputFile">Meta Description</label>
										<textarea  name="meta_description" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Keywords</label>
										<textarea  name="meta_keywords" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Robots</label>
										<textarea  name="meta_robots" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Abstract</label>
										<textarea  name="meta_abstract" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Topic</label>
										<textarea  name="meta_topic" rows="2" cols="80"></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Meta URL</label>
										<textarea  name="meta_url" rows="2" cols="80"></textarea>
									</div>


									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Name</label>
										<textarea  name="g_name" rows="2" cols="80"></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Description</label>
										<textarea  name="g_description" rows="2" cols="80"></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Image</label>
										<textarea  name="g_image" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Twitter Description</label>
										<textarea  name="t_description" rows="2" cols="80"></textarea>
									</div>
							
								</div>
								<div class="col-md-6">	
									<div class="form-group" style="margin-bottom: 10px;">
										<label for="exampleInputFile">Page Title</label>
										<textarea name="title" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Title</label>
										<textarea  name="og_title" rows="2" cols="80"></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">OG Type</label>
										<textarea  name="og_type" rows="2" cols="80"></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">OG URL</label>
										<textarea  name="og_url" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Image</label>
										<textarea  name="og_image" rows="2" cols="80"></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Description</label>
										<textarea  name="og_description" rows="2" cols="80"></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">OG Site Name</label>
										<textarea  name="og_site_name" rows="2" cols="80"></textarea>
									</div>


									<div class="form-group">
										<label for="exampleInputFile">FB Admins</label>
										<textarea  name="fb_admins" rows="2" cols="80"></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Canonical</label>
										<textarea  name="canonical" rows="2" cols="80"></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Twitter Name</label>
										<textarea  name="t_name" rows="2" cols="80"></textarea>
									</div>
									
										
									<div class="form-group">
										<label for="exampleInputFile">Twitter Image</label>
										<textarea  name="t_image" rows="2" cols="80"></textarea>
									</div>
								</div>
							</div>
						</div>
				</div> 
			</div>				
				
				
				
				
			<?php } ?>

			<div class="col-md-12">
				<div class="box-footer">
				  <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
				</div>	
			</div>	





		
		</form>
			 <?php } ?>
	</div>
	</section>
</div>
<?php require('footer.php'); ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="admin_assest/plugins/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('brand_details[0][content]');
	//CKEDITOR.replace('brand_details[1][content]');
	CKEDITOR.replace('brand_details[2][content]');
	CKEDITOR.replace('brand_details[3][content]');
	CKEDITOR.replace('brand_details[4][content]');
	CKEDITOR.replace('brand_details[5][content]');
	CKEDITOR.replace('brand_details[6][content]');
	CKEDITOR.replace('brand_details[7][content]');
	CKEDITOR.replace('footer_content');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
  
 $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#gallery-photo-add').on('change', function() {
        imagesPreview(this, 'div.gallery');
    });
}); 

 $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
	var extension = input.value.split('.')[1];
	var menuAdd = document.getElementById("menu-photo-add");
        if (input.files) {
			if(extension == 'pdf'){
				var filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
					var reader = new FileReader();

					reader.onload = function(event) {
					   
						if(extension == 'pdf')
						{	
							$($.parseHTML('<img>')).attr('src', 'admin_assest/img/pdficon.png').appendTo(placeToInsertImagePreview);
						}

					}

					reader.readAsDataURL(input.files[i]);
				}
			}else {
				alert("Upload pdf  files only");
				menuAdd.focus();
				return false;
			}	
        }

    };
	
	var imagesPreviewRoi = function(input, placeToInsertImagePreview) {
	var extension = input.value.split('.')[1];
	var menuAdd = document.getElementById("roi-photo-add");
        if (input.files) {
			if(extension == 'pdf' || extension == 'doc'|| extension == 'docx'|| extension == 'xls'|| extension == 'xlsx'){	
				var filesAmount = input.files.length;

				for (i = 0; i < filesAmount; i++) {
					var reader = new FileReader();

					reader.onload = function(event) {
						if(extension == 'pdf')
						{	
							$($.parseHTML('<img>')).attr('src', 'admin_assest/img/pdficon.png').appendTo(placeToInsertImagePreview).css('height','120px');;
						}else if(extension == 'doc' || extension == 'docx'){
							$($.parseHTML('<img>')).attr('src', 'admin_assest/img/word-icon-png-6.png').appendTo(placeToInsertImagePreview).css('height','120px');
						}else if(extension == 'xls'|| extension == 'xlsx'){
							$($.parseHTML('<img>')).attr('src', 'admin_assest/img/Excel.png').appendTo(placeToInsertImagePreview).css('height','120px');;
						}
					}

					reader.readAsDataURL(input.files[i]);
				}
			}else {
				alert("Upload pdf / word/excel  files only");
				menuAdd.focus();
				return false;
			}
		}	

    };

    $('#menu-photo-add').on('change', function() {
        imagesPreview(this, 'div.menu');
    });
	$('#roi-photo-add').on('change', function() {
        imagesPreviewRoi(this, 'div.roi');
    });
}); 
  
  
  
</script>

 <script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#img_prev')
.attr('src', e.target.result)
.width(170)
.height(180);
};

reader.readAsDataURL(input.files[0]);
}
}
function readURL1(input) {
if (input.files && input.files[0]) {
var reader1 = new FileReader();

reader1.onload = function (e) {
$('#img_prev1')
.attr('src', e.target.result)
.width(170)
.height(180);
};

reader1.readAsDataURL(input.files[0]);
}
}
</script>

 <script>
$(document).ready(function() {  
	$('a.menuLinks').on('click',function() { 
		event.preventDefault();
		var id  = $(this).attr('id');
		var imgID = '#img_prev'+id;
			var url='ajaxDeleteMenuCards.php?id=';
			url=url+id,
			$.ajax({
				url: url,
				type: 'GET',
				dataType: "json",
			}).done(function(response) {
				if(response == 'success')
				{
					$(imgID).remove();
					$('#'+id).remove();					
				}else
				{
					alert('Something went wrong !');
				}

			});
	});


	$('a.galleryLinks').on('click',function() { 
		event.preventDefault();
		var id  = $(this).attr('id');
		var imgID = '#gallery_prev'+id;
			var url='ajaxDeleteGallery.php?id=';
			url=url+id,
			$.ajax({
				url: url,
				type: 'GET',
				dataType: "json",
			}).done(function(response) {
				if(response == 'success')
				{
					$(imgID).remove();
					$('#'+id).remove();					
				}else
				{
					alert('Something went wrong !');
				}

			});
	});
	
	
	

	
});
 </script>
