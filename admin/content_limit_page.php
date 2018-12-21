<?php 
require('header.php');
require('config.php');
$status='';
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
 
<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
  
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
		<form role="form" method="post" action="save_news_blogs_content.php" enctype="multipart/form-data">
        <div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
					  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  Create Content Limit</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
							  <i class="fa fa-minus"></i>
							</button>
					  </div>
					</div>
					<div class="box-body">
							<div class="box-body">
								<div class="col-md-6">
									<div class="form-group">
										<select required name="type" class="form-control select2" id="category_type_id" style="width: 100%;">
										  <option value="">---Select---</option>
										  <option value="Blogs">Blogs</option>
										  <option value="News">News</option>
										  <option value="Video">Brand Video</option>
										</select>
									</div>
								</div>	
								<div class="col-md-6">	
									<div class="form-group">
										<select name="news_blog_id" class="form-control select2 news_blog_id" style="width: 100%;">
										  <option value="">---Select---</option>
										</select>
									</div>
									
									
								</div>
							</div>
							<div class="box-footer">
				   <button type="submit" class="btn btn-info pull-right" name="add">Submit</button>
				</div>
						</div>
				</div> 
			</div>
			</form>
	
	<div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Brand Grid</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
           
          </div>
        </div>
        <div class="box-body">
        <div id="cStatus"> </div>
          <table id="example5" class="display">
                <thead>
                <tr>
                  <th># </th>
                  <th>Type</th>
                  <th>Content Title</th>
                  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1; $sequence=1;
					$sql="SELECT news_blog_contents.id, news_blog_contents.type , news_blogs.title FROM  news_blog_contents INNER JOIN news_blogs ON (news_blog_contents.news_blog_id = news_blogs.id) where news_blog_contents.status ='Active' order by news_blog_contents.id DESC  ";
					$result=mysqli_query($db,$sql);
					
					$num_rowss = $result->num_rows;
					if(@$num_rowss > 0){
					while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php echo $row['type'];?></td>
							<td><?php echo $row['title']; ?></td>
							<td>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure You want Deactivated ?')" href="save_news_blogs_content.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
						<?php
					}}
				?>                 
               </tbody>
			  
              </table>
      </div>
      <!-- /.box -->
  </div>

</div></div>
	</section>
</div>
<?php require('footer.php'); ?>
<script>
$(document).ready(function() { 
	  $('#category_type_id').on('change',function(){
		  var selectedValues = $(this).val();
			$.ajax({
				url:'get_category_content_title_ajax.php?selectedValue='+selectedValues,
				type:"GET",
				}).done(function(response){ 
					$(".news_blog_id").html(response);
			});
	  });
});		
</script>



