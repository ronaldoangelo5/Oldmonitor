<?php

session_start();
include('../inc/konek.php');

require_once '../PHPExcel/PHPExcel.php';



$excel = new PHPExcel();

$excel->getProperties()->setCreator('Admin')
                       ->setLastModifiedBy('Admin')
                       ->setTitle("Monitoring SO")
                       ->setSubject("Monitoring SO")
                       ->setDescription("Monitoring SO")
                       ->setKeywords("Monitoring SO");



$style_both = array(
    'alignment'     => array(
        'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY
    ),
    'borders'       => array(
        'top'       => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'right'     => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'left'      => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
        'bottom'    => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
    )
);




$excel->setActiveSheetIndex(0)->setCellValue('A1', "Monitoring SO");
$excel->getActiveSheet()->mergeCells('A1:F1');

$excel->setActiveSheetIndex(0)->setCellValue('A2', 'PTL');
$excel->setActiveSheetIndex(0)->setCellValue('B2', 'Project Activation Node ID');
$excel->setActiveSheetIndex(0)->setCellValue('C2', 'Customer Name');
$excel->setActiveSheetIndex(0)->setCellValue('D2', 'Address');
$excel->setActiveSheetIndex(0)->setCellValue('E2', 'Mitra');

$excel->setActiveSheetIndex(0)->setCellValue('F2', 'Created Date');
$excel->setActiveSheetIndex(0)->setCellValue('G2', 'Dispos Date');

$excel->setActiveSheetIndex(0)->setCellValue('H2', 'Status Terakhir');
$excel->setActiveSheetIndex(0)->setCellValue('I2', 'kategori kendala');
$excel->setActiveSheetIndex(0)->setCellValue('J2', 'deskripsi kendala');

for($k="A";$k<="H";$k++){
    $excel->getActiveSheet()->getStyle($k."2")->getFont()->setBold(TRUE);
}

if($_POST['uid'] == "") {
    $sql = "SELECT * FROM (
                SELECT * FROM m_crm2
                    LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                    LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                    LEFT JOIN m_status ON m_project.p_status=m_status.s_code
                    LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id
                            
                    LEFT OUTER JOIN (
                        SELECT r_id, r_p_id, r_p_status, r_kategori, r_desc
                            FROM m_progress
                            WHERE r_id IN (
                                SELECT MAX(r_id)
                                FROM m_progress
                                GROUP BY r_p_id
                            )
                        ORDER BY r_p_id ASC
                    ) AS subq
                    
                    ON m_project.p_id=subq.r_p_id
                
                    LEFT JOIN m_kategori ON subq.r_kategori=m_kategori.k_id
                    -- WHERE u_id = 6
                    -- AND p_status = 51
                    ORDER BY r_p_status DESC
            ) V
            -- WHERE p_status = 51
            GROUP BY c_id";
}
else {
    $uid = $_POST['uid'];
    $sql = "SELECT * FROM (
                SELECT * FROM m_crm2
                    LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
                    LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
                    LEFT JOIN m_status ON m_project.p_status=m_status.s_code
                    LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id
                    LEFT JOIN (
                        SELECT r_id, r_p_id, r_p_status, r_kategori, r_desc
                            FROM m_progress
                            WHERE r_id IN (
                                SELECT MAX(r_id)
                                FROM m_progress
                                GROUP BY r_p_id
                            )
                        ORDER BY r_p_id ASC
                    ) AS subq
                    ON m_project.p_id=subq.r_p_id
                    LEFT JOIN m_kategori ON subq.r_kategori=m_kategori.k_id
                    WHERE u_id = $uid
                    -- AND p_status = 51
                    ORDER BY r_p_status DESC
            ) V
            -- WHERE p_status = 51
            GROUP BY c_id";
}
$query  = mysqli_query($konek, $sql);
$count  = mysqli_num_rows($query);

$start = "3";
while($data = mysqli_fetch_array($query)){


    $excel->setActiveSheetIndex(0)->setCellValue("A".$start, $data['u_name_crm']);
    $excel->setActiveSheetIndex(0)->setCellValue("B".$start, $data['c_pa_node_id']);
    $excel->setActiveSheetIndex(0)->setCellValue("C".$start, $data['c_cust_name']);
    $excel->setActiveSheetIndex(0)->setCellValue("D".$start, $data['c_address']);
    $excel->setActiveSheetIndex(0)->setCellValue("E".$start, $data['v_name']);
    
    $excel->setActiveSheetIndex(0)->setCellValue("F".$start, $data['c_created_date']);
    $excel->setActiveSheetIndex(0)->setCellValue("G".$start, $data['c_dispo_date']);
    
    $excel->setActiveSheetIndex(0)->setCellValue("H".$start, $data['s_desc']);

    if($data['p_status'] == 51){
        $excel->setActiveSheetIndex(0)->setCellValue("I".$start, "");
        $excel->setActiveSheetIndex(0)->setCellValue("J".$start, "");
    }
    else{
        $excel->setActiveSheetIndex(0)->setCellValue("I".$start, $data['k_desc']);
        $excel->setActiveSheetIndex(0)->setCellValue("J".$start, $data['r_desc']);
    }

$start++;
}


$counts = $count + 2;
for ($j = "A"; $j <= "J"; $j++){
    for ($i = 2; $i <= $counts; $i++) {
        $excel->getActiveSheet()->getStyle($j.$i)->applyFromArray($style_both)->getAlignment()->setWrapText(true);
    }
}

$excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(22);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(80);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(130);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);

$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(40);


// Set orientasi kertas
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Monitoring SO");
$excel->setActiveSheetIndex(0);

// Proses file excel
$date = date('Y-m-d H:i:s');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="MonitoringSO_'.$date.'.xls"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
ob_end_clean();
$write->save('php://output');
?>