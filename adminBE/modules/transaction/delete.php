<?php 
    $open = "transaction";
    require_once __DIR__. "/../../autoload/autoload.php";

        $id = intval(getInput('id'));

        $EditTrans = $db->fetchID('transaction',$id);
        if (empty($EditTrans)) 
        {
            $_SESSION['error'] = "Dữ liệu không tồn tại";
            redirectAdmin('transaction');
        }

        if($EditTrans['status'] == 1)
        {
            $_SESSION['error'] = "Đơn hàng đã được xử lý, Không thể xóa!!!";
            redirectAdmin('transaction');
        }
        else
        {
            $num = $db->delete('transaction',$id);
            if ($num > 0) 
            {
                $_SESSION['success'] = " Xóa thành công ";
                redirectAdmin("transaction");
            }else{
                $_SESSION['error'] = " Xóa thất bại ";
                redirectAdmin("transaction");
            }
        }
?>
