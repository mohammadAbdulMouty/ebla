<?php
session_start();
if(isset($_SESSION['user'])){
    
?>


<!DOCTYPE html>
<html lang="en">
   
<head>
<title>Add Mark</title>
    <meta charset="utf-8">
    <link rel='stylesheet' href="css/bootstrap.css"/>
    <link rel='stylesheet' href="css/jquery.bootgrid.css"/>
    <link rel='stylesheet' href="css/font-awesome.min.css"/>
    <link rel='stylesheet' href="css/hover-min.css"/>
    <link rel='stylesheet' href="css/animate.css"/>
    <link rel='stylesheet' href="css/sysu.css"/>
    
    

</head>




<?php
include_once 'Header.php';
?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="addMark-line"></div>
                    <h1 class="page-header header-mark">Registration of a course</h1> 
                    </div>
                    <div class="col-lg-6">
                    <div class="container-serachCou">
                        
                        <label>Student Name</label>
                        <input type="text"  class="form-control sname" name="sName">
                        <div class="auto-complete">
                        </div>
                        
                   </div>
                      
                    
             </div>
                <!-- /.col-lg-12 -->
            
            </div>
            <!-- /.row -->
            
            <hr style="margin:0px;">
            <div class="container-student" >
                  
                </div>
               
                </div>








<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.bootgrid.js"></script>
<script src="js/Plugins.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/validation.js"></script>
<script src="js/show_table.js"></script>

        


</body>

</html>


<?php
	
}
else{
    header("location: index.php");
    exit();
}
?>