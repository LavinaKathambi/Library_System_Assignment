<?php include("header.php");


 ?>
<br>

<br>
<H2>All Issued Books</H2>
<p>All Books that were issue to any user in past.With Current Status</p>
<br>
<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ISBN</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
      

   
    </tr>
  </thead>
  <tbody>
                              
                                   
                                        
<?php 
                                            
$db=con_function();

$query =$db->prepare("Select DISTINCT b.* from books b, borrow bor where b.id=bor.book_id");
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



