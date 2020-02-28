        <?php
            $lvl = $_SESSION['lvlmon'];
            $uid = $_SESSION['idmon'];

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
        ?>
        
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">

                    <div class="panel-body">
                        <div class="adv-table">
                            <table class=" table table-hover general-table" id="dynamic-table">
                                <thead>
                                    <tr>
                                    <th style="width:10px">No</th>
                                        <th style="width:50px">No. Instalasi</th>
                                        <th style="width:100px">PA Node id</th>
                                        <th style="width:100px">IO Number</th>
                                        <th style="width:150px">Vendor</th>
                                        <th style="width:100px">PIC</th>
                                        <th style="width:100px">Tanggal Order</th>
                                        <!--<th>Attachment</th>-->
                                        <th style="width:50px">Status</th>
                                        <?php if($lvl==1){ ?> <th style="width:220px">Action</th> <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        if($lvl == 1){
                                            $sql    =  "SELECT * FROM m_ppi
                                                        LEFT JOIN m_user ON m_ppi.ppi_by_ptl=m_user.u_id
                                                        LEFT JOIN m_vendor ON m_ppi.ppi_vendor=m_vendor.v_id
                                                        LEFT JOIN m_project ON m_ppi.ppi_project_id=m_project.p_id
                                                        LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                                                        ORDER BY m_ppi.ppi_id DESC";
                                        }
                                        else{
                                            $sql    =  "SELECT * FROM m_ppi
                                                        LEFT JOIN m_user ON m_ppi.ppi_by_ptl=m_user.u_id
                                                        LEFT JOIN m_vendor ON m_ppi.ppi_vendor=m_vendor.v_id
                                                        LEFT JOIN m_project ON m_ppi.ppi_project_id=m_project.p_id
                                                        LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                                                        WHERE ppi_by_ptl=$uid
                                                        ORDER BY m_ppi.ppi_id DESC";
                                        }
                                        
                                        $query  = mysqli_query($konek, $sql);
                                        
                                        while($data = mysqli_fetch_array($query)){ ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><a href="assets/<?php echo $data['ppi_attachment'];?>"><?php echo $data['ppi_no_instalasi'];?></a></td>
                                            <td><a href="assets/<?php echo $data['ppi_attachment'];?>"><?php echo $data['c_pa_node_id'];?></a></td>
                                            <td><a href="assets/<?php echo $data['ppi_attachment'];?>"><?php echo $data['ppi_io_number'];?></a></td>
                                            <td><a href="assets/<?php echo $data['ppi_attachment'];?>"><?php echo $data['v_name'];?></a></td>
                                            <td><?php echo $data['u_name_crm'];?></td>
                                            <td><?php echo date('Y-m-d H:i:s', strtotime($data['ppi_tgl_order']));?></td>
                                            <!--<td><a href="assets/<?php echo $data['ppi_attachment'];?>"><span class="label label-info label-mini">Attachment</span></a></td>-->
                                            <?php 
                                            if($data['ppi_status']==0){
                                                echo '<td><span class="label label-primary label-mini">Unread</span></td>';
                                            }elseif($data['ppi_status']==1){
                                                echo '<td><span class="label label-warning label-mini">forwarded</span></td>';
                                            }else{
                                                echo '<td><span class="label label-success label-mini">Closed</span></td>';
                                            }
                                            ?>
                                            
                                            <?php if($lvl==1){ ?><td>
                                                <?php
                                                if($data['ppi_status']==0){ ?>
                                                    <a href="action/forward.php/?id=<?php echo $data['ppi_id'] ?>"><span class="label label-warning label-mini">Forward</span></a>
                                                    <a href="?modul=edit_ppi&id=<?php echo $data['ppi_id'] ?>"><span class="label label-info label-mini">Edit</span></a>
                                                <?php 
                                                }elseif($data['ppi_status'] == 1){ ?>
                                                    <a href="?modul=edit_ppi&id=<?php echo $data['ppi_id'] ?>"><span class="label label-info label-mini">Edit</span></a>
                                                    <a href="action/reforward.php/?id=<?php echo $data['ppi_id']?>"><span class="label label-primary label-mini">Re-forward</span></a>
                                                    <a href="action/ppi_closed.php/?id=<?php echo $data['ppi_id']?>"><span class="label label-default label-mini">Closed</span></a>
                                                <?php
                                                }
                                                else{
                                                    
                                                }
                                                ?>
                                                
                                            </td>
                                            <?php } ?>
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