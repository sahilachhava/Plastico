<?php
session_start();
echo "<style>
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}";
if(isset($_POST['user']) && $_POST['user'] != NULL){
	echo "
		#otpVerify{display : '';}
		#phoneVerify{display : none;}
		</style>";
}else{
	echo "
		#otpVerify{display : none;}
		#phoneVerify{display : ''}
		</style>";
}
$error = "";
$btn_text="Send OTP";
include('dbconnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
		$phone = $_POST['user'];
		$verify = 0;$otp = 0;
		if(isset($_POST['otp'])){
			$verify = $_POST['otp'];
		}
	$sql = "select * from admin_details WHERE `admin_phone`='$phone'";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($result)>0)
	{
		if(!isset($_POST['otp'])){
			$otp = forgotPassword($phone);
			$_SESSION['otp'] = $otp;
			if($otp != 0){
			$error = "OTP Sent Successfully";
			$btn_text = "Submit OTP";
			}
		}
		if(isset($_POST['otp'])){
			$otp = $_SESSION['otp'];
			if($otp== $verify){
				$error = "OTP Matched";
				header("Location: newpass.php?id_phone=".$phone);
			}else{
				$error = "OTP Not Matched ";
				$btn_text = "Submit OTP";
			}
		}
	}	
	else
	{
		$sql = "select * from subadmin_details WHERE `subadmin_phone`='$phone'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				extract($row);
				if($phone == $subadmin_phone && $subadmin_active == 1)
				{
					if(!isset($_POST['otp'])){
						$otp = forgotPassword($phone);
						$_SESSION['otp'] = $otp;
						if($otp != 0){
							$error = "OTP Sent Successfully";
							$btn_text = "Submit OTP";
						}
					}
					if(isset($_POST['otp'])){
						$otp = $_SESSION['otp'];
						if($otp == $verify){
							$error = "OTP Matched";
							echo "<script>window.location.href='newpass.php?id_phone=".$phone."';</script>";
							//header("Location: newpass.php?id_phone=".$phone);
						}else{
							$error = "OTP Not Matched ";
							$btn_text = "Submit OTP";
						}
					}
				}
				else
				{
					$error = $subadmin_name.", You are blocked";
				}
			}
		}
	}
	if($error == ""){
		$error = "Phone Number Not found..!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php") ?>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/login/images/img-01.png" alt="IMG">
				</div>
				
				<!-- first form for number verification -->
				<form class="login100-form validate-form" id="phoneVerify" action="<?php $_PHP_SELF; ?>" method="post">
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $error; ?></b><br><br>

					<div class="wrap-input100" data-validate = "Email required">
						<input class="input100" type="email" name="user" placeholder="Email Address" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="save">
							<?php echo $btn_text; ?>
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Back to
						</span>
						<a class="txt2" href="index.php">
							Login ?
						</a>
					</div>
				</form>

				<!-- second form for otp verification -->
				<form class="login100-form"  id="otpVerify" action="<?php $_PHP_SELF; ?>" method="post">
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $error; ?></b><br><br>

					<div class="wrap-input100" data-validate = "OTP required">
						<input class="input100" type="password" name="otp" placeholder="Enter OTP" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>
					</div>
					<input type="hidden" name="user" value="<?php echo $phone; ?>" />

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="save">
							<?php echo $btn_text; ?>
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Back to
						</span>
						<a class="txt2" href="index.php">
							Login ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include("scripts.php"); ?>
</body>
</html>
<?php
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