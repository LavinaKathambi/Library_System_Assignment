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
<H2>All Issued Books</H2>

<br>
<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ISBN</th>
      <th scope="col">Book Name</th>
      <th scope="col">User</th>
      <th scope="col">Issue Date</th>
      <th>Action</th>

   
    </tr>
  </thead>
  <tbody>
                              
                                   
                                        
<?php 
                                            
$db=con_function();

$query =$db->prepare("Select u.id as userId,b.id as bookId,b.isbn,b.book_name,u.first_name,u.last_name,bor.issue_date from books b, users u,borrow bor where b.status='Issued' and b.id in(Select book_id from borrow where return_date is NULL ) and u.id in(Select user_id from borrow where return_date is NULL )");
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
   echo  "<form><tr class='tr-shadow'>";
   echo "<td>$i</td><td>
                                                ".$book['isbn']."
                                            </td> <td >
                                                ".$book['book_name']."
                                            </td><td >".$book['first_name']."</td><td '>".$book['issue_date']."</td>

                                            <td>
                                                    <button class='btn btn-link btn-sm' >
                                                        <a  
                                                        href='returnBookBackend.php?book=$book[bookId]&user_id=$book[userId]'>
                                                        Return

                                                    </button>
                                                    </td>
                                                    ";$i++;

                                            
                                            
                                       echo " </tr>
                                      
                                        <tr class='spacer'></tr>
                                        " ;}
}else{
   echo "<b><center>No Book Found</center></b>";
  
}  ?>

                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>
                                </div>

<?php include("footer.php"); ?>



