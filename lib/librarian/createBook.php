
<?php include("header.php");
 ?>
<br>

<h2>Create User</h2>
<div class="form-border">
    <form class="needs-validation" method="POST" action="booksBackend.php" onsubmit="return check();">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">ISBN</label>
      <input type="text" name="isbn" id="isbn" class="form-control" placeholder="12345678" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Book Name</label>
      <input type="text" name="book_name" id="book_name" class="form-control" placeholder="Otto" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Author Name</label>
      <input type="text" name="author_name" id="author_name" class="form-control" required>
    </div>
    <div class="col-md-6 mb-6">
      <label >Status</label>
      <select class="form-control" name="status" id="status" required>
      	<option selected disabled >Choose...</option>
      	<option value="Available">Available</option>
      	<option value="Issued">Issued</option>
      </select>

    </div>
    
  </div>
   <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Comments<small>(if any)</small></label>
      <textarea name="description" rows="5" id="description" class="form-control" required></textarea>
    </div>
    
  </div>
  
  <br>

 <button type="Submit" class="btn btn-success" id="add" name="add">Submit</button>
<button type="button" class="btn btn-danger" onclick="clearField();" >Clear</button>
 

</form>
<?php include("footer.php"); ?>
<script>
  function clearField()
{
document.getElementById('book_name').value="";
document.getElementById('author_name').value="";
document.getElementById('isbn').value="";
document.getElementById('description').value="";
}

</script>