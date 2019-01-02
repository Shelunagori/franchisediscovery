<?php
require('config.php');
require('header.php');

$created_by=$_SESSION['login_id'];
$edited_by=$_SESSION['login_id'];

$status = '';
$message = '';
	if(isset($_GET['ok']))
			{
				$page_id=$_GET['page_id'];
				$position_name=$_GET['position_name'];
				$from_date= $_GET['start_date']?date('Y-m-d',strtotime($_GET['start_date'])):null;
				if(!$from_date==null)
					$from=$from_date;

				$to_date= $_GET['end_date']?date('Y-m-d',strtotime($_GET['end_date'])):null;
				if(!$to_date==null)
					$to=$to_date;


				if(!$page_id==null && $position_name == null && @$from == null && @$to == null)
				{
					$where="page_id LIKE'%$page_id%'";
				}
				
				else if($page_id==null && $position_name==null && !@$from==null && !@$to==null)
				{
					$where="start_date BETWEEN '$from' AND '$to'";
				}
				else if(!$page_id==null && !$position_name==null && @$from==null && @$to==null)
				{
					$where="page_id LIKE'%$page_id%' AND position_name LIKE '%$position_name%'";
				}
				else if(!$page_id==null && !$position_name==null && !@$from==null && !@$to==null)
				{
					$where="page_id LIKE'%$page_id%' AND position_name LIKE '%$position_name%' AND start_date BETWEEN '$from' AND '$to'";
				}
				else if($page_id==null && $position_name==null && !@$from==null && @$to==null)
				{
					$where="start_date > '$from'";
				}
				else if($page_id==null && $position_name==null && @$from==null && !@$to==null)
				{
					$where="start_date < '$to'";
				}
				else if(!$page_id==null && $position_name==null && @$from==null && !@$to==null)
				{
					$where="start_date < '$to' AND page_id LIKE'%$page_id%'";
				}
				else if(!$page_id==null && $position_name==null && !@$from==null && @$to==null)
				{
					$where="start_date > '$from' AND page_id LIKE'%$page_id%'";
				}
				
				
			
				else if(!$page_id==null && $position_name==null && !@$from==null && !@$to==null)
				{
					$where="start_date BETWEEN '$from' AND '$to' AND page_id LIKE'%$page_id%'";
				}
			
	}
		if(!empty($where)){
			$query= "select * from advertise where $where order by id DESC ";
		}else{
			$query= "select * from advertise order by id DESC ";
		}



	if(@$_GET["Action"] == "Del")
	{
		$id = mysqli_real_escape_string($db,base64_decode($_GET['id']));
		$delete_query = "DELETE  FROM  advertise where id =$id";
		if ($db->query($delete_query) === TRUE) {
			
			$status = 'success';
			$_SESSION['message'] = 'Data deleted successfully !';
		} else {
			$status = 'fail';
			$_SESSION['message'] = 'Something went wrong !';
		}
	}

?>

<link href="admin_assest/admin_css/jquery.dataTables.min.css" rel="stylesheet" />
 <style>
	.dataTables_wrapper { padding: 0px 30px 0px 30px !important; }

</style>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
       <div class="row">
        <div class="col-md-12">
		<?php if(isset($_SESSION['message'])):?>
		  <?php if($_SESSION['message'] == 'Something went wrong !'):?>
				<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></strong> 
				</div>
		  <?php else: ?>	
				<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<strong><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></strong> 
				</div>
		  <?php endif; ?>
		<?php endif;?>

		  </div>
        <!-- left column -->
		
<div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">View Advertise Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
          <form method="get" enctype="multipart/form-data">
						<table class='table table-striped'>
							<tr>
								<td width="20%">
										<select name="page_id" id="page_id" class="form-control">
											<option value="">--Select Page--</option>
											<?php
												$page_query=mysqli_query($db,"SELECT * FROM pages WHERE is_valid_advertise='Yes'");
												while($page_row=mysqli_fetch_array($page_query))
												{
													echo"<option value=".$page_row['id'].">".$page_row['name']."</option>";
												}
								?>
							</select>
								</td>
								<td width="20%">
									<select name="position_name" id="position_name" class="form-control">
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker" name="start_date" placeholder="From Date" data-date-format="mm-dd-yyyy" value="<?= @$from_date ?>">
									</div>
								</td>
								<td width="20%">
									<div class="input-group date">
										<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right datepicker" id="datepicker1" name="end_date" placeholder="To Date" value="<?= @$to_date ?>">
									</div>
								</td>
								<td>
									<button class="btn btn-primary" type="submit" name="ok">Filter</button>
								</td>
							</tr>
						</table>
					</form>
        <div class="box-body">
        <div id="cStatus"> </div>
        <form action="admin/update_Sequence" method="post">
          <table id="example1" class="display select">
                <thead>
                <tr>
                  <th># </th>
                  <th>Page</th>
                  <th>Position</th>
                  <th>Link URL</th>
				  <th>Action</th>
               </tr>
                </thead>
                <tbody>
				<?php $i = 1;
					$result=mysqli_query($db,$query);
					while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?php echo $i; $i++;  ?></td>
							<td><?php  $page_id=$row['page_id'];
								$page_query=mysqli_query($db,"SELECT * FROM pages where id=$page_id");
								while($pages_row=mysqli_fetch_array($page_query))
								{
									echo $pages_row['name'];
								}

							?></td>
							<td><?php echo $row['position_name']; ?></td>
							<td><a href="<?php echo $row['link_url']; ?>"><?php echo $row['link_url']; ?></a></td>
							<td>	
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="edit_advertiseform.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-edit"></span>
								</a>
								<a style="color:#fff;" class="btn btn-info btn-rounded btn-sm" href="view_advertiseform.php?id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-eye"></span>
								</a>
								<a class="mb-control1 btn btn-danger btn-rounded btn-sm" onclick="return confirm('Are you sure ?')" href="list_advertiseform.php?Action=Del&id=<?php echo base64_encode($row['id']); ?>">
									<span class="fa fa-times"></span>
								</a>
							</td>
						</tr>
					<?php } 
					
					?>

               </tbody>
              </table>
            </form> 
      </div>
      <!-- /.box -->
  </div>
</div>
</div>

</section>
    <!-- /.content -->
   </div>
</div>

   <?php require('footer.php'); ?>
<script>
	$(document).ready(function(){
		$('#page_id').on('change',function(){
	                var page_id = $(this).val();
	               
	                $.ajax({
	                 url : 'acc_page.php?page_id='+page_id,    
	                    success: function(result){
	                       $('#position_name').html(result);
	                       
	                    }
	                });
	                
	            });
		 
		 $('#datepicker').datepicker();
		 $('#datepicker1').datepicker();
	});
</script>