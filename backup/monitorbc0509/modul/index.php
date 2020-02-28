<div class="row">
	<div class="col-md-12">

		<?php
			$sql2 = "SELECT COUNT(*) as total FROM m_project 
					LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
					-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm";

			$query2 = mysqli_query($konek, $sql2); 
			while($data2 = mysqli_fetch_array($query2)){
				$count0 = $data2['total'];
			}


			/*
			RATIO PENYELESAIAN SO
			$sql3 = "SELECT r_p_id, MIN(r_input_date) AS Column1, MAX(r_input_date) AS Column2 
					FROM m_progress
					LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
					WHERE r_p_status IN (0,51)
					AND (p_status = 51 or r_p_status = 51)
					GROUP BY r_p_id";

			$query3 = mysqli_query($konek, $sql3); 
			while($data3 = mysqli_fetch_array($query3)){
				$test1 = $data3['Column1'];
				$test2 = $data3['Column2'];

				$d 		= date('Y-m-d', strtotime($test1));
				$e 		= date('Y-m-d', strtotime($test2));

				$CheckInX 	= explode("-", $d);
				$CheckOutX 	= explode("-", $e);
				$date1 		= mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
				$date2 		= mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
				$interval[] = ($date2 - $date1)/(3600*24);

				$array_sum = array_sum($interval);
				$total 	   = $array_sum / 216;
			}
			*/
			
		?>

		<div class="row">
			<div class="col-md-3">
				<a href="?modul=data">
					<div class="mini-stat clearfix">
						<span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-spinner"></i></span>
						<div class="mini-stat-info">
							<span style="font-size:30px;">
								<?php
									$sql2 = "SELECT COUNT(*) as total FROM m_project 
									LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
									-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
									WHERE p_status NOT IN (51,61)";

									$query2 = mysqli_query($konek, $sql2); 
									while($data2 = mysqli_fetch_array($query2)){
										$count7 = $data2['total'];
									}
									echo $count7;

									$persen = ($count7 * 100) / $count0;
									$persen1 = sprintf('%0.2f', $persen);
								?>
								</span>
								<a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
							</span>
							SO - On Progress
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="?modul=subprogress&view=61">
					<div class="mini-stat clearfix">
						<span class="mini-stat-icon tar" style="margin-top:12px;margin-right:20px;"><i class="fa fa-times"></i></span>
						<div class="mini-stat-info">
							<span style="font-size:30px;">
							<?php
								$sql2 = "SELECT COUNT(*) as total FROM m_project 
								LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
								-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
								WHERE p_status IN (61)";

								$query2 = mysqli_query($konek, $sql2); 
								while($data2 = mysqli_fetch_array($query2)){
									$count9 = $data2['total'];
								}
								echo $count9;

								$persen = ($count9 * 100) / $count0;
								$persen1 = sprintf('%0.2f', $persen);
							?>
							</span>
							<a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
							SO - Cancel
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="?modul=subprogress&view=51">
					<div class="mini-stat clearfix">
						<span class="mini-stat-icon pink" style="margin-top:12px;margin-right:20px;"><i class="fa fa-thumbs-o-up"></i></span>
						<div class="mini-stat-info">
							<span style="font-size:30px;">
							<?php
								$sql2 = "SELECT COUNT(*) as total FROM m_project 
								LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
								-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
								WHERE p_status IN (51)";

								$query2 = mysqli_query($konek, $sql2); 
								while($data2 = mysqli_fetch_array($query2)){
									$count9 = $data2['total'];
								}
								echo $count9;

								$persen = ($count9 * 100) / $count0;
								$persen1 = sprintf('%0.2f', $persen);
							?>
							</span>
							<a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
							SO - Closed
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="#">
					<div class="mini-stat clearfix">
						<span class="mini-stat-icon green" style="margin-top:12px;margin-right:20px;"><i class="fa fa-th"></i></span>
						<div class="mini-stat-info">
							<span style="font-size:30px;">
							<?php
								echo $count0;										
							?>
							</span>
							<a style="font-size:15px;">100%</a><br/>
							SO - Total
						</div>
					</div>
				</a>
			</div>
		</div>
	
		<!--
		<div class="row">
			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=6">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:20px;font-weight:bold;">
									SO On Progresss
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
										LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
										-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
										WHERE p_status NOT IN (51,61)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count7 = $data2['total'];
										}
										echo $count7;

										$persen = ($count7 * 100) / $count0;
										$persen1 = sprintf('%0.2f', $persen);
									?>
									</span>
									<a style="font-size:15px;"><?php echo $persen1."%" ?></a>
									
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>


			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=61">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:20px;font-weight:bold;">
									SO Cancel
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
										LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
										-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
										WHERE p_status IN (61)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count9 = $data2['total'];
										}
										echo $count9;

										$persen = ($count9 * 100) / $count0;
										$persen1 = sprintf('%0.2f', $persen);
									?>
									</span>
									<a style="font-size:15px;"><?php echo $persen1."%" ?></a>
									
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>

			
			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=51">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:20px;font-weight:bold;">
									SO Closed
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
										LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
										-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
										WHERE p_status IN (51)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count9 = $data2['total'];
										}
										echo $count9;

										$persen = ($count9 * 100) / $count0;
										$persen1 = sprintf('%0.2f', $persen);
									?>
									</span>
									<a style="font-size:15px;"><?php echo $persen1."%" ?></a>
									
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>


			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=99">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:20px;font-weight:bold;">
									Jumlah SO
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
										LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
										LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count1 = $data2['total'];
										}
										echo $count1;										
									?>
									</span>
									<a style="font-size:15px;">100%</a>

								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
		</div>
		-->


		<div class="row">
			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=1">
							<div class="user-heading alt wdgt-row terques-bg">
								<div style="font-size:30px;font-weight:bold;">
									PA Node
								</div>
								<div style="font-size:30px;font-weight:bold;">
									<span class="fa fa-long-arrow-right"></span>	
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status='0'";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}
										
										$persen = ($count * 100) / $count7;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Project Activation (terdisposisi)
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=2">
							<div class="user-heading alt wdgt-row red-bg">
								<div style="font-size:30px;font-weight:bold;">
									PI
								</div>
								<div style="font-size:30px;font-weight:bold;">
									<span class="fa fa-long-arrow-right"></span>	
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (11,12,13,14)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}
										
										$persen = ($count * 100) / $count7;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Project Initiation
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=3">
							<div class="user-heading alt wdgt-row yellow-bg-prd">
								<div style="font-size:30px;font-weight:bold;">
									PO
								</div>
								<div style="font-size:30px;font-weight:bold;">
									<span class="fa fa-long-arrow-right"></span>	
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (21)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count7;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									PO/PR
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>	

			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=4">
							<div class="user-heading alt wdgt-row purple-bg">
								<div style="font-size:30px;font-weight:bold;">
									NI
								</div>
								<div style="font-size:30px;font-weight:bold;">
									<span class="fa fa-long-arrow-right"></span>	
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (31,32,33,34,35,36)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count7;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Network Integration
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=5">
							<div class="user-heading alt wdgt-row terques-bg">
								<div style="font-size:30px;font-weight:bold;">
									TC
								</div>
								
								<div style="font-size:30px;font-weight:bold;">
									<span class="fa fa-long-arrow-right"></span>	
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (41,42,43,44)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count7;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Test & Commisioning
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
		</div>

		<!--
		<div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="#">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:30px;font-weight:bold;">
								<span class="fa fa-check"></span>	
								</div>
								<span class="fa fa-checkd"></span>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												AND u_id = 2";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count1;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Budi Amril Utama
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="#">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:30px;font-weight:bold;">
								<span class="fa fa-check"></span>	
								</div>
								<span class="fa fa-checkd"></span>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												AND u_id = 9";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count1;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Yusuf Kasnawi
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="#">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:30px;font-weight:bold;">
								<span class="fa fa-check"></span>	
								</div>
								<span class="fa fa-checkd"></span>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												AND u_id = 12";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count1;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Haeruddin
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="#">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:30px;font-weight:bold;">
								<span class="fa fa-check"></span>	
								</div>
								<span class="fa fa-checkd"></span>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												AND u_id = 13";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count1;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Marhwan Setiawan Putera
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="#">
							<div class="user-heading alt wdgt-row gray-bg">
								<div style="font-size:30px;font-weight:bold;">
								<span class="fa fa-check"></span>	
								</div>
								<span class="fa fa-checkd"></span>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												AND u_id = 14";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}

										$persen = ($count * 100) / $count1;
										$persen1 = sprintf('%0.2f', $persen);

										echo $count;
									?>
									</span>
									<h4><?php echo $persen1."%" ?></h4>
									Mustari
								</div>
							</div>
						</a>

					</section>
				</div>
			</div>
		</div>
		-->

		<!--
		<div class="row">
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-user"></i></span>
					<div class="mini-stat-info">
						<span style="font-size:30px;">
							<?php
								$sql2 = "SELECT COUNT(*) as total FROM m_progress 
										WHERE r_kategori = 7 AND r_p_status_progress = 2";

								$query2 = mysqli_query($konek, $sql2); 
								while($data2 = mysqli_fetch_array($query2)){
									$count4 = $data2['total'];
								}
								echo $count4;
							?>
							</span>
						</span>
						User
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-wrench"></i></span>
					<div class="mini-stat-info">
						<span style="font-size:30px;">
							<?php
								$sql2 = "SELECT COUNT(*) as total FROM m_progress 
										LEFT JOIN m_kategori ON m_progress.r_kategori=m_kategori.k_id
										WHERE r_kategori = 8 AND r_p_status_progress = 2";

								$query2 = mysqli_query($konek, $sql2); 
								while($data2 = mysqli_fetch_array($query2)){
									$count4 = $data2['total'];
								}
								echo $count4;
							?>
							</span>
						</span>
						Material
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-cloud"></i></span>
					<div class="mini-stat-info">
						<span style="font-size:30px;">
							<?php
								$sql2 = "SELECT COUNT(*) as total FROM m_progress 
										LEFT JOIN m_kategori ON m_progress.r_kategori=m_kategori.k_id
										WHERE r_kategori = 9 AND r_p_status_progress = 2";

								$query2 = mysqli_query($konek, $sql2); 
								while($data2 = mysqli_fetch_array($query2)){
									$count4 = $data2['total'];
								}
								echo $count4;
							?>
							</span>
						</span>
						Cuaca
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="mini-stat clearfix">
					<span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-book"></i></span>
					<div class="mini-stat-info">
						<span style="font-size:30px;">
							<?php
								$sql2 = "SELECT COUNT(*) as total FROM m_progress 
										LEFT JOIN m_kategori ON m_progress.r_kategori=m_kategori.k_id
										WHERE r_kategori = 10 AND r_p_status_progress = 2";

								$query2 = mysqli_query($konek, $sql2); 
								while($data2 = mysqli_fetch_array($query2)){
									$count4 = $data2['total'];
								}
								echo $count4;
							?>
							</span>
						</span>
						Ijin
					</div>
				</div>
			</div>
		</div>
		-->

	</div>
</div>