<?php  include('header.php'); ?>

<div class="container">
<H2>Membership Record</H2>
<div class="row">
										<div class="col-md-4">
										
										  </div>
										<div class="col-md-4"></div>
										<div class="col-md-4">
											<input type="text" id="myInput" class="form-control" placeholder="Search ...">
										</div>
									</div>
<br>
<table class="table" id="myTable" >
  <thead class="abc">
    <tr>
      <th scope="col">Sale ID</th>
      <th scope="col">Customer</th>
      <th scope="col"> Email</th>
       <th scope="col"> Package</th>
       <th scope="col"> Purchase Date</th>
      <th scope="col"> Cancel</th>

    
    </tr>
  </thead>
  <tbody>
                              
                                    <tbody>
                                        
                                            <?php 


  $con=con_function();

$sql ="Select p.id,c.username,c.email,pkg.pform,pkg.ptype,p.purchaseDate,p.status
from purchases p INNER JOIN packages pkg on p.pid=pkg.id INNER JOIN customer c on c.id=p.cid";
$r=$con->query($sql);
if($r){
for($row_no=0;$row_no<$r->num_rows;$row_no++)
{


  $r->data_seek($row_no);
  $row=$r->fetch_assoc();

?>
  <tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
<?php $purchaseType="";
  if($row["ptype"]=='onemonth')
  {
  	$purchaseType="Monthly";
  }
else if($row["ptype"]=="year")
{
	$purchaseType="1 Year";
}
else if($row["ptype"]=="sixmonth")
{
	$purchaseType="6 Months";
}
else if($row["ptype"]=="payg")
{
	$purchaseType="Pay As You Go";
}


    ?>

      <td><?php echo $purchaseType." ". $row["pform"]; ?></td>
       <td><?php echo $row["purchaseDate"]; ?></td>
       <?php if($row['status']!='cancelled'){ ?>
        <td><a href="cancelMember.php?id=<?php echo $row["id"]; ?>"><button type="button" class="btn btn-link" style="color:red">Cancel</button></a></td>
    <?php }else{ ?>
      <td>Cancelled</td>
  </tr>
<?php }}}
else{
  echo"No Record Found.";
}
 
 
    ?>                                                                         
                                    </tbody>
                                </table>
</div>
<script>
									
									window.onload = function(){
										
									  $("#myInput").on("keyup", function() {
										var value = $(this).val().toLowerCase();
										$("#myTable tr").filter(function() {
										  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
										});
									  });
									};
									</script>
<?php include('footer.php'); ?>