
    <?php
        $vsql   = "SELECT * FROM m_vendor";
        $vquery = mysqli_query($konek, $vsql);
        $d99     = mysqli_num_rows($vquery);

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
                         where aging44 <> 0
                        -- where Column1 = Column2
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
                                r_p_status IN (12,35) AND 
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
                    WHERE v_id = $vid
                    AND m_project.p_status NOT IN (61)"; 
        
            $query3  = mysqli_query($konek, $sql3);
            $fetch3  = mysqli_fetch_array($query3);
            
            $ab = $fetch3['total'];
            $cd = $fetch2['closed'];
            $ef = $fetch['onprogress'];

            $gh = sprintf('%0.4f', ($vcfetch['sum1']) / 24);
            $ij = sprintf('%0.4f', ($vpfetch['sum1']) / 24);
        
            if($ab == 0 or $cd == 0){
                $mn = 0;
            }
            else{
                $mn = sprintf('%0.4f', ($cd / $ab));
            }
            
            if($ef == 0 or $gh == 0 or $ij == 0){
                $kl = 0;
            }
            else{
                $kl = sprintf("%0.4f", (($cd * $gh) + ($ef * $ij)) / ($cd + $ef));
            }
            

            $d1[] = $vdata['v_id'];
            $d2[] = $vdata['v_name'];
            $d3[] = $fetch3['total'];
            $d4[] = $fetch2['closed'] / 24;
            $d5[] = $fetch['onprogress'] / 24;

            $d6[] = $mn;
            $d7[] = $gh;
            $d8[] = $ij;
            $d9[] = $kl;

        }

        ?>