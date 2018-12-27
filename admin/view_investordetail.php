<?php
	include('config.php');
	include('header.php');
	$status="";
	$message="";
		$id=base64_decode($_GET['id']);
		
		
?>
<style>

.content {

  

    padding-left: 20px;

    padding-right: 20px;

                padding-top: 8px;

}

 .info-box-content {

    padding: 17px 10px;

    margin-left: 90px;

}

 

.vc_custom_1537353427517 {
		margin-left: 258px;
		margin-right: -177px;
		margin-top: 42px;
                height:150px;

    padding-top: 42px !important;

    padding-bottom: 80px !important;

    background-color: #ff4247 !important;

    background-position: center !important;

    background-repeat: no-repeat !important;

    background-size: cover !important;

}

.vc_custom_1537353427518 {

                height:150px;

    padding-top: 42px !important;

    padding-bottom: 80px !important;

    background-color: #523473 !important;

    background-position: center !important;

    background-repeat: no-repeat !important;

    background-size: cover !important;

}

.vc_custom_1537353427519 {

                height:150px;

    padding-top: 42px !important;

    padding-bottom: 80px !important;

    background-color: #ffbd02 !important;

    background-position: center !important;

    background-repeat: no-repeat !important;

    background-size: cover !important;

}.vc_custom_1537353427516 {

                height:150px;

    padding-top: 42px !important;

    padding-bottom: 80px !important;

    background-color: #0084f5 !important;

    background-position: center !important;

    background-repeat: no-repeat !important;

    background-size: cover !important;

}

.vc_btn3-container.vc_btn3-center {

    text-align: center;

                font-size:20px;

}

 

.vc_general {

    border-color: #EBEBEB;

    background-color: transparent;

                color:#EBEBEB;

               

}

.wpb_single_image{

                text-align:center;

}

.vc_single_image-img{

                border-radius:50%;

}

.vc_single_image-wrapper{

                margin-top: -24px;

}

.vc_custom_heading{

                margin-top:14px;

}

.wpb_wrapper{

                font-family: Arial,Helvetica !important;

}



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



.link{
padding : 5px 15px;
}
.boxs
{
	background-color: #50719a;
	height: 135px;
	width: 180px;
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
.height{
	padding:70px;
}
.small-box .icon-this{
	    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    /* transition: all .3s linear; */
    position: absolute;
    top: 20px;
    right: 94px;
    z-index: 0;
    font-size: 70px;
    color: #fff;
}
</style>

<div class="col-sm-12 no-print" style="padding-bottom:20px;">

<div class="col-sm-3">

<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">

<div class="vc_column-inner vc_custom_1537353427517">

<div class="wpb_wrapper">



<div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1539408094847">



<figure class="wpb_wrapper vc_figure">

<div class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey"></div>

</figure>

</div>

<h3 style="color: #ffffff;text-align: center;font-family:Arial,Helvetica !important;font-weight:400;font-style:normal;font-size: 20px;" class="vc_custom_heading">			
			<a  href="profile_view.php?id=<?php echo base64_encode($id); ?>"> Profile</a></h3>
<div class="vc_btn3-container vc_btn3-center icon-this">
<i class="fa fa-user "></i> 


</div>

</div>

</div>

</div>

</div>
<div class="col-sm-3">

<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">

<div class="vc_column-inner vc_custom_1537353427517">

<div class="wpb_wrapper">



<div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1539408094847">



<figure class="wpb_wrapper vc_figure">

<div class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey"></div>

</figure>

</div>
<h3 style="color: #ffffff;text-align: center;font-family:Arial,Helvetica !important;font-weight:400;font-style:normal;font-size: 20px;" class="vc_custom_heading">			
			<a href="favrouite_view.php?id=<?php echo base64_encode($id); ?>">  Favrouite List</a></h3>

<div class="vc_btn3-container vc_btn3-center icon-this">
<i class="fa fa fa-thumbs-o-up"></i>


</div>

</div>

</div>

</div>

</div>
<div class="col-sm-3">

<div class="wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">

<div class="vc_column-inner vc_custom_1537353427517">

<div class="wpb_wrapper">



<div class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1539408094847">



<figure class="wpb_wrapper vc_figure">

<div class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey"></div>

</figure>

</div>
<h3 style="color: #ffffff;text-align: center;font-family:Arial,Helvetica !important;font-weight:400;font-style:normal;font-size: 20px;" class="vc_custom_heading">				<a href="support_ticket.php?id=<?php echo base64_encode($id); ?>">Tickets</a></h3>

<div class="vc_btn3-container vc_btn3-center icon-this">
<i class="fa fa-ticket "></i>


</div>

</div>

</div>

</div>

</div>
</div>

<div class="content-wrapper">
    <section class="content">
    	<div class="row col-lg-12">
       
        </div>
        <!-- ./col -->
       
        <!-- ./col -->
      
      </div>
	</section>
</div>	


<?php
require('footer.php');
?>

     
	

