<?php 
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";

    $sql = "SELECT users.* FROM users ORDER BY ID DESC";
    $user = $db->fetchsql($sql);

?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách thành viên 
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="/webphp/adminBE/">Bảng điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thành viên
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
                            <th class="text-center">Tên thành viên</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 1; 
                            foreach ($user as $item): ?>
                                <tr>
                                    <td><?php echo $stt;  ?></td>
                                    <td><?php echo $item['name'];  ?></td>
                                    <td><?php echo $item['email'];  ?></td>
                                    <td><?php echo $item['phone'];  ?></td>
                                    <td><?php echo $item['address'];  ?></td>                                    
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