<?php
include("connection.php");
include('auth.php');
if(isset($_POST['submit']))
{extract($_POST);
 $sql="UPDATE admin a SET a.password='$password' where admin_id=$_SESSION[userid] and a.password='$oldpass'";
 echo "$sql";
 $con=con_function();
  $r=$con->query($sql);
  if ($r) {
  header("location:changepass.php?msg=Successfully Updated");
  }
  else{
  	 header("location:changepass.php?er=Old Password Not Mantch");
  }
} 
 ?>