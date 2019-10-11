<?php
session_start();
include 'includes/dbh.inc.php';
if($_GET['val'] == 'autoComp'){
    $query ="SELECT * FROM [Student] Where First_Name like '%".$_GET['value']."%' OR Last_Name like '%".$_GET['value']."%' OR First_Name like ".'N'."'%".$_GET['value']."%'  ";
   //echo $query;
   
    $result = sqlsrv_query($conn, $query);
   
 
    while($row=sqlsrv_fetch_array($result)){
        if($row['Department_Id'] == 1){
            $dep = 'معلوماتية';
        }else if($row['Department_Id'] == 2){
            $dep = 'عمارة';
        }
        echo '<div class="studentSearFou" data-sid="'.$row['Student_Id'].'"> ';
        echo $row['First_Name'].' '.$row['Father_Name'].' '.$row['Last_Name'];
        echo '<span class="idstudent" style="font-size: 14px;
        color: #040404;
        position: absolute;
        right: 13px;
        top: 2px;">'.$row['Student_Id'].'</span>';
        echo '<span style="    font-size: 12px;
    color: #f00;
    float: right;
    /* margin-top: 10px; */
    top: 6px;
    position: absolute;
    right: 13px;
    top: 21px;">'.$dep.'</span>';
        echo '</div>';
    }
}else if($_GET['val'] == 'showstd'){

$idstd = $_GET['value'];
$query ="SELECT * FROM [Student] Where Student_Id =".$idstd." ";
   //echo $query;
   
    $result = sqlsrv_query($conn, $query);
    $row=sqlsrv_fetch_array($result);
    ?>

<div class="row">
                      <div class="col-lg-4">
                         <div class="elementaco" data-id = "<?=$row['Student_Id']?>">Student id : <?=$row['Student_Id']?></div>
                      </div>
                      <div class="col-lg-4">
                         <div class="elementaco"> Name : <?=$row['First_Name'].' '.$row['Last_Name']?> </div>
                      </div> 
                      <div class="col-lg-4">
                          <div class="elementaco">Father Name : <?=$row['Father_Name']?></div>
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-5 selcor">
                       Select Course: <input type="text" class="searchcourse form-control">
                       <div class="showCourse"></div>
                    </div>
                    <div class="col-lg-3 selcor">
                       Select year: <select class="form-control yearid">
                           <?php
                            $query = "SELECT 
                            *
                            FROM [dbo].[Year] order by Id desc";
                                $result = sqlsrv_query($conn, $query);
                            while($row=sqlsrv_fetch_array($result)){
                           ?>
                           <option value="<?= $row['Id'] ?>"><?=$row['year'] ?></option>
                           <?php
                            }
                           ?>
                       </select>
                       
                    </div>
                    <div class="col-lg-3 selcor">
                     Select semester: <select class="form-control semesterid">
                           <option value="1">الاول</option>
                           <option value="2">الثاني</option>
                           <option value="3">الصيفي</option>
                       </select>
                    </div>
                    <div class="col-lg-3">
                    </div>
                   </div>
                   
                   <div class="btn btn-primary btn-save-reqister">Save</div>



    <?php
}else if($_GET['val'] == 'autoCompCourse'){
    $value = $_GET['value'];
    $query ="SELECT * FROM [Course] where Course_Name like ".'N'."'%".$_GET['value']."%' ";
 
   
    $result = sqlsrv_query($conn, $query);
    $row=sqlsrv_fetch_array($result);

    while($row=sqlsrv_fetch_array($result)){
    
    echo '<div class="courseName" data-cid='.$row['Course_Id'].'>';
        echo $row['Course_Name'];
    echo '</div>';
    }
}else if($_GET['val'] == 'addMark'){
   $_SESSION['courseid'] = $_GET['couid'];
}
else if($_GET['val'] == 'savecourse'){
    $stdid = $_GET['stdid'];
    $year = $_GET['year'];
    $semid = $_GET['sems'];
    $courseid = $_SESSION['courseid'];
    $date = date("Y/m/d");
   
    $query2 = 'INSERT INTO [dbo].[Registration]
    ([Course_Id]
    ,[Student_Id]
    ,[Year_Id]
    ,[Semester_Id]
    ,[Receipt_date])
VALUES (?,?,?,?,?)';
        $params = array($courseid,$stdid,$year,$semid,$date);
        $result = sqlsrv_query($conn,$query2,$params);
        if($result == false){
            die(print_r(sqlsrv_errors(),true));
        }
 }
?>