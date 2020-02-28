<?php

function Send_Mail($to, $cc){

	require("class.phpmailer.php");
	//include ('../inc/konek.php');

    
	$attachment = "../assets/test.pdf";

	$mail = new PHPMailer();
	
	$mail->SMTPDebug = 2;
	$mail->isSMTP();
	

	$mail->Host = '10.14.81.77';
	//$mail->Host = '10.14.85.31';
	$mail->SMTPAuth = true;
	
	$mail->Username = 'anan.abdillah@iconpln.co.id';
	$mail->Password = 'm3s1ncuc1';

	$mail->SMTPSecure = 'none';
	$mail->Port = 1025;

	$mail->AddAttachment($attachment);
	$mail->setFrom('anan.abdillah@iconpln.co.id', 'Mailer');

	
	while (list ($key, $val) = each ($to)) {
		$mail->AddAddress($val);
	}

	while (list ($key, $val) = each ($cc)) {
		$mail->AddCC($val);
	}
	

	$mail->Subject = 'PPI SO TEST';
	
	$mail->Body		 = 'Ysh Rekanan PT. TEST<br/>';
	$mail->Body		.= 'Berikut terlampir Form Sales Order: <br/><br/>';

	$mail->Body		.= '<b> c_cust_name </b><br/>';
	$mail->Body		.= '<b> c_address </b><br/>';
	$mail->Body		.= '<b>PIC : u_name_crm </b><br/><br/>';

	$mail->Body		.= '<table rules="all" style="border-color: #666" cellpadding="5">';
	
	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td colspan="2">Target Permintaan Selesai Instalasi FOC: </td>';
	$mail->Body 	.= '<td> : </td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td colspan="2">Target Permintaan Pekerjaan Selesai (Final Dokumen HardCopy & SoftCopy): </td>';
	$mail->Body 	.= '<td> : </td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
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
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>2</td>';
	$mail->Body 	.= '<td>Hasil Survey</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>3</td>';
	$mail->Body 	.= '<td>Selesai instalasi FOC</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>4</td>';
	$mail->Body 	.= '<td>Selesai testcomm</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>5</td>';
	$mail->Body 	.= '<td>Selesai Softcopy Revisi Final</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>6</td>';
	$mail->Body 	.= '<td>Pemeriksaan Aset</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '<tr>';
	$mail->Body 	.= '<td>7</td>';
	$mail->Body 	.= '<td>Pekerjaan Selesai (Final Dokumen HardCopy & SoftCopy)</td>';
	$mail->Body 	.= '<td>:</td>';
	$mail->Body 	.= '<td> '.date('d M, Y').'</td>';
	$mail->Body 	.= '</tr>';

	$mail->Body 	.= '</table>';

	$mail->Body 	.= '<p><b>';
	$mail->Body 	.= 'NB. Mohon untuk melakukan survey detail dan hasil survey disubmit sesuai timeline diatas';
	$mail->Body 	.= '<b><p>';


	
	$mail->isHTML(true);
	
	if($mail->send()){
        echo "success";
    }
    else{
        echo "failed";
    }
}
?>


