
<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $category = $db->fetchAll("category");
?>
<?php require_once __DIR__. "./layouts/header.php"; ?>

    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Bảng điều khiển</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Bảng điều khiển</li>
                        </ol>
                        <div class="row">

                            <div class="clearfix" style="height: 10px"></div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-list fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div><h4>Danh mục</h4></div>
                                                <div><strong><?php echo $CountCates ?></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo modules("category") ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">Xem chi tiết</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-shopping-cart fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div><h4>Đơn hàng</h4></div>
                                                <div><strong><?php echo $CountOrders ?></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo modules("transaction") ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">Xem chi tiết</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div><h4>Thành viên</h4></div>
                                                <div><strong><?php echo $CountUsers ?></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo modules("user") ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">Xem chi tiết</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <i class="fa fa-database fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div><h4>Sản phẩm</h4></div>
                                                <div><strong><?php echo $CountPros ?></strong></div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo modules("product") ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">Xem chi tiết</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix" style="height: 170px"></div>

                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="panel panel-green">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-xs-3" style="padding-top: 10px">
                                                <i class="fa fa-usd fa-4x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <div class="text-right" style="padding-bottom: 15px"><h3 style="color: red"><strong style="color: black">Tổng doanh thu: </strong><?php echo formatPrice($CountBill["SUM(amount)"]) ?></h3></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                       

                        <div class="clearfix" style="height: 50px"></div>

                    </div>
                </main>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div style="float: right">
                                <a href="#">Chính sách bảo mật</a>
                                &middot;
                                <a href="#">Điều khoản &amp; Dịch vụ</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>