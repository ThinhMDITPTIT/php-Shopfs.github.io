<?php 
    require_once __DIR__. "/autoload/autoload.php";

    //lấy tên danh mục có hiển thị home = 1
    $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY update_at";
    $CategoryHome = $db->fetchsql($sqlHomecate);

    $data = [];

    foreach ($CategoryHome as $item) 
    {
        $cateId = intval($item['id']);
        $sql = " SELECT * FROM product WHERE category_id = $cateId ";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
    }
?>

<?php 
	require_once __DIR__. "./layouts/header.php"; 
?>

                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="<?php echo base_url() ?>public/frontend/images/banner.png" width = "100%">
                        </section>
                        <section class="box-main1">
                            <?php foreach ($data as $key => $value): ?>
                                <div class="clearfix">                                   
                                    <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
                                    <div class="showitem">

                                        <?php foreach ($value as $item): ?>
                                            <div class="col-md-3 item-product bor">
                                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbar'] ?>" class="" width="100%" height="180">
                                                </a>
                                                <div class="info-item">
                                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b></p>
                                                </div>
                                                <div class="hidenitem">
                                                    <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                                    <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                                </div>
                                            </div>
                                        <?php endforeach ?>

                                    </div>
                                </div>
                            <?php endforeach ?>
                        </section>
                    </div>

<?php 
	require_once __DIR__. "./layouts/footer.php"; 
?>


                