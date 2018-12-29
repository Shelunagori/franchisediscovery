<?php 
require('config.php');

	$where='';$whereCat='';
 if(isset($_GET['ok']))
{
	@$category_id=$_GET['category'];
	$brand_id=$_GET['brand_name'];
	$from_date= $_GET['from_datepicker']?date('Y-m-d',strtotime($_GET['from_datepicker'])):null;
	if(!$from_date==null)
		$from=$from_date." 00:00:00.000000";

	$to_date= $_GET['to_datepicker']?date('Y-m-d',strtotime($_GET['to_datepicker'])):null;
	if(!$to_date==null)
		$to=$to_date." 00:00:00.000000";

	
	if(!$category_id == null && @$from ==null && @$to ==null && $brand_id==null)
	{
		$whereCat="and category_id=$category_id";
	}
	elseif(!$brand_id==null)
	{
		$where="and id=$brand_id";
		//$whereCat="and category_id=$category_id";
	}
	elseif(!@$from==null && !@$to==null && $category_id==null && $brand_id==null)
	{
		$where="and created_on BETWEEN '$from' AND '$to'";
	}
	elseif(!@$from==null && !@$to==null &&!$category_id==null && !$brand_id==null)
	{
		$where="AND id=$brand_id AND created_on BETWEEN '$from' AND '$to'";
		$whereCat="and category_id=$category_id";
	}
	elseif(!@$from==null && @$to==null && $category_id==null && $brand_id==null)
	{
		$where="AND created_on > '$from'";
	}
	elseif(@$from==null && !@$to==null && $category_id==null && $brand_id==null)
	{
		$where="AND created_on < '$to'";
	}
	
}	
	
	if(!empty($where)){
		$query = "select * from brands where status = 'Active' and is_approve='Approved' $where order by id DESC ";
	}else{
		$query = "select * from brands where status = 'Active' and is_approve='Approved' order by id DESC ";
	}
	
require('header.php');
?>
<link href="plugins/datepicker/datepicker3.css" rel="stylesheet">
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
						  <h3 class="box-title"><i class="fa fa-fw fa-angle-double-right"></i>  List of Brands</h3>
						  <a href="add_brand.php" class="btn btn-primary pull-right">ADD</a>
						</div>
					<form method="GET">

						<table class='table table-striped'>
							<tr>
								<!--<td width="20%">
									<select name="category" class="form-control" id="category">
										<option value="">--Select Category--</option>
										<?php
											$category_query=mysqli_query($db,"SELECT * FROM categories");
											while($category_row=mysqli_fetch_array($category_query))
											{
												echo"<option value=".$category_row['id'].">".$category_row['name']."</option>";
											} ?>
									</select>
								</td>-->
								<td width="20%">
									<select name="brand_name" class="form-control" id="brand_name">
										<option value="">--Select Brand--</option>
									<?php 
									$sql="SELECT * FROM brands WHERE status='Active' and is_approve='Approved'";
									$brand_query=mysqli_query($db,$sql);
									while($category_row=mysqli_fetch_array($brand_query))
											{
												echo"<option value=".$category_row['id'].">".$category_row['name']."</option>";
											} ?>
									</select>
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker" name="from_datepicker" placeholder="From Date" data-date-format="mm-dd-yyyy">
									</div>
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker1" name="to_datepicker" placeholder="To Date">
									</div>
								</td>
								<td>
									<button class="btn btn-primary" type="submit" name="ok">Filter</button>
								</td>
							</tr>
						</table>
					</form>
						<!-- /.box-header -->
						<div class="box-body table-responsive no-padding">
							<?php 
							$query_result=mysqli_query($db,$query); 
								$sno = 1;
								if(!empty($query_result)){ 
									
									
								?>
							<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
								<thead>
									<tr role="row">
										<th>S.No.</th>
										<th>Category Name</th>
										<th>Image</th>
										<th>Name</th>
										<th>Food Type</th>
										<th>Area require</th>
										<th>Investment range</th>
										<th>Franchise outlets</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php while($row=mysqli_fetch_array($query_result)){ 
									$brand_id = $row['id'];
									$queryCat="select * from brand_rows where brand_id=$brand_id $whereCat";
									$query_results=mysqli_query($db,$queryCat);
									$arrayCategory=array();
										if($query_results->num_rows > 0){
										
											while($row_brands=mysqli_fetch_array($query_results)){ 
												$arrayCategory[] = $row_brands['category_id'];

											}
										}
										
									?>
									<tr role="row" class="odd">
									  <td> <?php echo $sno; ?> </td>	
										<td width="10%">
										
											<?php
												$query_cat=mysqli_query($db,"select * from categories where status = 0");
												while($rows=mysqli_fetch_array($query_cat)){
											?>
												 <?php $catData='';
												if(!empty($arrayCategory)){
												foreach($arrayCategory as $cat){
													if($cat == $rows['id']){ 
														$catData.= $rows['name'].'<br>';
													 ?> 
													<?php }
												}} echo $catData;?>
												
											<?php } ?>
										
										</td>
										<td>  <center>
												<img src="<?php echo $row['brand_image']; ?>" style="width: 70px;height: 50px;" />
											</center> 
										</td>
									    <td><?php echo $row['name']; ?></td>
										<td><?php echo $row['food_type']; ?></td>
										<td><?php echo $row['area_reqired']; ?></td>
										<td><?php echo $row['investment_range']; ?></td>
										<td><?php echo $row['franchise_outlets']; ?></td>
										<td>
											<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="brand_edit.php?rowvalue=<?php echo base64_encode($row['id']); ?>">
												<span class="fa fa-edit"></span>
											</a>

											<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="delete_brand.php?id=<?php echo base64_encode($row['id']); ?>">
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
<script strc="plugins/datepicker/bootstrap-datepicker.js"></script>


<script>
$( document ).ready(function() {
	$('#datepicker').datepicker({
      autoclose: true,
    });
	$('#datepicker1').datepicker({
      autoclose: true,
    });
	$('#category').on('change',function(){
                var category_id = $(this).val();
               	$.ajax({
                type:'json',
                 url : 'brand_option.php?category_id='+category_id,    
                    success: function(result){
                       $('#brand_name').html(result);
                       
                    }
                });
                
            });

});
 $('#from_datepicker').datepicker({
			});
			 $('#to_datepicker').datepicker({
			});
</script>