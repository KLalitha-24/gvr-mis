<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$pump_sno=$_POST['pump_sno'];
 		$operator_name=$_POST['operator_name'];
 		$tpi=$_POST['tpi'];
 		$date=date("Y-m-d");
 		$time=date("H:i:s");
 		$shift=$_POST['shift'];
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
 		include '4-4-5-calendar.php';
 		$sql="INSERT INTO `packing`(`pump_sno`, `operator_name`, `date`,`time`,`month`,`year`,`tpi`,`shift`) VALUES ('$pump_sno','$operator_name','$date','$time','$month','$year','$tpi','$shift')";
 		if(mysqli_query($con,$sql))
 		{
 			$sql1="UPDATE master_scheduling SET flag='4' WHERE serial_no='$pump_sno'";
 			if(mysqli_query($con,$sql1))
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
		header("location:packing.php");
	}
}
else
{
  header("location:index.php");
}
?>