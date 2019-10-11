<?php
session_start();
if(isset($_SESSION['user'])){
    
?>


<!DOCTYPE html>
<html lang="en">
   
<head>
<title>Courses</title>
    <meta charset="utf-8">
    <link rel='stylesheet' href="css/bootstrap.min.css"/>
    <link rel='stylesheet' href="css/jquery.dataTables.css"/>
    <link rel='stylesheet' href="css/font-awesome.min.css"/>
    <link rel='stylesheet' href="css/hover-min.css"/>
    <link rel='stylesheet' href="css/animate.css"/>
    <link rel='stylesheet' href="css/sysu.css"/>
    <link href="js/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    
    

</head>




<?php
include_once 'Header.php';
?>


 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Courses<div class="btn btn-primary btn-add-cour"><i class="fa fa-plus"></i> Add</div></h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
      
             <!-- Table -->
            <div class="row">
                        <div class="col-lg-12">
                    <div class="table-responsive">
                        <table  width="100%"  class="table table-bordered table-striped table-hover dataTables-example" >
                            <thead>
                                <tr>
                                <th column-data-id="Course_Id">Course ID</th>
                                <th column-data-id="Course_Name">Course Name</th>
                                <th column-data-id="Course_Hours">Course Hours</th>
                                <th column-data-id="Department_Id">Department</th>
                                <th column-data-id="General">General</th>
                                <th column-data-id="Essential">Essential</th>
                                <th column-data-id="Semester">Semester</th>
                                <th column-data-id="Course_Level">Course Level</th>
                                <th column-data-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $query ="SELECT * FROM Course";
                                $result = sqlsrv_query($conn, $query);
                                $total_records=sqlsrv_has_rows($result);

                                while($row=sqlsrv_fetch_array($result))
                                    {?>
                                        <tr>

                                        <?php 
                                            if($row['Department_Id'] == 1){
                                                $type= 'معلوماتية';
                                            }else if($row['Department_Id'] == 2){

                                                $type = 'عمارة';
                                            }

                                            if($row['Semester_Id'] == 0){
                                                $type1= 'الأول';
                                            }else if($row['Semester_Id'] == 1){

                                                $type1 = 'الثاني';
                                            }

                                            if($row['General'] == 0){
                                                $type2= 'No';
                                            }else if($row['General'] == 1){

                                                $type2= 'Yes';
                                            }

                                            if($row['Essential'] == 0){
                                                $type3= 'No';
                                            }else if($row['Essential'] == 1){

                                                $type3= 'Yes';
                                            }


                                        ?>
                                        
                                        <td><?= $row['Course_Id'] ?></td>
                                        <td><?= $row['Course_Name'] ?></td>
                                        <td><?= $row['Course_Hours'] ?></td>
                                        <td><?= $type ?></td>
                                        <td><?= $type2 ?></td>
                                        <td><?= $type3 ?></td>
                                        <td><?= $type1 ?></td>
                                        <td><?= $row['Course_Level'] ?></td>
                                        <td style="text-align: center;">
                                          <div class="btn btn-warning btn-sm btn-edit-cour" data-courseid="<?= $row['Course_Id'] ?>"><i class="fa fa-pencil-square-o"></i></div>
                                          <div class="btn btn-danger btn-sm btn-delete-cour" data-courseid="<?= $row['Course_Id'] ?>"><i class="fa fa-trash-o"></i></div>
                                        </td>
                                        </tr>
                                    <?php }
                                     ?>
                            </tbody>
                        </table>
                                



            <div class="overlay-edit-course">
                <form class="form-edit-course">
                                   
            </form>
        </div>    


<div class="overlay-add-cour">
        
        <form class="form-add-cour">
               <i class="fa fa-close close-overlay-add-cour"></i>
               <h2 class="page-header page-edit-headerstd" data-id="<?= $course_id ?>">Add Course</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                            <div class="form-group"><label>Course ID</label><input type="text" class="form-control courseid" name="CId"></div>
                                            <div class="form-group"> <label>Course Hours</label><input type="text"class="form-control Chours" name="Chou"></div> 
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group"> <label>Course Name</label><input type="text" class="form-control Cname" name="Cname"></div>  
                                            <div class="form-group">  <label>Department</label><input type="text" class="form-control depid" name="dept"></div> 
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-6">
                                            <div class="form-group"><label>General</label><?php 
                                                                                if($row['General'] == 0){
                                                                                    $no = 'selected';
                                                                                    $yes = '';
                                                                                }else{
                                                                                    $no = '';
                                                                                    $yes = 'selected';
                                                                                }
                                                                            ?>
                                                                            <select name="General" class="form-control general">
                                                                                <option value="0" <?=$no?>>No</option>
                                                                                <option value ="1" <?=$yes?>>Yes</option>
                                                                            </select></div>

                                            <div class="form-group"><label>Semester</label><?php
                                                                                if($row['Semester'] == 0){
                                                                                    $first = 'selected';
                                                                                    $second = '';
                                                                                }else{
                                                                                    $first = '';
                                                                                    $second = 'selected';
                                                                                }
                                                                            ?>
                                                                            <select name="Semester" class="form-control semester">
                                                                                <option value="0" <?=$first?>>الأول</option>
                                                                                <option value ="1" <?=$second?>>الثاني</option>
                                                                            </select></div>
                                            
                                            

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">  <label>Essential</label><?php 
                                                                                if($row['Essential'] == 0){
                                                                                    $no = 'selected';
                                                                                    $yes = '';
                                                                                }else{
                                                                                    $no = '';
                                                                                    $yes = 'selected';
                                                                                }
                                                                            ?>
                                                                            <select name="Essential" class="form-control Essential">
                                                                                <option value="0" <?=$no?>>No</option>
                                                                                <option value ="1" <?=$yes?>>Yes</option>
                                                                            </select></div>
                                            <div class="form-group">  <label>Course Level</label><input type="text" class="form-control Clvl" name="CLvlS"></div>  
                                        </div>
                                    </div>



                        
                        
                        <div class="form-group"><div class="btn btn-success btn-block btn-save-add-cour"   >Save</div> 
            
                                                                            </form>
                                                                            </div>

















<script src="js/Plugins.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/validation.js"></script>
<script src="js/show_table.js"></script>
<script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="js/datatables/extensions/Buttons/js/buttons.print.min.js"></script>
    <script src="js/datatables/jszip.min.js"></script>
    <script src="js/datatables/pdfmake.min.js"></script>
    <script src="js/datatables/vfs_fonts.js"></script>
    <script src="js/datatables/extensions/Buttons/js/buttons.html5.js"></script>
    <script src="js/datatables/extensions/Buttons/js/buttons.colVis.js"></script>


<script>
        $(document).ready(function () {

            $('.dataTables-example').DataTable({
                pageLength: 10,
                dom: '<"html5buttons" B>lTfgitp',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        filename: 'Coures',
                        sheetName: 'Coures',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    }
                    , 'colvis'
                    // ,{
                    //     extend: 'print',
                    //     text: 'Print selected',
                    //     exportOptions: {
                    //         modifier: {
                    //             selected: true
                    //         }
                    //     }
                    // }
                    , {
                        extend: 'print',
                        text: 'Print'
                        // , message: '<h3>Coures</h3>'
                        , exportOptions: {
                            columns: ':visible'
                        }
                        , customize: function (win) {
                           
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                        , autoPrint: false
                    }
                ]
            });
        });
    </script>

        


</body>

</html>


<?php
	
}
else{
    header("location: index.php");
    exit();
}
?>