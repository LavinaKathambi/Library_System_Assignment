
<?php 

include("header.php");if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['er']))
{
  echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[er]
</div></div>";
} ?>

<h2>Change Password</h2>
<div class="container">
	
    <form class="form-signin" method="post" onsubmit="return fun()" action="backpass.php">
      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
         

      		 <label for="validationCustom04">old Password</label>
      <input type="password" name="oldpass" class="form-control" id="oldpass"  required>
      
      	</div>
      	<div class="col-md-4"></div>
      </div>
      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
      		 <label for="validationCustom04">New Password</label>
      <input type="Password" name="password" class="form-control" id="pass1" required>
      
      	</div>
      	<div class="col-md-4"></div>
      </div>
      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
      		 <label for="validationCustom04">Confirm Password</label>
      <input type="Password" name="cpassword" class="form-control" id="pass2"  required>
      
      	</div>
      	<div class="col-md-4"></div>
      </div>
      <br>
      <br>

      <div class="form-row">
      	<div class="col-md-4"></div>
      	<div class="col-md-4">
     <input type="submit" name="submit" value="Edit" class="btn btn-primary col-md-4">
      </div>

      <div class="col-md-4"></div>
    
    </form>
   <script type="text/javascript">
  function CheckPassword(inputtxt) 
{ 
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,25}$/;
if(inputtxt.match(decimal)) 
{ 

return true;
}
else
{ 
alert('password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character')
return false;
}
} 

    function fun()
    {
      pass1=document.getElementById('pass1').value;
      pass2=document.getElementById('pass2').value;
      if(pass1===pass2)
      {
        result=CheckPassword(pass1)
        return result;
      }
      else{
        alert("Password Dose't match");
        return false;
      }
    }
 
   </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</div>

<?php include("footer.php"); ?>