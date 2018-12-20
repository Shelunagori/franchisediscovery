<?php session_start();
include("admin/config.php");

$email = base64_decode($_GET['data']);
	$sql = "SELECT * FROM registration WHERE email='$email'" ;
	$rs = $db->query($sql);
	if($rs->num_rows > 0)
	{
		$sql_verify = "update registration set status = 1 where email = '$email' and status = 0 ";
		$isVerify = $db->query($sql_verify);
		
		if($isVerify)
		{	$_SESSION['isVerify']= 1;
			header('location:login.php');
		}else
		{
			$_SESSION['isVerify']= 0;
		}		
	}
	else
		{
			$_SESSION['isVerify']= 0;
		}
	

header('location:login.php');
?>