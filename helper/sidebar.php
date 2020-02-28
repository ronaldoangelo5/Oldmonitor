            <?php
                $lvl = $_SESSION['lvlmon'];
                $modul = $_GET['modul'];
            ?>

            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <!-- sidebar menu start-->
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li>
                                <a <?php if($modul=='') { echo 'class="active"'; }?> href="?modul=">
                                    <i class="fa fa-dashboard"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <?php if($lvl == 1){ ?>
                                <li>
                                    <a <?php if($modul=='dashboard') { echo 'class="active"'; }?> href="?modul=dashboard">
                                        <i class="fa fa-dashboard"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            <?php
                            }?>
                            
                            
                            
                            <!--
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-tasks"></i>
                                    <span>Project Progress</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="#">All Progress<span class="pull-right text-bold" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">90000</span></a></li>
                                    <li><a href="#">Project Activation <span class="pull-right text-bold" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">10</span></a></li>
                                    <li><a href="#">Project Initiations <span class="pull-right" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">100</span></a></li>
                                    <li><a href="#">Project Order <span class="pull-right" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">1000</span></a></li>
                                    <li><a href="#">Network Integration <span class="pull-right" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">10000</span></a></li>
                                    <li><a href="#">Test Com <span class="pull-right" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">10</span></a></li>
                                    <li><a href="#">Completed <span class="pull-right" style="margin-right:20px;color:#1fb5ad;font-weight:bold;">10</span></a></li>
                                </ul>
                            </li>
                            -->
                            
                            <!--
                            <li>
                                <a <?php if($modul=='filtering_log') { echo 'class="active"'; }?> href="?modul=filtering_log">
                                    <i class=" fa fa-table"></i>
                                    <span>Filtering Log</span>
                                </a>
                            </li>
                            -->
                            
                            <li>
                                <a <?php if($modul=='data') { echo 'class="active"'; }?> href="?modul=data">
                                    <i class=" fa fa-table"></i>
                                    <span>All PA Progress</span>
                                </a>
                            </li>

                            <?php if($lvl == 1){ ?>
                            <li>
                                <a <?php if($modul=='data_mks') { echo 'class="active"'; }?> href="?modul=data_mks">
                                    <i class=" fa fa-table"></i>
                                    <span>Mks PA Progress</span>
                                </a>
                            </li>

                            <!--
                            <li>
                                <a <?php if($modul=='cutoff') { echo 'class="active"'; }?> href="?modul=cutoff">
                                    <i class=" fa fa-table"></i>
                                    <span>CutOff PA</span>
                                </a>
                            </li>
                            -->

                            

                            <li>
                                <a <?php if($modul=='ptl_progress') { echo 'class="active"'; }?> href="?modul=ptl_progress">
                                    <i class=" fa fa-table"></i>
                                    <span>PTL Progress</span>
                                </a>
                            </li>
                        
                            <!--
                            <li>
                                <a <?php if($modul=='vendor_resume') { echo 'class="active"'; }?> href="?modul=vendor_resume">
                                    <i class=" fa fa-table"></i>
                                    <span>Vendor Resume</span>
                                </a>
                            </li>

                            <li>
                                <a <?php if($modul=='so_resume') { echo 'class="active"'; }?> href="?modul=so_resume">
                                    <i class=" fa fa-table"></i>
                                    <span>SO Resume</span>
                                </a>
                            </li>
                            -->
                            <?php }?>

                            <li>
                                <a <?php if($modul=='vendor_progress') { echo 'class="active"'; }?> href="?modul=vendor_progress">
                                    <i class=" fa fa-table"></i>
                                    <span>Vendor Progress</span>
                                </a>
                            </li>
                            
                            <?php if($lvl == 2){ ?>
                            <li>
                                <a <?php if($modul=='log_user') { echo 'class="active"'; }?> href="?modul=log_user">
                                    <i class=" fa fa-sitemap"></i>
                                    <span>Log</span>
                                </a>
                            </li>
                            <?php }?>

                            <li>
                                <a <?php if($modul=='ppi') { echo 'class="active"'; }?> href="?modul=ppi">
                                    <i class=" fa fa-envelope-o"></i>
                                    <span>PPI</span>
                                </a>
                            </li>

                            <?php if($lvl == 1){ ?>
                            <li>
                                <a href="#">
                                    <b><span>Master</span></b>
                                </a>
                            </li>
                            <li>
                                <a <?php if($modul=='kategori_kendala') { echo 'class="active"'; }?> href="?modul=kategori_kendala">
                                    <i class=" fa fa-sitemap"></i>
                                    <span>Kendala</span>
                                </a>
                            </li>
                            <li>
                                <a <?php if($modul=='vendor') { echo 'class="active"'; }?> href="?modul=vendor">
                                    <i class=" fa fa-users"></i>
                                    <span>Vendor</span>
                                </a>
                            </li>
                            <?php }?>

                            <li>
                                <a <?php if($modul=='subprogress&view=51'){ echo 'class="active"';}?> href="?modul=subprogress&view=51">
                                    <i class="fa fa-users"></i>
                                    <span>Closed SO</span>
                                </a>
                            </li>

                            
                            <!--
                            <li>
                                <a <?php if($modul=='vendor_progress') { echo 'class="active"'; }?> href="?modul=vendor_progress">
                                    <i class=" fa fa-link"></i>
                                    <span>Vendor Progress</span>
                                </a>
                            </li>
                            -->
         
                            <?php if($lvl == 1){ ?>
                                <li>
                                    <a <?php if($modul=='user') { echo 'class="active"'; }?> href="?modul=user">
                                        <i class=" fa fa-user"></i>
                                        <span>User</span>
                                    </a>
                                </li>
                            <?php }?>
                            
                            
                            
                        </ul>            
                    </div>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->