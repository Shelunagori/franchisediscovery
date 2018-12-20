<?php
require('config.php');

$status = '';
$message = '';
	if(isset($_POST['add']))
	{
		$name= mysqli_real_escape_string($db,$_POST['name']);
		$sql="INSERT INTO related_services(name) VALUES ('$name')";	
		
		if($db->query($sql) === TRUE)
		{
			$status = 'success';
			$message = 'Service added successfully !';
		} 
		else 
		{
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
	}
		
	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "delete from related_services where id = '$id'";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$_SESSION['message'] = 'Service deleted successfully !';
			
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
			
		}
	}
require('header.php');
?>

<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
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
		<div class="col-md-4">
		<form role="form" method="post" action="" enctype="multipart/form-data">
		<div class="box box-primary">
			<div class="box-header with-border">
			  <h3 class="box-title">Add Services	</h3>
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
						<label for="Name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
					</div>
					
				 </div>
			</div>       
        </div>

		
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
      </form>
	</div>
      

 
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Services</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
         <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Name</th>
				  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from related_services");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['name'];?></td>
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="related_services.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
					<?php } ?>
               </tbody>
              </table>
            
      </div>
      <!-- /.box -->
  </div>

</div>
</div>
    </section>
    <!-- /.content -->
   </div>
  
<script  src='http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
 <?php require('footer.php'); ?>
