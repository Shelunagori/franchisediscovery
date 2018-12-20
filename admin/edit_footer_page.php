<?php 
require('config.php');
$status = '';
$message = '';
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
          <h3 class="box-title">Footer Pages</h3>
			<a href="footer_page.php" class="pull-right"> Add New</a>
			<?php
				$id = base64_decode($_GET['id']);
				$page_query=mysqli_query($db,"select * from footer_pages_detail where id = '$id'");
				while($page_result=mysqli_fetch_array($page_query))
			{ ?>	
        </div>
        <form role="form" method="post" action="footer_page.php">
		<div class="box-body">
          <div class="box-body">
			<div class="form-group">
              <div class="form-group">
					<input type="hidden" name="footer_page_id" value="<?php echo $page_result['id']; ?>" />
					<label for="exampleInputFile">Select Pages</label>
					<select required name="page_id" class="form-control select2" style="width: 100%;">
					<option value="selected">Select Pages </option>
					<?php 
						$page_id=$page_result['page_id']; 
							$department_query=mysqli_query($db,"SELECT	* FROM pages where is_seo = 'Yes'");
							while($department_row=mysqli_fetch_array($department_query)){
								if($page_id == $department_row['id']){
									echo "<option value=".$department_row['id']." selected>".$department_row['name']."</option>";
								}else{
									echo "<option value=".$department_row['id'].">".$department_row['name']."</option>";
								}
									
							}
					?>
					</select>
				</div>
            </div>

			<div class="form-group">
				<div class="box-body pad">
					<textarea id="editor1" name="message" rows="10" cols="80">
					<?= $page_result['detail']; ?>
					</textarea>
				</div>
			</div>
		</div>
			<?php } ?>
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <button type="submit" class="btn btn-info pull-right" name='edit'>Submit</button>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
  </div> 
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Footer Pages</h3>

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
				  <th>Page Name</th>
				  <th>Action</th>
               </tr>
                </thead>
				<tbody>
                 <?php $i = 1;
					$query=mysqli_query($db,"select * from footer_pages_detail");
					while($row=mysqli_fetch_array($query)){
						?>
                       
                       <tr id='trow_<?php echo $i;?>'>
                       <td><?php echo $i; $i++;?></td>
						
                       <td><?php 
								$page_id=$row['page_id'];
								$name_query=mysqli_query($db,"SELECT * FROM pages WHERE id='$page_id'");
								while($name_result=mysqli_fetch_array($name_query))
								{
									echo $name_result['name'];
								}
							?></td>
					   <td>
							<a style="color:#fff; padding:0 5px;" class="btn btn-info btn-rounded btn-sm" href="edit_footer_page.php?id=<?php echo base64_encode($row['id']); ?>"><span class="fa fa-edit"></span>
							</a>
							<a style="padding:0 5px;" class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="footer_page.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
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
 <script>
  $(function () {
    CKEDITOR.replace('message');
	$(".textarea").wysihtml5();
  });
</script>