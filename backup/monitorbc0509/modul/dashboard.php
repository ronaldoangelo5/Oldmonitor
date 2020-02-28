
    <?php
        
        if(isset($_POST['from']) AND $_POST['from'] != ""){
            $f_arr  = explode("/", $_POST['from']);
            $f_day  = $f_arr[0];
            $f_mont = $f_arr[1];
            $f_year = $f_arr[2];
            $n_from = "$f_year-$f_mont-$f_day";
            
            $clock  = '00:00:00';
            $from   = date('d M, Y', strtotime($n_from));
            $from2  = $n_from." ".$clock;
        }
        
        else{
            //$n_from = date('Y-m-d');
            //$clock  = '00:00:00';
            //$from   = date('d M, Y', strtotime($n_from));
            $from   = "";
            $from2  = "";
        }
        


        if(isset($_POST['to']) AND $_POST['to'] != ""){
            $t_arr  = explode("/", $_POST['to']);
            $t_day  = $t_arr[0];
            $t_mont = $t_arr[1];
            $t_year = $t_arr[2];
            $n_to   = "$t_year-$t_mont-$t_day";

            $clock2 = '23:59:59';
            $to     = date('d M, Y', strtotime($n_to));
            $to2    = $n_to." ".$clock2;
        }
        
        else{
            $to    = "";
            $to2   = "";

        }


        if($from2 != "" && $to2 != ""){
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id
                        WHERE a.c_dispo_date >= '$from2'
                        AND a.c_dispo_date <= '$to2'";
        }
        elseif($from2 == "" && $to2 != ""){
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id
                        WHERE a.c_dispo_date <= '$to2'";
        }
        elseif($from2 != "" && $to2 == ""){
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id
                        WHERE a.c_dispo_date >= '$from2'";
        }
        else{
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id";
        }
        
        $query4 = mysqli_query($konek, $sql4);
        while($data4 = mysqli_fetch_array($query4)){
            $count8 = $data4['total'];
        }
        
        
    ?>

    


    
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-12">
                            <form role="form" class="form-horizontal" action="action/export_to_excel.php" method="POST">
                                <div class="form-group">
                                    <div class="col-lg-4">
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

                                    <div class="col-lg-6" style="margin-left:-1.5%">
                                        <button class="btn btn-warning" type="submit">Export XSL</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                   
                        <div class="col-lg-12">
                            <form action="?modul=dashboard" class="form-horizontal" method="POST">
                                <div class="col-md-4" style="margin-left:-1%;">
                                    <!--<input type="hidden" name="modul" value="dashboard"></input>-->
                                    <div class="input-group input-large">
                                        <input type="text" class="form-control dpd1" name="from" autocomplete="off">
                                        <span class="input-group-addon">To</span>
                                        <input type="text" class="form-control dpd2" name="to" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-1" style="margin-left:-1.5%">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                            <div class="col-lg-1" style="margin-left:-2.5%">
                                <a href="<?php echo $base_url?>/?modul=dashboard">
                                    <button class="btn btn-default" type="submit">Today</button>
                                </a>
                            </div>
                
                            <div class="col-lg-1" style="margin-left:-3%">
                                <button class="btn btn-info"><?php echo $from." - ".$to ?></button>
                            </div>

                            <!--
                            <div class="col-lg-1" style="margin-left:-2%">
                                <a href="<?php echo $base_url?>/backup/backup.php">
                                    <button class="btn btn-default" type="submit">Backup Database</button>
                                </a>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>




    <div class="row">
        <div class="col-md-3">
            <a href="?modul=data">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-spinner"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <?php
                                if($from2 != "" AND $to2 != ""){
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE a.c_dispo_date >= '$from2'
                                                AND a.c_dispo_date <= '$to2'
                                                AND b.p_status NOT IN (51,61)";
                                }
                                elseif($from2 == "" AND $to2 != ""){
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE a.c_dispo_date <= '$to2'
                                                AND b.p_status NOT IN (51,61)";
                                }
                                elseif($from2 != "" AND $to2 == ""){
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE a.c_dispo_date >= '$from2'
                                                AND b.p_status NOT IN (51,61)";
                                }
                                else{
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE b.p_status NOT IN (51,61)";
                                }

                                $query2 = mysqli_query($konek, $sql2); 
                                while($data2 = mysqli_fetch_array($query2)){
                                    $count7 = $data2['total'];
                                }
                                echo $count7;

                                
                            ?>
                            </span>
                            <?php
                                if($count8 != 0){ 
                                    $persen = ($count7 * 100) / $count8;
                                    $persen1 = sprintf('%0.2f', $persen);
                                ?>
                                    <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                                <?php
                                }
                                else{ ?>
                                    <a style="font-size:15px;">0%</a><br/>
                                <?php }
                            ?>
                            
                        </span>
                        SO - Disposition - On Progress
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="?modul=subprogress&view=61">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar" style="margin-top:12px;margin-right:20px;"><i class="fa fa-times"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            if($from2 != "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE a.c_dispo_date >= '$from2'
                                            AND a.c_dispo_date <= '$to2'
                                            AND b.p_status IN (61)";
                            }
                            elseif($from2 == "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE a.c_dispo_date <= '$to2'
                                            AND b.p_status IN (61)";
                            }
                            elseif($from2 != "" AND $to2 == ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE a.c_dispo_date >= '$from2'
                                            AND b.p_status IN (61)";
                            }
                            else{
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE b.p_status IN (61)";
                            }

                            $query2 = mysqli_query($konek, $sql2); 
                            while($data2 = mysqli_fetch_array($query2)){
                                $count9 = $data2['total'];
                            }
                            echo $count9;
                        ?>
                        </span>
                        <?php
                            if($count8 != 0){ 
                                $persen = ($count9 * 100) / $count8;
                                $persen1 = sprintf('%0.2f', $persen);
                            ?>
                                <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                            <?php
                            }
                            else{ ?>
                                <a style="font-size:15px;">0%</a><br/>
                            <?php }
                        ?>
                        SO - Cancel
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="?modul=subprogress&view=51">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink" style="margin-top:12px;margin-right:20px;"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            if($from2 != "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE 
                                            (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date <= '$n_to' ELSE b.p_bai_date <= '$n_to' END)
                                            AND (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date >= '$n_from' ELSE b.p_bai_date >= '$n_from' END)
                                            AND b.p_status = 51";
                            }
                            elseif($from2 == "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE 
                                            (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date <= '$n_to' ELSE b.p_bai_date <= '$n_to' END)
                                            AND b.p_status = 51";
                            }
                            elseif($from2 != "" AND $to2 == ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE 
                                            (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date >= '$n_from' ELSE b.p_bai_date >= '$n_from' END)
                                            AND b.p_status = 51";
                            }
                            else{
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE b.p_status = 51";
                            }

                            $query2 = mysqli_query($konek, $sql2); 
                            while($data2 = mysqli_fetch_array($query2)){
                                $count9 = $data2['total'];
                            }
                            echo $count9;

                        ?>
                        </span>
                        <?php
                            if($count8 != 0){ 
                                $persen = ($count9 * 100) / $count8;
                                $persen1 = sprintf('%0.2f', $persen);
                            ?>
                                <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                            <?php
                            }
                            else{ ?>
                                <a style="font-size:15px;">0%</a><br/>
                            <?php 
                            
                            }
                        ?>
                        SO - Closed
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-md-3">
            <a href="#">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green" style="margin-top:12px;margin-right:20px;"><i class="fa fa-th"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            echo $count8;										
                        ?>
                        </span>
                        <a style="font-size:15px;">100%</a><br/>
                        SO - Total
                    </div>
                </div>
            </a>
        </div>
        
    </div>

    <!--
    <div class="row">
        <div class="col-md-3">
            <a href="?modul=">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar" style="margin-top:12px;margin-right:20px;"><i class="fa fa-times"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <td>
                                <?php
                                    if(isset($_POST['from']) != "" AND isset($_POST['to']) != ""){
                                        $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE a.c_dispo_date >= '$from2'
                                                    AND a.c_dispo_date <= '$to2'";
                                    }
                                    elseif(isset($_POST['from']) == "" AND isset($_POST['to']) != ""){
                                        $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE a.c_dispo_date <= '$to2'";
                                    }
                                    elseif(isset($_POST['from']) != "" AND isset($_POST['to']) == ""){
                                        $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE a.c_dispo_date >= '$from2'";
                                    }
                                    else{
                                        $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id";
                                    }
                                    
                                    $query4 = mysqli_query($konek, $sql4);
                                    while($data4 = mysqli_fetch_array($query4)){
                                        $pp = $data4['total'];
                                    }
                                    echo $pp;
                                ?>
                            </td>
                        </span>
                        <a style="font-size:15px;">PA</a>
                        
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="?modul=">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink" style="margin-top:12px;margin-right:20px;"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <td>
                                <?php
                                    if(isset($_POST['from']) != "" AND isset($_POST['to']) != ""){
                                        $sql5   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE a.c_dispo_date >= '$from2'
                                                    AND a.c_dispo_date <= '$to2'
                                                    AND b.p_status = 51";
                                    }
                                    elseif(isset($_POST['from']) == "" AND isset($_POST['to']) != ""){
                                        $sql5   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE a.c_dispo_date <= '$to2'
                                                    AND b.p_status = 51";
                                    }
                                    elseif(isset($_POST['from']) != "" AND isset($_POST['to']) == ""){
                                        $sql5   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE a.c_dispo_date >= '$from2'
                                                    AND b.p_status = 51";
                                    }
                                    else{
                                        $sql5   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                    WHERE b.p_status = 51";
                                    }


                                    $query5 = mysqli_query($konek, $sql5);
                                    while($data5 = mysqli_fetch_array($query5)){
                                        $pp5 = $data5['total'];
                                    }
                                    echo $pp5;
                                ?>
                            </td>
                        </span>
                        <a style="font-size:15px;">PA Closed</a><br/>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green" style="margin-top:12px;margin-right:20px;"><i class="fa fa-th"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <td><?php echo $pp - $pp5 ?></td>
                        </span>
                        <a style="font-size:15px;">Kredit</a><br/>
                    </div>
                </div>
            </a>
        </div>
    </div>
    -->
    
    
    
    <!--mini statistics start-->
    <div class="row">
        <?php
            /*
            if($from2 != "" && $to2 != ""){
                $sql23 = "  SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status != 61";

                $sql = "    SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status = 51";
            }
            elseif($from2 == "" && $to2 != ""){

            }
            elseif($from2 != "" && $ $to2 == ""){

            }
            else{
            */
                $sql23 = "  SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status NOT IN (61)";
                $sql = "    SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status = 51";
            //}

            
                    
            $query23 = mysqli_query($konek, $sql23);
            while($data = mysqli_fetch_array($query23)){
                $pa0 = $data['total'];
            }


            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $pa51 = $data['total'];
            }
        ?>
        <div class="col-md-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="top-stats-panel">
                        <div class="gauge-canvas">
                            <h4 class="widget-h">PENYELESAIAN SO</h4>
                            <canvas width=160 height=100 id="gauge"></canvas>
                        </div>
                        <ul class="gauge-meta clearfix">
                            <li id="gauge-textfield" class="pull-left gauge-value"></li>
                            <li class="pull-right gauge-title"><a><?php echo $pa0 ?></a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <?php 
            include('time_delivery.php'); 

        ?>


        <div class="col-md-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="top-stats-panel">
                        <div class="daily-visit">
                            <h4 class="widget-h">Time Delivery last 10</h4>
                            <div id="daily-visit-chart" style="width:100%; height: 100px; display: block">

                            </div>
                            <ul class="chart-meta clearfix">
                                <li class="pull-right visit-chart-value"><?php echo $sumtd ?></li>
                                <li class="pull-right visit-chart-title" style="margin-right:5px;">average</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>



        <?php
            $sql = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status = 0";
            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $ar = $data['total'];
            }

            $sql = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status = 43 
                    -- or p_bai_date IS NOT null
                    ";
            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $bai = $data['total'];
            }

            $sql = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status IN (44,51)";
            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $baa = $data['total'];
            }

            $sql = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status IN (61)";
            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $cancel = $data['total'];
            }

            $sql = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status NOT IN (0,43,44,51,61)";
            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $dll = $data['total'];
            }
        ?>

        <div class="col-md-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="top-stats-panel">
                        <h4 class="widget-h">Progress</h4>
                        <div class="sm-pie">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-md-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="top-stats-panel">
                        <h4 class="widget-h">Dummy</h4>
                        <div class="bar-stats">
                            <ul class="progress-stat-bar clearfix">
                                <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                                <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                                <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                            </ul>
                            <ul class="bar-legend">
                                <li><span class="bar-legend-pointer pink"></span> Lorem</li>
                                <li><span class="bar-legend-pointer green"></span> Ipsum</li>
                                <li><span class="bar-legend-pointer yellow-b"></span> Dolor</li>
                            </ul>
                            <div class="daily-sales-info">
                                <span class="sales-count">1200 </span> <span class="sales-label">Sit Amet</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php 
        //include('resume_ptl2.php');
        include('resume_ptl3.php');
    
        
        $sql2 = "SELECT COUNT(*) as total FROM m_project 
                LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id";

        $query2 = mysqli_query($konek, $sql2); 
        while($data2 = mysqli_fetch_array($query2)){
            $count0 = $data2['total'];
        }

        include('resume_vendor.php');
        include('resume_vendor2.php');

        include('resume_popr.php');
    ?>

    <div class="row" >    
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Progress SO By PTL
                </header>
                <div class="panel-body">

                    <div class="chart">
                        <div id="combine-chart"></div>
                    </div>

                </div>
            </section>
        </div>
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Progress SO by vendor
                
                </header>
                <div class="panel-body">

                    <div class="chart">
                        <div id="roated-chart"></div>
                    </div>

                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    PO/PR
                </header>
                <div class="panel-body">

                    <div class="chart">
                        <div id="combines-chart"></div>
                    </div>

                </div>
            </section>
        </div>
        
        <!--
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Progress SO by vendor 2 
                </header>
                <div class="panel-body">

                    <div class="chart" >
                        <div id="roasted-chart"></div>
                    </div>

                </div>
            </section>
        </div>
        -->
        
    </div>




    <!--
    <div class="row" >    
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    Dummy
                </header>
                <div class="panel-body">
                    <div class="chart">
                        <div id="chartContainer"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    -->




    <!--
    <div class="row">
        <div class="col-md-3">
            <a href="?modul=data">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-spinner"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <?php
                                $sql2 = "SELECT COUNT(*) as total FROM m_project 
                                LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                                WHERE p_status NOT IN (51,61)";

                                $query2 = mysqli_query($konek, $sql2); 
                                while($data2 = mysqli_fetch_array($query2)){
                                    $count7 = $data2['total'];
                                }
                                echo $count7;

                                $persen = ($count7 * 100) / $count0;
                                $persen1 = sprintf('%0.2f', $persen);
                            ?>
                            </span>
                            <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                        </span>
                        SO - On Progress
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="?modul=subprogress&view=61">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar" style="margin-top:12px;margin-right:20px;"><i class="fa fa-times"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            $sql2 = "SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status IN (61)";

                            $query2 = mysqli_query($konek, $sql2); 
                            while($data2 = mysqli_fetch_array($query2)){
                                $count9 = $data2['total'];
                            }
                            echo $count9;

                            $persen = ($count9 * 100) / $count0;
                            $persen1 = sprintf('%0.2f', $persen);
                        ?>
                        </span>
                        <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                        SO - Cancel
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="?modul=subprogress&view=51">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink" style="margin-top:12px;margin-right:20px;"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            $sql2 = "SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status IN (51)";

                            $query2 = mysqli_query($konek, $sql2); 
                            while($data2 = mysqli_fetch_array($query2)){
                                $count9 = $data2['total'];
                            }
                            echo $count9;

                            $persen = ($count9 * 100) / $count0;
                            $persen1 = sprintf('%0.2f', $persen);
                        ?>
                        </span>
                        <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                        SO - Closed
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon green" style="margin-top:12px;margin-right:20px;"><i class="fa fa-th"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            echo $count0;										
                        ?>
                        </span>
                        <a style="font-size:15px;">100%</a><br/>
                        SO - Total
                    </div>
                </div>
            </a>
        </div>
    </div>
    -->




<!--
    <div class="row">
        <div class="col-md-3">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <a href="#">
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                100
                                </span>
                                <h4><?php echo "10%" ?></h4>
                                Project Activation (terdisposisi)
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>
        <div class="col-md-2">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <a href="?modul=subprogress&view=2">
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                100
                                </span>
                                <h4><?php echo "10%" ?></h4>
                                Project Initiation
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>
        <div class="col-md-2">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <a href="?modul=subprogress&view=3">
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                100
                                </span>
                                <h4><?php echo "%" ?></h4>
                                PO/PR
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>	

        <div class="col-md-2">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <a href="?modul=subprogress&view=4">
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                100
                                </span>
                                <h4><?php echo "10%" ?></h4>
                                Network Integration
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>
        <div class="col-md-3">
            <div class="profile-nav alt">
                <section class="panel">
                    <a href="?modul=subprogress&view=5">
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                100
                                </span>
                                <h4><?php echo "10%" ?></h4>
                                Test & Commisioning
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>
    </div>
-->