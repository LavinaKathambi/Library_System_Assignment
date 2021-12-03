
<?php include("header.php");
if(isset($_GET['edit']))
{ 
   $id=$_GET['edit'];
   $query="Select * FROM books WHERE  id=$id";
  
  $db=con_function();
  $result=$db->query($query);
  $result=$db->query($query);
  $numrows = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
 ?>
<br>

<h2>Edit Book</h2>
<div class="form-border">
    <form class="needs-validation" method="POST" action="booksBackend.php">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="hidden" class="form-control"name="id" value="<?php echo $row['id']; ?>" required>
      <label for="validationCustom01">ISBN</label>
      <input type="text" name="isbn" id="isbn" class="form-control" value="<?php echo $row['isbn']; ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Book Name</label>
      <input type="text" name="book_name" id="book_name" class="form-control" value="<?php echo $row['book_name']; ?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Author Name</label>
      <input type="text" name="author_name" id="author_name" class="form-control" value="<?php echo $row['author_name']; ?>" required>
    </div>
    <div class="col-md-6 mb-6">
      <label >Status</label>
      <select class="form-control" name="status" id="status" required>
      	<option selected disabled >Choose...</option>
        <?php if($row['status']=="Available") {
      	echo "<option value='Available' Selected>Available</option>";
        echo "<option value='Issued' >Issued</option>";
      }else {
       echo "<option value='Available' >Available</option>";
      	echo "<option value='Issued' Selected>Issued</option>";}
        ?>
      </select>

    </div>
    
  </div>
   <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Comments<small>(if any)</small></label>
      <textarea name="description" rows="5" id="description" class="form-control" required> <?php echo rtrim($row['description']); ?>
      </textarea>
    </div>
    
  </div>
  
  <br>

 <button type="Submit" class="btn btn-success" id="update" name="update">Submit</button>
<button type="button" class="btn btn-danger" onclick="clearField();" >Clear</button>
 

</form>
<?php } include("footer.php"); ?>
<script>
  function clearField()
{
document.getElementById('book_name').value="";
document.getElementById('author_name').value="";
document.getElementById('isbn').value="";
document.getElementById('description').value="";
}

</script>