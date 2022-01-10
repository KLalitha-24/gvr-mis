<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		include 'db.php';
 		$start_date=$_POST['start_date'];
 		$end_date=$_POST['end_date'];
 		$sql="SELECT * FROM pigeon_hole WHERE date BETWEEN '$start_date' AND '$end_date'";
		$res=mysqli_query($con,$sql);
		$n=mysqli_num_rows($res);
		$sql1="SELECT * FROM hv_test WHERE date BETWEEN '$start_date' AND '$end_date'";
		$res1=mysqli_query($con,$sql1);
		$n1=mysqli_num_rows($res1);
		$sql2="SELECT * FROM final_2 WHERE date BETWEEN '$start_date' AND '$end_date'";
		$res2=mysqli_query($con,$sql2);
		$n2=mysqli_num_rows($res2);
		$sql3="SELECT * FROM packing WHERE date BETWEEN '$start_date' AND '$end_date'";
		$res3=mysqli_query($con,$sql3);
		$n3=mysqli_num_rows($res3);
		$sq="SELECT * FROM master_scheduling WHERE date BETWEEN '$start_date' AND '$end_date'";
		$r=mysqli_query($con,$sq);
		$nt=mysqli_num_rows($r);
		echo $n."+".$n1."+".$n2."+".$n3."+".$nt;
	}
	else
	{
		header("location:home.php");
	}
}
else
{
  header("location:index.php");
}
?>