<?php 
/*                                            
$sql = "SELECT v_id, v_name, COUNT(r_p_id) as countp, SUM(aging) as agingt FROM (
            SELECT 
                *,
                datediff(MAX(r_input_date), MIN(r_input_date)) as aging
            FROM 
                m_progress
            LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
            LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
            WHERE 
                r_p_status IN (12,43) AND 
                (p_status = 51 or r_p_status = 51) AND 
                (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0)
            GROUP BY 
                r_p_id
        ) A
        WHERE 
            aging <> 0 
        GROUP BY 
            v_name";
*/


//SO closed

/*
$sql = "SELECT *, SUM(aging) as aging55, COUNT(r_p_id) as count55 FROM (
            SELECT * FROM (
                SELECT 
                    v_name, 
                    r_p_id, MIN(r_input_date) AS Column1, 
                    MAX(r_input_date) AS Column2,
                    datediff(MAX(r_input_date), MIN(r_input_date)) as aging
                FROM m_progress
                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                WHERE 
                    r_p_status IN (12,43) AND 
                    (p_status = 51 or r_p_status = 51) AND 
                    (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0)
                GROUP BY r_p_id
            ) A
            where aging <> 0
        ) B
        WHERE v_name IS NOT NULL
        GROUP BY 
            v_name
        ORDER BY count55 DESC";
*/


$sql2 = "SELECT *, SUM(aging) as aging55, COUNT(r_p_id) as count55, (SUM(aging)/COUNT(r_p_id)) as sum1 FROM (
            SELECT * FROM (
                SELECT 
                    v_name, 
                    r_p_id, 
                    (r_input_date) AS Column1, 
                    -- MAX(r_input_date) AS Column2,
                    -- datediff(MAX(r_input_date), MIN(r_input_date)) as aging
                    p_bai_date AS Column2,
                    datediff(p_bai_date, c_dispo_date) as aging
                FROM m_progress
                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                WHERE 
                    -- r_p_status IN (12) AND 
                    (p_status = 51) AND 
                    (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0)
                GROUP BY r_p_id
            ) A
            where aging > 0
        ) B
        WHERE v_name IS NOT NULL
        GROUP BY 
            v_name
        ORDER BY count55 DESC";

$sql = "SELECT *, SUM(aging) as aging55, COUNT(r_p_id) as count55, (SUM(aging)/COUNT(r_p_id)) as sum1 FROM (
            SELECT 
                *, 
                datediff(bai, creates) as crea,
                -- datediff(bai, dispos) as disp,
                (CASE WHEN (dispo <= 0) THEN datediff(bai, creates) ELSE datediff(bai, dispos) END) as aging
            FROM (
                SELECT 
                    v_name, 
                    r_p_id, 
                    (r_input_date) AS rinput,
                    p_bai_date AS bai,
                    c_dispo_date AS dispos,
                    c_created_date AS creates,
                    datediff(p_bai_date, c_dispo_date) as dispo
                FROM m_progress
                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                WHERE 
                    -- r_p_status IN (12) AND 
                    (p_status = 51) AND 
                    (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0)
                GROUP BY r_p_id
            ) x
        ) y
        WHERE v_name IS NOT NULL
        GROUP BY v_name
        ORDER BY count55 DESC";


/*
$sql = "SELECT *, SUM(aging) as aging55, COUNT(r_p_id) as count55 FROM (
            SELECT * FROM (
                SELECT 
                    v_name, 
                    r_p_id, MIN(r_input_date) AS Column1, 
                    datediff(now(), MIN(r_input_date)) as aging
                FROM m_progress
                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                WHERE (p_status <> 51) AND 
                    (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0)
                GROUP BY r_p_id
            ) A
            where aging <> 0
        ) B
        WHERE v_name IS NOT NULL
        GROUP BY 
            v_name
        ORDER BY count55 DESC";
*/

$query  = mysqli_query($konek, $sql);
$count55 = mysqli_num_rows($query);

while($data = mysqli_fetch_array($query)){
    $ii[] = $data['count55'];
    $jj[] = $data['aging55'];
}

$sum55 = array_sum($jj) / array_sum($ii);