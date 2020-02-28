<?php

session_start();
include ('../inc/konek.php');
$username = $_POST['username'];
$password = md5(trim($_POST['password']));

	$sql = "select  * from m_user where u_name='$username' and u_password='$password'";

	$sql_login	= mysqli_query($konek,$sql) or die(mysqli_error());
	$r			= mysqli_fetch_array($sql_login);

	if(mysqli_num_rows($sql_login) == 1) {
		$_SESSION['iconmon'] 		= $username;
		$_SESSION['lvlmon']  		= $r['u_level'];
		$_SESSION['idmon'] 			= $r['u_id'];
		$_SESSION['unamemon'] 		= $r['u_name'];
		$_SESSION['unamecrm']		= $r['u_name_crm'];
	?>
	<script language ="javascript">location.href ="<?php echo $base_url?>/"; </script>
	<?php
	}
	else {
		echo '<div class="alert bg-red alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			username atau password anda salah
			</div>';
	}




?>

