<?php 
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";

        $id = intval(getInput('id'));
        // _debug($id);
        $Editproduct = $db->fetchID('product',$id);
        if (empty($Editproduct)) 
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin('product');
        }

        /**
        *   Kiểm tra xem danh mục có sản phẩm chưa?
        */
        $num = $db->delete('product',$id);
        if ($num > 0) 
        {
            $_SESSION['success'] = " Xóa thành công ";
            redirectAdmin("product");
        }else{
            $_SESSION['error'] = " Xóa thất bại ";
            redirectAdmin("product");
        }
?>
