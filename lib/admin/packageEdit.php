<?php include("header.php"); 
if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['msg']))
{
  echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[msg]
</div></div>";
}?>

<br>
<div class="container">
<h2>Edit Package</h2>
<?php 
if(isset($_GET['packageID']))
{                                         
  
   $product=$_GET['packageID'];
                       
   $con=con_function();

$sql ="SELECT * FROM packages where id=$product ";

$r=$con->query($sql);
$row=$r->fetch_assoc();

   
   ?>
 
 
 


 <div class="container">
  <h2>Create New Package</h2>
<form class="needs-validation" action="packageBack.php" method="POST" >
  <input type="hidden" name="pkgid" value='<?php echo $product ;?>'>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Package Category</label>
   <select class="form-control" name="category" required>
<option  disabled value="">Choose...</option>
<?php  if ($row['ptype']=="onemonth") {
  echo "<option value='onemonth' selected>Month</option>";}
  else if($row['ptype']=="sixmonth")
  {
    echo " <option value='sixmonth'>6 Month</option>";
  }
  else if($row['ptype']=="year")
  {
    echo " <option value='year'>Year</option>";
  }
  else if($row['ptype']=="payg")
  {
     echo "<option value='payg'>Pay As You Go</option>";
  }
  ?>
        
      
   </select>
     
  </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Package Type</label>
   <select class="form-control" name="pform" required>
<option  disabled value="">Choose...</option>
<?php  if ($row['pform']=="onemonth") {
  }
  else if($row['pform']=="Basic")
  {
    echo " <option value='Basic'>Basic</option>";
  }
  else if($row['pform']=="Pro")
  {
    echo " <option value='Pro'>Pro</option>";
  }
  else if($row['pform']=="Premium")
  {
     echo "  <option value='Premium'>Premium</option>";
  }
  ?>
        
       
    
      
   </select>
     
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Package Price</label>
    <input type="number" min="0" name="package_price" id="package_price"step="any" class="form-control" value='<?php echo $row['pkg_price'] ;?>' required>
     
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Service 1</label>
  <input type="text" class="form-control" required value='<?php echo $row['service1'] ;?>' name="service1" placeholder="Enter Service">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Service 2</label>
  <input type="text" class="form-control" required value='<?php echo $row['service2'] ;?>' name="service2" placeholder="Enter Service">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Package Service 3</label>
  <input type="text" class="form-control" required value='<?php echo $row['service3'] ;?>'  name='service3' placeholder="Enter Service" >
  </div>

 <button type="Submit" class="btn btn-success" name="edit">Edit</button>
 <button type="button" class="btn btn-danger" name="clear">Clear</button>



</form>
<?php } ?>
</div>
<?php include("footer.php"); ?>
