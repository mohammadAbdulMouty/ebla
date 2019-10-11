<?php
include 'includes/dbh.inc.php';
if($_GET['val'] == 'showEdit'){
    $student_id = $_GET['id'];
    $query ="SELECT * FROM Student Where Student_Id =".$student_id."";
    $result = sqlsrv_query($conn, $query);
    $total_records=sqlsrv_has_rows($result);

    while($row=sqlsrv_fetch_array($result))
    {?>

               <i class="fa fa-close close-overlay-edit-std"></i>
                                            <h2 class="page-header page-edit-headerstd" data-id="<?= $student_id ?>">Edit Student</h2>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-group"><label>Student Id</label><input type="text" class="form-control" value="<?=$row['Student_Id'] ?>" name="Student_Id"></div>
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
                                                                <select name="gender" class="form-control gender">
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
                                                    <div class="form-group saveAddFormGroup">  <div class="btn btn-success btn-block form-control  btn-save-edit-std" >Save</div> 
                                                    </div>
                                                </div>


<?php
          //value="<?=$row['Year_Of_Reg'] "  
        }
    }else if($_GET['val'] == 'saveEditstd'){
        
            $query1 ="UPDATE [dbo].[Student] set
             [First_Name] = ?
            ,[Last_Name] = ?
            ,[Father_Name] = ?
            ,[Mother_Name] = ?
            ,[Gender] = ?
            ,[National_Number] = ?
            ,[address] = ?
            ,[Phone] = ?
            ,[Email] = ?
            ,[Department_Id] = ?
            ,[Year_Of_Reg] = ?
            ,[Degree_Id] = ?
            ,[Baccalaurate_Rate] = ?
            ,[pwd] = ?
          WHERE [Student_Id] = ? ";
    
    $params = array($_POST['first'],$_POST['last'],$_POST['fatN'],$_POST['mom'],$_POST['gen'],$_POST['natNum'],$_POST['addrStd'],$_POST['phone'],$_POST['email'],$_POST['depid'],$_POST['yearReg'],$_POST['degid'],$_POST['bacRate'],$_POST['pass'],$_GET['student_id']);
     
            
            $result = sqlsrv_query($conn,$query1,$params);
           if($result == false){
               die(print_r(sqlsrv_errors(),true));
           }
        }

        else if($_GET['val'] == 'deleteRow'){
            $query1 ="DELETE FROM [dbo].[Student]
          WHERE Student_Id = ?";
          $params = array($_GET['id']);
        $result = sqlsrv_query($conn,$query1,$params);
        }else if($_GET['val'] == 'addstd'){
            $query2 = 'INSERT INTO [dbo].[Student]
            ([Student_Id]
           ,[First_Name]
           ,[Last_Name]
           ,[Father_Name]
           ,[Mother_Name]
           ,[Birthday]
           ,[Gender]
           ,[National_Number]
           ,[address]
           ,[Phone]
           ,[Email]
           ,[Department_Id]
           ,[Year_Of_Reg]
           ,[Degree_Id]
           ,[Baccalaurate_Rate]
           ,[pwd])
         VALUES
               (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $params = array($_POST['id'],$_POST['first'],$_POST['last'],$_POST['fatN'],$_POST['mom'],$_POST['birthday'],$_POST['gen'],$_POST['natNum'],$_POST['addrStd'],$_POST['phone'],$_POST['email'],$_POST['depid'],$_POST['yearReg'],$_POST['degid'],$_POST['bacRate'],$_POST['pass']);
        $result = sqlsrv_query($conn,$query2,$params);
        if($result == false){
            die(print_r(sqlsrv_errors(),true));
        }
        }else if($_GET['val'] == 'showMore'){
            
            $student_id = $_GET['id'];
            $query ="SELECT * FROM Student Where Student_Id = ".$student_id."";
            $result = sqlsrv_query($conn, $query);
        
            $row=sqlsrv_fetch_array($result);
            ?>
            <i class="fa fa-close close-more"></i>
        <div class="more-filed">
            <h4>Gender</h4>
            <?php if( $row['Gender'] == 0){
                $gender= 'Male';
            }else{
                $gender= 'Female';
            }?>
            <p class="Moregender"><?= $gender?></p>
        </div>
        <div class="more-filed">
            <h4>Address</h4>
            <p class="addressMore"><?= $row['address']?></p>
        </div>
        <div class="more-filed">
            <h4>Phone</h4>
            <p class="phoneMore"><?= $row['Phone'] ?></p>
        </div>
        <div class="more-filed">
            <h4>Email</h4>
            <p class="emailMore"><?= $row['Email'] ?></p>
        </div>
        <div class="more-filed">
            <h4>Year of Reg</h4>
            <p class="yearRegMore"><?= $row['Year_Of_Reg'] ?></p>
        </div>
        <div class="more-filed">
            <h4>Baccalaurate Rate</h4>
            <p class="bacRateMore"><?= $row['Baccalaurate_Rate'] ?></p>
        </div>
        <div class="more-filed">
            <h4>Password</h4>
            <p class="passMore"><?= $row['pwd'] ?></p>
        </div>
            <?php
        }