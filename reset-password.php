<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
  	if(isset($_POST['reset_key']) && $_POST['reset_key']=='!@#$')
  	{
  		include 'db.php';
	    $email=$_SESSION['mail'];
	    $id=$_POST['reset_id'];
	    $password=password_hash("Gvr@Mis", PASSWORD_DEFAULT);
	    $sql1="UPDATE user SET Password=? WHERE id=?";
		$sql_stmt1 = mysqli_prepare($con,$sql1);
		mysqli_stmt_bind_param($sql_stmt1,'ss',$password,$id);
		if(!mysqli_stmt_execute($sql_stmt1))
		{
			echo "Some Error Occured".mysqli_error($con);
		}
		else
		{
			echo "Password Reseted Successfully";
		}
		// include 'backup.php';
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