<?php 
include("header.php");
if(isset($_GET['msg']))
{
echo "<div class='container'> <div class='alert alert-success' role='alert'>
 $_GET[msg]
</div></div>";
}
if(isset($_GET['er']))
{
	echo "<div class='container'> <div class='alert alert-danger' role='alert'>
 $_GET[msg]
</div></div>";
}

?>

<div>
<br>
<div class="bg-light clearfix">
 
 <a href="addPackage.php"> <button type="button" class="btn btn-secondary float-right">Add New</button></a>
</div>
	<br>

	<form method="GET">
	<div class="form-row">
		<div class="col-md-3 mb-3"></div>
		<div class="col-md-3 mb-3">  
		 <div class="input-group ">
             <select class="custom-select"  name="place" required>
			<option selected disabled value="">Choose...</option>
        <option value="onemonth">Month</option>
        <option value="sixmonth">6 Month</option>
      <option value="year">Year</option>
       <option value="payg">Pay As You Go</option>
		</select>
    <div class="input-group-append">
      <input type="submit" name="Search"  value="Find" class="input-group-button form-control">
      
    </div>
  </div></div>
		<div class="col-md-3 mb-3"></div>

	</div>
	</form>

<br>

<?php $pkg_id=1;
if(isset($_GET['Search']))
   {                                         
                        $type=$_GET['place'];
                        if($type=='sixmonth')
    {
      echo"<h2>All Packages: 6 Month</h2>";
    }
   if($type=='onemonth')
    {
      echo"<h2>All Packages: 1 Month</h2>";
    }
     if($type=='year')
    {
      echo"<h2>All Packages: 1 Year</h2>";
    }
     if($type=='payg')
    {
      echo"<h2>All Packages: Pay As You Go</h2>";
    }
                        
                                    
                        
                                            $con=con_function();

$s=0;
$sql ="SELECT * FROM packages where ptype='$type'  ";

$row=$con->query($sql);
 if($row->num_rows>0)
  {$s=$s+$row->num_rows;
 
   $i=0;
    while ($data =  mysqli_fetch_assoc($row))
    {
        $products[] = $data;
        
    }
   $i=0;
    sort($products);
    foreach ($products as $package)
    { 
$pkg_id=$package['id'];
?>
     <div class="columns">
  <ul class="price">
    <li class="header"><?php echo $package['pform'] ;?></li>
    <li class="grey">$<?php echo $package['pkg_price']; ?></li>
    <li><?php echo $package['service1']; ?></li>
    <li><?php echo $package['service2'] ;?></li>
    <li><?php echo $package['service3']; ?></li>
    <li><?php 
    if($package['ptype']=='sixmonth')
    {
      echo"6 Month";
    }
   if($package['ptype']=='onemonth')
    {
      echo"1 Month";
    }
     if($package['ptype']=='year')
    {
      echo"1 Year";
    }
     if($package['ptype']=='payg')
    {
      echo"Pay As You Go";
    }

   ?></li>
  <li class="grey">
    <?php  echo "<a href='packageEdit.php?packageID=$pkg_id' class='btn btn-link'>Edit</a>
      <a href='packageBack.php?packageID=$pkg_id' class='btn btn-link' style='color:red'>Delete</a></li>";
      echo"</ul>
</div>";
    }}else{ ?>
<h2 style="text-align:center">No Package Found</h2> 
  <?php } ?>
  
<?php 
}

           ?>

</div>



<?php include("footer.php"); ?>
