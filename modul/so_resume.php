                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            
                            <div class="panel-body">
                                <?php 
                                /*
                                $sql2   =  "SELECT * FROM m_progress
                                                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                                                WHERE m_project.p_status = 51
                                                AND r_p_status = 0
                                                GROUP BY r_p_id
                                                ORDER BY p_id ASC";
                                    $query2 = mysqli_query($konek, $sql2);
                                    
                                    while($data2 = mysqli_fetch_array($query2)){
                                        $data21 = $data2['p_id'];
                                        $data22 = $data2['r_input_date'];
                                        $array[] = $data21.", ".$data22;
                                    }
                                    
                                    $dec = json_encode($array);
                                    echo $dec."<br/><br/>";

                                    $sql3   =  "SELECT * FROM m_progress
                                                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                                                LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                                                WHERE p_status = 51
                                                AND r_p_status = 0
                                                GROUP BY r_p_id
                                                ORDER BY p_id ASC";
                                    
                                    $query3 = mysqli_query($konek, $sql3);
                                    while($data3 = mysqli_fetch_array($query3)){
                                        $data31[] = $data3['c_created_date'];
                                    }

                                    $dec2 = json_encode($data31);
                                    echo $dec2;
                                    echo $dec."<br/><br/>";

                                    
                                    $sql4   =  "SELECT * FROM m_crm2
                                                LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                                                LEFT JOIN m_progress ON m_project.p_id=m_progress.r_p_id
                                                WHERE p_status = 51
                                                AND r_p_status = 11
                                                GROUP BY r_p_id
                                                ORDER BY p_id ASC";
                                    
                                    $query4 = mysqli_query($konek, $sql4);
                                    while($data4 = mysqli_fetch_array($query4)){
                                        $data41[] = $data4['c_created_date'];
                                    }

                                    $dec3 = json_encode($data41);
                                    echo $dec3;
                                */
                                ?>

                                
                                <div class="adv-table">
                                    <table class=" table table-hover general-table" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                
                                                <th>rpid</th>
                                                <th>now</th>
                                                <th>date</th>
                                                <th>aging</th>
                                                <th>aging</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                /*
                                                $sql = "SELECT v_name, r_p_id, r_input_date FROM m_progress
                                                        LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                                                        LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id
                                                        WHERE p_status = 51
                                                        ORDER BY p_id ASC";
                                                
                                                
                                                $query  = mysqli_query($konek, $sql);
                                                
                                                $no = 1;
                                                while($data = mysqli_fetch_array($query)){ ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['v_name']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['r_p_id'];?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $b = $data['r_input_date'];?>
                                                            </a>
                                                        </td>
                                                        
                                                <?php 
                                                $no++;
                                                }
                                                */

                                                  
                                                $sql = "SELECT *, 
                                                            now() as now,
                                                            GROUP_CONCAT(CONCAT(' ', month(now()) - month(m_progress.r_input_date))) as agings,
                                                            m_crm2.c_created_date as 'date',
                                                            GROUP_CONCAT(CONCAT(' ', datediff(m_progress.r_input_date, m_crm2.c_created_date))) as aging,
                                                            m_project.p_id as 'id',
                                                            GROUP_CONCAT(CONCAT(' ', m_progress.r_p_status)) as 'rid',
                                                            GROUP_CONCAT(CONCAT(' ', m_progress.r_input_date)) as 'option'
                                                        FROM 
                                                            m_project, m_progress, m_crm2
                                                        WHERE 
                                                            m_project.p_id=m_progress.r_p_id AND
                                                            m_project.p_c_id=m_crm2.c_id
                                                        GROUP BY 
                                                            m_progress.r_p_id
                                                        ORDER BY
                                                            m_progress.r_p_status ASC";

                                                
                                                
                                                $query  = mysqli_query($konek, $sql);
                                                
                                                
                                                $no = 1;
                                                while($data = mysqli_fetch_array($query)){ ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['id']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['rid']; ?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['date'];?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="#">
                                                                <?php echo $data['option'];?>
                                                            </a>
                                                        </td>
                                                        <td>
                                                        <a href="#">
                                                                <?php echo $data['aging'];?>
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