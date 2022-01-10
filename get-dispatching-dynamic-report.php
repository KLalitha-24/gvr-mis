<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		?>
		<table class="table" id="dispatching-table">
          <!-- <tr>
            <th colspan="10" class="text-center">Packing Records</th>
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
            <th>Operator Name</th>
            <th>TPI</th>
            <th>Invoice No</th>
            <th>Vehicle No</th>
          </tr>
          <tbody id="tbody">
          <?php
          include 'db.php';
          $startdate=$_POST['start_date'];
          $enddate=$_POST['end_date'];
          $sql="SELECT dispatching.pump_sno AS pump_sno,dispatching.date AS date1,dispatching.time AS time,dispatching.shift AS shift,master_scheduling.fg AS fg_no,master_scheduling.seq_no AS sequence_no,master_scheduling.fg_part_no AS production_order_no,master_scheduling.customer AS customer,master_scheduling.tpi AS tpi,master_scheduling.type AS pump_type,dispatching.operator_name AS operator_name,dispatching.invoice_no AS invoice_no,dispatching.vehicle_no AS vehicle_no from dispatching INNER JOIN master_scheduling ON master_scheduling.serial_no=dispatching.pump_sno WHERE dispatching.date BETWEEN '$startdate' AND '$enddate' ORDER BY dispatching.id ASC";
          if($res=mysqli_query($con,$sql))
          {
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $row['pump_sno']; ?></td>
                <td><?php echo $row['date1']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><?php echo $row['fg_no']; ?></td>
                <td><?php echo $row['sequence_no']; ?></td>
                <td><?php echo $row['production_order_no']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['pump_type']; ?></td>
                <td><?php echo $row['operator_name']; ?></td>
                <td><?php echo $row['tpi']; ?></td>
                <td><?php echo $row['invoice_no']; ?></td>
                <td><?php echo $row['vehicle_no']; ?></td>
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
		header("location:view-dispatching-details.php");
	}
}
else
{
  header("location:index.php");
}
?>