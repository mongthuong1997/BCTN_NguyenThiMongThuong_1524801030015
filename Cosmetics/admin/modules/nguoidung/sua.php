
<?php 
  $open = "admin";
  require_once __DIR__."/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $Editadmin = $db->fetchID("admin",$id);
  if(empty($Editadmin)){
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("nguoidung");
  }

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
     $data = 
    [
      "name" => postInput('name'),
      "username" => postInput('username'),
      "password" => MD5(postInput('password')),
    ];

    $error = [];

    if(postInput('name') == ''){
      $error['name'] = "Mời bạn nhập tên người dùng";
    }

    if(postInput('username') == ''){
      $error['username'] = "Mời bạn nhập tên đăng nhập";
    }
    else
    {
      if(postInput('username') != $Editadmin['username'])
      {
        $is_check = $db->fetchOne("admin"," username = '".$data['username']."' ");
        if($is_check != null)
        {
          $error['username'] = "Tên đăng nhập đã tồn tại";
        }
      }     
    }


    if(postInput('password') != null && postInput('re_password') != null )
    {
      if(postInput('password') != postInput('re_password'))
      {
        $error['password'] = "Mật khẩu thay đổi không khớp";
      }
      else
      {
        $data['password'] = MD5(postInput('password'));
      }
    }

    if(empty($error))
    {

      $id_update = $db->update("admin",$data,array("id"=>$id));
      if($id_update)
      {
        $_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("nguoidung");
      }else
      {
        $_SESSION['error'] = "Cập nhật thất bại";
      }

    }
  }

 ?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
<div class="inner-block">
  <div class="chit-chat-heading">
     Sửa người dùng
      </div>
    <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        
        <!-- DataTables Example -->
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                    
               <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <tr>
      <td>Tên người dùng</td>
      <td><input type="text" id="inputEmail" class="form-control" name ="name" placeholder="Tên người dùng" value="<?php echo $Editadmin['name']?>" autofocus >
        <?php 
                if(isset($error['name'])): ?>
                  <p class="text-danger"><?php echo $error['name']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Tên đăng nhập</td>
      <td><input type="text" value="<?php echo $Editadmin['username']?>" id="inputEmail" class="form-control" name ="username" placeholder="Tên đăng nhập" autofocus >
        <?php 
                if(isset($error['username'])): ?>
                  <p class="text-danger"><?php echo $error['username']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Mật khẩu</td>
      <td><input type="password" id="inputEmail" class="form-control" name ="password" placeholder="Mật khẩu" autofocus >
        <?php 
                if(isset($error['password'])): ?>
                  <p class="text-danger"><?php echo $error['password']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Nhập lại mật khẩu</td>
      <td><input type="password" id="inputEmail" class="form-control" name ="re_password" placeholder="Nhập lại mật khẩu" autofocus >
        <?php 
                if(isset($error['re_password'])): ?>
                  <p class="text-danger"><?php echo $error['re_password']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-success" name="button" id="button" value="Cập nhật" /></td>
    </tr>
  </table>
</form>
               
              </table>
    
</div>
<?php require_once __DIR__."/../../layouts/footer.php"; ?>