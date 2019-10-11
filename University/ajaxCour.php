<?php
include 'includes/dbh.inc.php';
if($_GET['val'] == 'showEdit'){
    $course_id = $_GET['id'];
    
    $query ="SELECT * FROM Course Where Course_Id = ? ";
    $arrays = array($course_id);
    $result = sqlsrv_query($conn, $query,$arrays);
   
    $row=sqlsrv_fetch_array($result);
     ?>



<i class="fa fa-close close-overlay-edit-cuor"></i>
                <h2 class="page-header page-edit-headerstd" data-id="<?= $course_id ?>">Edit Course</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                            <div class="form-group"><label>Course ID</label><input type="text" class="form-control  " name="CId" value="<?= $row['Course_Id'] ?>"></div>
                                            <div class="form-group"> <label>Course Hours</label><input type="text"class="form-control Chours" name="Chou" value="<?= $row['Course_Hours'] ?>"></div> 
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group"> <label>Course Name</label><input type="text" class="form-control cname" name="Cname"  value="<?= $row['Course_Name'] ?>"></div>  
                                            <div class="form-group">  <label>Department</label><input type="text" class="form-control depid" name="dept" value="<?= $row['Department_Id'] ?>"></div> 
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
                                                                                if($row['Semester_Id'] == 0){
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
                                            <div class="form-group">  <label>Course Level</label><input type="text" class="form-control Clvl" name="CLvlS" value="<?= $row['Course_Level'] ?>"></div>  
                                        </div>
                                    </div>



                        
                        
                        <div class="form-group"><div class="btn btn-success btn-block btn-save-edit-cour">Save</div> 
            
            
<?php
         
        
    }else if($_GET['val'] == 'saveEditcour'){
        
            $query1 ="UPDATE [dbo].[Course] set
             [Course_Name] = ?
            ,[Course_Hours] = ?
            ,[Department_Id] = ?
            ,[General] = ?
            ,[Essential] = ?
            ,[Semester] = ?
            ,[Course_Level] = ?
          WHERE [Course_Id] = ? ";
    
    $params = array($_POST['Cname'],$_POST['Chours'],$_POST['depid'],$_POST['gen'],$_POST['Ess'],$_POST['Semes'],$_POST['Clvl'],$_GET['course_id']);
     
            
            $result = sqlsrv_query($conn,$query1,$params);
           if($result == false){
               die(print_r(sqlsrv_errors($result),true));
           }
        }
        else if($_GET['val'] == 'deleteRow'){
            echo 'hi'.$_GET['id'];
            $query1 ="DELETE FROM [dbo].[Course]
          WHERE Course_Id = ?";


$params = array($_GET['id']);
$result = sqlsrv_query($conn,$query1,$params);
if($result == false){
    die(print_r(sqlsrv_errors($result),true));
}

}

else if($_GET['val'] == 'addcour'){
    $query2 = 'INSERT INTO [dbo].[Course]
    ([Course_Id]
    ,[Course_Name]
    ,[Course_Hours]
    ,[Department_Id]
    ,[General]
    ,[Essential]
    ,[Semester]
    ,[Course_Level])
    VALUES
               (?,?,?,?,?,?,?,?)';
                $params = array($_POST['id'],$_POST['Cname'],$_POST['Chours'],$_POST['depid'],$_POST['gen'],$_POST['Ess'],$_POST['Semes'],$_POST['Clvl']);
                $result = sqlsrv_query($conn,$query2,$params);
                if($result == false){
                    die(print_r(sqlsrv_errors(),true));
                }}