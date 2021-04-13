<?php

session_start();

$name=$_GET["name"];
$degree=$_GET["degree"];
$city=$_GET["city"];


include_once("connection.php");


$query="insert into userInfo values('$name','$degree','$city')";

mysqli_query($dbcon,$query);


$msg=mysqli_error($dbcon);

//select * from sugarrecords where uid='$uid' and dateofrecord>='$fromdate' and dateofrecord<='$todate'

//
//if($msg=="")
//{
//    echo "Signed Up Successfully";
//}
//    
//else
//    echo "Fill your data properly.";
?>