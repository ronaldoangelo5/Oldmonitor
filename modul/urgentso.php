
<table class="table  table-hover general-table">
    <thead>
        <tr>
            <th>Closed</th>
            <th>Progress</th>
            <th>Persentase</th>
            <th>Target</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $pa51 ?></td>
            <td><?php echo $pap = $pa0 - $pa51 ?></td>
            <td>
                <?php echo $persentase = sprintf("%0.2f", ($pa51 / $pa0) * 100)?>
            </td>
            <td>80</td>
            
            <?php
                if($persentase < 80){
                    $color  = "label-danger";
                    $desc   = "jelek";
                }
                else{
                    $color  = "label-success";
                    $desc   = "bagus";
                }
            ?>
            <td><span class="label <?php echo $color?> label-mini"><?php echo $desc ?></span></td>
        </tr>
    </tbody>
</table>