<?php 
require('config.php');
$status = '';
$message = '';
if(isset($_POST['AddSlider']))
{	$name = mysqli_real_escape_string($db,$_POST['name']);
	$position = mysqli_real_escape_string($db,$_POST['position']);
	$slider_url = mysqli_real_escape_string($db,$_POST['slider_url']);
	
	  $type = explode('.',$_FILES["slider_image"]["name"]);
      $type = $type[count($type)-1];
      $url_folder = "../slider/";
	  $url_name = uniqid(rand()).'.'.$type;
	  $url = $url_folder.$url_name;
	  $url_insert = "slider/".$url_name;
      if(in_array($type,array("jpg","jpeg","gif","png")))
      {
      if(move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url))
		$sql = "INSERT INTO slider(name,position,slider_image, slider_url)VALUES('$name','$position','$url_insert','$slider_url')";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'New slider created successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		} 

	  }else
	  {
		 $status = 'fail';
			$message = 'Invalid file !'; 
	  }
}


if(isset($_POST['updateSlider']))
{	
	$name = mysqli_real_escape_string($db,$_POST['name']);
	$id = mysqli_real_escape_string($db,$_POST['id']);
	$position = mysqli_real_escape_string($db,$_POST['position']);
	$slider_url = mysqli_real_escape_string($db,$_POST['slider_url']);
	
	 $total = $_FILES['slider_image']['error']; 
	if($total == 0)
	{
	  $type = explode('.',$_FILES["slider_image"]["name"]);
      $type = $type[count($type)-1];
      $url_folder = "../slider/";
	  $url_name = uniqid(rand()).'.'.$type;
	  $url = $url_folder.$url_name;
	  $url_insert = "slider/".$url_name;
	
      if(in_array($type,array("jpg","jpeg","gif","png")))
      {   
		if(move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url))
		
		
		
		$sql = "update slider set name = '$name', position = '$position', slider_image = '$url_insert', slider_url = '$slider_url' where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Slider update successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		} 

	  }else
	  {
		 $status = 'fail';
			$message = 'Invalid file !'; 
	  }
	}else {
		$sql = "update slider set name = '$name', position = '$position',slider_url = '$slider_url' where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Slider update successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		} 
		
	}
}


	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		
		$sql = "delete from slider where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Slider deleted successfully !';
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
          <h3 class="box-title">Add Slider</h3>

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
              <select name="position" class="form-control" required>
				<option>Select Position</option>
				<option value="slider">Slider</option>
				<option value="top_brand">Top Brand</option>
			  </select>
            </div> 
            <div class="form-group">
              <input type="text" required class="form-control" placeholder="Slider Name" name="name">
            </div>
            <div class="form-group">
              <input type="text" required class="form-control" placeholder="Hyper Link" name="slider_url">
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
         <button type="submit" class="btn btn-info pull-right" name='AddSlider'>Add Slider</button>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Slider</h3>

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
                  <th>Position</th>
				  <th>Slider</th>
                  <th>Action</th>
               </tr>
                </thead>
				<tbody>
                 <?php $i = 1;
					$query=mysqli_query($db,"select * from slider order by id DESC");
					while($row=mysqli_fetch_array($query)){
						?>
                       
                       <tr id='trow_<?php echo $i;?>'>
                       <td><?php echo $i; $i++;?></td>
					   <td><?php echo ucfirst($row['position']);?></td>
                       <td><img src="../<?php echo $row['slider_image'];?>" width="100" height="50" id="img_prev"  />
                       
                       <input type="hidden" value="<?php echo $row['id']; ?>" name="nSliderid[]" />
                       </td>
                       <td>

						<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_slider.php?id=<?php echo base64_encode($row['id']); ?>"><span class="fa fa-edit"></span></a>				   
					   
					   <a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="slider.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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

 
 
 <script>
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