<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>products</title>
   <link rel="stylesheet" href="http://localhost/website/product.css">
   <link rel="stylesheet" href="http://localhost/website/style.css">
   <link rel="stylesheet" href="http://localhost/website/styles.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
<header>
      <img src="images/logo.jpg">
      <nav>
         <ul>
            
            <li><a href="adminpage.php">ADD PRODUCTS</a></li>
            <li><a href="productadmin.php">VIEW PRODUCTS</a></li>
         </ul>
      </nav>
      <div style="margin-left: 30%; display: flex;align-items: center;">
         
         <li><a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-xl"></i></a></li>
      </div>
   </header>
   <br><br><br><br><br><br><br>
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
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
               };
            };
         ?>
         <?php
      
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0){
               while($fetch_product = mysqli_fetch_assoc($select_products)){
            ?>

         <form action="" method="post">
            <div class=" product_list">
               <div class="product-view">
                  <div class="product-info">
                     <img src="upload/<?php echo $fetch_product['image']; ?>" alt="" style="width:200px;height: 200px;">
                     <h3 style="padding:20px; font-size:20px" ><?php echo $fetch_product['name']; ?></h3>
                     <div class="price" >Rs.<?php echo $fetch_product['price']; ?>/-</div>
                     <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                     <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                     <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                     <button class="add-to-cart">Add to Cart</button>
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