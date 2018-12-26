<?php 
require('config.php');
require('header.php'); 
?>
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
       <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Chart</h3>
			<a href="chart.php" class="pull-right"> Add New</a>
        </div>
		<?php
		$id = base64_decode($_GET['id']); 
		$query=mysqli_query($db,"select * from chart where id = '$id'");
		while($row=mysqli_fetch_array($query)){
		?>
        <form role="form" method="post" action="chart.php" enctype='multipart/form-data'>
		<input type="hidden" name="id" value="<?php echo $id; ?>" >
		<div class="box-body">
          <div class="box-body">
		   <div class="form-group">
				<select name="category_id" class="form-control select2" id="cat_id" style="width: 100%;" required>
				  <option value="" selected="selected">Select Category</option>
					<?php 
						$query=mysqli_query($db,"select * from categories where status = 0");
						
						while($rows=mysqli_fetch_array($query)){
							$selected="";
							if($rows['id'] == $row['category_id']){
								$selected="selected";
							}
					?>
						<option value="<?php echo $rows['id']; ?>" <?php echo $selected; ?>><?php echo $rows['name']; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group">
              <input type="text" required class="form-control" value="<?php echo $row['name']; ?>" placeholder="Chart Name" name="name">
            </div>
			<div class="form-group">
                  <label for="exampleInputFile">File input</label>
            <input type="file" onchange="readURL(this);" id="exampleInputFile" name="slider_image">
            </div>
            <div class="form-group">
			<?php if(!empty($row['image_path'])) { $sliderImage = $row['image_path']; } 
						else { $sliderImage = 'admin_assest/img/icon.ico' ;} ?>	 
              <img src="../<?php echo $sliderImage; ?>" width="172" height="183"  id="img_prev"  />
            </div>
             </div>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='updateChart'>Update Chart</button>
        </div>
      </form>
		<?php } ?>
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
				  <th>Category</th>
				  <th>Image</th>
				  <th>Name</th>
                  <th>Action</th>
               </tr>
                </thead>
				<tbody>
                 <?php $i = 1;
					$query=mysqli_query($db,"select * from chart order by id DESC");
					while($row=mysqli_fetch_array($query)){
						$category_id=$row['category_id'];
						?>
                       
                       <tr id='trow_<?php echo $i;?>'>
                       <td><?php echo $i; $i++;?></td>
					   <td>
					   <?php 
									$sql="SELECT * FROM categories where status = 0 and id = $category_id";
									$categories_query=mysqli_query($db,$sql);
									$category_row=mysqli_fetch_array($categories_query);
									echo $category_row['name'];
									
									?>
					   </td>
						<td>
							<img src="../<?php echo $row['image_path'];?>" width="100" height="50" id="img_prev"  />
						</td>
                       <td><?php echo $row['name'];?></td>
					   <td>
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