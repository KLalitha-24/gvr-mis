<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		?>
		<table class="table" id="final-2-table">
          <!-- <tr>
            <th colspan="10" class="text-center">HV Test Records</th>
          </tr> -->
          <tr>
            <th>Pump Sno</th>
            <th>Date</th>
            <th>Time</th>
            <th>Shift</th>
            <th>Production Order(FG No)</th>
            <th>Sequence No</th>
            <th>Fg Part No</th>
            <th>Customer</th>
            <th>Pump Type</th>
            <th>TPI</th>
            <th>Operator Name</th>
          </tr>
          <tbody id="tbody">
          <?php
          include 'db.php';
          $startdate=$_POST['start_date'];
          $enddate=$_POST['end_date'];
          $sql="SELECT tpi.pump_sno AS pump_sno,tpi.date AS date,tpi.time AS time,tpi.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.type AS pump_type,master_scheduling.tpi AS tpi,tpi.operator_name AS operator_name from tpi INNER JOIN master_scheduling ON master_scheduling.serial_no=tpi.pump_sno WHERE tpi.date BETWEEN '$startdate' AND '$enddate' ORDER BY tpi.id ASC";
          if($res=mysqli_query($con,$sql))
          {
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $row['pump_sno']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['fg_no']; ?></td>
                <td><?php echo $row['sequence_no']; ?></td>
                <td><?php echo $row['production_order_no']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['pump_type']; ?></td>
                <td><?php echo $row['tpi']; ?></td>
                <td><?php echo $row['operator_name']; ?></td>
              </tr>
              <?php
            }
          }
          else
          {
            echo mysqli_error($con);
          }
          ?>
        </tbody>
        </table>
        <?php
	}
	else
	{
		header("location:view-pigeon-hole-details.php");
	}
}
else
{
  header("location:index.php");
}
?>