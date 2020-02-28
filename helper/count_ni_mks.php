        <div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=31">
							<div class="user-heading alt wdgt-row red-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										$lvl = $_SESSION['lvlmon'];
										$ptl = $_SESSION['unamecrm'];
										
										$sql2 = "SELECT * FROM m_project
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm 
												WHERE p_status=31
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									Pengambilan Material FOC/FOT
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=32">
							<div class="user-heading alt wdgt-row yellow-bg-prd">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										$sql2 = "SELECT * FROM m_project
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status=32
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									Stringer
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=33">
							<div class="user-heading alt wdgt-row purple-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										$sql2 = "SELECT * FROM m_project
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status=33
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									Tracing Core
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>

			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=34">
							<div class="user-heading alt wdgt-row gray-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
											$sql2 = "SELECT * FROM m_project
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status=34
													AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									Splicer
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=35">
							<div class="user-heading alt wdgt-row terques-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										$sql2 = "SELECT * FROM m_project
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm 
												WHERE p_status=35
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									OTDR
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=36">
							<div class="user-heading alt wdgt-row purple-bg">
								<i class="fa fa-info"></i>
							</div>
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										$sql2 = "SELECT * FROM m_project
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status=36
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									QC
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
		</div>