<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		
 		$pump_sno=$_POST['pump_sno'];
 		$date=date("Y-m-d");
 		$time=date("H:i:s");
 		if(date('H')>=0 && date('H')<6)
		{
			$date=date("Y-m-d",strtotime("-1 day"));
			$year=date("Y",strtotime("-1 day"));
		}
		else
		{
			$date=date("Y-m-d");
			$year=date("Y");
		}
 		$comments=$_POST['comments'];
 		$sql="UPDATE siron SET reject_comments='".$comments."',reject_date='".$date."',reject_time='".$time."',flag='2',approved_date='',approved_time='' WHERE pump_sno='".$pump_sno."'";
 		if(mysqli_query($con,$sql))
 		{
 			$sql_up="UPDATE master_scheduling SET siron_flag='1' WHERE serial_no='".$pump_sno."'";
 			if(mysqli_query($con,$sql_up))
 			{
 				echo "Data Stored Successfully";
 			}
 			
 			
 		}
 		else
 		{
 			echo "Already Done";
 		}
	}
	else
	{
		header("location:siron.php");
	}
}
else
{
  header("location:index.php");
}
?>