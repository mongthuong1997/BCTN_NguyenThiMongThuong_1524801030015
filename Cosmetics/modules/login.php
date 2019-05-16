<?php require_once __DIR__."/../autoload/autoload.php";

    $data = 
    [
      "email" => postInput('email'),
      "password" => postInput('password'),
    ];

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
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
            $is_check = $db->fetchOne("user"," email = '".$data['email']."' AND password = '".MD5($data['password'])."'");
            if($is_check!=null)
            {
                $_SESSION['user_name'] = $is_check['name'];
                $_SESSION['name_id'] = $is_check['id'];
                echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";
            }else
            {
                $_SESSION['error'] = "Đăng nhập thất bại";
            }
        }
    }

 ?>

<?php require_once __DIR__."/../layouts/header.php"; ?>
<form method="post" action="">
<div class="login">  
         <div class="container">
            <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Login</li>
          <?php require_once __DIR__."/../partials/notification.php"; ?>
         </ol>
         <h2>Đăng nhập</h2>
         <div class="col-md-6 log">          
                 <p>Chào mừng đến với trang đăng nhập hãy nhập đủ thông tin để tiếp tục.</p>
                 <form>
                     <h5>Tên đăng nhập:</h5>    
                     <input type="text" name="email" value="">
                     <h5>Mật khẩu:</h5>
                     <input type="password" name="password" value="">                   
                     <input type="submit" class="btn btn-info" value="Đăng nhập">
                      <a href="#">Quên mật khẩu ?</a>
                 </form>                 
         </div>
          <div class="col-md-6 login-right">
                <h3>Đăng ký tài khoản mới</h3>
                <p>Với việc tạo tài khoản với cửa hàng của chúng tôi, bạn có thể thanh toán đơn hàng nhanh hơn, lưu trữ địa chỉ giao hàng,xem và theo dõi đơn đặt hàng trong tài khoản của bạn và còn hơn thế nữa.</p>
                <a class="acount-btn" href="register.php">Tạo một tài khoản</a>
         </div>
         <div class="clearfix"></div>        
         
     </div>
</div>
</form>
<?php require_once __DIR__."/../layouts/footer.php"; ?>