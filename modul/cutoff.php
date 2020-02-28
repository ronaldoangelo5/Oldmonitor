<div class="row">
<div class="col-md-12">

    <?php
        $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                WHERE c_created_date >= '2018-08-01 00:00:01'";

        $query2 = mysqli_query($konek, $sql2); 
        while($data2 = mysqli_fetch_array($query2)){
            $count0 = $data2['total'];
        }
    ?>

    <div class="row">
        <div class="col-md-3">
            <a href="#">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-spinner"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <?php
                                $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                        WHERE p_status NOT IN (51,61)
                                        AND c_created_date >= '2018-08-01 00:00:01'";

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
            <a href="#">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon tar" style="margin-top:12px;margin-right:20px;"><i class="fa fa-times"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                    LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                    LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                    WHERE p_status IN (61)
                                    AND c_created_date >= '2018-08-01 00:00:01'";

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
            <a href="#">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon pink" style="margin-top:12px;margin-right:20px;"><i class="fa fa-thumbs-o-up"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                        <?php
                            $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                    LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                    LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                    WHERE p_status IN (51)
                                    AND c_created_date >= '2018-08-01 00:00:01'";

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
                    <span class="mini-stat-icon green" style="margin-top:12px;margin-right:20px;"><i class="fa fa-eye"></i></span>
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

    <div class="row">
        <div class="col-md-3">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <a href="?modul=subprogress&type=cutoff&view=1">
                        <div class="user-heading alt wdgt-row terques-bg">
                            <div style="font-size:30px;font-weight:bold;">
                                PA Node
                            </div>
                            <div style="font-size:30px;font-weight:bold;">
                                <span class="fa fa-long-arrow-right"></span>	
                            </div>
                        </div>
                    
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                <?php
                                    $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                            LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                            WHERE p_status = '0'
                                            AND c_created_date >= '2018-08-01 00:00:01'";

                                    $query2 = mysqli_query($konek, $sql2); 
                                    while($data2 = mysqli_fetch_array($query2)){
                                        $count = $data2['total'];
                                    }
                                    
                                    $persen = ($count * 100) / $count7;
                                    $persen1 = sprintf('%0.2f', $persen);

                                    echo $count;
                                ?>
                                </span>
                                <h4><?php echo $persen1."%" ?></h4>
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
                        <div class="user-heading alt wdgt-row red-bg">
                            <div style="font-size:30px;font-weight:bold;">
                                PI
                            </div>
                            <div style="font-size:30px;font-weight:bold;">
                                <span class="fa fa-long-arrow-right"></span>	
                            </div>
                        </div>
                    
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                <?php
                                    $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                            LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                            WHERE p_status IN (11,12,13,14)
                                            AND c_created_date >= '2018-08-01 00:00:01'";

                                    $query2 = mysqli_query($konek, $sql2); 
                                    while($data2 = mysqli_fetch_array($query2)){
                                        $count = $data2['total'];
                                    }
                                    
                                    $persen = ($count * 100) / $count7;
                                    $persen1 = sprintf('%0.2f', $persen);

                                    echo $count;
                                ?>
                                </span>
                                <h4><?php echo $persen1."%" ?></h4>
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
                        <div class="user-heading alt wdgt-row yellow-bg-prd">
                            <div style="font-size:30px;font-weight:bold;">
                                PO
                            </div>
                            <div style="font-size:30px;font-weight:bold;">
                                <span class="fa fa-long-arrow-right"></span>	
                            </div>
                        </div>
                    
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                <?php
                                    $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                            LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                            WHERE p_status IN (21)
                                            AND c_created_date >= '2018-08-01 00:00:01'";

                                    $query2 = mysqli_query($konek, $sql2); 
                                    while($data2 = mysqli_fetch_array($query2)){
                                        $count = $data2['total'];
                                    }

                                    $persen = ($count * 100) / $count7;
                                    $persen1 = sprintf('%0.2f', $persen);

                                    echo $count;
                                ?>
                                </span>
                                <h4><?php echo $persen1."%" ?></h4>
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
                        <div class="user-heading alt wdgt-row purple-bg">
                            <div style="font-size:30px;font-weight:bold;">
                                NI
                            </div>
                            <div style="font-size:30px;font-weight:bold;">
                                <span class="fa fa-long-arrow-right"></span>	
                            </div>
                        </div>
                    
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                <?php
                                    $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                            LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                            WHERE p_status IN (31,32,33,34,35,36)
                                            AND c_created_date >= '2018-08-01 00:00:01'";

                                    $query2 = mysqli_query($konek, $sql2); 
                                    while($data2 = mysqli_fetch_array($query2)){
                                        $count = $data2['total'];
                                    }

                                    $persen = ($count * 100) / $count7;
                                    $persen1 = sprintf('%0.2f', $persen);

                                    echo $count;
                                ?>
                                </span>
                                <h4><?php echo $persen1."%" ?></h4>
                                Network Integration
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>
        <div class="col-md-3">
            <div class="profile-nav alt">
                <section class="panel text-center">
                    <a href="?modul=subprogress&view=5">
                        <div class="user-heading alt wdgt-row terques-bg">
                            <div style="font-size:30px;font-weight:bold;">
                                TC
                            </div>
                            
                            <div style="font-size:30px;font-weight:bold;">
                                <span class="fa fa-long-arrow-right"></span>	
                            </div>
                        </div>
                    
                        <div class="panel-body">
                            <div class="mini-stat-info">
                                <span style="font-size:30px;">
                                <?php
                                    $sql2 = "SELECT COUNT(*) as total FROM m_crm2
                                            LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                            WHERE p_status IN (41,42,43,44)
                                            AND c_created_date >= '2018-08-01 00:00:01'";

                                    $query2 = mysqli_query($konek, $sql2); 
                                    while($data2 = mysqli_fetch_array($query2)){
                                        $count = $data2['total'];
                                    }

                                    $persen = ($count * 100) / $count7;
                                    $persen1 = sprintf('%0.2f', $persen);

                                    echo $count;
                                ?>
                                </span>
                                <h4><?php echo $persen1."%" ?></h4>
                                Test & Commisioning
                            </div>
                        </div>
                    </a>

                </section>
            </div>
        </div>
    </div>
</div>
</div>