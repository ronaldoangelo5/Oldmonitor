<?php
session_start();
include('../inc/konek.php');

$id 	= $_POST['v_id'];
$nama   = $_POST['nama_vendor'];
$pic    = $_POST['pic_vendor'];
$no     = $_POST['no_pic'];
$email  = $_POST['email'];

$sql 	= "UPDATE m_vendor SET v_name='$nama', v_pic='$pic', v_pic_telp='$no', v_email='$email' WHERE v_id=$id"; 
$query  = mysqli_query($konek, $sql);

if($query){
	$_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=vendor";</script>
	<?php
}
else{
	$_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=vendor";</script>
	<?php
}

?>