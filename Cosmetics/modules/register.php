<?php require_once __DIR__."/../autoload/autoload.php"; 

    if(isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn đã đăng nhập');location.href='index.php'</script>";
    }
    
$name = $email = $password =$address = $phone = '';
    $data = 
    [
      "name" => postInput('name'),
      "email" => postInput('email'),
      "address" => postInput('address'),
      "phone" => postInput('phone'),
      "password" => MD5(postInput('password')),
    ];

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    
    $error = [];

    if(postInput('name') == ''){
      $error['name'] = "Mời bạn nhập tên người dùng";
    }

    if(postInput('email') == ''){
      $error['email'] = "Mời bạn nhập email";
    }
    else
    {
      $is_check = $db->fetchOne("user"," email = '".$data['email']."' ");
      if($is_check != null)
      {
        $error['email'] = "Email đã tồn tại";
      }
    }
    if(postInput('address') == ''){
      $error['address'] = "Mời bạn nhập địa chỉ";
    }
    if(postInput('phone') == ''){
      $error['phone'] = "Mời bạn nhập số điện thoại";
    }
    if(postInput('password') == ''){
      $error['password'] = "Mời bạn nhập mật khẩu";
    }

    if(empty($error))
    {

      $id_insert = $db->insert("user",$data);
      if($id_insert)
      {
        $_SESSION['success'] = "Đăng ký thành công, mời bạn đăng nhập";
        header("location: login.php");
      }else
      {
        $_SESSION['error'] = "Đăng ký thất bại";
      }

    }
  }


?>

<?php require_once __DIR__."/../layouts/header.php"; ?>

<div class="registration-form">
   <div class="container">
     <ol class="breadcrumb">
      <li><a href="index.php">Home</a></li>
      <li class="active">Đăng ký thành viên</li>
     </ol>
     <h2>Đăng ký thành viên</h2>
     <div class="col-md-6 reg-form">
       <div class="reg">
         <p>Chào mừng đến với trang đăng ký, hãy nhập đầy đủ thông tin để tiếp tục.</p>
         <p>Nếu bạn đã có tài khoản, <a href="login.php">Bấm vào đây</a></p>
         <form method="post">
           <ul>
             <li class="text-info">Họ tên: </li>
             <li><input type="text" name="name" value=""></li>
           </ul>
           <?php 
                        if(isset($error['name'])): ?>
                        <p class="text-danger"><?php echo $error['name']; ?></p>
                    <?php endif ?>
           <ul>
             <li class="text-info">Địa chỉ: </li>
             <li><input type="text" name="address" value=""></li>
           </ul>
           <?php 
                        if(isset($error['address'])): ?>
                        <p class="text-danger"><?php echo $error['address']; ?></p>
                    <?php endif ?>         
          <ul>
             <li class="text-info">Email: </li>
             <li><input type="text" name="email" value=""></li>
           </ul>
           <?php 
                        if(isset($error['email'])): ?>
                        <p class="text-danger"><?php echo $error['email']; ?></p>
                    <?php endif ?>
           <ul>
             <li class="text-info">Mật khẩu: </li>
             <li><input type="password" name="password" value=""></li>
           </ul>
           <?php 
                        if(isset($error['password'])): ?>
                        <p class="text-danger"><?php echo $error['password']; ?></p>
                    <?php endif ?>
           <ul>
             <li class="text-info">Nhập lại mật khẩu:</li>
             <li><input type="password" name="re-password" value=""></li>
           </ul>
           <?php 
                        if(isset($error['re-password'])): ?>
                        <p class="text-danger"><?php echo $error['re-password']; ?></p>
                    <?php endif ?>
           <ul>
             <li class="text-info">Số điên thoại:</li>
             <li><input type="text" name="phone" value=""></li>
           </ul>
           <?php 
                        if(isset($error['phone'])): ?>
                        <p class="text-danger"><?php echo $error['phone']; ?></p>
                    <?php endif ?>            
           <input type="submit" name="btndk" value="Đăng ký ngay">
           <p class="click">Bằng việc bấm vào nút này, bạn đã đồng ý với <a href="#">các điều khoản và điều kiện </a> để sử dụng của chúng tối.</p> 
         </form>
       </div>
     </div>
     <div class="col-md-6 reg-right">
       <h3>Hoàn thành đăng ký</h3>
       <p>Hoàng thành đăng ký.</p>
      
     </div>
     <div class="clearfix"></div>    
   </div>
</div>
<?php require_once __DIR__."/../layouts/footer.php"; ?>