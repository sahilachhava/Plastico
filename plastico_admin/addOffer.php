<?php
session_start();
include("../dbconnect.php");
if(!isset($_SESSION["user_id"]))
{
	header("Location: ../index.php");
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
																																				<h4 class="page-title">Add New Offer</h4>
																																				</div>
																																</div>
																									</div>
																										<!-- end page title -->
																												<!-- dashboard content -->
																											<div class="row">
																																<div class="col-12">
																																				<div class="card m-b-30">
																																								<div class="card-body">
																				<h4 class="mt-0 header-title">Fill out the form</h4><br>			
				<form action="<?php $_PHP_SELF ?>" method="post">
				
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Offer Start</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="start" placeholder="Offer Start Date" value="" data-mask="**/**/****" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Offer End</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="end" placeholder="Offer End Date" value="" data-mask="**/**/****" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Offer Code</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="code" placeholder="Offer Code" value="" id="example-text-input" required>
					</div>
				</div>
				
				<div class="form-group row">
					<label for="example-text-input" class="col-sm-2 col-form-label">Offer Discount (in %)</label>
					<div class="col-sm-10">
						<input class="form-control" type="text" name="dis" placeholder="Offer Discount (in %)" value="" id="example-text-input" required>
					</div>
				</div>
				
				<div class="form-group">
						<label for="example-time-input" class="col-sm-2 col-form-label" ></label>
																																																				<div class="col-sm-10">
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																																																								<button type="submit" class="btn btn-primary waves-effect waves-light">Add Offer</button>
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
	if(isset($_POST['code']))
	{
		include("../dbconnect.php");
		$cat = $_POST['code'];
		$p = "";
		$sql2 = "select * from offerdetails";
		$result2 = mysqli_query($conn,$sql2);
		while($row=mysqli_fetch_array($result2))
		{
			extract($row);
			$p = $offerCode;
			
			if($cat==$p)
			{
				$error = "<script>
				    swal(
											'Duplicate Entry',
											'Offer Code is already inserted',
											'warning'
										    ).then(function () {
										window.location.href='offerDetails.php';
				    });
				</script>";
				exit($error);
			}
		}
		$start = $_POST['start'];
		$end = $_POST['end'];
		$dis = $_POST['dis'];
		$sql = "insert into offerdetails(offerStartDT,offerEndDT,offerCode,offerDiscount) values('$start','$end','$cat','$dis')";
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		echo "<script type='text/javascript'>window.location.href = 'offerDetails.php';</script>";
	}
?>