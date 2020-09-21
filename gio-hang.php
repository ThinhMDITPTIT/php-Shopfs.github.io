<?php 
    require_once __DIR__. "/autoload/autoload.php";

    $sum = 0;

    if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    {
    	echo "<script>alert(' Không có sản phẩm nào trong giỏ hàng!'); location.href='index.php'</script>";
    }
?>

<?php require_once __DIR__. "./layouts/header.php"; ?>

                    <div class="col-md-9 bor">
                    	
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Giỏ hàng của bạn</a> </h3>

                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php 
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success'])
                                    ?>
                                </div>
                        	<?php endif ?>

                            <table class="table table-hover">
								  <thead>
								    <tr>
								      <th scope="col" class="text-center">STT</th>
								      <th scope="col" class="text-center">Tên sản phẩm</th>
								      <th scope="col" class="text-center">Hình ảnh</th>
								      <th scope="col" class="text-center">Số lượng</th>
								      <th scope="col" class="text-center">Giá</th>
								      <th scope="col" class="text-center">Tổng tiền</th>
								      <th scope="col" class="text-center">Thao tác</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?>
								  			<tr class="text-center">
										      	<td><?php echo $stt ?></td>
										      	<td><?php echo $value['name'] ?></td>
										      	<td>
										      		<img src="<?php echo uploads() ?>product/<?php echo $value['thumbar'] ?>" width = "80px" height = "80px">
										      	</td>
										      	<td>
										      		<?php echo $value['qty'] ?>
										      	</td>
										      	<td><?php echo formatPrice($value['price']) ?></td>
										      	<td><?php echo formatPrice($value['price'] * $value['qty']) ?></td>
										      	<td>
			                                        <a class="btn btn-xs btn-danger" href="remove.php?key=<?php echo $key ?>"><i class="fa fa-times"></i> Xóa</a>  
										      	</td>
									    	</tr>	
									    	<?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum; ?>					  		
								  	<?php $stt++; endforeach ?>								    
								  </tbody>
								</table>
								<div class="col-md-5 pull-right">
									<ul class="list-group">
										<li class="list-group-item">
											<h3>	Thông tin đơn hàng	</h3>
										</li>
										<li class="list-group-item">
											<span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
											Số tiền
										</li>
										<li class="list-group-item">
											<span class="badge">10%</span>
											Thuế VAT
										</li>
										<li class="list-group-item">
											<span class="badge"><?php echo sale($_SESSION['tongtien']) ?>	%</span>
											Giảm giá
										</li>

										<li class="list-group-item">
											<span class="badge"><?php $_SESSION['total'] = (($_SESSION['tongtien'] *110/100) -  ($_SESSION['tongtien']/100)*sale($_SESSION['tongtien'])); echo formatPrice($_SESSION['total']) ?></span>
											Tổng tiền thanh toán
										</li>
										<li class="list-group-item">
											<a href="index.php" class="btn btn-info">Tiếp tục mua hàng</a>
											<a href="thanh-toan.php" class="btn btn-success" style="float: right">Thanh toán</a>
										</li>
									</ul>
								</div>
                        </section>
                    </div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>

