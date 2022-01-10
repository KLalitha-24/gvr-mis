<?php
session_start();
if(isset($_SESSION['mis_key']) && $_SESSION['mis_key']==1)
{
    header("location:home.php");
}
else
{
	    ?>
<html>
<head>
	<title>Login Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		
	</style>
</head>
<body class="p-3" style="background-color: #f2f2f2">
 <div class="container pt-5">
	<div class="d-flex justify-content-center pt-5">
		<div class="col-sm-4 box text-center bg-white" style="opacity: 1;z-index: 10">
				<br/>
				<img src="images/logo.png"  class="rounded p-2 logo"   width=100%>
				<h4 class="p-1">DTA Dispenser MIS</h4>
				<form id="login" method="POST" action="auth.php" autocomplete="off">
					<!-- <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-list"></i></span>
						</div>
						<select class="form-control" id="type" name="type">
							<option>Operator</option>
							<option>Supervisor</option>
						</select>
						
					</div> -->
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" id="un" placeholder="Username" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-clock"></i></span>
						</div>
						<!-- <input type="password" name="password" class="form-control" placeholder="Password" required> -->
						<select name="shift" class="form-control">
		                    <option>First</option>
		                    <option>Second</option>
		                    <option>Third</option>
		                    <option>General</option>
	                  	</select>
					</div>
					
					<input type="hidden" name="type" value="Supervisor">
					<input type="hidden" name="date" class="form-control" id="date">
					<input type="hidden" name="key" class="form-control" value="963">
					<div class="form-group" style="text-align: center">
						<input type="submit" id="login-btn" value="Login" name="submit" class="btn login-btn">
						<div class="spinner-border text-muted" id="load" style="display: none;cursor: none"></div>
					</div>
				</form>
				<!-- <a href="forgotpassword_form.php" style="text-decoration: none;font-weight: bold;font-size: 16px">Forgot Password?</a>
				<br/> -->
				<div class="footer-copyright text-center text-dark p-2"> 
			  		<h6><b>Designed & Maintained by <br/><a href="#" style="text-decoration: none">Dept of IT,KEC</a></b></h6>
				</div>
			</div>
			</div>
		</div>
		</div>
		<script>
			var d=new Date();
			$('#date').val(d);
			$('#login').on('submit',function()
			{

				$('#load').show();
				$('.btn').hide();
			});
			// $("#type").change(function()
			// {
			// 	if($(this).val()!="Operator")
			// 	{
			// 		$('#un').attr("placeholder","Username");
			// 	}
			// 	else
			// 	{
			// 		$('#un').attr("placeholder","Roll No");
			// 	}
			// });
 //      window.oncontextmenu = function () {
 //          alert("Right Click Disabled");
 //          return false;
 //      }
 //      document.onkeydown = function(e) {
 //    if(e.keyCode == 123) {
 //     return false;
 //    }
 //    if(e.ctrmis_key && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
 //     return false;
 //    }
 //    if(e.ctrmis_key && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
 //     return false;
 //    }
 //    if(e.ctrmis_key && e.keyCode == 'U'.charCodeAt(0)){
 //     return false;
 //    }

 //    if(e.ctrmis_key && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
 //     return false;
 //    }      
 // }
//  $('body').on('copy',function(e) {
//     e.preventDefault(); 
//     alert("Copy.Not Allowed");
// });
//  $('body').on('paste',function(e) {
//     e.preventDefault(); 
//     alert("Paste.Not Allowed");
// });
//  $('body').on('cut',function(e) {
//     e.preventDefault(); 
//     alert("Cut.Not Allowed");
// });
    </script>
</body>
</html>
<?php
}
?>
