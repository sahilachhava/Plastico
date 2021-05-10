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
                            
                            
                        <!-- online user section completed babe -->
                    </div>
                            <!-- dashboard content end-->
                <?php include("../footer.php") ?>
            </div>
            <!-- End main content here -->
        </div>
        <!-- END wrapper -->
        <?php include("../scripts.php") ?>
    </body>
</html>