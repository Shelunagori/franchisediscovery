<?php
include('config.php');
$status='';
$message='';
@$id=base64_decode($_GET['id']);
$detail_query="select * FROM advertise WHERE id=$id";
if(isset($_POST['add']))
{
	$comment=$_POST['comment'];
	$reminder=$_POST['reminder'];
	$date_on = date('Y-m-d', strtotime($reminder));
	$time_on = date('H:i:s', strtotime($reminder));
	$add_comm=mysqli_query($db,"INSERT INTO investor_data_rows(comment,date_on,time_on,investor_datas_id) VALUES ('$comment','$date_on','$time_on','$id')");

}
if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "DELETE FROM investor_data_rows where id = '$id'";
		if ($db->query($delete_query) === TRUE) {
			
			header('location:view_investordata.php?id='.$_GET['investor_id']);
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
		}
	}

include('header.php');
?>

<style>
.right
{
	margin-left: 20px;
}
.dot {
  height: 55px;
  width: 150px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
</style>
<div class="content-wrapper">
    <section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="box">
					<div class="box-header">
						 <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>View Advertise</h3>
					</div>
						
					<div class="box-body">
						<form method="post" enctype="multipart/form-data">
							<div class="col-md-12">
								
										<?php
												$result=mysqli_query($db,$detail_query);
												while($row=mysqli_fetch_array($result))
												{

											?>
											
											<div class="col-md-12">
												<div class="form-group">
													<h3><?php
														$user_id=$row['user_id'];
														$uname_query=mysqli_query($db,"SELECT * FROM registration WHERE id=$user_id");
														while($uname_row=mysqli_fetch_array($uname_query))
														{
															echo $uname_row['first_name'];
														}
													?></h3>
													<div class="form-group">
														<label class="form-data">Page :  </label>
														
														<?php
														$page_id=$row['page_id'];
															$page_query=mysqli_query($db,"SELECT * FROM pages where id=$page_id");
															while($pages_row=mysqli_fetch_array($page_query))
															{
																echo $pages_row['name'];
															}
															
															
														?>
													</div>
													<div class="form-group">
														<label class="form-data">Position :   </label>
														<?= $row['position_name'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Image :</label>
														<?= $row['image'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Link URL :</label>
														<a href="<?= $row['link_url'] ?>"><?= $row['link_url'] ?></a>
													</div>
													<div class="form-group">
														<label class="form-data">Start
														Date :</label>
														<?= $row['start_date'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">End Date :</label>
														<?= $row['end_date'] ?>
													</div>
													<div class="form-group">
														<label class="form-data">Current Date :</label>
														<?= $row['current_dates'] ?>
													</div>
													
												<?php } ?>
											</div>	
								</div>
						</form>
					</div> 

				</div>
			</div>
			
				
		</div>
	</section>
</div>
<?php
include('footer.php');
?>
