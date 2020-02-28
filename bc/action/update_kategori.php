<?php
session_start();
include('../inc/konek.php');

$id 	= $_POST['k_id']; 
$kat 	= $_POST['kategori'];


echo $kat."<br/>".$id;

$sql 	= "UPDATE m_kategori SET k_desc='$kat' WHERE k_id='$id'";
$query 	= mysqli_query($konek, $sql);



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