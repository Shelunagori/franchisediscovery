<!DOCTYPE html>
<?php session_start();
	include('admin/config.php');
	$email=$_SESSION['email']; 
	$password=$_SESSION['password'];
	$mobile_no=$_SESSION['mobile_no'];
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];	
	$profile = $_SESSION['profile'];
	$status = '';
	$message = '';

	if(isset($_POST['save'])){
		
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		
		$create_password=$_POST['create_password'];
		$current_password=$_POST['current_password'];
		$confirm_password=$_POST['confirm_password'];
		 $total = $_FILES['profile']['error']; 
		if($total == 0){ 
			$errors = array();
			$file_name =  str_replace(" ", "", $_FILES['profile']['name']);
			$file_size = $_FILES['profile']['size'];
			$file_tmp = $_FILES['profile']['tmp_name'];
			$file_type = $_FILES['profile']['type'];
			$file_ext = explode('.',$_FILES['profile']['name']);
			$file_ext = end($file_ext);
			$extension = array("jpeg",'jpg','png');
			if(in_array($file_ext,$extension) == false){
				$errors[]="Only jpg,jpeg,png extension are allowed";
			} 

			if($file_size > 2097152){
				$errors[]="file size must be less than 2 MB";
			}

			if(empty($errors)==true){
				move_uploaded_file($file_tmp,"uploadProfile/".$file_name);
				$profile="uploadProfile/".$file_name;

				$sql="update registration set first_name='$first_name',last_name='$last_name',profile='$profile' where email='$email'";
				$rs=mysqli_query($db,$sql);
				if($rs)
				{
					$_SESSION['profile']=$profile;
					$status = 'success';
					$message = 'updated successfully !';								
				}
				else
				{
					$status = 'fail';
					$message = 'Something went wrong !!';
				}
			}
			else{
				$status = 'fail';
				$message = $errors[0];
			}
		
		}
		if(!empty($current_password))
		{
			if($current_password==$password)
			{			
				$sql="update registration set password='$create_password' where email='$email'";
				$rs=mysqli_query($db,$sql);
				if($rs)
				{
					$_SESSION['password']=$create_password;
					$status = 'success';
					$message = 'updated successfully !';								
				}
				else
				{
					$status = 'fail';
					$message = 'Something went wrong !!';
				}
					
			}
			else
			{
				$status = 'fail';
				$message = 'Invalid password !!';					
			}			
		}
		
		if($first_name != '' || $last_name != '')
		{
				$sql="update registration set first_name='$first_name',last_name='$last_name' where email='$email'";
				$rs=mysqli_query($db,$sql);
				if($rs)
				{
					$_SESSION['first_name']=$first_name;
					$_SESSION['last_name']=$last_name;
					
					$status = 'success';
					$message = 'updated successfully !';								
				}
				else
				{
					$status = 'fail';
					$message = 'Something went wrong !!';
				}			
		}			
	}
	
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title  -->
    <title>Franchise Discovery</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="<?php echo $baseURL; ?>img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?php echo $baseURL; ?>css/core-style.css">
    <link rel="stylesheet" href="<?php echo $baseURL; ?>style.css">

    <!-- Responsive CSS -->
    <link href="<?php echo $baseURL; ?>css/responsive.css" rel="stylesheet">
  
	<style>
	.error{
	    color: #c54848 !important;
}
</style>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
     <?php
		include('header.php');
	 ?>
	<!-- <<<<<<<<<<<<<<<<<<<< My Profile Area Start >>>>>>>>>>>>>>>>>>>>>>>> -->
    <div class="my_profile_area section_padding_50">
        <div class="container">
		<div class="row">
		<div class="col-sm-12">
		  <div class="section_heading new_arrivals">
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
                        <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
                    </div>
					</div>
					</div>
            <div class="row">
			
				<div class="col-12 col-md-3">
					<?php $currentPage = 'Manage Profile'; 
						include('sidebar.php'); ?>
				</div>
			<div class="col-12 col-md-9">	
			<form method="post" id="regfrm" action="" enctype="multipart/form-data" >
				<div class="col-12 col-md-3">
                    <div class="profile-thumb">
						<?php if(empty($profile)) { $profile = 'img/bg-img/user.jpg'; } ?>
						<img src="<?php echo $baseURL.$profile ?>" style="width:255px; height:255px;" id="img_prev"  />
					</div>
					<div class="profile-thumb-upload mt-15">
						<div class="form-group">
							<input type="file" id="profile" onchange="readURL(this);" name="profile" class="form-control-file" id="upload-new-thumb">
						</div>
					</div>	
                </div>
				<div class="col-12 col-md-9">
                    <div class="profile_form">
							<div class="row">
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $first_name;?>" id="first_name" name="first_name" >
                                    </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $last_name;?>" id="last_name" name="last_name" >
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-12 col-md">
                                    
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <label class="form-control"><?php echo $email;?></label>
                            </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                <label for="p_number">Phone Number</label>
                                <label class="form-control"><?php echo $mobile_no;?></label> 
                            </div>
                                </div>
                            </div>

							<div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password"  name="current_password" id="current_password" class="form-control" aria-describedby="passwordHelpBlock">
                            </div>							
                            
                            <div class="form-group">
                                <label for="create_password">Create Password</label>
                                <input type="password"  name="create_password" id="create_password"class="form-control" aria-describedby="passwordHelpBlock">
                                <small id="passwordHelpBlock" class="form-text text-muted">If you don't want to change password, please leave blank.</small>
                            </div>
                             <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password"  id="confirm_password"name="confirm_password" class="form-control">
                            </div>
                            <button type="submit" name="save" class="btn btn-success ">Update Information</button>
                    </div>
                </div>				
			</form>	
			</div>
			 </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
</body>
	 <?php include("footer.php");?>
	 <script src="<?php echo $baseURL; ?>js/jquery.sticky-kit.js"></script>
  
	<script>
			$("#sidebar").stick_in_parent();

	</script>
	 <script src="<?php echo $baseURL; ?>js/jquery.validate.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>		
	<script>
		$(document).ready(function(){
			$('#regfrm').validate({
				rules:{
					profile:{
						
					},
					first_name:{
						required:true,
						lettersonly: true ,
						minlength:3
					},
					last_name:{
						required:true,
						lettersonly: true ,
						minlength:3
					},
					create_password:{
						maxlength:20
					},
					confirm_password:{
						 equalTo: "#create_password"
					},
					current_password:{
					
					}
				},
					
				messages:{
					first_name:{
						required:"First name is required",
						lettersonly:"Alphabets only"
					
					},
					last_name:{
						required:"Last name is required",
						lettersonly:"Alphabets only"

					},
					
					create_password:{
						required:"Password is required"
					},
					confirm_password:{
						required:"Confrim Password is required",
						equalTo:"Enter same password"
					},
					current_password:{
						required:"Current password required"
						 
					}
				}
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
.width(255)
.height(255);
};

reader.readAsDataURL(input.files[0]);
}
}

</script>	 

</html>