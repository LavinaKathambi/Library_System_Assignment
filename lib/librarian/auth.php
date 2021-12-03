<?php
session_start();
if ($_SESSION['name'] && $_SESSION['type']=='1'){
	
}	
else{
	header("location:sigin.php");
}






?>


