<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{

		include 'db.php';
 		$pump_sno=$_POST['pump_sno'];
 		$flag=$_POST['flag'];
 		// echo $flag;
 		if($flag=="ALL")
 		{
 			$sql="SELECT * FROM `master_scheduling` WHERE serial_no='$pump_sno'";
 		}
 		else if($flag=="3")
 		{
 			$sql="SELECT * FROM `master_scheduling` WHERE serial_no='$pump_sno' AND (tpi='Approved' OR tpi='NO') AND siron_flag!='1'";

 		}
 		else
 		{
 			$sql="SELECT * FROM `master_scheduling` WHERE serial_no='$pump_sno' AND flag='$flag' AND siron_flag!='1'";
 		}
 		
 		
 		if($res=mysqli_query($con,$sql))
 		{
 			if(mysqli_num_rows($res)==0)
 			{
 				echo "Not Available/Already Done";
 			}
 			else
 			{
 				while ($row=mysqli_fetch_array($res))
	 			{
	 				echo $row['fg']."+".$row['seq_no']."+".$row['fg_part_no']."+".$row['customer']."+".$row['type']."+".$row['tpi'];
	 			}
 			}
 			
 			
 		}
 		else
 		{
 			echo "Not Available/Already Done";
 		}
	}
	else
	{
		header("location:pigeon-hole.php");
	}
}
else
{
  header("location:index.php");
}
?>