<?php
$signup = false;
$showerror = false;
require 'dbconnect.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $user = $_POST['username'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];

  $existsql = "SELECT * FROM `user` WHERE `username` = '$user' ";
  $Existresult = mysqli_query($conn, $existsql);

  $num = mysqli_num_rows($Existresult);
  if ($num > 0) {
    $showerror = "Username Already Exists.";
  } else {



    if ($pass == $cpass) {





      $sql = "INSERT INTO `user`( `username`, `password`) VALUES ('$user','$pass')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        $signup = true;
        header("location:login.php");
      }

    } else {
      $showerror = "Password doesn't match";

    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Signup</title>
</head>

<body>
  <?php require 'nav.php';

  if ($signup) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Sign Up successfull!</strong> You are successlly registered.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';

  }
  if ($showerror) {
    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Sign up Failed! </strong> ' . $showerror. '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';

  }
  
  ?>
  <div class="container" mt-4>



    <h1 class='text-center'>Sing Up to our Website</h1>

    <form action="/learning/signup.php" method="POST">
      <div class="form-group">
        <label for="username">Email address</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
          placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>

      <div class="form-group">
        <label for="cpassword">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Password">
      </div>

      <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>