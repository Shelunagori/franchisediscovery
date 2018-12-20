<?php 
require('config.php');
$status = '';
$message = '';
if(isset($_POST['AddNotification']))
{	
	
	$user_type = mysqli_real_escape_string($db,$_POST['user_type']);
	$title = mysqli_real_escape_string($db,$_POST['title']);
	$link = mysqli_real_escape_string($db,$_POST['link']);
	$message_co = mysqli_real_escape_string($db,$_POST['message']);
	$notification_type = mysqli_real_escape_string($db,$_POST['notification_type']);
	
	if($user_type == 'Brand')
	{
		$registration_id = mysqli_real_escape_string($db,$_POST['reg_br_id']);	
	}

	if($user_type == 'Investor')
	{
		$registration_id = mysqli_real_escape_string($db,$_POST['reg_in_id']);	
	}	
	
	
	$date  = date('Y-m-d');
	$total = $_FILES['slider_image']['error'];
	  
	  if($total == 0)
	  {

	  $type = explode('.',$_FILES["slider_image"]["name"]);
      $type = $type[count($type)-1];
      $url_folder = "../notification/";
	  $url_name = uniqid(rand()).'.'.$type;
	  $url = $url_folder.$url_name;
	  $url_insert = "notification/".$url_name;
      if(in_array($type,array("jpg","jpeg","gif","png")))
		{
			if(move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url)){}
		}else
		{
			$status = 'fail';
			$message = 'Invalid file !'; 
		}
	}else {  $url_insert = 'img/Franchise-logo.png';  }
	  
		$sql = "INSERT INTO notification(user_type,notification_type,registration_id,title, file_path, details, link, created_on)
		VALUES('$user_type','$notification_type','$registration_id','$title','$url_insert','$message_co','$link','$date')";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Notification created successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		} 
}
	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		
		$sql = "delete from notification where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Notification deleted successfully !';
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
        <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add Notification</h3>
			<div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <form role="form" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype='multipart/form-data'>
		<div class="box-body">
          <div class="box-body">
			
			<div class="form-group">
				<select required name="notification_type" id="notification_type" class="form-control select2" style="width: 100%;">
					<option value="Bulk">Bulk</option>
					<option value="Manual">Manual</option>
				</select>
			</div>
			<div class="form-group">
				<select required name="user_type" id="user_type" class="form-control select2" style="width: 100%;">
					<option value="selected">Select User type </option>
					<option value="Brand">Brand</option>
					<option value="Investor">Investor</option>
				</select>
			</div>
			<div class="form-group" id="brandDiv">
				<select required name="reg_br_id" class="form-control select2" style="width: 100%;">
					<option value="selected">Select Customer </option>
					<?php
						$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Brand' ";
						$result=$db->query($sql);
						$count=0;
						while($rows = mysqli_fetch_array($result)){ $count++;
					 ?>	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['first_name']; ?></option>
						<?php } ?>
				</select>
			</div>			
			
			<div class="form-group" id="investorDiv">
				<select required name="reg_in_id" class="form-control select2" style="width: 100%;">
					<option value="selected">Select Customer </option>
					<?php
						$sql="SELECT * FROM registration WHERE status='1' AND reg_type='Investor'";
						$result=$db->query($sql);
						$count=0;
						while($rows = mysqli_fetch_array($result)){ $count++;
					 ?>	<option value="<?php echo $rows['id']; ?>"><?php echo $rows['first_name']; ?></option>
						<?php } ?>
				</select>
			</div>			
			
			
			
			<div class="form-group">
              <input type="text" required class="form-control" placeholder="Title" name="title">
            </div>
			
			<div class="form-group">
              <input type="text" required class="form-control" placeholder="Link" name="link">
            </div>
			<div class="form-group">
				<div class="box-body pad">
					<textarea id="editor1" name="message" rows="10" cols="80">
					</textarea>
				</div>
			</div>
			<div class="form-group">
                  <label for="exampleInputFile">File input</label>
            <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
            </div>
            <div class="form-group">
              <img src="admin_assest/img/icon.ico" width="172" height="183"  id="img_prev"  />
            </div>
             </div>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='AddNotification'>Add Notification</button>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-7">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Notification</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.no</th>
				  <th>Date</th>
				  <th>Image</th>
				  <th>Title</th>
				  <th>Link</th>
				 <th>Action</th>
               </tr>
                </thead>
				<tbody>
                 <?php $i = 1;
					$query=mysqli_query($db,"select * from notification order by id DESC");
					while($row=mysqli_fetch_array($query)){
						?>
                       
                       <tr id='trow_<?php echo $i;?>'>
                       <td><?php echo $i; $i++;?></td>
					   <td><?php echo  date('d-m-y',strtotime($row['created_on']));?></td>
						<td>
							<img src="../<?php echo $row['file_path'];?>" width="100" height="50" id="img_prev"  />
						</td>
                       <td><?php echo $row['title'];?></td>
					   <td><?php echo $row['link'];?></td>
						<td>
							<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="notification.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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
    </section>
    <!-- /.content -->
   </div>
  
 <?php require('footer.php'); ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="admin_assest/plugins/bootstrap3-wysihtml5.all.min.js"></script>
 <script>
  $(function () {
    CKEDITOR.replace('message');
	$(".textarea").wysihtml5();
  });
 

function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#img_prev')
.attr('src', e.target.result)
.width(170)
.height(180);
};

reader.readAsDataURL(input.files[0]);
}
}
function readURL1(input) {
if (input.files && input.files[0]) {
var reader1 = new FileReader();

reader1.onload = function (e) {
$('#img_prev1')
.attr('src', e.target.result)
.width(170)
.height(180);
};

reader1.readAsDataURL(input.files[0]);
}
}
</script>

	<script>
		 $(document).ready(function(){
			$('#brandDiv').hide(); 
			$('#investorDiv').hide(); 
			$('#user_type').change(function(){ 
				var currentValue = $(this).val();
				var n_type = $('#notification_type').val();
				
				if(n_type == 'Manual' && currentValue == 'Brand')
				{
					$('#brandDiv').show(); 
				}
				else { $('#brandDiv').hide();  }

				if(n_type == 'Manual' && currentValue == 'Investor')
				{
					$('#investorDiv').show(); 
				}
				else { $('#investorDiv').hide(); }
			});
		});
	</script>
