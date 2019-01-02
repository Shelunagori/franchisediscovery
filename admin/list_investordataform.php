<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
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


				if(!$first_name==null && $email == null && @$from == null && @$to == null)
				{
					$where="name LIKE'%$first_name%'";
				}
				else if($first_name==null && !$email==null && @$from==null && @$to==null)
				{
					$where="email LIKE'%$email%'";
				}

				else if($first_name==null && $email==null && !@$from==null && !@$to==null)
				{
					echo$where="created_on BETWEEN '$from' AND '$to'";
				}
				else if(!$first_name==null && !$email==null && @$from==null && @$to==null)
				{
					$where=" name LIKE'%$first_name%' AND email LIKE '%$email%'";
				}
				else if(!$first_name==null && !$email==null && !@$from==null && !@$to==null)
				{
					$where="name LIKE'%$first_name%' AND email LIKE '%$email%' AND created_on BETWEEN '$from' AND '$to'";
				}
				else if($first_name==null && $email==null && !@$from==null && @$to==null)
				{
					$where="created_on > '$from'";
				}
				else if($first_name==null && $email==null && @$from==null && !@$to==null)
				{
					$where="AND created_on < '$to'";
				}
				else if(!$first_name==null && $email==null && @$from==null && !@$to==null)
				{
					$where="created_on < '$to' AND name LIKE'%$first_name%'";
				}
				else if(!$first_name==null && $email==null && !@$from==null && @$to==null)
				{
					$where="created_on > '$from' AND name LIKE'%$first_name%'";
				}
				else if($first_name==null && !$email==null && !@$from==null && @$to==null)
				{
					$where="created_on > '$from' AND email LIKE'%$email%'";
				}
				else if($first_name==null && !$email==null && @$from==null && !@$to==null)
				{
					$where="created_on <'$to' AND email LIKE'%$email%'";
				}
				else if($first_name==null && !$email==null && !@$from==null && !@$to==null)
				{
					$where="created_on BETWEEN '$from' AND '$to' AND email LIKE'%$email%'";
				}
				else if(!$first_name==null && $email==null && !@$from==null && !@$to==null)
				{
					$where="created_on BETWEEN '$from' AND '$to' AND name LIKE'%$first_name%'";
				}
			
	}
		if(!empty($where)){
			$query= "select * from investor_datas where $where order by id DESC ";
		}else{
			$query= "select * from investor_datas order by id DESC ";
		}
		if(isset($_POST['edit']))
		{
		$name= mysqli_real_escape_string($db,$_POST['name']);
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$city= mysqli_real_escape_string($db,$_POST['city']);
		$address= mysqli_real_escape_string($db,$_POST['address']);
		$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		$pin_code= mysqli_real_escape_string($db,$_POST['pin_code']);
		$time_frame= mysqli_real_escape_string($db,$_POST['time_frame']);
		$status= mysqli_real_escape_string($db,$_POST['status']);
		$response= mysqli_real_escape_string($db,$_POST['response']);
		$company_name= mysqli_real_escape_string($db,$_POST['company_name']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$data_update = "update investor_datas set name='$name',email='$email',mobile_no='$mobile_no',city='$city',address='$address',brand_id='$brand_id',pin_code='$pin_code',time_frame='$time_frame', status='$status',response='$response',company_name='$company_name' where id = '$id'";
			if ($db->query($data_update) === TRUE) {
				
				$status='success';
			}
			 else {
				$status = 'fail';
			}
		}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "DELETE FROM investor_datas where id = '$id'";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$_SESSION['message'] = 'Data deleted successfully !';
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
		}
	}

?>

<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

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

	<div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Investor Data Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>

        </div>
        <form method="get" enctype="multipart/form-data">
						<table class='table table-striped'>
							<tr>
								<td width="20%">
									<input type="name" name="name" placeholder="Enter name" class="form-control" value="<?= @$first_name ?>">
								</td>
								<td width="20%">
									<input type="text" name="email" placeholder="Enter email" class="form-control" value="<?= @$email ?>">
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker" name="from_datepicker" placeholder="From Date" data-date-format="mm-dd-yyyy" value="<?= @$from_date ?>">
									</div>
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker1" name="to_datepicker" placeholder="To Date" value="<?= @$to_date ?>">
									</div>
								</td>
								<td>
									<button class="btn btn-primary" type="submit" name="ok">Filter</button>
								</td>
							</tr>
						</table>
					</form>
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="admin/update_Sequence" method="post">
          <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
				  <th>City</th>
				  <th>Brand</th>
				  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$result_query=mysqli_query($db,$query);
					if($result_query)
					{
					while($row=mysqli_fetch_array($result_query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php echo $row['city']; ?></td>
							<td><?php 
								$brand_id=$row['brand_id'];
									$brand_query=mysqli_query($db,"SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'");
									while($brand_row=mysqli_fetch_array($brand_query))
									{
										echo $brand_row['name'];
									}
							?></td>
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_investordata.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="view_investordata.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-eye"></span>
								</a>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="investor_dataform.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
					<?php } }
					else
						{
							echo"No Data Found";
						}?>
               </tbody>
              </table>
            </form> 
      </div>
      <!-- /.box -->
  </div>
</section>
    <!-- /.content -->
   </div>
</div>

   <?php require('footer.php'); ?>
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>

 <script>

$(function () {
	$('#datetimepicker1').datetimepicker();
	$('#datepicker1').datepicker();
	$('#datepicker').datepicker();

});
 	



</script>
 
    