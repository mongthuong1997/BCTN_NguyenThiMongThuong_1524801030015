<?php require_once __DIR__."/../autoload/autoload.php";
    $user = $db->fetchID("user",intval($_SESSION['name_id']));

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	$data =
	    [
	    	'amount' => $_SESSION['total'],
	    	'user_id' => $_SESSION['name_id'],
	    	'message' => postInput("message"),
	    ];

	    $idtran = $db->insert("transaction",$data);
	    if($idtran > 0)
	    {
	    	foreach($_SESSION['cart'] as $key => $value)
	    	{
	    		$data2 = 
	    		[
	    			'transaction_id' => $idtran,
	    			'product_id' => $key,
	    			'qty' => $value['qty'],
	    			'price' => $value['price']
	    		];

	    		$id_insert = $db->insert("orders",$data2);
	    	}

	    	$_SESSION['success'] = "Lưu thông tin đơn hàng thành công";
	    	header("location:notice.php");
	    }
    }
 ?>
<?php require_once __DIR__."/../layouts/header.php"; ?>
<style type="text/css">
	.col1{
		width: 300px;
	}

</style>
<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
<div class="container">
		
<h3 class="tittle-w3layouts my-lg-4 my-4">Thanh toán đơn hàng </h3>
    <div class="row">
    	<table class="table table-bordered" width="100%" cellspacing="0">
               
                    
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <tr>
      <td class="col1">Tên thành viên</td>
      <td><input type="text" readonly="" id="inputEmail" name ="name" value="<?php echo $user['name']?>" autofocus >
      </td>
    </tr>
    <tr>
      <td class="col1">Email</td>
      <td><input type="text" readonly="" value="<?php echo $user['email'] ?>" id="inputEmail" name ="email" autofocus >
      </td>
    </tr>
    <tr>
      <td class="col1">Số điện thoại</td>
      <td><input type="text" readonly="" id="inputEmail" value="<?php echo $user['phone'] ?>" name ="sdt"autofocus >
      </td>
    </tr>
    <tr>
      <td class="col1">Số tiền thanh toán</td>
      <td><input type="text" readonly="" id="inputEmail" value="<?php echo number_format($_SESSION['total']) ?> VNĐ" name ="sttt" autofocus >
      </td>
    </tr>
    <tr>
      <td class="col1">Ghi chú</td>
      <td><input type="text" id="inputEmail" name ="message" autofocus >
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-success" name="button" id="button" value="Thanh toán" /></td>
    </tr>
  </table>
  </form>

    </div>

</div>
</section>
<?php require_once __DIR__."/../layouts/footer.php"; ?>