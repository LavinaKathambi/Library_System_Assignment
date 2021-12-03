<?php include("connection.php");

if(isset($_POST['add']))
{extract($_POST);
  $db=con_function();
  $query=$db->prepare("INSERT INTO books (isbn, book_name, author_name, description, status) VALUES (?,?,?,?,?)");

  $query->bind_param("sssss",$isbn,$book_name,$author_name,$description,$status);
  $query->execute();
  $success = $query->get_result();
  if (!$success) {
  header("location:viewBooks.php?msg=Successfully Created");
  }
  else{
 die('error : '. $db->error);
  	header("location:viewBooks.php?er=Error ! Error in Creating Book");
  }
}

if(isset($_POST['update']))
{ extract($_POST);
$db=con_function();
  $query=$db->prepare("UPDATE books SET isbn=?,book_name=?,author_name=?,description=?,status=? WHERE id=?");

  $query->bind_param("sssssi", $isbn,$book_name,$author_name,$description,$status,$id);
  $query->execute();

  $success = $query->get_result();
  if (!$success) {
  header("location:viewBooks.php?msg=Successfully Updated");
  }
  else{

  	header("location:viewBooks.php?er=Error in update");
  }
}

if(isset($_GET['id123']))
{ 
  $id=$_GET['id123'];

 $query="DELETE FROM books WHERE  id=$id";
  
  $db=con_function();
  $success=$db->query($query);
  if ($success) {
  header("location:viewBooks.php?msg=Successfully Removed");
  }
  else{
  	header("location:viewBooks.php?er=Error Book Not Deleted ");
  }
}

 ?>
