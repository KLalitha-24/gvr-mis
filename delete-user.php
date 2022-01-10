<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
  	if(isset($_POST['delete_key']) && $_POST['delete_key']=='!@#$')
  	{
  		include 'db.php';
	    $email=$_SESSION['mail'];
	    $id=$_POST['delete_id'];
	    $sql="DELETE FROM user WHERE id='$id'";
	    if(mysqli_query($con,$sql))
	    {
	    	echo "User Deleted Successfully";
	    }
	    else
	    {
	    	echo "Some Error Occured...".mysqli_error($con);
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