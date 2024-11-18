<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: home.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $number = $_POST["number"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $userrole=0;
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert( 'Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = mysqli_query($conn, "INSERT INTO `tb_user`(name, email, number,password,userrole) VALUES('$name','$email','$number','$password','$userrole')");
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<html lang="en">

<head>
    <title>User login Page</title>
    <link rel="stylesheet" type="text/css" href="Form.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/d86ac3d16c.js" crossorigin="anonymous"></script>
  
</head>

<body>
    <header>
        <img src="images/logo.jpg">
        <nav>
            <ul>
                <li><a href="Home.php">HOME</a></li>
                <li><a href="Product.php">PRODUCTS</a></li>
                <li><a href="About.php">ABOUT</a></li>
                <li><a href="Contact.php">CONTACT</a></li>
            </ul>
        </nav>
        <div style="margin-left: 40%; display: flex;align-items: center;">
         <li><a href="login.php"><img src="images/user-icon.png" style="width: 30px; height: 30px;"></a></li>
         <li><a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-xl"></i></a></li>
         <li><a href="cart.php"><div class="cart"><i class="fa-solid fa-cart-shopping"></i><p id="count">0</p></div></a></li>
      </div>
    </header>
    <div class="form signup" style="padding-top: 100px;">
        <span class="title">Registration Form</span>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            
            <div class="input-field">
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
                <i class="name"></i>
            </div>
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                <i class="email"></i>
            </div>
            <div class="input-field">
                <input type="text" name="number" id="number" placeholder="Enter your contact number" required>
                <i class="number"></i>
            </div>
            <div class="input-field">
                <input type="password" class="password" name="password" id="password"
                    placeholder="Create a password" required>
                <i class="password"></i>
            </div>
            <div class="input-field">
                <input type="password" class="password" name="confirmpassword" id="confirmpassword"
                    placeholder="Confirm a password" required>
                <i class="confirmpassword"></i>
            </div>
            <div class="checkbox-text">
                <div class="checkbox-content">
                    <input type="checkbox" id="termCon">
                    <label for="termCon" class="text">I accepted all terms and conditions</label>
                </div>
            </div>
            <div class="input-field button">
                <input type="submit" name="submit" id="submit" value="Signup">
            </div>
        </form>
        <div class="login-signup">
            <span class="text">Already a member?
                <a href="login.php" class="text login-link">Login Now</a>
            </span>
        </div>
    </div>
</body>

</html>