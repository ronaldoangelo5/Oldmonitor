<?php
if(isset($_GET['date'])){
	$date  = $_GET['date'];
	
	if($date == ""){
		$new_date = "";
	}
	else{
		$date_array = explode("-", $date);
		$var_month 	= $date_array[0];
		$var_day 	= $date_array[1];
		$var_year 	= $date_array[2];
		$new_date 	= "$var_year-$var_month-$var_day 23:59:59";
	}

}else{
	$new_date 	= "";
}
?>

<div class="row">
	<div class="col-md-12">
		
		<div class="row">
			<div class="col-sm-12">
				<section class="panel">
					<header class="panel-heading">
						<b><?php echo "Date : ".$new_date ?> </b>
						
					</header>
					
					<div class="panel-body">
						<div class="form-group">
							<form method="GET" action="">
								<input type="hidden" name="modul" value="filtering_log"></input>

								<div class="form-group" style="margin-left:-20px">
									<div class="col-md-4 col-xs-11">
										<input class="form-control form-control-inline input-medium default-date-picker" id="date" name="date" size="16" type="text" value="" autocomplete="off"/>
									</div>
								</div>
							
								<div class="col-md-5" style="margin-left:-24px">
									<input type="submit" class="btn btn-info" value="search">
									<a style="margin-left:2px;" href="?modul=filtering_log"><input type="button" class="btn btn-success" value="all"></a>
								</div>
							</form>
						</div>
					</div>

				</section>
			</div>
		</div>

		<?php
			if($new_date == ""){
				$sql2 = "SELECT COUNT(*) as total FROM m_project 
						LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id";

				$query2 = mysqli_query($konek, $sql2); 
				while($data2 = mysqli_fetch_array($query2)){
					$count0 = $data2['total'];
				}
			}
			else{
				//$sql2 = "SELECT COUNT(*) as total FROM m_crm2
				//		WHERE c_created_date < '$new_date'";

				$sql2 = "SELECT c_pa_node_id FROM m_project 
						LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
						LEFT JOIN m_progress ON m_project.p_id=m_progress.r_p_id 
						WHERE c_created_date <= '$new_date' 
						GROUP BY c_pa_node_id";
				
				$query2 = mysqli_query($konek, $sql2); 
				$count0 = mysqli_num_rows($query2);
			}
		?>

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
										if($new_date == ""){
											$sql2 = "SELECT COUNT(*) as total FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status NOT IN (51,61)";

											$query2 = mysqli_query($konek, $sql2); 
											while($data2 = mysqli_fetch_array($query2)){
												$count7 = $data2['total'];
											}
										}
										else{
											$sql2 = "SELECT c_pa_node_id FROM m_project 
													 LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													 LEFT JOIN m_progress ON m_project.p_id=m_progress.r_p_id 
													 WHERE p_status NOT IN (51,61) 
													 AND (r_input_date <= '$new_date' or p_status = 0) 
													 GROUP BY c_pa_node_id";

											$query2 = mysqli_query($konek, $sql2); 
											$count7 = mysqli_num_rows($query2);
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

									if($new_date == ""){
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
										LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
										LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
										WHERE p_status IN (61)";

										$query2 = mysqli_query($konek, $sql2); 
										while($data2 = mysqli_fetch_array($query2)){
											$count9 = $data2['total'];
										}
									}
									else{
										$sql2 = "SELECT c_pa_node_id FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
												LEFT JOIN m_progress ON m_project.p_id=m_progress.r_p_id 
												WHERE p_status IN (61) 
												AND (c_created_date <= '$new_date') 
												GROUP BY c_pa_node_id";

										$query2 = mysqli_query($konek, $sql2); 
										$count9 = mysqli_num_rows($query2);
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
										if($new_date == ""){
											$sql2 = "SELECT COUNT(*) as total FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
													LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
													WHERE p_status IN (51)";

											$query2 = mysqli_query($konek, $sql2); 
											while($data2 = mysqli_fetch_array($query2)){
												$count8 = $data2['total'];
											}
										}
										else{
											$sql2 = "SELECT c_pa_node_id FROM m_project 
													LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id 
													LEFT JOIN m_progress ON m_project.p_id=m_progress.r_p_id 
													WHERE p_status IN (51) 
													AND (p_closed_date <= '$new_date'
													or r_input_date = '$new_date')
													GROUP BY c_pa_node_id";
									
											$query2 = mysqli_query($konek, $sql2); 
											$count8 = mysqli_num_rows($query2);
										}
										echo $count8;

										$persen = ($count8 * 100) / $count0;
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
											echo $count0;
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
		

		<div class="row">
			<div class="col-md-3">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=1">
							<div class="user-heading alt wdgt-row terques-bg">
								<div style="font-size:30px;font-weight:bold;">
									PA
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
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
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
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
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
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
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
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
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
												LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
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


	</div>
</div>