<table class="table  table-hover general-table">
    <thead>
    <tr>
        <th>Vendor</th>
        <th>Total SO</th>
        <th>Jumlah SO Closed</th>
        <th>Jumlah SO On Progress</th>
        <th>Persentase Aging SO Closed</th>
        <th>Persentase Aging SO On Progress</th>
        <th>Kinerja Waktu Vendor</th>

    </tr>
    </thead>
    <tbody>
    <?php
        $vsql   = "SELECT * FROM m_vendor";
        $vquery = mysqli_query($konek, $vsql);
        while($vdata = mysqli_fetch_array($vquery)){
            $vid    = $vdata['v_id'];
            $vnama  = $vdata['v_name'];

            
            $vcid = "SELECT *, SUM(aging44) as aging55, COUNT(r_p_id) as count55, (SUM(aging44)/COUNT(r_p_id)) as sum1 FROM (
                        SELECT * FROM (
                            SELECT 
                                v_name, 
                                r_p_id, 
                                MIN(r_input_date) AS Column1, 
                                MAX(r_input_date) AS Column2,
                                datediff(MAX(r_input_date), MIN(r_input_date)) as aging44
                            FROM m_progress
                            LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                            LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                            WHERE 
                                r_p_status IN (12,35) AND 
                                -- (p_status = 51 or r_p_status = 51) AND 
                                (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
                                v_id = $vid
                            GROUP BY r_p_id
                        ) A
                        -- where aging44 <> 0
                        where Column1 != Column2
                    ) B
                    WHERE v_name IS NOT NULL
                    GROUP BY 
                        v_name
                    ORDER BY count55 DESC";

            $vcquery  = mysqli_query($konek, $vcid);
            $vcfetch  = mysqli_fetch_array($vcquery);



            $vpid = "SELECT *, SUM(nows) as aging55, COUNT(r_p_id) as count55, (SUM(nows)/COUNT(r_p_id)) as sum1 FROM (
                        SELECT * FROM (
                            SELECT 
                                v_name, 
                                r_p_id, 
                                MIN(r_input_date) AS Column1, 
                                MAX(r_input_date) AS Column2,
                                datediff(MAX(r_input_date), MIN(r_input_date)) as aging44,
                                datediff(now(), MIN(r_input_date)) as nows
                            FROM m_progress
                            LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                            LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id 
                            WHERE 
                                r_p_status IN (11,35) AND 
                                p_status NOT IN (36,41,42,43,44,51,61,0) AND
                                (m_project.p_v_id IS NOT NULL or m_project.p_v_id != 0) AND
                                v_id = $vid
                            GROUP BY r_p_id
                        ) A
                        -- where aging44 <> 0
                        where Column1 = Column2
                    ) B
                    WHERE v_name IS NOT NULL
                    GROUP BY 
                        v_name
                    ORDER BY count55 DESC";

            $vpquery  = mysqli_query($konek, $vpid);
            $vpfetch  = mysqli_fetch_array($vpquery);

            $sql = "SELECT 
                        v_id, 
                        v_name, p_v_id, 
                        COUNT(*) as onprogress
                    FROM m_vendor
                    RIGHT JOIN m_project ON m_vendor.v_id=m_project.p_v_id
                    WHERE m_project.p_status NOT IN (36,41,42,43,44,51,61,0)
                    AND v_id = $vid"; 
        
            $query  = mysqli_query($konek, $sql);
            $fetch  = mysqli_fetch_array($query);

            $sql2 = "SELECT 
                        v_id, 
                        v_name, p_v_id, 
                        COUNT(*) as closed
                    FROM m_vendor
                    RIGHT JOIN m_project ON m_vendor.v_id=m_project.p_v_id
                    WHERE m_project.p_status IN (36,41,42,43,44,51)
                    AND v_id = $vid"; 
        
            $query2  = mysqli_query($konek, $sql2);
            $fetch2  = mysqli_fetch_array($query2);


            $sql3 = "SELECT 
                        v_id, 
                        v_name, p_v_id, 
                        COUNT(*) as total
                    FROM m_vendor
                    RIGHT JOIN m_project ON m_vendor.v_id=m_project.p_v_id
                    WHERE v_id = $vid"; 
        
            $query3  = mysqli_query($konek, $sql3);
            $fetch3  = mysqli_fetch_array($query3);
            
        ?>
            
            <tr>
                <td><?php echo $vnama; ?></td>
                <td><?php echo $ab = $fetch3['total'] ?></td>
                <td><?php echo $cd = $fetch2['closed'] ?></td>
                <td><?php echo $ef = $fetch['onprogress'] ?></td>
                <td><?php echo $gh = sprintf('%0.4f', ($vcfetch['sum1']) / 24 ) ?></td>
                <td><?php echo $ij = sprintf('%0.4f', ($vpfetch['sum1']) / 24 ) ?></td>
                <td><?php echo $kl = sprintf("%0.4f", (($cd * $gh) + ($ef * $ij)) / ($cd + $ef)) ?></td>
                
               
            </tr>


        <?php
        }

        ?>
    </tbody>
</table>