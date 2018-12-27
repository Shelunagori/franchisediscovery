<?php 
require('header.php');
require('config.php');

$status = '';
$message = '';
$where='';
$brand_where='';
$id='';

if(isset($_GET['ok']))
			{
				$first_name=$_GET['name'];
				$email=$_GET['email'];
				$city=$_GET['city'];
				$from_date= $_GET['from_datepicker']?date('d-m-Y',strtotime($_GET['from_datepicker'])):null;
				if(!$from_date==null)
					$from=$from_date;

				$to_date= $_GET['to_datepicker']?date('d-m-Y',strtotime($_GET['to_datepicker'])):null;
				if(!$to_date==null)
					$to=$to_date;
				$id='franchise';

				if(!$first_name == null && $email == null && $city == null && @$from == null  && @$to == null)
				{
					$where=" AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && !$email==null && $city==null && @$from== null && @$to == null)
				{
					$where="AND email LIKE '%$email%'";
				}

				else if($first_name==null && $email==null && !$city==null && @$from== null 
					&& @$to == null)
				{
					$where="AND city LIKE '%$city%'";
				}

				else if($first_name==null && $email==null && $city==null && !@$from== null && !@$to == null)
				{
					$where="AND enquite_date BETWEEN '$from' AND '$to'";
				}
				else if(!$first_name==null && !$email==null && !$city==null && !@$from== null && !@$to == null)
				{
					$where="AND enquite_date BETWEEN '$from' AND '$to' AND email LIKE '%$email%' AND name LIKE '%$first_name%' AND city LIKE '%$city%' ";
				}
				else if($first_name==null && $email==null && $city==null && !@$from== null && @$to == null)
				{
					$where="AND  enquite_date > '$from'";
				}
				else if($first_name==null && $email==null && !$city==null && @$from== null && !@$to == null)
				{
					$where="AND  enquite_date > '$to'";
				}
				else if(!$first_name==null && !$email==null && $city==null && @$from== null && @$to == null)
				{
					$where="AND  email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				else if(!$first_name==null && $email==null && !$city==null && @$from== null && @$to == null)
				{
					$where="AND  city LIKE '%$city%' AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && !$email==null && !$city==null && @$from== null && @$to == null)
				{
					$where="AND  email LIKE '%$email%' AND city LIKE '%$city%'";
				}
				
			}
			
			if(isset($_POST['brand_filter']))
			{
				$first_name=$_POST['name'];
				$email=$_POST['email'];
				$from_date= $_POST['from_datepicker']?date('d-m-Y',strtotime($_POST['from_datepicker'])):null;
				if(!$from_date==null)
					$from=$from_date;

				$to_date= $_POST['to_datepicker']?date('d-m-Y',strtotime($_POST['to_datepicker'])):null;
				if(!$to_date==null)
					$to=$to_date;

				if(!$first_name == null && $email == null && @$from == null  && @$to == null)
				{
					$brand_where="AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && !$email==null && @$from== null && @$to == null)
				{
					$brand_where="AND email LIKE '%$email%'";
				}

				

				else if($first_name==null && $email==null && !@$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date BETWEEN '$from' AND '$to'";
				}
				else if(!$first_name==null && !$email==null && !@$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date BETWEEN '$from' AND '$to' AND email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && $email==null && !@$from== null && @$to == null)
				{
					$brand_where="AND  enquite_date > '$from'";
				}
				
				else if(!$first_name==null && !$email==null && @$from== null 
					&& @$to == null)
				{
					$brand_where="AND  email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				
				else if($first_name==null && $email==null && @$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date > '$to'";
				}
				
				

		}
			
	if(@$_GET["del"] == "del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "update enquire set status = 'Deactive' where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Enquire deleted successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}


?>

<link href="plugins/datepicker/datepicker3.css" rel="stylesheet">

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
				<?php 	if($status == 'success')
							{
								$status = 'success';
								$message = 'Brand created successfully !';
							} else if($status == 'fail') {
								$status = 'fail';
								$message = 'Something went wrong !';
							}
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
		</div>
		<div class="row">
			<div class="col-md-12">
					  <div class="box">
						<div class="box-header">
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Enquire Reports</h3>
						</div>
						<div class="box-body">
							
							<div id="exTab2">	
								<ul class="nav nav-tabs">
									<li class="active"><a  href="#1" data-toggle="tab">Franchise </a></li>
									<li><a href="#2" data-toggle="tab">Brand</a></li>
								</ul>
					
							<div class="tab-content">
								<div class="tab-pane active" id="1">

									<?php
									if(!empty($where)){
										$sql= "select * from enquire where status = 'Active' AND enquire_type='franchise' $where order by id DESC ";
									}else{
										$sql= "select * from enquire where status = 'Active' AND enquire_type='franchise' order by id DESC ";
										}							
										$query_result=mysqli_query($db,$sql);
										$sno = 1;
										if(!empty($query_result)){  ?>
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
									<input type="text" name="city" placeholder="Enter city" class="form-control">
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
									<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Date</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>City</th>
												<th>Brand Name</th>
												<th>Investment</th>
												<th>Requirement</th>
												<th>Message</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($query_result)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td> <?php echo $row['enquite_date'];  ?> </td>
												<td> <?php echo $row['name'];  ?> </td>
												<td> <?php echo $row['email'];  ?> </td>
												<td>  <?php echo $row['mobile']; ?></td>
												<td>  <?php echo $row['city']; ?></td>
												<td>  <?php echo $row['brand_name']; ?></td>
												<td>  <?php echo $row['investment']; ?></td>
												<td>  <?php echo $row['requirment']; ?></td>
												<td>  <?php echo $row['message']; ?></td>
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="enquire_report.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>								
									<?php  } else {  echo 'No Record Found !';  } ?>									
								</div>
								
				<div class="tab-pane" id="2">	
					<form class="form2" method="post" enctype="multipart/form-data"  action="#">
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
										<input type="text" class="form-control pull-right datepicker" id="datepicker2" name="from_datepicker" placeholder="From Date" data-date-format="mm-dd-yyyy">
									</div>
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker3" name="to_datepicker" placeholder="To Date">
									</div>
								</td>

								<td>
									<button class="btn btn-primary" type="submit" name="brand_filter" id="brand_filter">Filter</button>
								</td>
							</tr>
						</table>
					</form>
									<?php  
									if(!empty($brand_where)){
											$sql1= "select * from enquire where status = 'Active' AND enquire_type='brand' $brand_where order by id DESC ";
											$id='brand';
										}else{
											$sql1= "select * from enquire where status = 'Active' AND enquire_type='brand' order by id DESC ";
										}
									$sql_result=mysqli_query($db,$sql1); 
										$sno = 1;
										if(!empty($sql_result)){  ?>
									<table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Date</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile</th>
												<th>Brand Name</th>
												<th>Brand Origin</th>
												<th>Message</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody class="main-body">
											<?php 
											
											while($row=mysqli_fetch_array($sql_result)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td> <?php echo $row['enquite_date'];  ?> </td>
												<td> <?php echo $row['name'];  ?> </td>
												<td> <?php echo $row['email'];  ?> </td>
												<td>  <?php echo $row['mobile']; ?></td>
												<td>  <?php echo $row['brand_name']; ?></td>
												<td>  <?php echo $row['brand_origin']; ?></td>
												<td>  <?php echo $row['message']; ?></td>
												<td>
													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="enquire_report.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>								
									<?php  } else {  echo 'No Record Found !';  } ?>	
									
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
            
   $('#datepicker').datepicker({
      autoclose: true,
	});
	$('#datepicker1').datepicker({
      autoclose: true,
    });
     $('#datepicker2').datepicker({
      autoclose: true,
	});
	$('#datepicker3').datepicker({
      autoclose: true,
    });
     $('#brand_filter').on('click', function(){
    	$('#1').removeClass('active');
    	$('#2').addClass('active');

   });

	</script>
