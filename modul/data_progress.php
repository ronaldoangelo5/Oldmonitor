		<?php
			include('inc/konek.php');

			$level 	= $_SESSION['lvlmon'];
			$unmcrm = $_SESSION['unamecrm'];

			$ptl 	= $_SESSION['unamecrm'];
			
			if(isset($_GET['type'])){ $types = $_GET['type']; }
			else{ $types = ""; }
			
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


		<div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=1">
							<div class="user-heading alt wdgt-row gray-bg">
								<i class="fa fa-power-off"></i>
							</div>
						

							<div class="panel-body">
								<div class="mini-stat-info">
									<span><?php
										if($level==1){
											if($types == 'cutoff'){
												$sql2 = "SELECT COUNT(*) as total FROM m_crm2
														LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
														LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
														WHERE p_status = '0'
														AND c_dispo_date >= '2018-08-01 00:00:01'";
											}
											else{
												$sql2= "SELECT COUNT(*) as total FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status='0'";
											}
											
										}else{
											$sql2= "SELECT COUNT(*) as total FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status='0'
													AND u_name_crm='$ptl'";
										}
									
										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}
										echo $count;
									?></span>
									Project Activation
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
								<i class="fa fa-info"></i>
							</div>
						

							<div class="panel-body">
								<div class="mini-stat-info">
									<span><?php
										if($level==1){
											if($types == 'cutoff'){
												$sql2 = "SELECT COUNT(*) as total FROM m_crm2
														LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
														LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
														WHERE p_status IN (11,12,13,14)
														AND c_dispo_date >= '2018-08-01 00:00:01'";
											}
											else{
												$sql2= "SELECT COUNT(*) as total FROM m_project 
														LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
														LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
														WHERE p_status IN (11,12,13,14)";
											}
										}
										else{
											$sql2= "SELECT COUNT(*) as total FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status IN (11,12,13,14)
													AND u_name_crm = '$ptl'";
										}
										
										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count = $data2['total'];
										}
										echo $count;
									?></span>
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
								<i class="fa fa-users"></i>
							</div>
						</a>

						<div class="panel-body">
							<div class="mini-stat-info">
								<a href="?modul=subprogress&view=3"><span><?php
									if($level==1){
										if($types == 'cutoff'){
											$sql2 = "SELECT COUNT(*) as total FROM m_crm2
													LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status = '21'
													AND c_dispo_date >= '2018-08-01 00:00:01'";
										}
										else{
											$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status='21'";
										}
									}
									else{
										$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status='21'
												AND u_name_crm = '$ptl'";
									}
									
									$query2 = mysqli_query($konek, $sql2); 
									while($data2 = mysqli_fetch_array($query2)){
										$count = $data2['total'];
									}
									echo $count;
								?></span>
								Purchase Order</a>
							</div>
						</div>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=4">
							<div class="user-heading alt wdgt-row purple-bg">
								<i class="fa fa-flash"></i>
							</div>
						</a>

						<div class="panel-body">
							<div class="mini-stat-info">
								<a href="?modul=subprogress&view=4"><span><?php
									if($level==1){
										if($types == 'cutoff'){
											$sql2 = "SELECT COUNT(*) as total FROM m_crm2
													LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status IN (31,32,33,34,35,36)
													AND c_dispo_date >= '2018-08-01 00:00:01'";
										}
										else{
											$sql2= "SELECT COUNT(*) as total FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status IN (31,32,33,34,35,36)";
										}
									}
									else{
										$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (31,32,33,34,35,36)
												AND u_name_crm = '$ptl'";
									}
									
									
									$query2 = mysqli_query($konek, $sql2); 
									while($data2 = mysqli_fetch_array($query2)){
										$count = $data2['total'];
									}
									echo $count;
								?></span>
								Network Integration </a>
							</div>
						</div>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=5">
							<div class="user-heading alt wdgt-row terques-bg">
								<i class="fa fa-chain"></i>
							</div>
						</a>

						<div class="panel-body">
							<div class="mini-stat-info">
								<a href="?modul=subprogress&view=5"><span><?php
									if($level==1){
										if($types == 'cutoff'){
											$sql2 = "SELECT COUNT(*) as total FROM m_crm2
													LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status IN (41,42,43)
													AND c_dispo_date >= '2018-08-01 00:00:01'";
										}
										else{
											$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (41,42,43)";
										}
									}
									else{
										$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (41,42,43)
												AND u_name_crm = '$ptl'";
									}
									
									
									$query2 = mysqli_query($konek, $sql2); 
									while($data2 = mysqli_fetch_array($query2)){
										$count = $data2['total'];
									}
									echo $count;
								?></span>
								Test & Commissioning </a>
							</div>
						</div>

					</section>
				</div>
			</div>
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=7">
							<div class="user-heading alt wdgt-row gray-bg">
								<i class="fa fa-check"></i>
							</div>
						</a>
						
						<div class="panel-body">
							<div class="mini-stat-info">
								<a href="?modul=subprogress&view=6"><span><?php
									if($level==1){
										if($types == 'cutoff'){
											$sql2 = "SELECT COUNT(*) as total FROM m_crm2
													LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status IN (44,45)
													AND c_dispo_date >= '2018-08-01 00:00:01'";
										}
										else{
											$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (44,45)";
										}
									}
									else{
										$sql2= "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (44,45)
												AND u_name_crm = '$ptl'";
									}
									

									$query2 = mysqli_query($konek, $sql2); 
									while($data2 = mysqli_fetch_array($query2)){
										$count = $data2['total'];
									}
									echo $count;
								?></span>
								BAA </a>
							</div>
						</div>

					</section>
				</div>
			</div>
		</div>

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
									<th>Customer Name</th>
									<th>PIC</th>
									<th>Create Date</th>
									<!--<th>Dispos Date</th>-->
									<th>BAI Date</th>
									
									<th>Aging</th>
									<th>Last Progress</th>
									<th>Progress</th>
									<th style="width:150px;">Action</th>
								</tr>
							</thead>
							<tbody>
							   
							<?php
								
								if($level == 1){
									if($types == 'cutoff'){
										$sql = "SELECT *, 
													datediff(p_bai_date, c_dispo_date) as dispos,
													datediff(p_bai_date, c_created_date) as creates 
												FROM m_crm2
												LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
												LEFT JOIN m_status ON m_project.p_status=m_status.s_code
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												AND c_dispo_date >= '2018-08-01 00:00:00'
												-- ORDER BY m_crm2.c_id DESC
												ORDER BY m_crm2.c_dispo_date DESC";
									}
									else{
										$sql=  "SELECT *, 
													datediff(p_bai_date, c_dispo_date) as dispos,
													datediff(p_bai_date, c_created_date) as creates 
												FROM m_crm2 
												LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
												LEFT JOIN m_status ON m_project.p_status=m_status.s_code
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status NOT IN (51,61)
												-- ORDER BY m_crm2.c_id DESC
												ORDER BY m_crm2.c_dispo_date DESC
												";
									}
								}else{
									$sql=  "SELECT *, 
												datediff(p_bai_date, c_dispo_date) as dispos,
												datediff(p_bai_date, c_created_date) as creates 
											FROM m_crm2 
											LEFT JOIN m_project ON m_crm2.c_id=m_project.p_c_id
											LEFT JOIN m_status ON m_project.p_status=m_status.s_code
											LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
											WHERE u_name_crm = '$ptl'
											AND p_status NOT IN (51,61)
											-- ORDER BY c_dispo_date DESC
											-- ORDER BY m_crm2.c_id DESC
											ORDER BY m_crm2.c_dispo_date DESC";
								}

								

								$query 	= mysqli_query($konek, $sql);
								$no 	= 1;
								$today 	= date('Y-m-d');
								

								while($data = mysqli_fetch_array($query)){ ?>
									<tr>
										<?php
											if($data['p_bai_date'] != null or $data['p_bai_date'] != ""){
												if($data['dispos'] <= 0){
													$interval = $data['creates'];
												}
												else{
													$interval = $data['dispos'];
												}
											}
											else{
												$date 		= date('Y-m-d', strtotime($data['c_dispo_date']));
											
												$CheckInX 	= explode("-", $date);
												$CheckOutX 	= explode("-", $today);
												$date1 		= mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
												$date2 		= mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
												$interval 	= ($date2 - $date1)/(3600*24);
											}
											

										?>

										<td><?php echo $no ?></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_pa_node_id'] ?></a></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_cust_name'] ?></a></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_pic'] ?></a></td>
										<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_created_date'] ?></a></td>
										<!--<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo $data['c_dispo_date'] ?></a></td>-->
										<?php 
										if($data['p_bai_date'] != null or $data['p_bai_date'] != ""){ ?>
											<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"><?php echo date('Y-m-d', strtotime($data['p_bai_date'])) ?></a></td>
										<?php
										}else{ ?>
											<td><a href="?modul=detail&id=<?php echo $data['p_id'] ?>"> - </a></td>
										<?php
										}
										?>
										
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

										
										<td><?php echo $interval ?></td>

										<td>
										<?php
											if($data['s_progress']=="PI"){
												echo '<span class="label label-danger label-mini">PI</span>';
											}elseif($data['s_progress']=="PO"){
												echo '<span class="label label-warning label-mini">PO/PR</span>';
											}elseif($data['s_progress']=="NI"){
												echo '<span class="label label-info label-mini">NI</span>';
											}elseif($data['s_progress']=="TC"){
												echo '<span class="label label-success label-mini">TestCom</span>';
											}elseif($data['s_progress']=="BAA"){
												echo '<span class="label label-success label-mini">BAA</span>';
											}elseif($data['s_progress']=="closed"){
												echo '<span class="label label-default label-mini">Closed</span>';
											}
											elseif($data['s_progress']=="cancel"){
												echo '<span class="label label-default label-mini">Cancel</span>';
											}else{
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
												$color = "progress-bar-success";
											}else{
												$color = "progress-bar-default";
											}
											?>
											<div class="progress progress-striped progress-xs">
												<div style="width: <?php echo $data['s_progress_value']?>%" aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar <?php echo $color?>"></div>
											</div>
										</td>
										<?php if($level == 1){ ?>
											<td>
												<a onclick="return confirm('Yakin ingin me-refresh progress data ini ?') "; title='refresh' href="action/refresh_progress.php/?id=<?php echo $data['p_id'] ?>">
													<span class="label label-info label-mini">refresh</span>
												</a>
											</td>
										<?php } ?>
										<?php if($level == 2){ ?>
											<td>
												<a onclick="return confirm('Yakin ingin me-refresh progress data ini ?') "; title='cancel' href="#">
													<span class="label label-info label-mini">cancel</span>
												</a>
												<a onclick="return confirm('Yakin ingin me-refresh progress data ini ?') "; title='rollback' href="#">
													<span class="label label-primary label-mini">rollback</span>
												</a>
											</td>
										<?php } ?>
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