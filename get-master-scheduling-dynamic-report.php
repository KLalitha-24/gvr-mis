<?php
include 'db.php';
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
	if(isset($_POST['key']) && $_POST['key']=='147')
	{
		?>
		<table class="table">
          <tr>
            <th colspan="12" class="text-center">Master Scheduling Records</th>
          </tr>
          <tr>
            <th>Seq No</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Type</th>
            <th>Sale Order</th>
            <th>Production Order(FG)</th>
            <th>Production Order(SFG)</th>
            <th>FG Part No</th>
            <th>Serial No</th>
            <th>Description</th>
            <th>TPI</th>
            <th>Dial Face Sticker</th>
          </tr>
          <tbody id="tbody">
          <?php 
          include 'db.php';
          $startdate=$_POST['start_date'];
          $enddate=$_POST['end_date'];
          $sql="SELECT * FROM master_scheduling WHERE date BETWEEN '$startdate' AND '$enddate' ORDER BY id ASC";
          if($res=mysqli_query($con,$sql))
          {
            $i=1;
            while($row=mysqli_fetch_array($res))
            {
              ?>
              <tr>
                <td><?php echo $row['seq_no']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['customer']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['sale_order']; ?></td>
                <td><?php echo $row['fg']; ?></td>
                <td><?php echo $row['sfg']; ?></td>
                <td><?php echo $row['fg_part_no']; ?></td>
                <td><?php echo $row['serial_no']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['tpi']; ?></td>
                <td><?php echo $row['dial_face_sticker']; ?></td>
            </tr>
              <?php
            }
            $i++;
          }

          ?>
        </tbody>
        </table>
        <?php
	}
	else
	{
		header("location:view-master-scheduling-details.php");
	}
}
else
{
  header("location:index.php");
}
?>