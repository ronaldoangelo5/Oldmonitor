<?php
session_start();
include ('../PHPmailer/index.php');


$id = $_GET['id'];

//echo $id;



//$cc = ["abdillahanan@gmail.com", "ananabdillahhatta@gmail.com"];
//$to = ["ananabdillah@gmail.com", "johnabdillah9@gmail.com"];


//$to = array("ananabdillah@gmail.com","johnabdillah9@gmail.com");
//$cc = array("abdillahanan@gmail.com", "ananabdillahhatta@gmail.com");

Send_Mail($id); 

?>