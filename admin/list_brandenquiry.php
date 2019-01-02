<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
	if(isset($_GET['ok']))
			{
				$company_name=$_GET['company_name'];
				$email=$_GET['email'];
				$from_date= $_GET['from_datepicker']?date('Y-m-d',strtotime($_GET['from_datepicker'])):null;
				if(!$from_date==null)
					$from=$from_date." 00:00:00.000000";

				$to_date= $_GET['to_datepicker']?date('Y-m-d',strtotime($_GET['to_datepicker'])):null;
				if(!$to_date==null)
					$to=$to_date." 00:00:00.000000";


				if(!$company_name==null && $email == null && @$from == null && @$to == null)
				{
					echo$where="company_name LIKE'%$company_name%'";
				}
				else if($company_name==null && !$email==null && @$from==null && @$to==null)
				{
					$where="email LIKE'%$email%'";
				}

				else if($company_name==null && $email==null && !@$from==null && !@$to==null)
				{
					echo$where="created_on BETWEEN '$from' AND '$to'";
				}
				else if(!$company_name==null && !$email==null && @$from==null && @$to==null)
				{
					$where="company_name LIKE'%$company_name%' AND email LIKE '%$email%'";
				}
				else if(!$company_name==null && !$email==null && !@$from==null && !@$to==null)
				{
					$where="company_name LIKE'%$company_name%' AND email LIKE '%$email%' AND created_on BETWEEN '$from' AND '$to'";
				}
				else if($company_name==null && $email==null && !@$from==null && @$to==null)
				{
					$where="created_on > '$from'";
				}
				else if($company_name==null && $email==null && @$from==null && !@$to==null)
				{
					$where="created_on < '$to'";
				}
				else if(!$company_name==null && $email==null && @$from==null && !@$to==null)
				{
					$where="created_on < '$to' AND company_name LIKE'%$company_name%'";
				}
				else if(!$company_name==null && $email==null && !@$from==null && @$to==null)
				{
					$where="created_on > '$from' AND company_name LIKE'%$company_name%'";
				}
				else if($company_name==null && !$email==null && !@$from==null && @$to==null)
				{
					$where="created_on > '$from' AND email LIKE'%$email%'";
				}
				else if($company_name==null && !$email==null && @$from==null && !@$to==null)
				{
					$where="created_on <'$to' AND email LIKE'%$email%'";
				}
				else if($company_name==null && !$email==null && !@$from==null && !@$to==null)
				{
					$where="created_on BETWEEN '$from' AND '$to' AND email LIKE'%$email%'";
				}
				else if(!$company_name==null && $email==null && !@$from==null && !@$to==null)
				{
					$where="created_on BETWEEN '$from' AND '$to' AND company_name LIKE'%$company_name%'";
				}
			
	}
		if(!empty($where)){
			$query= "select * from brand_enquiry where $where order by id DESC ";
		}else{
			$query= "select * from brand_enquiry order by id DESC ";
		}


		if(isset($_POST['edit']))
		{
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		$company_name= mysqli_real_escape_string($db,$_POST['company_name']);
		$person_name= mysqli_real_escape_string($db,$_POST['person_name']);
		$brand_origin= mysqli_real_escape_string($db,$_POST['brand_origin']);
		$landline_no= mysqli_real_escape_string($db,$_POST['landline_no']);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		$data_update = "update brand_enquiry set email='$email',mobile_no='$mobile_no',brand_id='$brand_id',company_name='$company_name',brand_origin='$brand_origin',consult_person_name='$person_name',landline_no='$landline_no' where id = '$id'";
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
		$delete_query = "DELETE FROM  brand_enquiry where id =$id";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$_SESSION['message'] = 'Data deleted successfully !';
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
		}
	}

?>

 
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
		
    </div>

 
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Brand Enquiry</h3>

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
									<input type="text" name="company_name" placeholder="Enter company name" class="form-control" value="<?= @$company_name ?>">
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
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr>
                  <th># </th>
                  <th>Company Name</th>
                  <th>Email</th>
                  <th>Mobile No</th>
				  <th>Brand</th>
				  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$result=mysqli_query($db,$query);
					while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['company_name'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php echo $row['brand_name'];?></td>
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_login_enquiry.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="view_login_enquiry.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-eye"></span>
								</a>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="brand_enquiry.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
					<?php } 
					
					?>

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

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(document).ready(function(){
    CKEDITOR.replace('editor1');
  });
  $('#datepicker').datepicker();
		 $('#datepicker1').datepicker();
 </script>