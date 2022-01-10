<?php
	include 'db.php';
	session_start();
	if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  	{
  		if(isset($_POST['key']) && $_POST['key']=='147')
  		{
  			
			$email=$_POST['mail'];
			$old=$_POST['old'];
			// $old=md5($old);
			$new=$_POST['new'];
			if($old == $new)
			{
				echo "Old & New Password are Same";
						  
				
			}
			else
			{
				if(isset($_SESSION['mail']))
                {
                	$sql="SELECT password FROM user WHERE username=?";
					$sql_stmt = mysqli_prepare($con, $sql);
					mysqli_stmt_bind_param($sql_stmt, 's',$email);
					mysqli_stmt_execute($sql_stmt);		
					if($res=mysqli_stmt_get_result($sql_stmt))
					{
						if(mysqli_num_rows($res)==1)
						{
							$row=mysqli_fetch_array($res);
							if(password_verify($old,$row['password']))
							{
								$password=password_hash($new, PASSWORD_DEFAULT);
								$sql1="UPDATE user SET password=? WHERE username=?";
								$sql_stmt1 = mysqli_prepare($con,$sql1);
								mysqli_stmt_bind_param($sql_stmt1,'ss',$password,$email);
								if(mysqli_stmt_execute($sql_stmt1))
								{
									echo "Password Changed Successfully";
								}
								else
								{
									echo mysqli_error($con);
											
								}
							}
							else
							{
								echo "Invalid Old Password";
								
							}

						}
						else
						{
							
								echo "Invalid Credentials";
								
								
							
						}
					}
					else
					{
						echo mysqli_error($con);
					}
			
                }
				else if(isset($_SESSION['register_id']))
				{
					$sql="SELECT password FROM operator WHERE register_id=?";
					$sql_stmt = mysqli_prepare($con, $sql);
					mysqli_stmt_bind_param($sql_stmt, 's',$email);
					mysqli_stmt_execute($sql_stmt);		
					if($res=mysqli_stmt_get_result($sql_stmt))
					{
						if(mysqli_num_rows($res)==1)
						{
							$row=mysqli_fetch_array($res);
							if(password_verify($old,$row['password']))
							{
								$password=password_hash($new, PASSWORD_DEFAULT);
								$sql1="UPDATE user SET password=? WHERE register_id=?";
								$sql_stmt1 = mysqli_prepare($con,$sql1);
								mysqli_stmt_bind_param($sql_stmt1,'ss',$password,$email);
								if(mysqli_stmt_execute($sql_stmt1))
								{
									echo "Password Changed Successfully";	
									
								}
								else
								{
										echo mysqli_error($con);
								}
							}
							else
							{
								echo "Invalid Old Password";
								
							}

						}
						else
						{
							
								echo "Invalid Credentials";
								
								
							
						}
					}
					else
					{
						echo mysqli_error($con);
					}
			
				}
			}
		}
		else
		{
			header("location:changepassword-form.php");
		}
  }
  else
  {
      header("location:index.php");
  }
?>