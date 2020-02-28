<?php if($target==''){ ?>	        
	<!-- Placed js at the end of the document so the pages load faster -->
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
	
	<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
	-->
	
	<script src="assets/js/calendar/clndr.js"></script>
	
	<script src="assets/js/calendar/moment-2.2.1.js"></script>
	<script src="assets/js/evnt.calendar.init.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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
	<script src="assets/js/scripts.js"></script>
	

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
        <script src="assets/js/calendar/clndr.js"></script>
        <!--<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>-->
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
		<!--<script src="assets/js/morris.init.js"></script>-->
        <!--jQuery Flot Chart-->
        <script src="assets/js/flot-chart/jquery.flot.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.animator.min.js"></script>
        <script src="assets/js/flot-chart/jquery.flot.growraf.js"></script>
        

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
			

			var ar  = <?php echo $ar ?>;
			var bai = <?php echo $bai ?>;
			var baa = <?php echo $baa ?>;
			var dll = <?php echo $dll ?>;
			

			
			/*
			var day_data = [
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[0] / $countid[0])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[1] / $countid[1])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[2] / $countid[2])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[3] / $countid[3])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[4] / $countid[4])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[5] / $countid[5])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[6] / $countid[6])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[7] / $countid[7])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[8] / $countid[8])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[9] / $countid[9])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[10] / $countid[10])) ?>},
				{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[11] / $countid[11])) ?>},
			];
			*/
			
			/*
			var day_data = [
				<?php 
				for($i=0;$i<$count44;$i++){ ?>
					{"elapsed": "", "value": <?php echo sprintf('%0.0f', json_encode($suaging[$i] / $countid[$i])) ?>},
				<?php
				} 
				?>
			];
			*/

			
			$(function () {
				var chart = c3.generate({
					bindto: '#combine-chart',
					data: {
						columns: [
							['OnProgress', <?php echo $dp2.", ".$dp3.", ".$dp4.", ".$dp5.", ".$dp6.", ".$dp7.", ".$dp8.", ".$dp9.", ".$dp10.", ".$dp12.", ".$dp13.", ".$dp14.", ".$dp15.", ".$dp16 ?>],
							['Closed', <?php echo $dc2.", ".$dc3.", ".$dc4.", ".$dc5.", ".$dc6.", ".$dc7.", ".$dc8.", ".$dc9.", ".$dc10.", ".$dc12.", ".$dc13.", ".$dc14.", ".$dc15.", ".$dc16 ?>],
							['OP_Avg', <?php echo $dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0.", ".$dp0 ?>],
							['C_Avg', <?php echo $dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0.", ".$dc0 ?>],
						],
						types: {
							OnProgress: 'bar',
							Closed: 'bar',
							OP_Avg: 'line',
							C_Avg: 'line'
						}
					},
					axis: {
						x: {
							type: 'categorized',
							categories: [
											'budi', 
											'fargun', 
											'irene', 
											'idrus', 
											'dion', 
											'rahmat', 
											'rokhmat', 
											'yusuf', 
											'zul', 
											'harun', 
											'marwan', 
											'mustari', 
											'ratno', 
											'gusti'
										]
						}
					},
					color: {
						//pattern:['#4FC1E9', '#ED5565', '#48CFAD', '#EB87BF']
						pattern:['#4FC1E9', '#ED5565', '#4FC1E9', '#ED5565']
					}
				});
			});



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
									<?php echo json_encode($ppp[$i]) ?>,
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
						//rotated: true,
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
						//pattern:['#4FC1E9', '#ED5565', '#4FC1E9', '#ED5565']
					}
				});
			});


			
			
			/*
			$(function () {
				var chart = c3.generate({
					bindto: '#combine-chart',
					data: {
						columns: [
							['PTL', 
								<?php 
									for($i=0;$i<$count44;$i++){ ?>
										<?php echo sprintf('%0.0f', json_encode($suaging[$i] / $countid[$i])) ?>,
									<?php
									} 
								?>	
							],
							['Rata-rata', 
								<?php 
									for($i=0;$i<$count44;$i++){ ?>
										<?php echo sprintf('%0.0f', $sum44) ?>,
									<?php
									} 
								?>
							],

							
						],
						types: {
							PTL: 'bar',
							Ratarata: 'line',
							Progress: 'bar'

						},
						groups: [
							['PTL','Rata-rata']
						]
					},
					axis: {
						x: {
							type: 'categorized'
						}
					}
				});
			});
			*/
			

			$(function () {
				var chart = c3.generate({
					bindto: '#roated-chart',
					data: {
					columns: [
						['Vendor', 
							<?php 
								for($i=0;$i<$count55;$i++){ ?>
									<?php echo sprintf('%0.0f', json_encode($jj[$i] / $ii[$i])) ?>,
								<?php
								} 
							?>	
						],
						['Rata-rata',
							<?php
								for($i=0;$i<$count55;$i++){ ?>
									<?php echo $sum55 ?>,
								<?php
								} 
							?>	
						]
					],
					types: {
					Vendor: 'bar'
					}
					},
					axis: {
						rotated: true,
						x: {
						type: 'categorized'
						}
					},
					color: {
						pattern:['#EB87BF', '#48CFAD']
					}
				});
			});


			/*
			$(function () {
				var chart = c3.generate({
					
					bindto: '#roasted-chart',
					data: {
						columns: [
							['V_Closed', <?php echo $sc5.", ".$sc6.", ".$sc7.", ".$sc9.", ".$sc10.", ".$sc11.", ".$sc12.", ".$sc13.", ".$sc14.", ".$sc15.", ".$sc16.", ".$sc17.", ".$sc18.", ".$sc19.", ".$sc20.", ".$sc21.", ".$sc22.", ".$sc23.", ".$sc24.", ".$sc25.", ".$sc26.", ".$sc27 ?>],
							['All_Closed', <?php echo $sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0.", ".$sc0 ?>],
						],
						types: {
							V_Closed: 'bar',
							All_Closed: 'line'
						},
					},
					axis: {
						rotated: true,
						x: {
							type: 'categorized',
							categories: [	'<?php echo $nv5 ?>', 
											'<?php echo $nv6 ?>', 
											'<?php echo $nv7 ?>', 
											'<?php echo $nv9 ?>', 
											'<?php echo $nv10 ?>', 
											'<?php echo $nv11 ?>', 
											'<?php echo $nv12 ?>', 
											'<?php echo $nv13 ?>', 
											'<?php echo $nv14 ?>', 
											'<?php echo $nv15 ?>', 
											'<?php echo $nv16 ?>', 
											'<?php echo $nv17 ?>', 
											'<?php echo $nv18 ?>', 
											'<?php echo $nv19 ?>', 
											'<?php echo $nv20 ?>',
											'<?php echo $nv21 ?>',
											'<?php echo $nv22 ?>',
											'<?php echo $nv23 ?>',
											'<?php echo $nv24 ?>',
											'<?php echo $nv25 ?>',
											'<?php echo $nv26 ?>',
											'<?php echo $nv27 ?>'],
						}
					},
					color: {
						pattern:['#4FC1E9', '#ED5565', '#48CFAD', '#EB87BF']
					}
				});
			});
			*/
			
			
			

			/*
			Morris.Line({
				element: 'graph-lines',
				data: day_data,
				xkey: 'elapsed',
				ykeys: ['value'],
				labels: ['value'],
				lineColors:['#1FB5AD'],
				parseTime: false
			});
			*/

		</script>

		<script src="assets/js/d3.v3.min.js"></script>
		<script src="assets/js/c3-chart/c3.js"></script>
		<!--<script src="assets/js/c3-chart.init.js"></script>-->
		
		<script src="assets/js/dashboard.js"></script>
        <script src="assets/js/jquery.customSelect.min.js" ></script>

        <!--common script init for all pages-->
        <script src="assets/js/scripts.js"></script>
        <!--script for this page-->

		<!--Core js-->
		<script src="assets/js/bootstrap-switch.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
		<script src="assets/js/select2/select2.js"></script>
		<script src="assets/js/advanced-form.js"></script>

		
		

<?php } elseif($target=='filtering_log'){ ?>
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