<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$id=$_POST['id'];
 		$plan=$_POST['plan'];
 		$datetime=date("Y-m-d H:i:s");
 		$sql="UPDATE monthly_plan SET plan='$plan',updated_datetime='$datetime',count=count+1 WHERE id='$id'";
 		if(mysqli_query($con,$sql))
 		{
 				// $sql_c="UPDATE monthly_plan SET count=count+1  WHERE id='$id'";
 				// mysqli_query($con,$sql_c);
 				// echo "Data Deleted Successfully";
 		}
 		else
 		{
 			// echo mysqli_error($con);
 		}
	}
	else
	{
		header("location:monthly_plan.php");
	}
}
else
{
  header("location:index.php");
}
?>