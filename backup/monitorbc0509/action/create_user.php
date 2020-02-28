<?php
session_start();
include('../inc/konek.php');

$crm    = $_POST['nama_crm'];
$uname  = $_POST['username'];
$email  = $_POST['email'];
$pass   = $_POST['password'];
$lvl    = $_POST['level'];

/*
echo    $crm."<br/>".
        $uname."<br/>".
        $email."<br/>".
        $pass."<br/>".
        $lvl;
*/

$password 	= md5(trim($pass));


$sql    =  "INSERT INTO m_user (u_name_crm, u_name, u_email, u_password, u_level)
            VALUES ('$crm', '$uname', '$email', '$password', '$lvl')";

$query  = mysqli_query($konek, $sql);


if($query){
    $_SESSION['notif'] = 1;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=user";</script>
	<?php
}
else{
    $_SESSION['notif'] = 2;
	?>
		<script language="javascript"> location.href ="<?php echo $base_url ?>/?modul=user";</script>
	<?php
}
?>