<?php include("connection.php");
if(isset($_POST['add']))
{ 
  extract($_POST);
  

     $query="INSERT INTO packages VALUES (0,'$category','$pform',$package_price,'$service1','$service2','$service1')";
     echo $query;
      $con=con_function();
      $result=$con->query($query);
      if ($result) {
      header("location:viewpackages.php?msg=Successfully Added");
      }
      else{
       header("location:addPackage.php?ERR=PLease Enter all Required Info");
      }
  }

if(isset($_POST['edit']))
{ extract($_POST);
 
 $query="UPDATE packages SET ptype='$category',pform='$pform',pkg_price='$package_price', service1='$service1',service2='$service2', service3='$service3' WHERE id=$pkgid";
  
  
  $con=con_function();
  echo "$query";
  $r=$con->query($query);
  if ($r) {
  header("location:viewpackages.php?msg=Successfully Updated");
  }
  else{
  	header("location:packageEdit.php?er=Error in update");
  }
}

if(isset($_GET['packageID']))
{ $id=$_GET['packageID'];

 $query="DELETE FROM packages WHERE  id=$id";
  
  $con=con_function();
  $r=$con->query($query);
  if ($r) {
  header("location:viewpackages.php?msg=Successfully Removed");
  }
  else{
  	header("location:viewpackages.php?er=Error! Product Not Deleted");
  }
}

 ?>
