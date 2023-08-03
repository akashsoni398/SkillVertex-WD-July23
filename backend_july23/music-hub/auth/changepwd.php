<?php 
  include "./../dbconfig.php";
  $errmsg=null;

  if(isset($_POST['submit'])) {
    $opwd = mysqli_real_escape_string($conn,$_POST['opwd']);
    $npwd = mysqli_real_escape_string($conn,$_POST['npwd']);
    $cnpwd = mysqli_real_escape_string($conn,$_POST['cnpwd']);
    session_start();
    $uid = $_SESSION['userid'];
    echo $uid;


    if($opwd!="" && $npwd!="" && $cnpwd!="") {
      if($npwd==$cnpwd) {
        $sql_query = "SELECT password as encpwd FROM users WHERE id='$uid';";
        $result = mysqli_query($conn,$sql_query);
        $rows = mysqli_fetch_array($result);
        if(password_verify($opwd,$rows['encpwd'])) {
          $encpwd = password_hash($npwd,PASSWORD_BCRYPT);
          $sql_query = "UPDATE users SET password='$encpwd' WHERE id='$uid'";
          $result = mysqli_query($conn,$sql_query);
          if($result) {
            session_destroy();
            header("Location:login.php");
          }
          else {
            $errmsg = "There was an unexpected error. Please try again";
          }
        }
        else {
          $errmsg = "Old password did not match. Please try again.";
        }
      }
      else {
        $errmsg = "New Passwords entered did not match";
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
    <h1>Change Password</h1>
    <div class="content">
      <div class="input-field">
        <input type="password" placeholder="Old Password" name="opwd" cautocomplete="new-password" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="New Password" name="npwd" cautocomplete="new-password" required>
      </div>
      <div class="input-field">
        <input type="password" placeholder="Confirm New Password" name="cnpwd" cautocomplete="new-password" required>
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