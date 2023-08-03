<?php 
  include "./../dbconfig.php";
  $errmsg=null;

  if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
    if($email!="" && $pwd!="") {
      $sql_query = "SELECT count(*) AS usercount FROM users WHERE email='$email';";
      $result = mysqli_query($conn,$sql_query);
      $rows = mysqli_fetch_array($result);
      if($rows['usercount']==1) {
        $sql_query = "SELECT id,name AS uname,password as encpwd FROM users WHERE email='$email';";
        $result = mysqli_query($conn,$sql_query);
        $rows = mysqli_fetch_array($result);
        if(password_verify($pwd,$rows['encpwd'])) {
          session_start();
          $_SESSION['userid'] = $rows['id'];
          $_SESSION['username'] = $rows['uname'];
          $_SESSION['email'] = $email;
          header("Location:./../index.php");
        }
        else {
          $errmsg = "Username or password did not match";
        }
      }
      else {
        $errmsg = "Username or password did not match";
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
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href="./../assets/css/auth.css">
</head>
<body>
<div class="form">
  <form method="post" action="">
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="email" placeholder="Email" name="email" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="pwd" cautocomplete="new-password" required>
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