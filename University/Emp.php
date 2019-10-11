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


        


</body>

</html>


<?php
	
}
else{
    header("location: index.php");
    exit();
}
?>