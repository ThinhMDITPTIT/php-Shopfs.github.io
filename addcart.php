<?php 
	require_once __DIR__. "/autoload/autoload.php";

	if(!isset($_SESSION['name_id']))
	{
		echo "<script>alert('Bạn phải đăng nhập để thực hiện thêm giỏ hàng');location.href='index.php'</script>";
	}

	$id = intval(getInput('id'));

    //chi tiết sản phẩm
    $product = $db->fetchID('product',$id);

    //Kiểm tra nếu tồn tại giỏ hàng => cập nhật lại giỏ hàng // else tạo mới
    if(!isset($_SESSION['cart'][$id]))
    {
    	//Tạo mới
    	$_SESSION['cart'][$id]['name'] = $product['name'];
    	$_SESSION['cart'][$id]['thumbar'] = $product['thumbar'];
    	// 
    	$_SESSION['cart'][$id]['qty'] = 1;
    	$_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price'])/100;

    }
    else
    {
    	//Cập nhật lại
    	$_SESSION['cart'][$id]['qty'] += 1;
    }
    echo "<script>alert('Thêm sản phẩm thành công');location.href='gio-hang.php'</script>";
?>