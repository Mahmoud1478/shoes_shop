<?php require_once 'app.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pullshoes</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
<!-- header section start -->
<div class="header_section">
    <div class="container">
        <?php include_once 'layout/nav.php'?>
    </div>
    <div class="banner_section">
        <div class="container-fluid">
            <section class="slide-wrapper">
                <div class="container-fluid">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-sm-2 padding_0">
                                        <p class="mens_taital">Men Shoes</p>
                                        <div class="page_no">0/2</div>
                                        <p class="mens_taital_2">Men Shoes</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="banner_taital">
                                            <h1 class="banner_text">New Running Shoes </h1>
                                            <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                                            <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <button class="buy_bt">Buy Now</button>
                                            <button class="more_bt">See More</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="shoes_img"><img src="images/running-shoes.png"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-2 padding_0">
                                        <p class="mens_taital">Men Shoes</p>
                                        <div class="page_no">0/2</div>
                                        <p class="mens_taital_2">Men Shoes</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="banner_taital">
                                            <h1 class="banner_text">New Running Shoes </h1>
                                            <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                                            <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <button class="buy_bt">Buy Now</button>
                                            <button class="more_bt">See More</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="shoes_img"><img src="images/running-shoes.png"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-2 padding_0">
                                        <p class="mens_taital">Men Shoes</p>
                                        <div class="page_no">0/2</div>
                                        <p class="mens_taital_2">Men Shoes</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="banner_taital">
                                            <h1 class="banner_text">New Running Shoes </h1>
                                            <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                                            <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <button class="buy_bt">Buy Now</button>
                                            <button class="more_bt">See More</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="shoes_img"><img src="images/running-shoes.png"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-2 padding_0">
                                        <p class="mens_taital">Men Shoes</p>
                                        <div class="page_no">0/2</div>
                                        <p class="mens_taital_2">Men Shoes</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="banner_taital">
                                            <h1 class="banner_text">New Running Shoes </h1>
                                            <h1 class="mens_text"><strong>Men's Like Plex</strong></h1>
                                            <p class="lorem_text">ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <button class="buy_bt">Buy Now</button>
                                            <button class="more_bt">See More</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="shoes_img"><img src="images/running-shoes.png"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- header section end -->
