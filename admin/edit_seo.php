<?php 
require('header.php');
require('config.php');
	$status = '';
	$message = ''; 
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
<?php
$id = base64_decode($_GET['rowvalue']);
$query=mysqli_query($db,"SELECT * FROM page_seo where id = '$id'");  
$sno = 1;
if(!empty($query)){ 
	while($row=mysqli_fetch_array($query)){ ?>	   
		<form role="form" method="post" action="save_seo_update.php">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
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
												while($row1=mysqli_fetch_array($query)){
											?>
												<option <?php if($row['page_id'] == $row1['id']) { echo 'selected'; } ?>  value="<?php echo $row1['id']; ?>">
													<?php echo $row1['name']; ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputFile">Meta Description</label>
										<textarea  name="meta_description" rows="2" cols="80"><?php echo $row['meta_description']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Keywords</label>
										<textarea  name="meta_keywords" rows="2" cols="80"><?php echo $row['meta_keywords']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Robots</label>
										<textarea  name="meta_robots" rows="2" cols="80"><?php echo $row['meta_robots']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Abstract</label>
										<textarea  name="meta_abstract" rows="2" cols="80"><?php echo $row['meta_abstract']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Meta Topic</label>
										<textarea  name="meta_topic" rows="2" cols="80"><?php echo $row['meta_topic']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Meta URL</label>
										<textarea  name="meta_url" rows="2" cols="80"><?php echo $row['meta_url']; ?></textarea>
									</div>


									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Name</label>
										<textarea  name="g_name" rows="2" cols="80"><?php echo $row['g_name']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Description</label>
										<textarea  name="g_description" rows="2" cols="80"><?php echo $row['g_description']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Google Plus Markup Image</label>
										<textarea  name="g_image" rows="2" cols="80"><?php echo $row['g_image']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">Twitter Description</label>
										<textarea  name="t_description" rows="2" cols="80"><?php echo $row['t_description']; ?></textarea>
									</div>
							
								</div>
								<div class="col-md-6">	
									<div class="form-group" style="margin-bottom: 10px;">
										<label for="exampleInputFile">Page Title</label>
										<textarea  style="height: 34px;" name="title" rows="1" cols="80"><?php echo $row['title']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Title</label>
										<textarea  name="og_title" rows="2" cols="80"><?php echo $row['og_title']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">OG Type</label>
										<textarea  name="og_type" rows="2" cols="80"><?php echo $row['og_type']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">OG URL</label>
										<textarea  name="og_url" rows="2" cols="80"><?php echo $row['og_url']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Image</label>
										<textarea  name="og_image" rows="2" cols="80"><?php echo $row['og_image']; ?></textarea>
									</div>
									
									<div class="form-group">
										<label for="exampleInputFile">OG Description</label>
										<textarea  name="og_description" rows="2" cols="80"><?php echo $row['og_description']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">OG Site Name</label>
										<textarea  name="og_site_name" rows="2" cols="80"><?php echo $row['og_site_name']; ?></textarea>
									</div>


									<div class="form-group">
										<label for="exampleInputFile">FB Admins</label>
										<textarea  name="fb_admins" rows="2" cols="80"><?php echo $row['fb_admins']; ?></textarea>
									</div>

									<div class="form-group">
										<label for="exampleInputFile">Canonical</label>
										<textarea  name="canonical" rows="2" cols="80"><?php echo $row['canonical']; ?></textarea>
									</div>
									
									
									<div class="form-group">
										<label for="exampleInputFile">Twitter Title</label>
										<textarea  name="t_name" rows="2" cols="80"><?php echo $row['t_title']; ?></textarea>
									</div>
									
										
									<div class="form-group">
										<label for="exampleInputFile">Twitter Image</label>
										<textarea  name="t_image" rows="2" cols="80"><?php echo $row['t_image']; ?></textarea>
									</div>
								</div>
							</div>
						</div>
				</div> 
			</div>
			<div class="col-md-12">
				<div class="box-footer">
				  <button type="submit" class="btn btn-info pull-right" name="editSEO">Submit</button>
				</div>	
			</div>			
		</form>
<?php } } ?>
	</div>
	</section>
</div>
<?php require('footer.php'); ?>