<?php  
    session_start();
    require_once __DIR__. "/../libraries/Database.php";
    require_once __DIR__. "/../libraries/Function.php";

    $db = new Database;


    if($_SERVER['REQUEST_METHOD'] == "POST")
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
                $is_check = $db->fetchOne("admin"," email ='".$data['email']."' AND password = '".MD5($data['password'])."'");
                if($is_check != NULL)
                {
                    $_SESSION['admin_name'] = $is_check['name'];
                    $_SESSION['admin_id'] = $is_check['id'];
                    echo "<script>location.href='/webphp/adminBE/'</script>";
                }
                else
                {
                    $_SESSION['error'] = 'Đăng nhập thất bại!';
                }
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V17</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="" method="POST">
                    <span class="login100-form-title p-b-34">
                        Account Login
                    </span>
                    
                    <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
                        <input id="first-name" class="input100" type="text" name="email" placeholder="Tên đăng nhập" style="font-family: 'Roboto', sans-serif;">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
                        <input class="input100" type="password" name="password" placeholder="Mật khẩu" style="font-family: 'Roboto', sans-serif;">
                        <span class="focus-input100"></span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign in
                        </button>
                    </div>

                    <div class="w-full text-center p-t-27 p-b-239">
                        <span class="txt1">
                            
                        </span>

                        <a href="#" class="txt2">
                            
                        </a>
                    </div>

                    <div class="w-full text-center">
                        <a href="#" class="txt3">
                           
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>
            </div>
        </div>
    </div>
    
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>