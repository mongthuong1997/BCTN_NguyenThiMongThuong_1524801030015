
<?php 
  $open = "category";
  require_once __DIR__."/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $EditCategory = $db->fetchID("catalog",$id);
  if(empty($EditCategory)){
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("danhmuc");
  }

  $is_product = $db->fetchOne("product","catalog_id = $id ");

  if($is_product == null)
  {
    $num = $db->delete("catalog",$id);
    if($num>0)
    {
      $_SESSION['success'] = "Xóa thành công";
      redirectAdmin("danhmuc");
    }else
    {
      $_SESSION['error'] = "Xóa thất bại";
      redirectAdmin("danhmuc");
    }
  }else
  {
      $_SESSION['error'] = "Danh mục có sản phẩm ! bạn không thể xóa";
      redirectAdmin("danhmuc");    
  }

?>
