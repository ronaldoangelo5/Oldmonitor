<?php
		$lvl = $_SESSION['lvlmon'];
		$ptl = $_SESSION['unamecrm'];

		include('inc/konek.php');

		
		if(isset($_SESSION['notif'])){
			if($_SESSION['notif'] == 1){
				echo   '<div class="alert alert-success fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							<strong>Well done!</strong> You successfully read this important alert message.
						</div>';
				unset($_SESSION['notif']);
			}
			elseif($_SESSION['notif'] == 2){
				echo   '<div class="alert alert-danger fade in">
							<button data-dismiss="alert" class="close close-sm" type="button">
								<i class="fa fa-times"></i>
							</button>
							<strong>Well done!</strong> You successfully read this important alert message.
						</div>';
				unset($_SESSION['notif']);
			}
			else{
				echo '';
			}
		}
					

		if(isset($_GET['view'])){
			$stat = $_GET['view'];
		}
		else{
			$stat = 0;
		}
		
		if($stat == 2){
			include('helper/count_pi_mks.php');
		}
		elseif($stat == 4){
			include('helper/count_ni_mks.php');
		}
		elseif($stat == 5){
			include('helper/count_fot_mks.php');
		}
		else{

		}
		?>
	

		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					
					<div class="panel-body">
					<div class="adv-table">
						<table class=" table table-hover general-table" id="dynamic-table">
							<thead>
								<tr>
									<th>No </th>
									<th>PA Node ID</th>
									<th>AR ID</th>
									<th>PIC</th>
									<th>Start Date</th>
									<th>Aging</th>
									<th>Last Progress</th>
									<th>Progress</th>
								</tr>
							</thead>
							<tbody>
							   
							<?php	
								
								if($stat == 1){
									$sql=  "SELECT * FROM m_crm2 
									LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
									LEFT JOIN m_status ON m_project.p_status=m_status.s_code
									LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status = 0
									AND u_wilayah = '1'
									ORDER BY c_id ASC";
								}
								elseif($stat == 2){
									$sql=  "SELECT * FROM m_crm2 
									LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
									LEFT JOIN m_status ON m_project.p_status=m_status.s_code
									LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status IN (11,12,13,14)
									AND u_wilayah = '1'
									ORDER BY c_id ASC";
								}
								elseif($stat == 3){
									$sql=  "SELECT * FROM m_crm2 
									LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
									LEFT JOIN m_status ON m_project.p_status=m_status.s_code
									LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status = 21
									AND u_wilayah = '1'
									ORDER BY c_id ASC";
								}
								elseif($stat == 4){
									$sql=  "SELECT * FROM m_crm2 
									LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
									LEFT JOIN m_status ON m_project.p_status=m_status.s_code
									LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status IN (31,32,33,34,35,36)
									AND u_wilayah = '1'
									ORDER BY c_id ASC";
								}
								elseif($stat == 5){
									$sql=  "SELECT * FROM m_crm2 
									LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
									LEFT JOIN m_status ON m_project.p_status=m_status.s_code
									LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status IN (41,42,43,44)
									AND u_wilayah = '1'
									ORDER BY c_id ASC";
								}

								elseif($stat == 6){
									$sql=  "SELECT * FROM m_crm2 
									LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
									LEFT JOIN m_status ON m_project.p_status=m_status.s_code
									LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status NOT IN (51)
									AND u_wilayah = '1'
									ORDER BY c_id ASC";
								}
								
								else{
									$sql = "SELECT * FROM m_crm2 
										LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
										LEFT JOIN m_status ON m_project.p_status=m_status.s_code
										LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
										WHERE p_status = $stat
										AND u_wilayah = '1'
										ORDER BY c_id ASC";
								}
								

								$query 	= mysqli_query($konek, $sql);
								$no 	= 1;
								$today 	= date('Y-m-d');
								

								while($data = mysqli_fetch_array($query)){ ?>
									<tr>
										<?php
											$date 		= date('Y-m-d', strtotime($data['c_created_date']));
											
											$CheckInX 	= explode("-", $date);
											$CheckOutX 	= explode("-", $today);
											$date1 		= mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
											$date2 		= mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
											$interval 	= ($date2 - $date1)/(3600*24);											
										?>

										<td><?php echo $no ?></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_pa_node_id'] ?></a></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_act_request_id'] ?></a></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_pic'] ?></a></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo date('H:i d M, Y', strtotime($data['c_created_date'])) ?></a></td>
										

										<?php
										if($interval>=0 AND $interval<=10){
											$label = "label-success";
										}
										elseif($interval>=11 AND $interval<=20){
											$label = "label-warning";
										}
										else{
											$label = "label-danger";
										}
										?>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><span class="label <?php echo $label ?> label-mini"><?php echo $interval ?> days</span></a></td>

										<td>
											<?php 
											if($data['s_code']==11){
												echo '<span class="label label-danger label-mini">PPI</span>';
											}
											elseif($data['s_code']==12){
												echo '<span class="label label-warning label-mini">Survey</span>';
											}
											elseif($data['s_code']==13){
												echo '<span class="label label-info label-mini">Procurement</span>';
											}
											elseif($data['s_code']==14){
												echo '<span class="label label-success label-mini">Config</span>';
											}

											elseif($data['s_code']==21){
												echo '<span class="label label-warning label-mini">PO/PR</span>';
											}

											elseif($data['s_code']==31){
												echo '<span class="label label-danger label-mini">Pengambilan Material FOC/FOT</span>';
											}
											elseif($data['s_code']==32){
												echo '<span class="label label-warning label-mini">Stringer</span>';
											}
											elseif($data['s_code']==33){
												echo '<span class="label label-info label-mini">Tracing core</span>';
											}
											elseif($data['s_code']==34){
												echo '<span class="label label-default label-mini">Splicer</span>';
											}
											elseif($data['s_code']==35){
												echo '<span class="label label-success label-mini">OTDR</span>';
											}
											elseif($data['s_code']==36){
												echo '<span class="label label-info label-mini">QC</span>';
											}

											elseif($data['s_code']==41){
												echo '<span class="label label-danger label-mini">Instalasi FOT</span>';
											}
											elseif($data['s_code']==42){
												echo '<span class="label label-warning label-mini">BER Test / Ping Test</span>';
											}
											elseif($data['s_code']==43){
												echo '<span class="label label-primary label-mini">Upload BAI/BAT</span>';
											}
											elseif($data['s_code']==44){
												echo '<span class="label label-success label-mini">BAA</span>';
											}

											elseif($data['s_code']==61){
												echo '<span class="label label-danger label-mini">Cancel</span>';
											}

											elseif($data['s_code']==51){
												echo '<span class="label label-default label-mini">Closed</span>';
											}
											else{
												echo '<span class="label label-default label-mini">PA</span>';
											}
											?>
										</td>
										<td>
											<?php
											if($data['s_progress_value'] <= 26.60){
												$color = "progress-bar-danger";
											}elseif($data['s_progress_value'] <= 33.25){
												$color = "progress-bar-warning";
											}elseif($data['s_progress_value'] <= 73.15){
												$color = "progress-bar-primary";
											}elseif($data['s_progress_value'] <= 93.10){
												$color = "progress-bar-default";
											}else{
												$color = "progress-bar-success";
											}
											?>
											<div class="progress progress-striped progress-xs">
												<div style="width: <?php echo $data['s_progress_value']?>%" aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar <?php echo $color?>"></div>
											</div>
										</td>
									</tr>
								<?php 
								$no++;
								}
							?>
							</tbody>
						</table>
					</div>    
					</div>
				</section>
			</div>
		</div>