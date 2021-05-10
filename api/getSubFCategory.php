<?php
include("../dbconnect.php");

$category = array();
$sql = "select * from subcategoryfirst where categoryId=".$_POST['cid'];
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{
    array_push($category,$row);
}
echo json_encode($category);
?>