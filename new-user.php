<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
  	if(isset($_POST['newuser_key']) && $_POST['newuser_key']=='!@#$')
  	{
  		include 'db.php';
	    $email=$_POST['email_id'];
	    $name=$_POST['name'];
	    $role=$_POST['role'];
	    $password=password_hash("Gvr@Mis", PASSWORD_DEFAULT);
	    $sql1="INSERT INTO `user`(`name`, `username`, `password`, `role`, `login_count`, `last_login`, `login`) VALUES ('$name','$email','$password','$role','0','Not Yet Logged in','')";
		if(!mysqli_query($con,$sql1))
		{
			echo "Some Error Occured".mysqli_error($con);
		}
		else
		{
			echo "New User Created Successfully";
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