<?php include("connection.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
    
    
    <title>LMS | Sign In</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post">
      <a class="navbar-brand" href="index.php" style="font-size:28px;"> Library <span style="color:#f34e3a">Management System</span></a>
      <h1 class="h3 mb-3 font-weight-normal">LMS | Sign In</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>

      <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
    <?php session_start();
    if(isset($_POST['submit'])){
      $db=con_function();
      $email=$_POST['email'];
      $pass=$_POST['password'];

      $query = $db->prepare("SELECT * FROM users where email=? and password=? and user_type=1");
      $query->bind_param('ss',$email,$pass);
      $query->execute();
      $result = $query->get_result();

      $numrows = mysqli_num_rows($result);

        
        if ($numrows ==1){
          $row = mysqli_fetch_assoc($result);
          
          $_SESSION['name'] = $row['first_name'];
          $_SESSION['userid']=$row['id'];
          $_SESSION['type']=$row['user_type'];
        
          header('location:index.php');
        }else{
           echo "<center style='color:red'> Incorrect Email/Password </center>"; 
        }
            }


 ?>

    </form>
   


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>