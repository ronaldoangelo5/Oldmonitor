<?php
session_start();
include('../inc/konek.php');

$id_p   = $_POST['id_p'];
$status = $_POST['status'];
$desc   = $_POST['desc'];
$dates  = $_POST['date'];


if($dates != ""){
	$date_array = explode("-",$dates);
	$var_month 	= $date_array[0];
	$var_day 	= $date_array[1];
	$var_year 	= $date_array[2];
	$new_date_format = "$var_year-$var_month-$var_day";

	$clock = date("H:i:s");
	$dates = date("Y-m-d", strtotime($new_date_format));

	$date = $dates." ".$clock;
	$date2 = date("d M, Y", strtotime($dates));
}
else{
	$date = date("Y-m-d H:i:s");
	$date2 = date("d M, Y", strtotime($date));
}


if      ($status==0) { $set = "11";}
elseif  ($status==11){ $set = "12";}
elseif  ($status==12){ $set = "13";}
elseif  ($status==13){ $set = "14";}

elseif  ($status==14){ $set = "21";}

elseif  ($status==21){ $set = "31";}
elseif  ($status==31){ $set = "32";}
elseif  ($status==32){ $set = "33";}
elseif  ($status==33){ $set = "34";}
elseif  ($status==34){ $set = "35";}
elseif  ($status==35){ $set = "36";}

elseif  ($status==36){ $set = "41";}
elseif  ($status==41){ $set = "42";}
elseif  ($status==42){ $set = "43";}

elseif  ($status==43){ $set = "44";}
elseif  ($status==44){ $set = "51";}

else    { $set = ""; }



if($status==0){
	$statmu = $_POST['statusmulai'];
	if($statmu == 1){
		$ppi    	= $_POST['ppi'];
		$langsung 	= $_POST['langsung']; 
		if($ppi == 1){ 
			if($langsung == 1){
				$vendor = $_POST['vendor'];

				$sql7 	=  "SELECT * FROM m_crm2
							LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
							WHERE p_id = $id_p";
				$query7 = mysqli_query($konek, $sql7);
				$fetch 	= mysqli_fetch_array($query7);
				
				$currentdate = $fetch['c_created_date'];
				/*
				if($date < $currentdate){
					$_SESSION['notif'] = 2;
					?>
						<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
					<?php
				}
				else{
				*/
					$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress) VALUES ('$id_p', '$desc', '$date', '$status', 1)";
					$sql2   = "UPDATE m_project SET p_status='$set', p_v_id='$vendor' WHERE p_id=$id_p";
					
					$query  = mysqli_query($konek, $sql);
					$query2 = mysqli_query($konek, $sql2);
	
					if($query && $query2){
					//if($query5){
						//echo "success";
						$_SESSION['notif'] = 1;
						?>
							<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
						<?php
					}
					else{
						//echo "failed";
						$_SESSION['notif'] = 2;
						?>
							<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
						<?php
					}
				//}				
			}
			else{

				$sql7 	=  "SELECT * FROM m_crm2
							LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
							WHERE p_id = $id_p";
				$query7 = mysqli_query($konek, $sql7);
				$fetch 	= mysqli_fetch_array($query7);
				$currentdate = $fetch['c_created_date'];

				/*
				if($date < $currentdate){
					$_SESSION['notif'] = 2;
					?>
						<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
					<?php
				}
				else {
				*/
					$sql6 	= "SELECT * FROM m_ppi ORDER BY ppi_id DESC";
					$query6	= mysqli_query($konek, $sql6);
					$data6 	= mysqli_fetch_array($query6);
					
					$date3 	= date('dmY');
					$year 	= date('Y');

					if(mysqli_num_rows($query6) == 0) {
						//$noInstalasi = "158/13072018/PPI/RIT/ICON+/2018";
						$noUrut = 001;
						$noInstalasi = sprintf("%03s", $noUrut)."/".$date3 . "/PPI/RIT/ICON+/".$year;
					}
					else{
						$instalasi 	= $data6['ppi_no_instalasi'];
						$noUrut 	= (int) substr($instalasi, 0, 3);
						$noUrut++;													
						$noInstalasi = sprintf("%03s", $noUrut)."/".$date3 . "/PPI/RIT/ICON+/".$year;
					}
					

					$vendor = $_POST['vendor'];

					$sql3   = "SELECT * FROM m_vendor WHERE v_id = $vendor";
					$query3 = mysqli_query($konek, $sql3);
					$data3 	= mysqli_fetch_array($query3);
					
					$nama_vendor = $data3['v_name'];

					$ionumber = $_POST['io_number'];

					//TANGGAL MULAI
					$mulai  = $_POST['tanggal_mulai'];
					if($mulai != ""){
						$date_array = explode("-",$mulai);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$mulai2 = date("Y-m-d", strtotime($new_date_format));
						$mulai3 = date('d M, Y', strtotime($mulai2));
					}
					else{
						$mulai3 = "";
					}
					
					//TANGGAL HASIL SURVEY
					$survey = $_POST['hasil_survey'];
					if($survey != ""){
						$date_array = explode("-",$survey);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$survey2 = date("Y-m-d", strtotime($new_date_format));
						$survey3 = date('d M, Y', strtotime($survey2));
					}
					else{
						$survey3 = "";
					}

					//TANGGAL FOC
					$foc    = $_POST['selesai_foc'];
					if($foc != ""){
						$date_array = explode("-",$foc);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$foc2 = date("Y-m-d", strtotime($new_date_format));
						$foc3 = date('d M, Y', strtotime($foc2));
					}
					else{
						$foc3 = "";
					}

					//TANGGAL SELESAI TC
					$tc     = $_POST['selesai_tc'];
					if($tc != ""){
						$date_array = explode("-",$tc);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$tc2 = date("Y-m-d", strtotime($new_date_format));
						$tc3 = date('d M, Y', strtotime($tc2));
					}
					else{
						$tc3 = "";
					}
					
					//TANGGAL SELESAI SOFT
					$soft   = $_POST['selesai_soft'];
					if($soft != ""){
						$date_array = explode("-",$soft);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$soft2 = date("Y-m-d", strtotime($new_date_format));
						$soft3 = date('d M, Y', strtotime($soft2));
					}
					else{
						$soft3 = "";
					}

					
					//TANGGAL PEMERIKSAAN ASET
					$aset   = $_POST['pemeriksaan_aset'];
					if($aset != ""){
						$date_array = explode("-",$aset);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$aset2 = date("Y-m-d", strtotime($new_date_format));
						$aset3 = date('d M, Y', strtotime($aset2));
					}
					else{
						$aset3 = "";
					}


					//TANGGAL FINAL
					$final  = $_POST['final'];
					if($final != ""){
						$date_array = explode("-",$final);
						$var_month = $date_array[0];
						$var_day = $date_array[1];
						$var_year = $date_array[2];
						$new_date_format = "$var_year-$var_month-$var_day";
					
						$final2 = date("Y-m-d", strtotime($new_date_format));
						$final3 = date('d M, Y', strtotime($final2));
					}
					else{
						$final3 = "";
					}

					
					$sql4 	=  "SELECT * FROM m_project
								LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
								LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
								WHERE m_project.p_id = $id_p";
					$query4 =  mysqli_query($konek, $sql4);
					$data4 	=  mysqli_fetch_array($query4);


					$pa_node = $data4['c_pa_node_id'];
					$cust 	 = $data4['c_cust_name'];
					$addr	 = $data4['c_address'];
					$ptl 	 = $data4['u_id'];

					$nama_ptl = $data4['u_name_crm'];


					include 'create_pdf.php';

					$abs 	= "test2";
					$datefile = date('d-m-Y');

					$strip = str_replace('/', '_', $noInstalasi);
					$name = $strip.".pdf";
					$pdf->Output("../assets/$name",'F'); 

					//$pdf->Output(); 


					$sql5 = "INSERT INTO `m_ppi`(`ppi_project_id`, `ppi_no_instalasi`, `ppi_vendor`, `ppi_tgl_mulai`, `ppi_tgl_survey`, `ppi_tgl_foc`, `ppi_tgl_tc`, `ppi_tgl_soft`, `ppi_tgl_aset`, `ppi_tgl_final`, `ppi_tgl_order`, `ppi_keterangan`, `ppi_io_number`, `ppi_attachment`, `ppi_by_ptl`, `ppi_status`) 
							VALUES ('$id_p', '$noInstalasi', '$vendor', '$mulai2', '$survey2', '$foc2', '$tc2', '$soft2','$aset2', '$final2', '$date', '$desc', '$ionumber', '$name', '$ptl', 0);";

					
					$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress) VALUES ('$id_p', '$desc', '$date', '$status', 1)";
					$sql2   = "UPDATE m_project SET p_status='$set', p_v_id='$vendor' WHERE p_id=$id_p";

					
					$query  = mysqli_query($konek, $sql);
					$query2 = mysqli_query($konek, $sql2);
					$query5 = mysqli_query($konek, $sql5);

					if($query && $query2 && $query5){
					//if($query5){
						//echo "success";
						$_SESSION['notif'] = 1;
						?>
							<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
						<?php
					}
					else{
						//echo "failed";
						$_SESSION['notif'] = 2;
						?>
							<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
						<?php
					}
				//}
			}

		}
		else{
			$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress) VALUES ('$id_p', '$desc', '$date', '$status', 1)";
			$sql2   = "UPDATE m_project SET p_status='14' WHERE p_id=$id_p";

			$query  = mysqli_query($konek, $sql);
			$query2 = mysqli_query($konek, $sql2);
			
			if($query && $query2){
				$_SESSION['notif'] = 1;
				?>
					<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
				<?php
			}
			else{
				$_SESSION['notif'] = 2;
				?>
					<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
				<?php
			}
		}
	}
	else{
		$sql7 	=  "SELECT * FROM m_crm2
					LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
					WHERE p_id = $id_p";
		$query7 = mysqli_query($konek, $sql7);
		$fetch 	= mysqli_fetch_array($query7);
		$currentdate = $fetch['c_created_date'];

		/*
		if($date < $currentdate){
			$_SESSION['notif'] = 2;
			?>
				<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
			<?php
		}
		else{
		*/
			$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress) VALUES ('$id_p', '$desc', '$date', '$status', 2)";
		
			$query  = mysqli_query($konek, $sql);
			if($query){
				$_SESSION['notif'] = 1;
				?>
					<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
				<?php
			}
			else{
				$_SESSION['notif'] = 2;
				?>
					<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
				<?php
			}
		//}		
	}
	
}
else{

	$sql8 = "SELECT r_p_status, r_input_date FROM m_progress
			 LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
			 WHERE p_id = $id_p
			 ORDER BY r_p_status DESC";

	$query8 = mysqli_query($konek, $sql8);
	$fetch8 = mysqli_fetch_array($query8);

	$currentdate1 = $fetch8['r_input_date'];

	/*
	if($date < $currentdate1){
		$_SESSION['notif'] = 2;
		?>
			<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
		<?php
	}
	else{
	*/
		$prog = $_POST['status_progress'];

		if(isset($_POST['kategori'])){
			if($_POST['kategori'] != 0){
				$kate   = $_POST['kategori'];
			}
			else{
				$kate = NULL;
			}
		}
		else{
			$kate = NULL;
		}

		if($prog == 2){
			$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress, r_kategori) VALUES ('$id_p', '$desc', '$date', '$status', 2, '$kate')";
			$sql2   = "UPDATE m_project SET p_status='$status' WHERE p_id=$id_p";
		}
		else{
			

			if($status == 21){
				$nilaigr 	= $_POST['nilaigr'];
				$nopo 		= $_POST['nilaipo'];
				$nopr 		= $_POST['nilaipr'];

				$sql    	= "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress, r_kategori) VALUES ('$id_p', '$desc', '$date', '$status', 1, '$kate')";
				$sql2   	= "UPDATE m_project SET p_nilai_gr='$nilaigr', p_nilai_po='$nopo', p_nilai_pr='$nopr', p_status='$set' WHERE p_id=$id_p";
			}
			elseif($status == 43){
				$now 		= date('Y-m-d H:i:s');
				$sql    	= "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress, r_kategori) 
							   VALUES ('$id_p', '$desc', '$date', '$status', 1, '$kate')";
				$sql2   	= "UPDATE m_project SET p_status='44', p_bai_date='$date' WHERE p_id=$id_p";
			}
			elseif($status == 44){
				$now = date('Y-m-d H:i:s');
				$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress, r_kategori) 
						VALUES ('$id_p', '$desc', '$date', '$set', 1, '$kate')";
				$sql2   = "UPDATE m_project SET p_status='51', p_closed_date='$date' WHERE p_id=$id_p";
			}
			else{
				$sql    = "INSERT INTO m_progress (r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress, r_kategori) VALUES ('$id_p', '$desc', '$date', '$status', 1, '$kate')";
				$sql2   = "UPDATE m_project SET p_status='$set' WHERE p_id=$id_p";
			}
			
		}

		$query  = mysqli_query($konek, $sql);
		$query2 = mysqli_query($konek, $sql2);

		if($query && $query2){
			$_SESSION['notif'] = 1;
			?>
				<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
			<?php
		}
		else{
			$_SESSION['notif'] = 2;
			?>
				<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $id_p?>";</script>
			<?php
		}
	//}
}

?>