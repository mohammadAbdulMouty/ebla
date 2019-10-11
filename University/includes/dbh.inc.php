<?php
$serverName = "localhost"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"Uni_Try_2","CharacterSet"=>"UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

//if( $conn ) {
//     echo "Connection established.<br />";
     
//}else{
   //  echo "Connection could not be established.<br />";
   //  die( print_r( sqlsrv_errors(), true));
//}
?>