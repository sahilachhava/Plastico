 <!-- jQuery  -->
	<script>
	function logout(){
		<?php
			$sql1 = "update subadmin_details set `subadmin_isonline`=0 where `subadmin_id`=".$_SESSION["user_id"];
			mysqli_query($conn,$sql1);
		?>
		window.location.href="../logout.php";
	}
	</script>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/modernizr.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../assets/plugins/alertify/js/alertify.js"></script>
        <script src="../assets/pages/alertify-init.js"></script>
        <!-- Required datatable js -->
         <script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
         <script src="../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
         <!-- Buttons examples -->
         <script src="../assets/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="../assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
         <script src="../assets/plugins/datatables/jszip.min.js"></script>
         <script src="../assets/plugins/datatables/pdfmake.min.js"></script>
         <script src="../assets/plugins/datatables/vfs_fonts.js"></script>
         <script src="../assets/plugins/datatables/buttons.html5.min.js"></script>
         <script src="../assets/plugins/datatables/buttons.print.min.js"></script>
       <script src="../assets/plugins/datatables/buttons.colVis.min.js"></script>
         <!-- Datatable init js -->
         <script src="../assets/pages/datatables.init.js"></script>
         <!-- Sweet-Alert  -->
         <script src="../assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
         <script src="../assets/pages/sweet-alert.init.js"></script> 
         <!-- Bootstrap inputmask js -->
        <script src="../assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="../assets/plugins/skycons/skycons.min.js"></script>
        <script src="../assets/plugins/raphael/raphael-min.js"></script>
        <script src="../assets/plugins/morris/morris.min.js"></script>
        
        <script src="../assets/pages/dashborad.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.js"></script>

        <!-- login scripts-->
        <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
        <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/login/vendor/select2/select2.min.js"></script>
        <script src="assets/login/vendor/tilt/tilt.jquery.min.js"></script>
        <script >
                $('.js-tilt').tilt({
                        scale: 1.1
                })
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-23581568-13');
        </script>
        <script src="../assets/login/js/main.js"></script>
        <script>
             /* BEGIN SVG WEATHER ICON */
             if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
                {"color": "#fff"},
                {"resizeClear": true}
                ),
                    list  = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;

                for(i = list.length; i--; )
                icons.set(list[i], list[i]);
                icons.play();
            };

        // scroll

        $(document).ready(function() {
        
        $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
        $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 
        
        });
        </script>
        <!-- end login scripts -->