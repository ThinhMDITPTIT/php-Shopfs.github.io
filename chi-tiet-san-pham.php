<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $id = intval(getInput('id'));

    //chi tiết sản phẩm
    $product = $db->fetchID('product',$id);

    //Lấy danh mục sp
    $cateid = intval($product["category_id"]);
    $sql = " SELECT * FROM  product WHERE category_id = $cateid ORDER BY ID DESC LIMIT 4";
    $spkemtheo = $db->fetchsql($sql);

?>

<?php require_once __DIR__. "./layouts/header.php"; ?>

	<div class="col-md-9 bor">
	    <section class="box-main1" >
	        <div class="col-md-6 text-center">
	            <img src="<?php echo uploads() ?>product/<?php echo $product['thumbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
	            
	            <ul class="text-center bor clearfix" id="imgdetail">
	                <li>
	                    <img src="<?php echo uploads() ?>product/<?php echo $product['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
	                </li>
	                <li>
	                    <img src="<?php echo uploads() ?>product/<?php echo $product['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
	                </li>
	                <li>
	                    <img src="<?php echo uploads() ?>product/<?php echo $product['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
	                </li>
	                <li>
	                    <img src="<?php echo uploads() ?>product/<?php echo $product['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
	                </li>
	               
	            </ul>
	        </div>
	        <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
	           <ul id="right">
	                <li>
	                	<h3><?php echo $product['name'] ?></h3>
	                </li>
	                <?php if ($product['sale'] > 0): ?>
	                	<li>	                		
	                		<br>
                            <b class="price">Giảm giá: <?php echo formatPriceSale($product['price'],$product['sale']) ?></b>
                            <br>
                            <b class="sale">Giá gốc: <?php echo formatPrice($product['price']) ?></b>
                            <br>
	                	</li>
	                <?php else: ?>
	                	<li>
	                		<br>
                            <b class="sale">Giá gốc: <?php echo formatPrice($product['price']) ?></b>
                            <br>
	                	</li>
	                <?php endif ?>
	                <li><a href="" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
	           </ul>
	        </div>

	    </section>
	    <div class="col-md-12" id="tabdetail">
	        <div class="row">
	                
	            <ul class="nav nav-tabs">
	                <li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
	            </ul>
	            <div class="tab-content" style="border: thin 0.25px;">
	                <div id="home" class="tab-pane fade in active">
	                    <h3>Nội dung</h3>
	                    <br>
	                    <p><?php echo $product['content'] ?></p>
	                </div>
	            </div>
	        </div>
	    </div>
	    <br>
	    <div class="col-md-12" style="border: thin; 0.5px;">
	    	<h3>Sản phẩm tương tự</h3>
	    </div>
	    <div class="col-md-12">
	    	<div class="showitem">

                <?php foreach ($spkemtheo as $item): ?>
                    <div class="col-md-3 item-product bor">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                        <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                            <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> <b class="price"><?php echo formatPriceSale($item['price'],$item['sale']) ?></b></p>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
	    </div>
	</div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>


                