<?php 
require('config.php');
$status = '';
$message = '';
if(isset($_POST['add']))
{	$category_id = mysqli_real_escape_string($db,$_POST['category_id']);
	$brand_id = mysqli_real_escape_string($db,$_POST['brand_id']);
	if(!empty($brand_id) || !empty($category_id))
	{
		$sql = "INSERT INTO tobrand_catewise (category_id,brand_id) VALUES ($category_id,$brand_id)";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Brand added successfully in list !';
		} else {
			$status = 'fail';
			$message = 'Something went wrong !!';
		}		
	}else
	{
		$status = 'fail';
		$message = 'Please select brand and category !';
	}
	

}

	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$sql = "delete from tobrand_catewise where id = '$id' ";
		if ($db->query($sql) === TRUE) {
			$status = 'success';
			$message = 'Brand deleted successfully from list !';
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
          <h3 class="box-title">Add Top Brand</h3>

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
				<select name="category_id" class="form-control select2" id="cat_id" style="width: 100%;" required>
				  <option value="" selected="selected">Select Category</option>
					<?php
						$query=mysqli_query($db,"select * from categories where status = 0");
						while($row=mysqli_fetch_array($query)){
					?>
						<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
					<?php } ?>
				</select>
			</div>
            <div class="form-group" id="brand_div">
				<select id="brand_id" name="brand_id" class="form-control select2" style="width: 100%;" required>
				  <option value="" selected="selected">Select Brand</option>
					
				</select>
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
          <h3 class="box-title">View Top brand</h3>

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
                  <th>Category Name</th>
                  <th>Brand Name</th>
                  <th>Delete</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$query=mysqli_query($db,"SELECT tobrand_catewise.id,categories.name as cat_name, brands.name as brand_name FROM tobrand_catewise INNER JOIN brands ON (tobrand_catewise.brand_id = brands.id) INNER JOIN categories ON (tobrand_catewise.category_id = categories.id) order by tobrand_catewise.id DESC ");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['cat_name']; ?></td>
							<td><?php echo $row['brand_name']; ?></td>
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="top_brand.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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

 <script>
$(document).ready(function() {  
	
	
	  $('#cat_id').on('change',function(){
                //Selected value
            
                var cat_id = $(this).val();
               
                $.ajax({
                type:'json',
                 url : 'According_category.php?cat_id='+cat_id,    
                    success: function(result){
                       $('#brand_id').html(result);
                       
                    }
                });
                
            });
});
 </script>