<?php

//SO Closed
/*
$sql44 = "SELECT COUNT(idc) as countid, SUM(aging44) as sumaging, idu FROM (	
            SELECT idc, stat, mulai44, akhir44, datediff(akhir44, mulai44) as aging44, idu FROM (
                SELECT 
                    aa.c_id as idc,
                    aa.c_created_date AS mulai44,
                    bb.p_closed_date AS akhir44,
                    bb.p_status as stat,
                    cc.u_id as idu
                FROM m_crm2 aa
                LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id
                LEFT JOIN m_user cc ON aa.c_pic=cc.u_name_crm
                WHERE bb.p_status = 51
            ) x
            WHERE akhir44 IS NOT null
        ) y 
        GROUP BY idu
        ORDER BY idu ASC";
*/


/*
$sql43 = "SELECT COUNT(idc) as countid, SUM(aging44) as sumaging, idu FROM (	
            SELECT idc, stat, mulai44, akhir44, datediff(akhir44, create44) as agi44, datediff(akhir44, mulai44) as aging44, idu FROM (
                SELECT 
                    aa.c_id as idc,
                    aa.c_created_date AS create44,
                    aa.c_dispo_date AS mulai44,
                    bb.p_bai_date AS akhir44,
                    bb.p_status as stat,
                    cc.u_id as idu
                FROM m_crm2 aa
                LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id
                LEFT JOIN m_user cc ON aa.c_pic=cc.u_name_crm
                WHERE bb.p_status = 51
            ) x
            WHERE akhir44 IS NOT null
            
        ) y 
        WHERE aging44 > 0
        GROUP BY idu
        ORDER BY idu ASC";
*/

if($from2 != "" && $to2 != ""){
    $sql44 = "  SELECT 
                    idc, 
                    COUNT(idc) as countid, 
                    SUM(aging44) as sumaging,
                    idu 
                FROM (
                    SELECT 
                        *, 
                        (CASE WHEN (dispo <= 0) THEN datediff(bais, creates) ELSE datediff(bais, dispos) END) as aging44 
                    FROM ( 
                            SELECT 
                                aa.c_id as idc, 
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
                            WHERE bb.p_status = 51 
                    ) y
                    WHERE bais >= '$n_from'
                    AND bais <= '$n_to'
                    AND bais IS NOT null 
                    ORDER BY `dispo` ASC 
                ) x
                GROUP BY idu
                ORDER BY idu ASC";
}
elseif($from2 == "" && $to2 != ""){
    $sql44 = "  SELECT 
                    idc, 
                    COUNT(idc) as countid, 
                    SUM(aging44) as sumaging,
                    idu 
                FROM (
                    SELECT 
                        *, 
                        (CASE WHEN (dispo <= 0) THEN datediff(bais, creates) ELSE datediff(bais, dispos) END) as aging44 
                    FROM ( 
                            SELECT 
                                aa.c_id as idc, 
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
                            WHERE bb.p_status = 51 
                    ) y
                    WHERE bais <= '$n_to'
                    AND bais IS NOT null 
                    ORDER BY `dispo` ASC 
                ) x
                GROUP BY idu
                ORDER BY idu ASC";
}
elseif($from2 != "" && $to2 == ""){
    $sql44 = "  SELECT 
                    idc, 
                    COUNT(idc) as countid, 
                    SUM(aging44) as sumaging,
                    idu 
                FROM (
                    SELECT 
                        *, 
                        (CASE WHEN (dispo <= 0) THEN datediff(bais, creates) ELSE datediff(bais, dispos) END) as aging44 
                    FROM ( 
                            SELECT 
                                aa.c_id as idc, 
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
                            WHERE bb.p_status = 51 
                    ) y
                    WHERE bais >= '$n_from'
                    AND bais IS NOT null 
                    ORDER BY `dispo` ASC 
                ) x
                GROUP BY idu
                ORDER BY idu ASC";
}
else{
    $sql44 = "  SELECT 
                    idc, 
                    COUNT(idc) as countid, 
                    SUM(aging44) as sumaging,
                    idu 
                FROM (
                    SELECT 
                        *, 
                        (CASE WHEN (dispo <= 0) THEN datediff(bais, creates) ELSE datediff(bais, dispos) END) as aging44 
                    FROM ( 
                            SELECT 
                                aa.c_id as idc, 
                                aa.c_created_date AS creates, 
                                aa.c_dispo_date AS dispos, 
                                bb.p_bai_date AS bais, 
                                bb.p_status as stat, 
                                cc.u_id as idu,
                                datediff(bb.p_bai_date, aa.c_created_date) as createss,
                                datediff(bb.p_bai_date, aa.c_dispo_date) as dispo  
                            FROM m_crm2 aa 
                            LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id 
                            LEFT JOIN m_user cc ON aa.c_pic=cc.u_name_crm 
                            WHERE bb.p_status = 51 
                    ) y
                WHERE bais IS NOT null ORDER BY `dispo` ASC 
                ) x
                -- WHERE aging44 > 0
                GROUP BY idu
                ORDER BY idu ASC";
}




/*
$sql44 = "  SELECT COUNT(idc) as countid, SUM(aging44) as sumaging, idu FROM (	
                SELECT  idc, 
                        stat, 
                        mulai44, 
                        datediff(now(), mulai44) as aging44,
                        -- datediff(baid, mulai44) as agingc,
                        idu 
                FROM (
                    SELECT 
                        aa.c_id as idc,
                        aa.c_dispo_date AS mulai44,
                        bb.p_bai_date AS baid,
                        bb.p_status as stat,
                        cc.u_id as idu
                    FROM m_crm2 aa
                    LEFT JOIN m_project bb ON aa.c_id=bb.p_c_id
                    LEFT JOIN m_user cc ON aa.c_pic=cc.u_name_crm
                    WHERE bb.p_status = 51
                    AND aa.c_pic <> ''
                ) x
            ) y 
            GROUP BY idu
            ORDER BY idu ASC ";
*/

$query44 = mysqli_query($konek, $sql44);
$count44 = mysqli_num_rows($query44);

while($data44 = mysqli_fetch_array($query44)){       
    $countid[] = $data44['countid'];
    $suaging[] = $data44['sumaging'];
    //$agingd[]  = $data44['agingd'];
}
if($count44 > 0){
    $sum44 = (array_sum($suaging) / array_sum($countid));
}
else{
    $sum44 = 0;
}



?>