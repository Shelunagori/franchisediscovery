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
				<strong>State updated successfully !</strong> 
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
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit State</h3>
			<a href="stateMaster.php" class="pull-right"> Add New</a>
          
        </div>
        <form role="form" method="post" action="stateMaster.php">
        <?php $id = base64_decode($_GET['id']); 
		$query=mysqli_query($db,"select * from state where id = '$id'");
		while($row=mysqli_fetch_array($query)){
		
		?>
		<div class="box-body">
			<div class="box-body">
             <div class="form-group">
				<input class="form-control" name="name" type="text" placeholder="Add State" value='<?php echo $row['name']; ?>' required>
				<input class="form-control" name="id" type="hidden" value='<?php echo $id; ?>' required>
			</div>
            </div>
         </div>
		<?php } ?> 
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='edit'>Submit</button>
        </div>
      </form>
        
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View State</h3>

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
                  <th>State</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from state");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['name']; ?></td>
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_state.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
							</td>
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="stateMaster.php?id=<?php echo $row['id']; ?>">
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