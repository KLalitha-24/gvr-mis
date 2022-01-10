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

 		$shift=$_POST['shift'];
 		$from_station=$_POST['from_station'];
 		$station=$_POST['station'];
 		$comments=$_POST['comments'];
 		include '4-4-5-calendar.php';
 		$sql="INSERT INTO `siron`(`pump_sno`, `operator_name`, `date`,`time`,`tpi`,`shift`,`from_station`,`station`,`comments`) VALUES ('$pump_sno','$operator_name','$date','$time','$tpi','$shift','$from_station','$station','$comments')";
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