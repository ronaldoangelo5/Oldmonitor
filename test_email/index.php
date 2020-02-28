<?php
session_start();
include ('../PHPmailer/index_coba.php');


$to			= ["ananabdillah@gmail.com"]; 
$cc 		= ["ananabdillahhatta@gmail.com"];

Send_Mail($to, $cc); 

?>