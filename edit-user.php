<?php 
  session_start();
  if(isset($_SESSION['lkey']) && $_SESSION['lkey']==1)
  {
  	if(isset($_POST['key']) && $_POST['key']=='!@#$')
  	{
  		include 'db.php';
	    $id=$_POST['id'];
	    $department=$_POST['department'];
	    $role=$_POST['role'];
	    $sql1="UPDATE user SET department=?,role=? WHERE id=?";
		$sql_stmt1 = mysqli_prepare($con,$sql1);
		mysqli_stmt_bind_param($sql_stmt1,'sss',$department,$role,$id);
		if(!mysqli_stmt_execute($sql_stmt1))
		{
			echo "Some Error Occured".mysqli_error($con);
		}
		else
		{
			echo "User Details Updated Successfully";
		}
		include 'backup.php';
	}
	else
	{
		header("location:user-management.php");
	}
  }
  else
  {
    header("location:index.php");
  }
 ?>