<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		
 		$data=$_POST['data'];
 		$f=0;
 		foreach ($data as $val)
 		{ 
		    
		
 		
 		$operator_name=$_POST['operator_name'];
 		
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
 		$sql="INSERT INTO `tpi`(`pump_sno`, `operator_name`, `date`,`time`,`month`,`year`,`tpi`,`shift`) VALUES ('$val','$operator_name','$date','$time','$month','$year','YES','$shift')";
 		if(mysqli_query($con,$sql))
 		{
 			$sql1="UPDATE master_scheduling SET tpi='Approved' WHERE serial_no='$val'";
 			if(mysqli_query($con,$sql1))
 			{
 				$sql2="UPDATE pigeon_hole SET tpi='Approved' WHERE pump_sno='$val'";
	 			if(mysqli_query($con,$sql2))
	 			{
 					$f=1;
 				}
 			}
 			else
 			{
 				$f=0;
 			}
 		}
 		
 	}
 	if($f=1)
	{
		echo "Data Stored Successfully";
	}
	else
	{
		echo "Already Done";
	}
	}
	else
	{
		header("location:final-2.php");
	}
	
}
else
{
  header("location:index.php");
}
?>