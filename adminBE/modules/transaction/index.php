<?php 
    $open = "transaction";
    require_once __DIR__. "/../../autoload/autoload.php";

    $sql = "SELECT transaction.*, users.name as nameuser, users.phone as phoneuser FROM transaction LEFT JOIN users ON users.id = transaction.users_id ORDER BY ID DESC";
    $transaction = $db->fetchsql($sql);

?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách đơn hàng 
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="/webphp/adminBE/">Bảng điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Đơn hàng
                </li>
            </ol>
            <div class="clearfix"></div>
            <!-- Thông báo lỗi -->
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên chủ đơn hàng</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Ghi chú của khách</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 1; 
                            foreach ($transaction as $item): ?>
                                <tr class="text-center">
                                    <td><?php echo $stt;  ?></td>
                                    <td><?php echo $item['nameuser'];  ?></td>
                                    <td><?php echo $item['phoneuser'];  ?></td>
                                    <td><?php echo $item['note'];  ?></td>
                                    <td>
                                        <?php if ($item['status'] == 0): ?>
                                            <a class="btn btn-xs btn-danger" href="status.php?id=<?php echo $item['id'] ?>">Chưa xử lý</a>
                                        <?php else : ?>
                                            <a class="btn btn-xs btn-info" href="status.php?id=<?php echo $item['id'] ?>">Đã xử lý</a>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa</a>  
                                    </td>
                                </tr>
                        <?php $stt++; endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>  
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>