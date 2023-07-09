<?php
include 'connection.php';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $errors = [];
  if($email == ''){
    $errors['email'] = "Email Required";
  }
   
  if($password == ''){
    $errors['password'] = "Password Required";
  }
   if(empty($errors)){
    $select = "Select * from `user` where email = '$email' AND password = '$password'";
    $res = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($res);
    $id = $row['id'];
    $prev_email = $row['email'];
    $prev_password = $row['password'];
    if($email==$prev_email || password_verify($password,$prev_password)){
        session_start();
        $_SESSION['user_id'] = $id;
       echo"login Success and session of user id '$id' is stored in the browser";
      }
      else{
        $errors['email'] = "Invalid username or password";
      }
    
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>User Login Form</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <h2>User Login</h2>
  <form action="" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>

    <span class="error"><?php echo isset($errors['login']) ? $errors['login'] : ''; ?></span>

    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>
