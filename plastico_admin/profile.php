<?php
session_start();
include("../dbconnect.php");
if(!isset($_SESSION["user_id"]))
{
	header("Location: ../index.php");
}
$n = $e = "";
$sql1 = "select * from admindetails where adminId=".$_SESSION['user_id']; 
$result1 = mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result1))
{
	extract($row);
	$n = $adminName;
	$e = $adminEmail;
}
?>
<!DOCTYPE html>
<html>
<?php include("../header.php"); ?>

    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader"><div id="status"><div class="spinner"></div></div></div>

        <!-- Begin page -->
        <div id="wrapper">
            <?php include("sidemenu.php") ?>
            <!-- Start right Content here -->
            <div class="content-page">
                <div class="content">
                   <?php include("topmenu.php") ?>
                    <div class="page-content-wrapper ">
                        <div class="container-fluid">
                            <!-- page title start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">My Profile</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                            <!-- dashboard content -->
			  <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
            
                                            <h4 class="mt-0 header-title">Fill out the form</h4>
					<br>			
					<form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
					<!--<div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Picture</label>
                                                <div class="col-sm-10">
                                                  <input   type="file" name="photo" class="dropify" data-default-file="assets/images/users/profile<?php echo $_SESSION['user_id'];?>.jpg" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png"/>
                                                </div>
                                            </div>-->
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="name" placeholder="Full Name" value="<?php echo $n; ?>" id="example-text-input" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Email Address</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="email" name="mail" placeholder="New Email Address" value="<?php echo $e; ?>" id="example-text-input" required>
                                                </div>
                                            </div>
					<div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="password" name="pass" placeholder="Enter New Password (Ignore, If you don't want to change your password)" value="" id="example-text-input">
                                                </div>
                                            </div>
					<div class="form-group">
					 <label for="example-time-input" class="col-sm-2 col-form-label" ></label>
                                                    <div class="col-sm-10">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">Reset Form</button>
                                                    </div>
                                                </div>
						</form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
			   
                            <!-- dashboard content end-->
                <?php include("../footer.php") ?>
            </div>
            <!-- End main content here -->
        </div>
        <!-- END wrapper -->
        <?php include("../scripts.php") ?>
    </body>
</html>
<?php
	if(isset($_POST['mail']))
	{
		include("../dbconnect.php");
		//$name = $_POST['name'];
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
			
		//$pic = $_FILES['photo']['name'];
		//$pro = "profile".$_SESSION['user_id'].".jpg";
		//move_uploaded_file($_FILES['photo']['tmp_name'],"assets/images/users/".$pro);
		
		if($pass=="")
		{
			$sql = "update admindetails set adminEmail = '$mail' where adminId=".$_SESSION['user_id']; 
			$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			echo "<script type='text/javascript'>window.location.href='index.php'</script>";
		}
		else
		{
			$sql = "update admindetails set adminEmail =  '$mail' , adminPass = '$pass' where adminId=".$_SESSION['user_id']; 
			$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
			echo "<script type='text/javascript'>window.location.href='index.php'</script>";
		}
	}
?>