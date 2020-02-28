<?php
session_start();
include('../inc/konek.php');

$id     = $_POST['id'];
$vendor = $_POST['vendor'];
$desc   = $_POST['desc'];


//SELECT DATA
$sql    =  "SELECT * FROM m_ppi 
            LEFT JOIN m_project ON m_ppi.ppi_project_id=m_project.p_id
            LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
            LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
            WHERE ppi_id = $id";
$sql2   = "SELECT * FROM m_vendor WHERE v_id = $vendor";

$query  = mysqli_query($konek, $sql);
$query2 = mysqli_query($konek, $sql2);

$data   = mysqli_fetch_array($query);
$data2  = mysqli_fetch_array($query2);


$nama_vendor    = $data2['v_name'];
$noInstalasi    = $data['ppi_no_instalasi'];
$pa_node        = $data['c_pa_node_id'];
$cust           = $data['c_cust_name'];
$addr           = $data['c_address'];
$nama_ptl       = $data['u_name_crm'];

$mulai2         = $data['ppi_tgl_mulai'];
$mulai3         = date('d M, Y', strtotime($mulai2));

$survey2        = $data['ppi_tgl_survey'];
$survey3        = date('d M, Y', strtotime($survey2));

$foc2           = $data['ppi_tgl_foc'];
$foc3           = date('d M, Y', strtotime($foc2));

$tc2            = $data['ppi_tgl_tc'];
$tc3            = date('d M, Y', strtotime($tc2));

$soft2          = $data['ppi_tgl_soft'];
$soft3          = date('d M, Y', strtotime($soft2));

$aset2          = $data['ppi_tgl_aset'];
$aset3          = date('d M, Y', strtotime($aset2));

$final2         = $data['ppi_tgl_final'];
$final3         = date('d M, Y', strtotime($final2));

$date1          = $data['ppi_tgl_order'];
$date2          = date('d M, Y', strtotime($date1));
//$desc           = $data['ppi_keterangan'];

            
//CREATE NEW PDF
include 'create_pdf.php';

$datefile = date('d-m-Y');


$strip = str_replace('/', '_', $noInstalasi);
$name = $strip.".pdf";


if(file_exists("../assets/$name")){
    unlink("../assets/$name");
}


$pdf->Output("../assets/$name",'F');

//$pdf->Output(); 


//update vendor, update desc, update attachment

$sql1   = "UPDATE m_ppi SET ppi_vendor='$vendor', ppi_keterangan='$desc', ppi_attachment='$name' WHERE ppi_id = $id";
$query1 = mysqli_query($konek, $sql1);

if($query1){
    $_SESSION['notif'] = 1;
    ?>
        <script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=ppi";</script>
    <?php
}
else{
    $_SESSION['notif'] = 2;
    ?>
        <script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=ppi";</script>
    <?php
}

?>