        <div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=mks_subprogress&view=44">
							<div class="user-heading alt wdgt-row red-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										$lvl = $_SESSION['lvlmon'];
										$ptl = $_SESSION['unamecrm'];
										
										if($lvl == 1){
											$sql2 = "SELECT * FROM m_project
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status=44
													AND u_wilayah = '1'";
										}
										else{
											$sql2 = "SELECT * FROM m_project 
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status=44 
													AND c_pic = '$ptl'";
										}

										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									Submit BAA
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=mks_subprogress&view=45">
							<div class="user-heading alt wdgt-row yellow-bg-prd">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										if($lvl == 1){
											$sql2 = "SELECT * FROM m_project
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status=45
													AND u_wilayah = '1'";
										}
										else{
											$sql2 = "SELECT * FROM m_project 
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm 
													WHERE p_status=45 
													AND c_pic = '$ptl'
													AND u_wilayah = '1'";
										}

										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									Draft BAA
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			
		</div>