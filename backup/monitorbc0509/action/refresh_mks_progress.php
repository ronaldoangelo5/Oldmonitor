<?php
session_start();
include ('../inc/konek.php');

$id = $_GET['id'];

$sql1   = "UPDATE m_project SET p_closed_date=null, p_status='0', p_v_id=null WHERE p_id=$id";
$sql2   = "DELETE FROM m_progress WHERE r_p_id = $id";

$query1 = mysqli_query($konek, $sql1);
$query2 = mysqli_query($konek, $sql2);

if($query1 && $query2){
    //echo "success";
    $_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=data_mks";</script>
	<?php
}
else{
    //echo "failed";
    $_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=data_mks";</script>
	<?php
}

?>