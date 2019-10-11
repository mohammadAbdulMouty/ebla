<?php
session_start();
if(isset($_SESSION['user'])){
    
?>


<!DOCTYPE html>
<html lang="en">
   
<head>
<title>Employees</title>
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
                    <h1 class="page-header">Employees<div class="btn btn-primary btn-add-user"><i class="fa fa-plus"></i> Add</div></h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
     
            <!-- Table -->
              <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="">
                       
                        <!-- /.panel-heading -->
                       
                    <div class="table-respon">
                    <table width="100%" class="table res table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                
                                <th column-data-id="First name">First Name</th>
                                <th column-data-id="Last name">Last Name</th>
                                <th column-data-id="Birthday">Birthday</th>
                                <th column-data-id="Premission">Premission</th>
                                <th column-data-id="Address">Address</th>
                                <th column-data-id="username">Username</th>
                                <th column-data-id="pass">Password</th>
                                <th column-data-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                </thead>
                                <tbody>

                                </tr>
                                <?php
                                $query ="SELECT * FROM Employee";
                                $result = sqlsrv_query($conn, $query);
                                $total_records=sqlsrv_has_rows($result);

                                while($row=sqlsrv_fetch_array($result))
                                    {?>
                                        <tr>
                                        <?php 
                                            if($row['Premission'] == 0){
                                                $type= 'Admin';
                                            }else if($row['Premission'] == 1){

                                                $type = 'Employee';
                                            }

                                        ?>
                                       
                                        <td><?= $row['First_Name'] ?></td>
                                        <td><?= $row['Last_Name'] ?></td>
                                        <td><?=  date_format($row['Birthday'],'Y-m-d'); ?></td>
                                        <td><?= $type ?></td>
                                        <td><?= $row['Address'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['pwd'] ?></td>
                                        <td style="text-align: center;">
                                          <div class="btn btn-warning btn-sm btn-edit-user" data-id="<?=$row['Id']?>"><i class="fa fa-pencil-square-o"></i></div>
                                          <div class="btn btn-danger btn-sm btn-delete-user" data-id="<?=$row['Id']?>" ><i class="fa fa-trash-o"></i></div>
                                        </td>
                                        </tr>
                                    <?php }
                                     ?>
                            </tbody>
                        </table>
                      
              

              <div class="overlay-edit">
        
        <form class="form-edit">
        
        
                   
        </form>
    </div>    
 <div class="overlay-add">
        
        <form class="form-add">
        
        <i class="fa fa-close close-overlay-add"></i>
            <h2 class="page-header page-edit-header" data-id="<?= $id ?>">Add Employee</h2>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-group"><label>First Name</label><input type="text" class="form-control FName"  name="FName"></div>
            </div>
            <div class="col-lg-6">
            <div class="form-group"> <label>Last Name</label><input type="text" class="form-control LName"  name="LName"></div>
            </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
            <div class="form-group"> <label>Birthday</label><input type="date"  class="form-control Birth"   name="Birth"></div>
            </div> 
            <div class="col-lg-6">
            <div class="form-group"> <label>Premission</label>
           
            <select name="permistion" class="form-control Prem">
                <option value="0" >Admin</option>
                <option value ="1" >Employee</option>
            </select>
            
            </div>
            </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
            <div class="form-group">  <label>Address</label><input type="text" class="form-control Address"  name="Address"></div>
            </div> 
            <div class="col-lg-6">
            <div class="form-group">  <label>Username</label><input type="text" class="form-control Username"  name="Username"></div> 
            </div>
            </div>
            <div class="row">
                <div class="col-lg-6">

            <div class="form-group">  <label>Password</label><input type="text" class="form-control Password"  name="Password"> </div>
            </div>
            </div>   
            <div class="form-group"><div class="btn btn-success btn-block form-control btn-save-add" >Save</div> 
            

                   
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