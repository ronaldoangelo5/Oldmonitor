<?php
session_start();
include('../inc/konek.php');

$id 	= $_POST['id'];
$dates 	= $_POST['date'];

if(isset($_POST['kategori'])){
	$kat 	= $_POST['kategori'];
}else{
	$kat 	= null;
}

if(isset($_POST['desc'])){
	$desc 	= $_POST['desc'];
}else{
	$desc 	= null;
}


if($dates != ""){
    $date_array = explode("-",$dates);
    $var_month = $date_array[0];
    $var_day = $date_array[1];
    $var_year = $date_array[2];
    $new_date_format = "$var_year-$var_month-$var_day";

    $clock = date("H:i:s");
    $dates = date("Y-m-d", strtotime($new_date_format));

    $date = $dates." ".$clock;
}
else{
    $date = date("Y-m-d H:i:s");
}


$sql 	= "UPDATE m_progress set r_input_date='$date', r_kategori='$kat', r_desc='$desc' WHERE r_id=$id";
$query  = mysqli_query($konek, $sql);

if($query){
    $_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=log_user";</script>
	<?php
}
else{
    $_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=log_user";</script>
	<?php
}

?>