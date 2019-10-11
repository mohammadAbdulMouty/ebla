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
      <li ><a href="#">Marks</a>
        <ul>
          <li><a href="prevMark.php">Current Semester Marks</a></li>
          <li><a href="pages/full-width.html">Previous Semesters Marks</a></li>
        </ul>
      </li>


      <li ><a href="#">Average</a>
        <ul>
          <li><a href="previousavg.php">Previous Average</a></li>
        </ul>
      </li>


      <li class="active"><a class ho href="whatif.php">What if</a></li>


      
      
      <li><i class="fa fa-sign-out fa-fw"></i><a class="log" href="#">logout</a></li>
    </ul>

    
  </nav>
</div>



<div class="wrapper bgded overlay">
    <div id="pageintro" class="hoc clear">
        <?php

$nhours = 0;
$sumhours =0;
$c ='';
$i=0;
$data = array();
$query = "select c.* from Course  c inner join Department d on c.Department_Id = d.Department_Id inner join Student s on s.Department_Id = d.Department_Id where s.Student_Id =".$_SESSION['id']." ";
$result = sqlsrv_query($conn, $query);
while ($row=sqlsrv_fetch_array($result)){
 $query2 ="select max(r.First_Test+r.Second_Test+r.Lab_Mark+r.Final_Exam) g from Registration r where r.Course_Id = '".$row['Course_Id']."'  and r.Student_Id =".$_SESSION['id']."";
 $result2 = sqlsrv_query($conn, $query2);
 
while ($row2=sqlsrv_fetch_array($result2)){
   if(!is_null($row2['g'])){
     $query3 ="SELECT  Point FROM  dbo.GroupPoint AS g WHERE (".$row2['g']." BETWEEN min_mark AND max_mark) AND (".$_SESSION['yor']." BETWEEN min_year AND max_year)";
 $result3= sqlsrv_query($conn, $query3);
 $row3=sqlsrv_fetch_array($result3);
     $point = $row3['Point'];
     $nhours += $row['Course_Hours']*$point;
     $sumhours += $row['Course_Hours'];
     $c =$row2['g'];
     $i = $i+1;
     
   }else{
     $c = 'لايوجد علامة';
   }
   if(!$row['Essential']){
       $var = 'optional';
   }else{
     $var = 'notoptional';
   }
array_push($data,array('courseid'=>$row['Course_Id'],'Course_Hours'=>$row['Course_Hours'],'point'=>$point,'cname'=>$row['Course_Name'],'mark'=>$c,'optional'=>$var));
  }
}
$avg = $nhours/$sumhours;


?>
 
        <div class="whatif-hearder" dir="rtl">
            
            <span class="relavg-inf"> المعدل الحقيقي: <span class="realAvg"><?=round($avg,2)?></span></span>
            <span class="futureavg-inf"> المعدل المتوقع: <span class="futureAvg">-</span></span>
            <div class="btn btn-success btn-clacFutAvg">حساب المعدل</div>
            <div class="btn btn-info btn-resetAvg" style="">Restet</div>
        </div>
        <table dir="rtl" class="table-whatif-content">
        <tr>
          <th>اسم المقرر</th>
          <th>الساعات المعمتدة</th>
          <th>العلامة السابقة</th>
          <th>العلامة المتوقعة</th>
        </tr>
       
           <?php
                foreach($data as $key=>$value){?>
                  <tr class="row-data" data-point="<?= $data[$key]['point']?>" data-opt="<?= $data[$key]['optional'] ?>">
                  <td><?= $data[$key]['cname']?></td>
                  <td class="coursHours"><?= $data[$key]['Course_Hours']?></td>
                  <td class="mark"><?= $data[$key]['mark'] ?></td>
                  <td><input type="number" class="form-control new-mark" data-id="<?=  $data[$key]['courseid']?>" min="0" max="100"></td>
                  
                  </tr>
                  <?php
                }
                ?>
                 
              
              

                  <?php
                 
                // }
               
            ?>
            
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

