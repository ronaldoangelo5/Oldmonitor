    <?php
        $us   = "SELECT * FROM m_user WHERE u_level = 2 AND u_active = 1";
        $uq  = mysqli_query($konek, $us);
        $nuu  = mysqli_num_rows($uq);

        while($ud = mysqli_fetch_array($uq)){
            $uid  = $ud['u_id'];
            $nama = $ud['u_name_crm'];

            $pc  = "SELECT 
                        *,
                        COUNT(*) as totalc
                    FROM m_crm2 a
                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                    LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
                    WHERE b.p_status IN (51)
                    AND c.u_id = $uid";

            $pp  = "SELECT 
                        *,
                        COUNT(*) as totalp
                    FROM m_crm2 a
                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                    LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
                    WHERE b.p_status NOT IN (51, 61)
                    AND c.u_id = $uid";

            $pl  = "SELECT 
                        *,
                        COUNT(*) as totall
                    FROM m_crm2 a
                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                    LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
                    WHERE b.p_status NOT IN (61)
                    AND c.u_id = $uid";

            $pcc = "SELECT 
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
                                WHERE (bb.p_status = 51)
                                AND cc.u_id = $uid
                            ) x
                        ) y
                    ) z ";

            $ppp = "SELECT 
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
            
            
            $sc = mysqli_query($konek, $pc);
            $hc = mysqli_fetch_array($sc);

            $sp = mysqli_query($konek, $pp);
            $hp = mysqli_fetch_array($sp);
            
            $sl = mysqli_query($konek, $pl);
            $hl = mysqli_fetch_array($sl);

            $scc = mysqli_query($konek, $pcc);
            $hcc = mysqli_fetch_array($scc);
            $ccc = mysqli_num_rows($scc);
            if($hcc['total'] != NULL){
                $dcc = $hcc['total'];
            }else{
                $dcc = 0;
            }
            

            $spp = mysqli_query($konek, $ppp);
            $hpp = mysqli_fetch_array($spp);
            $cpp = mysqli_num_rows($spp);
            if($hpp['total'] != NULL){
                $dpp = $hpp['total'];
            }else{
                $dpp = 0;
            }

            $nmap[] = $nama;
            $r1[]  = $hc['totalc'];
            $r2[]  = $hp['totalp'];
            $r3[]  = $dcc;
            $r4[]  = $dpp;

        }

        for($l=0;$l<$nuu;$l++){
            $s1[] = pow($r1[$l], 2);
            $s2[] = pow($r2[$l], 2);
            $s3[] = pow($r3[$l], 2);
            $s4[] = pow($r4[$l], 2);                
        }
        for($l=0;$l<$nuu;$l++){
            
            $v1 = sprintf("%0.4f", sqrt(array_sum($s1)));
            $v2 = sprintf("%0.4f", sqrt(array_sum($s2)));
            $v3 = sprintf("%0.4f", sqrt(array_sum($s3)));
            $v4 = sprintf("%0.4f", sqrt(array_sum($s4)));

        }


        for($l=0;$l<$nuu;$l++){
            $t1[] = sprintf("%0.4f", $r1[$l] / sqrt(array_sum($s1)) * 0.30);
            $t2[] = sprintf("%0.4f", $r2[$l] / sqrt(array_sum($s2)) * 0.20);
            $t3[] = sprintf("%0.4f", $r3[$l] / sqrt(array_sum($s3)) * 0.30);
            $t4[] = sprintf("%0.4f", $r4[$l] / sqrt(array_sum($s4)) * 0.20);
        }
    

        for($l=0;$l<$nuu;$l++){ 
            $rankptl[$l] = (sqrt(
                                pow(json_decode(min($t1) - ($r1[$l] / sqrt(array_sum($s1)) * 0.30)), 2) 
                                + pow(json_decode(max($t2) - ($r2[$l] / sqrt(array_sum($s2)) * 0.20)), 2) 
                                + pow(json_decode(max($t3) - ($r3[$l] / sqrt(array_sum($s3)) * 0.30)), 2) 
                                + pow(json_decode(max($t4) - ($r4[$l] / sqrt(array_sum($s4)) * 0.20)), 2)
                                ))
                                /
                                (sqrt(
                                    pow(json_decode(max($t1) - ($r1[$l] / sqrt(array_sum($s1)) * 0.30)), 2) 
                                    + pow(json_decode(min($t2) - ($r2[$l] / sqrt(array_sum($s2)) * 0.20)), 2) 
                                    + pow(json_decode(min($t3) - ($r3[$l] / sqrt(array_sum($s3)) * 0.30)), 2)
                                    + pow(json_decode(min($t4) - ($r4[$l] / sqrt(array_sum($s4)) * 0.20)), 2)
                                    )
                                +
                                sqrt(
                                    pow(json_decode(min($t1) - ($r1[$l] / sqrt(array_sum($s1)) * 0.30)), 2) 
                                    + pow(json_decode(max($t2) - ($r2[$l] / sqrt(array_sum($s2)) * 0.20)), 2) 
                                    + pow(json_decode(max($t3) - ($r3[$l] / sqrt(array_sum($s3)) * 0.30)), 2) 
                                    + pow(json_decode(max($t4) - ($r4[$l] / sqrt(array_sum($s4)) * 0.20)), 2)
                                    )
                                );
        }
    
    ?>