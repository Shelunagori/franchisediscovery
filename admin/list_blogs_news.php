<?php 
require('header.php');
require('config.php');
?>
<style>
	.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }
#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

#exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}

/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

/* change border radius for the tab , apply corners on top*/

#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
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
								$message = 'Brand created successfully !';
							} else if($status == 'fail') {
								$status = 'fail';
								$message = 'Something went wrong !';
							}else if($status == 'delete_success')
							{
								$status = 'success';
								$message = 'Brand deleted successfully !';
							}
							else if($status == 'delete_fail')
							{
								$status = 'fail';
								$message = 'Something went wrong !';
							}
							else if($status == 'update_success')
							{
								$status = 'success';
								$message = 'Update successfully !';
							}
							else if($status == 'update_fail')
							{
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
		</div>
		<div class="row">
			<div class="col-md-12">
					  <div class="box">
						<div class="box-header">
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  List of Brands</h3>
						</div>
						<div class="box-body">
							
							<div id="exTab2">	
								<ul class="nav nav-tabs">
									<li class="active">
										<a  href="#1" data-toggle="tab">Blogs </a>
									</li>
									<li><a href="#2" data-toggle="tab">News</a>
									</li>
									<li><a href="#3" data-toggle="tab">Brand Video</a>
									</li>
								</ul>
								<div class="tab-content">
								<div class="tab-pane active" id="1">

									<?php $query=mysqli_query($db,"SELECT * FROM news_blogs where type = 'Blogs' and status = 'Active' order by id DESC ");  
										$sno = 1;
										if(!empty($query)){  ?>
									<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Category</th>
												<th>Image</th>
												<th>Title</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($query)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td>
												<?php $catId = $row['category_id'];
													$query_cat=mysqli_query($db,"select * from categories where id = '$catId'");
													while($row_cat=mysqli_fetch_array($query_cat)){
													echo $row_cat['name'];  } 
												?>
											  
												</td>
												<td>  <center>
														<img src="<?php echo $row['image']; ?>" style="width: 70px;height: 50px;" />
													</center> 
												</td>
												<td>  <?php echo $row['title']; ?>
												</td>
												<td>
													<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="editNews.php?rowvalue=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-edit"></span>
													</a>

													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="save_news_blogs.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>								
									<?php  } else {  echo 'No Record Found !';  } ?>									
								</div>
									<div class="tab-pane" id="2">	

									<?php $query=mysqli_query($db,"SELECT * FROM news_blogs where type = 'News' and status = 'Active' order by id DESC ");  
										$sno = 1;
										if(!empty($query)){  ?>
									<table id="example3" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Category</th>
												<th>Image</th>
												<th>Title</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($query)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td>
												<?php $catId = $row['category_id'];
													$query_cat=mysqli_query($db,"select * from categories where id = '$catId'");
													while($row_cat=mysqli_fetch_array($query_cat)){
													echo $row_cat['name'];  } 
												?>
											  
												</td>
												<td>  <center>
														<img src="<?php echo $row['image']; ?>" style="width: 70px;height: 50px;" />
													</center> 
												</td>
												<td>  <?php echo $row['title']; ?>
												</td>
												<td>
													<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="editNews.php?rowvalue=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-edit"></span>
													</a>

													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="save_news_blogs.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>	
									<?php  } else {  echo 'No Record Found !';  } ?>
									</div>
									
									<div class="tab-pane" id="3">

									<?php $query=mysqli_query($db,"SELECT * FROM news_blogs where type = 'Video' and status = 'Active' order by id DESC ");  
										$sno = 1;
										if(!empty($query)){  ?>
									<table id="example4" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" style="margin-top: 30px;">
										<thead>
											<tr role="row">
												<th>Sno</th>
												<th>Category</th>
												<th>Image</th>
												<th>Title</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php while($row=mysqli_fetch_array($query)){ ?>
											<tr role="row" class="odd">
											  <td> <?php echo $sno; ?> </td>	
												<td>
												<?php $catId = $row['category_id'];
													$query_cat=mysqli_query($db,"select * from categories where id = '$catId'");
													while($row_cat=mysqli_fetch_array($query_cat)){
													echo $row_cat['name'];  } 
												?>
											  
												</td>
												<td>  <center>
														<img src="<?php echo $row['image']; ?>" style="width: 70px;height: 50px;" />
													</center> 
												</td>
												<td>  <?php echo $row['title']; ?>
												</td>
												<td>
													<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="editNews.php?rowvalue=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-edit"></span>
													</a>

													<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="save_news_blogs.php?del=del&id=<?php echo base64_encode($row['id']); ?>">
														<span class="fa fa-times"></span>
													</a>
												</td>
											</tr>													
											<?php $sno++; } ?>	
										</tbody>
									</table>								
									<?php  } else {  echo 'No Record Found !';  } ?>									
								</div>									
									
								</div>
							</div>						
											
						</div>
					  </div>
					  <!-- /.box -->
					</div>		
		</div>
	</section>
</div>	

<?php
require('footer.php');
?>