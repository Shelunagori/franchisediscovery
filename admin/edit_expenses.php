<?php 
require('config.php');
require('header.php'); 
$status='';
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
				<strong>Department updated successfully !</strong> 
				</div>
		  <?php }?>
		  <?php if($status == 'fail')
			{ ?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>Something went wrong !</strong> 
				</div>
		  <?php }?>		

		  </div>
        <!-- left column -->
        <div class="col-md-6">
		<form role="form" method="post" action="expenses.php">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Expenses</h3>
					<a href="expenses.php" class="pull-right"> Add New</a>
				</div>
				<?php $id = base64_decode($_GET['id']); 
				$query="select * from expenses where id = '$id'";
				$result=mysqli_query($db,$query);
				while($row=mysqli_fetch_array($result)){ ?>
				<div class="box-body">
					<div class="box-body">
						<div class="form-group">
						<label>Date</label>
						<input class="form-control" value="<?php echo $row['date'];?>" name="date" id="date">
					</div>
					<div class="form-group">
						<label>Subject</label>
						<input class="form-control" value="<?php echo $row['subject'];?>" name="subject" id="subject">
					</div>
					<div class="form-group">
						<label>Amount</label>
						<input class="form-control" value="<?php echo $row['amount'];?>" name="amount" id="amount">
					</div>
					<div class="form-group">
						<label>Description</label>
						<input class="form-control" value="<?php echo $row['description'];  ?>" name="description" id="description"></input>
					</div>
					<input name="id" type="hidden" value='<?php echo $id; ?>' required>
					</div>
				 </div>
				<?php } ?> 
			</div>
			<div class="box-footer">
			 <button type="submit" class="btn btn-info pull-right" name='edit'>Submit</button>
			</div>
			
		 </form>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box">
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
                  <th>Description</th>
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