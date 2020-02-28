<!DOCTYPE html>
<?php
	
	ini_set('display_errors', 'ON');
	error_reporting(E_ALL);
	//error_reporting(0);

	session_start();
	date_default_timezone_set('Asia/Makassar');
	include('inc/konek.php');

	if(isset($_GET['modul'])){
		$target	= $_GET['modul'];
	}else{
		$target	= '';
	}

	if($target=="logout"){ header("Location: $base_url/logout/index.php "); };
	if($target=="login"){ header("Location: $base_url/login/index.php "); };

	if (isset($_SESSION['iconmon']))
	{
?>

<html lang="en"> 

    <head>
        <?php include('helper/meta.php');?>
		<style type="text/css">		
			body { 
				zoom: 0.8;
				height: 100%;
			}	
		</style>
		<!--
		<style type="text/css">		
			body { 
				zoom: 0.9;
				height: 100%;
			}	
			.page-container {
				height: 100%;
			}
			.status-progress {
				&.hide {
				display: none;
				}
			}
		</style>
		-->
		

		<script>
			document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
		</script> 

    </head>

    <body>        
        <section id="container">

		<?php
			include('helper/header.php'); 
			include('helper/sidebar.php');
		?>

			<!--main content start-->
			<section id="main-content">
				<section class="wrapper">

					<?php
						$session = $_SESSION['lvlmon'];

						if( $session == 1){
							if($target=='home' or $target==''){ include('modul/index.php'); }

							elseif($target=='dashboard'){ include('modul/dashboard.php'); }
							
							elseif($target=='data_mks'){ include('modul/data_mks_progress.php'); }
							elseif($target=='mks_subprogress'){ include('modul/data_mks_subprogress.php'); }

							elseif($target=='data'){ include('modul/data_progress.php'); }
							elseif($target=='subprogress'){ include('modul/data_subprogress.php'); }
							elseif($target=='detail'){ include('modul/detail_progress.php');}
							//elseif($target=='vendor_progress'){ include('modul/vendor_progress.php');}

							elseif($target=='filtering_log'){ include('modul/filtering_log.php'); }

							elseif($target=='kategori_kendala'){ include('modul/kat_kendala.php');}
							elseif($target=='tambah_kategori'){ include('modul/tambah_kat.php');}
							elseif($target=='edit_kategori'){ include('modul/edit_kat.php');}

							elseif($target=='vendor'){ include('modul/vendor.php');}
							elseif($target=='tambah_vendor'){ include('modul/tambah_vendor.php');}
							elseif($target=='edit_vendor'){ include('modul/edit_vendor.php');}

							elseif($target=='vendor_resume'){ include('modul/vendor_resume.php');}
							elseif($target=='so_resume'){ include('modul/so_resume.php');}

							elseif($target=='cutoff'){ include('modul/cutoff.php');}

							elseif($target=='ptl_progress'){ include('modul/ptl_progress.php');}

							elseif($target=='vendor_progress'){ include('modul/vendor_progress.php');}

							elseif($target=='user'){ include('modul/user.php');}
							elseif($target=='tambah_user'){ include('modul/tambah_user.php');}

							elseif($target=='ppi'){ include('modul/ppi.php');}
							elseif($target=='edit_ppi'){ include('modul/edit_ppi.php');}
							
							else{ include('modul/404.php'); }
						}
						
						else{
							//if($target=='home' or $target==''){ include('modul/index.php'); }
							if($target=='data'){ include('modul/data_progress.php'); }
							elseif($target=='subprogress'){ include('modul/data_subprogress.php'); }
							elseif($target=='detail'){ include('modul/detail_progress.php');}
							
							elseif($target=='log_user'){ include('modul/log_user.php');}
							elseif($target=='edit_log'){ include('modul/edit_log_user.php');}

							elseif($target=='ppi'){ include('modul/ppi.php');}

							else{ include('modul/404.php'); }
						}			
					?>

				</section>
			</section>
			<!--main content end-->


		    <?php include('helper/sidebar_right.php'); ?>


        </section>
        <?php include('helper/script.php');?>
		
    </body>
</html>

<?php
}
else{
	echo'<script language="javascript"> location.href ="'.$base_url.'/login/"; </script>';
}?>