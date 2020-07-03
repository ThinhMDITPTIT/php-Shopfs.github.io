<?php 
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";

    if (isset($_GET['page'])) 
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sql = "SELECT users.* FROM users ORDER BY ID DESC";
    $user = $db->fetchJone('users',$sql,$p,5,true);

    if (isset($user['page'])) 
    {
        $sotrang = $user['page'];
        unset($user['page']);
    }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách thành viên 
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng điều khiển</a>
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
    <!-- /.row -->
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
                <div class="pull-right">
                    <nav aria-label="Page navigation example" class="clearfix">
                        <ul class="pagination">
                            <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li> -->
                            <?php for ($i=1; $i <= $sotrang ; $i++):?>
                                <?php 
                                    if (isset($_GET['page'])) 
                                    {
                                        $p = $_GET['page'];
                                    } 
                                    else
                                    {
                                        $p = 1;
                                    }
                                ?>
                                <li class="<?php echo ($i == $p) ? 'active' : ''?>">
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <!-- <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>  
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>