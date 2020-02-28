		<div class="row">	
			<div class="col-md-12">

				<section class="panel">
					
					<?php
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
					?>
					
			

					<header class="panel-heading tab-bg-dark-navy-blue">
						<ul class="nav nav-tabs nav-justified ">
							<li class="active">
								<a data-toggle="tab" href="#overview">
									Overview
								</a>
							</li>
							<li>
								<a data-toggle="tab" href="#timeline">
									Timeline
								</a>
							</li>
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content tasi-tab">
							
							<?php
								$id 	= $_GET['id'];

								$sql 	=  "SELECT * FROM m_project
											LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
											LEFT JOIN m_progress ON m_project.p_id=m_progress.r_p_id
											LEFT JOIN m_status ON m_project.p_status=m_status.s_code
											LEFT JOIN m_vendor ON m_project.p_v_id=m_vendor.v_id
											LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
											WHERE p_id=$id
											ORDER BY m_progress.r_id DESC";

								$sql6 	= "SELECT * FROM m_ppi WHERE ppi_project_id = $id";

								$query 	= mysqli_query($konek, $sql);
								$query6 = mysqli_query($konek, $sql6);

								$data  	= mysqli_fetch_array($query);
								$count 	= mysqli_num_rows($query6);
							?>
							
							<div id="timeline" class="tab-pane ">
								<div class="row">
									<div class="col-md-12">
										<div class="timeline-messages">
											<br/><br/>
											

											<?php
												$sql2 = "SELECT * FROM m_progress
														LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
														LEFT JOIN m_status ON m_progress.r_p_status=m_status.s_code
														LEFT JOIN m_kategori ON m_progress.r_kategori=m_kategori.k_id
														WHERE r_p_id=$id
														ORDER BY r_id DESC";

												$query2 	 = mysqli_query($konek, $sql2);
												while($data2 = mysqli_fetch_array($query2)){ ?>
													<!-- Comment -->
													<div class="msg-time-chat">
														<div class="message-body msg-in">
															<span class="arrow"></span>
															<div class="text">
																<div class="first" style="width:140px">
																	<?php echo date('d M Y', strtotime($data2['r_input_date']))." <b>".$data2['s_progress']."</b>" ;?>
																</div>
																
																<?php
																	if($data2['r_p_status']==11 or $data2['r_p_status']==12 or $data2['r_p_status']==13){
																		$color = "bg-red";
																	}
																	elseif($data2['r_p_status']==21){
																		$color = "bg-yellow";
																	}
																	elseif($data2['r_p_status']==31 or $data2['r_p_status']==32 or $data2['r_p_status']==33 or $data2['r_p_status']==34 or $data2['r_p_status']==35 or $data2['r_p_status']==36){
																		$color = "bg-purple";
																	}
																	elseif($data2['r_p_status']==41 or $data2['r_p_status']==42){
																		$color = "bg-blue";
																	}
																	else{
																		$color = "bg-green";
																	}
																?>

																<div class="second <?php echo $color; ?>">
																	<?php																
																		if($data2['r_p_status_progress']==2){
																			$desc = "Hold"; ?>
																			<b><?php echo $data2['s_desc']." | ".$desc." ( ".$data2['k_desc']." ) - ".$data2['r_desc'];?></b>
																		<?php }
																		else{
																			if($data2['r_p_status'] != 0){ 
																				$desc = "Done"?>
																			<b><?php echo $data2['s_desc']." | ".$desc;?></b>
																			<?php }
																			else{ ?>
																				<b><?php echo $data2['s_desc'];?></b>
																			<?php }
																		}														
																	?>
																</div>
																
															</div>
														</div>
													</div>
													<!-- /comment -->
												<?php }
											?>		
										</div>
									</div>
								</div>
							</div>

							<div id="overview" class="tab-pane active ">
								<div class="row">
									<br/><br/>
									
									<div class="col-md-12">
										<div class="prf-contacts">
										
											<div class="location-info">
												<div class="row">
													<style type="text/css">	
														.bold {
															font-weight: bold;
														}
													</style>
													<div class="col-md-3"><h5 class="bold">PA Node</h5></div>
													<div class="col-md-9"><h5>: <b><?php echo $data['c_pa_node_id']?></b></h5></div>
												</div>

												<div class="row">
													<div class="col-md-3"><h5 class="bold">Activation Request ID</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_act_request_id']?></h5></div>
												</div>

												<div class="row">
													<div class="col-md-3"><h5 class="bold">Service ID</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_service_id']?></h5></div>
												</div>
												
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Customer Name</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_cust_name']?></h5></div>
												</div>
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Address</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_address']?></h5></div>
												</div>
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Product Name / Bandwidth(PA)</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_product_name_pa']?> / <?php echo $data['c_bandwidth_pa']?></h5></div>
												</div>
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Type</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_type']?></h5></div>
												</div>
												
												<div class="row">
													<div class="col-md-3"><h5 class="bold">SBU Owner / SBU Region</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_sbu_owner']?> / <?php echo $data['c_sbu_region']?></h5></div>
												</div>
												
												<div class="row">
													<div class="col-md-3"><h5 class="bold">PIC / PTL / Owner</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['c_pic']?> / <?php echo $data['c_ptl']?> / <?php echo $data['c_owner']?></h5></div>
												</div>
												
												
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Created On</h5></div>
													<div class="col-md-9"><h5>: <?php echo date('Y-m-d H:i:s', strtotime($data['c_created_date']));?></h5></div>
												</div>
												
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Disposition On</h5></div>
													<div class="col-md-9"><h5>: <?php echo date('Y-m-d H:i:s', strtotime($data['c_dispo_date']));?></h5></div>
												</div>

												<div class="row">
													<div class="col-md-3"><h5 class="bold">BAI Date</h5></div>
													<div class="col-md-9"><h5>: <?php if($data['p_bai_date'] != null){ echo date('Y-m-d', strtotime($data['p_bai_date'])); }?></h5></div>
												</div>
												<br/><br/>

												<div class="row">
													<div class="col-md-3"><h5 class="bold">Nilai PR</h5></div>
													<div class="col-md-9"><h5>: <?php echo $rpnilai = "Rp. " . number_format( $data['p_nilai_pr'] , 0, ',','.'); ?></h5></div>
												</div>
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Nilai PO</h5></div>
													<div class="col-md-9"><h5>: <?php echo $rpnilai = "Rp. " . number_format( $data['p_nilai_po'] , 0, ',','.'); ?></h5></div>
												</div>
												<div class="row">
													<div class="col-md-3"><h5 class="bold">Nilai GR</h5></div>
													<div class="col-md-9"><h5>: <?php echo $rpnilai = "Rp. " . number_format( $data['p_nilai_gr'] , 0, ',','.'); ?></h5></div>
												</div>
												<br/><br/>

												<div class="row">
													<div class="col-md-3"><h5 class="bold">Vendor</h5></div>
													<div class="col-md-9"><h5>: <?php echo $data['v_name'];?></h5></div>
												</div>
											</div>
										</div>
									</div>
									&nbsp; <br/> &nbsp; <br/>

									<?php 
									if($data['p_status'] == 99){ ?>
										<div class="col-md-12">
											<div class="prf-contacts">
												<div class="location-info">
													<form role="form" class="form-horizontal" action="action/updatepopr.php" method="POST" autocomplete="off">
														<input type="hidden" name="idp" value="<?php echo $data['p_id']?>">
														<div class="form-group">
															<label class="col-md-3">Nilai PR</label>
															<div class="col-md-4">
																<input class="form-control form-control-inline input-medium" name="updatepr" size="16" type="number" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-3">Nomor PO</label>
															<div class="col-md-4">
																<input class="form-control form-control-inline input-medium" name="updatepo" size="16" type="number" />
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-3">Nilai GR</label>
															<div class="col-md-4">
																<input class="form-control form-control-inline input-medium" name="updategr" size="16" type="number" />
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-offset-3 col-lg-9">
																<button class="btn btn-primary" type="submit">Save</button>
																<button class="btn btn-default" type="button">Cancel</button>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									&nbsp; <br/> &nbsp; <br/>
									<?php
									}
									?>	
									
									
									<?php 
										$lvl = $_SESSION['lvlmon'];
										$uid = $_SESSION['idmon'];

										if($data['p_status'] != 51 && ($uid == $data['u_id'])){
										//if($lvl == 2 && $data['p_status'] != 51){

											//if($data['p_status'] != 11){ ?>

												<div class="col-md-12">
													<div class="prf-contacts">
														<div class="location-info">

															<div class="row">
																<!--<div class="col-md-3"><h5 class="bold">Current <span class="fa fa-long-arrow-right"></span> Next Progress</h5></div>-->
																<div class="col-md-3"><h5 class="bold">Current Progress</h5></div>
																	<?php 
																		if($data['p_status'] == 0){
																			$next = "PPI";
																			$curr = "START";
																		}
																		else{
																			$p_stat = $data['p_status'];
																			$sql4 	=  "SELECT * FROM m_status
																						WHERE s_code = (SELECT min(s_code) FROM m_status WHERE s_code > $p_stat)";

																			$query4 = mysqli_query($konek, $sql4);
																			$fetch4 = mysqli_fetch_array($query4);
																			$next 	= $fetch4['s_desc'];
																			$curr	= $data['s_desc'];
																		}															
																	
																	
																		if($data['p_status'] == 0){?>
																			<div class="col-md-9"><h5>: <?php echo $curr; ?></h5></div>
																		<?php }
																		else{?>
																			<!--<div class="col-md-9"><h5>: <?php echo $curr; ?> <span class="fa fa-long-arrow-right"></span> <?php echo $next ?></h5></div>-->
																			<div class="col-md-9"><h5>: <?php echo $curr; ?></h5></div>
																		<?php }
																	?>
																	
																	
															</div><br/>
																
																<?php //if ($count == 0){ ?>

																
															
																<form role="form" class="form-horizontal" action="action/input_progress.php" method="POST" autocomplete="off">
																	
																	<input type="hidden" name="id_p" value="<?php echo $data['p_id']?>">
																	<input type="hidden" name="status" value="<?php echo $data['p_status']?>">

																	<?php if($data['p_status'] == 0){ ?>
																		
																		<div class="form-group" >
																			<label class="col-lg-3">Status?</label>
																			<div class="col-lg-9">
																				<select id="statusmulai" name="statusmulai" style="width:300px" class="form-control">
																				<option value="1">START</option>
																				<option value="2">HOLD</option>
																				</select>
																			</div>
																		</div>


																		<div class="form-group ppi hide" >
																			<label class="col-lg-3">PPI?</label>
																			<div class="col-lg-9">
																				<select id="ppi" name="ppi" style="width:300px" class="form-control">
																				<option value="1">YA</option>
																				<option value="2">TIDAK</option>
																				</select>
																			</div>
																		</div>

																		<div class="form-group langsung hide" >
																			<label class="col-lg-3">Sedang Berlangsung?</label>
																			<div class="col-lg-9">
																				<select id="langsung" name="langsung" style="width:300px" class="form-control">
																				<option value="2">TIDAK</option>
																				<option value="1">YA</option>
																				</select>
																			</div>
																		</div>
																		
																		<div class="form-group vendor hide">
																			<label class="col-lg-3">PO Vendor </label>
																			<div class="col-lg-9">
																				<select id="vendor" name="vendor" style="width:300px" class="form-control">
																					<?php 
																					$sql3 	= "SELECT * FROM m_vendor ORDER BY v_id";
																					$query3 = mysqli_query($konek, $sql3);

																					while($data3 = mysqli_fetch_array($query3)){ ?>
																						<option value="<?php echo $data3['v_id']?>"><?php echo $data3['v_name']?></option>
																					<?php }

																					?>
																				</select>
																			</div>
																		</div>
																	<?php } ?>

																	<?php 
																		/*
																		$z = $data['p_status'];
																		if($z == 51 or $z == 41 or $z == 42){ ?>
																			<div class="form-group popr">
																				<label class="col-md-3">Nilai PR</label>
																				<div class="col-md-4">
																					<input class="form-control form-control-inline input-medium" name="nilaipr" size="16" type="number" />
																				</div>
																			</div>
																			<div class="form-group popr">
																				<label class="col-md-3">Nilai PO</label>
																				<div class="col-md-4">
																					<input class="form-control form-control-inline input-medium" name="nilaipo" size="16" type="number" />
																				</div>
																			</div>
																			<div class="form-group popr">
																				<label class="col-md-3">Nilai GR</label>
																				<div class="col-md-4">
																					<input class="form-control form-control-inline input-medium" name="nilaigr" size="16" type="number" />
																				</div>
																			</div>
																		<?php }
																		*/
																	?>

																	
																	

																	<?php if($data['p_status'] != 0){ ?>
																		<div class="form-group">
																			<label class="col-lg-3">Status Progress </label>
																			<div class="col-lg-4">
																				<select id="status_progress" name="status_progress" class="form-control">
																					<option value="2">Hold</option>
																					<option selected value="1">Done</option>										
																				</select>
																			</div>
																		</div>
																	
																	<?php } ?>

																	<?php if($data['p_status'] == 21){ ?>
																		<div class="form-group popr">
																			<label class="col-md-3">Nilai PR</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium" name="nilaipr" size="16" type="number" />
																			</div>
																		</div>
																		<div class="form-group popr">
																			<label class="col-md-3">Nilai PO</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium" name="nilaipo" size="16" type="number" />
																			</div>
																		</div>
																		<div class="form-group popr">
																			<label class="col-md-3">Nilai GR</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium" name="nilaigr" size="16" type="number" />
																			</div>
																		</div>

																	<?php } ?>

																		<div class="form-group kategori hide">
																			<label class="col-lg-3">Kategori Kendala</label>
																			<div class="col-lg-4">
																				<select id="kategori" name="kategori" class="form-control">
																					<option value="">Pilih Kategori Kendala</option>
																					
																					<?php 
																						$sql5 	= "SELECT * FROM m_kategori ORDER BY k_desc ASC";
																						$query5 = mysqli_query($konek, $sql5);
																						while ($data5 = mysqli_fetch_array($query5)){?>
																							<option value="<?php echo $data5['k_id'];?>"><?php echo $data5['k_desc'];?></option>
																						<?php }
																					?>
																				</select>
																			</div>
																		</div>

																		<!--<div id="debug"></div>-->


																	

																	<div class="form-group description hide">
																		<label class="col-lg-3">Description</label>
																		<div class="col-lg-8">
																			<textarea rows="10" cols="30" class="form-control" id="desc" name="desc"></textarea>
																		</div>
																	</div>

							
																	<div class="form-group">
																		<label class="col-md-3">
																			<?php 
																			if($data['p_status'] == 43){
																				echo "created BAA date";
																			}else{
																				echo "date";
																			}
																			?>
																		</label>
																		<div class="col-md-4">
																			<input class="form-control form-control-inline input-medium default-date-picker" required name="date" size="16" type="text" />
																		</div>
																	</div>

																	<br/><br/>

																	
																	<?php if($data['p_status'] == 0){ ?>

																		<div class="form-group timeline hide">
																			<label class="col-md-3">Timeline Vendor</label>
																		</div>

																		<div class="form-group timeline hide">
																			<label class="col-md-3">IO Number</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium" name="io_number" size="16" type="text" />
																			</div>
																		</div>

																		<div class="form-group timeline hide">
																			<label class="col-md-3">Tanggal Mulai</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+1 days'))?>" name="tanggal_mulai" size="16" type="text" />
																			</div>
																		</div>
																		<div class="form-group timeline hide">
																			<label class="col-md-3">Hasil Survey</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+4 days'))?>" name="hasil_survey" size="16" type="text" />
																			</div>
																		</div>
																		<div class="form-group timeline hide">
																			<label class="col-md-3">Selesai Instalasi FOC</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+17 days'))?>" name="selesai_foc" size="16" type="text" />
																			</div>
																		</div>
																		<div class="form-group timeline hide">
																			<label class="col-md-3">Selesai TestCom</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+18 days'))?>" name="selesai_tc" size="16" type="text" />
																			</div>
																		</div>
																		<div class="form-group timeline hide">
																			<label class="col-md-3">Selesai Softopy Revisi Final</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+18 days'))?>" name="selesai_soft" size="16" type="text" />
																			</div>
																		</div>
																		<div class="form-group timeline hide">
																			<label class="col-md-3">Pemeriksaan Aset</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+21 days'))?>" name="pemeriksaan_aset" size="16" type="text" />
																			</div>
																		</div>
																		<div class="form-group timeline hide">
																			<label class="col-md-3">Pekerjaan Selesai (Final dokumen HardCopy dan SoftCopy)</label>
																			<div class="col-md-4">
																				<input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime(date('d-m-Y').'+23 days'))?>" name="final" size="16" type="text" />
																			</div>
																		</div>
																	<?php } ?>
																	

																	

																	<div class="form-group">
																		<div class="col-lg-offset-3 col-lg-9">
																			<button class="btn btn-primary" type="submit">Save</button>
																			<button class="btn btn-default" type="button">Cancel</button>
																		</div>
																	</div>

																</form>
															<?php //} ?>
														</div>
													</div>
												</div>
										<?php 
											//}
										}?>

									&nbsp;

								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
