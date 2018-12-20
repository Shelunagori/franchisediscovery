<?php 
require('config.php');
$status = '';
$message = '';
if(isset($_POST['add']))
{	$catName = mysqli_real_escape_string($db,$_POST['name']);
	$footer_content = mysqli_real_escape_string($db,$_POST['footer_content']);
	$seo_name = seo_url($catName);
	$seo_name = $seo_name.'-franchises';
	$sql = "INSERT INTO categories(name,seo_name,footer_content) VALUES ('$catName','$seo_name','$footer_content')";
	if ($db->query($sql) === TRUE) {
		$category_id = mysqli_insert_id($db);
		$page_id = 2;	
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
		
		$sql_seo = "INSERT INTO page_seo(page_id,category_id,title, meta_description, meta_keywords, meta_robots, meta_abstract, meta_topic, meta_url, g_name, g_description, g_image, t_title, t_description, t_image, og_title, og_type, og_url, og_image, og_description, og_site_name, fb_admins, canonical) VALUES ('$page_id','$category_id','$title','$meta_description','$meta_keywords','$meta_robots','$meta_abstract','$meta_topic','$meta_url','$g_name','$g_description','$g_image','$t_title','$t_description','$t_image','$og_title','$og_type','$og_url','$og_image','$og_description','$og_site_name','$fb_admins','$canonical')";
		$seo = $db->query($sql_seo);		
		
		
		$status = 'success';
		$message = 'Category created successfully !';
	} else {
		$status = 'fail';
		$message = 'Something went wrong !!';
	}
}


if(isset($_POST['edit']))
{	$catName = mysqli_real_escape_string($db,$_POST['name']);
	$footer_content = mysqli_real_escape_string($db,$_POST['footer_content']);
	$id = mysqli_real_escape_string($db,$_POST['id']);
	$seo_name = seo_url($catName);
	$seo_name = $seo_name.'-franchises';
	$sql = "update categories set name = '$catName', seo_name = '$seo_name', footer_content = '$footer_content' where id = '$id' and status = 0";
	if ($db->query($sql) === TRUE) {

		$category_id = $id;
		$page_id = 2;	
		@$seo_id = mysqli_real_escape_string($db,$_POST['seo_id']);
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

		if(!empty($seo_id) && $seo_id > 0)
		{
			$sql_seo = "update page_seo set title = '$title', meta_description = '$meta_description',meta_keywords = '$meta_keywords',meta_robots = '$meta_robots',meta_abstract = '$meta_abstract',meta_topic = '$meta_topic',meta_url = '$meta_url',g_name = '$g_name',g_description = '$g_description',g_image = '$g_image',t_title = '$t_title',t_description = '$t_description',t_image = '$t_image',og_title = '$og_title',og_type = '$og_type',og_url = '$og_url',og_image = '$og_image',og_description = '$og_description',og_site_name = '$og_site_name',fb_admins = '$fb_admins',canonical = '$canonical' where id = '$seo_id' ";
			
			$seo = $db->query($sql_seo);		
		}else
		{   
			$sql_seo = "INSERT INTO page_seo(page_id,category_id,title, meta_description, meta_keywords, meta_robots, meta_abstract, meta_topic, meta_url, g_name, g_description, g_image, t_title, t_description, t_image, og_title, og_type, og_url, og_image, og_description, og_site_name, fb_admins, canonical) VALUES ('$page_id','$category_id','$title','$meta_description','$meta_keywords','$meta_robots','$meta_abstract','$meta_topic','$meta_url','$g_name','$g_description','$g_image','$t_title','$t_description','$t_image','$og_title','$og_type','$og_url','$og_image','$og_description','$og_site_name','$fb_admins','$canonical')";
			$seo = $db->query($sql_seo);			
		}

		
		$status = 'success';
		$message = 'Category created successfully !';
	} else {
		$status = 'fail';
		$message = 'Something went wrong !';
	}
}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update categories set status = 1 where id = '$id' and status = 0";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Category deleted successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}


$name="add";
require('header.php'); 
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
        <!-- left column -->
        <div class="col-md-6">
		<form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Category</h3>

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
						<input class="form-control" name="name" type="text" placeholder="Add Categtory" value='' required>
						<input type="hidden" class="form-control" value='' name='nCategoryId' placeholder="Enter Category Name"/>
					</div>
				 </div>
			</div>       
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
								<textarea id="editor1" name="footer_content" rows="10" cols="80">
								</textarea>
							</div>
						</div>
				 </div>
			</div>       
        </div>
		
		
		
		

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
         <button type="submit" class="btn btn-info pull-right" name='<?php echo $name;?>'>Submit</button>
        </div>
      </form>

      

  </div> 
    <div class="col-md-6">
      <div class="box box-primary">
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
					$query=mysqli_query($db,"select * from categories where status = 0 order by id DESC ");
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
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="category.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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