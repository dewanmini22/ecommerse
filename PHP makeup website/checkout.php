<?php
@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $method = $_POST['method'];
   
   
   
   $result = mysqli_query($conn, "SELECT id FROM tb_user WHERE login_status IS NOT NULL");
   $row = mysqli_fetch_assoc($result);
   $userID = $row['id'];

   $detail_query = mysqli_query($conn, "INSERT INTO `order` (user_id, name, number, address, city, method) VALUES ('$userID','$name','$number','$address','$city','$method')") or die('query failed');
    
    if ($detail_query) {
        $insertedID = mysqli_insert_id($conn);

        $query = "UPDATE cart SET status = '1',order_id = $insertedID WHERE user_id = $userID";
        mysqli_query($conn, $query);
    }
}

?>

<html lang="en">

<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="checkout.css">
    <script src="https://kit.fontawesome.com/d86ac3d16c.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <img src="images/logo.jpg">
        <nav>
            <ul>
                <li><a href="Home.php">HOME</a></li>
                <li><a href="product.php">PRODUCTS</a></li>
                <li><a href="About.php">ABOUT</a></li>
                <li><a href="Contact.php">CONTACT</a></li>
            </ul>
        </nav>
        <div style="margin-left: 40%; display: flex;align-items: center;">
            <li><a href="login.php"><img src="images/user-icon.png" style="width: 30px; height: 30px;"></a></li>
            <li><a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-xl"></i></a></li>
            <?php 
            $result = mysqli_query($conn, "SELECT COUNT(c.id) AS count FROM cart AS c
                                          JOIN tb_user AS u ON u.id = c.user_id
                                          where c.user_id in(SELECT id FROM tb_user WHERE login_status IS NOT NULL) AND c.status = 0");
            $count = mysqli_fetch_assoc($result);
            $pCount = $count["count"];
         ?>
         <li><a href="cart.php"><div class="cart"><i class="fa-solid fa-cart-shopping"></i><p id="count"><?php echo $pCount?></p></div></a></li>
        </div>
    </header>
    <br><br><br><br><br>
    <div class="row">

        <div class="col-75">
            <div class="container">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="user"></i> Full Name</label>
                            <input type="text" id="fname" name="name">
                            <label for="text"><i class="number"></i> Contact number</label>
                            <input type="text" id="Cnumber" name="number">
                            <label for="adr"><i class="address-card"></i> Address</label>
                            <input type="text" id="adr" name="address">
                            <label for="city"><i class="institution"></i> City</label>
                            <input type="text" id="city" name="city">
                        </div>

                        <div class="col-50">
                            <h3>Payment Method</h3>

                            <div>
                                <select name="method" class="select_box">
                                    <option value="cash on delivery" selected >cash on delivery</option>
                                    <option value="credit cart">credit cart</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <input type="submit" value="Continue to checkout" name="order_btn" class="btn">
                </form>
            </div>
        </div>
    </div>
</html>