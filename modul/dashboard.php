
    <?php
        /*
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
        */
        
    ?>

    


    <!--
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" class="form-horizontal" action="action/export_to_excel.php" method="POST">
                                <div class="form-group">
                                    <div class="col-lg-3">
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
                                <div class="col-md-3" style="margin-left:-1%;">
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
                        </div>
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
    -->

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
                $sql23x = "  SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status NOT IN (61)";

                $sql23 = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_status NOT IN ('Cancelled') AND c_created_date >= '2019-01-01'";
            
                $sqlx = "    SELECT COUNT(*) as total FROM m_project 
                            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                            WHERE p_status = 51";
                
                $sql = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_status IN ('Test & Commissioning', 'BAPS', 'Closed', 'GR') AND c_created_date >= '2019-01-01'";
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
                            <h4 class="widget-h">Time Delivery All SO</h4>
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
            $sqlx = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status = 0";
           
            $sql = "SELECT COUNT(*) as total FROM m_crm2
                    WHERE c_bai_date is null 
                    AND c_baa_date is null
                    AND c_created_date >= '2019-01-01'";

            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $ar = $data['total'];
            }

            $sqlx = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status = 43
                    -- or p_bai_date IS NOT null
                    ";
            $sql = "SELECT COUNT(*) as total FROM m_crm2
                    WHERE c_bai_date is not null 
                    AND c_baa_date is null
                    AND c_created_date >= '2019-01-01'";


            $query = mysqli_query($konek, $sql);
            while($data = mysqli_fetch_array($query)){
                $bai = $data['total'];
            }

            $sqlx = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status IN (44,51)";
            $sql = "SELECT COUNT(*) as total FROM m_crm2
                    WHERE c_baa_date is not null
                    AND c_created_date >= '2019-01-01'";

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
        
            <?php
            
            $sql2 = "SELECT COUNT(*) as total FROM m_project 
                    INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE c_created_date >= '2019-01-01'";

			$query2 = mysqli_query($konek, $sql2); 
			while($data2 = mysqli_fetch_array($query2)){
				$count0 = $data2['total'];
			}

            $sql6x = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status NOT IN (51,61)";
            
            $sql6 = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_status IN ('Project Initiation', 'PR', 'PO', 'Open', 'Network Integration', 'Disposition') AND c_created_date >= '2019-01-01'";

                    $query6 = mysqli_query($konek, $sql6); 
                    while($data6 = mysqli_fetch_array($query6)){
                        $count7 = $data6['total'];
                    }
                    //echo $count7;

                    $persen1 = ($count7 * 100) / $count0;
                    $persen1 = sprintf('%0.2f', $persen1);
                       
            
            $sql7x = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status IN (61)";
            $sql7 = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_status = 'Cancelled' AND c_created_date >= '2019-01-01'";

                    $query7 = mysqli_query($konek, $sql7); 
                    while($data7 = mysqli_fetch_array($query7)){
                        $count9 = $data7['total'];
                    }
                    //echo $count9;

                    $persen2 = ($count9 * 100) / $count0;
                    $persen2 = sprintf('%0.2f', $persen2);

            $sql8x = "SELECT COUNT(*) as total FROM m_project 
                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                    WHERE p_status IN (51)";

            $sql8 = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_status IN ('Test & Commissioning', 'BAPS', 'Closed', 'GR') AND c_created_date >= '2019-01-01' AND c_bai_date is not null";

                    $query8 = mysqli_query($konek, $sql8); 
                    while($data8 = mysqli_fetch_array($query8)){
                        $count8 = $data8['total'];
                    }
                    //echo $count8;

                    $persen3 = ($count8 * 100) / $count0;
                    $persen3 = sprintf('%0.2f', $persen3);
            ?>


        <div class="col-md-3">
            <section class="panel">
                <div class="panel-body">
                    <div class="top-stats-panel">
                        <h4 class="widget-h">SO Status</h4>
                        <div class="bar-stats">
                            <ul class="progress-stat-bar clearfix">
                                <li data-percent="<?php echo $persen1."%"; ?>"><span class="progress-stat-percent pink"></span></li>
                                <li data-percent="<?php echo $persen2."%"; ?>"><span class="progress-stat-percent"></span></li>
                                <li data-percent="<?php echo $persen3."%"; ?>"><span class="progress-stat-percent yellow-b"></span></li>
                            </ul>
                            <ul class="bar-legend">
                                <li><span class="bar-legend-pointer pink"></span> On Progress - <?php echo $count7; ?></li>
                                <li><span class="bar-legend-pointer green"></span> Cancel - <?php echo $count9; ?></li>
                                <li><span class="bar-legend-pointer yellow-b"></span> Closed - <?php echo $count8;  ?></li>
                            </ul>
                            <div class="daily-sales-info">
                                <span class="sales-count"><?php echo $count0 ?> </span> <span class="sales-label">Total SO</span>
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

    <div class="row">
        
        
        <!--
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TREND Vendor
                </header>
                <div class="panel-body">
                    <?php include('resume_vendor3.php'); ?>
                </div>
            </section>
        </div>
        -->


        <?php 
            
            include('resume_vendor4.php');
            include('resume_vendor5.php');
            include('resume_ptl5.php'); 
        ?>
        
        <!--
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TREND Vendor3
                </header>
                <div class="panel-body">
                    <?php include('resume_vendor6.php')?>
                </div>
            </section>
        </div>
        -->
        
        <!--
        <div class="row">
            <div class="col-sm-6">
                    <section class="panel">
                        <header class="panel-heading">
                            TREND PTL
                        </header>
                        <div class="panel-body">
                        <?php include('resume_ptl6.php'); ?>
                        </div>
                    </section>
                </div>
        </div>
        -->

        <?php include('resume_ptl6.php'); ?>

    </div>

    <div class="row" >   
        <!--
        <div class="col-sm-4">
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
        -->
        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    PO/PR (Dalam Juta)
                </header>
                <div class="panel-body">

                    <div class="chart">
                        <div id="combines-chart"></div>
                    </div>

                </div>
            </section>
        </div>
        <!--
        <div class="col-sm-4">
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
        -->

        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    Performance PTL
                </header>
                <div class="panel-body">

                    <div class="chart">
                        <div id="combine-chart2"></div>
                    </div>

                </div>
            </section>
        </div>

        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    Performance Vendor
                </header>
                <div class="panel-body">
                    <div class="chart">
                        <div id="vendor-chart"></div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <!--
    <div class="row">
        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    Performance PTL
                </header>
                <div class="panel-body">

                    <div class="chart">
                        <div id="combine-chart3"></div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    -->

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="chart">
                        <div id="comb-chart"></div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <!--
    <div class="row">
    <div class="col-md-8">

        <section class="panel">
            <header class="panel-heading">
                Earning Graph <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
            </span>
            </header>
            <div class="panel-body">
                <div class="region-stats">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="region-earning-stats">
                                This year total SO <span><?php echo $pa0 ?></span>
                            </div>

                            <?php
                            
                            $hh = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Marhwan Setiawan Putera', 'Ratno Putrama Sani') AND c_created_date >= '2019-01-01'";
                            $hi = mysqli_query($konek, $hh);
                            while($hj = mysqli_fetch_array($hi)){
                                $hk = $hj['total'];
                            }

                            $ii = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Rahmat Rahmat') AND c_created_date >= '2019-01-01'";
                            $ij = mysqli_query($konek, $ii);
                            while($ik = mysqli_fetch_array($ij)){
                                $il = $ik['total'];
                            }

                            $ii = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Arga Dian Utama Sultan') AND c_created_date >= '2019-01-01'";
                            $ij = mysqli_query($konek, $ii);
                            while($ik = mysqli_fetch_array($ij)){
                                $im = $ik['total'];
                            }

                            $ii = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Muhammad Idrus') AND c_created_date >= '2019-01-01'";
                            $ij = mysqli_query($konek, $ii);
                            while($ik = mysqli_fetch_array($ij)){
                                $in = $ik['total'];
                            }

                            $ii = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Irene Telwe') AND c_created_date >= '2019-01-01'";
                            $ij = mysqli_query($konek, $ii);
                            while($ik = mysqli_fetch_array($ij)){
                                $io = $ik['total'];
                            }

                            $ii = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Rozky Mahardhitya') AND c_created_date >= '2019-01-01'";
                            $ij = mysqli_query($konek, $ii);
                            while($ik = mysqli_fetch_array($ij)){
                                $ip = $ik['total'];
                            }

                            $ii = "SELECT COUNT(*) as total FROM m_crm2 WHERE c_pic IN ('Zulkifli Kaharuddin Azis') AND c_created_date >= '2019-01-01'";
                            $ij = mysqli_query($konek, $ii);
                            while($ik = mysqli_fetch_array($ij)){
                                $iq = $ik['total'];
                            }
                            
                            ?>
                            <ul class="clearfix location-earning-stats">
                                <li class="stat-divider">
                                    <span class="first-city"><?php echo $hk ?></span>
                                    Sulawesi Selatan </li>
                                <li>
                                    <span class="second-city"><?php echo $il ?></span>
                                    Sulawesi Barat </li>
                                <li class="stat-divider">
                                    <span class="third-city"><?php echo $im ?></span>
                                    Sulawesi Tengah </li>
                                <li class="stat-divider">
                                    <span class="first-city"><?php echo $in ?></span>
                                    Gorontalo </li>
                                <li>
                                    <span class="second-city"><?php echo $io ?></span>
                                    Manado </li>
                                <li class="stat-divider">
                                    <span class="third-city"><?php echo $ip ?></span>
                                    Ambon </li>
                                <li>
                                    <span class="first-city"><?php echo $iq ?></span>
                                    Papua </li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <div id="world-map" class="vector-stat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    -->
    

    <div class="row">
        <!--
        <div class="col-sm-6">
            <div class="event-calendar clearfix">
                <div class="col-lg-7 calendar-block">
                   <div class="cal1"></div>
                </div>
                <div class="col-lg-5 event-list-block">
                    <div class="cal-day">
                        <span>Today</span>
                        Friday
                    </div>
                    <ul class="event-list">
                        <li>Lunch with jhon @ 3:30 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                        <li>Coffee meeting with Lisa @ 4:30 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                        <li>Skypee conf with patrick @ 5:45 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                        <li>Gym @ 7:00 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                        <li>Dinner with daniel @ 9:30 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>

                    </ul>
                    <input type="text" class="form-control evnt-input" placeholder="NOTES">
                </div>
            </div>
        </div>
        -->
        
        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    URGENT
                </header>
                <div class="panel-body">
                    <ul class="to-do-list">
                        
                        <div style="margin-top:5px">
                            <span  class="label label-danger label-mini">Time Delivery</span>
                            <legend style="margin-top:-8px"></legend>
                        </div>
                        
                        <?php
                        //if($sumtd > 24){ 
                        ?>
                            <li class="clearfix">
                                <p class="todo-title">
                                    Time Delivery: <?php echo $sumtd ?> hari
                                </p>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove"><i class="ico-close"></i></a>
                                </div>
                            </li>
                        <?php
                        //}
                        ?>
                        
                        <br/>
                        <div style="margin-top:5px">
                            <span class="label label-warning label-mini">Persentase SO</span>
                            <legend style="margin-top:-7px"></legend>
                        </div>
                        
                        <?php

                        $ubaa = $pa51 / $pa0;
                        if($ubaa < 80){ ?>
                            <li class="clearfix">
                                <p class="todo-title">
                                    Persentase Penyelesaian SO: <?php echo sprintf("%0.2f", $ubaa)*100 ?>%
                                </p>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove"><i class="ico-close"></i></a>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </section>
        </div>


        
        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    SERIOUSNESS
                </header>
               
                <div class="panel-body">
                    <!--<ul class="to-do-list" id="sortable-todo">-->
                    <ul class="to-do-list">
                        
                        <div style="margin-top:5px">
                            <span  class="label label-success label-mini">Produktifitas Mitra</span>
                            <legend style="margin-top:-8px"></legend>
                        </div>

                        <?php 
                        
                        $aaaa = 0;
                        $bbbb = 0;
                        $cccc = 0;

                        for($i=0; $i<$d99; $i++){

                            if($rank[$i] >= 0 && $rank[$i] <= 0.34){
                                $cccc++;                                
                            }
                            elseif($rank[$i] >= 0.35 && $rank[$i] <= 0.66){
                                $bbbb++;
                            }
                            else{
                                $aaaa++;
                            }
                            count($aaaa);
                            count($bbbb);
                            count($cccc);
                        }
                            ?>
                            
                            <li class="clearfix">
                                <p class="todo-title">
                                    Sangat Produktif: <?php echo $aaaa;?> -  (<?php echo sprintf("%0.2f", (($aaaa/$d99) * 100))?>%) 
                                </p>
                            </li>
                            <li class="clearfix">
                                <p data-toggle="dropdown" class="todo-title">
                                    Cukup Produktif: <?php echo $bbbb; ?> - (<?php echo sprintf("%0.2f", (($bbbb/$d99) * 100))?>%) 
                                </p>
                            </li>
                            <li class="clearfix">
                            <div class="btn-group">
                                <p class="todo-title">
                                    Kurang Produktif: <?php echo $cccc; ?> - (<?php echo sprintf("%0.2f", (($cccc/$d99) * 100))?>%) 
                                </p>
                            </li>                            
                            
                            <?php

                            /*
                            if($rank[$i] <= 0.42){ ?>
                                <li class="clearfix">
                                    <!--
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check"/>
                                        <label for="todo-check"></label>
                                    </div>
                                    -->

                                    <?php
                                        $rr     = $rank[$i];
                                        $sqlain = "SELECT * FROM m_dec_tb WHERE d_min < $rr AND d_max > $rr AND d_modul = 1";
                                        $queryn = mysqli_query($konek, $sqlain);
                                        $fetchn = mysqli_fetch_array($queryn);
                                        $desc   = $fetchn['d_action'];
                                    ?>

                                    <p class="todo-title">
                                        <?php echo $d2[$i]." - ".$desc ?>
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">
                                        <a href="#" class="todo-remove"><i class="ico-close"></i></a>
                                    </div>
                                </li>
                            <?php
                            }
                            */
                            
                            
                        //}

                        ?>
                        <br/>
                        <div style="margin-top:5px">
                            <span class="label label-primary label-mini">Jumlah BAA</span>
                            <legend style="margin-top:-8px"></legend>
                        </div>
                        
                        <?php
                        $bbaa = $baa / $pa0;
                        if($bbaa < 80){ ?>
                            <li class="clearfix">
                                <p class="todo-title">
                                    Persentase BAA: <?php echo sprintf("%0.2f", $bbaa) * 100 ?>%
                                </p>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove"><i class="ico-close"></i></a>
                                </div>
                            </li>
                        <?php
                        }

                        ?>
                        
                    </ul>
                </div>
            </section>
        </div>


        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    TREND
                </header>
               
                <div class="panel-body">
                    <ul class="to-do-list" style="overflow:hidden;"> 
                        
                        <div style="margin-top:5px">
                            <span  class="label label-info label-mini">Produktifitas PTL</span>
                            <legend style="margin-top:-8px"></legend>
                        </div>

                        <?php 
                        
                        $ddd = 0;
                        $eee = 0;
                        $fff = 0;

                        for($l=0; $l<$nuu; $l++){

                            if($rankptl[$l] >= 0.67 && $rankptl[$l] <= 1){
                                $ddd++;                                
                            }
                            elseif($rankptl[$l] >= 0.33 && $rankptl[$l] <= 0.66){
                                $eee++;
                            }
                            else{
                                $fff++;
                            }
                            count($ddd);
                            count($eee);
                            count($fff);
                        }
                        ?>
                        
                        <li class="clearfix">
                            <p class="todo-title">
                                Sangat Produktif: <?php echo $ddd;?> -  (<?php echo sprintf("%0.2f", (($ddd/$nuu) * 100))?>%) 
                            </p>
                        </li>
                        <li class="clearfix">
                            <p data-toggle="dropdown" class="todo-title">
                                Cukup Produktif: <?php echo $eee; ?> - (<?php echo sprintf("%0.2f", (($eee/$nuu) * 100))?>%) 
                            </p>
                        </li>
                        <li class="clearfix">
                        <div class="btn-group">
                            <p class="todo-title">
                                Kurang Produktif: <?php echo $fff; ?> - (<?php echo sprintf("%0.2f", (($fff/$nuu) * 100))?>%) 
                            </p>
                        </li>

                        
                        <br/>
                        <div style="margin-top:5px">
                            <span class="label label-default label-mini">Ongkos Produksi</span>
                            <legend style="margin-top:-8px"></legend>
                        </div>
                        
                        <?php

                        $gr0 = "SELECT *, COUNT(*) as total FROM m_project b
                                LEFT JOIN m_crm2 a ON b.p_c_id=a.c_id
                                WHERE
                                b.p_nilai_gr IS NULL OR b.p_nilai_gr = 0";

                        $gr1 = "SELECT *, COUNT(*) as total FROM m_project b
                                LEFT JOIN m_crm2 a ON b.p_c_id=a.c_id
                                WHERE
                                b.p_nilai_gr > 0 AND b.p_nilai_gr <= 15000000";

                        $gr2 = "SELECT *, COUNT(*) as total FROM m_project b
                                LEFT JOIN m_crm2 a ON b.p_c_id=a.c_id
                                WHERE
                                b.p_nilai_gr > 15000000 AND b.p_nilai_gr <= 50000000";

                        $gr3 = "SELECT *, COUNT(*) as total FROM m_project b
                                LEFT JOIN m_crm2 a ON b.p_c_id=a.c_id
                                WHERE
                                b.p_nilai_gr > 50000000";


                        $sgr0 = mysqli_query($konek, $gr0);
                        $sgr1 = mysqli_query($konek, $gr1);
                        $sgr2 = mysqli_query($konek, $gr2);
                        $sgr3 = mysqli_query($konek, $gr3);

                        $fgr0 = mysqli_fetch_array($sgr0);
                        $fgr1 = mysqli_fetch_array($sgr1);
                        $fgr2 = mysqli_fetch_array($sgr2);
                        $fgr3 = mysqli_fetch_array($sgr3);
                        
                        ?>

                        <!--
                        <li class="clearfix">
                            <p class="todo-title">
                                0 Juta  : <?php echo $fgr0['total'] ?>
                            </p>
                        </li>
                        -->
                        <?php 
                            $avgfgr = $fgr1['total'] + $fgr2['total'] + $fgr3['total']; 
                        ?>
                        
                        <li class="clearfix">
                            <p class="todo-title">
                                0 - 15 Juta  : <?php echo $fgr1['total'] ?> - (<?php echo sprintf("%0.2f", ($fgr1['total'] / $avgfgr) * 100) ?>%)
                            </p>
                        </li>
                        <li class="clearfix">
                            <p class="todo-title">
                                15 - 50 Juta : <?php echo $fgr2['total'] ?> - (<?php echo sprintf("%0.2f", ($fgr2['total'] / $avgfgr) * 100) ?>%)
                            </p>
                        </li>
                        <li class="clearfix">
                            <p class="todo-title">
                                > 50 Juta    : <?php echo $fgr3['total'] ?> - (<?php echo sprintf("%0.2f", ($fgr3['total'] / $avgfgr) * 100) ?>%)
                            </p>
                        </li>

                    </ul>
                </div>
            </section>
        </div>


        
    </div>

    
    <!--
    <div class="row"> 
        
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
    
    </div>
    -->



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
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TREND PTL
                </header>
                <div class="panel-body">
                    <?php include_once('trendptl.php')?>
                </div>
            </section>
        </div>
    </div>
    -->

    <!--
    <div class="row">
        <div class="col-sm-6">
            <section class="panel">
                <header class="panel-heading">
                    TREND Ongkos Produksi
                </header>
                <div class="panel-body">
                    <?php include_once('trendpopr.php')?>
                </div>
            </section>
        </div>
        
    </div>
    -->

    

    <!--
    <div class="row">
        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    URGENT Time Delivery
                </header>
                <div class="panel-body">
                    <?php include_once('trendtd.php')?>
                </div>
            </section>
        </div>
        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    URGENT % SO Selesai
                </header>
                <div class="panel-body">
                    <?php include_once('urgentso.php')?>
                </div>
            </section>
        </div>

        <div class="col-sm-4">
            <section class="panel">
                <header class="panel-heading">
                    SERIUS BAA
                </header>
                <div class="panel-body">
                    <?php include_once('seriusbaa.php')?>
                </div>
            </section>
        </div>
    </div>
    -->

    