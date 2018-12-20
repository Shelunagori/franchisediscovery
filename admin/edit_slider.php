<?php 
require('config.php');
$name="add";
require('header.php'); 
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <!-- left column -->
        <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Slider</h3>
			<a href="slider.php" class="pull-right"> Add New</a>
		</div>
		<?php
		$id = base64_decode($_GET['id']); 
		$query=mysqli_query($db,"select * from slider where id = '$id'");
		while($row=mysqli_fetch_array($query)){
		?>
        <form role="form" method="post" action="slider.php" enctype='multipart/form-data'>
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<div class="box-body">
          <div class="box-body">
            <div class="form-group">
              <select name="position" class="form-control" required>
				<option>Select Position</option>
				<option value="slider" <?php if($row['position']=='slider') { echo 'selected'; } ?> >Slider</option>
				<option value="top_brand" <?php if($row['position']=='top_brand') { echo 'selected'; } ?> >Top Brand</option>
			  </select>
            </div> 
            <div class="form-group">
              <input type="text" required class="form-control" placeholder="Slider Name" name="name" value="<?php echo $row['name']; ?>" >
            </div>
            <div class="form-group">
              <input type="text" required class="form-control" placeholder="Hyper Link" name="slider_url" value="<?php echo $row['slider_url']; ?>"  >
            </div>
            <div class="form-group">
                  <label for="exampleInputFile">File input</label>
            <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
            </div>
            <div class="form-group">
				<?php if(!empty($row['slider_image'])) { $sliderImage = $row['slider_image']; } 
						else { $sliderImage = 'admin_assest/img/icon.ico' ;} ?>	 
              <img src="../<?php echo $sliderImage; ?>" width="172" height="183"  id="img_prev"  />
            </div>
             </div>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='updateSlider'>Update Slider</button>
        </div>
      </form>
		<?php } ?>
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