<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
	if(isset($_POST['add']))
	{
		$email= mysqli_real_escape_string($db,$_POST['email']);
		$mobile_no= mysqli_real_escape_string($db,$_POST['mobile_no']);
		$brand_id= mysqli_real_escape_string($db,$_POST['brand_id']);
		$company_name= mysqli_real_escape_string($db,$_POST['company_name']);
		$landline_no= mysqli_real_escape_string($db,$_POST['landline_no']);
		$brand_origin= mysqli_real_escape_string($db,$_POST['brand_origin']);
		$person_name= mysqli_real_escape_string($db,$_POST['person_name']);
	
		$sql="INSERT INTO brand_enquiry(mobile_no,email,brand_id,company_name,landline_no,brand_origin,consult_person_name,created_by,edited_by) VALUES ('$mobile_no','$email','$brand_id','$company_name','$landline_no','$brand_origin','$person_name','$created_by','$edited_by')";	
		
		if($db->query($sql) === TRUE)
		{
			$status = 'success';
			$message = 'Data added successfully !';
		} 
		else 
		{
			$status = 'fail';
			$message = 'Something went wrong !!';
		}
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

<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://tarruda.github.io/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
 
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
		<form role="form" method="post" action="" enctype="multipart/form-data">
		<div class="box box-primary">

			<div class="box-header with-border">
			  <h3 class="box-title">Add Brand Enquiry</h3>
				<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				  <i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				  <i class="fa fa-times"></i></button>
			  </div>
			</div>
			<div class="box-body">
				<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label for="Company_name">Company Name</label>
						<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter company name">
					</div>
				</div>	
					
				<div class="col-md-4">
					<div class="form-group">
						<label for="address">Brand</label>
						<select name="brand_id" multiple class="form-control select2" >
							<option value="">--Select Brand--</option>
							<?php
								$brand_query="SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'";
								$brand_result=mysqli_query($db,$brand_query);
								while($brand_row=mysqli_fetch_array($brand_result))
								{
									echo"<option value=".$brand_row['id'].">".$brand_row['name']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				
				<div class="col-md-4">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="mobile_no">Mobile NO</label>
							<input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Enter mobile no">
						</div>
					</div> 
					<div class="col-md-4">
						<div class="form-group">
							<label for="mobile_no">Landline No</label>
							<input type="text" class="form-control" id="landline_no" name="landline_no" placeholder="Enter landline no">
						</div>
					</div> 
					
					<div class="col-md-4">
					<div class="form-group">
						<label for="address">Person Name</label>
						<textarea type="text" class="form-control" id="person_name" name="person_name" placeholder="Enter person name"></textarea>
					</div>
				</div> 
				<div class="col-md-4">
						<div class="form-group">
							<div class="box-body pad">
				              <form>
				              	<label>Brand Origin</label>
				                    <textarea id="editor1" name="brand_origin" rows="10" cols="80">
			                                        	
				                    </textarea>
				              </form>
          			 		 </div>
						</div>
					</div> 
			</div>
		<div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
        </div>
    </div>
      </form>
	</div>
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
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="admin/update_Sequence" method="post">
          <table id="example1" class="display select">
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
					$query=mysqli_query($db,"select * from brand_enquiry order by id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['company_name'];?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['mobile_no']; ?></td>
							<td><?php 
								$brand_id=$row['brand_id'];
									$brand_query=mysqli_query($db,"SELECT * FROM brands WHERE status='Active' AND is_approve='Approved'");
									while($brand_row=mysqli_fetch_array($brand_query))
									{
										echo $brand_row['name'];
									}
							?></td>
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
					<?php } ?>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
    
    CKEDITOR.replace('brand_origin');
  });