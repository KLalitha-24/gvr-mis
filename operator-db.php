<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$name=$_POST['name'];
 		$d=date('YmdHis');
 		// $register_id=$_POST['register_id'];
 		$date=$_POST['date']; 		
 		$access1=$_POST['access'];
 		$register_id=$_POST['register_id'];
 		$access='';
 		foreach ($access1 as $a) {
 			$access=$access.$a." ";
 		}
 		$password=password_hash("Gvr@Mis", PASSWORD_DEFAULT);
 		$sql="INSERT INTO `operator`(`name`, `register_id`, `date`, `password`, `access`) VALUES ('$name','$register_id','$date','$password','$access')";
 		if(mysqli_query($con,$sql))
 		{
 			echo "Data Stored Successfully.";
 		}
 		else
 		{
 			echo "Already Done";
 		}
	}
	else
	{
		header("location:shift-management.php");
	}
}
else
{
  header("location:index.php");
}
?>