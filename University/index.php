<?php
session_start();
if(!isset($_SESSION['user'])){
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
<link rel='stylesheet' href="css/bootstrap.css"/>
<link rel='stylesheet' href="css/font-awesome.min.css"/>
<link rel='stylesheet' href="css/hover-min.css"/>
<link rel='stylesheet' href="css/animate.css"/>
<link rel='stylesheet' href="css/stylelog.css"/>
    
   
</head>

<body style="background-image: url(Img/ord.jpg)">

    <div class="home">
        <div class="itme">
            <div class="content">
                <form class="form-login" action="includes/login.inc.php" method="POST" onsubmit="return FormValidation();">
                    <div class="logo">
                            <img id="ImgTop" src="Img/Logo.png" width="150"/>
                          
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" id="firstname" name="uid" placeholder="Username">
                    </div>
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
                        </div>
                        <div class="input-group ch">
                            <label class=" radio-inline"><input type="radio"  name="Uni" value="sysuser" checked > SystemUser  </label>
                                
                            <label class="radio-inline"> <input type="radio"  name="Uni" value="student"> Student </label>
                        </div>
                        <div class="form-group bt">
                            <input type="submit" class="btn btn-info btn-block" name="submit"  value="Login">
                        </div> 
                </form>
            </div>
        </div>
    </div>





<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/Plugins.js"></script>
<script src="js/wow.min.js"></script>
<script>new WOW().init();</script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/validation.js"></script>

</body>
</html>


<?php
	
}
else{
    if(isset($_SESSION['sysuser'])){
        header("location: Sysuser.php");
    }
    else (isset($_SESSION['student'])){
        header("location: Student.php")
    };

}
?>