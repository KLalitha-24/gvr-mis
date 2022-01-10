<?php 
  session_start();
  if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
  {
    $email=$_SESSION['mail'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
     <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
  </script> 
   <style type="text/css">
   </style>

</head>
<body>
	<?php include 'header.php' ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <?php //include 'side-navbar.php'; ?>
    <!-- </div>
    <div class="col-sm-9">
      <br/>  -->
      <br/>
      <nav class="navbar box">
        <a class="nav-item nav-link text-white" href="#"><i class="fa fa-user"></i>&nbsp;User Management</a>
        <a class="btn btn-light" data-toggle="modal" data-target="#new_user_modal" href="#">Add User</a>
      </nav>
      <br/>
      <div class="col-sm-12 bg-white box">
        <br/>
      <div class="text-right pr-4"><button class="btn btn-light" id="print-graph-btn" ><i>Download Report</i></button></div>
        <div class="row justify-content-center p-4">
          <div class="table-responsive fix">
            <table class="table" id="user-table ">
              <thead>
              <!-- <tr>
                <td colspan="5" class="text-center"><b>Role Definition:</b> DE - Data Entry || DEV - Data View || DF - Data Entry & View || ALL - Full Access </td>
              </tr> -->
              <tr>
                <th></th>
                <th>Name</th>
                <th>Email Id/Username</th>
                <th>Role</th>
              </tr>
              </thead>
              <tbody>
              <?php
              include 'db.php';
              $sql="SELECT * FROM user";
              if($res=mysqli_query($con,$sql))
              {
                $i=0;
                while($row=mysqli_fetch_array($res))
                {
                  ?><tr>
                    <td>
                      
                        <!-- <i class="fa fa-edit" data-toggle="modal" title="Edit" style="cursor: pointer;" data-target="#edit_modal<?php echo $i; ?>"></i>&nbsp; -->
                        <i class="fa fa-key" data-toggle="modal" title="Reset Password" style="cursor: pointer;" data-target="#reset_password_modal<?php echo $i; ?>"></i>&nbsp;
                        <i class="fa fa-trash text-danger" title="Delete User" data-toggle="modal" data-target="#delete_user_modal<?php echo $i; ?>" style="cursor: pointer;"></i>
                      
                    </td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php 
                    if($row['role']=="SA")
                    {
                      echo "Supervisor";
                    }
                    else
                    {
                      echo "Quality";
                    }

                    ?></td>
                  </tr>
                  <!-- User Delete Modal -->
                  <div class="modal" id="delete_user_modal<?php echo $i; ?>">
                    <div class="modal-dialog modal-lg">
                     <div class=""> <div class="modal-content">
                        <!-- Delete User Modal Header -->
                        <div class="modal-header text-white  box p-2">
                          <h4 class="modal-title">Delete User</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" id="del_res<?php echo $i; ?>">
                          <!-- Delete User Form -->
                          <form method="POST" id="delete_user_form<?php echo $i; ?>">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="delete_id" />
                            <input type="hidden" value="!@#$" name="delete_key" />
                            <div class="text-center">
                              <label>Are you sure you want to delete this user (<?php echo $row['username']; ?>)?</label>
                              <div class="row justify-content-center">
                                <input type="submit" class="btn btn-success del" name="<?php echo $i; ?>" value="Yes" />&nbsp;&nbsp;
                                <input type="button" class="btn cancel btn-danger" value="No" />
                              </div>
                            </div>
                          </form>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal" id="reset_password_modal<?php echo $i; ?>">
                    <div class="modal-dialog modal-lg">
                     <div class=""> <div class="modal-content">
                        <!-- Delete User Modal Header -->
                        <div class="modal-header text-white  box p-2">
                          <h4 class="modal-title">Reset Password</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" id="reset_res<?php echo $i; ?>">
                          <!-- Delete User Form -->
                          <form method="POST" id="reset_password_form<?php echo $i; ?>">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="reset_id" />
                            <input type="hidden" value="!@#$" name="reset_key" />
                            <div class="text-center">
                              <label>Are you sure you want to reset password for this user (<?php echo $row['username']; ?>)?</label>
                              <div class="row justify-content-center">
                                <input type="submit" class="btn btn-success reset" name="<?php echo $i; ?>" value="Yes" />&nbsp;&nbsp;
                                <input type="button" class="btn cancel btn-danger" value="No" />
                              </div>
                            </div>
                          </form>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal" id="edit_modal<?php echo $i; ?>">
                    <div class="modal-dialog">
                     <div class=""> <div class="modal-content">
                        <!-- Delete User Modal Header -->
                        <div class="modal-header text-white  box p-2">
                          <h4 class="modal-title">Edit Details</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body" id="edit_res<?php echo $i; ?>">
                          <!-- Delete User Form -->
                          <form method="POST" id="edit_form<?php echo $i; ?>">
                            <input type="hidden" value="<?php echo $row['id']; ?>" name="id" />
                            <input type="hidden" value="!@#$" name="key" />
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text"  value="<?php echo $row['name']; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                              <label>Email Id</label>
                              <input type="text"  value="<?php echo $row['username']; ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                              <label>Role</label>
                              <select name="role" class="form-control">
                               <option value="SA">Supervisor</option>
                               <option value="Q">Quality</option>
                              </select>
                            </div>
                            
                            <div class="text-center">
                                <input type="submit" class="btn btn-success edit" name="<?php echo $i; ?>" value="Edit" />
                              </div>
                            </div>
                          </form>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                  <?php
                  $i++;
                }
              }
              ?>
            </tbody>
            </table>
            
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
<div class="modal" id="new_user_modal">
  <div class="modal-dialog modal-lg">
   <div class=""> <div class="modal-content">
      <!-- New User Modal Header -->
      <div class="modal-header text-white  box p-2">
        <h4 class="modal-title">New User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="new_user_res">
        <!-- New User Form -->
        <form method="POST" id="new_user_form">
          <input type="hidden" value="!@#$" name="newuser_key" /> 
          <table class="table">
            <tr>
              <td>
                <div class="form-group">
                  <label>Email Id</label>
                  <input type="email" name="email_id" class="form-control" placeholder="Email Id" />
                </div>
              </td>
              <td>
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" placeholder="Name" />
                </div>
              </td>
            </tr>
            <tr>
              
              <td>
                <div class="form-group">
                  <label>Role</label>
                  <select name="role" class="form-control">
                    <option value="SA">Supervisor</option>
                    <option value="Q">Quality</option>
                   
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <div class="form-group text-center">
                  <input type="submit" value="Submit" id="submit" class="btn btn-warning" >
                  <div class="spinner-border text-muted" id="load" style="display: none;cursor: none"></div>
                </div>  
              </td>
            </tr>
          </table>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
      $('#new_user_form').submit(function(e)
      {
        $('#load').show();
        $('#submit').hide();
        e.preventDefault();
            $.ajax({
              url: "new-user.php",
              type:"POST",
              data:$('#new_user_form').serialize(),
              success: function(result){
                  $('#new_user_form')[0].reset();
                  $('#new_user_res').html(result);
              }
          });

      });
      $('.close,.cancel').click(function()
      {
        location.reload();
      });
      //Submitting Form Details
      $('.del').click(function(e){
        // alert("hi");
        var id=$(this).attr('name');
        e.preventDefault();
            $.ajax({
              url: "delete-user.php",
              type:"POST",
              data:$('#delete_user_form'+id+'').serialize(),
              success: function(result){
                  $('#delete_user_form'+id+'')[0].reset();
                  $('#del_res'+id+'').html(result);
              }
          });
      });
      //Submitting Form Details
      $('.reset').click(function(e){
        // alert("hi");
        var id=$(this).attr('name');
        e.preventDefault();
            $.ajax({
              url: "reset-password.php",
              type:"POST",
              data:$('#reset_password_form'+id+'').serialize(),
              success: function(result){
                  $('#reset_password_form'+id+'')[0].reset();
                  $('#reset_res'+id+'').html(result);
              }
          });
      });
      //Submitting Form Details
      // $('.edit').click(function(e){
      //   e.preventDefault();
      //   var id=$(this).attr('name');
      //   if($('#role'+id).val()=='DE' || $('#role'+id).val()=='DEV' || $('#role'+id).val()=='DF' || $('#role'+id).val()=='ALL')
      //   {
      //     $.ajax({
      //         url: "edit-user.php",
      //         type:"POST",
      //         data:$('#edit_form'+id+'').serialize(),
      //         success: function(result){
      //             $('#edit_form'+id+'')[0].reset();
      //             $('#edit_res'+id+'').html(result);
      //         }
      //     });
      //   }
      //   else
      //   {
      //     $('#role'+id).focus();
      //     alert("Role Should be in DE,DEV,DF or ALL");
      //   }
            
      // });
        
$(document).on('click','#print-graph-btn',function()
      {
          
          $("#user-table").table2excel({
            filename: "User Management.xls"
        });
          
      });
    </script>
    <?php include 'footer.php'; ?>
    </body>
    </html>
<?php 
  }
  else
  {
    header("location:index.php");
  }
 ?>