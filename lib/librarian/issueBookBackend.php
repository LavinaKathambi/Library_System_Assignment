<?php  
include("connection.php");
include('auth.php');
if(isset($_POST['issue']))
{extract($_POST);
  $db=con_function();
  $query=$db->prepare("INSERT INTO borrow (user_id, book_id, description,issue_date) VALUES (?,?,?,'$issue_date')");

  $query->bind_param("iis",$user_id,$book_id,$description);
  $query->execute();
  $success = $query->get_result();
  $db->close();
// update status in book table
   $db=con_function();
  $query2=$db->prepare("UPDATE books SET status='Issued' WHERE id=$book_id");
  $query2->execute();
  $success = $query2->get_result();

  if (!$success) {
    
  header("location:issueBooks.php?msg=Successfully Created");
  }
  else{
 die('error : '. $db->error);
  header("location:issueBooks.php?er=Error ! Error in Creating Book");
  }
}



?>