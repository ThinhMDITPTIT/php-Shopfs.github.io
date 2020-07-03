<?php 
    require_once __DIR__. "/autoload/autoload.php";

    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID('category',$id);

    if(isset($_GET['p']))
    {
    	$p = $_GET['p'];
    }
    else
    {
    	$p = 1;
    }

    $sql = " SELECT * FROM product WHERE category_id = $id ";

    $total = count($db->fetchsql($sql));

    $product = $db->fetchJones("product",$sql,$total,$p,4,true);
    $sotrang = $product['page'];
    unset($product['page']);

    $path = $_SERVER['SCRIPT_NAME'];
?>

<?php require_once __DIR__. "./layouts/header.php"; ?>

    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href=""><?php echo $EditCategory['name'] ?></a> </h3>
            <!-- Nội dung -->
            <div class="showitem clearfix">
            	<?php foreach ($product as $item): ?>
            		<div class="col-md-3 item-product bor">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                            <!-- <p>
                            	<strike class="sale"><?php echo formatPrice($item['price']) ?></strike> 
                            	<b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b>
                            </p> -->
                            <br>
                            <b class="price">Giảm giá: <?php echo formatPriceSale($item['price'],$item['sale']) ?></b>
                            <br>
                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?></b>
                            <br>
                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                        </div>
                    </div>
            	<?php endforeach ?>                                                     
            </div>
            <nav class="text-center">
            	<ul class="pagination">
            		<?php for ($i=1; $i <= $sotrang; $i++) :?>
                			<li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>"><?php echo $i; ?></a></li>
                	<?php endfor; ?>
            	</ul>
            </nav>
        </section>
    </div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>


                