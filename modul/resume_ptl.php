<?php

$sql = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        ORDER BY c_id ASC";

$query = mysqli_query($konek, $sql);
$count = mysqli_num_rows($query);

while($data = mysqli_fetch_array($query)){
    $a = date('Y-m-d', strtotime($data['p_closed_date']));
    $b = date('Y-m-d', strtotime($data['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval[] = ($date2 - $date1)/(3600*24)." days";
}
    $hasil = ( array_sum($interval) / $count );
    $hasil = sprintf('%0.0f', $hasil);





$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 2
        ORDER BY c_id ASC";
        

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);
if($count1 > 0){
    while($data1 = mysqli_fetch_array($query1)){
        $a = date('Y-m-d', strtotime($data1['p_closed_date']));
        $b = date('Y-m-d', strtotime($data1['c_created_date']));
        
        $c = explode("-", $b);
        $d = explode("-", $a);
        
        $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
        $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);
        
        $interval1[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl1 = ( array_sum($interval1) / $count1 );
    $ptl1 = sprintf('%0.0f', $ptl1);
} else{
    $ptl1 = 0;
}







$sql20 = "SELECT 	
            c.u_name_crm, 
            b.p_id, 
            a.c_pa_node_id, 
            a.c_created_date, 
            b.p_closed_date,
            datediff(b.p_closed_date, a.c_created_date) as aging
        FROM m_crm2 a
        LEFT JOIN m_project b ON a.c_id=b.p_c_id
        LEFT JOIN m_user c ON a.c_pic=c.u_name_crm
        WHERE b.p_status = 51
        AND (b.p_closed_date != null OR b.p_closed_date != '')
        AND c.u_id = 3
        ORDER BY a.c_id ASC";

$query20 = mysqli_query($konek, $sql20);
$count20 = mysqli_num_rows($query20);

if($count20 > 0){
    while($data20 = mysqli_fetch_array($query20)){
        $interval2 = $data20['aging'];
    }
    $pic2 = (array_sum($interval2) / $count20);
    $pic2 = sprintf('%0.0f', $pic2);
    $pic2 = 10;
} else{
    $pic2 = 0;
}

echo json_encode($count20);

//$pic2 = 40;




$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 4
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);
if($count1 > 0){
    while($data1 = mysqli_fetch_array($query1)){
        $a = date('Y-m-d', strtotime($data1['p_closed_date']));
        $b = date('Y-m-d', strtotime($data1['c_created_date']));

        $c = explode("-", $b);
        $d = explode("-", $a);

        $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
        $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

        $interval3[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl3 = ( array_sum($interval3) / $count1 );
    $ptl3 = sprintf('%0.0f', $ptl3);
} else{
    $ptl3 = 0;
}




$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 5
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);
if($count1 > 0){
    while($data1 = mysqli_fetch_array($query1)){
        $a = date('Y-m-d', strtotime($data1['p_closed_date']));
        $b = date('Y-m-d', strtotime($data1['c_created_date']));

        $c = explode("-", $b);
        $d = explode("-", $a);

        $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
        $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

        $interval4[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl4 = ( array_sum($interval4) / $count1 );
    $ptl4 = sprintf('%0.0f', $ptl4);
} else{
    $ptl4 = 0;
}





$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 6
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval5[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl5 = ( array_sum($interval5) / $count1 );
    $ptl5 = sprintf('%0.0f', $ptl5);
} else{
    $ptl5 = 0;
}




$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 7
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval6[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl6 = ( array_sum($interval6) / $count1 );
    $ptl6 = sprintf('%0.0f', $ptl6);
} else{
    $ptl6 = 0;
}





$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 8
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval7[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl7 = ( array_sum($interval7) / $count1 );
    $ptl7 = sprintf('%0.0f', $ptl7);
} else{
    $ptl7 = 0;
}






$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 9
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval8[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl8 = ( array_sum($interval8) / $count1 );
    $ptl8 = sprintf('%0.0f', $ptl8);
} else{
    $ptl8 = 0;
}







$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 10
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval9[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl9 = ( array_sum($interval9) / $count1 );
    $ptl9 = sprintf('%0.0f', $ptl9);
} else{
    $ptl9 = 0;
}









$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 12
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval11[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl11 = ( array_sum($interval11) / $count1 );
    $ptl11 = sprintf('%0.0f', $ptl11);
} else{
    $ptl11 = 0;
}








$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 13
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval12[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl12 = ( array_sum($interval12) / $count1 );
    $ptl12 = sprintf('%0.0f', $ptl12);
} else{
    $ptl12 = 0;
}







$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 14
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval13[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl13 = ( array_sum($interval13) / $count1 );
    $ptl13 = sprintf('%0.0f', $ptl13);
} else{
    $ptl13 = 0;
}






$sql1 = "SELECT * FROM m_crm2 
        LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
        LEFT JOIN m_status ON m_project.p_status=m_status.s_code
        LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
        WHERE p_status = 51
        AND (p_closed_date != null OR p_closed_date != '')
        AND u_id = 15
        ORDER BY c_id ASC";

$query1 = mysqli_query($konek, $sql1);
$count1 = mysqli_num_rows($query1);

if($count1 > 0){
while($data1 = mysqli_fetch_array($query1)){
    $a = date('Y-m-d', strtotime($data1['p_closed_date']));
    $b = date('Y-m-d', strtotime($data1['c_created_date']));

    $c = explode("-", $b);
    $d = explode("-", $a);

    $date1 = mktime(0, 0, 0, $c[1], $c[2], $c[0]);
    $date2 = mktime(0, 0, 0, $d[1], $d[2], $d[0]);

    $interval14[] = ($date2 - $date1)/(3600*24)." days";
    }
    $ptl14 = ( array_sum($interval14) / $count1 );
    $ptl14 = sprintf('%0.0f', $ptl14);
} else{
    $ptl14 = 0;
}
?>