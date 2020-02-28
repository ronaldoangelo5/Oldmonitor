<?php
session_start();
include('../inc/konek.php');

$idp    = $_POST['idp'];
$pr     = $_POST['updatepr'];
$po     = $_POST['updatepo'];
$gr   	= $_POST['updategr'];


echo $idp."<br/>".$pr."<br/>".$po."<br/>".$gr;


/*
if($query){
	$_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $idp?>";</script>
	<?php
}
else{
	$_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=detail&id=<?php echo $idp?>";</script>
	<?php
}
*/
?>