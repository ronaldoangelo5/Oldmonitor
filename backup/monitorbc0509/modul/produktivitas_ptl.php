<?php 

    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 2
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $b0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 2
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $b1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 2
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $b2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 2
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $b3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 2
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $b4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 2
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $b5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 3
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $c0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 3
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $c1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 3
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $c2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 3
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $c3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 3
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $c4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 3
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $c5 = $data['total'];
    }






    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 4
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $d0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 4
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $d1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 4
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $d2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 4
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $d3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 4
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $d4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 4
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $d5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 5
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $e0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 5
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $e1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 5
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $e2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 5
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $e3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 5
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $e4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 5
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $e5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 6
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $f0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 6
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $f1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 6
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $f2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 6
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $f3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 6
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $f4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 6
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $f5 = $data['total'];
    }






    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 7
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $g0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 7
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $g1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 7
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $g2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 7
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $g3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 7
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $g4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 7
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $g5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 8
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $h0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 8
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $h1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 8
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $h2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 8
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $h3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 8
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $h4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 8
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $h5 = $data['total'];
    }




    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 9
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $i0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 9
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $i1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 9
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $i2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 9
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $i3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 9
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $i4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 9
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $i5 = $data['total'];
    }




    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 10
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $j0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 10
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $j1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 10
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $j2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 10
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $j3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 10
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $j4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 10
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $j5 = $data['total'];
    }
    






    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 12
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $l0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 12
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $l1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 12
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $l2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 12
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $l3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 12
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $l4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 12
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $l5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 13
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $m0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 13
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $m1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 13
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $m2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 13
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $m3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 13
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $m4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 13
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $m5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 14
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $n0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 14
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $n1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 14
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $n2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 14
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $n3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 14
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $n4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 14
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $n5 = $data['total'];
    }





    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status = 0
            AND u_id = 15
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $o0 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (11,12,13,14)
            AND u_id = 15
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $o1 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (21)
            AND u_id = 15
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $o2 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (31,32,33,34,35,36)
            AND u_id = 15
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $o3 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (41,42,43,44)
            AND u_id = 15
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $o4 = $data['total'];
    }
    $sql = "SELECT COUNT(*) as total FROM m_project 
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE p_status IN (51)
            AND u_id = 15
            AND c_created_date <= '$h'";
    $query = mysqli_query($konek, $sql);
    while($data = mysqli_fetch_array($query)){
        $o5 = $data['total'];
    }

?>