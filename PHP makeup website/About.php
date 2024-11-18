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
                <li><a href="Product.php">PRODUCTS</a></li>
                <li><a href="About.php"class="active">ABOUT</a></li>
                <li><a href="Contact.php" >CONTACT</a></li>
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
    
</body>

</html>