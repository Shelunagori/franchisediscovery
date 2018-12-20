<?php 
require('header.php');
require('config.php');
?>
<style>
	.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }

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
								$message = 'SEO update successfully !';
							} else if($status == 'fail') {
								$status = 'fail';
								$message = 'Something went wrong !';
							}else if($status == 'delete_success')
							{
								$status = 'success';
								$message = 'SEO deleted successfully !';
							}
							else if($status == 'delete_fail')
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
			<div class="col-xs-12">
					  <div class="box">
						<div class="box-header">
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  List of SEO</h3>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<?php $query=mysqli_query($db,"SELECT page_seo.id , page_seo.page_id , page_seo.category_id , page_seo.brand_id , page_seo.news_blogs_id FROM page_seo INNER JOIN pages ON (page_seo.page_id = pages.id) where pages.is_seo = 'Yes' order by page_seo.id DESC ");  
								$sno = 1;
								if(!empty($query)){  ?>
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th>Sno</th>
										<th>Page Name</th>
										<th>Category Name</th>
										<th>Brand Name</th>
										<th>News/Blogs/Video Title</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php while($row=mysqli_fetch_array($query)){ ?>
									<tr role="row" class="odd">
									  <td> <?php echo $sno; ?> </td>	
										<td>
										<?php $pageID = $row['page_id']; 
											 $catID = $row['category_id'];
											 $brandID = $row['brand_id'];
											 $nbID = $row['news_blogs_id'];
											$query_cat=mysqli_query($db,"select * from pages where id = '$pageID'");
											while($row_cat=mysqli_fetch_array($query_cat)){
											echo $row_cat['name'];  } 
										?>
										</td>
										
										<td>
											<?php
												$query_cat=mysqli_query($db,"SELECT * FROM categories where id = '$catID' ");
												while($cats=mysqli_fetch_array($query_cat)){
													echo $cats['name'];  } 
											?>
										</td>
										<td>
											<?php
												$query_cat=mysqli_query($db,"SELECT * FROM brands where id = '$brandID' ");
												while($cats=mysqli_fetch_array($query_cat)){
													echo $cats['name'];  } 
											?>
										</td>
										
										<td>
											<?php
												$query_cat=mysqli_query($db,"SELECT * FROM news_blogs where id = '$nbID' ");
												while($cats=mysqli_fetch_array($query_cat)){
													echo $cats['title'];  } 
											?>
										</td>
										
										<td>
											<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_seo.php?rowvalue=<?php echo base64_encode($row['id']); ?>">
												<span class="fa fa-edit"></span>
											</a>

											<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="delete_seo.php?Del=Del&id=<?php echo base64_encode($row['id']); ?>">
												<span class="fa fa-times"></span>
											</a>
										</td>
									</tr>													
									<?php $sno++; } ?>	
								</tbody>
							</table>								
							<?php  } else {  echo 'No Record Found !';  } ?>						
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->
					</div>		
		</div>
	</section>
</div>	
<?php
require('footer.php');
?>