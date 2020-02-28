<?php
session_start();
include('../inc/konek.php');

$kat = $_POST['kategori'];

//echo $kat;

$sql    = "INSERT INTO m_kategori (k_desc) VALUES ('$kat')";
$query  = mysqli_query($konek, $sql);

if($query){
    $_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=kategori_kendala";</script>
	<?php
}
else{
    $_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=kategori_kendala";</script>
	<?php
}
?>