<?php include("header.php");
 ?>
<div class="container">
<H2>Customers</H2>
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
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col"> Email</th>
       <th scope="col"> Phone</th>
     

    
    </tr>
  </thead>
  <tbody>
                              
                                    <tbody>
                                        
                                            <?php 


  $con=con_function();

$sql ="SELECT * FROM customer";
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
      <td><?php echo $row["phone"]; ?></td>
    
  </tr>
<?php }}
else{
  echo"No User Found.";
}
 
 
    ?>                                                                         
                                    </tbody>
                                </table>
</div>
<?php include("footer.php"); ?>




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