<?php  
	session_start();
	include('admin/config.php');
	$status="";
	$message="";
	$user_id=$_SESSION['user_id'];
	$email=$_SESSION['email'];
	$first_name=$_SESSION['first_name'];
	if(isset($_POST['submit']))
	{
		$subject=$_POST['subject'];
		$department=$_POST['department'];
		$related_services=$_POST['related_services'];
		$priority=$_POST['priority'];
		$message=$_POST['message'];
		$ticketNo = 'FD/'.date('Y').date('m').date('d').'/'.rand();
		if(isset($_FILES['upload_file'])){ 
					$errors = array();
					$file_name =  str_replace(" ", "", $_FILES['upload_file']['name']);
					$file_size = $_FILES['upload_file']['size'];
					$file_tmp = $_FILES['upload_file']['tmp_name'];
					$file_type = $_FILES['upload_file']['type'];
					$file_array = explode('.',$file_name);
					$file_name = "uploadTicket/".$file_name;
					$file_ext = strtolower(end($file_array));
					
					$total = count($_FILES['upload_file']['name']);
					
					if($total > 0){
						move_uploaded_file($file_tmp,$file_name);

					}else{
						$file_name = '';
					}
								
				//$attachment_file="uploadTicket/".$file_name;
		
		$sql="INSERT INTO support_ticket(customer_id,ticket_no,subject,department_id,related_services,priority,message,attachment_file) VALUES ('$user_id','$ticketNo','$subject','$department','$related_services','$priority','$message','$file_name')";
		$result=mysqli_query($db,$sql);
		if($result)
		{
			$status = 'success';
			$message = 'Your ticket has been generated successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
			}
	}
	}
	
?>
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="style.css">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
  

	

</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
	
	
    
	  <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area Start >>>>>>>>>>>>>>>>>>>>>>>> -->
    <div class="my_profile_area section_padding_50">
        <div class="container">
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
		<div class="row">
		<div class="col-sm-12">
		  <div class="section_heading new_arrivals">
                        <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
                    </div>
					</div>
					</div>
            <div class="row">
			
				<div class="col-12 col-md-3">
				<?php $currentPage = 'Support'; 
					include('sidebar.php'); ?>
                </div>
		<div class="col-12 col-md-6">
                    <div class="profile_form">
                        <form action="#" method="post" class="text-left" enctype="multipart/form-data">
                            <div class="row">
							<div class="col-12 col-md">
                                    <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $first_name;?>" disabled>
                            </div>
                                </div>
                                <div class="col-12 col-md">
                                    
                            <div class="form-group">
                                <label for="">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>" disabled>
                            </div>
                                </div>
                                
                            </div>
							
							<div class="row">
                                <div class="col-12 col-md">
                                    
                            <div class="form-group">
                                <label for="">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject">
                            </div>
                                </div>
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                <label for="">Department</label>
                                	<div class="controls">
    					<select name="department" class="form-control">
    						<option value="">Select Department</option>
							<?php
							$department_query=mysqli_query($db,"SELECT	* FROM department");
							while($department_row=mysqli_fetch_array($department_query)){
								echo "<option value=".$department_row['id'].">".$department_row['name']."</option>";	
							}
							?>	
    						
							</select>
                            </div>
                            </div>
                                </div>
                            </div>
							
							<div class="row">
                                 <div class="col-12 col-md" style="display:none;">
                                    <div class="form-group">
                                <label for="">Related Service</label>
                                	<div class="controls">
    					<select name="related_services" class="form-control">
    						<option value="">Select Related Service</option>
							<?php
							$department_query=mysqli_query($db,"SELECT	* FROM related_services");
							while($department_row=mysqli_fetch_array($department_query)){
								echo "<option value=".$department_row['name'].">".$department_row['name']."</option>";	
							}
							?>	
							</select>
                            </div>
                            </div>
                                </div>
								<input type="hidden" name="related_services" value="0" />
                                <div class="col-12 col-md">
                                    <div class="form-group">
                                <label for="">Priority</label>
                                	<div class="controls">
    					<select name="priority" class="form-control">
    						<option value="">Select Priority</option>
    					    <option >Low</option>	
						  <option >Medium</option>
							<option >High</option>
							</select>
                            </div>
                            </div>
                                </div>
                            </div>
							
                             <div class="row">
							<div class="col-12 col-md">
                                    <div class="form-group">
                                <label for="">Message</label>
                               <textarea class="form-control" name="message"row="2"> </textarea>
                            </div>
                                </div>
                            
                                
                            </div>
							<div class="row">
							<div class="col-12 col-md">
                                    <div class="form-group">
                            <input type="file" name="upload_file" class="form-control-file" id="upload-new-thumb">
                        </div>
                                </div>
                            
                                
                            </div>
                          
                            <button type="submit" class="btn btn-success " name="submit">Submit</button>
                            <button type="submit" class="btn btn-secondary">Cancel</button>
                        </form>
                    </div>
                </div>
				  <div class="col-12 col-md-3">
                    
                   <!--<button type="submit" class="btn btn-outline-primary ">Submit New Ticket</button> -->
                </div>
				

              
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
	

     <?php include("footer.php");?>

   
		
</body>

</html>