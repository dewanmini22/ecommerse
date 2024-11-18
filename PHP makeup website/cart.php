<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $user_id = $_POST['user_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE product_id = '$update_id' AND user_id = $user_id");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   $remove_id = $_GET['delete_all'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$remove_id'");
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

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
            <li><a href="Product.php">PRODUCTS</a></li>
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

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT p.id AS pid,p.name,p.price,p.image,c.quantity,c.user_id,c.id AS cid FROM cart AS c
                                             JOIN products AS p On p.id = c.product_id
                                             where c.user_id in(SELECT id FROM tb_user WHERE login_status IS NOT NULL) AND c.status = 0");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

            <tr>
               <td><img src="upload/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
               <td><?php echo $fetch_cart['name']; ?></td>
               <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
               <td>
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['pid']; ?>" >
                     <input type="hidden" name="user_id"  value="<?php echo $fetch_cart['user_id']; ?>" >
                     <input type="number" name="update_quantity" min="1"  value="<?php echo $fetch_cart['quantity']; ?>" >
                     <input type="submit" value="update" name="update_update_btn">
                  </form>   
               </td>
               <td><?php echo $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'] ?>/-</td>
               <td><a href="cart.php?remove=<?php echo $fetch_cart['cid']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
            </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="product.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>Rs.<?php echo $grand_total; ?>/-</td>
            <?php 
               $result = mysqli_query($conn, "SELECT id FROM tb_user WHERE login_status IS NOT NULL");
               $getAuthUserId = mysqli_fetch_assoc($result);
               $userId = $getAuthUserId["id"];
            ?>
            <td><a href="cart.php?delete_all=<?php echo $userId; ?>" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>

</section>

</div>
   
<script src="cart.js"></script>

</body>
</html>