<?php
//order history and cart remaining to return
include("../dbconnect.php");

if(!isset($_POST['token'])){
$user = $_POST['email'];
$pass = $_POST['pass'];

$sql = "select * from userdetails WHERE `userEmail`='$user' AND `userPass`='$pass'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				extract($row);
				
				if($user == $userEmail && $pass == $userPass)
				{
				    if($isActive == 1){
    				    $token = mt_rand(1000000,9999999);
    				    $token = checkToken($token);
    				    $sql2 = "insert into tokendetails values('$token','$userId')";
    				    $re = mysqli_query($conn,$sql2);
    				    $type = "user";
    				    if($isManufacturer==1){
    				        $type = "manufacturer";
    				    }
    				    $res = array("response" => "valid","uid" => $userId,"name" => $userName,"type" => $type,"token" => strval($token));
    				    echo json_encode($res);
				    }else{
				         $res = array("response" => "blocked");
    				     echo json_encode($res);
				    }
				}
			}
		}else{
			$res = array("response" => "invalid");
    	    echo json_encode($res);
		}
}else if(isset($_POST['token'])){
    $token = $_POST['token'];
    
    $sql = "select userId from tokendetails where token='".$token."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    
    $sql1 = "select * from userdetails WHERE `userId`='$row[0]'";
    $result = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
	if(mysqli_num_rows($result)>0)
	{
	    while($row=mysqli_fetch_array($result))
		{
			extract($row);
			$type = "user";
    		if($isManufacturer==1){
    		  $type = "manufacturer";
    		}
    		$res = array("response" => "valid","uid" => $userId,"name" => $userName,"type" => $type);
			echo json_encode($res);
		}
	}else{
		$res = array("response" => "invalid");
        echo json_encode($res);
	}
}

function checkToken($token)
{
    $sql1 = "select token from tokendetails where token=".$token;
    $result = mysqli_query($conn,$sql1);
	$row = mysqli_fetch_array($result);
	if(mysqli_num_rows($row)>0){
		$token = mt_rand(1000000,9999999);
		$token = checkToken($token);
		return $token;
	}else{
	    return $token;
	}
}

?>