
<table class="table  table-hover general-table">
    <thead>
        <tr>
            <th>Rata-rata</th>
            <th>Target</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $sumtd ?></td>
            <td>24</td>
            
            
            <?php 
                if($sumtd > 24 ){
                    $desc = "jelek";
                    $color = "label-danger";
                } 
                else{
                   $desc = "bagus";
                   $color = "label-success";
                }
            ?>
            <td><span class="label <?php echo $color?> label-mini"><?php echo $desc ?></span></td>
        </tr>
    </tbody>
</table>