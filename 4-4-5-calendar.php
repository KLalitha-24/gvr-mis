<?php
		$day=date('d');
		$month=date('m');
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
?>