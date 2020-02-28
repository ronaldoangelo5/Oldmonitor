<?php 

$spopr = "  SELECT 
                a.c_id,
                a.c_pa_node_id as pa,
                b.p_nilai_po as po,
                b.p_nilai_pr as pr,
                b.p_nilai_gr as gr,
                a.c_created_date
            FROM 
                m_project b, 
                m_crm2 a
            WHERE 
                b.p_c_id = a.c_id
                -- AND (b.p_nilai_po IS NOT NULL AND b.p_nilai_po <> 0)
                AND (b.p_nilai_gr IS NOT NULL AND b.p_nilai_gr <> 0)
            -- ORDER BY a.c_created_date DESC
            ORDER BY b.p_bai_date DESC
            LIMIT 15
            ";

$qpopr = mysqli_query($konek, $spopr);
$cpopr = mysqli_num_rows($qpopr);
//$cpopr = $cpopr + 1;

while ($dpopr = mysqli_fetch_array($qpopr)){
    $mmm[] = $dpopr['pa']/1000000;
    $nnn[] = $dpopr['po']/1000000;
    $ooo[] = $dpopr['pr']/1000000;
    $grrr[] = $dpopr['gr']/1000000;
}

?>