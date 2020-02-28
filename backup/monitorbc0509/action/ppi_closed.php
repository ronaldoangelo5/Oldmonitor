<?php
session_start();
include ('../inc/konek.php');

$id     = $_GET['id'];

$sql 	= "SELECT * FROM m_ppi WHERE ppi_id = $id";
$query	= mysqli_query($konek, $sql);
$data	= mysqli_fetch_array($query);

$pid 	= $data['ppi_project_id'];
$now 	= date('Y-m-d H:i:s');

$sql1 	=  "UPDATE m_ppi SET ppi_status='2' WHERE ppi_id='$id'";
$sql2 	=  "INSERT INTO m_progress 
			(r_p_id, r_desc, r_input_date, r_p_status, r_p_status_progress, r_kategori)
			VALUES
			('$pid', '', '$now', '11', '1', '0')";
$sql3 	=  "UPDATE m_project SET p_status='12' WHERE p_id=$pid";


$query1	= mysqli_query($konek, $sql1);
$query2	= mysqli_query($konek, $sql2);
$query3	= mysqli_query($konek, $sql3);

if($query1 && $query2 && $query3){
	//echo "success";
	$_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=ppi";</script>
	<?php
}
else{
	//echo "failed";
	$_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=ppi";</script>
	<?php
}

?>

