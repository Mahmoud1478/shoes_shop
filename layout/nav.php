<div class="row">
    <div class="col-sm-2">
        <div class="logo"><a href="#"><img src="images/logo.png"></a></div>
    </div>
    <div class="col-sm-10">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="index.php">Home</a>
                    <a class="nav-item nav-link" href="collection.php">Collection</a>
                    <a class="nav-item nav-link" href="shoes.php">Shoes</a>
                    <a class="nav-item nav-link" href="racing boots.php">Racing Boots</a>
                    <a class="nav-item nav-link" href="contact.php">Contact</a>
                    <a class="nav-item nav-link last" href="#"><img src="images/search_icon.png"></a>
                    <a class="nav-item nav-link last" href="contact.php"><img src="images/shop_icon.png"></a>
                    <?php
                    if (!isset($_SESSION['user'])){
                        echo '
                                 <a class="nav-item nav-link" href="login.php">login</a>
                                <a class="nav-item nav-link" href="register.php">register</a>
                                ';
                    }else{
                        echo '<a class="nav-item nav-link" href="logout.php">logout</a>';
                        if ($_SESSION['user']['permisions'] == 2){
                            echo '<a class="nav-item nav-link" href="admin/">admin</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>
