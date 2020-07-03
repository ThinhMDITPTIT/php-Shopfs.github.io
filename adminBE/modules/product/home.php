<?php 
	$open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";

        $id = intval(getInput('id'));
        $Editproduct = $db->fetchID('product',$id);
        if (empty($Editproduct)) 
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin('product');
        }

        $home = $Editproduct['home'] == 0 ? 1 : 0;

        $update = $db->update("product",array("home" => $home), array("id" => $id));
        if ($update > 0) 
        {
            $_SESSION['success'] = " Cập nhật thành công ";
            redirectAdmin("product");
        }
        else
        {
            $_SESSION['error'] = " Dữ liệu không thay đổi ";
            redirectAdmin("product");
        }
?>