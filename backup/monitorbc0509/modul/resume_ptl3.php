<?php

$pc0 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging
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
                    WHERE 
                    (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                ) x
            ) y
        ) z ";

$pp0 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging
                -- idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                ) x
            ) y
        ) z ";


$sc0 = mysqli_query($konek, $pc0);
$hc0 = mysqli_fetch_array($sc0);
//$cc0 = mysqli_num_rows($sc0);
$dc0 = $hc0['total'];

$sp0 = mysqli_query($konek, $pp0);
$hp0 = mysqli_fetch_array($sp0);
//$cp0 = mysqli_num_rows($sp0);
$dp0 = $hp0['total'];


$pc2 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 2
                ) x
            ) y
        ) z ";

$pp2 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 2
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



$pc3 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE 
                    (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 3
                ) x
            ) y
        ) z ";

$pp3 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 3
                ) x
            ) y
        ) z ";

$sc3 = mysqli_query($konek, $pc3);
$hc3 = mysqli_fetch_array($sc3);
$cc3 = mysqli_num_rows($sc3);
$dc3 = $hc3['total'];

$sp3 = mysqli_query($konek, $pp3);
$hp3 = mysqli_fetch_array($sp3);
$cp3 = mysqli_num_rows($sp3);
$dp3 = $hp3['total'];



$pc4 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 4
                ) x
            ) y
        ) z ";

$pp4 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 4
                ) x
            ) y
        ) z ";

$sc4 = mysqli_query($konek, $pc4);
$hc4 = mysqli_fetch_array($sc4);
$cc4 = mysqli_num_rows($sc4);
$dc4 = $hc4['total'];

$sp4 = mysqli_query($konek, $pp4);
$hp4 = mysqli_fetch_array($sp4);
$cp4 = mysqli_num_rows($sp4);
$dp4 = $hp4['total'];




$pc5 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 5
                ) x
            ) y
        ) z ";

$pp5 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 5
                ) x
            ) y
        ) z ";

$sc5 = mysqli_query($konek, $pc5);
$hc5 = mysqli_fetch_array($sc5);
$cc5 = mysqli_num_rows($sc5);
$dc5 = $hc5['total'];

$sp5 = mysqli_query($konek, $pp5);
$hp5 = mysqli_fetch_array($sp5);
$cp5 = mysqli_num_rows($sp5);
$dp5 = $hp5['total'];



$pc6 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 6
                ) x
            ) y
        ) z ";

$pp6 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 6
                ) x
            ) y
        ) z ";

$sc6 = mysqli_query($konek, $pc6);
$hc6 = mysqli_fetch_array($sc6);
$cc6 = mysqli_num_rows($sc6);
$dc6 = $hc6['total'];

$sp6 = mysqli_query($konek, $pp6);
$hp6 = mysqli_fetch_array($sp6);
$cp6 = mysqli_num_rows($sp6);
$dp6 = $hp6['total'];



$pc7 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 7
                ) x
            ) y
        ) z ";

$pp7 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 7
                ) x
            ) y
        ) z ";

$sc7 = mysqli_query($konek, $pc7);
$hc7 = mysqli_fetch_array($sc7);
$cc7 = mysqli_num_rows($sc7);
$dc7 = $hc7['total'];

$sp7 = mysqli_query($konek, $pp7);
$hp7 = mysqli_fetch_array($sp7);
$cp7 = mysqli_num_rows($sp7);
$dp7 = $hp7['total'];




$pc8 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 8
                ) x
            ) y
        ) z ";

$pp8 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 8
                ) x
            ) y
        ) z ";

$sc8 = mysqli_query($konek, $pc8);
$hc8 = mysqli_fetch_array($sc8);
$cc8 = mysqli_num_rows($sc8);
$dc8 = $hc8['total'];

$sp8 = mysqli_query($konek, $pp8);
$hp8 = mysqli_fetch_array($sp8);
$cp8 = mysqli_num_rows($sp8);
$dp8 = $hp8['total'];



$pc9 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 9
                ) x
            ) y
        ) z ";

$pp9 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 9
                ) x
            ) y
        ) z ";

$sc9 = mysqli_query($konek, $pc9);
$hc9 = mysqli_fetch_array($sc9);
$cc9 = mysqli_num_rows($sc9);
$dc9 = $hc9['total'];

$sp9 = mysqli_query($konek, $pp9);
$hp9 = mysqli_fetch_array($sp9);
$cp9 = mysqli_num_rows($sp9);
$dp9 = $hp9['total'];



$pc10 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 10
                ) x
            ) y
        ) z ";

$pp10 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 10
                ) x
            ) y
        ) z ";

$sc10 = mysqli_query($konek, $pc10);
$hc10 = mysqli_fetch_array($sc10);
$cc10 = mysqli_num_rows($sc10);
$dc10 = $hc10['total'];

$sp10 = mysqli_query($konek, $pp10);
$hp10 = mysqli_fetch_array($sp10);
$cp10 = mysqli_num_rows($sp10);
$dp10 = $hp10['total'];



$pc12 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 12
                ) x
            ) y
        ) z ";

$pp12 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 12
                ) x
            ) y
        ) z ";

$sc12 = mysqli_query($konek, $pc12);
$hc12 = mysqli_fetch_array($sc12);
$cc12 = mysqli_num_rows($sc12);
$dc12 = $hc12['total'];

$sp12 = mysqli_query($konek, $pp12);
$hp12 = mysqli_fetch_array($sp12);
$cp12 = mysqli_num_rows($sp12);
$dp12 = $hp12['total'];



$pc13 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 13
                ) x
            ) y
        ) z ";

$pp13 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 13
                ) x
            ) y
        ) z ";

$sc13 = mysqli_query($konek, $pc13);
$hc13 = mysqli_fetch_array($sc13);
$cc13 = mysqli_num_rows($sc13);
$dc13 = $hc13['total'];

$sp13 = mysqli_query($konek, $pp13);
$hp13 = mysqli_fetch_array($sp13);
$cp13 = mysqli_num_rows($sp13);
$dp13 = $hp13['total'];




$pc14 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 14
                ) x
            ) y
        ) z ";

$pp14 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 14
                ) x
            ) y
        ) z ";

$sc14 = mysqli_query($konek, $pc14);
$hc14 = mysqli_fetch_array($sc14);
$cc14 = mysqli_num_rows($sc14);
$dc14 = $hc14['total'];

$sp14 = mysqli_query($konek, $pp14);
$hp14 = mysqli_fetch_array($sp14);
$cp14 = mysqli_num_rows($sp14);
$dp14 = $hp14['total'];


$pc15 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 15
                ) x
            ) y
        ) z ";

$pp15 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 15
                ) x
            ) y
        ) z ";

$sc15 = mysqli_query($konek, $pc15);
$hc15 = mysqli_fetch_array($sc15);
$cc15 = mysqli_num_rows($sc15);
$dc15 = $hc15['total'];

$sp15 = mysqli_query($konek, $pp15);
$hp15 = mysqli_fetch_array($sp15);
$cp15 = mysqli_num_rows($sp15);
$dp15 = $hp15['total'];



$pc16 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
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
                    WHERE (bb.p_status = 51 OR bb.p_bai_date IS NOT NULL)
                    AND cc.u_id = 16
                ) x
            ) y
        ) z ";

$pp16 = "SELECT 
            *, 
            SUM(sumaging / countid) as total 
        FROM ( 
            SELECT 
                -- idc, 
                COUNT(idc) as countid, 
                SUM(aging44) as sumaging,
                idu 
            FROM (
                SELECT 
                *, 
                (CASE WHEN (dispo <= 0) THEN datediff(now(), creates) ELSE datediff(now(), dispos) END) as aging44 
                FROM (
                    SELECT 
                        aa.c_id as idc, 
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
                    AND cc.u_id = 16
                ) x
            ) y
        ) z ";

$sc16 = mysqli_query($konek, $pc16);
$hc16 = mysqli_fetch_array($sc16);
$cc16 = mysqli_num_rows($sc16);
$dc16 = $hc16['total'];

$sp16 = mysqli_query($konek, $pp16);
$hp16 = mysqli_fetch_array($sp16);
$cp16 = mysqli_num_rows($sp16);
$dp16 = $hp16['total'];
?>