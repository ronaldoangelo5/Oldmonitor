<?php
session_start();
include('../inc/konek.php');

$nama   = $_POST['nama_vendor'];
$pic    = $_POST['pic_vendor'];
$no     = $_POST['no_pic'];


$sql = "INSERT INTO m_vendor (v_name, v_pic, v_pic_telp) VALUES ('$nama', '$pic', '$no')";
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