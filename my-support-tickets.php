<?php
	session_start();
	 if(!isset($_SESSION['user_id'])){
	  header("location:login.php");
   }	
	require('admin/config.php');
	$user_id=$_SESSION['user_id'];
	
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
.dropdown {
float: right;
}
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
		  <div class="faq_quesition_search_form">
                        <center><h3>My Support Tickets</h3></center>
					 </div>
      
                 <div class="shortcodes_content">
                        <table class="table bigshop-table table-responsive table-bordered">
                            <thead>
                                <tr>
									<th>S.No</th>
									<th>Ticket No</th>
									<th>Department</th>
									<th>Subject</th>
                                    <th>Status</th>
                                    <th>Last Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><?php
										$query="SELECT * FROM support_ticket WHERE customer_id='$user_id'";
										$result=mysqli_query($db,$query);
										$i=1;
										while($ticket=mysqli_fetch_array($result))
										{
											$support_ticket_id=$ticket['id'];
									?>
									<td><?= $i; $i++; ?></td>
                                    <td><a href="view-ticket.php?id=<?php echo base64_encode($support_ticket_id);?>"><?=$ticket['ticket_no'];?></a></td>
									<td><?php 	$department_id=$ticket['department_id'];
												$query_department=mysqli_query($db,"SELECT name FROM department WHERE id=$department_id");
												while($result_department=mysqli_fetch_array($query_department)){
												echo $result_department['name'];
											}
										?>
									</td>
                                    <td><a href="view-ticket.php?id=<?php echo base64_encode($support_ticket_id);?>"><?=$ticket['subject'];?></a></td>
                                    <td><?= $ticket['status'];?></td>
                                    <td><?= date('d-m-Y',strtotime($ticket['created_on']));?></td>
                                </tr>
							<?php } ?>
                            </tbody>
                        </table>
                    </div>
			</div>
		</div>
        </div>
    </div>
    <!-- <<<<<<<<<<<<<<<<<<<< My Profile Area End >>>>>>>>>>>>>>>>>>>>>>>> -->
	

     <?php include("footer.php");?>
	
</body>

</html>