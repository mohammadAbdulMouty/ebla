<?php
include 'includes/dbh.inc.php';
if($_GET['val'] == 'showEdit'){
    $id = $_GET['id'];
    $query ="SELECT * FROM Employee Where Id =".$id."";
    $result = sqlsrv_query($conn, $query);
    $total_records=sqlsrv_has_rows($result);

    while($row=sqlsrv_fetch_array($result))
        {?>
            <i class="fa fa-close close-overlay-edit"></i>
            <h2 class="page-header page-edit-header" data-id="<?= $id ?>">Edit Employee</h2>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-group"><label>First Name</label><input type="text" class="form-control FName" value="<?=$row['First_Name'] ?>" name="FName"></div>
            </div>
            <div class="col-lg-6">
            <div class="form-group"> <label>Last Name</label><input type="text" class="form-control LName" value="<?=$row['Last_Name'] ?>" name="LName"></div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-group"> <label>Birthday</label><input type="date"  class="form-control Birth"  value="" name="Birth"></div>
            </div> 
            <div class="col-lg-6">
            <div class="form-group"> <label>Premission</label>
            <?php 
                if($row['Premission'] == 0){
                    $admin = 'selected';
                    $emp = '';
                }else{
                    $admin = '';
                    $emp = 'selected';
                }
            ?>
            <select name="permistion" class="form-control Prem">
                <option value="0" <?=$admin?>>Admin</option>
                <option value ="1" <?=$emp?>>Employee</option>
            </select>
            
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
            <div class="form-group">  <label>Address</label><input type="text" class="form-control Address" value="<?=$row['Address'] ?>" name="Address"></div>
            </div> 
            <div class="col-lg-6">
            <div class="form-group">  <label>Username</label><input type="text" class="form-control Username" value="<?=$row['username'] ?>" name="Username"></div> 
            </div>
            </div>
            <div class="row">
                <div class="col-lg-6">

            <div class="form-group">  <label>Password</label><input type="text" class="form-control Password" value="<?=$row['pwd'] ?>" name="Password"> </div>
            </div>
            </div>   
            <div class="form-group"><div class="btn btn-success btn-block form-control btn-save-edit" >Save</div> 
            

        <?php
            
        }
    }else if($_GET['val'] == 'saveEdit'){
        $query1 ="UPDATE [dbo].[Employee]
        SET [First_Name] = ?
           ,[Last_Name] = ?
           ,[Premission] = ?
           ,[Address] = ?
           ,[username] = ?
           ,[pwd] = ?
      WHERE [Id] = ? ";

$params = array($_POST['first'],$_POST['last'],$_POST['Prem'],$_POST['Address'],$_POST['Username'],$_POST['pass'],$_GET['id']);
    var_dump($_POST['Prem']);
        
        $result = sqlsrv_query($conn,$query1,$params);
       
    }
    else if($_GET['val'] == 'deleteRow'){
        $query1 ="DELETE FROM [dbo].[Employee]
      WHERE Id = ?";
      $params = array($_GET['id']);
    $result = sqlsrv_query($conn,$query1,$params);
    }else if($_GET['val'] == 'addUser'){
        $query2 = 'INSERT INTO [dbo].[Employee]
           ([First_Name]
           ,[Last_Name]
           ,[Birthday]
           ,[Premission]
           ,[Address]
           ,[username]
           ,[pwd])
     VALUES
           (?,?,?,?,?,?,?)';
    $params = array($_POST['first'],$_POST['last'],$_POST['Birth'],$_POST['Prem'],$_POST['Address'],$_POST['Username'],$_POST['pass']);
$result = sqlsrv_query($conn,$query2,$params);
    }

   // ,[Birthday] = ".$_POST['Birth']."