<?php
echo 'hi';
include '../includes/dbh.inc.php';
$query='';
$data=array();
$records_per_page= 10;
$start_from= 0;
$current_page_number= 0;

if(isset($_POST["rowCount"]))
{
    $records_per_page= $_POST["rowCount"];
}
else
{
    $records_per_page= 10;
}

if(isset($_POST["current"]))
{
    $records_per_page= $_POST["current"];
}

else
{
    $records_per_page= 1;
}

$star_from= ($current_page_number - 1)* $records_per_page;

$query = "SELECT * FROM Employee";

if(!empty($_POST["searchPhrase"]))
{
    $query = 'where (Id like "%'.$_POST["searchPhrase"].'%")';
    $query = 'or First_Name like "%'.$_POST["searchPhrase"].'%" ';
    $query = 'or Last_Name like "%'.$_POST["searchPhrase"].'%" ';
    $query = 'or username like "%'.$_POST["searchPhrase"].'%" ';
    
}

$order_by = '';

if(isset($_POST["sort"]) && is_array($_POST["sort"]))
{
    foreach($_POST["sort"] as $key =>$value )
    {
        $order_by = '$key $value,';
    }
}
else
{
    $query = 'order by Id Desc';
}

if($order_by != '')
{
    $query = ' order by ' . substr($order_by,0,-2);
}

if($records_per_page != -1)
{
    $query = "LIMIT" .$star_from. "," .$records_per_page;
}




$result = sqlsrv_query($conn, $query);

while($row=sqlsrv_fetch_array($result))
{
    $data[]=$row;
}

$query1 ="SELECT * FROM Employee";
$result1 = sqlsrv_query($conn, $query1);
$total_records=sqlsrv_has_rows($result1);

$output=array('current'    => intval($_POST["current"]),
              'rowCount'   => 10, 
              'total'      => intval($total_records), 
              'rows'       => $data );

echo json_encode($output);             


?>