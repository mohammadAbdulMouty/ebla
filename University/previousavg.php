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


      <li class="active"><a href="#">Average</a>
        <ul>
          <li><a href="previousavg.php">Previous Average</a></li>
        </ul>
      </li>


      <li class=><a class ho href="whatif.php">What if</a></li>


      
      
      <li><i class="fa fa-sign-out fa-fw"></i><a class="log" href="#">logout</a></li>
    </ul>

    
  </nav>
</div>



<div class="wrapper bgded overlay">
  <div id="pageintro" class="hoc clear"> 
     
 <?php
$arr1 = array();
$counterT = 0;
$countHoursAll = 0;
$i = 1;
$array = array();
   $query ="SELECT * FROM [dbo].[yearRegisterStd] (".$_SESSION['id'].") ";
   $result = sqlsrv_query($conn, $query,array(), array( "Scrollable" => 'static' ));
   $countYear = sqlsrv_num_rows($result);
   while ($row=sqlsrv_fetch_array($result)) {
     
     ?>
     <div class="table-avg" data-sid="<?= $i ?>"?>
      <h1 class="header-year"><?=$row['year'] ?> العام الدراسي</h1></tr>
      <table dir="rtl" >
      <tr>
      
      <tr>
      
      <th>الفصل الدراسي</th>
      <th>المعدل الفصلي</th>
      <th>المعدل التراكمي</th>
      <th>التقدير</th>
      </tr>
     <?php
     $query2 = "SELECT * FROM [dbo].[semesterInYear] (".$row['Id'].",".$_SESSION['id'].")";
     $result2 = sqlsrv_query($conn, $query2);
     while ($row2=sqlsrv_fetch_array($result2)) {
      $dtotal = 0;
      $d =0;
      $countHours =0;
       echo "<tr><td>".$row2['Semester_Name']."</td>";
        $query3 = "SELECT * FROM [Uni_Try_2].[dbo].[Points] where Student_Id = ".$_SESSION['id']." And Year_Id = ".$row['Id']." And Semester_Id = ".$row2['Semester_Id']."";
  
        $result3 = sqlsrv_query($conn,$query3);
        while($row3 = sqlsrv_fetch_array($result3)){
          if(!is_null($row3['d'])){
            if(array_key_exists($row3['Course_Id'],$array)){
              
             if($array[$row3['Course_Id']] < $row3['d']){
             
              $array[$row3['Course_Id']] = $row3['d'];
              
             }
            }else{
              $array += array($row3['Course_Id']=>$row3['d']);
              $counterT += $row3['Hours'];
            }
          $countHoursAll +=$row3['Hours'];
          $d += $row3['d'];
          $countHours += $row3['Hours'];
          $avg = 0;
          
          
          
          }
        }//end avg
        foreach($array as $key=>$val){
            
         $dtotal +=$val;
          
     }
     $gift = round($dtotal/$counterT,2);
     $deg = '';
     if($_SESSION['yor'] >=2008 && $_SESSION['yor'] <= 2011){
              if($gift >=2.00 && $gift <=2.32){
                  $deg = 'مقبول';
              }else if($gift < 2){
                $deg = 'راسب';
              }
              else if($gift >=2.33 && $gift <=2.99){
                $deg = 'جيد';
              }else if($gift >=3 && $gift <=3.67){
                $deg = 'جيد جداً';
              }else if($gift >=3.68 && $gift <=4){
                $deg = 'ممتاز';
              }
        
     }else {
            if($gift >=2.00 && $gift <=2.24){
              $deg = 'مقبول';
          }else if($gift <2){
            $deg = 'راسب';
          }
          else if($gift >=2.25 && $gift <=2.74){
            $deg = 'جيد';
          }else if($gift >=2.75 && $gift <=3.24){
            $deg = 'جيد جداً';
          }else if($gift >=3.25 && $gift <=3.74){
            $deg = 'ممتاز';
          }else if($gift >=3.75 && $gift <= 4){
            $deg = 'شرف';
          }
     }
        ?>
      
        <td><?=round($d/$countHours,2) ?></td>
          <td><?=round($dtotal/$counterT,2) ?></td>
          <td><?=$deg ?></td>

          <?php
      //     echo '<pre>';
         
      //  echo $counterT;
      //  echo '</pre>';
       
     }//end semester
    
     echo '</tr></table>';
     ?>
     <div class="control-avg">
       <?php
     if($i == $countYear){?>
      <div class="fa fa-angle-double-right prevyear" data-id ='<?=$i?>'> السنة السابقة</div>
      <?php
     }else if($i == 1){?>
        <div class="fa fa-angle-double-left nextyear" data-id ='<?=$i?>'> السنة التالية</div>
        <?php
     }else{?>
       <div class="fa fa-angle-double-left nextyear" data-id ='<?=$i?>'> السنة التالية </div>
      <div class="fa fa-angle-double-right prevyear" data-id ='<?=$i?>'> السنة السابقة</div>
      
     <?php
     }
     
     echo'</div></div>';
     $i = $i+1;
   }//end year 

// $d =0;
// $countHours =0;
// $query ="select * from  Points where Student_Id=".$_SESSION['id']."";
// $result = sqlsrv_query($conn, $query);
// $courseUnique = array();
// while($row=sqlsrv_fetch_array($result)){
//     $d += $row['d'];
    
   
// if(in_array($row['Course_Id'],$courseUnique) || is_null($row['Full_Mark'])){
    
    
// }else{
//     array_push($courseUnique,$row['Course_Id']);
//     $countHours += $row['Hours'];
// }

// }
// echo $countHours.'<br>';
// echo $d.'<br>';
// echo round($d/$countHours,2);
?> 
<!--end div.control-avg-->


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

