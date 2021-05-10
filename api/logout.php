<?php
include("../dbconnect.php");

$token = $_POST['token'];

$sql = "delete from tokendetails where token=".$token;
$res = mysqli_query($conn,$sql);

$arr = array("response" => "success");
echo json_encode($arr);
?>