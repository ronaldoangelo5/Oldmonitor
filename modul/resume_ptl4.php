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
    <?php
        $usql   = "SELECT * FROM m_user WHERE u_level = 2";
        $uquery = mysqli_query($konek, $usql);
        while($udata = mysqli_fetch_array($uquery)){
            $uid = $udata['u_id'];
            $nama = $udata['u_name_crm'];

            $pc2 = "SELECT 
                        *, 
                        SUM(sumaging / countid) as total 
                    FROM ( 
                        SELECT 
                            *,
                            COUNT(idc) as countid, 
                            SUM(aging44) as sumaging
                        FROM (
                            SELECT 
                            *, 
                            (CASE WHEN (dispo <= 0) THEN datediff(bais, creates) ELSE datediff(bais, dispos) END) as aging44 
                            FROM (
                                SELECT 
                                    aa.c_id AS idc, 
                                    cc.u_name_crm AS nameptl,
                                    aa.c_created_date AS creates, 
                                    aa.c_dispo_date AS dispos, 
                                    bb.p_bai_date AS bais, 
                                    bb.p_status as stat, 
                                    cc.u_id as idu,
                                    datediff(bb.p_bai_date, aa.c_created_date) as createss,
                                    datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
                                FROM m_crm2 aa 
                                LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
                                INNER JOIN m_user cc ON aa.c_pic=cc.u_name_crm 
                                -- WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                                WHERE (bb.p_status = 51)
                                AND cc.u_id = $uid
                            ) x
                        ) y
                    ) z ";

            $pp2 = "SELECT 
                        *, 
                        SUM(sumaging / countid) as total 
                    FROM ( 
                        SELECT 
                            *, 
                            COUNT(idc) as countid, 
                            SUM(aging44) as sumaging
                        FROM (
                            SELECT 
                            *, 
                            (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                            FROM (
                                SELECT 
                                    aa.c_id as idc, 
                                    cc.u_name_crm AS nameptl,
                                    aa.c_created_date AS creates, 
                                    aa.c_dispo_date AS dispos, 
                                    bb.p_status as stat, 
                                    cc.u_id as idu,
                                    datediff(bb.p_bai_date, aa.c_created_date) as createss,
                                    datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
                                FROM m_crm2 aa 
                                LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
                                INNER JOIN m_user cc ON aa.c_pic=cc.u_name_crm 
                                WHERE bb.p_status NOT IN (51, 61) 
                                AND cc.u_id = $uid
                            ) x
                        ) y
                    ) z ";
            
            $sc2 = mysqli_query($konek, $pc2);
            $hc2 = mysqli_fetch_array($sc2);
            $cc2 = mysqli_num_rows($sc2);
            $dc2 = $hc2['total'];

            $sp2 = mysqli_query($konek, $pp2);
            $hp2 = mysqli_fetch_array($sp2);
            $cp2 = mysqli_num_rows($sp2);
            $dp2 = $hp2['total'];
        ?>
            <tr>
                <td><?php echo $nama; ?></td>
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

        <?php
        }

        ?>
    </tbody>
</table>