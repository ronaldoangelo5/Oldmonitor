        <?php
            if(isset($_SESSION['notif'])){
                if($_SESSION['notif'] == 1){
                    echo   '<div class="alert alert-success fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </div>';
                    unset($_SESSION['notif']);
                }
                elseif($_SESSION['notif'] == 2){
                    echo   '<div class="alert alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </div>';
                    unset($_SESSION['notif']);
                }
                else{
                    echo '';
                }
            }

            
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            
        ?>
                
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel">
                                
                                <div class="panel-body">
                                <div class="adv-table">
                                    <table class=" table table-hover general-table" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>No </th>
                                                <th>PA Node ID</th>
                                                <th>AR ID</th>
                                                <th>PIC</th>
                                                <th>Start Date</th>
                                                <th>Aging</th>
                                                <th>Last Progress</th>
                                                <th>Progress</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                
                                                $sql = "SELECT * FROM m_crm2 
                                                        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                                        RIGHT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id
                                                        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
                                                        WHERE m_project.p_v_id = $id
                                                        AND m_project.p_status <> 51
                                                       ";
                                                
                                                $query  = mysqli_query($konek, $sql);
                                                $no = 1;



                                                while($data = mysqli_fetch_array($query)){ 
                                                    
                                                    $today 	= date('Y-m-d');

                                                    $date 		= date('Y-m-d', strtotime($data['c_created_date']));
											
                                                    $CheckInX 	= explode("-", $date);
                                                    $CheckOutX 	= explode("-", $today);
                                                    $date1 		= mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
                                                    $date2 		= mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
                                                    $interval 	= ($date2 - $date1)/(3600*24);
                                                
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td>
                                                            <a href="?modul=detail&id=<?php echo $data['p_id']?>">
                                                                <?php echo $data['c_pa_node_id']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['c_act_request_id']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['c_pic']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo date('H:i d M, Y', strtotime($data['c_created_date'])) ?>
                                                            </a>
                                                        </td>
                                                        
                                                        <?php

                                                        if($interval>=0 AND $interval<=10){
                                                            $label = "label-success";
                                                        }
                                                        elseif($interval>=11 AND $interval<=20){
                                                            $label = "label-warning";
                                                        }
                                                        else{
                                                            $label = "label-danger";
                                                        }
                                                        ?>
                                                        <td><a href="#"><span class="label <?php echo $label ?> label-mini"><?php echo $interval ?> days</span></a></td>
                                                        

                                                        <td>
                                                            <?php
                                                            if($data['s_progress']=="PI"){
                                                                echo '<span class="label label-danger label-mini">PI</span>';
                                                            }elseif($data['s_progress']=="PO"){
                                                                echo '<span class="label label-warning label-mini">PO/PR</span>';
                                                            }elseif($data['s_progress']=="NI"){
                                                                echo '<span class="label label-info label-mini">NI</span>';
                                                            }elseif($data['s_progress']=="TC"){
                                                                echo '<span class="label label-success label-mini">TestCom</span>';
                                                            }elseif($data['s_progress']=="closed"){
                                                                echo '<span class="label label-default label-mini">Closed</span>';
                                                            }else{
                                                                echo '<span class="label label-default label-mini">PA</span>';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            if($data['s_progress_value'] <= 26.60){
                                                                $color = "progress-bar-danger";
                                                            }elseif($data['s_progress_value'] <= 33.25){
                                                                $color = "progress-bar-warning";
                                                            }elseif($data['s_progress_value'] <= 73.15){
                                                                $color = "progress-bar-primary";
                                                            }elseif($data['s_progress_value'] <= 93.10){
                                                                $color = "progress-bar-success";
                                                            }else{
                                                                $color = "progress-bar-default";
                                                            }
                                                            ?>
                                                            <div class="progress progress-striped progress-xs">
                                                                <div style="width: <?php echo $data['s_progress_value']?>%" aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar <?php echo $color?>"></div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a onclick="return confirm('Yakin ingin me-refresh progress data ini ?') "; title='refresh' href="action/refresh_mks_progress.php/?id=<?php echo $data['p_id'] ?>">
                                                                <span class="label label-info label-mini">refresh</span>
                                                            </a>
                                                        </td>
                                                        
                                                    </tr>
                                                <?php 
                                                $no++;
                                                }
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>    
                                </div>
                            </section>
                        </div>
                    </div>

                <?php
            }
            else { ?>

                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            
                            <div class="panel-body">
                            <div class="adv-table">
                                <table class=" table table-hover general-table" id="dynamic-table">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Vendor</th>
                                            <th>Total SO</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            /*
                                            $sql = "SELECT v_id, v_name, COUNT(*) as total
                                                    FROM m_project LEFT JOIN m_ppi ON m_project.p_id=m_ppi.ppi_project_id 
                                                    RIGHT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                                                    
                                                    GROUP BY (p_v_id)";
                                            */

                                            /*
                                            $sql = "SELECT v_id, v_name, COUNT(*) as total
                                                    FROM m_vendor
                                                    INNER JOIN m_project ON m_vendor.v_id=m_project.p_v_id
                                                    WHERE m_project.p_status != 51
                                                    GROUP BY (p_v_id)";
                                            */

                                            $sql = "SELECT 
                                                        v_id, 
                                                        v_name, p_v_id, 
                                                        COUNT(*) as total
                                                    FROM m_vendor
                                                    LEFT OUTER JOIN m_project ON m_vendor.v_id=m_project.p_v_id
                                                    WHERE p_status <> 51
                                                    GROUP BY v_id"; 
                                            
                                            $query  = mysqli_query($konek, $sql);
                                            //$query1 = mysqli_query($konek, $sql1);
                                            
                                            $no = 1;
                                            while($data = mysqli_fetch_array($query)){ ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td>
                                                        <a href="?modul=vendor_progress&id=<?php echo $data['v_id']?>">
                                                            <?php echo $data['v_name']; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="?modul=vendor_progress&id=<?php echo $data['v_id']?>">
                                                            <?php 
                                                            if ($data['p_v_id'] != 0 or $data['p_v_id'] != null){echo $data['total'];}
                                                            else{ echo "0";}
                                                            ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="?modul=vendor_progress&id=<?php echo $data['v_id']?>">
                                                            <span class="label label-info label-mini">Detail</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php 
                                            $no++;
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>    
                            </div>
                        </section>
                    </div>
                </div>

            <?php 
            } ?>