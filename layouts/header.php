

<!DOCTYPE html>
<html>
    <head>
        <title>Shopfs</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
    </head>
    <body>
        <div id="wrapper">

            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">

                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li style="color: red">Xin Chào <?php echo $_SESSION['name_user'] ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href="logout.php">Thoát</a></li>
                                                </ul>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="login.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="register.php"><i class="fa fa-user"></i> Đăng ký</a>
                                            </li>  
                                        <?php endif; ?>                                                                             
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="index.php">Trang chủ</a>
                        </div>

                        <ul id="menu-main">
                            <li>
                                <a href="">Liên hệ</a>
                            </li>
                        </ul>

                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"> Giỏ hàng </a>
                            </li>
                        </ul>

                    </nav>
                </div>
            </div>

            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                
                            <ul>
                                <?php foreach ($category as $item): ?>
                                <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title text-center">  Sản phẩm mới </h3>
                            
                            <ul>
                                <?php foreach ($productNew as $item): ?>
                                <li class="clearfix">
                                    <a href="./chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thumbar']?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            <?php if ($item['sale'] > 0): ?>
                                                <b class="price">Giảm giá: <?php echo formatPriceSale($item['price'],$item['sale']) ?></b>
                                                <br>
                                                <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?></b>
                                                <br>
                                            <?php else: ?>
                                                <b class="price">Giá gốc: <?php echo formatPrice($item['price']) ?></b>
                                                <br>
                                            <?php endif ?>                                           
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="box-left box-menu">
                            <h3 class="box-title text-center">  Sản phẩm bán chạy </h3>
                            <ul>
                                <?php foreach ($productPay as $item): ?>
                                <li class="clearfix">
                                    <a href="./chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thumbar']?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            <?php if ($item['sale'] > 0): ?>
                                                <b class="price">Giảm giá: <?php echo formatPriceSale($item['price'],$item['sale']) ?></b>
                                                <br>
                                                <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?></b>
                                                <br>
                                            <?php else: ?>
                                                <b class="price">Giá gốc: <?php echo formatPrice($item['price']) ?></b>
                                                <br>
                                            <?php endif ?> 
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>