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
    //user tries to log in
    $selectUser = "Select * from `user` where email = '$email'";
    $resUser = mysqli_query($conn,$select);
    $rowUser = mysqli_fetch_assoc($resUser);
    $userId = $rowUser['id'];
    $userrole = $rowUser['role'];
    //admin tries to login
    $selectAdmin = "SELECT * FROM `admin` where email = '$email'";
    $resAdmin = mysqli_query($conn,$select);
    $rowAdmin = mysqli_fetch_assoc($resAdmin);
    $adminId = $rowAdmin['id'];
    $adminrole = $rowAdmin['role'];

    if($resUser && mysqli_num_rows($resUser) && password_verify($password,$rowUser['password'])){
      session_start();
      $_SESSION['userId']  = $userId;
      $_SESSION['role'] = $userrole;
      header('location:movies.php');
    }
    else if($resAdmin && mysqli_num_rows($resAdmin) &&password_verify($password,$rowAdmin['password'])){
      session_start();
      $_SESSION['adminId'] = $adminId;
      $_SESSION['role'] = $adminrole;
      header('location:admin.php');
    }
    else{
      echo "Wring username or password";
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
<body class="main-body">
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
