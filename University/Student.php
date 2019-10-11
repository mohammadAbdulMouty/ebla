<?php
session_start();
if(isset($_SESSION['user'])){
    
?>


<!DOCTYPE html>
<html lang="en">
   
<head>
<title>Students</title>
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
                    <h1 class="page-header">Students<div class="btn btn-primary btn-add-std"><i class="fa fa-plus"></i> Add</div></h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
     
            <!-- Table -->
            <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                    <div class="table-respon">
                        <table width="100%"  class="table table-bordered table-striped table-hover dataTables-example">
                            <thead>
                                <tr>
                                <th column-data-id="Id" >Student ID</th>
                                <th column-data-id="First name">First Name</th>
                                <th column-data-id="Last name">Last Name</th>
                                <th column-data-id="Father name">Father Name</th>
                                <th column-data-id="Birthday">Birthday</th>
                                <th column-data-id="National_Number">National Number</th>
                                <th column-data-id="Department_Id">Department</th>
                                <th column-data-id="Degree_Id">Degree</th>
                                <th column-data-id="Baccalaurate_Rate"></th>
                                <th column-data-id="commands" data-formatter="commands" data-sortable="false" >Commands</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $query ="SELECT * FROM Student";
                                $result = sqlsrv_query($conn, $query);
                                $total_records=sqlsrv_has_rows($result);

                                while($row=sqlsrv_fetch_array($result))
                                    {?>
                                        <tr>

                                        <?php 
                                            if($row['Department_Id'] == 1){
                                                $type= 'IT';
                                            }else if($row['Department_Id'] == 2){

                                                $type = 'Architecture';
                                            }

                                            if($row['Degree_Id'] == 1){
                                                $type1= 'Scientific';
                                            }else if($row['Degree_Id'] == 2){

                                                $type1 = 'Literary';
                                            }


                                        ?>
                                        
                                        <td><?= $row['Student_Id'] ?></td>
                                        <td><?= $row['First_Name'] ?></td>
                                        <td><?= $row['Last_Name'] ?></td>
                                        <td><?= $row['Father_Name'] ?></td>
                                        <td><?=  date_format($row['Birthday'],'Y-m-d'); ?></td>
                                        <td><?= $row['National_Number'] ?></td>
                                        <td><?= $type ?></td>
                                        <td><?= $type1 ?></td>
                                        
                                        <td><a href="#" class="moreinf" data-studentid="<?= $row['Student_Id'] ?>"><i class="fa fa-caret-down" ></i> more</a></td>
                                        <td style="text-align: center;" >
                                            
                                          <div class="btn btn-warning btn-sm btn-edit-std" data-studentid="<?= $row['Student_Id'] ?>" ><i class="fa fa-pencil-square-o"></i></div>
                                          <div class="btn btn-danger btn-sm btn-delete-std" data-studentid="<?= $row['Student_Id'] ?>"><i class="fa fa-trash-o"></i></div>
                                        </td>
                                        </tr>
                                    <?php }
                                     ?>
                            </tbody>
                        </table>



                                <div class="overlay-edit-std">
                                            <form class="form-edit-std" >
               
                                                        
              
                                            </form>
                                        </div>    
    <div class="overlay-add-std">
        
        <form class="form-add-std">
               <i class="fa fa-close close-overlay-add-std"></i>
                                            <h2 class="page-header page-edit-headerstd" data-id="<?= $student_id ?>">Edit Student</h2>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group"><label>Student Id</label><input type="text" class="form-control studentid" value="<?=$row['Student_Id'] ?>" name="Student_Id"></div>
                                                        <div class="form-group"> <label>Last Name</label><input type="text"  class="form-control lName " value="<?=$row['Last_Name'] ?>" name="Last_Name"></div>
                                                        <div class="form-group">  <label>Mother Name</label><input type="text" class="form-control momName" value="<?=$row['Mother_Name'] ?>" name="Mother_Name"></div> 
                                                        
                                                        </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group"> <label>First Name</label><input type="text" class="form-control fName" value="<?=$row['First_Name'] ?>" name="First_Name"></div>
                                                        <div class="form-group"> <label>Father Name</label><input type="text"class="form-control fatName" value="<?=$row['Father_Name'] ?>" name="Father_Name"></div>
                                                        <div class="form-group"> <label>Birthday</label><input type="date"  class="form-control birthday"  name="Birth"></div>  
                                                        </div> 
                                                
                                                    <div class="col-lg-4">
                                                    <div class="form-group"> <label>Gender</label>
                                                                <?php 
                                                                    if($row['Gender'] == 0){
                                                                        $male = 'selected';
                                                                        $female = '';
                                                                    }else{
                                                                        $male = '';
                                                                        $female = 'selected';
                                                                    }
                                                                ?>
                                                                <select name="permistion" class="form-control gender">
                                                                    <option value="0" <?=$male?>>Male</option>
                                                                    <option value ="1" <?=$female?>>Female</option>
                                                                </select></div>
                                                        <div class="form-group">  <label>National Number</label><input type="text" class="form-control natiNum" value="<?=$row['National_Number'] ?>" name="National_Number"> </div> 
                                                        <div class="form-group">  <label>address</label><input type="text" class="form-control addressSTd" value="<?=$row['address'] ?>" name="address"> </div>
                                                    </div> 
                                                </div> 
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group">  <label>Phone</label><input type="text" class="form-control phone" value="<?=$row['Phone'] ?>" name="phone"> </div>
                                                        <div class="form-group">  <label>Year Of Reg</label><input type="text" class="form-control yearReg" value="<?=  $row['Year_Of_Reg']; ?>"  name="Year Of Reg"> </div>
                                                        <div class="form-group">  <label>E-mail</label><input type="text" class="form-control email" value="<?=$row['Email'] ?>" name="Email"> </div>
                                                        </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">  <label>Department</label><input type="text" class="form-control depid" value="<?=$row['Department_Id'] ?>" name="department"></div>
                                                        <div class="form-group">  <label>Baccalaurate Rate</label><input type="text" class="form-control bacRate" value="<?=$row['Baccalaurate_Rate'] ?>" name="Baccalaurate_Rate"> </div>
                                                        <div class="form-group">  <label>Degree</label><input type="text" class="form-control degId" value="<?=$row['Degree_Id'] ?>" name="Degree"> </div>
                                                    </div>   
                                                    <div class="col-lg-4">
                                                    <div class="form-group showpass"> <label>Password</label><i class="fa fa-eye"></i><input type="password" class="form-control pass" value="<?=$row['pwd'] ?>" name="pass"></div>
                                                    <div class="form-group showpass">  <label>Confirm Password</label><i class="fa fa-eye"></i><input type="password" class="form-control passconfig" value="<?=$row['pwd'] ?>" name="Con-pass"></div>
                                                    <div class="form-group saveAddFormGroup">  <div class="btn btn-success btn-block form-control btn-save-add-std" >Save</div> 
                                                    </div>
                                                </div>
                                                                </form>
</div>























</div>
                                                                </div>
                                                                </div>
<div class="overlay-more-user">
    <div class="overlay-content">
    
    </div>
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
                          utf8_decode  
                            
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