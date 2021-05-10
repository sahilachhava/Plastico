<?php
function forgotPassword($mobile)
{
	$SMSUSER="Kvijay";
	$PASSWORD="ee2c04d2eaXX";
	$SENDERID="INFOSM";
	$OTP = mt_rand(1000000,9999999);

	$sms_content = "Welcome to MaalDe :\nReset your password using this OTP - ".$OTP."\n Please don't share this OTP";

	$sms_text = urlencode($sms_content);
		
	$api_url = 'http://mobicomm.dove-sms.com//submitsms.jsp?user='.$SMSUSER.'&key='.$PASSWORD.'&mobile=+91'.$mobile.'&message='.$sms_content.'&senderid='.$SENDERID.'&accusage=1';
		
	$response = file_get_contents($api_url);
	echo "OTP Sent Successfully";
}
forgotPassword(7777998337);
?>