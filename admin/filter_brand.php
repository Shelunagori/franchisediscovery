<?php
if(isset($_GET['brand_filter']))
			{
				$first_name=$_GET['name'];
				$email=$_GET['email'];
				$from_date= $_GET['from_datepicker']?date('d-m-Y',strtotime($_GET['from_datepicker'])):null;
				if(!$from_date==null)
					$from=$from_date;

				$to_date= $_GET['to_datepicker']?date('d-m-Y',strtotime($_GET['to_datepicker'])):null;
				if(!$to_date==null)
					$to=$to_date;

				if(!$first_name == null && $email == null && @$from == null  && @$to == null)
				{
					$brand_where="AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && !$email==null && @$from== null && @$to == null)
				{
					$brand_where="AND email LIKE '%$email%'";
				}

				

				else if($first_name==null && $email==null && !@$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date BETWEEN '$from' AND '$to'";
				}
				else if(!$first_name==null && !$email==null && !@$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date BETWEEN '$from' AND '$to' AND email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				else if($first_name==null && $email==null && !@$from== null && @$to == null)
				{
					$brand_where="AND  enquite_date > '$from'";
				}
				
				else if(!$first_name==null && !$email==null && @$from== null 
					&& @$to == null)
				{
					$brand_where="AND  email LIKE '%$email%' AND name LIKE '%$first_name%'";
				}
				
				else if($first_name==null && $email==null && @$from== null && !@$to == null)
				{
					$brand_where="AND enquite_date > '$to'";
				}
				
					echo $brand_where;


		}
?>
