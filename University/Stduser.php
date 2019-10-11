
<?php session_start();
include 'includes/dbh.inc.php';

?>
<!DOCTYPE html>



<html lang="">
<title>Stduser</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

    <link rel='stylesheet' href="css/bootstrap.css"/>
    <link rel='stylesheet' href="css/jquery.bootgrid.css"/>
    <link rel='stylesheet' href="css/font-awesome.min.css"/>
    <link rel='stylesheet' href="css/hover-min.css"/>
    <link rel='stylesheet' href="css/animate.css"/>
    <link rel='stylesheet' href="fonts/Scheherazade-Bold.ttf"/>

</head>
<body id="top">




<div class="wrapper row1">
  <header id="header" class="hoc clear"> 

  
    <div id="logo" class="fl_left">
    <a class="navbar-brand" href="index.html"><img class="imglogebla" alt="Brand" src="img/ebla-wplogo.png"  ></a>
    
    </div>
    <div class="userindex">
    <i class="fa fa-user-circle"></i>
    <?php  echo $_SESSION['First'].' '.$_SESSION['last'] ?>
</div>
  </header>
  <nav id="mainav" class="hoc clear"> 
   
  
    <ul class="clear">
      <li class="active"><a class ho href="Stduser.php">Home</a></li>
      <li><a href="#">Marks</a>
        <ul>
          <li><a href="prevMark.php">Current Semester Marks</a></li>
          <li><a href="pages/full-width.html">Previous Semesters Marks</a></li>
        </ul>
      </li>


      <li><a href="#">Average</a>
        <ul>
          <li><a href="previousavg.php">Previous Average</a></li>
        </ul>
      </li>


      <li class=><a class ho href="whatif.php">What if</a></li>


      
      
      <li><i class="fa fa-sign-out fa-fw"></i><a class="log" href="#">logout</a></li>
    </ul>

    
  </nav>
</div>

<?php
$d = 0;
$countHours =0;
$query ="select * from  Points where Student_Id=".$_SESSION['id']."";
$result = sqlsrv_query($conn, $query);
$courseUnique = array();
while($row=sqlsrv_fetch_array($result)){
    
  $d += $row['d'];
   
if(in_array($row['Course_Id'],$courseUnique) || is_null($row['Full_Mark'])){
    
    
}else{
    array_push($courseUnique,$row['Course_Id']);
    $countHours += $row['Hours'];
}

}



?>

<div class="wrapper bgded overlay" >
  <div id="pageintro" class="hoc clear"> 
   <div class="container">
     <div class="row">
       <div class="col-lg-6 col-md-6">
         <div class="col-lg-6">
            <span class="spanwhat">Name</span>
           </div>
            <div class="col-lg-6 ">
             <span class="spanval">
             <?= $_SESSION['First'].' '.$_SESSION['last']?></span>
             </div>
             </div>
             <div class="col-lg-6 col-md-3">
             <div class="col-lg-6">
             <span class="spanwhat">Student Id</span>
             </div>
             <div class="col-lg-6 col-md-3">
             <span class="spanval">
             <?= $_SESSION['id']?>
             </span>
             </div>
      </div>
    </div><!--end .row-->
    <div class="row">
      <div class="col-lg-6">
          <div class="col-lg-6">
            <span class="spanwhat">Adress</span>
          </div>
          <div class="col-lg-6">
          <span class="spanval">
             <?= $_SESSION['Adr']?></span>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="col-lg-5">
            <span class="spanwhat">E-mail</span>
          </div>
          <div class="col-lg-7">
          <span class="spanval emailval">
             <?= $_SESSION['e-mail']?></span>
             <i class="fa fa-edit editEmail"></i>
          </div>
      </div>
    </div><!--end .row-->
    <div class="row">
      <div class="col-lg-6">
          <div class="col-lg-6">
            <span class="spanwhat">Reg</span>
          </div>
          <div class="col-lg-6">
          <span class="spanval">
             <?= $_SESSION['yor']?></span>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="col-lg-6">
            <span class="spanwhat ">phone</span>
          </div>
          <div class="col-lg-6">
          <span class="spanval phoneval">
             <?= $_SESSION['phone']?></span>
             <i class="fa fa-edit editphone"></i>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
          <div class="col-lg-6">
            <span class="spanwhat">Avgerge</span>
          </div>
          <div class="col-lg-6">
          <span class="spanval">
             <?= round($d/$countHours,2);?></span>
          </div>
      </div>
      <div class="col-lg-6">
          
          <div class="col-lg-9">
             <span class="changpass">Change the password</span>
          </div>
      </div>
    </div>
  </div>
<?php



?>
    
  </div>
</div>










<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
     
    <p class="fl_left" style="    position: relative;
    top: 27px">Copyright &copy; 2018 - All Rights Reserved - EBU Team 2018</p>
    <ul class="faico clear">
        <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
      </ul>
    
  </div>
</div>
<div class="overlay-editEmail">
<form class="form-edit-Email">
  <p>Please input the new Email</p>
  <input type="email">
  <div class="btn btn-success saveupdateEma">Save</div>
  <div class="btn btn-danger closeupdateEma">close</div>
  <p class="email-error"></p>
</form>
</div>
<div class="overlay-editphone">
<form class="form-edit-phone">
  <p>Please input the new Phone</p>
  <input type="phone">
  <div class="btn btn-success saveupdatepho">Save</div>
  <div class="btn btn-danger closeupdatepho">close</div>
  <p class="phone-error"></p>
</form>
</div>
<div class="overlay-changepass">
<form class="form-changepass">
  <div class="content-pass">
      <span>Old password</span>
      <i class="fa fa-eye showpass"></i>
      <input type="password" class="oldpass form-control">
  </div>
  <div class="content-pass">
      <span>new password</span>
      <i class="fa fa-eye showpass"></i>
      <input type="password" class="newpass form-control">
  </div>
  <div class="content-pass">
    <span>confirm password</span>
    <i class="fa fa-eye showpass"></i>
    <input type="password" class="confirmpass form-control">
  </div>
<div class="btn btn-success savepassword ">Save</div>
  <div class="btn btn-danger cloasenewpass">close</div>
  <p class="pass-error"></p>
</form>
</div>
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/std.js"></script>
</body>
</html>