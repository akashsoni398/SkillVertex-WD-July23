<?php 
  include "./../dbconfig.php";
  $errmsg=null;

  if(isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    $cpwd = mysqli_real_escape_string($conn,$_POST['cpwd']);


    if($name!="" && $email!="" && $pwd!="" && $cpwd!="") {
      if($pwd==$cpwd) {
        $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email';";
        $result = mysqli_query($conn,$sql_query);
        $rows = mysqli_fetch_array($result);
        if($rows['usercount']==0) {
          $encpwd = password_hash($pwd,PASSWORD_BCRYPT);
          $sql_query = "INSERT INTO users (name,email,password) VALUES ('$name','$email','$encpwd');";
          $result = mysqli_query($conn,$sql_query);

          if($result) {
            header("Location:login.php");
          }
          else {
            $errmsg = "There was an unexpected error. Please try again";
          }
        }
        else {
          $errmsg = "Account already exists. Please login.";
        }
      }
      else {
        $errmsg = "Passwords entered did not match";
      }
    }
    else {
      $errmsg = "All fields are mandatory";
    }
  }
?>

<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Registration Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="./../assets/css/auth.css">
  <style>
    .form {
      margin: 65px auto;
    }
  </style>
</head>
<body>
<div class="form">
  <form method="post" action=""> 
    <h1>Sign Up</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" placeholder="Full Name" name="name" required>
      </div>
      <div class="input-field">
        <input type="email" placeholder="Email" name="email" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="pwd" cautocomplete="new-password" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="Confirm Password" name="cpwd" cautocomplete="new-password" required>
      </div>
      <p class="error"><?php echo $errmsg ?></p>
      <button type="submit" name="submit" value="login" class="link">SUBMIT</button><br>
      <a href="#" class="link">Forgot Your Password?</a>
    </div>
    <div class="action">
      <button>Sign in</button>
      <button>Register</button>
    </div>
  </form>
</div>
</body>
</html>