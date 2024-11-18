<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_quantity = 1;

   $result = mysqli_query($conn, "SELECT id FROM tb_user WHERE login_status IS NOT NULL");
   $getAuthUserId = mysqli_fetch_assoc($result);
   $userId = $getAuthUserId["id"];

   $checkProductAllreadyBuy = mysqli_query($conn, "SELECT id FROM cart WHERE product_id = $product_id AND user_id = $userId AND status = 0");
   $getData = mysqli_fetch_assoc($checkProductAllreadyBuy);

   if(!empty($getData))
   {
      $rowId = $getData["id"];
      $query = "UPDATE cart SET quantity = quantity + 1 WHERE id = $rowId ";
        mysqli_query($conn, $query);
      $message[] = 'Update product quantity.';
   }
   else
   {
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(quantity, product_id, user_id) VALUES('$product_quantity', '$product_id', '$userId')");
      $message[] = 'Product added to cart successfully!';
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>products</title>
   <link rel="stylesheet" href="http://localhost/website/product.css">
   <link rel="stylesheet" href="http://localhost/website/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
 <header>
      <img src="images/logo.jpg">
      <nav>
         <ul>
            <li><a href="Home.php" >HOME</a></li>
            <li><a href="Product.php" class="active">PRODUCTS</a></li>
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

   <br><br><br><br><br><br><br><br>
   <?php
if (!empty($message)) {
   foreach ($message as $msg) {
      echo '<div class="message"><span>' . $msg . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}
?>

   <div class="row">
      <div class="col-lg-12">
         <h1 class="text">Our Products</h1>
         <br><br><br>
         <p class="product_text"> Explore our wide range of exceptional beauty products, carefully curated to
         elevate your makeup game and enhance your natural beauty</p>
      </div>
   </div>
   
<div class="row">
      <div class="row">
         <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products`");
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_product = mysqli_fetch_assoc($select_products)){
         ?>


         <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class=" product_list">
               <div class="product-view">
                  <div class="product-info">
                     <img src="upload/<?php echo $fetch_product['image']; ?>" alt="" style="width:200px;height: 200px;">
                     <h3 style="padding:20px; font-size:20px" ><?php echo $fetch_product['name']; ?></h3>
                     <div class="price" >Rs.<?php echo $fetch_product['price']; ?>/-</div>
                     <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                     <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                     <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                     <input type="hidden" name="product_id" value="<?php echo $fetch_product['id']; ?>">
                     <input class="add-to-cart" type="submit" name="add_to_cart" id="add_to_cart" value="Add to Cart">
                  </div> 
               </div> 
            </div>
         </form>
         <?php
            };
            };
         ?>
      </div>
</div>

</body>
</html>