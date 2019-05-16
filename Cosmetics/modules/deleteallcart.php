<?php 
	session_start();
	unset($_SESSION['cart']);
	echo "<script>alert('Đã xóa giỏ hàng');location.href='index.php'</script>";
?>