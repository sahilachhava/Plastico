<?php
include("dbconnect.php");
if(!isset($_GET['id_phone'])){
	header("Location : index.php");
}
$phone = $_GET['id_phone'];
$msg = "";
if(isset($_GET['msg'])){
	$msg = "Password not matched";
}else{
	$msg = "Change your password";
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
				
				<form class="login100-form validate-form" action="<?php $_PHP_SELF; ?>" method="post">
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $msg; ?></b><br><br>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Enter Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirm your Password">
						<input class="input100" type="password" name="cpass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Change password
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include("scripts.php"); ?>
</body>
</html>
<?php
if(isset($_POST['cpass'])){
	$pass = $_POST['pass'];
	$cpass = $_POST['cpass'];
	if($pass == $cpass){
		$sql = "select * from admin_details where admin_phone=".$phone;
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($result)>0)
		{
			$sql1 = "update admin_details set admin_pass='$pass' where admin_phone=".$phone;
			$res = mysqli_query($conn,$sql1);
		}
		else
		{
			$sql2 = "update subadmin_details set subadmin_pass='$pass' where subadmin_phone=".$phone;
			$res = mysqli_query($conn,$sql2);
		}
		$msg = "Password Changed Successfully";
		echo "<script> window.location.href = 'index.php?msg=".$msg."'; </script>";
	}else{
		echo "<script> window.location.href = 'newpass.php?id_phone=".$phone."&msg=1'; </script>";
	}
}
?>
