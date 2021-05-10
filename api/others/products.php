<?php

include("../dbconnect.php");

$products = array();
$sql = "select * from product_details";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{
    $directory = "../dress_images/".$row[1]."/";
    $filecount = 0;
    $files = glob($directory . "*");
    if ($files){
     $filecount = count($files);
    }
    $arr = array("product_id" => $row[0],"design_no" => $row[1],"product_images" => $row[2],"l_qty" => $row[3],"xl_qty" => $row[4],"xxl_qty" => $row[5],"category" => $row[6],"total_piece" => $row[7],"total_amount" => $row[8],"img" => $filecount);
    array_push($products,$arr);
}
echo json_encode($products);
?>