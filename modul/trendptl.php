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

                        <tr>
                            <td><?php echo $hp3['nameptl']; ?></td>
                            <td><?php echo $hc3['countid'] ?></td>
                            <td><?php echo $hp3['countid'] ?></td>
                            <td><?php echo $hc3['countid'] + $hp3['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc3['countid'] / ($hc3['countid'] + $hp3['countid'])) * 100))."%" ?></td>
                            
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

                        <tr>
                            <td><?php echo $hp4['nameptl']; ?></td>
                            <td><?php echo $hc4['countid'] ?></td>
                            <td><?php echo $hp4['countid'] ?></td>
                            <td><?php echo $hc4['countid'] + $hp4['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc4['countid'] / ($hc4['countid'] + $hp4['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp5['nameptl']; ?></td>
                            <td><?php echo $hc5['countid'] ?></td>
                            <td><?php echo $hp5['countid'] ?></td>
                            <td><?php echo $hc5['countid'] + $hp5['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc5['countid'] / ($hc5['countid'] + $hp5['countid'])) * 100))."%" ?></td>
                            
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

                        <tr>
                            <td><?php echo $hp6['nameptl']; ?></td>
                            <td><?php echo $hc6['countid'] ?></td>
                            <td><?php echo $hp6['countid'] ?></td>
                            <td><?php echo $hc6['countid'] + $hp6['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc6['countid'] / ($hc6['countid'] + $hp6['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp7['nameptl']; ?></td>
                            <td><?php echo $hc7['countid'] ?></td>
                            <td><?php echo $hp7['countid'] ?></td>
                            <td><?php echo $hc7['countid'] + $hp7['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc7['countid'] / ($hc7['countid'] + $hp7['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp8['nameptl']; ?></td>
                            <td><?php echo $hc8['countid'] ?></td>
                            <td><?php echo $hp8['countid'] ?></td>
                            <td><?php echo $hc8['countid'] + $hp8['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc8['countid'] / ($hc8['countid'] + $hp8['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp9['nameptl']; ?></td>
                            <td><?php echo $hc9['countid'] ?></td>
                            <td><?php echo $hp9['countid'] ?></td>
                            <td><?php echo $hc9['countid'] + $hp9['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc9['countid'] / ($hc9['countid'] + $hp9['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp10['nameptl']; ?></td>
                            <td><?php echo $hc10['countid'] ?></td>
                            <td><?php echo $hp10['countid'] ?></td>
                            <td><?php echo $hc10['countid'] + $hp10['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc10['countid'] / ($hc10['countid'] + $hp10['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp12['nameptl']; ?></td>
                            <td><?php echo $hc12['countid'] ?></td>
                            <td><?php echo $hp12['countid'] ?></td>
                            <td><?php echo $hc12['countid'] + $hp12['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc12['countid'] / ($hc12['countid'] + $hp12['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp13['nameptl']; ?></td>
                            <td><?php echo $hc13['countid'] ?></td>
                            <td><?php echo $hp13['countid'] ?></td>
                            <td><?php echo $hc13['countid'] + $hp13['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc13['countid'] / ($hc13['countid'] + $hp13['countid'])) * 100))."%" ?></td>
                            
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


                        <tr>
                            <td><?php echo $hp14['nameptl']; ?></td>
                            <td><?php echo $hc14['countid'] ?></td>
                            <td><?php echo $hp14['countid'] ?></td>
                            <td><?php echo $hc14['countid'] + $hp14['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc14['countid'] / ($hc14['countid'] + $hp14['countid'])) * 100))."%" ?></td>
                            
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



                        <tr>
                            <td><?php echo $hp15['nameptl']; ?></td>
                            <td><?php echo $hc15['countid'] ?></td>
                            <td><?php echo $hp15['countid'] ?></td>
                            <td><?php echo $hc15['countid'] + $hp15['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc15['countid'] / ($hc15['countid'] + $hp15['countid'])) * 100))."%" ?></td>
                            
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



                        <tr>
                            <td><?php echo $hp16['nameptl']; ?></td>
                            <td><?php echo $hc16['countid'] ?></td>
                            <td><?php echo $hp16['countid'] ?></td>
                            <td><?php echo $hc16['countid'] + $hp16['countid'] ?></td>
                            <td><?php echo $persentase = sprintf("%0.0f" , (($hc16['countid'] / ($hc16['countid'] + $hp16['countid'])) * 100))."%" ?></td>
                            
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