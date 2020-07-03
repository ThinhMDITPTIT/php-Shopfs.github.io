<?php 
    require_once __DIR__. "/autoload/autoload.php";

    //Xử lý
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$data = 
	    [
	        "name" => postInput('name'), 
	        "email" => postInput('email'),       
	        "password" => MD5(postInput('password')),
	        "phone" => postInput('phone'),
	        "address" => postInput('address')
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
                $is_check = $db->fetchOne("users"," email ='".$data['email']."' ");
                if($is_check != NULL)
                {
                    $error['email'] = "Email đã tồn tại";
                }
            }

            if(postInput('password') == '')
            {
                $error['password'] = "Mời bạn nhập mật khẩu";
            }
            if(postInput('phone') == '')
            {
                $error['phone'] = "Mời bạn nhập số điện thoại";
            }          
            if(postInput('address') == '')
            {
                $error['address'] = "Mời bạn nhập địa chỉ";
            }


            if(empty($error))
            {
                $id_insert = $db->insert("users",$data);
                if ($id_insert) 
                {
                    $_SESSION['success'] = "Đăng ký thành công! Mời bạn đăng nhập";
                    // redirectAdmin("user");
                    header("location: login.php");
                }
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
                            <h3 class="title-main"><a href=""> Đăng ký thành viên</a> </h3>
                            <!-- Nội dung -->
                            <form action="" method="POST" class="form-horizontal" role="form" style="margin-top: 20px">
                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Tên thành viên</label>
                            		<div class="col-md-9">
                            			<input type="text" name="name" placeholder="Mè Đức Thịnh" class="form-control" value="<?php echo isset($data['name']) ? $data['name'] : '' ?>">
                            			<?php if(isset($error['name'])): ?>
                            				<p class="text-danger"><?php echo $error['name'] ?></p>
                            			<?php endif ?>
                            		</div>
                            	</div>

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

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Số điện thoại</label>
                            		<div class="col-md-9">
                            			<input type="number" name="phone" placeholder="0328456456" class="form-control" value="<?php echo isset($data['phone']) ? $data['phone'] : '' ?>">
                            			<?php if(isset($error['phone'])): ?>
                            				<p class="text-danger"><?php echo $error['phone'] ?></p>
                            			<?php endif ?>
                            		</div>
                            	</div>

                            	<div class="form-group">
                            		<label class="col-md-3 control-label">Địa chỉ</label>
                            		<div class="col-md-9">
                            			<input type="text" name="address" placeholder="Hà Nội, Đông Lào" class="form-control" value="<?php echo isset($data['address']) ? $data['address'] : '' ?>">
                            			<?php if(isset($error['address'])): ?>
                            				<p class="text-danger"><?php echo $error['address'] ?></p>
                            			<?php endif ?>
                            		</div>
                            	</div>

                            	<button type="submit" class="btn btn-success col-md-2" style="margin-bottom: 20px; float: right"> Đăng ký</button>
                            </form>
                        </section>
                    </div>

<?php require_once __DIR__. "./layouts/footer.php"; ?>


                