<?php include("header.php");
 ?>
<br>

<h2>Create User</h2>
<div class="form-border">
    <form class="needs-validation" method="POST" action="userBack.php" onsubmit="return check();">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">First Name</label>
      <input type="text" name="fname" id="fname" class="form-control" placeholder="Mark" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last Name</label>
      <input type="text" name="lname" id="lname" class="form-control" placeholder="Otto" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Email</label>
      <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">User Type</label>
      <select class="custom-select" id="utype" name="utype"required>
        <option selected disabled value="">Choose...</option>
        <option value="1">Librarian</option>
        <option value="2">Normal User</option>
      </select>
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
document.getElementById('fname').value="";
document.getElementById('lname').value="";
document.getElementById('email').value="";
document.getElementById('utype').value="";
}

</script>