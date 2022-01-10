<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		?>
		<table class="table" id="table-t">
          
          <tr>
            <th>Sno</th>
            <th>Date</th>
            <th>Register ID</th>
            <th>Name</th>
            <th>Access</th>
            <th>Shift</th>
            <th>Supervisor</th>
          </tr>
          <?php
          include 'db.php';
          $date=$_POST['date'];
          $shift=$_POST['shift'];
          if($date!='' && $shift!='')
          {
              $sql="SELECT * from shift_management WHERE date='$date' AND shift='$shift' ORDER BY date";
          }
          else if($date=='' && $shift!='')
          {
              $sql="SELECT * from shift_management WHERE shift='$shift' ORDER BY date";
          }
          else if($date!='' && $shift=='')
          {
              $sql="SELECT * from shift_management WHERE date='$date' ORDER BY date";
          }
          if($res=mysqli_query($con,$sql))
          {
            $i=1;
            while($row=mysqli_fetch_array($res))
            {

              ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['register_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['access']; ?></td>
                <td><?php 
                if($row['shift']=="G")
                {
                  echo "General";
                }
                else if($row['shift']=="F")
                {
                  echo "First";
                }
                else if($row['shift']=="S")
                {
                  echo "Second";
                }
                else if($row['shift']=="T")
                {
                  echo "Third";
                }

                 ?></td>
                  <td><?php echo $row['supervisor']; ?></td>
              </tr>
              <?php
              $i++;
            }
          }
          else
          {
            echo mysqli_error($con);
          }
          ?>
        </table>
        <?php
	}
	else
	{
		header("location:shift-management.php");
	}
}
else
{
  header("location:index.php");
}
?>