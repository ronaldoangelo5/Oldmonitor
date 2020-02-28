<?php

/*
$sql2 = "SELECT groupdate, COUNT(c_id) as countp, SUM(aging) as agingp FROM ( 
            SELECT 
                m_crm2.c_id, m_crm2.c_created_date as mulai, 
                m_project.p_closed_date as akhir, 
                DATE(m_project.p_closed_date) as groupdate, 
                CONCAT(datediff(m_project.p_closed_date, m_crm2.c_created_date)) as aging 
            FROM m_project, m_crm2 
            WHERE m_project.p_c_id=m_crm2.c_id 
            AND m_project.p_status=51 
            AND m_project.p_closed_date IS NOT NULL ORDER BY c_id ASC 
        ) A 
        GROUP BY groupdate 
        ORDER BY groupdate 
        DESC LIMIT 10";



$sqlx = "SELECT groupdate, countp, agingp FROM (
            SELECT groupdate, COUNT(c_id) as countp, SUM(aging) as agingp FROM ( 
                SELECT 
                    m_crm2.c_id, m_crm2.c_created_date as mulai, 
                    m_project.p_closed_date as akhir, 
                    DATE(m_project.p_closed_date) as groupdate, 
                    CONCAT(datediff(m_project.p_closed_date, m_crm2.c_created_date)) as aging 
                FROM m_project, m_crm2 
                WHERE m_project.p_c_id=m_crm2.c_id 
                AND m_project.p_status=51 
                AND m_project.p_closed_date IS NOT NULL ORDER BY c_id ASC 
            ) ABC 
            GROUP BY groupdate 
            ORDER BY groupdate 
            DESC LIMIT 10 
        ) DEF
        ORDER BY groupdate ASC";
*/

/*
$sql = "SELECT 
            groupdate, 
            countp, 
            agingp 
            FROM ( 
            SELECT 
                groupdate, 
                COUNT(a.c_id) as countp, 
                SUM(aging) as agingp FROM ( 
                SELECT 
                    a.c_id,
                    a.c_created_date as mulai, 
                    b.p_closed_date as akhir, 
                    DATE(b.p_closed_date) as groupdate, 
                    datediff(b.p_closed_date, a.c_created_date) as aging 
                    FROM 
                        m_project b, 
                        m_crm2 a
                    WHERE 
                        b.p_c_id=a.c_id 
                        AND b.p_status=51 
                        AND b.p_closed_date IS NOT NULL 
                    ORDER BY a.c_id ASC 
            ) A 
            GROUP BY groupdate 
            ORDER BY groupdate 
            DESC LIMIT 10 
            ) B 
            ORDER BY groupdate ASC";
*/

/*
$sql = "SELECT 
            groupdate, 
            countp, 
            agingp 
            FROM ( 
            SELECT 
                groupdate, 
                COUNT(a.c_id) as countp, 
                SUM(aging) as agingp
                FROM
                    ( 
                    SELECT 
                        a.c_id,
                        a.c_dispo_date as mulai,
                        b.p_bai_date as akhir, 
                        DATE(b.p_bai_date) as groupdate, 
                        datediff(b.p_bai_date, a.c_dispo_date) as aging
                    FROM 
                        m_project b, 
                        m_crm2 a
                    WHERE 
                        b.p_c_id=a.c_id 
                        AND b.p_status=51 
                    ORDER BY a.c_id ASC 
            ) A
            WHERE aging > 0
            GROUP BY groupdate 
            ORDER BY groupdate 
            DESC LIMIT 10 
            ) B 
            ORDER BY groupdate ASC";
*/

/*
$sql = "SELECT * FROM (
            SELECT 
                groupdate, 
                COUNT(cid) as countp, 
                SUM(aging) as agingp
                FROM (
                SELECT 
                    *,
                    -- (CASE WHEN (agd <= 0) THEN agc ELSE agd END) as aging
                    agc as aging
                FROM (
                    SELECT 
                        a.c_pa_node_id as pa,
                        a.c_id as cid,
                        a.c_dispo_date as dispos,
                        a.c_created_date as creates,
                        b.p_bai_date as akhir, 
                        DATE(b.p_bai_date) as groupdate,
                        datediff(b.p_bai_date, a.c_dispo_date) as agd,
                        datediff(b.p_bai_date, c_created_date) as agc
                    FROM 
                        m_project b, 
                        m_crm2 a
                    WHERE 
                        b.p_c_id=a.c_id 
                        AND b.p_status=51 
                    ORDER BY a.c_id ASC 
                ) x
                -- WHERE groupdate = '2018-08-15'
            ) y
            GROUP BY groupdate 
            ORDER BY groupdate 
            -- DESC LIMIT 10
        ) z 
        ORDER BY groupdate ASC";
*/

$sql = "SELECT * FROM (
            SELECT 
                groupdate, 
                COUNT(cid) as countp, 
                SUM(aging) as agingp
                FROM (
                SELECT 
                    *,
                    -- (CASE WHEN (agd <= 0) THEN agc ELSE agd END) as aging
                    age as aging
                FROM (
                    SELECT 
                        a.c_pa_node_id as pa,
                        a.c_id as cid,
                        a.c_dispo_date as dispos,
                        a.c_created_date as creates,
                        b.p_bai_date as akhir, 
                        MONTH(a.c_created_date) as groupdate,
                        -- datediff(b.p_bai_date, a.c_dispo_date) as agd,
                        -- datediff(b.p_bai_date, c_created_date) as agc,
                        -- IFNULL(datediff(b.p_bai_date, a.c_created_date), (datediff(DATE_FORMAT(NOW(), '%Y-%m-%d'),a.c_created_date))) as age, 
                        IFNULL(datediff(a.c_bai_date, a.c_created_date), (datediff(DATE_FORMAT(NOW(), '%Y-%m-%d'),a.c_created_date))) as age
                        -- a.c_bai_date
                    FROM 
                        m_project b, 
                        m_crm2 a
                    WHERE 
                        b.p_c_id=a.c_id 
                    AND a.c_created_date >= '2019-01-01'
                    AND a.c_status <> 'cancelled'
                        -- AND b.p_status=51  
                    ORDER BY `cid`  DESC
                ) x
                WHERE groupdate IS NOT NULL
                -- AND creates >= '2019-01-01'
            ) y
            GROUP BY groupdate 
            ORDER BY groupdate 
            -- DESC LIMIT 10
        ) z 
        ORDER BY groupdate ASC";


//$query  = mysqli_query($konek, $sql);


//$aa = array();

$query    = mysqli_query($konek, $sql);
$countd   = mysqli_num_rows($query);

while ($data = mysqli_fetch_array($query)){

    $aa[] = $data['groupdate'];
    $bb[] = $data['countp'];
    $cc[] = $data['agingp'];
}
    //$aaa = json_encode($cc);

    $sumtd = array_sum($cc) / array_sum($bb);
    $sumtd = sprintf('%0.0f', $sumtd);
?>