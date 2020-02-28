<?php

function Send_Mail($id){
	require("class.phpmailer.php");
	include ('../inc/konek.php');


	$sql 	=  "SELECT * FROM m_ppi 
				LEFT JOIN m_vendor ON m_ppi.ppi_vendor=m_vendor.v_id
				LEFT JOIN m_project ON m_ppi.ppi_project_id=m_project.p_id
				LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
				LEFT JOIN m_user ON m_ppi.ppi_by_ptl=m_user.u_id
				WHERE ppi_id = $id";


	$query	= mysqli_query($konek, $sql);
	$data 	= mysqli_fetch_array($query);
	
	$email 		= $data['u_email'];

	$to 		= json_decode($data['v_email']);
	$cc 		= ["$email", "marwaisa.alam@iconpln.co.id", "syafri.gunawan@iconpln.co.id", "adi.kurnia@iconpln.co.id"];
	//$to			= ["ananabdillah@gmail.com"]; 
	//$cc 		= ["ananabdillahhatta@gmail.com"];


	$attachment = "../assets/".$data['ppi_attachment'];


	$mail = new PHPMailer();
	
	//$mail->SMTPDebug = 2;
	$mail->isSMTP();
	

/*
	$mail->Host = 'srv45.niagahoster.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'admin@rorit.id';
	$mail->Password = 'm3s1ncuc1';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->setFrom('admin@rorit.id', 'Mailer');
	$mail->AddAttachment("attachment/PPI.pdf");
*/	
	

	$mail->Host = '10.14.81.77';
	$mail->SMTPAuth = true;
	//$mail->Username = 'nurlaila.qadriyanti@iconpln.co.id';
	//$mail->Password = 'icon+123';

	$mail->Username = 'aktivasi.makasar@iconpln.co.id';
	$mail->Password = 'Icon+821';

	$mail->SMTPSecure = 'none';
	$mail->Port = 25;

	$mail->AddAttachment($attachment);
	$mail->setFrom('aktivasi.makasar@iconpln.co.id', 'Mailer');

	
	while (list ($key, $val) = each ($to)) {
		$mail->AddAddress($val);
	}

	while (list ($key, $val) = each ($cc)) {
		$mail->AddCC($val);
	}
	

	$mail->Subject = 'PPI SO '.$data['c_pa_node_id'].' - '.$data['c_cust_name'].' - '.$data['c_address'];
	
	
	$mail->Body		 = 'Ysh Rekanan '.$data["v_name"].'<br/>';
	$mail->Body		.= 'Berikut terlampir Form Sales Order: <br/><br/>';

	$mail->Body		.= '<b>'.$data["c_cust_name"].'</b><br/>';
	$mail->Body		.= '<b>'.$data["c_address"].'</b><br/>';
	$mail->Body		.= '<b>PIC : '.$data['u_name_crm'].'</b><br/><br/>';

	$mail->Body		.= '<table rules="all" style="border-color: #666" cellpadding="5">';
	
	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td colspan="2">Target Permintaan Selesai Instalasi FOC: </td>';
	$mail->Body 	.= '<td> : </td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_foc"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td colspan="2">Target Permintaan Pekerjaan Selesai (Final Dokumen HardCopy & SoftCopy): </td>';
	$mail->Body 	.= '<td> : </td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_final"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td colspan="4">.</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td colspan="4">Dengan timeline</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>1</td>';
	$mail->Body 	.= '<td>Tanggal Mulai</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_mulai"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>2</td>';
	$mail->Body 	.= '<td>Hasil Survey</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_survey"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>3</td>';
	$mail->Body 	.= '<td>Selesai instalasi FOC</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_foc"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>4</td>';
	$mail->Body 	.= '<td>Selesai testcomm</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_tc"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>5</td>';
	$mail->Body 	.= '<td>Selesai Softcopy Revisi Final</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_soft"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>6</td>';
	$mail->Body 	.= '<td>Pemeriksaan Aset</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_aset"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>7</td>';
	$mail->Body 	.= '<td>Pekerjaan Selesai (Final Dokumen HardCopy & SoftCopy)</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y', strtotime($data["ppi_tgl_final"])).'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '</table>';

	$mail->Body 	.= '<p><b>';
	$mail->Body 	.= 'NB. Mohon untuk melakukan survey detail dan hasil survey disubmit sesuai timeline diatas';
	$mail->Body 	.= '<b><p>';

	//$message = file_get_contents('../PHPmailer/mail.php');
	//$mail->MsgHTML($message);
	//$mail->CharSet = 'utf-8';
	
	
	$mail->isHTML(true);
	
	if($mail->send()){
		//echo 'Message has been sent';
		$sql1 	= "UPDATE m_ppi SET ppi_status='1' WHERE ppi_id='$id'";
		$query1	= mysqli_query($konek, $sql1);
		
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
	}
	else{
		$_SESSION['notif'] = 2;
		?>
			<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=ppi";</script>
		<?php
	}
}
?>


