<?php

session_start();

if(isset($_POST['submit'])){
	include 'dbh.inc.php';
	$usern = $_POST['uid'];
	$pass = $_POST['pass'];
	$uni = $_POST['Uni'];
	//   if(!empty($_POST['sysuser'])){
	// 	   $sysu=$_POST['sysuser'];
	// 	   $_SESSION['sysuser']='uu';
	// }
	//   elseif(!empty($_POST['student'])){
	// 	   $std=$_POST['student'];
	// 	   $_SESSION['student']='ss';
    // }
	
	//error habdlers
	//check for empty fields
	if(empty($usern)||empty($pass)||empty($uni)){
		header("location: ../index.php?login=empty");
		exit();
	}
	if($_POST['Uni']=='sysuser'){
		$sql = "SELECT * FROM Employee WHERE username='$usern' AND pwd='$pass'";
		$result = sqlsrv_query($conn, $sql);
		$resultCheck = sqlsrv_has_rows($result);
		if($resultCheck < 1) {
				header("location: ../index.php?login=Erorr in username or password");
		        exit();
		}
		else{
			if($row = sqlsrv_fetch_array($result)) {
				$_SESSION['id'] = $row['Id'];
				$_SESSION['First'] = $row['First_Name'];
				$_SESSION['last'] = $row['Last_Name'];
				$_SESSION['Birth'] = $row['Birthday'];
				$_SESSION['Premi'] = $row['Premission'];
				$_SESSION['Adr'] = $row['Address'];
				$_SESSION['user'] = $row['username'];
				$_SESSION['pass'] = $row['pwd'];
				
				header("location: ../Emp.php");
			   exit();
		}

	}
		
} 
	elseif($_POST['Uni']=='student'){
		$sql = "SELECT * FROM Student WHERE Student_Id='$usern' AND pwd='$pass'";
		$result = sqlsrv_query($conn, $sql);
		$resultCheck = sqlsrv_has_rows($result);
		if($resultCheck < 1) {
				header("location: ../index.php?login=Erorr in username or password");
		        exit();
		}
		else{
			if($row = sqlsrv_fetch_array($result)) {
				$_SESSION['id'] = $row['Student_Id'];
				$_SESSION['First'] = $row['First_Name'];
				$_SESSION['last'] = $row['Last_Name'];
				$_SESSION['father'] = $row['Father_Name'];
				$_SESSION['mother'] = $row['Mother_Name'];
				$_SESSION['Birth'] = $row['Birthday'];
				$_SESSION['gnd'] = $row['Gender'];
				$_SESSION['n_num'] = $row['National_Number'];
				$_SESSION['Adr'] = $row['address'];
				$_SESSION['phone'] = $row['Phone'];
				$_SESSION['e-mail'] = $row['Email'];
				$_SESSION['dept_id'] = $row['Department_Id'];
			    $_SESSION['yor'] = $row['Year_Of_Reg'];
				$_SESSION['Degree'] = $row['Degree_Id'];
				$_SESSION['baca_rate'] = $row['Baccalaurate_Rate'];
				$_SESSION['pass'] = $row['pwd'];
				header("location: ../Stduser.php");
			   exit();
		}

	}
		
} 
   
}
?>