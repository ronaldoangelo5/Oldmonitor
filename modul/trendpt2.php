                    <table class="table  table-hover general-table">
                        <thead>
                        <tr>
                            <th>PTL</th>
                            <th>SO Closed</th>
                            <th>SO On Progress</th>
                            <th>Total SO</th>
                            <th>Persentase</th>
                            <th>Progress</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                            <tr>
                                <td><?php echo $hp2['nameptl']; ?></td>
                                <td><?php echo $hc2['countid'] ?></td>
                                <td><?php echo $hp2['countid'] ?></td>
                                <td><?php echo $hc2['countid'] + $hp2['countid'] ?></td>
                                <td><?php echo $persentase = sprintf("%0.0f" , (($hc2['countid'] / ($hc2['countid'] + $hp2['countid'])) * 100))."%" ?></td>
                                
                                <?php 
                                    if($persentase >= 80){
                                        $color  = "label-success";
                                        $desc   = "Bagus";
                                    } elseif($persentase >= 70 AND $persentase < 80){
                                        $color  = "label-warning";
                                        $desc   = "Sedang";
                                    } else{
                                        $color  = "label-danger";
                                        $desc   = "Jelek";
                                    }
                                ?>
                                <td><span class="label <?php echo $color?> label-mini"><?php echo $desc ?></span></td>
                            </tr>


                        </tbody>
                    </table>