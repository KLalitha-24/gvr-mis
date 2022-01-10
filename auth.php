<?php 
if(isset($_POST['key']) && $_POST['key']=='963')
{
	session_start();
	include 'db.php';
	// echo $_POST['type'];
	if($_POST['type']=="Supervisor")
	{
		$un=$_POST['username'];
		$pass=$_POST['password'];
		$date=$_POST['date'];
		$shift=$_POST['shift'];
		// $pass1=md5($pass);
		$sql="SELECT * FROM user WHERE username=?";
		$sql_stmt = mysqli_prepare($con, $sql);
		mysqli_stmt_bind_param($sql_stmt, 's',$un);
		mysqli_stmt_execute($sql_stmt);			
		if($res=mysqli_stmt_get_result($sql_stmt))
		{
			if(mysqli_num_rows($res)==1)
			{
				$row=mysqli_fetch_array($res);
				if(password_verify($pass,$row['password']))
				{
					
					$login=$row['login'];
					$sql1="UPDATE user SET login_count=login_count+1,last_login='$login',login='$date' WHERE username='$un'";
					if(!mysqli_query($con,$sql1))
					{
						echo mysqli_error();
					}
					// echo date("H");
					// echo $shift;

					if($shift=="First" && date('H')>=6 && date('H')<14)
					{
						$_SESSION['shift']="F";		
					}
					else if($shift=="Second" && date('H')>=14 && date('H')<20)
					{
						$_SESSION['shift']="S";	
					}
					else if($shift=="Third" && (date('H')>=20 && date('H')<24) ||  (date('H')>=00 && date('H')<06))
					{
						echo 1;
						$_SESSION['shift']="T";					
					}
					else if($shift=="General" && (date('H')>=8 && date('i')>=30) && date('H')<17)
					{
						$_SESSION['shift']="G";
					}
					else
					{
						?><script>
							alert("Invalid Shift");
							location.replace("index.php");
						</script>
						<?php
					}
					if(isset($_SESSION['shift']))
					{
						$_SESSION['name']=$row['name'];
						$_SESSION['mis_key']=1;
						$_SESSION['role']=$row['role'];
						$_SESSION['mail']=$un;
						header("location:home.php");
					}
				}
				else
				{
					?><script>
					alert("Invalid Password.");
					location.replace("index.php");
				</script>
				<?php
				}
			}
			else
			{
				?><script>
					alert("Invalid Email.");
					location.replace("index.php");
				</script>
				<?php
			}
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else if($_POST['type']=="Operator")
	{
		$un=$_POST['username'];
		// echo $un;
		$pass=$_POST['password'];
		// $date=$_POST['date'];
		// $pass1=md5($pass);
		// $sql="SELECT shift_management.shift as shift,operator.password as password,operator.name as name,operator.access as access FROM shift_management INNER JOIN operator ON shift_management.register_id=operator.register_id WHERE shift_management.register_id=? AND shift_management.date=?";
		$sql="SELECT * FROM operator WHERE register_id=?";
		$sql_stmt = mysqli_prepare($con, $sql);
		if(date('H')>=0 && date('H')<6)
		{
			$date=date("Y-m-d",strtotime("-1 day"));
		}
		else
		{
			$date=date("Y-m-d");
		}
		
		mysqli_stmt_bind_param($sql_stmt, 's',$un);
		mysqli_stmt_execute($sql_stmt);			
		if($res=mysqli_stmt_get_result($sql_stmt))
		{
			// echo mysqli_num_rows($res);
			if(mysqli_num_rows($res)==1)
			{

				$row=mysqli_fetch_array($res);

				if(password_verify($pass,$row['password']))
				{
					$_SESSION['name']=$row['name'];
					$_SESSION['role']="OP";
					// $_SESSION['access']=$row['access'];
					$_SESSION['register_id']=$un;
					// $_SESSION['shift']=$row['shift'];
					$_SESSION['type']="Operator";
					$_SESSION['access']=$row['access'];
					// echo $row['shift'];
					if($row['access']=="Pigeon Hole HV Test Final 2 Packing ")
					{ 
						$_SESSION['PH']=1;
						$_SESSION['HV']=1;
						$_POST['F2']=1;
						$_POST['PK']=1;
					}
					else if($row['access']=="Pigeon Hole HV Test Final 2 ")
					{
						$_SESSION['PH']=1;
						$_SESSION['HV']=1;
						$_POST['F2']=1;
						$_POST['PK']=0;
					}
					else if($row['access']=="Pigeon Hole HV Test ")
					{
						$_SESSION['PH']=1;
						$_SESSION['HV']=1;
						$_POST['F2']=0;
						$_POST['PK']=0;
					}
					else if($row['access']=="Pigeon Hole ")
					{
						$_SESSION['PH']=1;
						$_SESSION['HV']=0;
						$_POST['F2']=0;
						$_POST['PK']=0;
					}
					else if($row['access']=="Pigeon Hole Final 2 ")
					{
						$_SESSION['PH']=1;
						$_SESSION['HV']=0;
						$_POST['F2']=1;
						$_POST['PK']=0;
					}
					else if($row['access']=="Pigeon Hole HV Test ")
					{
						$_SESSION['PH']=1;
						$_SESSION['HV']=1;
						$_POST['F2']=0;
						$_POST['PK']=0;
					}
					else if($row['access']=="Pigeon Hole Packing ")
					{
						$_SESSION['PH']=1;
						$_SESSION['HV']=0;
						$_POST['F2']=0;
						$_POST['PK']=1;
					}
					else if($row['access']=="HV Test Packing ")
					{
						$_SESSION['PH']=0;
						$_SESSION['HV']=1;
						$_POST['F2']=0;
						$_POST['PK']=1;
					}
					else if($row['access']=="HV Test Final 2 ")
					{
						$_SESSION['PH']=0;
						$_SESSION['HV']=1;
						$_POST['F2']=1;
						$_POST['PK']=0;
					}
					else if($row['access']=="HV Test ")
					{
						$_SESSION['PH']=0;
						$_SESSION['HV']=1;
						$_POST['F2']=0;
						$_POST['PK']=0;
					}
					else if($row['access']=="Final 2 Packing ")
					{
						$_SESSION['PH']=0;
						$_SESSION['HV']=0;
						$_POST['F2']=1;
						$_POST['PK']=1;
					}
					else if($row['access']=="Final 2 ")
					{
						$_SESSION['PH']=0;
						$_SESSION['HV']=0;
						$_POST['F2']=1;
						$_POST['PK']=0;
					}
					else if($row['access']=="Packing ")
					{
						$_SESSION['PH']=0;
						$_SESSION['HV']=0;
						$_POST['F2']=0;
						$_POST['PK']=1;
					}

					$_SESSION['mis_key']=1;
					// echo "hi";
					echo $_SESSION['mis_key'];
					header("location:home.php");
					
					
					// if($row['access']=="PH")
					// {
					// 	header("location:pigeon-hole.php");
					// }
					// else if($row['access']=="HVT")
					// {
					// 	header("location:hv-test.php");	
					// }
					// else if($row['access']=="F2")
					// {
					// 	header("location:final-2.php");
					// }
					// else if($row['access']=="PK")
					// {
					// 	header("location:packing.php");
					// }
					
				}
				else
				{
					?><script>
					alert("Invalid Password.");
					location.replace("index.php");
				</script>
				<?php
				}
			}
			else
			{
				?><script>
					alert("Invalid Email or Not belongs to this shift");
					location.replace("index.php");
				</script>
				<?php
			}
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	mysqli_close($con);
}
else
{
	// header("location:index.php");
}
 ?>