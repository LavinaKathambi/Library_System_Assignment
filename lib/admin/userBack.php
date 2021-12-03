<?php include("connection.php");

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if(isset($_POST['add']))
{ $password=randomPassword();
  extract($_POST);
 $query="INSERT INTO users(first_name, last_name,password, email,user_type) VALUES ('$fname','$lname','$password','$email',$utype)";
  echo $query;
  $db=con_function();
  $success=$db->query($query);
  if ($success) {
  header("location:viewUsers.php?msg=Successfully Created");
  }
  else{

  	header("location:viewUsers.php?er=Error ! Error in Creating User");
  }
}

if(isset($_POST['update']))
{ extract($_POST);

 $query="UPDATE users SET first_name='$fname',password='$password',last_name='$lname',email='$email',user_type=$utype WHERE id=$id";
  $db=con_function();
  $success=$db->query($query);
  if ($success) {
  header("location:viewUsers.php?msg=Successfully Updated");
  }
  else{
  	header("location:viewUsers.php?er=Error in update");
  }
}

if(isset($_GET['id123']))
{ 
  $id=$_GET['id123'];

 $query="DELETE FROM users WHERE  id=$id";
  
  $db=con_function();
  $success=$db->query($query);
  if ($success) {
  header("location:viewUsers.php?msg=Successfully Removed");
  }
  else{
  	header("location:viewUsers.php?er=Error User Not Deleted ");
  }
}

 ?>
