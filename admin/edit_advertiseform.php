<?php 
require('config.php');
require('header.php'); 
$status='';
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
				<strong>employee updated successfully !</strong> 
				</div>
		  <?php }?>
		  <?php if($status == 'fail')
			{ ?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong>Something went wrong !</strong> 
				</div>
		  <?php }?>		

		  </div>
        <!-- left column -->
       <div class="col-md-6">
		<form role="form" method="post" action="advertise_form.php">
			<div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Investor Data</h3>
					<a href="investor_dataform.php" class="pull-right"> Add New</a>
				</div>
				<?php 
				@$id=base64_decode($_GET['id']); 
				$edit_query=mysqli_query($db,"select * from advertise where id = '$id'");
				while($row=mysqli_fetch_array($edit_query)){ ?>
				<div class="box-body">
						<div class="form-group">
							<label for="name">Page</label>
							<select  name="page_id" class="form-control">
								<option value="">Select page</option>
								<?php
									$page_id=$row['page_id'];
									$page_query=mysqli_query($db,"SELECT * FROM pages WHERE is_valid_advertise='YES'");
									while($page_row=mysqli_fetch_array($page_query)){
										if($page_id == $page_row['id']){
											echo "<option value=".$page_row['id']." selected>".$page_row['name']."</option>";
										}
										else{
											echo "<option value=".$page_row['id'].">".$page_row['name']."</option>";
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="email">Position</label>
							<input class="form-control" name="position_name" type="text"  value='<?php echo $row['position_name']; ?>' >
						</div>
						<div class="form-group">
							<label for="email">Image :</label>
							<?= $row['image'] ?><input class="form-control" name="image" type="file">
						</div>
						<div class="form-group">
							<label for="email">Link_url</label>
							<input class="form-control" name="link_url" type="text"  value='<?php echo $row['link_url']; ?>' >
						</div>
						<div class="form-group">
							<label for="email">Start_date</label>
							<input class="form-control" name="start_date" type="text"  value='<?php echo $row['start_date']; ?>' >
						</div>
						<div class="form-group">
							<label for="email">End Date</label>
							<input class="form-control" name="end_date" type="text"  value='<?php echo $row['end_date']; ?>' >
						</div>
						<div class="form-group">
							<label for="email">Current_date</label>
							<input class="form-control" name="current_date" type="text"  value='<?php echo $row['current_dates']; ?>' >
						</div>
					
							<input class="form-control" name="id" type="hidden" value='<?php echo $id; ?>' >
				
				<?php } ?> 
						</div>

			<div class="box-footer">
			 <button type="submit" class="btn btn-info pull-right" name="edit">Submit</button>
			</div>
		 </form>
      <!-- /.box -->
  </div> 
 </div>
  
   
 </section>
</div>
</div>
   
    <!-- /.content -->
  
 <?php require('footer.php'); ?>
 <script src="<?php echo base_url(); ?>admin_assest/plugins/jQuery/jQuery-2.2.0.min.js"></script>