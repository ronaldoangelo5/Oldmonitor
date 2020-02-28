        <div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=mks_subprogress&view=11">
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
												WHERE p_status=11 
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									PPI
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=mks_subprogress&view=12">
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
												WHERE p_status=12 
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									Survey
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=13">
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
												WHERE p_status=13 
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									Procurement/ Req Material
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=14">
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
												WHERE p_status=14 
												AND u_wilayah = '1'";
										
										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
									</span>
									Upload Asplan for Config
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
		</div>