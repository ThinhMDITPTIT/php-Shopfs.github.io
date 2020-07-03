<?php 
    require_once __DIR__. "/autoload/autoload.php";

    //khong vao dang ky
    if(isset($_SESSION['name_id']))
    {
        echo "<script>alert(' Bạn đã có tài khoản'); location.href='index.php'</script>";
    }
    //Xử lý
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data = 
        [
            "email" => postInput('email'),       
            "password" => postInput('password'),
        ];
        $error = [];

            if(postInput('email') == '')
            {
                $error['email'] = "Mời bạn nhập email";
            }

            if(postInput('password') == '')
            {
                $error['password'] = "Mời bạn nhập mật khẩu";
            }


            if(empty($error))
            {
                $is_check = $db->fetchOne("users"," email ='".$data['email']."' AND password = '".MD5($data['password'])."'");
                if($is_check != NULL)
                {
                    $_SESSION['name_user'] = $is_check['name'];
                    $_SESSION['name_id'] = $is_check['id'];
                    echo "<script>alert(' Đăng nhập thành công'); location.href='index.php'</script>";
                }
                else
                {
                    $_SESSION['error'] = 'Đăng nhập thất bại!';
                }

                // $id_insert = $db->insert("users",$data);
                // if ($id_insert) 
                // {
                //     $_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
                //     // redirectAdmin("user");
                //     header("location: login.php");
                // }
                // else
                // {
                //     // $_SESSION['error'] = "Thêm mới thất bại";
                //     // redirectAdmin("user");
                // }
            }
    }
?>

<?php require_once __DIR__. "./layouts/header.php"; ?>

                    <div class="col-md-9 bor">
                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Đăng nhập</a> </h3>
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" role="alert">
                                    <?php 
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success'])
                                    ?>
                                </div>
                            <?php endif ?>
                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php 
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error'])
                                    ?>
                                </div>
                            <?php endif ?>
                            <!-- Nội dung -->
                            <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Email</label>
                            		<div class="col-md-9">
                            			<input type="email" name="email" placeholder="mdt@gmail.com" class="form-control" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>">
                                        <?php if(isset($error['email'])): ?>
                                            <p class="text-danger"><?php echo $error['email'] ?></p>
                                        <?php endif ?>
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Mật khẩu</label>
                            		<div class="col-md-9">
                            			<input type="password" name="password" placeholder="******" class="form-control">
                                        <?php if(isset($error['password'])): ?>
                                            <p class="text-danger"><?php echo $error['password'] ?></p>
                                        <?php endif ?>
                            		</div>
                            	</div>

                            	<button type="submit" class="btn btn-success col-md-2" style="margin-bottom: 20px; float: right"> Đăng nhập</button>
                            </form>
                        </section>
                    </div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>
  