<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	include('admin/config.php');
	$user_id=$_SESSION['user_id']; 
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }	
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Franchise Discovery</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/select2.min.css">	
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1345039395633205');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1345039395633205&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->	
	

</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
    <!-- >>>>>>>>>>>>>>>> Message Now Area Start <<<<<<<<<<<<<<<< -->
    <div class="message_now_area section_padding_50" id="contact">
        <div class="container">
		 <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
					</div>
				</div>
            </div>
		    
            <div class="row">
				<div class="col-12 col-md-3">
					<?php $currentPage = 'Brand'; 
						include('sidebar.php'); ?>
				</div>
			
                <div class="col-12 col-md-9">	
					<div class="row" style="margin-bottom: 10px;">
						<div class="col-md-12">
							<a class="btn btn-info btn-rounded btn-sm pull-right" href="brand_list_brand.php">
								<span style="color:#fff;" class="fa fa-list"> </span>  View All Brand
							</a>
						</div>
					</div>	
					<div class="row">
					<?php $brand_id = base64_decode($_GET['rowvalue']);
					
						$sql = "select brands.id,brands.chart_id,brands.company_name,brands.name,brands.title,brands.contact_no,brands.rating,brands.avg_rating,brands.food_type,brands.area_reqired,brands.investment_range,brands.investment_range_in_words,brands.franchise_outlets,brands.brand_image,brands.address,brands.seo_name,brands.footer_content,brands.status,brand_rows.category_id,brands.fb_link,brands.insta_link,brands.tw_link,brands.yt_link,brands.delivery_partner,brands.other_link from brands LEFT JOIN brand_rows ON brand_rows.brand_id=brands.id where status = 'Active' and brands.id = '$brand_id' ";
					
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
							<form role="form" method="post" action="brand_user_edit_save.php" style="width: 100%;" enctype="multipart/form-data">
							<input type="hidden" name="brand_id" value="<?php echo $brand_id ?>" />
								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Edit New Brand</h3>
									</div>
									<div class="row">
											<div class="col-md-6 col-md">
											<div class="form-group">
												<select name="category_id[]" class="form-control select2" style="width: 100%;" data-placeholder="--- Select Category ---" multiple="multiple">
												  <option value=''>Select Category</option>
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
												<input class="form-control" name="investment_range_in_words" type="text" placeholder="Investment Range (In words)" value='<?php echo $row_brand['investment_range_in_words'];?>' required>
											</div>	
										</div>
										<div class="col-md-6">	
											<div class="form-group">
												<input class="form-control" name="address" type="text" placeholder="Address" value='<?php echo $row_brand['address'];?>' required>
											</div>
											
											<div class="form-group">
												<select name="chart_id" class="form-control select2" data-placeholder="--- Select Chart ---"  style="width: 100%;border: 1px solid #ced4da !important;">
												  <option value="" selected="selected">Select Chart</option>
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
													<input type="radio" name="food_type" value="Non + Veg Both" <?php if($row_brand['food_type'] == 'Non + Veg Both'){ echo 'checked'; } ?> class="flat-red">
													Non + Veg Both
												</label>
											</div>
											<div class="form-group">
												 <label>Brand Image</label> <br>
												  <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
												  <?php $path = ''; 
														if(!empty($row_brand['brand_image'])) 
														{ $path = str_replace('../',"",$row_brand['brand_image']); } 
														else { $path = 'img/icon.ico';  }
													?>
												  <img src="<?php echo $path;?>" width="172" height="183"  id="img_prev" style="float:right;margin-top: -65px;" />
											</div>
										</div>
								
									</div>
								</div>	

								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Other Details</h3>
									</div>
									<div class="row">
										<div class="col-md-6 col-md">
											<div class="form-group">
												<input class="form-control" name="company_name" type="text" placeholder="Company Name" value='<?php echo  $row_brand['company_name']; ?>' required>
											</div>	
											<div class="form-group">
												<input class="form-control" name="insta_link" type="text" placeholder="Instagram Link" value='<?php echo  $row_brand['insta_link']; ?>'>
											</div>
											<div class="form-group">
												<input class="form-control" name="yt_link" type="text" placeholder="YouTube Link" value='<?php echo  $row_brand['yt_link']; ?>'>
											</div>					
											<div class="form-group">
												<input class="form-control" name="other_link" type="text" placeholder="Any other social link" value='<?php echo  $row_brand['other_link']; ?>'>
											</div>																
										</div>
										<div class="col-md-6">				
											<div class="form-group">
												<input class="form-control" name="fb_link" type="text" placeholder="Facebook Link" value='<?php echo  $row_brand['fb_link']; ?>'>
											</div>
											<div class="form-group">
												<input class="form-control" name="tw_link" type="text" placeholder="Twitter Link" value='<?php echo  $row_brand['tw_link']; ?>'>
											</div>
											<div class="form-group">
												<input class="form-control" name="delivery_partner" type="text" placeholder="Delivery Partner" value='<?php echo  $row_brand['delivery_partner']; ?>'>
											</div>
										</div>										
									</div>
								</div>								
								
								
								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Food Menu Details</h3>
									</div>
									<div class="row">
										<div class="col-md-6 col-md">
											<div class="form-group">
												<label>Upload menu pdf</label>  (Select only pdf file)	
												<input type="file" name="menudetail[]" accept="application/pdf" id="menu-photo-add">
											</div>
											<div class="menu">
							<?php $menu_sql = mysqli_query($db,"SELECT * from brand_menu_images where brand_id = '$brand_id'  ");
									if(!empty($menu_sql))
									{
									while($menu_gallery = mysqli_fetch_array($menu_sql)){ 
									if (strpos($menu_gallery['image_path'], '.pdf') !== false) { ?>

										<img src="img/pdficon.png" width="172" height="183"  id="img_prev<?php echo $menu_gallery['id']; ?>"  />
										
										<a href="#" class="menuLinks" id=<?php echo $menu_gallery['id']; ?> style="font-size: 30px;margin-left: -21px;color: red;position: absolute;top: 112px;">×</a>
									<?php }else{ ?>
										<img src="<?php echo $menu_gallery['image_path']; ?>" width="172" height="183"  id="img_prev<?php echo $menu_gallery['id']; ?>"  />
										
										<a href="#" class="menuLinks" id=<?php echo $menu_gallery['id']; ?> style="font-size: 30px;margin-left: -21px;color: red;position: absolute;top: 112px;">×</a>
										
									<?php }	} } else { echo '<center>No menu card found</center>';  } ?>											
											</div>											
										</div>
									</div>
								</div>

								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Brand Menu Details</h3>
									</div>
									<div class="row">
											<?php $no = 0; $count = 0;
											$brandDetail = mysqli_query($db,"select * from brand_details where brand_id = '$brand_id' ");
											if(!empty($brandDetail))
											{
												$roiContent='';$roiid=0;
												while($row_detail=mysqli_fetch_array($brandDetail)){ 
												if($no == 1){
													$no = 2;
												}
												
												if($row_detail['left_menu_name'] == "ROI"){
													$roiContent = $row_detail['content'];
													$roiid = $row_detail['id'];
												}
												else
												{
												$brand_detail_id = $row_detail['id'];
												if($row_detail['is_gallery'] == 'No' && $row_detail['left_menu_name'] != "ROI") {
											?>
												<div class="col-md-6">
													<div class="form-group">
														<label>Menu Name</label>
														<input class="form-control" name="brand_details[<?php echo $no;?>][id]" type="hidden" placeholder="Menu name" value='<?php echo $row_detail['id']; ?>'>
														<input type="hidden" name="brand_details[<?php echo $no;?>][id]" value="<?php echo $row_detail['id']; ?>" />
														<input class="form-control" name="brand_details[<?php echo $no;?>][left_menu_name]" type="text" placeholder="Menu name" value='<?php echo $row_detail['left_menu_name']; ?>'>
													</div>
													<div class="form-group">
														<div class="box-body pad">
														
															<textarea id="editor1" name="brand_details[<?php echo $no;?>][content]" rows="10" cols="80">
																<?php echo $row_detail['content']; ?>
															</textarea>
														
															
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
												<?php $no++;  $count++; } } } } ?>									
																</div>
								</div>	

								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> ROI Details</h3>
									</div>
									<div class="row">
										<div class="col-md-12 col-md">
												<div class="form-group">
													<label>Upload ROI (Select pdf/excel/word files)</label> <br>
													<input class="form-control" name="brand_details[1][left_menu_name]" type="hidden" placeholder="Menu name" value='ROI'>
													<input class="form-control" name="brand_details[1][id]" type="hidden" placeholder="Menu name" value='<?php echo $roiid; ?>'>
													<input class="form-control" name="brand_details[1][content_old]" type="hidden" placeholder="Menu name" value='<?php echo $roiContent; ?>'>
														<input type="file" name="brand_details[1][content]" accept="application/pdf,application/msword, application/vnd.ms-excel" id="roi-photo-add">
												</div>
												<div class="roi">
													<?php  
													if (strpos($roiContent, '.pdf') !== false) { ?>

														<img src="admin_assest/img/pdficon.png" style="height:120px"   />
														
														<a href="<?php echo $roiContent; ?>" target="_blank"></a>
													<?php }else if (strpos($roiContent, '.xls') !== false || strpos($roiContent, '.xlsx') !== false){ ?>
													
														
														
														<a href="<?php echo $roiContent; ?>" target="_blank"><img src="admin_assest/img/Excel.png" style="height:120px"  /></a>
														
													<?php }else if (strpos($roiContent, '.doc') !== false || strpos($roiContent, '.docx') !== false){ ?>
													
														<img src="admin_assest/img/word-icon-png-6.png" style="height:120px" />
														
														<a href="<?php echo $roiContent; ?>" target="_blank"></a>
													<?php } else { echo '<center>No menu card found</center>';  } ?>
											</div>
										</div>
									</div>
								</div>										
								
								
								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Gallery Images</h3>
									</div>
									<div class="row">
										<div class="col-md-12 col-md">
											<div class="form-group">
												<label>Upload gallery images</label>  (Select multiple images)<br />
												<input type="file" name="upload[]" multiple id="gallery-photo-add">
											</div>	
											<div class="gallery">
												<?php
												$gallery_sql = mysqli_query($db,"SELECT * from brand_gallery where brand_id = '$brand_id'  ");
												if(!empty($gallery_sql))
												{
												while($gallery = mysqli_fetch_array($gallery_sql)){ 
												?> 
													<img src="<?php echo str_replace("../","",$gallery['gallery_image_path']);?>" width="172" height="183"  id="gallery_prev<?php echo $gallery['id']; ?>"  />
																
													<a href="#" class="galleryLinks" id=<?php echo $gallery['id']; ?> style="font-size: 30px;margin-left: -22px;color: red;position: absolute;top: 67px;">×</a>
												<?php }  
												}?>
												</div>
										</div>
									</div>
								</div>									
								
								<div class="row">
									<div class="col-md-12 col-md">
										<button type="submit" class="btn bigshop-btn" name="submit">Save Brand</button>
									</div>
								</div>
							</form>
							<?php } ?>
					</div>
				</div>
            </div>
        </div>
    </div>           
        </div>
    </section>

    
<?php include("footer.php");?>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="admin/admin_assest/plugins/bootstrap3-wysihtml5.all.min.js"></script>


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
//	CKEDITOR.replace('footer_content'); 
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });

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
							$($.parseHTML('<img>')).attr('src', 'img/pdficon.png').appendTo(placeToInsertImagePreview);
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
							$($.parseHTML('<img>')).attr('src', 'img/pdficon.png').appendTo(placeToInsertImagePreview).css('height','120px');;
						}else if(extension == 'doc' || extension == 'docx'){
							$($.parseHTML('<img>')).attr('src', 'img/word-icon-png-6.png').appendTo(placeToInsertImagePreview).css('height','120px');
						}else if(extension == 'xls'|| extension == 'xlsx'){
							$($.parseHTML('<img>')).attr('src', 'img/Excel.png').appendTo(placeToInsertImagePreview).css('height','120px');;
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

	
</script>		
	 
</body>

</html>