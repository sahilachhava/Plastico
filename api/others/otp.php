<?php
include("../dbconnect.php");

$phone = $_GET['phone'];

if(!isset($_GET['otp']) && isset($_GET['phone']))
{
    $sql = "select * from customer_details where customer_phone=".$phone;
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0)
    {
        $row = mysqli_fetch_array($res);
        $otp = forgotPassword($phone);
        $sql1 = "insert into otp_details values('$otp','$phone')";
        mysqli_query($conn,$sql1);
        $arr = array("response" => "success", "otp" => $otp );
        echo json_encode($arr);
    }
    else
    {
        $arr = array("response" => "invalid");
        echo json_encode($arr);
    }
}

if(isset($_GET['otp']) && isset($_GET['password']))
{
    $getotp = $_GET['otp'];
    $pass = $_GET['password'];
    $sql1 = "select * from otp_details where otp=".$getotp;
    $result = mysqli_query($conn,$sql1);
    $row = mysqli_fetch_array($result);
    if($getotp == $row[0])
    {
        $sql3 = "update customer_details set customer_pass = '$pass' where customer_phone=".$row[1];
        mysqli_query($conn,$sql3);
        $arr = array("response" => "success");
        echo json_encode($arr);
        $sql2 = "delete from otp_details where otp=".$getotp;
        $result = mysqli_query($conn,$sql2);
    }
    else
    {
        $arr = array("response" => "invalid");
        echo json_encode($arr);
    }
}

function forgotPassword($mobile)
{
	$SMSUSER="Kvijay";
	$PASSWORD="ee2c04d2eaXX";
	$SENDERID="INFOSM";
	$OTP = mt_rand(1000000,9999999);

	$sms_content = "Welcome to MaalDe :\nReset your password using this OTP - ".$OTP."\n Please don't share this OTP";

	$sms_text = urlencode($sms_content);
	
	$api_url = 'http://mobicomm.dove-sms.com//submitsms.jsp?user='.$SMSUSER.'&key='.$PASSWORD.'&mobile=+91'.$mobile.'&message='.$sms_text.'&senderid='.$SENDERID.'&accusage=1';
	//$api_url = 'http://mobicomm.dove-sms.com//submitsms.jsp?user='.$SMSUSER.'&key='.$PASSWORD.'&mobile=+91'.$mobile.'&message='.$sms_content.'&senderid='.$SENDERID.'&accusage=1';
		
	$response = file_get_contents($api_url);
	return $OTP;
}

?>