<?php 
    require_once __DIR__. "/autoload/autoload.php";
    
    $user = $db->fetchID("users",intval($_SESSION['name_id']));

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$data = 
    	[
    		'amount' => $_SESSION['total'],
    		'users_id' => $_SESSION['name_id'],
    		'note' => postInput("note")
    	];

    	$idtran = $db->insert("transaction",$data);
    	if($idtran > 0)
    	{
    		foreach ($_SESSION['cart'] as $key => $value) 
    		{
    			$data2 = 
    			[
    				'transaction_id' => $idtran,
    				'product_id' => $key,
    				'qty' => $value['qty'],
    				'price' => $value['price']
    			];

    			$id_insert = $db->insert("orders",$data2);
    		}

    		$_SESSION['success'] = "Lưu thông tin đơn hàng thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất!";
    		header("location: thong-bao.php");
    	}
    }
?>

<?php require_once __DIR__. "./layouts/header.php"; ?>

                    <div class="col-md-9">
                        <section class="box-main1">
                            <h3 class="title-main"><a href="" style="font-family: 'Roboto', sans-serif;">Thông tin đơn hàng</a> </h3>

                            <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Tên thành viên</label>
                            		<div class="col-md-9">
                            			<input type="text" readonly="" name="name" placeholder="Mè Đức Thịnh" class="form-control" value="<?php echo isset($user['name']) ? $user['name'] : '' ?>">
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Email</label>
                            		<div class="col-md-9">
                            			<input type="email" readonly="" name="email" placeholder="mdt@gmail.com" class="form-control" value="<?php echo isset($user['email']) ? $user['email'] : '' ?>">
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Số điện thoại</label>
                            		<div class="col-md-9">
                            			<input type="number" readonly="" name="phone" placeholder="0328456456" class="form-control" value="<?php echo isset($user['phone']) ? $user['phone'] : '' ?>">
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Địa chỉ</label>
                            		<div class="col-md-9">
                            			<input type="text" readonly="" name="address" placeholder="Hà Nội, Đông Lào" class="form-control" value="<?php echo isset($user['address']) ? $user['address'] : '' ?>">
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Tổng tiền thanh toán</label>
                            		<div class="col-md-9">
                            			<input type="text" readonly="" name="address" placeholder="Hà Nội, Đông Lào" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Ghi chú</label>
                            		<div class="col-md-9">
                            			<input type="text" name="note" placeholder="Giao hàng tận nơi" class="form-control" value="">
                            		</div>
                            	</div>

                            	<button type="submit" class="btn btn-success col-md-2" style="margin-bottom: 20px; float: right"> Xác nhận </button>
                            </form>
                        </section>
                    </div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>

