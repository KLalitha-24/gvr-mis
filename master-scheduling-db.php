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
	    $filepath="C:/xampp/htdocs/gvr-mis/CSV/".$d."_Master_Schedule.csv";
		move_uploaded_file($csv,$filepath);
 		$sql="LOAD DATA INFILE '".$filepath."' INTO TABLE master_scheduling COLUMNS TERMINATED BY ','  LINES TERMINATED BY '\n' IGNORE 1 LINES";
 		$i=0;
 		if(mysqli_query($con,$sql))
 		{
 			$date_time=date('Y-m-d H:i:s');
 			$filename=$d.".csv";
 			$sql1="INSERT INTO `master_scheduling_record` (filename,date_time) VALUES ('$filename','$date_time')";
 			if(mysqli_query($con,$sql1))
 			{
 				
 				$sql_select="SELECT id,date from master_scheduling";
 				if($res_ms=mysqli_query($con,$sql_select))
 				{
 					while($row_ms=mysqli_fetch_array($res_ms))
 					{
 						$ms_date=explode("-", $row_ms['date']);
 						$year=$ms_date[0];
 						$month=$ms_date[1];
 						$day=$ms_date[2];
 						if($day>0 && $day<29 && $month=="01")
				 		{
				 			$month="JAN";
				 		}
				 		else if((($day>0 && $day<26) || ($day>28 && $day<32)) && ($month=="02" || $month=="01"))
				 		{
				 			$month="FEB";
				 		}
				 		else if((($day>0 && $day<26)) && ($month=="02" || $month=="03"))
				 		{
				 			$month="MAR";
				 		}
				 		else if((($day>1 && $day<30)) && ($month=="04"))
				 		{
				 			$month="APR";
				 		}
				 		else if((($day>0 && $day<28) || $day==30) && ($month=="04" || $month=="05"))
				 		{
				 			$month="MAY";
				 		}
				 		else if((($day>0 && $day<32)) && ($month=="05" || $month=="06"))
				 		{
				 			$month="JUN";
				 		}
				 		else if((($day>0 && $day<29)) && ($month=="07"))
				 		{
				 			$month="JUL";
				 		}
				 		else if((($day>0 && $day<27) || $day!=28 || $day!=31) && ($month=="07" || $month=="08"))
				 		{
				 			$month="AUG";
				 		}
				 		else if((($day>0 && $day<31)) && ($month=="08" || $month=="09"))
				 		{
				 			$month="SEP";
				 		}
				 		else if((($day>0 && $day<29)) && ($month=="10"))
				 		{
				 			$month="OCT";
				 		}
				 		else if((($day>0 && $day<26) || $day!=28) && ($month=="10" || $month=="11"))
				 		{
				 			$month="NOV";
				 		}
				 		else if((($day>0 && $day<32)) && ($month=="12" || $month=="11"))
				 		{
				 			$month="DEC";
				 		}
				 		$id=$row_ms['id'];
				 		$sql_up="UPDATE master_scheduling SET month='$month',year='$year' WHERE id=id";
				 		if(mysqli_query($con,$sql_up))
				 		{
				 			$i=1;
				 		}
 					}
 				}
 				
 			}
 			
 		}
 		else
 		{
 			echo "Some Error Occured".mysqli_error($con);
 		}
 		if($i==1)
 		{
 			echo "Data Stored Successfully";
 		}
 		else
 		{
 			echo "Some Error Occured";
 		}

	}
	else
	{
		header("location:master-scheduling.php");
	}
}
else
{
  header("location:index.php");
}
?>