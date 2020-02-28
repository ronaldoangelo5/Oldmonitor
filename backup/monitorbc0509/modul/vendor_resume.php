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
                                            <th>PID</th>
                                            <th>Start</th>
                                            <th>End</th>
                                            <th>Aging</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            
                                            $sql = "SELECT * FROM (
                                                        SELECT 
                                                            v_name, 
                                                            r_p_id, MIN(r_input_date) AS Column1, 
                                                            MAX(r_input_date) AS Column2,
                                                            datediff(MAX(r_input_date), MIN(r_input_date)) as aging
                                                        FROM m_progress
                                                        LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                                                        LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                                                        WHERE r_p_status IN (12,43)
                                                        AND (p_status = 51 or r_p_status = 51)
                                                        AND (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0)
                                                        GROUP BY r_p_id
                                                    ) A
                                                    where aging <> 0";
                                            
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
                                                            <?php echo $b = $data['Column1'];?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#">
                                                            <?php echo $c = $data['Column2'];?>
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="#">
                                                            <?php
                                                                /*
                                                                $d 		= date('Y-m-d', strtotime($b));
                                                                $e 		= date('Y-m-d', strtotime($c));

                                                                $CheckInX 	= explode("-", $d);
                                                                $CheckOutX 	= explode("-", $e);
                                                                $date1 		= mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
                                                                $date2 		= mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
                                                                $interval 	= ($date2 - $date1)/(3600*24);
                                                                if($interval == 0){
                                                                    echo "-";
                                                                }
                                                                else{
                                                                    echo $interval." days";
                                                                }
                                                                */
                                                                echo $data['aging'];
                                                            ?>
                                                        </a>
                                                    </td>
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