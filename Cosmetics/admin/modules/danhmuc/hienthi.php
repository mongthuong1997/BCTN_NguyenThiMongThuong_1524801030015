<?php require_once __DIR__."/../../autoload/autoload.php"; 
	
	$id = intval(getInput('id'));

	$Editcategory = $db->fetchID("catalog",$id);
	if(empty($Editcategory))
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
	}

	$home = $Editcategory['home'] == 0 ? 1 : 0;
	$update = $db->update("catalog",array("home" => $home), array("id" => $id));

	if($update > 0)
	{
		$_SESSION['success'] = "Cập nhật thành công";
        redirectAdmin("danhmuc");
	}else
    {
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("danhmuc");
    }
?>