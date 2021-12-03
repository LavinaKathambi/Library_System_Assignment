<?php include("header.php");

if(isset($_GET['edit']))
{ 
  $id=$_GET['edit'];

 $query="Select * FROM users WHERE  id=$id";
  
  $db=con_function();
  $result=$db->query($query);
  $result=$db->query($query);
  $numrows = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
?>
<br>

<h2>Edit User</h2>
<div class="form-border">
    <form class="needs-validation" method="POST" action="userBack.php" onsubmit="return check();">
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <input type="hidden" class="form-control" name="id" required value="<?php echo $row['id']; ?>"
      <label for="validationCustom01">First Name</label>
      <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['first_name']  ?>" required>
    </div>
    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Last Name</label>
      <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $row['last_name']  ?>" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-6">
      <label for="validationCustom03">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']  ?>"required>
    </div>
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">Password</label>
      <input type="password" name="password" id="password" class="form-control" value="<?php echo $row['password']  ?>"required>      
    </div>
    
  </div>
  <div class="form-row">
   
    <div class="col-md-6 mb-6">
      <label for="validationCustom04">User Type</label>
      <select class="custom-select" id="utype" name="utype"required>
        <option selected disabled value="">Choose...</option>
        <?php if($row['utype']==1){ 
        echo "<option value='1' selected>Librarian</option>";
        echo "<option value='2' >Normal User</option>";}
        else{
        echo "<option value='2' selected>Normal User</option>";
        echo "<option value='1' >Librarian</option>";}?>
      </select>
    </div>
    
  </div>
  
  <br>

<button type="Submit" class="btn btn-primary" name="update">Save</button>
<button type="button" class="btn btn-danger" onclick="clearField();" >Clear</button>
 

</form>
<?php }include("footer.php"); ?>
<script>
  function clearField()
{
document.getElementById('fname').value="";
document.getElementById('lname').value="";
document.getElementById('email').value="";
document.getElementById('utype').value="";
}


function check()
{
if(document.getElementById('fname').value=="" ||
document.getElementById('lname').value=="" ||
document.getElementById('email').value=="" ||
document.getElementById('utype').value==""|| 
document.getElementById('password').value=="")
{
alert("Please FIll all required feilds");
return false;
}
regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,25}$/;
password = document.getElementById('password').value;
 if( password.length<8)
{
   alert("Password must be at least 8 characters");
return false;
}
}

}

</script>