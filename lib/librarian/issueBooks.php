
<?php include("header.php");
if(isset($_GET['msg']))
{

  echo  "<div class='alert alert-success' role='alert' id='sucess-msg'>
                                        <script>setTimeout(function(){
                                            document.getElementById('sucess-msg').style.display = 'none';
                                         }, 3000);</script>
                                      $_GET[msg]
                                      </div>";
}
if(isset($_GET['er']))
{
  echo  "<div class='alert alert-danger' role='alert' id='error-msg'>
                                        <script>setTimeout(function(){
                                            document.getElementById('error-msg').style.display = 'none';
                                         }, 3000);</script>
                                      $_GET[er]
                                      </div>";
}
 ?>
<br>

<h2>Issue Book</h2>
<div class="form-border">
    <form class="needs-validation" method="POST" action="issueBookBackend.php" onsubmit="return check();">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Select User</label>
     <select class="form-control" name="user_id" id="user_id" required>
        <option selected disabled >Choose...</option>
        <?php 
      $db=con_function();
      $query = $db->prepare("Select id,first_name,last_name from users where 1 ");
      $query->execute();
      $result = $query->get_result();
      while ($row = $result->fetch_assoc()){
 echo "<option value='$row[id]'>$row[first_name] $row[last_name]</option>";
}
       ?>
      </select>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Select Book</label>
     <select class="form-control" name="book_id" id="book_id" required>
        <option selected disabled >Choose...</option>
    <?php 
    
$query = $db->prepare("Select id,book_name from books where status='Available'" );
      $query->execute();
      $result = $query->get_result();
      while ($row = $result->fetch_assoc()){
 echo "<option value='$row[id]'>$row[book_name]</option>";
}

    ?>


      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label >Issue Date</label>
      <input type="date" name="issue_date" id="issue_date" class="form-control" required>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Comments<small>(if any)</small></label>
      <textarea name="description" rows="5" id="description" class="form-control" required></textarea>
    </div>
  </div>
  
  <br>

 <button type="Submit" class="btn btn-success" id="issue" name="issue">Submit</button>
 

</form>
<?php include("footer.php"); ?>
