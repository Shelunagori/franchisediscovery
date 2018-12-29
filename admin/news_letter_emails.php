<?php 
require('header.php');
require('config.php');
$status='';


function truncateString($str, $chars, $to_space, $replacement="...") {
	if($chars > strlen($str)) return $str;

	$str = substr($str, 0, $chars);
	$space_pos = strrpos($str, " ");
	if($to_space && $space_pos >= 0) 
	$str = substr($str, 0, strrpos($str, " "));

	return($str . $replacement);
}


 ?>
<style>
.gallery > img{
	width: 200px;
    height: 150px;
    padding: 10px;
}
.menu > img{
	width: 200px;
    height: 150px;
    padding: 10px;
}
</style>	

<div class="content-wrapper">
    <section class="content">
       <div class="row">
        <div class="col-md-12">
			<?php if(!empty($_SESSION["status"])) 
					{  $status = $_SESSION["status"];
						if($status == 'success')
						{
							$status = 'success';
							$message = 'News Letter successfully !';
						} else if($status == 'fail') {
							$status = 'fail';
							$message = 'Something went wrong !';
						}
						unset($_SESSION["status"]);	
					} 
					else { $status = ''; }
			if($status == 'success')
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
		<form role="form" method="post" action="save_send_news_letter.php" enctype="multipart/form-data">
        <div class="col-md-6">
				<div class="box box-warning">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create News Letter</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body">
						<div class="col-md-12">
							<div class="form-group">
								<textarea id="editor1" name="content" rows="10" cols="80">
								</textarea>
							</div>
						</div>	
					</div>	
					<div class="box-footer">
						<button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
					</div>	
						
				</div> 
			</div>
					
		</form>
		<div class="col-md-6">
			<div class="box box-warning">
				<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>News Letter</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body table-responsive">
						<?php 
						$query ="select * from news_letter_rows where is_deleted=0";
							$query_result=mysqli_query($db,$query); 
								$sno = 1;
								if(!empty($query_result)){ 
								?>
							<table id="example8" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th>S.No.</th>
										<th>Content</th>
										<th>Created Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>	
								<?php while($row=mysqli_fetch_array($query_result)){ ?>
									<tr>
										<td width="5%"><?php echo $sno++; ?></td>
										<td width="25%"><?php echo truncateString($row['content'], 25, false) . "\n"; ?></td>
										<td width="15%"><?php echo date('d-m-Y',strtotime($row['created_on'])); ?></td>
										<td width="5%">
											<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="save_send_news_letter.php?action=Del&id=<?php echo base64_encode($row['id']); ?>">
												<span class="fa fa-times"></span>
											</a>
										</td>
									</tr>
								<?php } ?>	
								</tbody>
							</table>
						<?php } ?>	
					</div>
			</div>
		</div>
	</div>
	</section>
</div>
<?php require('footer.php'); ?>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  $(function () {
		CKEDITOR.replace('content');
  });
  </script>

	


