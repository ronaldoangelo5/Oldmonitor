<?php if($target==''){ ?>	        
	<script src="assets/js/jquery.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	
	<!--common script init for all pages-->
	<script src="assets/js/bootstrap-switch.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/select2/select2.js"></script>
	<script src="assets/js/advanced-form.js"></script>


	<!--dynamic table-->
	<script type="text/javascript" language="javascript" src="assets/js/advanced-datatable/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="assets/js/data-tables/DT_bootstrap.js"></script>
	<!--common script init for all pages-->
	<script src="assets/js/scripts.js"></script>
	<!--dynamic table initialization -->
	<script src="assets/js/dynamic_table_init.js"></script>

<?php } elseif($target=='dashboard'){ ?>

		

		<!--Core js-->
		<script src="assets/js/jquery.js"></script>
        <script src="assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
        <script src="assets/bs3/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
        <script src="assets/js/skycons/skycons.js"></script>
        <script src="assets/js/jquery.scrollTo/jquery.scrollTo.js"></script>
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>-->
        <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>-->

        <script src="assets/js/gauge/gauge.js"></script>
		
        <!--clock init-->
        <script src="assets/js/css3clock/js/css3clock.js"></script>
        <!--Easy Pie Chart-->
        <script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
        <!--Sparkline Chart-->
        <script src="assets/js/sparkline/jquery.sparkline.js"></script>
        <!--Morris Chart-->
        <script src="assets/js/morris-chart/morris.js"></script>
        <script src="assets/js/morris-chart/raphael-min.js"></script>
		<!--<script src="assets/js/morris.init.js"></script>-->
		
        <!--jQuery Flot Chart-->
        <script src="assets/js/flot-chart/jquery.flot.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.animator.min.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.growraf.js"></script>
		

        <script src="assets/js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="assets/js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>

		<!--Core js-->
		<script src="assets/js/bootstrap-switch.js"></script>
		<!--
		<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
		-->
		<script src="assets/js/select2/select2.js"></script>
		<script src="assets/js/advanced-form.js"></script>

		<script src="assets/js/d3.v3.min.js"></script>
		<script src="assets/js/c3-chart/c3.js"></script>
		<!--<script src="assets/js/c3-chart.init.js"></script>-->


		<script src="assets/js/highcharts.js"></script>-->
		<script src="assets/js/series-label.js"></script>
		<script src="assets/js/exporting.js"></script>


		<?php
			$u1s = "SELECT * FROM m_crm2 a
					INNER JOIN m_user b ON a.c_pic = b.u_name_crm
					WHERE a.c_status <> 'Cancelled' 
					AND a.c_created_date >= '2019-01-01' 
					AND b.u_active = 1
					GROUP BY a.c_pic";
			$uq1  = mysqli_query($konek, $u1s);
			$nu1  = mysqli_num_rows($uq1);

			while($ud1 = mysqli_fetch_array($uq1)){
				$t1  = substr($ud1['c_pic'],0,15);
				$y1[] = $t1;
			}


			$u2s = "SELECT SUM(aging), COUNT(aging), SUM(aging)/COUNT(aging) as ag, c_pic 
					FROM ( 
						SELECT c_pa_node_id, IFNULL(datediff(c_bai_date, c_created_date), (datediff(DATE_FORMAT(NOW(), '%Y-%m-%d'),c_created_date))) as aging, c_bai_date, c_created_date, c_pic 
						FROM m_crm2
						INNER JOIN m_user ON m_crm2.c_pic = m_user.u_name_crm
						WHERE c_status <> 'cancelled' 
						AND u_active = 1
						AND c_created_date >= '2019-01-01' 

					) x 
					GROUP BY c_pic";

			$uq2  = mysqli_query($konek, $u2s);
			$nu2  = mysqli_num_rows($uq2);
			while($ud2 = mysqli_fetch_array($uq2)){
				$t2 = $ud2['ag'];
				$t2 = sprintf('%0.0f', $t2);
				$y2[] = $t2;
				$y2 = array_map('intval', $y2);
			}
		?>
		
		<script>
			Highcharts.chart('comb-chart', {
			title: {
				text: 'Aging PTL 2019'
			},
			xAxis: {
				categories: [<?php
				for($l=0;$l<$nu1;$l++){ ?>
					<?php echo json_encode($y1[$l]) ?>,
				<?php
				} 
				?>]
			},
			labels: {
				items: [{
					html: '',
					style: {
						left: '50px',
						top: '18px',
						color: ( // theme
							Highcharts.defaultOptions.title.style &&
							Highcharts.defaultOptions.title.style.color
						) || 'black'
					}
				}]
			},
			series: [{
				type: 'column',
				name: 'Aging',
				data: [
					<?php
					for($j=0;$j<$nu2;$j++){ ?>
						<?php echo json_encode($y2[$j]) ?>,
					<?php
					} 
					?>
				],
			}, {
				type: 'spline',
				name: 'Batas Maksimum Aging',
				data: [21, 21, 21, 21, 21, 21, 21, 21],
				marker: {
					lineWidth: 2,
					lineColor: Highcharts.getOptions().colors[1],
					fillColor: 'white'
				}
			}]
		});
		</script>


		<script>
			var opts = {
				lines: 12, // The number of lines to draw
				angle: 0, // The length of each line
				lineWidth: 0.48, // The line thickness
				pointer: {
					length: 0.6, // The radius of the inner circle
					strokeWidth: 0.03, // The rotation offset
					color: '#464646' // Fill color
				},
				limitMax: 'true', // If true, the pointer will not go past the end of the gauge
				colorStart: '#fa8564', // Colors
				colorStop: '#fa8564', // just experiment with them
				strokeColor: '#F1F1F1', // to see which ones work best for you
				generateGradient: true
			};

			var target = document.getElementById('gauge'); // your canvas element
			var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
			gauge.maxValue = <?php echo $pa0 ?>; // set max gauge value
			gauge.animationSpeed = 32; // set animation speed (32 is default value)
			gauge.set(<?php echo $pa51 ?>); // set actual value
			gauge.setTextField(document.getElementById("gauge-textfield"));


			
			var a1  = <?php echo json_encode($cc[0] / $bb[0]) ?>;
			var a2  = <?php echo json_encode($cc[1] / $bb[1]) ?>;
			var a3  = <?php echo json_encode($cc[2] / $bb[2]) ?>;
			var a4  = <?php echo json_encode($cc[3] / $bb[3]) ?>;
			var a5  = <?php echo json_encode($cc[4] / $bb[4]) ?>;
			var a6  = <?php echo json_encode($cc[5] / $bb[5]) ?>;
			var a7  = <?php echo json_encode($cc[6] / $bb[6]) ?>;
			var a8  = <?php echo json_encode($cc[7] / $bb[7]) ?>;
			var a9  = <?php echo json_encode($cc[8] / $bb[8]) ?>;
			
			var a10 = <?php echo json_encode($cc[9] / $bb[9]) ?>;
			var a11 = <?php echo json_encode($cc[10] / $bb[10]) ?>;
			var a12 = <?php echo json_encode($cc[11] / $bb[11]) ?>;
			

			
			var ar  = <?php echo $ar ?>;
			var bai = <?php echo $bai ?>;
			var baa = <?php echo $baa ?>;
			var dll = <?php echo $dll ?>;
			

			
		
			$(function () {
				var chart = c3.generate({
					bindto: '#combines-chart',
					data: {
						columns: [
							['NilaiPO',
							<?php 
								for($i=0;$i<$cpopr;$i++){ ?>
									<?php echo json_encode($nnn[$i]) ?>,
								<?php
								} 
							?>	
							],
							['NilaiPR',
							<?php 
								for($i=0;$i<$cpopr;$i++){ ?>
									<?php echo json_encode($ooo[$i]) ?>,
								<?php
								} 
							?>	],
							['NilaiGR', <?php 
								for($i=0;$i<$cpopr;$i++){ ?>
									<?php echo json_encode($grrr[$i]) ?>,
								<?php
								} 
							?>],
						],
						types: {
							NilaiPO: 'bar',
							NilaiPR: 'bar',
							NilaiGR: 'line'
						}
					},
					axis: {
						x: {
							type: 'categorized',
							categories: [
										<?php 
											for($i=0;$i<$cpopr;$i++){ ?>
												<?php echo json_encode($mmm[$i]) ?>,
											<?php
											} 
										?>
										]
						}
					},
					color: {
						pattern:['#48CFAD', '#EB87BF', '#4FC1E9']
					}
				});
			});


			$(function () {
				var chart = c3.generate({
					bindto: '#combine-chart2',
					data: {
						columns: [
							['OnProgress', 
								<?php 
								
								for($l=0;$l<$nuu;$l++){ ?>
									<?php echo $rankptl[$l] ?>,
								<?php
								} 

								?>
							]
							
						],
						types: {
							OnProgress: 'bar',
						}
					},
					axis: {
						//rotated : true,
						x: {
							type: 'categorized',
							categories: [
								<?php 
									for($l=0;$l<$nuu;$l++){ ?>
										<?php echo json_encode($nmap[$l]) ?>,
									<?php
									} 
								?>
											
							]
						}
					},
					color: {
						pattern:['#EB87BF', '#4FC1E9', '#4FC1E9', '#ED5565']
					}
				});
			});


			/*
			$(function () {
				var chart = c3.generate({
					bindto: '#combine-chart3',
					data: {
						columns: [
							['OnProgress', 
								<?php 
								
								for($l=0;$l<$nuu;$l++){ ?>
									<?php echo $rankptl[$l] ?>,
								<?php
								} 

								?>
							]
							
						],
						types: {
							OnProgress: 'bar',
						}
					},
					axis: {
						//rotated : true,
						x: {
							type: 'categorized',
							categories: [
								<?php 
									for($l=0;$l<$nuu;$l++){ ?>
										<?php echo json_encode($nmap[$l]) ?>,
									<?php
									} 
								?>
											
							]
						}
					},
					color: {
						pattern:['#EB87BF', '#4FC1E9', '#4FC1E9', '#ED5565']
					}
				});
			});
			*/

			


			$(function () {
				var chart = c3.generate({
					bindto: '#vendor-chart',
					data: {
						columns: [
							['NilaiPreferensi', 
								<?php 
								
								for($i=0;$i<$d99-1;$i++){ ?>
									<?php 
									echo (sqrt(
										pow(json_decode(min($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
										pow(json_decode(max($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
										pow(json_decode(max($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
										//+ pow(json_decode(max($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
										))
										/
										(sqrt(
											pow(json_decode(max($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
											pow(json_decode(min($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
											pow(json_decode(min($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
											//+ pow(json_decode(min($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
											)
										+
										sqrt(
											pow(json_decode(min($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
											pow(json_decode(max($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
											pow(json_decode(max($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
											//+ pow(json_decode(max($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
											)
										)
							 ?>,
								<?php
								} 

								?>
							],		
						],
						types: {
							NilaiPreferensi: 'bar',
						}
					},

					axis: {
						rotated: true,
						x: {
							type: 'categorized',
							
							categories: [
								<?php 
								
								for($i=0;$i<$d99-1;$i++){ ?>
									<?php echo json_encode($d2[$i]) ?>,
								<?php
								} 

								?>
							],
						}
					},
					color: {
						pattern:['#4FC1E9']
					}
				});
			});

		</script>

		<script>

        //Jquery vector map
        //if ($.fn.vectorMap) {
            var cityAreaData = [
                500.70,
                410.16,
                210.69,
                120.17,
                64.31,
                150.35,
                130.22,
                120.71,
                300.32
            ]
            $('#world-map').vectorMap({
                map: 'us_lcc_en',
                scaleColors: ['#C8EEFF', '#0071A4'],
                normalizeFunction: 'polynomial',
                focusOn: {
                    x: 5,
                    y: 1,
                    scale: 1
                },
                zoomOnScroll: false,
                zoomMin: 0.85,
                hoverColor: false,
                regionStyle: {
                    initial: {
                        fill: '#ededed',
                        "fill-opacity": 1,
                        stroke: '#a5ded9',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    },
                    hover: {
                        "fill-opacity": 0.8
                    }
                },
                markerStyle: {
                    initial: {
                        fill: '#e68c71',
                        stroke: 'rgba(230,140,110,.8)',
                        "fill-opacity": 1,
                        "stroke-width": 9,
                        "stroke-opacity": 0.5,
                        r: 3
                    },
                    hover: {
                        stroke: 'black',
                        "stroke-width": 2
                    },
                    selected: {
                        fill: 'blue'
                    },
                    selectedHover: {}
                },
                backgroundColor: '#ffffff',
                markers: [

                    {
                        latLng: [35.85, -77.88],
                        name: 'Rocky Mt,NC'
                    }, {
                        latLng: [32.90, -97.03],
                        name: 'Dallas/FW,TX'
                    }, {
                        latLng: [39.37, -75.07],
                        name: 'Millville,NJ'
                    }

                ],
                series: {
                    markers: [{
                        attribute: 'r',
                        scale: [3, 7],
                        values: cityAreaData
                    }]
                }
            });
        //}

		</script>


		
		
		
		<script src="assets/js/dashboard.js"></script>
        <script src="assets/js/jquery.customSelect.min.js" ></script>

        <!--common script init for all pages-->
        <script src="assets/js/scripts.js"></script>
        <!--script for this page-->

		

<?php }
elseif($target=='dashboards'){ ?>		
	
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script src="assets/bs3/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="assets/js/skycons/skycons.js"></script>
<script src="assets/js/jquery.scrollTo/jquery.scrollTo.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="assets/js/calendar/clndr.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
<script src="assets/js/calendar/moment-2.2.1.js"></script>
<script src="assets/js/evnt.calendar.init.js"></script>
<script src="assets/js/jvector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/js/jvector-map/jquery-jvectormap-us-lcc-en.js"></script>
<script src="assets/js/gauge/gauge.js"></script>
<!--clock init-->
<script src="assets/js/css3clock/js/css3clock.js"></script>
<!--Easy Pie Chart-->
<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="assets/js/sparkline/jquery.sparkline.js"></script>
<!--Morris Chart-->
<script src="assets/js/morris-chart/morris.js"></script>
<script src="assets/js/morris-chart/raphael-min.js"></script>
<!--jQuery Flot Chart-->
<script src="assets/js/flot-chart/jquery.flot.js"></script>
<script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
<script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="assets/js/flot-chart/jquery.flot.animator.min.js"></script>
<script src="assets/js/flot-chart/jquery.flot.growraf.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/jquery.customSelect.min.js" ></script>
<!--common script init for all pages-->
<script>
			var opts = {
				lines: 12, // The number of lines to draw
				angle: 0, // The length of each line
				lineWidth: 0.48, // The line thickness
				pointer: {
					length: 0.6, // The radius of the inner circle
					strokeWidth: 0.03, // The rotation offset
					color: '#464646' // Fill color
				},
				limitMax: 'true', // If true, the pointer will not go past the end of the gauge
				colorStart: '#fa8564', // Colors
				colorStop: '#fa8564', // just experiment with them
				strokeColor: '#F1F1F1', // to see which ones work best for you
				generateGradient: true
			};

			var target = document.getElementById('gauge'); // your canvas element
			var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
			gauge.maxValue = <?php echo $pa0 ?>; // set max gauge value
			gauge.animationSpeed = 32; // set animation speed (32 is default value)
			gauge.set(<?php echo $pa51 ?>); // set actual value
			gauge.setTextField(document.getElementById("gauge-textfield"));


			
			var a1  = <?php echo json_encode($cc[0] / $bb[0]) ?>;
			var a2  = <?php echo json_encode($cc[1] / $bb[1]) ?>;
			var a3  = <?php echo json_encode($cc[2] / $bb[2]) ?>;
			var a4  = <?php echo json_encode($cc[3] / $bb[3]) ?>;
			var a5  = <?php echo json_encode($cc[4] / $bb[4]) ?>;
			var a6  = <?php echo json_encode($cc[5] / $bb[5]) ?>;
			var a7  = <?php echo json_encode($cc[6] / $bb[6]) ?>;
			var a8  = <?php echo json_encode($cc[7] / $bb[7]) ?>;
			var a9  = <?php echo json_encode($cc[8] / $bb[8]) ?>;
			
			var a10 = <?php echo json_encode($cc[9] / $bb[9]) ?>;
			var a11 = <?php echo json_encode($cc[10] / $bb[10]) ?>;
			var a12 = <?php echo json_encode($cc[11] / $bb[11]) ?>;
			

			
			var ar  = <?php echo $ar ?>;
			var bai = <?php echo $bai ?>;
			var baa = <?php echo $baa ?>;
			var dll = <?php echo $dll ?>;
			

			
		
			$(function () {
				var chart = c3.generate({
					bindto: '#combines-chart',
					data: {
						columns: [
							['NilaiPO',
							<?php 
								for($i=0;$i<$cpopr;$i++){ ?>
									<?php echo json_encode($nnn[$i]) ?>,
								<?php
								} 
							?>	
							],
							['NilaiPR',
							<?php 
								for($i=0;$i<$cpopr;$i++){ ?>
									<?php echo json_encode($ooo[$i]) ?>,
								<?php
								} 
							?>	],
							['NilaiGR', <?php 
								for($i=0;$i<$cpopr;$i++){ ?>
									<?php echo json_encode($grrr[$i]) ?>,
								<?php
								} 
							?>],
						],
						types: {
							NilaiPO: 'bar',
							NilaiPR: 'bar',
							NilaiGR: 'line'
						}
					},
					axis: {
						x: {
							type: 'categorized',
							categories: [
										<?php 
											for($i=0;$i<$cpopr;$i++){ ?>
												<?php echo json_encode($mmm[$i]) ?>,
											<?php
											} 
										?>
										]
						}
					},
					color: {
						pattern:['#48CFAD', '#EB87BF', '#4FC1E9']
					}
				});
			});


			$(function () {
				var chart = c3.generate({
					bindto: '#combine-chart2',
					data: {
						columns: [
							['OnProgress', 
								<?php 
								
								for($l=0;$l<$nuu;$l++){ ?>
									<?php echo $rankptl[$l] ?>,
								<?php
								} 

								?>
							]
							
						],
						types: {
							OnProgress: 'bar',
						}
					},
					axis: {
						//rotated : true,
						x: {
							type: 'categorized',
							categories: [
								<?php 
									for($l=0;$l<$nuu;$l++){ ?>
										<?php echo json_encode($nmap[$l]) ?>,
									<?php
									} 
								?>
											
							]
						}
					},
					color: {
						pattern:['#EB87BF', '#4FC1E9', '#4FC1E9', '#ED5565']
					}
				});
			});


			$(function () {
				var chart = c3.generate({
					bindto: '#vendor-chart',
					data: {
						columns: [
							['NilaiPreferensi', 
								<?php 
								
								for($i=0;$i<$d99-1;$i++){ ?>
									<?php 
									echo (sqrt(
										pow(json_decode(min($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
										pow(json_decode(max($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
										pow(json_decode(max($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
										//+ pow(json_decode(max($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
										))
										/
										(sqrt(
											pow(json_decode(max($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
											pow(json_decode(min($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
											pow(json_decode(min($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
											//+ pow(json_decode(min($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
											)
										+
										sqrt(
											pow(json_decode(min($x1) - ($d6[$i] / sqrt(array_sum($c1)) * 0.40)), 2) + 
											pow(json_decode(max($x2) - ($d7[$i] / sqrt(array_sum($c2)) * 0.30)), 2) + 
											pow(json_decode(max($x3) - ($d8[$i] / sqrt(array_sum($c3)) * 0.30)), 2) 
											//+ pow(json_decode(max($x4) - ($d9[$i] / sqrt(array_sum($c4)) * 0.25)), 2)
											)
										)
							 ?>,
								<?php
								} 

								?>
							],		
						],
						types: {
							NilaiPreferensi: 'bar',
						}
					},

					axis: {
						rotated: true,
						x: {
							type: 'categorized',
							
							categories: [
								<?php 
								
								for($i=0;$i<$d99-1;$i++){ ?>
									<?php echo json_encode($d2[$i]) ?>,
								<?php
								} 

								?>
							],
						}
					},
					color: {
						pattern:['#4FC1E9']
					}
				});
			});

		</script>
<script src="assets/js/scripts.js"></script>

<?php 
} elseif($target=='filtering_log'){ ?>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>

	<!--common script init for all pages-->
	<script src="assets/js/bootstrap-switch.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/select2/select2.js"></script>
	<script src="assets/js/advanced-form.js"></script>


	<!--dynamic table-->
	<script type="text/javascript" language="javascript" src="assets/js/advanced-datatable/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="assets/js/data-tables/DT_bootstrap.js"></script>
	<!--common script init for all pages-->
	<script src="assets/js/scripts.js"></script>
	<!--dynamic table initialization -->
	<script src="assets/js/dynamic_table_init.js"></script>

<?php } elseif($target=='data' or $target=='subprogress' or $target=='mks_subprogress' or $target=='vendor_progress' or $target=='user' or $target=='kategori_kendala' or $target=='log_user' or $target=='vendor' or $target=='ppi' or $target=='edit_ppi'  or $target=='data_mks' or $target=='vendor_resume' or $target=='so_resume' or $target=='cutoff' or $target=='ptl_progress'){?>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<!--Easy Pie Chart-->
	<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
	<!--Sparkline Chart-->
	<script src="assets/js/sparkline/jquery.sparkline.js"></script>
	<!--jQuery Flot Chart-->
	<script src="assets/js/flot-chart/jquery.flot.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>

	<!--common script init for all pages-->
	<script src="assets/js/bootstrap-switch.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/js/select2/select2.js"></script>
	<script src="assets/js/advanced-form.js"></script>


	<!--dynamic table-->
	<script type="text/javascript" language="javascript" src="assets/js/advanced-datatable/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="assets/js/data-tables/DT_bootstrap.js"></script>
	<!--common script init for all pages-->
	<script src="assets/js/scripts.js"></script>
	<!--dynamic table initialization -->
	<script src="assets/js/dynamic_table_init.js"></script>

	
	
<?php } elseif($target=='detail'){?>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-1.8.3.min.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>

	<script src="assets/js/bootstrap-switch.js"></script>

	<script type="text/javascript" src="assets/js/fuelux/js/spinner.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
	<script type="text/javascript" src="assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

	<script src="assets/js/jquery-tags-input/jquery.tagsinput.js"></script>

	<script src="assets/js/select2/select2.js"></script>
	<script src="assets/js/select-init.js"></script>

	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/toggle-init.js"></script>
	<script src="assets/js/advanced-form.js"></script>

	<!--Easy Pie Chart-->
	<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
	<!--Sparkline Chart-->
	<script src="assets/js/sparkline/jquery.sparkline.js"></script>
	<!--jQuery Flot Chart-->
	<script src="assets/js/flot-chart/jquery.flot.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>

	<!--common script init for all pages-->
	<script src="assets/js/scripts.js"></script>

	<script>

		$(function() {
			$("#status_progress").on("change", function() {
				$("#status_progress").val() === "2" ?
					$('.kategori').removeClass('hide')
					&& $('.description').removeClass('hide') 
					&& $('.vendor').addClass('hide') 
					&& $('.timeline').addClass('hide')
					&& $('.popr').addClass('hide')
					:
					$('.kategori').addClass('hide')
					&& $('.description').addClass('hide') 
					&& $('.vendor').removeClass('hide')
					&& $('.timeline').addClass('hide')
					&& $('.popr').removeClass('hide')
			}).trigger("change");
		});

		$(function() {
			$("#langsung").on("change", function() {
				$("#langsung").val() === "1" ?
					$('.vendor').removeClass('hide') && $('.timeline').addClass('hide'):
					$('.timeline').removeClass('hide')
			}).trigger("change");
		});

		$(function() {
			$("#ppi").on("change", function() {
				$("#ppi").val() === "1" ?
					$('.vendor').removeClass('hide') && $('.timeline').removeClass('hide') && $('.langsung').removeClass('hide'):
					$('.vendor').addClass('hide') && $('.timeline').addClass('hide') && $('.langsung').addClass('hide')
			}).trigger("change");
		});
		
		$(function() {
			$("#statusmulai").on("change", function() {
				$("#statusmulai").val() === "1"?
					$('.ppi').removeClass('hide') 
					&& $('.vendor').removeClass('hide')
					&& $('.kategori').addClass('hide') 
					&& $('.description').addClass('hide')
					&& $('.timeline').removeClass('hide')
					:
					$('.ppi').addClass('hide') 
					&& $('.vendor').addClass('hide') 
					&& $('.kategori').removeClass('hide')
					&& $('.description').removeClass('hide')
					&& $('.timeline').addClass('hide')
			}).trigger("change");
		});
	</script>

	
<?php }else { ?>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>

	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery-1.8.3.min.js"></script>
	<script src="assets/bs3/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="assets/js/jquery.scrollTo.min.js"></script>
	<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
	<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>
	<script src="assets/js/jquery.nicescroll.js"></script>

	<script src="assets/js/bootstrap-switch.js"></script>

	<script type="text/javascript" src="assets/js/fuelux/js/spinner.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script type="text/javascript" src="assets/js/jquery-multi-select/js/jquery.multi-select.js"></script>
	<script type="text/javascript" src="assets/js/jquery-multi-select/js/jquery.quicksearch.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

	<script src="assets/js/jquery-tags-input/jquery.tagsinput.js"></script>

	<script src="assets/js/select2/select2.js"></script>
	<script src="assets/js/select-init.js"></script>

	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/toggle-init.js"></script>
	<script src="assets/js/advanced-form.js"></script>

	<!--Easy Pie Chart-->
	<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
	<!--Sparkline Chart-->
	<script src="assets/js/sparkline/jquery.sparkline.js"></script>
	<!--jQuery Flot Chart-->
	<script src="assets/js/flot-chart/jquery.flot.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
	<script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>

	<!--common script init for all pages-->
	<script src="assets/js/scripts.js"></script>
<?php } ?>