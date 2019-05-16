<?php require_once __DIR__."/../autoload/autoload.php";
	unset($_SESSION['cart']);
	unset($_SESSION['total']);
?>

<?php require_once __DIR__."/../layouts/header.php"; ?>
<div style="background-size:cover;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	min-height:720px;
	position:relative;">
     <div class="container">
         <div class="main-header">
       		<h3 class="tittle-w3layouts my-lg-4 my-4">Thanh toán đơn hàng </h3>
    	<?php require_once __DIR__."/../partials/notification.php"; ?>
    	<a href="index.php" class="btn-btn-success">Trở về trang chủ</a>
	</div>
</div>
</div>
<?php require_once __DIR__."/../layouts/footer.php"; ?>