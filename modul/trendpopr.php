<table class="table  table-hover general-table">
    <thead>
    <tr>
        
        <th>PA</th>
        <th>PO</th>
        <th>PR</th>
        <th>GR</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>

        <?php
        $sopr = "  SELECT 
                    a.c_id,
                    a.c_pa_node_id as pa,
                    b.p_nilai_po as po,
                    b.p_nilai_pr as pr,
                    b.p_nilai_gr as gr,
                    a.c_created_date,
                    b.p_bai_date
                FROM 
                    m_project b, 
                    m_crm2 a
                WHERE 
                    b.p_c_id = a.c_id
                    -- AND (b.p_nilai_po IS NOT NULL AND b.p_nilai_po <> 0)
                    -- AND (b.p_nilai_gr IS NOT NULL AND b.p_nilai_gr <> 0)
                -- ORDER BY a.c_created_date DESC
                ORDER BY b.p_bai_date DESC
                LIMIT 20";

            $qopr = mysqli_query($konek, $sopr);
            $copr = mysqli_num_rows($qpopr);
        
            while ($dopr = mysqli_fetch_array($qopr)){
            $mmmm = $dopr['pa'];
            $nnnn = $dopr['po'];
            $oooo = $dopr['pr'];
            $pppp = $dopr['gr'];
            ?>

            <tr>
                <td><?php echo $mmmm ?></td>
                <td><?php echo $nnnn ?></td>
                <td><?php echo $oooo ?></td>
                <td><?php echo $pppp ?></td>
                <td><?php echo "stat" ?></td>
            </tr>

            <?php
            }
        ?>

    </tbody>
</table>