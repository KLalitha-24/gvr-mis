<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$csv=$_FILES["csv"]["tmp_name"];
 		$d=date('YmdHis');
	    $filepath="E:/Xampp Server/htdocs/gvrmsm/CSV/".$d."_Shift.csv";
		move_uploaded_file($csv,$filepath);
 		$sql="LOAD DATA INFILE '".$filepath."' INTO TABLE shift_management COLUMNS TERMINATED BY ','  LINES TERMINATED BY '\n' IGNORE 1 LINES";
 		if(mysqli_query($con,$sql))
 		{
 				echo "Data Stored Successfully";
 			
 			
 		}
 		else
 		{
 			echo "Some Error Occured".mysqli_error($con);
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