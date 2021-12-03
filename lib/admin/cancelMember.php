<?php
include('connection.php');

    if(isset($_GET['id'])){
      $con=con_function();

 

$sql ="Update purchases SET status='cancelled' where id=$_GET[id]";
$data=$con->query($sql);


if($data){


          header('location:sales.php');
        }else{
           header('location:sales.php?ierr=Cannot Cancel Error');
        }
            }


 ?>