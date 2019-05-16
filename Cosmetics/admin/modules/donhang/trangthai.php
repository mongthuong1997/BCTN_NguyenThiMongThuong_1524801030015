<?php 
  require_once __DIR__."/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $Edittransaction = $db->fetchID("transaction",$id);
  if(empty($Edittransaction))
  {
  	$_SESSION['error'] = "Dữ liệu không tồn tại";
  	redirectAdmin("donhang");
  }

  if($Edittransaction['status'] == 1)
  {
  	$_SESSION['error'] = "Đơn hàng đã được xử lý";
  	redirectAdmin("donhang");
  }

  $status = 1;

  $update = $db->update("transaction",array("status" => $status),array("id" => $id));
  if($update > 0)
  {
  	$_SESSION['success'] = "Cập nhật thành công";

  	$sql = "SELECT * FROM orders WHERE transaction_id = $id";
  	$Order = $db->fetchsql($sql);
  	foreach($Order as $item ) 
  	{
  		$idproduct = intval($item['product_id']);
  		$product = $db->fetchID("product",$idproduct);
  		$number = $product['quantity'] - $item['qty'];
  		$up_pro = $db->update("product",array("quantity" => $number,"pay" => $product['pay'] + 1),array("id"=>$idproduct));
  	} 
  	redirectAdmin("donhang");
  }else
  {
  	$_SESSION['error'] = "Cập nhật thất bại";
  	redirectAdmin("donhang");
  }

 ?>