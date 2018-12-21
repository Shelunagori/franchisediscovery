<?php 
require('config.php');
$status = '';
$message = '';
	if(isset($_POST['add']))
	{	$brand_id = mysqli_real_escape_string($db,$_POST['brand_id']);
		$exists=mysqli_query($db,"select * from brand_grid where brand_id = '$brand_id'");
		if($exists->num_rows == 0)
		{
			$sql = "INSERT INTO brand_grid(brand_id) VALUES ('$brand_id')";
			if ($db->query($sql) === TRUE) {
				$status = 'success';
				$message = 'Brand successfully  added to gird!';
			} else {
				$status = 'fail';
				$message = 'Something went wrong !!';
			}			
		}else {
				$status = 'fail';
				$message = 'Brand already exists!';
			}

	}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "delete from brand_grid where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Brand successfully remove from grid !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !';
		}
	}


$name="add";
require('header.php'); 
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
<link 
href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css" 
rel="stylesheet" />
 <style>
 #result {
        border: 1px solid #888;
        background: #f7f7f7;
        padding: 1em;
        margin-bottom: 1em;
    }
 </style>
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
        <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Brand Grid</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            
          </div>
        </div>
        <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <div class="box-body">
          <div class="box-body">
		  <div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<select name="brand_id" class="form-control select2" style="width: 100%;" required>
					<option selected="selected">Select Brand</option>
					<?php
						$query=mysqli_query($db,"select * from brands where status = 'Active'");
						while($row=mysqli_fetch_array($query)){
					?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-4 pull-left">
				<button type="submit" class="btn btn-info pull-left" name='<?php echo $name;?>'>Submit</button>
			</div>
		  </div>
            
			 
         </div>
            
          </div>
        <!-- /.box-body -->
        
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Brand Grid</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
           
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="update_Sequence.php" method="post" role="form">
          <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Brand Image</th>
                  <th>Brand Name</th>
                  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1; $sequence=1;
					$query=mysqli_query($db,"SELECT brand_grid.id, brand_grid.position , brands.name , brands.brand_image FROM  brand_grid INNER JOIN brands ON (brand_grid.brand_id = brands.id) order by brand_grid.position ASC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?>
							
							</td>
							
							<td><img src="<?php echo $row['brand_image'];?>" style="width: 100px;height: 50px;" /></td>
							<td><?php echo $row['name']; ?>
					<input type="hidden" name="position[]" value="<?php echo $row['id']; ?>">
							</td>
							
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="brand_grid.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
						<?php
					}
				?>                 
               </tbody>
			   <tfoot>
					<tr >
						<td colspan="4">
<input class="btn btn-success pull-right" type="submit" name="add" value="Update Sequence">
						</td>
					</tr>
			   </tfoot>
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

