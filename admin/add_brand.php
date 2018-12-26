<?php 
require('header.php');
require('config.php');
$status='';
 ?>
<style>
.gallery > img{
	width: 200px;
    height: 150px;
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
		<form role="form" method="post" action="save_brand.php" enctype="multipart/form-data">
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
										<select name="category_id[]" class="form-control select2" style="width: 100%;" data-placeholder="--- Select Category ---" multiple="multiple">
										  <option value=''>Select Category</option>
											<?php
												$query=mysqli_query($db,"select * from categories where status = 0");
												while($row=mysqli_fetch_array($query)){
											?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<input class="form-control" name="name" type="text" placeholder="Brand Name" value='' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="rating" type="number" placeholder="500+ Rating" value='' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="avg_rating" type="text" placeholder="Average Rating" value='' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="area_reqired" type="number" placeholder="Area Required" value='' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="franchise_outlets" type="number" placeholder="Franchise Outlets" value='' required>
									</div>
									
									<div class="form-group">
										<input class="form-control" name="investment_range" type="number" placeholder="Investment Range" value='' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="investment_range_in_words" type="text" placeholder="Investment Range (In words)" value='' required>
									</div>
									
								</div>
								<div class="col-md-6">	
									<div class="form-group">
										<input class="form-control" name="address" type="text" placeholder="Address" value='' required>
									</div>
									
									<div class="form-group">
										<select name="chart_id" class="form-control select2" style="width: 100%;">
										  <option value="" selected="selected">Select Chart</option>
											<?php
												$query_chart=mysqli_query($db,"select * from chart");
												while($rowChart=mysqli_fetch_array($query_chart)){
											?>
												<option value="<?php echo $rowChart['id']; ?>"><?php echo $rowChart['name']; ?></option>
											<?php } ?>
										</select>
									</div>								
									<div class="form-group">
										<input class="form-control" name="description" type="text" placeholder="Short Description" value='' required>
									</div>
									<div class="form-group">
										<input class="form-control" name="contact_no" type="number" placeholder="Contact No" value='' required>
									</div>
									<div class="form-group" style="padding-top: 8px;">
										<label>
											<input type="radio" name="food_type" value="Veg" class="flat-red" checked>
											Veg
										</label>
										<label style="margin-left: 30px;">
											<input type="radio" name="food_type" value="Non-Veg" class="flat-red">
											Non-Veg
										</label>
										<label style="margin-left: 30px;">
											<input type="radio" name="food_type" value="Non + Veg Both" class="flat-red">
											Non + Veg Both
										</label>
									</div>
									<div class="form-group">
										  <label for="exampleInputFile">Brand Image</label>
										  <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
										  <img src="admin_assest/img/icon.ico" width="172" height="183"  id="img_prev" style="float:right;    margin-top: -46px;" />
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
						<div class="menu"></div>
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
					<div class="col-md-6">
						<div class="form-group">
							<label>Menu Name</label>
							<input class="form-control" name="brand_details[0][left_menu_name]" type="text" placeholder="Menu name" value='About Us' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[0][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>

						<div class="form-group">
						<label>Menu Name</label>
							<input class="form-control" name="brand_details[1][left_menu_name]" type="text" placeholder="Menu name" value='ROI' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[1][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>	

						<div class="form-group">
						<label>Menu Name</label>
							<input class="form-control" name="brand_details[2][left_menu_name]" type="text" placeholder="Menu name" value='Franchise Model - FICO FOCO' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[2][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>							

						<div class="form-group">
							<label>Menu Name</label>
							<input class="form-control" name="brand_details[6][left_menu_name]" type="text" placeholder="Menu name" value='Brand Origin' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[6][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<select name="brand_details[6][brand_country][0][country_id][]" multiple="multiple" data-placeholder="Select Country" class="form-control select2" style="width: 100%;">
								<?php
									$query=mysqli_query($db,"select * from country");
									while($row=mysqli_fetch_array($query)){
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<select name="brand_details[6][brand_city][0][city_id][]" multiple="multiple" data-placeholder="Select City" class="form-control select2" style="width: 100%;">
								<?php
									$query=mysqli_query($db,"select * from cities ");
									while($row=mysqli_fetch_array($query)){
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						
						
					</div>
					<div class="col-md-6">

						<div class="form-group">
						<label>Menu Name</label>
							<input class="form-control" name="brand_details[3][left_menu_name]" type="text" placeholder="Menu name" value='Training' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[3][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>

						<div class="form-group">
							<label>Menu Name</label>
							<input class="form-control" name="brand_details[4][left_menu_name]" type="text" placeholder="Menu name" value='Agreement T & C' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[4][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>	
						
						<div class="form-group">
							<label>Menu Name</label>
							<input class="form-control" name="brand_details[7][left_menu_name]" type="text" placeholder="Menu name" value=''>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[7][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>
						
						
						<div class="form-group">
							<label>Menu Name</label>
							<input class="form-control" name="brand_details[5][left_menu_name]" type="text" placeholder="Menu name" value='Expansion plan' required>
						</div>
						<div class="form-group">
							<div class="box-body pad">
								<textarea id="editor1" name="brand_details[5][content]" rows="10" cols="80">
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<select name="brand_details[5][brand_country][1][country_id][]" multiple="multiple" data-placeholder="Select Country" class="form-control select2" style="width: 100%;">
								<?php
									$query=mysqli_query($db,"select * from country");
									while($row=mysqli_fetch_array($query)){
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<select name="brand_details[5][brand_state][1][state_id][]" multiple="multiple" data-placeholder="Select State" class="form-control select2" style="width: 100%;">
								<?php
									$query=mysqli_query($db,"select * from state");
									while($row=mysqli_fetch_array($query)){
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<select name="brand_details[5][brand_city][1][city_id][]" multiple="multiple" data-placeholder="Select City" class="form-control select2" style="width: 100%;">
							  <?php
									$query=mysqli_query($db,"select * from cities ");
									while($row=mysqli_fetch_array($query)){
								?>
									<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
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
							<div class="gallery"></div>
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
									<textarea id="editor1" name="footer_content" rows="10" cols="80"></textarea>
								</div>
							</div>
						</div>
					</div>					
			</div> 
		</div>
		
		
		


        <div class="col-md-12">
			<div class="box box-warning">
				<div class="box-header with-border">
				  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>SEO</h3>
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
										<textarea  name="title" rows="2" cols="80"></textarea>
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
										<label for="exampleInputFile">Twitter Title</label>
										<textarea  name="t_name" rows="2" cols="80"></textarea>
									</div>
									
										
									<div class="form-group">
										<label for="exampleInputFile">Twitter Image</label>
										<textarea  name="t_image" rows="2" cols="80"></textarea>
									</div>
									
									
								</div>
							</div>
				</div>
				<div class="box-footer">
				   <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
				</div>					
			</div> 
		</div>		
		</form>
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
	CKEDITOR.replace('brand_details[1][content]');
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

    $('#menu-photo-add').on('change', function() {
        imagesPreview(this, 'div.menu');
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


