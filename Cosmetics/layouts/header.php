
<?php require_once __DIR__."/../autoload/autoload.php";
$totalmoney = 0;
$totalpro = 0;

    if(isset($_SESSION['cart']))
    {
        $totalpro = count($_SESSION['cart']);
        $totalmoney = $_SESSION['tongtien'];
    }

    $sql3 = "SELECT catalog.*
        from catalog ";
        $danhmuc = $db->fetchsql($sql3);
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Trang Khách hàng</title>
<link href="../public/fe/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../public/fe/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,600,800,700,500,300,100,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../public/fe/css/component.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="New Fashions Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" 
        />
<script src="../public/fe/js/jquery.min.js"></script>
<script src="../public/fe/js/simpleCart.min.js"> </script>
<!-- start menu -->
<link href="../public/fe/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../public/fe/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- start menu -->
</head>
<body>
<!--header-->
<div class="header2 text-center">
     <div class="container">
         <div class="main-header">
              <div class="carting">
                 <?php if(!isset($_SESSION['name_id'])) : ?>
                    <ul><li><a href="login.php"> ĐĂNG NHẬP</a></li>
                </ul>
                <?php else : ?>
                    <ul><li><strong style="color: red">Chào bạn, <?php echo $_SESSION['user_name'] ?></strong> </li>
                    <li><a href="logout.php"> ĐĂNG XUẤT</a></li>
                </ul>
                 <?php endif; ?>
                 </div>
             <div class="logo">
                 <h3><a href="index.php">MON COSMETIC</a></h3>
              </div>              
             <div class="box_1">                 
                 <a href="cart.php"><h3>Giỏ hàng: <span class="simpleCartl"><?php echo number_format($totalmoney) ?> VNĐ</span><img src="../public/fe/images/cart.png" alt=""/></h3></a>
             
             </div>
             
             <div class="clearfix"></div>
         </div>
                <!-- start header menu -->
         <ul class="megamenu skyblue">
            <li><a href="index.php">TRANG CHỦ</a></li>
            <li class="grid"><a href="Sanpham.php">Sản phẩm</a></li>                          
             <li><a href="#">Danh mục</a>
                  <div class="megapanel">
                      <div class="row">
                        <?php foreach ($danhmuc as $key) : ?>
                        <div class="col1">
                            <div class="h_nav">
                                <a href="danhmuc.php?id=<?php echo $key['id'] ?>"><h4><?php echo $key['name'] ?></h4></a>
                            </div>                          
                        </div>
                        <?php endforeach ; ?>
                    </div>
                </li>               
                <li class="grid"><a href="#">Giới thiệu</a></li>
                <li class="grid"><a href="#">Liên hệ</a></li>              
                </li>       
                
                </ul>            
              <div class="clearfix"></div> 
     </div>
</div>
    <!--//banner -->
    <!--/shop-->
    
    <!--footer -->
<!--/.navbar-->