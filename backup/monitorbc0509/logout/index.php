<?php
include ('../inc/konek.php');
session_start();
//session_destroy();
unset($_SESSION['iconmon']);
unset($_SESSION['lvlmon']);
unset($_SESSION['idmon']);
unset($_SESSION['unamemon']);

header("location:../index.php");
?>