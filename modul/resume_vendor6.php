<table class="table  table-hover general-table">
    <thead>
    <tr>
        <th>Vendor</th>
        <th>V(n)</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
        for($i=0;$i<=$d99-1;$i++){
            $x1[] = sprintf("%0.4f", ($d6[$i] / sqrt(array_sum($c1)) * 0.40));
            $x2[] = sprintf("%0.4f", ($d7[$i] / sqrt(array_sum($c2)) * 0.30));
            $x3[] = sprintf("%0.4f", ($d8[$i] / sqrt(array_sum($c3)) * 0.30));
            //$x4[] = sprintf("%0.4f", ($d9[$i] / sqrt(array_sum($c4)) * 0.25));
        ?>
        <?php
        }

        ?>
    </tbody>
    <tbody>
        
        <?php 
        for($i=0;$i<=$d99-1;$i++){ ?>
            <tr>
                <td><?php echo $d2[$i]; ?></td>
                
                    <?php   
                        $rank[$i] =    
                        (sqrt(
                            pow(json_decode(min($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
                            pow(json_decode(max($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
                            pow(json_decode(max($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
                            //+ pow(json_decode(max($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
                            ))
                            /
                            (sqrt(
                                pow(json_decode(max($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
                                pow(json_decode(min($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
                                pow(json_decode(min($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2)
                                //+ pow(json_decode(min($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
                                )
                            +
                            sqrt(
                                pow(json_decode(min($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
                                pow(json_decode(max($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
                                pow(json_decode(max($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
                                //+ pow(json_decode(max($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
                                )
                            );
                       
                    ?>
                
                <td><?php echo $rr = $rank[$i] ?></td>
                
                <?php 

                $sqlain = "SELECT * FROM m_dec_tb WHERE d_min < $rr AND d_max > $rr";
                $queryn = mysqli_query($konek, $sqlain);
                $fetchn = mysqli_fetch_array($queryn);

                $desc   = $fetchn['d_action'];
                
                /*
                if($rank <= 0.35 && $rank > 0){
                    $color  = "label-success";
                    $desc   = "Bagus";
                }elseif($rank <= 0.50 && $rank > 0.32){
                    $color  = "label-warning";
                    $desc   = "Sedang";
                }
                else{
                    $color  = "label-danger";
                    $desc   = "Jelek";
                }
                */

                ?>

                <td><span class="label label-danger label-mini"><?php echo $desc ?></span></td>

            </tr>
        <?php } 
        ?>

    </tbody>
</table>