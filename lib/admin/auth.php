<?php
session_start();
if ($_SESSION['name'] && $_SESSION['user_type']==0){
	
}	
else{
	header("location:sigin.php");
}






?>


