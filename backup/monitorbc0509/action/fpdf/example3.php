<?php
 include 'fpdf.php';
 include 'exfpdf.php';
 include 'easyTable.php';

 $pdf=new exFPDF();
 $pdf->SetMargins(25, 20, 15, 10);
 $pdf->AddPage(); 
 $pdf->SetFont('helvetica','',10);

 $table1=new easyTable($pdf, 2);

 $table1->rowStyle('font-size:12; font-style:B;');
 $table1->easyCell('PT Indonesia Comnets Plus');
 $table1->printRow();
 
 $table1->rowStyle('font-size:10;');
 $table1->easyCell("Region Indonesia Timur\nPermintaan Pelaksanaan Instalasi FOC\nKepada PT. Mitra Maega Masagena\nAtas Perintah");
 $table1->printRow(); 
 $table1->endTable(5);

//====================================================================

$products=array(
	'Nomor Permintaan Pelaksanaan Instalasi', 
	'Nomor Sales Order', 
	'Pelanggan', 
	'Alamat Pelanggan', 
	'PTL', 
	'Tanggal Mulai',
	'Hasil Survey',
	'Selesai Instalasi FOC',
	'Selesai TestCom',
	'Selesai Softcopy Revisi Final',
	'Pemeriksaan Aset',
	'Pekerjaan Selesai(Final Dok Hardcopy & Softcopy)',
	'Tanggal Order PPI',
	'Keterangan'
);

$product=array(
	'158/13072018/PPI/RIT/ICON+/2018', 
	'PA/ACT/1807/0422', 
	'PT. BINA MANDAR BERSAMA',
	'Tobalong, Topoyo, Kabupaten Mamuju, Sulawesi Barat, Indonesia, -2.058035, 119.344653', 
	'Rahmat',
	'13 Juli 2018',
	'14 Juli 2018',
	'27 Juli 2018',
	'28 Juli 2018',
	'29 Juli 2018',
	'04 Agustus 2018',
	'06 Agustus 2018',
	'13 Juli 2018',
	''
	);

 $table=new easyTable($pdf, '{15, 80, 75}','align:C{CLL};border:1; border-color:#fff; ');

 $table->rowStyle('align:{CCC};valign:M;bgcolor:#f0f0f0; font-color:#000; font-family:arial; font-style:B;');
 $table->easyCell('NO.');
 $table->easyCell('ITEM');
 $table->easyCell('KETERANGAN');
 $table->printRow();
 
 for($i=0; $i<14; $i++)
 {
	$bgcolor='';
	if($i%2)
	{
	   $bgcolor='bgcolor:#f0f0f0;';
	}
	$table->rowStyle('valign:M;border:LR;paddingY:1.5;' . $bgcolor);
	$table->easyCell(1+$i);
	$table->easyCell($products[$i]);
	$table->easyCell($product[$i]);
	$table->printRow();
 }
 
 $table->easyCell(' ', 'border:T;colspan:3');
 $table->printRow();
 $table->endTable();


 $table=new easyTable($pdf, 2); 
 $table->rowStyle('font-size:10; font-style:B');
 $table->easyCell("NB: Lokasi pekerjaan ada pada alamat link");
 $table->printRow(); 
 $table->endTable(5);


 $table=new easyTable($pdf, '{85, 85}','align:L{CC};border:1; border-color:#f0f0f0;');

	$bgcolor='bgcolor:#f0f0f0;';
	$table->rowStyle('valign:M;border:LRTB;paddingY:2;' . $bgcolor);
	$table->easyCell("Bersedia untuk dilaksanakan", "font-style:B;");
	$table->easyCell("Tidak bersedia untuk dilaksanakan", "font-style:B;");
	$table->printRow();

	$bgcolor='bgcolor:#fff;';
	$table->rowStyle('valign:M;border:LRT;paddingY:10;' . $bgcolor);
	$table->easyCell("PT. Mitra Maega Masagena", "font-style:B;");
	$table->easyCell("PT. Mitra Maega Masagena", "font-style:B;");
	$table->printRow();

	$bgcolor='bgcolor:#fff;';
	$table->rowStyle('align:{L};valign:L;border:LRT;paddingY:2;' . $bgcolor);
	$table->easyCell("Alasan tidak bersedia:", "colspan:2;");
	$table->printRow();
	
 
 $table->easyCell(' ', 'border:T;colspan:2');
 $table->printRow();
 $table->endTable();

 $table=new easyTable($pdf, 1); 
 $table->rowStyle('font-size:10;');
 $table->easyCell("Status Monitoring Team QC PT ICON | * Beri tanda v pada kolom yang tersedia sesuai status");
 $table->printRow(); 
 $table->endTable(5);


 $table=new easyTable($pdf, '{35,10,35,10,35,10,35}','align:L{LL};border:1; border-color:#f0f0f0;');

 $bgcolor='bgcolor:#fff;';
 $table->rowStyle('valign:M;border:LRTB;paddingY:2;' . $bgcolor);
 $table->easyCell("Survey");
 $table->easyCell("");
 $table->easyCell("Integrasi");
 $table->easyCell("");
 $table->easyCell("QC");
 $table->easyCell("");
 $table->easyCell("Lain-lain");
 $table->printRow();

 $table->rowStyle('valign:M;border:LRTB;paddingY:2;' . $bgcolor);
 $table->easyCell("Pengisian PKB");
 $table->easyCell("");
 $table->easyCell("Test Comm (BB)");
 $table->easyCell("");
 $table->easyCell(".");
 $table->easyCell("");
 $table->easyCell("");
 $table->printRow();

 $table->rowStyle('valign:M;border:LRTB;paddingY:2;' . $bgcolor);
 $table->easyCell("Instalasi");
 $table->easyCell("");
 $table->easyCell("Test Comm (EE)");
 $table->easyCell("");
 $table->easyCell("BAPS");
 $table->easyCell("");
 $table->easyCell("");
 $table->printRow();
 

$table->easyCell(' ', 'border:T;colspan:2');
$table->printRow();
$table->endTable();


//$filename="assets/test.pdf";
//$pdf->Output("$filename",'F'); 

$pdf->Output(); 
 

?>