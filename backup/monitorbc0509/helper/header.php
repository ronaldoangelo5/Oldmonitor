            <!--header start-->
            <header class="header fixed-top clearfix">
                <!--logo start-->
                <div class="brand">

                    <!--
                    <a href="#" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    -->
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </div>
                <!--logo end-->

                
                <!--
                <div class="notify-row" id="top_menu">
                    <div class="col-lg-12">
                        <div class="row">
                            <form role="form" class="form-horizontal" action="action/export_to_excel.php" method="POST">
                                <div class="form-group">
                                    
                                    <div class="col-lg-6">
                                        <select id="uid" name="uid" class="form-control">
                                            <option value="">All PTL</option>
                                            <?php
                                                $sql3   = "SELECT * FROM m_user WHERE u_id <> 1";
                                                $query3 = mysqli_query($konek, $sql3);
                                                while($data3 = mysqli_fetch_array($query3)){ ?>
                                                    <option value="<?php echo $data3['u_id']; ?>"><?php echo $data3['u_name_crm']; ?></option>
                                                <?php
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-lg-6" style="margin-left:-20px">
                                        <button class="btn btn-primary" type="submit">Export</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                -->

                


                <div class="top-nav clearfix">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder=" Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="assets/images/avatar1_small.jpg">
                                <span class="username"><?php echo $_SESSION['unamemon']?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i> Change Password</a></li>
                                <li><a href="logout"><i class="fa fa-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                        
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->