<?php 
require('config.php');
require('header.php');
$status = '';
$message = '';
	if(isset($_POST['add']))
	{	
		$page_id = mysqli_real_escape_string($db,$_POST['page_id']);
		$title = mysqli_real_escape_string($db,$_POST['title']);
		$meta_description = mysqli_real_escape_string($db,$_POST['meta_description']);
		$og_title = mysqli_real_escape_string($db,$_POST['og_title']);
		$meta_keywords = mysqli_real_escape_string($db,$_POST['meta_keywords']);
		$og_type = mysqli_real_escape_string($db,$_POST['og_type']);
		$meta_robots = mysqli_real_escape_string($db,$_POST['meta_robots']);
		$og_url = mysqli_real_escape_string($db,$_POST['og_url']);
		$meta_abstract = mysqli_real_escape_string($db,$_POST['meta_abstract']);
		$og_image = mysqli_real_escape_string($db,$_POST['og_image']);
		$meta_topic = mysqli_real_escape_string($db,$_POST['meta_topic']);
		$og_description = mysqli_real_escape_string($db,$_POST['og_description']);
		$meta_url = mysqli_real_escape_string($db,$_POST['meta_url']);
		$og_site_name = mysqli_real_escape_string($db,$_POST['og_site_name']);
		$g_name = mysqli_real_escape_string($db,$_POST['g_name']);
		$fb_admins = mysqli_real_escape_string($db,$_POST['fb_admins']);
		$canonical = mysqli_real_escape_string($db,$_POST['canonical']);
		$g_description = mysqli_real_escape_string($db,$_POST['g_description']);
		$g_image = mysqli_real_escape_string($db,$_POST['g_image']);
		$t_title = mysqli_real_escape_string($db,$_POST['t_name']);
		$t_description = mysqli_real_escape_string($db,$_POST['t_description']);
		$t_image = mysqli_real_escape_string($db,$_POST['t_image']);

		
		$sql = "INSERT INTO page_seo(page_id, title, meta_description, meta_keywords, meta_robots, meta_abstract, meta_topic, meta_url, g_name, g_description, g_image, t_title, t_description, t_image, og_title, og_type, og_url, og_image, og_description, og_site_name, fb_admins, canonical) VALUES ('$page_id','$title','$meta_description','$meta_keywords','$meta_robots','$meta_abstract','$meta_topic','$meta_url','$g_name','$g_description','$g_image','$t_title','$t_description','$t_image','$og_title','$og_type','$og_url','$og_image','$og_description','$og_site_name','$fb_admins','$canonical')";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'SEO created successfully !';
		} else {
			
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
	}  
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
			<?php if($status == 'success')
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
		<form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
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
										<label for="exampleInputFile">Select Pages</label>
										<select required name="page_id" class="form-control select2" style="width: 100%;">
											<option value="selected">Select Pages </option>
											<?php
												$query=mysqli_query($db,"select * from pages where is_seo = 'Yes'");
												while($row=mysqli_fetch_array($query)){
											?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
										</select>
									</div>
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
										<textarea  style="height: 34px;" name="title" rows="1" cols="80"></textarea>
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
				</div> 
			</div>
			<div class="col-md-12">
				<div class="box-footer">
				  <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
				</div>	
			</div>			
		</form>
	</div>
	</section>
</div>
<?php require('footer.php'); ?>