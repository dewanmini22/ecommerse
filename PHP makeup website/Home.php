<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

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
            <li><a href="Home.php" class="active">HOME</a></li>
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

   <!-- banner section start -->
   <div class="banner_section layout_padding">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container" style="padding-left: 20px;padding-right: 20px;">
                  <div class="row">
                     <div class="col-lg-6">
                        <h1 class="banner_title">Glamorous <br>Cosmetics</h1>
                        <p class="banner_text">Welcome to our cosmetic shop, your one-stop destination for all your
                           beauty needs! We pride ourselves on being a premier online destination for high-quality
                           cosmetics and skincare products.</p>
                     </div>
                     <div class="col-lg-6">
                        <div class="banner_img"><img src="images/banner-img.png"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- banner section end -->

   <!-- product section start -->


   <div class="product_section layout_padding">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="text">Our Products</h1>
            <br>
            <br>
            <br>
            <p class="product_text"> Explore our wide range of exceptional beauty products, carefully curated to
               elevate your makeup game and enhance your natural beauty</p>
         </div>
      </div>
      <div class="row product_list">
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Lip sticks</h4>
                  <p class="product-description">Browse through our collection and find your perfect shade, finish, and
                     formulation.</p>
                  <img src="images/lipstick.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Eyeshadow palette</h4>
                  <p class="product-description">Explore our diverse range of eyeshadow palettes, and let your
                     imagination run wild with the endless eye-catching possibilities they offer. </p>
                  <img src="images/eyeshadow.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Concealer</h4>
                  <p class="product-description">Start by selecting a shade that matches your skin tone or is slightly
                     lighter</p>
                  <img src="images/concealer.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Foundation</h4>
                  <p class="product-description">We offer a wide selection of foundation creams that cater to various
                     skin types, tones, and concerns</p>
                  <img src="images/foundation.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Eye-Liner</h4>
                  <p class="product-description"> Long-lasting eyeliner that stays put throughout the day </p>
                  <img src="images/eyeliner.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Lip Gloss</h4>
                  <p class="product-description">Discover our wide range of lip glosses on our website, where you'll
                     find a variety of shades, finishes, and formulations.</p>
                  <img src="images/lipgloss.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Beauty Brush</h4>
                  <p class="product-description">Elevate your makeup game and achieve professional results with our
                     high-quality brushes that are designed to empower and inspire your beauty routine. </p>
                  <img src="images/brushset.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Highlighters</h4>
                  <p class="product-description">Elevate your makeup game and embrace the luminosity that highlighters
                     bring, accentuating your features and adding a touch of radiance to your beauty routine. </p>
                  <img src="images/highlighters.jpg" class="image_1">
                  
               </div>
            </div>
         </div>
         <div class="col-lg-3" style="padding: 55px;">
            <div class="product-view">
               <div class="product-info">
                  <h4 class="product-title">Face Primer</h4>
                  <p class="product-description">You can choose the primer that best suits your skin type and concerns,
                     ensuring a tailored solution that enhances your natural beauty. </p>
                  <img src="images/faceprimer.jpg" class="image_1">   
               </div>
            </div>
         </div>
      </div>
   </div>
   <!---product section end-->

   <!-- about section start -->
   <div class="about_section layout_padding">
      <div class="container">
         <div class="about_section_main">
            <div class="row">
               <div class="col-lg-12">
                  <div class="about_title_main">
                     <h1 class="about_title">About Our beauty store</h1>
                  </div>
               </div>
            </div>
            <div class="row" style="padding: 70px;">
               <div class="col-lg-6 content_right_backgroung_color">
                  <p class="content_right" style="margin-top: 200px;">
                     Welcome to Our Beauty Store, your ultimate destination for all things beauty! We are
                     passionate about helping you look and feel your best by offering an extensive range of
                     high-quality beauty products and services.
                  </p>
                  <p class="content_right"> At Our Beauty Store, we strive to curate a diverse and exciting
                     collection of cosmetics,
                     skincare, haircare, and fragrance products from top brands around the world. Whether you're
                     searching for the latest makeup trends, effective skincare solutions, or luxurious
                     fragrances, we've got you covered.</p>
                  <p class="content_right"> Our team of knowledgeable beauty experts is dedicated to providing
                     personalized assistance
                     and guidance to help you find the perfect products for your individual needs. We believe
                     that beauty is unique to every individual, and we are committed to celebrating and enhancing
                     your natural beauty.</p>
                  <p class="content_right"> Not only do we offer an exceptional shopping experience, but we also
                     provide a range of
                     beauty services to pamper and treat you. From professional makeup application and skincare
                     consultations to relaxing spa treatments, we offer a comprehensive menu of services to cater
                     to your specific desires.</p>
                  <p class="content_right">We understand that your satisfaction is of utmost importance, which is
                     why we prioritize
                     delivering outstanding customer service. Our goal is to ensure that every visit to Our
                     Beauty Store leaves you feeling inspired, empowered, and confident.</p>
                  <p class="content_right">Join us on a journey of self-expression, self-care, and self-confidence
                     as we help you
                     discover the world of beauty at Our Beauty Store.</p>
               </div>
               <div class="col-lg-6">
                  <div class="">
                     <img src="images/about.jpg" class="content_right_image">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--about section end-->
   
   
</body>

</html>