<?php
include 'connection.php';
if (isset($_POST['submit'])) {
  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $hashedPassword = password_hash($password,PASSWORD_DEFAULT);
  $c_password = $_POST["c_password"];
  $mobile_no = $_POST["mobile_no"];
  $gender = $_POST["gender"];
  $errors = [];

  if (empty($name)) {
    $errors['name'] = "Name is required.";
  }

  if (empty($email)) {
    $errors['email'] = "Email is required.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
  }

  if (empty($password)) {
    $errors['password'] = "Password is required.";
  } elseif (strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters long.";
  }

  if ($password !== $c_password) {
    $errors['c_password'] = "Passwords do not match.";
  }

  if (empty($mobile_no)) {
    $errors['mobile_no'] = "Mobile number is required.";
  } elseif (!preg_match("/^[0-9]{10}$/", $mobile_no)) {
    $errors['mobile_no'] = "Invalid mobile number format.";
  }

  if (empty($gender)) {
    $errors['gender'] = "Gender is required.";
  }
  if (empty($errors)) {
    if($name =="Himal Acharya" && $email == "himal11@gmail.com" && $password == "himal@123"){
      $sqladmin  = "INSERT INTO `admin`(`name`,`email`,`password`,`mobile`,`gender`,`role`) values('$name','$email','$password','$mobile_no','$gender','admin')";
      $resadmin = mysqli_query($conn,$sqladmin);
      if($resadmin){
        header('location:login.php');
      }
    }
    else{ 
    $sqluser = "INSERT INTO `user` (name, email, password, mobile, gender,role)
            VALUES ('$name', '$email', '$hashedPassword', '$mobile_no', '$gender','user')";
      $resuser = mysqli_query($conn,$sql);
      header('location:login.php');
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>User Registration</h2>
  <form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <span class="error"><?php echo isset($errors['name']) ? $errors['name'] : ''; ?></span>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>

    <label for="c_password">Confirm Password:</label>
    <input type="password" id="c_password" name="c_password">
    <span class="error"><?php echo isset($errors['c_password']) ? $errors['c_password'] : ''; ?></span>

    <label for="mobile_no">Mobile Number:</label>
    <input type="tel" id="mobile_no" name="mobile_no">
    <span class="error"><?php echo isset($errors['mobile_no']) ? $errors['mobile_no'] : ''; ?></span>

    <label for="gender">Gender:</label>
    <select id="gender" name="gender">
      <option value="">Select</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="other">Other</option>
    </select>
    <span class="error"><?php echo isset($errors['gender']) ? $errors['gender'] : ''; ?></span>

    <input type="submit" name="submit" value="Submit">
  </form>
</body>
</html>
