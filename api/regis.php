<?php

include("../dbconnect.php");

$name = $_POST['name'];
$fname = $_POST['fname'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$fadd = $_POST['fadd'];
$pin = $_POST['pin'];
$type = $_POST['type'];

$sql1 = "select * from userdetails where userEmail=".$_POST['email'];
$result = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0){
    $arr = array("response" => "exists");
    echo json_encode($arr);
}else{
    
    $sql = "";
    if($type==1){
        $sql = "insert into userdetails(userName,userEmail,userPass,userPhone,userFirmAddress,userFirmPincode,userFirmName,isManufacturer) values('$name','$email','$pass','$phone','$fadd','$pin','$fname',1)";
    }else{
         $sql = "insert into userdetails(userName,userEmail,userPass,userPhone) values('$name','$email','$pass','$phone')";
    }
    
    $res = mysqli_query($conn,$sql);
    $arr = array("response" => "success");
    echo json_encode($arr);
}

?>