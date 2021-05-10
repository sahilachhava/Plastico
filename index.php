<?php
session_start();
$msg = "";
if(isset($_GET['msg'])){
$msg = $_GET['msg'];
}
$error = "";
	include('dbconnect.php');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		
		$sql = "select * from AdminDetails WHERE `adminEmail`='$user' AND `adminPass`='$pass'";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				extract($row);
				
				if($user == $adminEmail && $pass == $adminPass)
				{
					$_SESSION["user_id"] = $adminId;
					header("location:plastico_admin/index.php");
				}
			}
		}
		if($error == ""){
			$error = "Invalid Username or Password..!";
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
				
				<form class="login100-form validate-form" action="<?php $_PHP_SELF; ?>" method="post">
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $msg.$error; ?></b><br><br>
					<div class="wrap-input100" data-validate = "Phone required">
						<input class="input100" type="email" name="user" placeholder="Email Address" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="forgot.php">
							Username / Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php include("scripts.php"); ?>
</body>
</html>
