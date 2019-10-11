<?php 
include 'includes/dbh.inc.php';
?>
<body>

<header>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img alt="Brand" src="img/ebla-wplogo.png"  ></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><?=$_SESSION['First']." ".$_SESSION['last']?><i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                             <h4 style="    color: #2e3192;
                                            margin-bottom: 1px;
                                            margin-top: -1px;
                                            font-size: 21px;">ٍStudents Affairs</h4>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                    
                        

                    <?php
                        $sql = "SELECT * FROM Employee WHERE Id=".$_SESSION['id']."";
                        $result = sqlsrv_query($conn, $sql);
                        $row = sqlsrv_fetch_array($result);
                        if($row['Premission'] == 'maneger'){
                    ?>
                    <li><a href="Sysuser.php">Employees</a></li>
                    <?php } ?>
                    <li><a href="Student.php">Students<span class="sr-only">(current)</span></a></li>
                    <li><a href="Course.php">Courses</a></li>
                    <li class="slideSecond">
                            <a>Registration<span class="fa fa-angle-left ourarrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addMark.php"><i class="fa fa-plus"></i> Registration of a course</a>
                                </li>
                                <li>
                                    <a href="addmark2.php"><i class="fa fa-pencil-square-o"></i> Add Mark</a>
                                </li>
                            </ul>
                        </li>



                    <li class="slideSecond1">
                            <a>More<span class="fa fa-angle-left ourarrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="addMark.php"><i class="fa fa-plus"></i> Registration of a course</a>
                                </li>
                                <li>
                                    <a href="addmark2.php"><i class="fa fa-pencil-square-o"></i> Add Mark</a>
                                </li>
                            </ul>
                        </li>


                       
        </nav>


       


</header>


