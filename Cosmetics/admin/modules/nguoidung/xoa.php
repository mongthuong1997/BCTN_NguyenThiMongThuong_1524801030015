
<?php 
  $open = "user";
  require_once __DIR__."/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $Editadmin = $db->fetchID("admin",$id);
  if(empty($Editadmin)){
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("user");
  }

    $num = $db->delete("admin",$id);
    if($num>0)
    {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("user");
    }else
    {
      $_SESSION['error'] = "Xóa thất bại";
      redirectAdmin("user");
    }

?>
