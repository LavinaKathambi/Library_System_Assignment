<?php  
include("connection.php");
include('auth.php');
echo 'dsfsdfsssssssssss';

if(isset($_GET['user_id']))
{extract($_GET);
  $db=con_function();
  $query=$db->prepare("Update borrow SET return_date='2021-12-3' WHERE book_id=$book AND user_id=$user_id");
  $query->execute();
  $success = $query->get_result();
  $db->close();
// update status in book table
   $db=con_function();
  $query2=$db->prepare("UPDATE books SET status='Available' WHERE id=$book");
  $query2->execute();
  $success = $query2->get_result();
  echo "dfdsfsd";
  if (!$success) {
    
  header("location:returnBook.php?msg=Book marked as available");
  }
  else{
 die('error : '. $db->error);
  header("location:returnBook.php?er=Error ! Error in return Book");
  }
}



?>