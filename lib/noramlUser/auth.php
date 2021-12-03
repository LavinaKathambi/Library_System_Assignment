<?php
session_start();
if ($_SESSION['name'] && $_SESSION['type']=='2'){
	
}	
else{
	header("location:sigin.php");
}






?>


