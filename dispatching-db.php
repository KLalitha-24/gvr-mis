
<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
		$data=explode(',',$_POST['data']);
 		foreach ($data as $val)
 		{ 
	 		// echo $pump_sno=$val;
	 		$shift=$_POST['shift'];
	 		$pump_sno=$val;
	 		$operator_name=$_POST['operator_name'];
	 		$vehicle_no=$_POST['vehicle_no'];
	 		$invoice_no=$_POST['invoice_no'];
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
	 		include '4-4-5-calendar.php';
	 		$sql="INSERT INTO `dispatching`(`pump_sno`, `operator_name`, `date`,`time`,`month`,`year`,`invoice_no`,`vehicle_no`,`shift`) VALUES ('$pump_sno','$operator_name','$date','$time','$month','$year','$invoice_no','$vehicle_no','$shift')";
	 		if(mysqli_query($con,$sql))
	 		{
	 			$sql1="UPDATE master_scheduling SET flag='5' WHERE serial_no='$pump_sno'";
	 			if(mysqli_query($con,$sql1))
	 			{
	 				$s_flag=1;
	 			}
	 			else
	 			{
	 				$s_flag=0;
	 			}
	 		}
	 		else
	 		{
	 			$s_flag=0;
	 			echo "Already Done";
	 		}
	 	}
	 	if($s_flag==1)
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
		header("location:dispatching.php");
	}
}
else
{
  header("location:index.php");
}
?>