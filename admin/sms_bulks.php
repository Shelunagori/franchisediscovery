<?php 
require('header.php');
require('config.php');
$status='';
 ?>
<style>
.gallery > img{
	width: 200px;
    height: 150px;
    padding: 10px;
}
.menu > img{
	width: 200px;
    height: 150px;
    padding: 10px;
}
</style>	

<div class="content-wrapper">
    <section class="content">
       <div class="row">
        <div class="col-md-12">
			<?php if(!empty($_SESSION["status"])) 
					{  $status = $_SESSION["status"];
						if($status == 'success')
						{
							$status = 'success';
							$message = 'SMS Bulk Create successfully !';
						} else if($status == 'fail') {
							$status = 'fail';
							$message = 'Something went wrong !';
						}
						unset($_SESSION["status"]);	
					} 
					else { $status = ''; }
			if($status == 'success')
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
		<form role="form" method="post" action="save_bulk_sms.php">
        <div class="col-md-6">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create SMS Bulks</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body">
							
								<div class="col-md-12">
									<div class="form-group">
										<label class='control-label'>SMS To</label><br/>
										<div class="radio-inline">
											<label>
								<input type="radio" name="sms_to" class="sms_to"  value="employee" checked>Employee
											</label>
										</div>
										<div class="radio-inline">
											<label>
									<input type="radio" name="sms_to" class="sms_to" value="customer" >Customer
											</label>	
										</div>
										
										
										
									</div>
									<div id="cust_option_show">
										<div class="form-group">
											<label class='control-label'>Customer Type</label><br/>
											<div class="radio-inline">
												<label>
										<input type="radio" name="customer_type" class="customer_type" value="investor" checked>Investor
												</label>	
											</div>
											<div class="radio-inline">
												<label>
										<input type="radio" name="customer_type" class="customer_type" value="brand" checked>Brand
												</label>	
											</div>
											<div class="radio-inline">
												<label>
										<input type="radio" name="customer_type" class="customer_type" value="all" checked>All
												</label>	
											</div>
										</div>	
									</div>
									<div id="cust_show">
										<div class="form-group">
											<label>Customer</label>
											<select name="customer_id[]" class='form-control cust_select select2' multiple>
												<option value=''>Select Customer</option>
											</select>
										</div>
									</div>	
									<div id="emp_show">
										<div class="form-group">
											<label>Employee</label>
											<select class='form-control select2' name="employee_id[]" multiple>
												<option value=''>Select Employee</option>
												<?php
												$query=mysqli_query($db,"select * from employee_master where status = 0");
												while($row=mysqli_fetch_array($query)){
											?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
											</select>
										</div>
									</div>	
									<div class="form-group">
										<label>SMS Content</label>
										<textarea rows="10" cols="10" name="sms_content" class="form-control"></textarea>
									</div>
								</div>
							</div>	
								<div class="box-footer">	
									<div class="form-group">
										<input type="submit" class="btn btn-sm btn-primary pull-right" name="save" value="Submit">
									</div>
								</div>
					</div> 
			</div>

		</form>
		<div class="col-md-6">
			 <div class="box box-warning">
				<div class="box-header">
				  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  List of SMS Bulks</h3>
				</div>
				
				<div class="box-body table-responsive">
					<table id="example7" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
						<thead>
							<tr role="row">
								<th>S No</th>
								<th>SMS To</th>
								<th>SMS Content</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$i=1;
					$query=mysqli_query($db,"select * from sms_bulks where is_deleted = 0");
												while($row=mysqli_fetch_array($query)){
					?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row['sms_to']; ?></td>
								<td><?php echo $row['sms_content']; ?></td>
								<td>
									<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="delete_sms.php?id=<?php echo base64_encode($row['id']); ?>">
										<span class="fa fa-times"></span>
									</a>
									
									<!--<a class="mb-control1 btn btn-warning btn-rounded btn-sm" onclick="return confirm('Are you sure you want to send SMS?')" href="send_sms.php?id=<?php echo base64_encode($row['id']); ?>">
										<span class="fa fa-envelope"></span>
									</a>-->
								</td>
							</tr>
					<?php } ?>		
						</tbody>
					</table>	
				</div>
			</div>	
		
		</div>
	</div>
	</section>
</div>

<?php require('footer.php'); ?>
<script>
	$(document).ready(function() {
		$('#cust_option_show').hide();
		$('#cust_show').hide();
			$('.sms_to').on('change',function() { 
			var value = $(this).val();
			if(value == 'customer'){
				$('#emp_show').hide();
				$('#cust_option_show').show();
				$('.cust_select').val('');

			}else if(value == 'employee'){
				$('#emp_show').show();
				$('#cust_option_show').hide();
				$('#cust_show').hide();
			}
		});
		///
		$('.customer_type').on('change',function() {
			var customer_type = $(this).val();
			if(customer_type){
				$.ajax({
					url:'get_customer_ajax.php?customer_type='+customer_type,
					type: "GET",
					async: false,
					success: function(result){
						if(customer_type == 'investor' || customer_type == 'brand'){
								$('#cust_show').show();
								$('.cust_select').html(result);
						}else{
							$('#cust_show').hide();
								$('.cust_select').html('');
						}
					
					}
				});
			}
		});
		///
		var customer_type = $("input[name='customer_type']:checked").val();
			if(customer_type){
				$.ajax({
					url:'get_customer_ajax.php?customer_type='+customer_type,
					type: "GET",
					async: false,
					success: function(result){
						if(customer_type == 'investor' || customer_type == 'brand'){
								$('#cust_show').show();
								$('.cust_select').html(result);
						}else{
							$('#cust_show').hide();
								$('.cust_select').html('');
						}
					}
				});
			}
	});	
	
</script>


