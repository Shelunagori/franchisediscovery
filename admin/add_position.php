<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
if(isset($_POST['add']))
{
	$page_id=$_POST['page_id'];
	$position_name=$_POST['position_name'];
	$position_query="INSERT INTO position (page_id,position_name) VALUES ($page_id,'$position_name')";
	if($db->query($position_query) === TRUE)
		{
			$status = 'success';
			$message = 'Data added successfully !';
		}
		else 
		{
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
}
	

?>

<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-12">
		<?php if(isset($_SESSION['message'])):?>
		  <?php if($_SESSION['message'] == 'Something went wrong !'):?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></strong> 
				</div>
		  <?php else: ?>	
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></strong> 
				</div>
		  <?php endif; ?>
		<?php endif;?>

		  </div>
        <!-- left column -->
	<div class="col-md-6">
		<form role="form" method="post" action="" enctype="multipart/form-data">
			<div class="box box-primary">

			<div class="box-header with-border">
			  <h3 class="box-title">Add Position</h3>
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
						<div class="form-group">
							<label for="Name">Page</label>
							<select name="page_id" class="form-control">
								<option value="">--Select Page--</option>
								<?php
									$page_query=mysqli_query($db,"SELECT * FROM pages WHERE is_valid_advertise='Yes'");
									while($page_row=mysqli_fetch_array($page_query))
									{
										echo"<option value=".$page_row['id'].">".$page_row['name']."</option>";
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="Name">Position Name</label>
							<input type="text" class="form-control" id="position_name" name="position_name" placeholder="Enter position name" required>
						</div>
					
				
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
       </div>
   </div>
      </form>
	</div>
    </div>
 
</section>
    <!-- /.content -->
   </div>
</div>

   <?php require('footer.php'); ?>

 