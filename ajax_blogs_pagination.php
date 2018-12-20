<?php require('admin/config.php');     
	$limit = (intval($_GET['limit']) != 0 ) ? $_GET['limit'] : 12;
	$offset = (intval($_GET['offset']) != 0 ) ? $_GET['offset'] : 0;
	$cat = @$_GET['cat'];
	
	if(!empty($cat) and $cat != 0)
	{
		$query_nw=mysqli_query($db,"SELECT news_blogs.id,news_blogs.category_id,news_blogs.video_url,news_blogs.type,admin.name as create_by, categories.name,categories.seo_name as catSeoName, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on, news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN categories ON (news_blogs.category_id = categories.id) where news_blogs.type = 'Blogs' and news_blogs.category_id = '$cat' order by news_blogs.id DESC LIMIT $limit OFFSET $offset");  
		
	}else
	{
		$query_nw=mysqli_query($db,"SELECT news_blogs.id,news_blogs.category_id,news_blogs.video_url,news_blogs.type,admin.name as create_by, categories.name,categories.seo_name as catSeoName, news_blogs.title, news_blogs.content, news_blogs.image, news_blogs.create_on, news_blogs.seo_name FROM news_blogs INNER JOIN admin ON (news_blogs.create_by = admin.id) INNER JOIN categories ON (news_blogs.category_id = categories.id) where news_blogs.type = 'Blogs' order by news_blogs.id DESC LIMIT $limit OFFSET $offset");  
	}							
	
	if(!empty($query_nw)){ 
	while($row_nw=mysqli_fetch_array($query_nw)){ 
	
	?>		


			<div class="col-12">
				<div class="single_blog_area mb-30">
				  <div class="blog_post_thumb">
						<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_nw['image']); ?>" alt="<?php echo $row_nw['title']; ?>">
					</div>
				   
				 <div class="blog_post_content d-flex align-items-center justify-content-center">
						<div class="blog_text_area">
							<h4 class="blog_title"><a href="<?php echo $baseURL; ?>blogdetail/<?php echo $row_nw['catSeoName']; ?>/<?php echo $row_nw['seo_name']; ?>"><?php echo $row_nw['title']; ?></a></h4>
							<p><?php echo substr($row_nw['content'],0,150).'...'; ?> </p>
							<a href="<?php echo $baseURL; ?>blogdetail/<?php echo $row_nw['catSeoName']; ?>/<?php echo $row_nw['seo_name']; ?>">Continue Reading <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
						</div>
					</div>
				  
				</div>
			</div>



	
	<!--<div class="news-details">
		<div class="image">
			<img src="<?php echo $baseURL; ?><?php echo str_replace('../',"",$row_nw['image']); ?>" alt="<?php echo $row_nw['title']; ?>">
		</div>
		<div class="details">
		<?php $title = str_replace("?","",$row_nw['title']); $title = str_replace("/","",$row_nw['title']);  ?>
				<h2> <a href="<?php echo $baseURL; ?>blogdetail/<?php echo $row_nw['seo_name']; ?>">
					<?php echo $row_nw['title']; ?>
				</a>  <span class="badge"><?php echo $row_nw['name']; ?></span></h2>  
				<p> <span> <?php echo substr($row_nw['content'],0,150).'...'; ?></span> </p>
			<div class="singl-blog-status-bar">
				<span>
					<a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i> 
					<?php echo date('d-M-Y',strtotime($row_nw['create_on'])); ?>
					</a>
				</span>
				<span>
					<a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i> 
					<?php echo $row_nw['name']; ?>
					</a>
				</span>
				<span>
					<a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 3 Comments</a>
				</span>
			</div>
	   </div>
	</div> -->
	<?php } } else { echo 0; exit; } ?>		