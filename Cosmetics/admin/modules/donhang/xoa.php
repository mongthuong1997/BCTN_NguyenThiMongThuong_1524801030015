
<?php 
  require_once __DIR__."/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $Editn = $db->fetchID("transaction",$id);
  if(empty($Editn)){
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("donhang");
  }

    $num = $db->delete("transaction",$id);
    if($num>0)
    {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("donhang");
    }else
    {
      $_SESSION['error'] = "Xóa thất bại";
      redirectAdmin("donhang");
    }

?>
