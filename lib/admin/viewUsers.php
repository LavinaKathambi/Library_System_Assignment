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
<H2>All Users</H2>


<div class="bg-light clearfix">
 
 <a href="createUser.php"> <button type="button" class="btn btn-secondary float-right">Add New</button></a>
</div>

<br>
<table class="table" id="tab1" >
  <thead class="abc">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col"> Last Name</th>
      <th scope="col"> Type</th>
      <th scope="col"> Email</th>
      <th> Edit</th>
      <th> Delete</th>

    
    </tr>
  </thead>
  <tbody>
                              
                                   
                                        
<?php 
                                            
$db=con_function();
$query ="SELECT * FROM users where 1 ";
$result=$db->query($query);
 if($result && $result->num_rows>0)
  {
 $users = array();

    while ($user =  mysqli_fetch_assoc($result))
    {
        $users[] = $user;
    }
   $i=1;
    sort($users); 
    foreach ($users as $user)
    {
   echo  "<form><tr class='tr-shadow'>";
   echo "<td>$i</td><td>
                                                ".$user['first_name']."
                                            </td> <td class='desc'>
                                                ".$user['last_name']."
                                            </td><td class='desc'>".$user['user_type']."</td><td class='desc'>".$user['email']."</td>
<td>
                                                    <button class='btn btn-link btn-sm' >
                                                        <a  
                                                        href='editUser.php?edit=$user[id]'>
                                                        Edit

                                                    </button>
                                                    </td>
                                            <td>
                                                    <button class='btn btn-link btn-sm' >
                                                        <a  
                                                        href='userBack.php?id123=$user[id]'>
                                                        delete

                                                    </button>
                                                    </td>
                                                    ";}

                                            
                                            
                                       echo " </tr>
                                        </form>
                                        <tr class='spacer'></tr>
                                        " ;
$i++;}else{
   echo "<b><center>No User Found</center></b>";
  
}  ?>

                                            
                                            
                                            
                                            
                                            
                                          
                                            
                                                
                                       
                                    </tbody>
                                </table>
                                </div>

<?php include("footer.php"); ?>



