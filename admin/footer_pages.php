<?php 
require('config.php');
$status = '';
$message = '';
if(isset($_POST['AddSlider']))
{	$name = mysqli_real_escape_string($db,$_POST['name']);
	$message_co = mysqli_real_escape_string($db,$_POST['message']);
	  $total = $_FILES['slider_image']['error'];
	  
	  if($total == 0)
	  {

	  $type = explode('.',$_FILES["slider_image"]["name"]);
      $type = $type[count($type)-1];
      $url_folder = "../testimonial/";
	  $url_name = uniqid(rand()).'.'.$type;
	  $url = $url_folder.$url_name;
	  $url_insert = "testimonial/".$url_name;
      if(in_array($type,array("jpg","jpeg","gif","png")))
      {
      if(move_uploaded_file($_FILES["slider_image"]["tmp_name"],$url))
	    {
	        
	    }

	  }else
	  {
		 $status = 'fail';
			$message = 'Invalid file !'; 
	  }
	      
	      
	  }else {  $url_insert = 'testimonial/no-image.jpg';  }
	  

	  
	  	$sql = "INSERT INTO testimonial(name, message, client_picture)VALUES('$name','$message_co','$url_insert')";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Testimonial created successfully !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		} 
	  
	  
	  
}
	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		
		$sql = "delete from testimonial where id = '$id'";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Testimonial deleted successfully !';
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
          <h3 class="box-title">Add Testimonial</h3>
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
              <input type="text" required class="form-control" placeholder="Customer Name" name="name">
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
         <button type="submit" class="btn btn-info pull-right" name='AddSlider'>Add Testimonial</button>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Testimonial</h3>

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
				  <th>Message</th>
                  <th>Action</th>
               </tr>
                </thead>
				<tbody>
                 <?php $i = 1;
					$query=mysqli_query($db,"select * from testimonial order by id DESC");
					while($row=mysqli_fetch_array($query)){
						?>
                       
                       <tr id='trow_<?php echo $i;?>'>
                       <td><?php echo $i; $i++;?></td>
						<td>
							<img src="../<?php echo $row['client_picture'];?>" width="100" height="50" id="img_prev"  />
						</td>
                       <td><?php echo $row['name'];?></td>
					   <td><?php echo $row['message'];?></td>
					   <td>
							<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="testimonial.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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