        <?php 
        
        $ptl = $_SESSION['unamecrm']; 
        
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
                                        <th>No </th>
                                        <th>PA Node ID</th>
                                        <th>Date</th>
                                        <th>Progress</th>
                                        <th>Status Progress</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql    =  "SELECT * FROM m_progress
                                                    LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                                                    LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                                                    LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                                                    LEFT JOIN m_status ON m_progress.r_p_status=m_status.s_code
                                                    LEFT JOIN m_kategori ON m_progress.r_kategori=m_kategori.k_id
                                                    WHERE u_name_crm = '$ptl'
                                                    ORDER BY r_id DESC";
                                        $query  = mysqli_query($konek, $sql);
                                        
                                        while($data = mysqli_fetch_array($query)){ ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['c_pa_node_id'];?></td>
                                            <td><?php echo date('H:i - d M, Y', strtotime($data['r_input_date']));?></td>
                                            <td><?php echo $data['s_desc'];?></td>
                                            
                                            <?php 
                                            if ($data['r_p_status_progress'] == 1){
                                                echo '<td><span class="label label-success label-mini">Done</span></td>';
                                            }
                                            else{
                                                echo '<td><span class="label label-danger label-mini">Hold</span></td>';
                                            }
                                            ?>
                                       
                                            <td><?php echo $data['k_desc'];?></td>
                                            <td><?php echo $data['r_desc'];?></td>
                                            <td>
                                                <?php if($data['r_p_status'] != 0){ ?>
                                                    <a href="?modul=edit_log&id=<?php echo $data['r_id']?>"><span class="label label-warning label-mini">edit</span></a>
                                                <?php }else{?>
                                                    <a href="?modul=edit_log&id=<?php echo $data['r_id']?>"><span class="label label-primary label-mini">edit</span></a>
                                                <?php

                                                } ?>                                                
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