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
          </tr>
          <?php
          include 'db.php';
          $startdate=$_POST['start_date'];
          $enddate=$_POST['end_date'];
          $sql="SELECT * from operator WHERE date BETWEEN '$startdate' AND '$enddate' ORDER BY id DESC";
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