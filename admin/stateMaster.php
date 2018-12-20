<?php 
require('config.php');
$status = '';
$message = '';
if(isset($_POST['add']))
{	$stateName = mysqli_real_escape_string($db,$_POST['name']);
	$sql = "INSERT INTO state(name) VALUES ('$stateName')";
	if ($db->query($sql) === TRUE) {
		$status = 'success';
		$message = 'State created successfully !';
	} else {
		$status = 'fail';
		$message = 'Something went wrong !!';
	}
}


if(isset($_POST['edit']))
{	$stateName = mysqli_real_escape_string($db,$_POST['name']);
	$id = mysqli_real_escape_string($db,$_POST['id']);
	$sql = "update state set name = '$stateName' where id = '$id'";
	if ($db->query($sql) === TRUE) {
		$status = 'success';
		$message = 'State created successfully !';
	} else {
		$status = 'fail';
		$message = 'Something went wrong !';
	}
}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "delete from state where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'State deleted successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}


$name="add";
require('header.php'); 
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
        <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add State</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="box-body">
          <div class="box-body">
             <div class="form-group">
				<input class="form-control" name="name" type="text" placeholder="Add State" value='' required>
			</div>
         </div>
            
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='<?php echo $name;?>'>Submit</button>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box box-primary">
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
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"select * from state order by id DESC ");
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
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="stateMaster.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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