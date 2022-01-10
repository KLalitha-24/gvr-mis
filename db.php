<?php
	$con=mysqli_connect("localhost","root","","mis1");
	if(!$con)
	{
		echo mysqli_error($con);
	}
	date_default_timezone_set('Asia/Kolkata');
?>