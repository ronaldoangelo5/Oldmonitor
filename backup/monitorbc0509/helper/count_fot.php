        <div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=41">
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
													WHERE p_status=41";
										}
										else{
											$sql2 = "SELECT * FROM m_project 
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													WHERE p_status=41 
													AND c_pic = '$ptl'";
										}

										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									Instalasi FOT
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=42">
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
													WHERE p_status=42";
										}
										else{
											$sql2 = "SELECT * FROM m_project 
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													WHERE p_status=42 
													AND c_pic = '$ptl'";
										}

										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									BER Test/ Packet test / Test Ping
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=43">
							<div class="user-heading alt wdgt-row purple-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										if($lvl == 1){
											$sql2 = "SELECT * FROM m_project
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													WHERE p_status=43";
										}
										else{
											$sql2 = "SELECT * FROM m_project 
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													WHERE p_status=43
													AND c_pic = '$ptl'";
										}

										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									Upload BAI/BAT
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>

			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=44">
							<div class="user-heading alt wdgt-row purple-bg">
								<i class="fa fa-info"></i>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span>
										<?php 
										if($lvl == 1){
											$sql2 = "SELECT * FROM m_project
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													WHERE p_status=44";
										}
										else{
											$sql2 = "SELECT * FROM m_project 
													INNER JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													WHERE p_status=44
													AND c_pic = '$ptl'";
										}

										$query2 = mysqli_query($konek, $sql2);
										$count2	= mysqli_num_rows($query2); 

										echo "$count2";
										?>
										
									</span>
									BAA
								</div>
							</div>
						</a>
					</section>
				</div>
			</div>
		</div>