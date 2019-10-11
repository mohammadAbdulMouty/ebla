<?php
include 'includes/dbh.inc.php';
session_start();
if($_GET['val'] == 'changeEmail'){
$email = $_GET['em'];

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
}else{
    
    $query1 ="UPDATE [dbo].[Student]
    set
    [Email] = ?
 WHERE [Student_Id] = ?";

$params = array($email,$_SESSION['id']);

   
   $result = sqlsrv_query($conn,$query1,$params);
   
  if($result == false){
      die(print_r(sqlsrv_errors($result),true));
  }else{
      $_SESSION['e-mail'] = $email;
      echo $email;
  }
}

}else if($_GET['val'] == 'changePhone'){
    $phone = $_GET['ph'];
    if(!filter_var($phone, FILTER_VALIDATE_FLOAT)){
        echo 'Invalid phone format';
    }else{
        
        $query1 ="UPDATE [dbo].[Student]
            set
            [Phone] = ?
        WHERE [Student_Id] = ?";

        $params = array($phone,$_SESSION['id']);

   
    $result = sqlsrv_query($conn,$query1,$params);
   
        if($result == false){
                die(print_r(sqlsrv_errors($result),true));
            }else{
            $_SESSION['phone'] = $phone;
            echo $phone;
  }
    }
    
}else if($_GET['val'] == 'changepass'){
$oldpass = $_POST['old'];
$newpass = $_POST['new'];
$confirm = $_POST['confirm'];
if($oldpass != $_SESSION['pass']){
    echo 'the old password is not correct';
}else if($newpass =='' || $confirm == ''){
    
    echo 'please insert the password';
    
}else if($newpass != $confirm){
    echo 'the new password not same';
}else{
    $query1 ="UPDATE [dbo].[Student]
            set
            [pwd] = ?
        WHERE [Student_Id] = ?";

        $params = array($newpass,$_SESSION['id']);

   
    $result = sqlsrv_query($conn,$query1,$params);
    $_SESSION['pass']=$newpass;
}

}

?>