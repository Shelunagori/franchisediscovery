<?php
require('config.php');
require('header.php');

$user_id=$_SESSION['login_id'];

$status = '';
$message = '';
	if(isset($_POST['add']))
	{
		$page_id=$_POST['page_id'];
		$position_name=$_POST['position_name'];
		$link_url=$_POST['link_url'];
		$start_date=date($_POST['start_date']);
		$end_date=date($_POST['end_date']);
		$current_dates=$_POST['current_date'];
		if(isset($_FILES['upload_file'])){ 
					$errors = array();
					$file_name =  str_replace(" ", "", $_FILES['upload_file']['name']);
					$file_size = $_FILES['upload_file']['size'];
					$file_tmp = $_FILES['upload_file']['tmp_name'];
					$file_type = $_FILES['upload_file']['type'];
					$file_ext = strtolower(end(explode('.',$_FILES['upload_file']['name'])));
					$extension = array("jpeg",'jpg');
						if(in_array($file_ext,$extension) == false){
							$errors[]="extension not allowed";
						} 

							if($file_size > 2097152){
								$errors[]="file size must be exactly 2 mb";
							}

								if(empty($errors)==true){
									move_uploaded_file($file_tmp,"uploadProfile/".$file_name);

								}else{
									print_r($errors);
								}
								}
					
			
			
			
			
			$image="uploadProfile/".$file_name;


	$add_query="INSERT INTO advertise (page_id,position_name,image,link_url,start_date,end_date,user_id,current_dates) VALUES ($page_id,'$position_name','$image','$link_url','$start_date','$end_date','$user_id','$current_dates')";
		if($db->query($add_query) === TRUE)
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

		if(isset($_POST['edit']))
		{
		$page_id= mysqli_real_escape_string($db,$_POST['page_id']);
		$position_name= mysqli_real_escape_string($db,$_POST['position_name']);
		$image= mysqli_real_escape_string($db,$_POST['image']);
		$link_url= mysqli_real_escape_string($db,$_POST['link_url']);
		$start_date= mysqli_real_escape_string($db,$_POST['start_date']);
		$end_date= mysqli_real_escape_string($db,$_POST['end_date']);
		$current_dates= mysqli_real_escape_string($db,$_POST['current_date']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
	$data_update = "update advertise set page_id=$page_id,position_name='$position_name',image='$image',link_url='$link_url',start_date='$start_date',end_date='$end_date',current_dates='$current_dates' where id = '$id'";
			if ($db->query($data_update) === TRUE) {
				
				$status='success';
			}
			 else {
				$status = 'fail';
			}
		}

?>



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
			  <h3 class="box-title">Advertise Form</h3>
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
						<div class="form-group">
							<label for="Name">Pages</label>
							<select name="page_id" id="page_id" class="form-control">
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
							<label for="Name">Position</label>
							<select name="position_name" id="position_name" class="form-control">
							</select>
						</div>
						<div class="form-group">
						<label for="Name">Image</label>
										<input name="upload_file" type="file" class="form-control " required id="file" onchange="return fileValidation()"/>

						</div>
						<div class="form-group">
							<label for="Name">Link URL</label>
							<input type="text" name="link_url" id="link_url" class="form-control">
							</select>
						</div>
						<div class="form-group">
							<label for="Name">Start Date</label>
							<input type="text" name="start_date" id="start_date" class="form-control">
							</select>
						</div>
						<div class="form-group">
							<label for="Name">End Date</label>
							<input type="text" name="end_date" id="end_date" class="form-control">
							</select>
						</div>
						<div class="form-group">
							<label for="Name">Current date</label>
							<input type="text" class="form-control" name="current_date" 
							id="current_date" value="<?php echo date('m/d/y');?>"/>
							</select>
						</div>
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
    
      </form>
	</div>
    </div>
 
</section>
    <!-- /.content -->
   </div>
</div>

   <?php require('footer.php'); ?>

<script>
	$(document).ready(function(){
		$('#page_id').on('change',function(){
		 	alert();
	                var page_id = $(this).val();
	               
	                $.ajax({
	                 url : 'acc_page.php?page_id='+page_id,    
	                    success: function(result){
	                    	alert(result)
	                       $('#position_name').html(result);
	                       
	                    }
	                });
	                
	            });
		 $('#start_date').datepicker();
		 $('#end_date').datepicker();
	});
</script>