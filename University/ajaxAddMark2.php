<?php
session_start();
include 'includes/dbh.inc.php';

if($_GET['val'] == 'autoComp'){
    $query ="SELECT * FROM [Course] Where Course_Id like '%".$_GET['value']."%' OR Course_Name like ".'N'."'%".$_GET['value']."%'  ";
   //echo $query;
   
    $result = sqlsrv_query($conn, $query);

    while($row=sqlsrv_fetch_array($result)){
        echo '<div class="CourseSearFou" data-sid="'.$row['Course_Id'].'"> ';
        echo $row['Course_Id'].' '.$row['Course_Name'];
        echo '</div>';
    
    }  
}else if($_GET['val'] == 'showMark'){
    $courseid = $_GET['value'];
    $query = "SELECT * FROM [Registration] a inner join [dbo].[Student] b on a.Student_Id = b.Student_Id  where a.[Course_Id] = '".$courseid."' ";
    $query2 = "SELECT TOP (1000) *
FROM [Uni_Try_2].[dbo].[Course] where [Course_Id] = '".$courseid."'";
 $result2 = sqlsrv_query($conn, $query2);
    $result = sqlsrv_query($conn, $query);
    $row2=sqlsrv_fetch_array($result2);
    $courseName= $row2['Course_Name'];
    echo '<h2 class="header-coursename"><span>'.$courseid.'</span> '.$courseName.'</h2>';?>
    <div class="row">
                        <div class="col-lg-12">
                    <div class="table-respon">
                        <table width="100%"  class="table table-bordered table-striped table-hover" id="Employees_info">
                            <thead>
                                <tr>
                                <th column-data-id="Student_name">Student Name</th>
                                <th column-data-id="first-test">First Test</th>
                                <th column-data-id="Second-test">Second Test</th>
                                <th column-data-id="Lab_mark">Lab Mark</th>
                                <th column-data-id="Final_exam">Final Exam</th>
                                <th column-data-id="Full_mark">Full Mark</th>
                                <th column-data-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                
                                </tr>
                                </thead>
<?php

    while($row=sqlsrv_fetch_array($result)){
        ?>

        <tr>
            <td><?=$row['First_Name'].' '.$row['Last_Name'] ?></td>
            <td><?=$row['First_Test'] ?></td>
            <td><?=$row['Second_Test'] ?></td>
            <td><?=$row['Lab_Mark'] ?></td>
            <td><?=$row['Final_Exam'] ?></td>
            <td><?= $row['First_Test']+$row['Lab_Mark']+$row['Final_Exam']+$row['Second_Test'] ?></td>
            <td>
                <div class="btn btn-success"><i class="fa fa-pencil-square-o"></i></div>
            </td>
        
            
        </tr>
        <?php
    }?>

    <div class="container-MarkEdit">

    </div>
</div>
    <?php
}