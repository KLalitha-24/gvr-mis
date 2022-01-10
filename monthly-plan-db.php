<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$type=$_POST['type'];
 		$customer=$_POST['customer'];
 		$date=$_POST['date'];
 		$plan=$_POST['plan'];
 		$month=explode("-",$_POST['month']);
 		$year=$month[0];
 		if($month[1]=="01")
 		{
 			$month="JAN";
 		}
 		else if($month[1]=="02")
 		{
 			$month="FEB";
 		}
 		else if($month[1]=="03")
 		{
 			$month="MAR";
 		}
 		else if($month[1]=="04")
 		{
 			$month="APR";
 		}
 		else if($month[1]=="05")
 		{
 			$month="MAY";
 		}
 		else if($month[1]=="06")
 		{
 			$month="JUN";
 		}
 		else if($month[1]=="07")
 		{
 			$month="JUL";
 		}
 		else if($month[1]=="08")
 		{
 			$month="AUG";
 		}
 		else if($month[1]=="09")
 		{
 			$month="SEP";
 		}
 		else if($month[1]=="10")
 		{
 			$month="OCT";
 		}
 		else if($month[1]=="11")
 		{
 			$month="NOV";
 		}
 		else if($month[1]=="12")
 		{
 			$month="DEC";
 		}

 		$sql="INSERT INTO `monthly_plan`(customer,`month`,`year`,plan,date,type,count) VALUES ('$customer','$month','$year','$plan','$date','$type','0')";
 		if(mysqli_query($con,$sql))
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
		header("location:monthly-plan.php");
	}
}
else
{
  header("location:index.php");
}
?>