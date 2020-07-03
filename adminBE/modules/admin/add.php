<?php 
    $open = "admin";
    require_once __DIR__. "/../../autoload/autoload.php";

    /*
    * Danh sách danh mục sản phẩm
    */

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $data = 
            [
                "name" => postInput('name'), 
                "email" => postInput('email'), 
                "phone" => postInput('phone'),
                "password" => MD5(postInput('password')),
                "address" => postInput('address'),
                "level" => postInput('level')
            ];
            $error = [];
            if(postInput('name') == '')
            {
                $error['name'] = "Mời bạn nhập đầy đủ họ và tên";
            }

            if(postInput('email') == '')
            {
                $error['email'] = "Mời bạn nhập email";
            }
            else
            {
                $is_check = $db->fetchOne("admin"," email ='".$data['email']."' ");
                if($is_check != NULL)
                {
                    $error['email'] = "Email đã tồn tại";
                }
            }

            if(postInput('phone') == '')
            {
                $error['phone'] = "Mời bạn nhập số điện thoại";
            }
            if(postInput('password') == '')
            {
                $error['password'] = "Mời bạn nhập mật khẩu";
            }
            if(postInput('address') == '')
            {
                $error['address'] = "Mời bạn nhập địa chỉ";
            }

            if ($data['password'] != MD5(postInput('re_password')))
            {
                $error['password'] = "Mật khẩu không khớp";
            }

            if(empty($error))
            {
                $id_insert = $db->insert("admin",$data);
                if ($id_insert) 
                {
                    $_SESSION['success'] = "Thêm mới thành công";
                    redirectAdmin("admin");
                }
                else
                {
                    $_SESSION['error'] = "Thêm mới thất bại";
                    redirectAdmin("admin");
                }
            }
        }
?>
<?php require_once __DIR__. "/../../layouts/header.php"; ?>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới Admin 
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Bảng điều khiển</a>
                </li>
                <li>
                    <i class="fa fa-file"></i> Admin
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Thêm mới
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
            <form class="form-horizontal" action="" method="POST">

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Họ và tên</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Họ & tên" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''?>">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger"> <?php echo $error['name'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="mdt@support.com" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''?>">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger"> <?php echo $error['email'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Điện thoại</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="inputEmail3" placeholder="032xxxxx10" name="phone" value="<?php echo isset($data['phone']) ? $data['phone'] : ''?>">
                        <?php if (isset($error['phone'])): ?>
                            <p class="text-danger"> <?php echo $error['phone'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Mật khẩu</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="******" name="password">
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger"> <?php echo $error['password'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputEmail3" placeholder="******" name="re_password">
                        <?php if (isset($error['re_password'])): ?>
                            <p class="text-danger"> <?php echo $error['re_password'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Địa chỉ" name="address" value="<?php echo isset($data['address']) ? $data['address'] : ''?>">
                        <?php if (isset($error['address'])): ?>
                            <p class="text-danger"> <?php echo $error['address'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Cấp bậc</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="level">
                            <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : '' ?>> Cộng tác viên</option>
                            <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : '' ?>> Quản trị viên (Admin)</option>
                        </select>
                        <?php if (isset($error['level'])): ?>
                            <p class="text-danger"> <?php echo $error['level'] ?> </p>
                        <?php endif ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>  
<?php require_once __DIR__. "/../../layouts/footer.php"; ?>