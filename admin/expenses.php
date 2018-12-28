<?php 
require('config.php');
require('header.php'); 

$status = '';
$message = '';
$user_id=$_SESSION['user_id'];

if(isset($_POST['add']))
{	$date=$_POST['date'];
	$subject=$_POST['subject'];
	$amount=$_POST['amount'];
	$description=$_POST['description'];
	$sql="INSERT INTO expenses(date,subject,amount,description,user_id) VALUES ('$date','$subject','$amount','$description','$user_id')";
	if ($db->query($sql) === TRUE) {
		$status = 'success';
		$message = 'Expenses added successfully !';
	} else {
		$status = 'fail';
		$message = 'Something went wrong !!';
	}
}


if(isset($_POST['edit']))
{
	
	$date = mysqli_real_escape_string($db,$_POST['date']);
	$subject = mysqli_real_escape_string($db,$_POST['subject']);
	$amount = mysqli_real_escape_string($db,$_POST['amount']);
	$description = mysqli_real_escape_string($db,$_POST['description']);
	$id = mysqli_real_escape_string($db,$_POST['id']);
	$sql = "update expenses set date='$date',subject='$subject',amount='$amount',description='$description' where id = '$id'";
	if ($db->query($sql) === TRUE) {
		$status = 'success';
		$message = 'Expenses updated successfully !';
	} else {
		$status = 'fail';
		$message = 'Something went wrong !';
	}
}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "delete from expenses where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Expenses deleted successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}


$name="add";
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
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
        <!-- left column -->
        <div class="col-md-5">
		<form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Expenses</h3>

			  <div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
				<div class="box-body">
					<div class="form-group">
						<label>Date</label>
						<input class="form-control" value="<?php echo date('m/d/y');?>" name="date" id="date">
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input class="form-control" name="subject" id="subject">
					</div>
					<div class="form-group">
						<label>Amount</label>
						<input class="form-control" name="amount" id="amount">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" name="description" id="description"></textarea>
					</div>
					<input type="hidden" name="user_id" value="<?= $user_id ?>">
				 </div>
			</div>       
        </div>
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='<?php echo $name;?>'>Submit</button>
        </div>
      </form>

      

  </div> 
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Expenses</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="admin/update_Sequence" method="post">
          <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Date</th>
                  <th>Subject</th>
                  <th>Amount</th>
                  <th>Destination</th>
                  <th>User Name</th>
                  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from expenses order by id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++ ?></td>
							<td><?php echo $row['date'];  ?></td>
							<td><?php echo $row['subject'];  ?></td>
							<td><?php echo $row['amount'];  ?></td>
							<td><?php echo $row['description'];  ?></td>
							<td><?php $user_id= $row['user_id']; 
								$user_query=mysqli_query($db,"SELECT * FROM registration WHERE id=$user_id");
								while($user_row=mysqli_fetch_array($user_query))
								{
									echo $user_row['first_name'];
								}
								 ?></td>
								
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_expenses.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="expenses.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
						<?php
					}
				?>                 
               </tbody>
              </table>
            </form> 
      </div>
      <!-- /.box -->
  </div>

</div>
    </section>
    <!-- /.content -->
   </div>
  
 <?php require('footer.php'); ?>
 <script src="<?php echo base_url(); ?>admin_assest/plugins/jQuery/jQuery-2.2.0.min.js"></script>