<?php
require_once __DIR__."/../autoload/autoload.php";

$data = 
    [
      "username" => postInput('username'),
      "password" => postInput('password'),
    ];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $error = [];

        if(postInput('username') == '')
        {
            $error['username'] = "Mời bạn nhập email";
        }

        if(postInput('password') == '')
        {
            $error['password'] = "Mời bạn nhập mật khẩu";
        }

        if(empty($error))
        {
            $is_check = $db->fetchOne("admin"," username = '".$data['username']."' AND password = '".MD5($data['password'])."'");
            if($is_check!=null)
            {
                $_SESSION['admin_name'] = $is_check['username'];
                $_SESSION['admin_id'] = $is_check['id'];
                echo "<script>alert('Đăng nhập thành công');location.href='/Cosmetics/admin/'</script>";
            }else
            {
                $_SESSION['error'] = "Đăng nhập thất bại";
            }
        }
    }

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Admin Login</title>

    <style>
@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

body{
    margin: 0;
    padding: 0;
    background: #fff;

    color: #fff;
    font-family: Arial;
    font-size: 12px;
}

.body{
    position: absolute;
    top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px;
    width: auto;
    height: auto;
    background-image: url(http://ginva.com/wp-content/uploads/2012/07/city-skyline-wallpapers-008.jpg);
    background-size: cover;
    -webkit-filter: blur(5px);
    z-index: 0;
}

.grad{
    position: absolute;
    top: -20px;
    left: -20px;
    right: -40px;
    bottom: -40px;
    width: auto;
    height: auto;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
    z-index: 1;
    opacity: 0.7;
}

.header{
    position: absolute;
    top: calc(50% - 35px);
    left: calc(50% - 255px);
    z-index: 2;
}

.header div{
    float: left;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 35px;
    font-weight: 200;
}

.header div span{
    color: #5379fa !important;
}

.login{
    position: absolute;
    top: calc(50% - 75px);
    left: calc(50% - 50px);
    height: 150px;
    width: 350px;
    padding: 10px;
    z-index: 2;
}

.login input[type=text]{
    width: 250px;
    height: 30px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 16px;
    font-weight: 400;
    padding: 4px;
}

.login input[type=password]{
    width: 250px;
    height: 30px;
    background: transparent;
    border: 1px solid rgba(255,255,255,0.6);
    border-radius: 2px;
    color: #fff;
    font-family: 'Exo', sans-serif;
    font-size: 16px;
    font-weight: 400;
    padding: 4px;
    margin-top: 10px;
}

.login input[type=submit]{
    width: 260px;
    height: 35px;
    background: #fff;
    border: 1px solid #fff;
    cursor: pointer;
    border-radius: 2px;
    color: #a18d6c;
    font-family: 'Exo', sans-serif;
    font-size: 16px;
    font-weight: 400;
    padding: 6px;
    margin-top: 10px;
}

.login input[type=button]:hover{
    opacity: 0.8;
}

.login input[type=button]:active{
    opacity: 0.6;
}

.login input[type=text]:focus{
    outline: none;
    border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
    outline: none;
    border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
    outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>Login<span>Admin</span></div>
        </div>
        <br>
        <form method="post">
            <div class="login">
                <?php require_once __DIR__."/../partials/notification.php"; ?>
                    <input type="text" name="username" autofocus="autofocus" placeholder="Tên đăng nhập">
                    <?php 
                        if(isset($error['username'])): ?>
                        <p class="text-danger"><?php echo $error['username']; ?></p>
                    <?php endif ?>
                    <input type="Password" name="password" autofocus="autofocus" placeholder="Mật khẩu" >
                    <?php 
                        if(isset($error['password'])): ?>
                        <p class="text-danger"><?php echo $error['password']; ?></p>
                    <?php endif ?>
                    <input type="submit" name="btndn" value="Đăng nhập">               
            </div>
        </form>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

</body>

</html>