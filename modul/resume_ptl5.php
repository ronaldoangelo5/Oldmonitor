
    <?php
        $us   = "SELECT * FROM m_user WHERE u_level = 2";
        $uq  = mysqli_query($konek, $us);
        $nu  = mysqli_num_rows($uq);

        while($ud = mysqli_fetch_array($uq)){
            $uid  = $ud['u_id'];
            //$nama[] = $ud['u_name_crm'];

            $pc  = "SELECT 
                        *,
                        COUNT(*) as total
                    FROM m_crm2 a
                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                    LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
                    WHERE b.p_status IN (51)
                    AND c.u_id = $uid";

            $pp  = "SELECT 
                        *,
                        COUNT(*) as total
                    FROM m_crm2 a
                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                    LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
                    WHERE b.p_status NOT IN (51, 61)
                    AND c.u_id = $uid";

            $pl  = "SELECT 
                        *,
                        COUNT(*) as total
                    FROM m_crm2 a
                    LEFT JOIN m_project b ON a.c_id=b.p_c_id
                    LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
                    WHERE c.u_id = $uid";
            
            $sc = mysqli_query($konek, $pc);
            $hc = mysqli_fetch_array($sc);

            $sp = mysqli_query($konek, $pp);
            $hp = mysqli_fetch_array($sp);
            
            $sl = mysqli_query($konek, $pl);
            $hl = mysqli_fetch_array($sl);

            //$cc[] = mysqli_num_rows($sc);
            //$cp[] = mysqli_num_rows($sp);
            //$cl[] = mysqli_num_rows($sl);
            $dc[] = $hc['total'];
            $dp[] = $hp['total'];
            $dl[] = $hl['total'];
        
            $udname[] = $ud['u_name_crm'];
        }

        


    ?>