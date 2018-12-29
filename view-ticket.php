<?php
	session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }	
	require('admin/config.php');
	$user_id=$_SESSION['user_id'];
	$support_ticket_id=base64_decode($_GET['id']);
	if(isset($_POST['reply']))
	{
		$message=$_POST['message'];
		$employee_id=$_POST['employee_id'];
		if(isset($_FILES['upload_file'])){ 
					$errors = array();
					$file_name =  str_replace(" ", "", $_FILES['upload_file']['name']);
					$file_size = $_FILES['upload_file']['size'];
					$file_tmp = $_FILES['upload_file']['tmp_name'];
					$file_type = $_FILES['upload_file']['type'];
					$file_array = explode('.',$file_name);

					$file_ext = strtolower(end($file_array));
					$file_name = "uploadTicket/".$file_name;
					$file_ext = strtolower(end($file_array));
					
					$total = count($_FILES['upload_file']['name']);
					
					if($total > 0){
						move_uploaded_file($file_tmp,$file_name);

					}else{
						$file_name = '';
					}											
				}				
				
					$ticket_row_query="INSERT INTO suport_ticket_rows(support_ticket_id,message,attachment_file,customer_id,employee_id) VALUES ('$support_ticket_id','$message','$file_name','$user_id','$employee_id')";
				$ticket_result=mysqli_query($db,$ticket_row_query);
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
  
<style>

</style>
	

</head>

<body>
    <!-- ***** Header Area Start ***** -->
     <?php include("header.php");?>
	
	
    
	  <!-- <<<<<<<<<<<<<<<<<<<< Manage Profile Area Start >>>>>>>>>>>>>>>>>>>>>>>> -->
    <div class="my_profile_area section_padding_50">
        <div class="container">
		<div class="row">
		<div class="col-sm-12">
		  <div class="section_heading new_arrivals">
                       <h1><?php echo $_SESSION['reg_type']; ?> Details</h1>
                    </div>
					</div>
					</div>
            <div class="row">
			
			  <div class="col-12 col-md-3">
				<?php $currentPage ='My Support Tickets'; 
						include('sidebar.php'); ?>
                </div>
               

               
				
				

                <div class="col-12 col-md-9">
				<div class="row">
				
                  <div class="col-sm-6">
                        <h2>View Tickets</h2>
				   </div>
				   </div>
				   <?php
							$query="SELECT * FROM support_ticket WHERE id='$support_ticket_id'";
							$result=mysqli_query($db,$query);
							$i=1;
							$employee_id=0;
							while($ticket=mysqli_fetch_array($result))
							{
								$support_ticket_id=$ticket['id'];
								$employee_id=$ticket['employee_id'];

								
						?>
                       
                 <div class="view-ticket">
						<div class="active item">

							<div class="carousel-info">
								<img alt="" src="img/bg-img/user.jpg" class="pull-left">
								<div class="pull-left">
									<span class="view-ticket-name"><?php $user_id=$ticket['customer_id'];
										$ticket_query="SELECT * FROM registration WHERE id='$user_id'";
										$ticket_result=mysqli_query($db,$ticket_query);
										while($ticket_row=mysqli_fetch_array($ticket_result))
										{
												echo ucfirst($ticket_row['first_name']);
										}
									?></span>
									
								</div>
							<div class="pull-right">
								<a href="#" ><?php  $ticket['attachment_file']; ?>
					 				
								</a>
							</div>
							</div>
							<p>
							<strong>Ticket No:</strong>
							<?php echo"&nbsp;".$ticket['ticket_no'];?><br><br>
							
							<strong>Subject:</strong>
							<?php echo"&nbsp;".$ticket['subject'];?><br><br>
							<strong>Department:</strong>
							<?php $department_id=$ticket['department_id'];
								$query_department=mysqli_query($db,"SELECT name FROM department WHERE id=$department_id");
								while($result_department=mysqli_fetch_array($query_department)){
								echo"&nbsp;". $result_department['name'];
							} ?>
							<br><br>
							<strong>Related Services:</strong>
							<?php echo"&nbsp;". $ticket['related_services'];?><br><br>
							<strong>Priority:</strong>
							<?php echo"&nbsp;". $ticket['priority'];?><br><br>
							<strong>Message:</strong>
							<?php echo"&nbsp;". $ticket['message'];?><br><br>
							<strong>Attachment File:</strong>
								<a href="<?php echo $ticket['attachment_file'];?>" target="_blank" >Click Here</a>
							<br><br>
							<strong>Status:</strong>
							<?php echo"&nbsp;". $ticket['status'];?><br><br>
							</p>
						</div>
				</div>
			<?php } ?>
				 <?php
						$ticket_info_query=mysqli_query($db,"SELECT * FROM suport_ticket_rows WHERE support_ticket_id='$support_ticket_id'");
						$a = 0;
						while($ticket_info_result=mysqli_fetch_array($ticket_info_query))
						{
							$a++;
							$attachment_file=$ticket_info_result['attachment_file'];
							$customer_id=$ticket_info_result['customer_id'];
					?>
				 <div class="view-ticket">
						<div class="active item">

							<div class="carousel-info">
								<img alt="" src="img/bg-img/user.jpg" class="pull-left">
								<div class="pull-left">
									<span class="view-ticket-name">
									<?php 
										if($customer_id==NULL){
											$employee_name=mysqli_query($db,"SELECT * FROM employee_master WHERE id='$employee_id'");
											while($name_row=mysqli_fetch_array($employee_name))
											{
												echo"Reply From &nbsp;". ucfirst($name_row['name']);
												
											}
										}else
										{
											$ticket_query="SELECT * FROM registration WHERE id='$customer_id'";
											$ticket_result=mysqli_query($db,$ticket_query);
											while($ticket_row=mysqli_fetch_array($ticket_result))
											{
													echo "Reply From &nbsp;".ucfirst($ticket_row['first_name']);
											}	
										}
									?>
									</span>
									
								</div>
							
							<div class="pull-right">
								<?php  $attachment_file= str_replace('../','',$ticket_info_result['attachment_file']) ; ?>
								<a href="<?php echo $attachment_file; ?>" title="Download File" target="_blank">
									<i class="fa fa-cloud-download" style="font-size:30px;"></i>
								</a>
							</div>
							</div>
							<p><?php echo $ticket_info_result['message'];?></p>
						</div>
				</div>
						<?php }?>
						 <div class="col-sm-12 ">
							<button type="button" class="btn btn-outline-primary pull-right" data-toggle="modal" data-target="#myModal">Reply <i class="fa fa-reply"> </i> </button>
						</div>
		</div>

          </div>    
            </div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
	 <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	<form method="post" action="" enctype="multipart/form-data">
		<div class="modal-header">
		 <h2 class="modal-title">Reply</h2>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
		  <input type="hidden" class="" name="employee_id" value="<?php echo @$employee_id;?>">
			<label for="">Message</label>
				<input type="text" class="form-control" id="message" name="message">
		</div>
		<div class="form-group">
			<label for="">Attach File</label>
			<input type="file" class="form-control" id="upload_file" name="upload_file">
		</div>  
        </div>
        <div class="modal-footer">
          <button type="submit"  name="reply" class="btn btn-default" >Submit</button>
        </div>
	</form>
      </div>
      
	</div>
  </div>
</body>
</html>
  <?php include("footer.php");?>