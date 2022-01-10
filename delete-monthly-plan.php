<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$id=$_POST['id'];
 		$sql="DELETE FROM monthly_plan WHERE id='".$id."'";
 		if(mysqli_query($con,$sql))
 		{
 			
 				echo "Data Deleted Successfully";
 		}
 		else
 		{
 			echo "Already Done";
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