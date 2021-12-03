<?php include("header.php");

if(isset($_GET['msg']))
{

  echo  "<div class='alert alert-success' role='alert' id='sucess-msg'>
                                        <script>setTimeout(function(){
                                            document.getElementById('sucess-msg').style.display = 'none';
                                         }, 3000);</script>
                                      $_GET[msg]
                                      </div>";
}
if(isset($_GET['er']))
{
  echo  "<div class='alert alert-danger' role='alert' id='error-msg'>
                                        <script>setTimeout(function(){
                                            document.getElementById('error-msg').style.display = 'none';
                                         }, 3000);</script>
                                      $_GET[er]
                                      </div>";
} ?>
<br>

<br>
<H2>Manage Books</H2>


<br>
<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ISBN</th>
      <th scope="col">Name</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
    
    </tr>
  </thead>
  <tbody>
                              
                                   
                                        
<?php 
                                            
$db=con_function();

$query =$db->prepare("SELECT * FROM books where 1 ");
$query->execute();
$result=$query->get_result();
 if($result && $result->num_rows>0)
  {
    $books = array();

    while ($book =  mysqli_fetch_assoc($result))
    {
        $books[] = $book;
    }
   $i=1;
    sort($books); 
    foreach ($books as $book)
    {
   echo  "<tr class='tr-shadow'>";
   echo "<td>$i</td><td>
                                                ".$book['isbn']."
                                            </td> <td >
                                                ".$book['book_name']."
                                            </td><td >".$book['author_name']."</td><td '>".$book['status']."</td>
<td>
                                                   
                                                    </td>
                                                    ";$i++;

                                            
                                            
                                       echo " </tr>
                                      
                                        <tr class='spacer'></tr>
                                        " ;}
}else{
   echo "<b><center>No User Found</center></b>";
  
}  ?>

                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>
                                </div>

<?php include("footer.php"); ?>



