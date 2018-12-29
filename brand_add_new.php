<!DOCTYPE html>
<html lang="en">
<?php 
	session_start();
	include('admin/config.php');
	$user_id=$_SESSION['user_id']; 
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }
	//print_r($_SESSION);exit;
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$sql = "delete from favrouite where id = '$id'";
		if ($db->query($sql) === TRUE) {
			echo '<script>alert("Brand removed from favourite list !");</script>';
			echo ' <script type="text/javascript">  window.location="favourite.php";</script>';	
		} else {
			echo '<script>alert("Something went wrong !");</script>';
			echo '<script type="text/javascript">  window.location="favourite.php";</script>';
		}	
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
							<form role="form" method="post" action="brand_user_save.php" style="width: 100%;" enctype="multipart/form-data">
								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create New Brand</h3>
									</div>
									<div class="row">
											<div class="col-md-6 col-md">
											<div class="form-group">
												<select name="category_id[]" class="form-control select2" style="width: 100%;" data-placeholder="--- Select Category ---" multiple="multiple">
												  <option value=''>Select Category</option>
													<?php
														$query=mysqli_query($db,"select * from categories where status = 0 and id != 7");
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
												<select name="chart_id" class="form-control select2" data-placeholder="--- Select Chart ---"  style="width: 100%;border: 1px solid #ced4da !important;">
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
												 <label>Brand Image</label> <br>
												  <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
												  <img src="img/icon.ico" width="172" height="183"  id="img_prev" style="float:right;margin-top: -65px;" />
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
												<label>Upload menu pdf</label>  (Select multiple pdf files)	
												<input type="file" name="menudetail[]" accept="application/pdf" multiple id="menu-photo-add">
											</div>
											<div class="menu"></div>											
										</div>
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
													<input type="file" name="brand_details[1][content]" accept="application/pdf,application/msword, application/vnd.ms-excel" id="roi-photo-add">
											</div>
											<div class="roi"></div>
										</div>
									</div>
								</div>									

								<div class="box box-warning">
									<div class="box-header with-border">
									  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Brand Menu Details</h3>
									</div>
									<div class="row">
										<div class="col-md-6 col-md">
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
										
										<div class="col-md-6 col-md">
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
										
										<div class="col-md-12 col-md">
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
											<div class="gallery"></div>
										</div>
									</div>
								</div>									
								
								<div class="row">
									<div class="col-md-12 col-md">
										<button type="submit" class="btn bigshop-btn" name="submit">Save Brand</button>
									</div>
								</div>
								
								
								
								
								
							</form>
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