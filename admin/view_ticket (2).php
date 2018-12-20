<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
		$id=base64_decode($_GET['id']);
		
			if(isset($_POST['submit']))
			{
				
				$message=$_POST['message'];
				$employee_ids=$_POST['employee_id'];
				if(isset($_FILES['upload_file'])){ 
					$errors = array();
					$file_name =  str_replace(" ", "", $_FILES['upload_file']['name']);
					$file_size = $_FILES['upload_file']['size'];
					$file_tmp = $_FILES['upload_file']['tmp_name'];
					$file_type = $_FILES['upload_file']['type'];
					$file_array = explode('.',$file_name);

					$file_ext = strtolower(end($file_array));
					$extension = array("jpeg",'jpg');
						if(in_array($file_ext,$extension) == false){
							$errors[]="extension not allowed";
						} 

							if($file_size > 2097152){
								$errors[]="file size must be exactly 2 mb";
							}

								if(empty($errors)==true){
									move_uploaded_file($file_tmp,"../uploadTicket/".$file_name);

								}else{
									print_r($errors);
								}
								
				}				
				$attachment_file="uploadTicket/".$file_name;
				$ticket_row_query="INSERT INTO suport_ticket_rows(support_ticket_id,message,attachment_file,employee_id) VALUES ('$id','$message','$attachment_file','$employee_ids')";
				$ticket_result=mysqli_query($db,$ticket_row_query);
				
			}
	
			if(@$_GET["Action"] == "Del")
			{
				$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
				$delete_query = "DELETE FROM support_ticket WHERE id='$id'";
					if ($db->query($delete_query) === TRUE) {
						$status = 'success';
						$message = 'Ticket deleted successfully !';
					} else {
						$status = 'fail';
						$message = 'Something went wrong !';
					}
			}
?>
<style>

.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }
#exTab1 .tab-content {
color : white;
background-color: #428bca;
padding : 5px 15px;
}

#exTab2 h3 {
color : white;
background-color: #428bca;
padding : 5px 15px;
}
.link{
padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
color : white;
background-color: #428bca;
padding : 5px 15px;
}
</style>

	
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
			<div class="col-md-12">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>Ticket List</h3>
					</div>
						
					<div class="box-body">
						<div id="exTab2">	
							<div class="tab-content">
								<div class="tab-pane active" id="1">
									<div class="row">
										<div class="col-12 col-md-6">
											<div class="box box-solid">
												<!-- /.box-header -->
												<div class="box-body">
													<?php
														$sql="SELECT * FROM support_ticket WHERE id='$id'";
														$result=$db->query($sql);
														$employee_id=0;
														$i=0;
														while($rows = mysqli_fetch_array($result))
														{ 
															$employee_id = $rows['employee_id'];
															$i++;
														 ?>
													<div class="box-group" id="accordion">
														<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
															<div class="panel box box-primary">
																<div class="box-header with-border">
																	<h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?=$i?>">Main ticket</a></h4>
																	<p style="float:right;"></p>
																</div>
																<div id="collapseOne<?=$i?>" class="panel-collapse collapse">
																	<div class="box-body">
																	  	<h4><?php $user_id=$rows['customer_id'];
																							$ticket_query="SELECT * FROM registration WHERE id='$user_id'";
																							$ticket_result=mysqli_query($db,$ticket_query);
																							while($ticket_row=mysqli_fetch_array($ticket_result))
																					{
																							echo $ticket_row['first_name'];
																					}
																					?></h4>
																					<table class="table table-striped">
																						<tr>
																							<td><strong>Subject</strong></td>
																							<td><?php echo $rows['subject']; ?></td>
																						</tr>
																						<tr>
																							<td><strong>Department</strong></td>
																							<td><?php $department_id=$rows['department_id'];
																							$query_department=mysqli_query($db,"SELECT name FROM department WHERE id=$department_id");
																							while($result_department=mysqli_fetch_array($query_department)){
																							echo $result_department['name'];
																						} ?></td>
																						</tr>
																						<tr>
																							<td><strong>Related Services</strong></td>
																							<td><?php echo $rows['related_services']; ?></td>
																						</tr>
																						<tr>
																							<td><strong>Priority</strong></td>
																							<td><?php echo $rows['priority']; ?></td>
																						</tr>
																						<tr>
																							<td><strong>Message</strong></td>
																							<td><?php echo $rows['message']; ?></td>
																						</tr>
																						<tr>
																							<td><strong>Attachment File</strong></td>
																							<td><?php echo $rows['attachment_file']; ?></td>
																						</tr>
																						<tr>
																							<td><strong>Status</strong></td>
																							<td><?php echo $rows['status']; ?></td>
																						</tr>
																	<tr>
																		<td><strong>Employee</strong></td>
																		<td>
																			<?php
																				$employee_id=$rows['employee_id'];
																				$employee_query=mysqli_query($db,"SELECT * FROM employee_master WHERE id='$employee_id'");
																				while($employee_row=mysqli_fetch_array($employee_query)){
																					
																					echo $employee_row['name'];
																				}
																			?>
																		</td>
																	</tr>
																</table>
															<?php } ?>
														
													</div>
												
											</div>
										</div>
								</div>
												</div>


												<div class="box-body">
													<?php
														$ticket_info_query=mysqli_query($db,"SELECT * FROM suport_ticket_rows WHERE support_ticket_id='$id'");
														$a = 0;
														while($ticket_info_result=mysqli_fetch_array($ticket_info_query))
														{
															$a++;
															$attachment_file=$ticket_info_result['attachment_file'];
															$customer_id=$ticket_info_result['customer_id'];
													?>
													<div class="box-group" id="accordion">
														<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
															<div class="panel box box-primary">
																<div class="box-header with-border">
																	<h4 class="box-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapsetwo<?=$a?>"><?php 
																		if($customer_id==NULL){
																			echo"Reply From Admin";
																		}
																		else
																		{
																			$employee_name=mysqli_query($db,"SELECT * FROM employee_master WHERE id='$employee_id'");
																			while($name_row=mysqli_fetch_array($employee_name))
																			{
																				echo"Reply From &nbsp;". $name_row['name'];
																				
																			}
																		}
																	?></a></h4>
																	<p style="float:right;"><?php $date=$ticket_info_result['last_update'];
																		echo $date=date('d-m-y',strtotime($date));
																	?></p>
																</div>
																<div id="collapsetwo<?=$a?>" class="panel-collapse collapse <?= ($a == mysqli_num_rows($ticket_info_query))?'in':''?>">
																	<div class="box-body">
																	  <label><?php echo $ticket_info_result['message']; ?></label><br>
																	  <a target="_blank" class="mb-control1 btn btn-info btn-rounded btn-sm"href="view_image.php?image=<?php echo base64_encode($attachment_file);?>"><span class="fa fa-file-image-o"></span>Attachment File
																	  </a>
																	</div>
																</div>
															</div>
													</div>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="col-12 col-md-6">
											<form role="form" method="post" action="#" enctype="multipart/form-data">
												<div class="box box-primary">
													<h3 style="color: #333;background-color: #fff;">Add Message</h3>
												</div>
												<input type="hidden" class="" name="employee_id" value="<?php echo @$employee_id;?>">
												<div class="form-group">
													<label for="">Message</label>
														<input type="text" class="form-control" id="message" name="message">
												</div>
												<div class="form-group">
													<label for="">Attach File</label>
													<input type="file" class="form-control" id="upload_file" name="upload_file">
												</div>
												<div class="box-footer">
													<button type="submit" class="btn btn-info pull-right" name="submit">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			<!-- /.box -->
			</div>		
		</div>
	</section>
</div>	


<?php
require('footer.php');
?>

        <script>
            $(document).ready(function(){
            $('.employee_name').change(function(){
                //Selected value
                var employee_id = $(this).val();
                var user_id = $(this).attr('userid');
				$.ajax({
					url : 'update_ticket_employee.php?employee_id='+employee_id+'&userid='+user_id, 	
					success: function(result){
						alert(result);
					}
				});
				
			});
		});
	</script>
	

