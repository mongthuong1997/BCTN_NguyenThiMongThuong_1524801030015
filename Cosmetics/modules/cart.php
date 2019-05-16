<?php require_once __DIR__."/../autoload/autoload.php";
    $totalcart = 0;
    if(!isset($_SESSION['cart']))
    {
        echo "<script>alert('Không có sản phẩm nào trong giỏ hàng');location.href='index.php'</script>";
    }else
    {
        $totalcart = count($_SESSION['cart']);
    }

 ?>
<link rel="stylesheet" type="text/css" href="../public/frontend/css/checkout.css">
<?php require_once __DIR__."/../layouts/header.php"; ?>

<div class="cart">
     <div class="container">
             <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>
          <li class="active">Cart</li>
         </ol>
         <div class="cart-top">
            <a href="index.php"><< home</a>
         </div> 
            
         <div class="col-md-9 cart-items">
             <h2>Giỏ hàng bao gồm <?php echo $totalcart ?> sản phẩm</h2>
            <?php $sum=0; $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?>
             <div class="cart-header">
                 <div class="close1"> </div>
                 <div class="cart-sec">
                        <div class="cart-item cyc">
                             <img src="<?php echo uploads() ?>product/<?php echo $value['image_link'] ?>"/>
                        </div>
                       <div class="cart-item-info">
                             <h3><?php echo $value['name'] ?></h3>
                             <h4><span><?php echo number_format($value['price']) ?> VNĐ</span></h4>
                             <p class="qty">Số lượng:</p>
                             <table>
                                 <tr><input min="1" type="number" id="qty" class="qty" value="<?php echo number_format($value['qty']) ?>" class="form-control input-small"></tr>
                             </table>
                               <div class="rem">
                                        <a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i>Xóa</a>
                                        <a href="#" class="btn btn-xs btn-info updatecart" data-key="<?php echo $key ?>"><i class="fa fa-refresh"></i>Sửa</a>
                                </div>
                       </div>
                       <div class="clearfix"></div>
                        <div class="delivery">
                             
                             <span>Giao hàng từ 2 đến 3 ngày</span>
                             <div class="clearfix"></div>
                        </div>                      
                  </div>
             </div>
             <?php $sum += $value['price'] * $value['qty'];$_SESSION['tongtien'] = $sum; ?>
            <?php $stt++; endforeach ?>
             <script>$(document).ready(function(c) {
                    $('.close2').on('click', function(c){
                            $('.cart-header2').fadeOut('slow', function(c){
                        $('.cart-header2').remove();
                    });
                    });   
                    });
             </script>     
         </div>
         
         <div class="col-md-3 cart-total">
             <a class="continue" href="index.php">Tiếp tục mua hàng</a>
             <div class="price-details">
                 <h3>Chi tiết đơn hàng</h3>
                 <span>Tổng tiền</span>
                 <span class="total"><?php echo number_format($_SESSION['tongtien']) ?> VNĐ</span>
                 <span>Phí giao hàng</span>
                 <span class="total">15.000 VNĐ</span>
                 <div class="clearfix"></div>                
             </div> 
             <h4 class="last-price">Tổng tiền</h4>
             <span class="total final"><?php $_SESSION['total'] = $_SESSION['tongtien'] + 15000; echo number_format($_SESSION['total'])?> VNĐ</span>
             <div class="clearfix"></div>
             <a class="order" href="thanhtoan.php">Đặt hàng</a>
             <div class="total-item">
                 <h3>Tùy chọn</h3>
                 <h4>Phiếu giảm giá</h4>
                 <a class="cpns" href="#">Nhập</a>
             </div>
            </div>
     </div>
</div>
<?php require_once __DIR__."/../layouts/footer.php"; ?>