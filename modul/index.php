
    <?php
        
        if(isset($_POST['from']) AND $_POST['from'] != ""){
            $f_arr  = explode("/", $_POST['from']);
            $f_day  = $f_arr[0];
            $f_mont = $f_arr[1];
            $f_year = $f_arr[2];
            $n_from = "$f_year-$f_mont-$f_day";
            
            $clock  = '00:00:00';
            $from   = date('d M, Y', strtotime($n_from));
            $from2  = $n_from." ".$clock;
        }
        
        else{
            //$n_from = date('Y-m-d');
            //$clock  = '00:00:00';
            //$from   = date('d M, Y', strtotime($n_from));
            $from   = "";
            $from2  = "";
        }
        


        if(isset($_POST['to']) AND $_POST['to'] != ""){
            $t_arr  = explode("/", $_POST['to']);
            $t_day  = $t_arr[0];
            $t_mont = $t_arr[1];
            $t_year = $t_arr[2];
            $n_to   = "$t_year-$t_mont-$t_day";

            $clock2 = '23:59:59';
            $to     = date('d M, Y', strtotime($n_to));
            $to2    = $n_to." ".$clock2;
        }
        
        else{
            $to    = "";
            $to2   = "";

        }


        if($from2 != "" && $to2 != ""){
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id
                        WHERE a.c_dispo_date >= '$from2'
                        AND a.c_dispo_date <= '$to2'";
        }
        elseif($from2 == "" && $to2 != ""){
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id
                        WHERE a.c_dispo_date <= '$to2'";
        }
        elseif($from2 != "" && $to2 == ""){
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id
                        WHERE a.c_dispo_date >= '$from2'";
        }
        else{
            $sql4   =  "SELECT COUNT(*) as total FROM m_crm2 a
                        LEFT JOIN m_project b ON a.c_id=b.p_c_id";
        }
        
        $query4 = mysqli_query($konek, $sql4);
        while($data4 = mysqli_fetch_array($query4)){
            $count8 = $data4['total'];
        }
        
        
    ?>

    


    
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="?modul=" class="form-horizontal" method="POST">
                                <div class="col-md-3" style="margin-left:-1%;">
                                    <div class="input-group input-large">
                                        <input type="text" class="form-control dpd1" name="from" autocomplete="off">
                                        <span class="input-group-addon">To</span>
                                        <input type="text" class="form-control dpd2" name="to" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-lg-1" style="margin-left:-1.5%">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                            <div class="col-lg-1" style="margin-left:-2.5%">
                                <a href="<?php echo $base_url?>/?modul=">
                                    <button class="btn btn-default" type="submit">Today</button>
                                </a>
                            </div>
                
                            <div class="col-lg-1" style="margin-left:-3%">
                                <button class="btn btn-info"><?php echo $from." - ".$to ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    



    
    <div class="row">
        <div class="col-md-3">
            <a href="?modul=data">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon orange" style="margin-top:12px;margin-right:20px;"><i class="fa fa-spinner"></i></span>
                    <div class="mini-stat-info">
                        <span style="font-size:30px;">
                            <?php
                                if($from2 != "" AND $to2 != ""){
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE a.c_dispo_date >= '$from2'
                                                AND a.c_dispo_date <= '$to2'
                                                AND b.p_status NOT IN (51,61)";
                                }
                                elseif($from2 == "" AND $to2 != ""){
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE a.c_dispo_date <= '$to2'
                                                AND b.p_status NOT IN (51,61)";
                                }
                                elseif($from2 != "" AND $to2 == ""){
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE a.c_dispo_date >= '$from2'
                                                AND b.p_status NOT IN (51,61)";
                                }
                                else{
                                    $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                                LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                                WHERE b.p_status NOT IN (51,61)";
                                }

                                $query2 = mysqli_query($konek, $sql2); 
                                while($data2 = mysqli_fetch_array($query2)){
                                    $count7 = $data2['total'];
                                }
                                echo $count7;

                                
                            ?>
                            </span>
                            <?php
                                if($count8 != 0){ 
                                    $persen = ($count7 * 100) / $count8;
                                    $persen1 = sprintf('%0.2f', $persen);
                                ?>
                                    <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                                <?php
                                }
                                else{ ?>
                                    <a style="font-size:15px;">0%</a><br/>
                                <?php }
                            ?>
                            
                        </span>
                        SO - Disposition - On Progress
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
                            if($from2 != "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE a.c_dispo_date >= '$from2'
                                            AND a.c_dispo_date <= '$to2'
                                            AND b.p_status IN (61)";
                            }
                            elseif($from2 == "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE a.c_dispo_date <= '$to2'
                                            AND b.p_status IN (61)";
                            }
                            elseif($from2 != "" AND $to2 == ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE a.c_dispo_date >= '$from2'
                                            AND b.p_status IN (61)";
                            }
                            else{
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE b.p_status IN (61)";
                            }

                            $query2 = mysqli_query($konek, $sql2); 
                            while($data2 = mysqli_fetch_array($query2)){
                                $count9 = $data2['total'];
                            }
                            echo $count9;
                        ?>
                        </span>
                        <?php
                            if($count8 != 0){ 
                                $persen = ($count9 * 100) / $count8;
                                $persen1 = sprintf('%0.2f', $persen);
                            ?>
                                <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                            <?php
                            }
                            else{ ?>
                                <a style="font-size:15px;">0%</a><br/>
                            <?php }
                        ?>
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
                            if($from2 != "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE 
                                            (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date <= '$n_to' ELSE b.p_bai_date <= '$n_to' END)
                                            AND (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date >= '$n_from' ELSE b.p_bai_date >= '$n_from' END)
                                            AND b.p_status = 51";
                            }
                            elseif($from2 == "" AND $to2 != ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE 
                                            (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date <= '$n_to' ELSE b.p_bai_date <= '$n_to' END)
                                            AND b.p_status = 51";
                            }
                            elseif($from2 != "" AND $to2 == ""){
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE 
                                            (CASE WHEN (b.p_bai_date IS NULL) THEN b.p_closed_date >= '$n_from' ELSE b.p_bai_date >= '$n_from' END)
                                            AND b.p_status = 51";
                            }
                            else{
                                $sql2   =  "SELECT COUNT(*) as total FROM m_crm2 a
                                            LEFT JOIN m_project b ON a.c_id=b.p_c_id
                                            WHERE b.p_status = 51";
                            }

                            $query2 = mysqli_query($konek, $sql2); 
                            while($data2 = mysqli_fetch_array($query2)){
                                $count9 = $data2['total'];
                            }
                            echo $count9;

                        ?>
                        </span>
                        <?php
                            if($count8 != 0){ 
                                $persen = ($count9 * 100) / $count8;
                                $persen1 = sprintf('%0.2f', $persen);
                            ?>
                                <a style="font-size:15px;"><?php echo $persen1."%" ?></a><br/>
                            <?php
                            }
                            else{ ?>
                                <a style="font-size:15px;">0%</a><br/>
                            <?php 
                            
                            }
                        ?>
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
                            echo $count8;										
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
	<div class="col-md-12">

		<?php
			$sql2 = "SELECT COUNT(*) as total FROM m_project 
					LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
					";

			$query2 = mysqli_query($konek, $sql2); 
			while($data2 = mysqli_fetch_array($query2)){
				$count0 = $data2['total'];
			}
			
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
		-->
		


		<div class="row">
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=1">
							<div class="user-heading alt wdgt-row terques-bg">
								<div style="font-size:30px;font-weight:bold;">
									PA <span class="fa fa-long-arrow-right"></span>
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
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
									PI <span class="fa fa-long-arrow-right"></span>
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
									PO <span class="fa fa-long-arrow-right"></span>
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
									NI <span class="fa fa-long-arrow-right"></span>
								</div>
								<!--
								<div style="font-size:30px;font-weight:bold;">
									<span class="fa fa-long-arrow-right"></span>	
								</div>
								-->
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
			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=5">
							<div class="user-heading alt wdgt-row terques-bg">
								<div style="font-size:30px;font-weight:bold;">
									TC <span class="fa fa-long-arrow-right"></span>
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (41,42,43)";

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


			<div class="col-md-2">
				<div class="profile-nav alt">
					<section class="panel text-center">
						<a href="?modul=subprogress&view=7">
							<div class="user-heading alt wdgt-row terques-bg">
								<div style="font-size:30px;font-weight:bold;">
									BAA
								</div>
							</div>
						
							<div class="panel-body">
								<div class="mini-stat-info">
									<span style="font-size:30px;">
									<?php
										$sql2 = "SELECT COUNT(*) as total FROM m_project 
												LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
												-- LEFT JOIN m_user ON m_crm2.c_pic=m_user.u_name_crm
												WHERE p_status IN (44,45)";

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
									BAA
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