<?php 
require('config.php');
$status = '';
$message = '';
	if(isset($_POST['AddSlider']))
	{	$name = mysqli_real_escape_string($db,$_POST['name']);
		
		  $type = explode('.',$_FILES["slider_image"]["name"]);
		  $type = $type[count($type)-1];
		  $url_folder = "../chart_image/";
		  $url_name = uniqid(rand()).'.'.$type;
		  $url = $url_folder.$url_name;
		  $url_insert = "chart_image/".$url_name;
		  $seo_name = seo_url($name);
		  if(in_array($type,array("jpg","jpeg","gif","png")))
		  {
		  if(move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url))
			$sql = "INSERT INTO chart(name,image_path,seo_name)VALUES('$name','$url_insert','$seo_name')";
			if ($db->query($sql) === TRUE) {
				$status = 'success';
				$message = 'New chart created successfully !';
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

	if(isset($_POST['updateChart']))
	{	$name = mysqli_real_escape_string($db,$_POST['name']);
		$seo_name = seo_url($name);
		$id = mysqli_real_escape_string($db,$_POST['id']);
		  $err = $_FILES["slider_image"]["error"];	
		  
			if($err == 0)
			{
			  $type = explode('.',$_FILES["slider_image"]["name"]);
			  $type = $type[count($type)-1];
			  $url_folder = "../chart_image/";
			  $url_name = uniqid(rand()).'.'.$type;
			  $url = $url_folder.$url_name;
			  $url_insert = "chart_image/".$url_name;
			  if(in_array($type,array("jpg","jpeg","gif","png")))
			  {
				  if(move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url))
					$sql = "update chart set name = '$name', image_path = '$url_insert', seo_name = '$seo_name' where id = '$id' ";
					if ($db->query($sql) === TRUE) {
						$status = 'success';
						$message = 'Chart updated successfully !';
					} else {
						$status = 'fail';
						$message = 'Something went wrong !!';
					} 
			  }else
			  {
				 $status = 'fail';
					$message = 'Invalid file !'; 
			  }			  
			}else 
			{
				$sql = "update chart set name = '$name', seo_name = '$seo_name' where id = '$id' ";
				if ($db->query($sql) === TRUE) {
					$status = 'success';
					$message = 'Chart updated successfully !';
				} else {
					$status = 'fail';
					$message = 'Something went wrong !!';
				}
			}
		  

	}
	
	
	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		
		$sql = "delete from chart where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Chart deleted successfully !';
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
          <h3 class="box-title">Add Chart</h3>

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
              <input type="text" required class="form-control" placeholder="Chart Name" name="name">
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
         <button type="submit" class="btn btn-info pull-right" name='AddSlider'>Add Chart</button>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Chart</h3>

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
				  <th>Image</th>
				  <th>Name</th>
                  <th>Action</th>
               </tr>
                </thead>
				<tbody>
                 <?php $i = 1;
					$query=mysqli_query($db,"select * from chart order by id DESC");
					while($row=mysqli_fetch_array($query)){
						?>
                       
                       <tr id='trow_<?php echo $i;?>'>
                       <td><?php echo $i; $i++;?></td>
						<td>
							<img src="../<?php echo $row['image_path'];?>" width="100" height="50" id="img_prev"  />
						</td>
                       <td><?php echo $row['name'];?></td>
					   <td>
					   <a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="chart_edit.php?id=<?php echo base64_encode($row['id']); ?>"><span class="fa fa-edit"></span></a>				   
							<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="chart.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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