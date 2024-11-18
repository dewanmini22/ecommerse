<html lang="en">

<head>
   <title>GLAMOROUS COSMETICS</title>
   <link rel="stylesheet" type="text/css" href="style.css">
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
            <li><a href="Contact.php" class="active">CONTACT</a></li>
         </ul>
      </nav>
      <div style="margin-left: 40%; display: flex;align-items: center;">
         <li><a href="login.php"><img src="images/user-icon.png" style="width: 30px; height: 30px;"></a></li>
         <li><a href="logout.php"><i class="fa-sharp fa-solid fa-right-from-bracket fa-xl"></i></a></li>
         <?php 
            @include 'config.php';
            $result = mysqli_query($conn, "SELECT COUNT(c.id) AS count FROM cart AS c
                                          JOIN tb_user AS u ON u.id = c.user_id
                                          where c.user_id in(SELECT id FROM tb_user WHERE login_status IS NOT NULL) AND c.status = 0");
            $count = mysqli_fetch_assoc($result);
            $pCount = $count["count"];
         ?>
         <li><a href="cart.php"><div class="cart"><i class="fa-solid fa-cart-shopping"></i><p id="count"><?php echo $pCount?></p></div></a></li>
      </div>
   </header>
   <div class="contact_section layout_padding">
      <div class="container">
         <div class="contact_section_main">
            <div class="row">
               <div class="col-lg-12">
                  <div class="contact_title_main">
                     <h1 class="contact_title">GET IN TOUCH</h1>
                  </div>
                  <br>
                  <p class="contact_text">We would love to hear from you and answer any questions or concerns you may
                     have.<br>Getting in touch with us is easy! If you have any inquiries about our products, orders, or
                     general
                     information, our customer support team is here to assist you.<br> You can reach us via email or by
                     calling
                     our toll-free number. Our dedicated team members are available 24 hours to provide you with the
                     support you need.</p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="footer_section layout_padding">
      <div class="container">
         <div class="contact_section_2">
            <div class="row">
               <div class="col-sm-4">
                  <h3 class="address_text">Contact Us</h3>
                  <div class="address_bt">
                     <ul>
                        <li>
                           <img src="images/map-icon.png"><span class="padding">Address : Seeduwa</span>
                        </li>
                        <li>
                  <img src="images/call-icon.png"><span class="padding"> Call : 011 225 6542</span>
                           </a>
                        </li>
                        <li>

                           <img src="images/mail-icon.png"><span class="padding">Email : himashalakshani@gmail.com</span>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-4">
                  <h3 class="address2_text">GLAMOROUS COSMETICS</h3>
                  <p class="footertext">your one-stop destination for all your
                     beauty needs!</p>
               </div>
               <div class="col-sm-4">
                  <div class="main">
                     <h3 class="address3_text">Best Products</h3>
                     <p class="footertext_2">Explore our website to find the best product that meets your needs and
                        exceeds your expectations</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>

</html>