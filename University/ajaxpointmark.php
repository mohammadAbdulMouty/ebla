<?php 
session_start();
include 'includes/dbh.inc.php';


$sum = 0;
$mark = explode(',',$_POST['mark'][0]);
$hours = explode(',',$_POST['hours'][0]);
$ii = 0;
foreach($mark as $i){
    $query3= 'SELECT  Point
    FROM  dbo.GroupPoint AS g
    WHERE ('.$i.' BETWEEN min_mark AND max_mark) AND ('.$_SESSION['yor'].' BETWEEN min_year AND max_year)';
    
     $result3= sqlsrv_query($conn, $query3);
     $row3=sqlsrv_fetch_array($result3);
     if($result3 == false){
        die(print_r(sqlsrv_errors(),true));
    }
    $housum = $hours[$ii];
    $ii = $ii+1;
     $sum += (float)$row3['Point']*(int)$housum;
     
}
echo $sum;