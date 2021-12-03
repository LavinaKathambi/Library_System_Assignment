<?php include("header.php"); 
if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['ERR']))
{
  echo "<div class='container'> <div class='alert alert-danger' role='alert'>
  Error! Can not add product.
</div></div>";
}

?>
<br>

<div class="container">
  <h2>Create New Package</h2>
<form class="needs-validation" action="packageBack.php" method="POST" >
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Package Category</label>
   <select class="form-control" name="category" required>
<option selected disabled value="">Choose...</option>
        <option value="onemonth">Month</option>
        <option value="sixmonth">6 Month</option>
      <option value="year">Year</option>
       <option value="payg">Pay As You Go</option>
   </select>
     
  </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Package Type</label>
   <select class="form-control" name="pform" required>
<option selected disabled value="">Choose...</option>
        <option value="Basic">Basic</option>
        <option value="Pro">Pro</option>
      <option value="Premium">Premium</option>
      
   </select>
     
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Package Price</label>
    <input type="number" min="0" name="package_price" id="package_price"step="any" class="form-control" placeholder="0.00" required>
     
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Service 1</label>
  <input type="text" class="form-control" required value="-" name="service1" placeholder="Enter Service">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Service 2</label>
  <input type="text" class="form-control" required value="-" name="service2" placeholder="Enter Service">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Service 3</label>
  <input type="text" class="form-control" required value="-" name="service3" placeholder="Enter Service" >
  </div>

 <button type="Submit" class="btn btn-success" name="add">Submit</button>
 <button type="button" class="btn btn-danger" name="clear">Clear</button>



</form>
</div>
<?php include("footer.php"); ?>
