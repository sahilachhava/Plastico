 <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                                
                                <li class="list-inline-item dropdown notification-list">
                                    <!--<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <i class="ti-bell noti-icon"></i>
                                        <span class="badge badge-success noti-icon-badge">
                                            <?php
                                                $sql = "select count(*) from notification where n_status=0";
                                                $res = mysqli_query($conn,$sql);
                                                $row = mysqli_fetch_array($res);
                                                echo $row[0];
                                            ?>
                                        </span>
                                    </a>-->
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-danger float-right"></span>Notifications</h5>
                                        </div>
                                        <?php
                                            $sql = "select * from notification where n_status=0";
                                            $res = mysqli_query($conn,$sql);
                                            if(mysqli_num_rows($res)>0)
                                            {
                                                while($row = mysqli_fetch_array($res))
                                                {
                                                    extract($row);
                                                    echo '<a href="items.php?nid='.$n_id.'&oid='.$order_id.'" class="dropdown-item notify-item">
                                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                                            <p class="notify-details"><b>New order is placed</b><small class="text-muted">Order ID: '.$order_id.', Customer: '.$customer_name.', Order Total: Rs. '.$order_total.' /- </small></p>
                                                        </a>';
                                                }
                                            }
                                            else
                                            {
                                                 echo '<br><center><p class="notify-details"><b>No new Orders</b></p></center>';    
                                            }
                                        
                                        ?>
                                        <!-- item
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>New order is placed</b><small class="text-muted">Order ID: 1, Customer: Vishal Narvani, Order Total: Rs. 5500/- </small></p>
                                        </a>-->

                                        <!-- item
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                                        </a>

                                       
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                                        </a>-->

                                        <!-- All-->
                                        <a href="allorders.php" class="dropdown-item notify-item">
                                            <center><b><u>View All Orders</u></b></center>
                                        </a>

                                    </div>
                                </li>
                              
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                        <img src="../assets/images/users/avatar-2.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                        	<?php 
                                    		$sql = "select adminName from admindetails where adminId=".$_SESSION["user_id"];
                                    		$res = mysqli_query($conn,$sql);
                                    		$row = mysqli_fetch_array($res);
                                    	?>
                                            <h5>Hola, <?php echo $row[0]; ?></h5>
                                        </div>
                                        <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->