<?php

include("../dbconnect.php");

$pname = $_POST['pname'];
$pdes = $_POST['pdes'];
$pprice = $_POST['pprice'];
$pqty = $_POST['pqty'];
$pcat = $_POST['pcat'];
$pbrand = $_POST['pbrand'];
$user = $_POST['user'];


if(isset($_POST['pname']))
{
    $sql = "insert into productdetails(productName,productDesc,productPrice,productQty,subCategorySecondId,brandId,userId) values('$pname','$pdes','$pprice','$pqty','$pcat','$pbrand','$user')";
    mysqli_query($conn,$sql);
    $res = array("response" => "success");
    echo json_encode($res);
}


?>