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
  <link rel="stylesheet" href="admin_assest/plugins/daterangepicker/daterangepicker-bs3.css">
 <link rel="stylesheet" href="admin_assest/plugins/datepicker/datepicker3.css">
  
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
		<form role="form" method="post" action="save_news_blogs.php" enctype="multipart/form-data">
        <div class="col-md-12">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create News & Blogs</h3>
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
										<select required name="type" class="form-control select2" style="width: 100%;">
										  <option value="Blogs">Blogs</option>
										  <option value="News">News</option>
										  <option value="Video">Brand Video</option>
										</select>
									</div>
									
									
									<div class="form-group">
										<select name="category_id" class="form-control select2" style="width: 100%;">
										  <option selected="selected">Select Category</option>
											<?php
												$query=mysqli_query($db,"select * from new_categories where status = 0");
												while($row=mysqli_fetch_array($query)){
											?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
										</select>
									</div>
									
									<div class="form-group">
										<input class="form-control" name="main_title" type="text" placeholder="Title" value='' required>
									</div>
									
									<div class="form-group">
										<input type="text" name="create_on" class="form-control input-sm" id="datepicker" placeholder="Created Date" data-date-format="dd-mm-yyyy" required="required">
									</div>
								</div>
								<div class="col-md-6">	
									
								
									
									<div class="form-group">
										  <label for="exampleInputFile">Image</label>
										  <input type="file" onchange="readURL(this);" id="exampleInputFile" name="image">
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
				  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Blog & News Content</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
						  <i class="fa fa-minus"></i>
						</button>
				  </div>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<div class="box-body pad">
							<label for="exampleInputFile">Content</label>
								<textarea id="editor1" name="content" rows="10" cols="80">
								</textarea>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<div class="box-body pad">
								<label for="exampleInputFile">Video URL</label>
								<textarea  name="video_url" rows="10" cols="80">
								</textarea>
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
<script src="admin_assest/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function() { 
	  $('#datepicker').datepicker({
      autoclose: true
    });
});		


  $(function () {
    CKEDITOR.replace('content');
    $(".textarea").wysihtml5();
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
</script>


