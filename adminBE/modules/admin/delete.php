<?php 
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

        $id = intval(getInput('id'));
        // _debug($id);
        $Editadmin = $db->fetchID('admin',$id);
        if (empty($Editadmin)) 
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin('admin');
        }

        /**
        *   Kiểm tra xem danh mục có sản phẩm chưa?
        */
        $num = $db->delete('admin',$id);
        if ($num > 0) 
        {
            $_SESSION['success'] = " Xóa thành công ";
            redirectAdmin("admin");
        }else{
            $_SESSION['error'] = " Xóa thất bại ";
            redirectAdmin("admin");
        }
?>
