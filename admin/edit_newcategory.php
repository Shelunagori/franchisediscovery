<?php 
require('config.php');
require('header.php'); 
$status='';
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-12">
			<?php if($status == 'success')
			{ ?>
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>Category updated successfully !</strong> 
				</div>
		  <?php }?>
		  <?php if($status == 'fail')
			{ ?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>Something went wrong !</strong> 
				</div>
		  <?php }?>		

		  </div>
        <!-- left column -->
        <div class="col-md-6">
		<form role="form" method="post" action="category.php">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Category</h3>
					<a href="new_category.php" class="pull-right"> Add New</a>
				</div>
				<?php $id = base64_decode($_GET['id']); 
				$query=mysqli_query($db,"select * from new_categories where id = '$id' and status = 0");
				while($row=mysqli_fetch_array($query)){ 
				$footerData = $row['footer_content'];
				?>
				<div class="box-body">
					<div class="box-body">
						<div class="form-group">
							<input class="form-control" name="name" type="text" placeholder="Add Categtory" value='<?php echo $row['name']; ?>' required>
							<input class="form-control" name="id" type="hidden" value='<?php echo $id; ?>' required>
					   </div>
					</div>
				 </div>
				<?php } ?> 
			</div>

			<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Footer Content</h3>
					<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					  <i class="fa fa-minus"></i></button>
					<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					  <i class="fa fa-times"></i></button>
				  </div>
				</div>
				<div class="box-body">
					<div class="box-body">
						<div class="form-group">
								<div class="box-body pad">
									<textarea id="editor1" name="footer_content" rows="10" cols="80"><?php echo $footerData;?></textarea>
								</div>
							</div>
					 </div>
				</div>       
			</div>
					
			
			
			
			<?php 
				
				$query_seo=mysqli_query($db,"SELECT * FROM page_seo where page_id = '2' and category_id = '$id' ");  
				if($query_seo->num_rows > 0)
				{ 
					while($row_seo=mysqli_fetch_array($query_seo)){ ?>	
						<input type="hidden" name="seo_id" value="<?php echo $row_seo['id']; ?>" />
						<div class="box box-primary collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Update SEO</h3>
								<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								  <i class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							</div>
							<div class="box-body">
								<div class="box-body">
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
					
					
				<?php } } else {  ?>


						<div class="box box-primary collapsed-box">
							<div class="box-header with-border">
							  <h3 class="box-title">Add SEO</h3>
								<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								  <i class="fa fa-plus"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								  <i class="fa fa-times"></i></button>
							  </div>
							</div>
							<div class="box-body">
								<div class="box-body">
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



				
				<?php } ?>	
			
			<div class="box-footer">
			 <button type="submit" class="btn btn-info pull-right" name='edit'>Submit</button>
			</div>
			
		 </form>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Category</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="admin/update_Sequence" method="post">
          <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Category</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from new_categories where status = 0 order by id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['name']; ?></td>
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_category.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
							</td>
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="category.php?id=<?php echo $row['id']; ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
						<?php
					}
				?>                 
               </tbody>
              </table>
            </form> 
      </div>
      <!-- /.box -->
  </div>

</div>
    </section>
    <!-- /.content -->
   </div>
  
 <?php require('footer.php'); ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="admin_assest/plugins/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('footer_content');
    $(".textarea").wysihtml5();
  });
  </script>