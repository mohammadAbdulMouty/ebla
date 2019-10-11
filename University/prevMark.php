<?php
session_start();

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
<body id="top"  >




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
      <li ><a class ho href="Stduser.php">Home</a></li>
      <li class="active" ><a href="#">Marks</a>
        <ul >
          <li><a href="pages/gallery.html">Current Semester Marks</a></li>
          <li><a href="pages/full-width.html">Previous Semesters Marks</a></li>
          
        </ul>
      </li>


      <li ><a href="#">Average</a>
        <ul>
          <li><a href="previousavg.php">Previous Average</a></li>
        </ul>
      </li>


      <li><a class ho href="whatif.php">What if</a></li>


      
      
      <li><i class="fa fa-sign-out fa-fw"></i><a class="log" href="#">logout</a></li>
    </ul>

    
  </nav>
</div>


<?php 

$query ="select max(r.Semester_Id) maxsem from Registration r where r.Year_Id = (select max(y.Id) from Year y) and r.Student_Id =".$_SESSION['id']."";
$result = sqlsrv_query($conn, $query);
$row=sqlsrv_fetch_array($result);
$query2 = "select r.*,c.Course_Name from Registration r inner join Course c on r.Course_Id = c.Course_Id where r.Year_Id =  (select max(y.Id) from Year y)  and r.Semester_Id =".$row['maxsem']." And r.Student_Id =".$_SESSION['id']."";
$result2 = sqlsrv_query($conn, $query2);


?>
<div class="wrapper bgded overlay">
    <div id="pageintro" class="hoc clear">
            <div class="tableHeadCurrent">
                
                <table class="tableCurentMark table-bordered">
             
                    <tr>
                        <th>اسم المادة</th>
                        <th>المذاكرة الاولى</th>
                        <th>المذاكرة الثانية</th>
                        <th>الفحص العملي</th>
                        <th>الفحص</th>
                        <th>العلامة النهائية</th>
                    </tr>
           
              
                    <?php 
              
              while($row2=sqlsrv_fetch_array($result2)){
                if($row2['First_Test']!=NULL && $row2['Second_Test']!=NULL && $row2['Lab_Mark']!=NULL && $row2['Final_Exam']!=NULL){
                  $fullMark = (int)$row2['First_Test'] + (int)$row2['Second_Test']+ (int)$row2['Lab_Mark']+(int)$row2['Final_Exam'];
                }else{
                  $fullMark= '';
                }
                  
                  ?>
                    <tr>
                        <td><?= $row2['Course_Name'] ?></td>
                        <td><?= $row2['First_Test'] ?></td>
                        <td><?= $row2['Second_Test'] ?></td>
                        <td><?= $row2['Lab_Mark'] ?></td>
                        <td><?= $row2['Final_Exam'] ?></td>
                        <td><?= $fullMark ?></td>
                     
                    </tr>
                  
              <?php }?>
             
                </table>
              </div>
            </div>
            
            <div class="tablebodyCurrent">
                <table class="tableCurrentMarkBody">
             
                </table>
            
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


<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/std.js"></script>
</body>
</html>

