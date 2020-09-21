<?php 
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";
    

    $sql = "SELECT product.*,category.name as namecate FROM product 
        LEFT JOIN category on category.id = product.category_id";
    $product = $db->fetchsql($sql);


?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách sản phẩm 
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="/webphp/adminBE/">Bảng điều khiển</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sản phẩm
                </li>
            </ol>
            <div class="clearfix"></div>
            <!-- Thông báo lỗi -->
            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive text-center">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Danh mục</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Thông tin</th>
                            <th class="text-center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $stt = 1; 
                            foreach ($product as $item): ?>
                                <tr>
                                    <td><?php echo $stt;  ?></td>
                                    <td><?php echo $item['name'];  ?></td>
                                    <td><?php echo $item['namecate'];  ?></td>
                                    <td>
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thumbar'] ?>" width="80px" height="80px">
                                    </td>
                                    <td>
                                        <ul>
                                            <li>Giá: <?php echo $item['price'] ?></li>
                                            <li>Giảm giá: <?php echo $item['sale'].'%' ?></li>
                                            <li>Số lượng: <?php echo $item['number'] ?></li>                                          
                                        </ul>
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>  Sửa</a>  
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