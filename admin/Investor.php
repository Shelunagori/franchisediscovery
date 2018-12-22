<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
	$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor'";

			if(isset($_GET['ok']))
			{
				$first_name=$_GET['name'];
				$email=$_GET['email'];
				$from_date= $_GET['from_datepicker']?date('Y-m-d',strtotime($_GET['from_datepicker'])):null;
				if(!$from_date==null)
					$from=$from_date." 00:00:00.000000";

				$to_date= $_GET['to_datepicker']?date('Y-m-d',strtotime($_GET['to_datepicker'])):null;
				if(!$to_date==null)
					$to=$to_date." 00:00:00.000000";

				if(!$first_name==null && $email==null && @$from==null && @$to==null)
				{
					$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor' AND first_name LIKE '%$first_name%'";
				}
				else if($first_name==null && !$email==null && @$from==null && @$to==null)
				{
					echo$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor' AND email LIKE '%$email%'";
				}

				else if($first_name==null && $email==null && !@$from==null && !@$to==null)
				{
					$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor' AND created_on BETWEEN '$from' AND '$to'";
				}
				else if(!$first_name==null && !$email==null && @$from==null && @$to==null)
				{
					$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor' AND first_name LIKE '%$first_name%' AND email LIKE '%$email%'";
				}
				else if(!$first_name==null && !$email==null && !@$from==null && !@$to==null)
				{
					$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor' AND first_name LIKE '%$first_name%' AND email LIKE '%$email%' AND created_on BETWEEN '$from' AND '$to'";
				}
				else if($first_name==null && $email==null && !@$from==null && @$to==null)
				{
					echo$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor'AND created_on > '$from'";
				}
				else if($first_name==null && $email==null && @$from==null && !@$to==null)
				{
					echo$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor'AND created_on < '$to'";
				}

			}
	
			if(@$_GET["Action"] == "Del")
			{
				$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
				$delete_query = "update registration set status = 0 where id = '$id' and status = 1";
					if ($db->query($delete_query) === TRUE) {
						$status = 'success';
						$message = 'Customer deleted successfully !';
					} else {
						$status = 'fail';
						$message = 'Something went wrong !';
					}
			}
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="plugins/datepicker/datepicker3.css" rel="stylesheet">

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
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i> Investor Customer List</h3>
						  <div class="box-tools">
							<a href="Investor.php" class="btn btn-primary">Verified Users</a>
							<a href="InvestorNo_verified.php" class="btn btn-danger" >Not Verified Users</a>
							
						</div>
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
						<form method="get" enctype="multipart/form-data">
							<table class='table table-striped'>
							<tr>
								<td width="20%">
									<input type="name" name="name" placeholder="Enter name" class="form-control">
								</td>
								<td width="20%">
									<input type="text" name="email" placeholder="Enter email" class="form-control">
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker" name="from_datepicker" placeholder="From Date" data-date-format="mm-dd-yyyy">
									</div>
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker1" name="to_datepicker" placeholder="To Date">
									</div>
								</td>
								<td>
									<button class="btn btn-primary" type="submit" name="ok">Filter</button>
								</td>
							</tr>
						</table>
						</form>
						
						<div class="box-body">
							
							<div id="exTab2">	
								
								<div class="tab-content">
								<div class="tab-pane active" id="1">
								<table id="example1" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Register On</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Mobile No</th>
												<th>Email</th>
												<th>Reg_Type</th>
												<th>Employee</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>
											<?php
												
												$result=mysqli_query($db,$sql);
												$count=0;
												while($rows =mysqli_fetch_array($result)){ $count++;
												 ?>
											<tr>
												<td><?php echo $count;?></td>
												<td><?php echo date('d-m-Y',strtotime($rows['updated_on'])); ?></td>
												<td><?php echo ucfirst($rows['first_name']); ?></td>
												<td><?php echo ucfirst($rows['last_name']); ?></td>
												<td><?php echo $rows['mobile_no']; ?></td>
												<td><?php echo $rows['email']; ?></td>
												<td><?php echo $rows['reg_type']; ?></td>
												<td>
													<select name="employee_name" class="employee_name" userid=<?php echo $rows['id']; ?>>
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
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="Investor.php?Action=Del&id=<?php echo base64_encode($rows['id']); ?>">
													<span class="fa fa-times"></span>
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
 
<script strc="plugins/datepicker/bootstrap-datepicker.js"></script>

        <script>
            $(document).ready(function(){
            $('.employee_name').change(function(){
                //Selected value
                var employee_id = $(this).val();
                var user_id = $(this).attr('userid');
				$.ajax({
					url : 'update_employee.php?employee_id='+employee_id+'&userid='+user_id, 	
					success: function(result){
						
					}
				});
				
			});
		});
           $('#datepicker').datepicker({
      autoclose: true,
	  format: 'mm-dd-YYYY'
	});
	$('#datepicker1').datepicker({
      autoclose: true,
	  format: 'mm-dd-yyyy'
    });
	</script>


