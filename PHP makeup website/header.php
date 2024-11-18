<header class="header">

   <div class="flex">

   <img src="images/logo.jpg">

      <nav class="navbar">
      <li><a href="Home.php">HOME</a></li>
                <li><a href="product.php">PRODUCTS</a></li>
                <li><a href="About.php">ABOUT</a></li>
                <li><a href="Contact.php">CONTACT</a></li>
      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
      <li><a href="login.php"><img src="images/user-icon.png" style="width: 30px; height: 30px;"></a></li>
            <li><a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-xl"></i></a></li>
      <a href="cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>