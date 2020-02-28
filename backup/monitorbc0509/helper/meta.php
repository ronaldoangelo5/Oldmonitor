	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ThemeBucket">
	<link rel="shortcut icon" href="assets/images/favicon.png">
	
	<title>Dashboard Admin</title>

	<?php if($target==''){ ?>	
			<!--Core CSS -->
			<link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
			<link href="assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
			<link href="assets/css/bootstrap-reset.css" rel="stylesheet">
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
			<link href="assets/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
			<link href="assets/css/clndr.css" rel="stylesheet">

			<!--clock css-->
			<link href="assets/js/css3clock/css/style.css" rel="stylesheet">

			<!--Morris Chart CSS -->
			<link rel="stylesheet" href="assets/js/morris-chart/morris.css">

			<!-- Custom styles for this template -->
			<link href="assets/css/style.css" rel="stylesheet">
			<link href="assets/css/style-responsive.css" rel="stylesheet"/>

			<!-- Meta.php Untitled 1 -->

	<?php }
	elseif($target=='dashboard'){ ?>
		<link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/js/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap-reset.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="assets/js/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
        <link href="assets/css/clndr.css" rel="stylesheet">

		<link href="assets/js/c3-chart/c3.css" rel="stylesheet"/>
		
        <!--clock css-->
        <link href="assets/js/css3clock/css/style.css" rel="stylesheet">
        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/js/morris-chart/morris.css">
		<!--<link href="assets/js/c3-chart/c3.css" rel="stylesheet"/>-->

        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet"/>






		<link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/bootstrap-reset.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

		<link rel="stylesheet" href="assets/css/bootstrap-switch.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-fileupload/bootstrap-fileupload.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-timepicker/compiled/timepicker.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-colorpicker/css/colorpicker.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/css/datetimepicker.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/jquery-multi-select/css/multi-select.css" />
		<link rel="stylesheet" type="text/css" href="assets/js/jquery-tags-input/jquery.tagsinput.css" />

		<link rel="stylesheet" type="text/css" href="assets/js/select2/select2.css" />

		<!-- Custom styles for this template -->
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/style-responsive.css" rel="stylesheet" />

		<!--
		<script>
			window.onload = function () {
	
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2",
				axisY: {
					suffix: "%",
					scaleBreaks: {
						autoCalculate: true
					}
				},
				data: [{
					type: "column",
					yValueFormatString: "#,##0\"%\"",
					indexLabel: "{y}",
					indexLabelPlacement: "inside",
					indexLabelFontColor: "white",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
			
			}
		</script>

		-->
		

	<?php
	}
	elseif($target=='data' or $target=='filtering_log' or $target=='subprogress' or $target=='mks_subprogress' or $target=='vendor_progress' or $target=='user' or $target=='kategori_kendala' or $target=='log_user' or $target=='vendor' or $target=='ppi' or $target=='edit_ppi' or $target=='data_mks' or $target=='vendor_resume' or $target=='so_resume' or $target=='cutoff' or $target=='ptl_progress'){ ?>
			<link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
			<link href="assets/css/bootstrap-reset.css" rel="stylesheet">
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

			<!--dynamic table-->
			<link href="assets/js/advanced-datatable/css/demo_page.css" rel="stylesheet" />
			<link href="assets/js/advanced-datatable/css/demo_table.css" rel="stylesheet" />
			<link rel="stylesheet" href="assets/js/data-tables/DT_bootstrap.css" />
					
			<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
			<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datetimepicker/css/datetimepicker.css" />

			<!-- Custom styles for this template -->
			<link href="assets/css/style.css" rel="stylesheet">
			<link href="assets/css/style-responsive.css" rel="stylesheet" />

	<?php } elseif($target=='detail'){ ?>
			<link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
			<link href="assets/css/bootstrap-reset.css" rel="stylesheet">
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />


			<link rel="stylesheet" href="assets/css/bootstrap-switch.css" />
			<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
			<link rel="stylesheet" type="text/css" href="assets/js/jquery-multi-select/css/multi-select.css" />
			
			<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />

			<link rel="stylesheet" type="text/css" href="assets/js/select2/select2.css" />

			<!-- Custom styles for this template -->
			<link href="assets/css/style.css" rel="stylesheet">
			<link href="assets/css/style-responsive.css" rel="stylesheet" />

	<?php } else{ ?>
			<link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
			<link href="assets/css/bootstrap-reset.css" rel="stylesheet">
			<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

			<!-- Custom styles for this template -->
			<link href="assets/css/style.css" rel="stylesheet">
			<link href="assets/css/style-responsive.css" rel="stylesheet" />
	<?php }?>