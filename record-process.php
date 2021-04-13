<?php

session_start();

$name=$_GET["name"];
$degree=$_GET["degree"];
$city=$_GET["city"];


include_once("connection.php");



$query2="select * from userInfo";

$table=mysqli_query($dbcon,$query2);

$ary=array();

while($row=mysqli_fetch_array($table))
{
    $ary[]=$row;
}

echo json_encode($ary);




?>