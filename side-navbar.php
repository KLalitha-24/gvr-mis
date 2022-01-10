<?php
// session_start();
if(isset($_SESSION['register_id']))
{
  ?>
</div>
  <div class="col-sm-12">
    <?php
}
else
{
  ?>
<!-- Start of Side Navbar -->
<br/>
<ul class="nav flex-column box p-2 bg-white" style="border:3px solid black">
  <br/>
  <li class="nav-item sidemenu  dropdown">
    <a class="nav-link" href="home.php"><i class="fa fa-home"></i>&nbsp;Home</a>
  </li>

  <li class="nav-item dropdown sidemenu">
     <a class="nav-link"  href="#"><i class="fa fa-wrench"></i>&nbsp;Pigeon Hole</a>
   </li>
   
    <li class="nav-item dropdown sidemenu">
      <a class="nav-link " data-toggle="collapse" href="#ehs_nav"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Kiosk Kitting Main Assembly</a>
    </li>
    <li class="nav-item dropdown sidemenu">
      <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#m_nav"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;Kiosk Assembly</a>
      <div class="collapse hover" id="m_nav">
        <a class="dropdown-item" href="#">&nbsp;Wooden Frame Sub Assembly</a>
        <a class="dropdown-item" href="#">&nbsp;Shrouder Sub Assembly</a>
        <a class="dropdown-item" href="#">&nbsp;Metallic Keypad Assembly</a>
      </div>
    </li>
    
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#user_nav"><i class="fa fa-wrench"></i>&nbsp;Motor & GPU Assembly</a>
    <div class="collapse hover" id="user_nav">
      <a class="dropdown-item" href="#">&nbsp;Motor Sub Assembly</a>
      
      <a class="dropdown-item" href="#">&nbsp;Filter Sub Assembly & GPU Sub Assembly</a>
    </div>
  </li>

  <li class="nav-item sidemenu dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#hose_nav"><i class="fa fa-wrench"></i>&nbsp;Hose Assembly</a>
    <div class="collapse hover" id="hose_nav">
      <a class="dropdown-item" href="#">&nbsp;Nozzle Boot Sub Assembly</a>
      
      <a class="dropdown-item" href="#">&nbsp;Junction Box & Data Box Sub Assembly</a>
    </div>
  </li>

  <li class="nav-item sidemenu dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#hy_nav"><i class="fa fa-wrench"></i>&nbsp;Hydraulic Assembly</a>
    <div class="collapse hover" id="hy_nav">
      <a class="dropdown-item" href="#">Manifold Sub Assembly</a>
      
      <a class="dropdown-item" href="#">&nbsp;Single Meter Assembly</a>
      <a class="dropdown-item" href="#">&nbsp;Meter Sealing</a>
    </div>
  </li>

  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Door Assembly</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Connection</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Harnessing</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;EC Checking</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Dry Test</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Air Test</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;HV Test</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Final 1</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Wet Test</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Final 2</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;TPI</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Packing</a>
  </li>
  <li class="nav-item sidemenu dropdown">
    <a class="nav-link " data-toggle="collapse" href="#"><i class="fa fa-wrench"></i>&nbsp;Dispatching</a>
  </li>
  <br/>
</ul>
<!-- End of Side Navbar -->
</div>
<div class="col-sm-9">
<?php
}
?>
