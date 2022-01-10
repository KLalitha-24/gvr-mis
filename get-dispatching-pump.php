<?php
          include 'db.php';
          $type=$_POST['type'];
          $customer=$_POST['customer'];
          
          $sql="SELECT * FROM `master_scheduling` WHERE flag='4' AND siron_flag!='1' AND customer='$customer' AND type='$type'";

          if($res=mysqli_query($con,$sql))
          {
            if(mysqli_num_rows($res)==0)
            {
              echo "Not Available/Already Done";
            }
            else
            {
              ?>
              <tr>
                <th></th>
                <th>Pump Sno</th>
                <th>Production Order(FG No)</th>
                <th>Sequence No</th>
                <th>FG Part No</th>
                <th>Customer</th>
                <th>Pump Type</th>
              </tr>
              <?php
              while ($row=mysqli_fetch_array($res))
              {
                ?>
                <tr class="<?php echo str_replace(" ","",$row['customer']); ?> cus">
                  <td>
                    <div class="form-check-inline">
                      <label class="form-check-label">
                        <input type="checkbox" name="data[]" class="form-check-input data" value="<?php echo $row['serial_no'] ?>">
                      </label>
                    </div>
                  </td>
                  <td>
                    <?php echo $row['serial_no']; ?>

                  </td>
                  <td>
                    <?php echo $row['fg']; ?>
                  </td>
                  <td>
                    <?php echo $row['seq_no']; ?>
                  </td>
                  <td>
                    <?php echo $row['fg_part_no']; ?>
                  </td>
                  <td>
                    <?php echo $row['customer']; ?>
                  </td>
                  <td>
                    <?php echo $row['type']; ?>
                  </td>
                </tr>
              <?php

            }
            
            }
          }
          ?>