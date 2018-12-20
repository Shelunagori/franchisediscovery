<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
	
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
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />

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
						</div>
						
						
						<div class="box-body">
							
							<div id="exTab2">	
								
								<div class="tab-content">
								<div class="tab-pane active" id="1">
								<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Ticket No</th>
												<th>User</th>
												<th>Subject</th>
												<th>Department</th>
												<th>Related Services</th>
												<th>Priority</th>
												
												<th>Status</th>
												<th>Employee</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$sql="SELECT * FROM support_ticket";
												$result=$db->query($sql);
												$count=0;
												while($rows = mysqli_fetch_array($result)){ $count++;
												 ?>
											<tr>
												<td><?php echo $count;?></td>
												<td><?php echo $rows['ticket_no'];?></td>
												<td><?php $user_id=$rows['customer_id'];
														$ticket_query="SELECT * FROM registration WHERE id='$user_id'";
														$ticket_result=mysqli_query($db,$ticket_query);
														while($ticket_row=mysqli_fetch_array($ticket_result))
												{
														echo $ticket_row['first_name'];
												}
												?></td>
												<td><?php echo $rows['subject']; ?></td>
												<td><?php $department_id=$rows['department_id'];
													$query_department=mysqli_query($db,"SELECT name FROM department WHERE id=$department_id");
													while($result_department=mysqli_fetch_array($query_department)){
													echo $result_department['name'];
												} ?></td>
												<td><?php echo $rows['related_services']; ?></td>
												<td><?php echo $rows['priority']; ?></td>
												
												<td>
													<select name="ticket_status" class="ticket_status" ticket_status_id=<?php echo $rows['id']; ?>>
														<option value="Pending" <?php if($rows['status'] == 'Pending') { echo 'selected'; } ?> >Pending</option>
														<option value="Completed" <?php if($rows['status'] == 'Completed') { echo 'selected'; } ?> >Completed</option>	
													</select>
												</td>
												<td>
													<select name="employee_name" class="employee_name" ticket_id=<?php echo $rows['id']; ?>>
															<option value="">Select Employee</option>
															<?php
																$employee_id=$rows['employee_id'];
																$employee_query=mysqli_query($db,"SELECT * FROM employee_master");
																while($employee_row=mysqli_fetch_array($employee_query)){

																	if($employee_id == $employee_row['id']){
																		echo "<option value=".$employee_row['id']." selected>".$employee_row['name']."</option>";
																	}
																	else{
																		echo "<option value=".$employee_row['id'].">".$employee_row['name']."</option>";
																	}
																}
															?>
													</select>												
												</td>
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" style="padding:1px 6px;" onclick="return confirm('Are you sure ?')" href="customer_list.php?Action=Del&id=<?php echo base64_encode($rows['id']); ?>">
													<span class="fa fa-times"></span>
													</a>
													<a class="mb-control1 btn btn-info btn-rounded btn-sm" style="padding:1px 6px;" href="view_ticket.php?id=<?php echo base64_encode($rows['id']); ?> ">
													<span class="fa fa-eye"></span>
													</a>
												</td>
											</tr>
											<?php  } ?>
										</tbody>
									</table>								
																	
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
 <script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>

        <script>
            $(document).ready(function(){
            $('.employee_name').change(function(){
                //Selected value
                var employee_id = $(this).val();
                var ticket_id = $(this).attr('ticket_id');
				$.ajax({
					url : 'update_ticket_employee.php?employee_id='+employee_id+'&ticket_id='+ticket_id, 	
					success: function(result){
						alert(result);
					}
				});
				
			});

            $('.ticket_status').change(function(){
                //Selected value
                var status = $(this).val();
                var ticket_id = $(this).attr('ticket_status_id');
				$.ajax({
					url : 'update_ticket_status.php?status='+status+'&ticket_id='+ticket_id, 	
					success: function(result){
						alert(result);
					}
				});
				
			});
			
		});
	</script>

