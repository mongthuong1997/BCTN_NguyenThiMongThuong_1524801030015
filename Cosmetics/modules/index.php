
<?php require_once __DIR__."/../autoload/autoload.php";
$totalpro = 0;
    if(isset($_SESSION['cart']))
    {
        $totalpro = count($_SESSION['cart']);
    }

    $sql = "SELECT * FROM product  
            ORDER BY created";
    $product = $db->fetchsql($sql);
    $sql3 = "SELECT catalog.*
        from catalog ";
        $danhmuc = $db->fetchsql($sql3);

        if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }else
    {
        $p = 1;
    }

   $total = count($db->fetchsql($sql));
   $product = $db->fetchJones("product",$sql,$total,$p,8,true);
    $sotrang = $product['page'];
    unset($product['page']);

  $path = $_SERVER['SCRIPT_NAME'];

 ?>



<?php require_once __DIR__."/../autoload/autoload.php";
$totalmoney = 0;

    if(isset($_SESSION['cart']))
    {
        $totalpro = count($_SESSION['cart']);
        $totalmoney = $_SESSION['tongtien'];
    }
 ?>

<!DOCTYPE html>
<html>
<head>
<title>Trang chủ</title>
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
<div class="header">
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
                 <a href="cart.php"><h3>Cart: <span class="simpleCart"><?php echo number_format($totalmoney) ?> VNĐ</span><img src="../public/fe/images/cart.png" alt=""/></h3></a>
             
             </div>
             
             <div class="clearfix"></div>
         </div>
                
                <!-- start header menu -->
        <ul class="megamenu skyblue">
            <li class="active grid"><a class="color1" href="index.php">TRANG CHỦ</a></li>
            <li class="grid"><a href="Sanpham.php">Sản phẩm</a></li>
            <li class="grid"><a href="#">Danh mục</a>              
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
                </div>
                </li>     
                <li class="grid"><a href="#">Giới thiệu</a></li>
                <li class="grid"><a href="#">Liên hệ</a></li>   
                </ul>            
              <div class="clearfix"></div>              
     </div>
         <div class="caption">
         <h1>MỸ PHẨM CHÍNH HÃNG</h1>     
        
         </div>
</div>
<!--header-->
<div class="categoires">
     <div class="container" style="text-align: center;">
         <h1 style="color: Red;">Sản phẩm mới</h1>
     </div>
</div>
<!---->
<div class="features" id="features">
     <div class="container">
         <div class="tabs-box">
            <div class="clearfix"> </div>
         <div class="tab-grids">
             <?php foreach($product as $item) : ?>                         
                 <a href="detail.php?id=<?php echo $item['id'] ?>"><div class="product-grid">                     
                        <div class="more-product-info"><span>MỚI</span></div>                       
                        <div class="product-img b-link-stripe b-animate-go  thickbox">                         
                            <img src="<?php echo uploads() ?>product/<?php echo $item['image_link'] ?>" class="img-responsive" alt=""/>
                            <div class="b-wrapper">
                            <h4 class="b-animate b-from-left  b-delay03">                           
                            <button class="btns">Đặt ngay</button>
                            </h4>
                            </div>
                        </div></a>                      
                        <div class="product-info simpleCart_shelfItem" style="height: 250px">
                            <div class="product-info-cust">
                                <h4><?php echo $item['name']; ?></h4>
                                <span class="item_price"><?php echo number_format($item['price']) ?></span>
                                <input type="button" class="item_add" value="Thêm vào giỏ" onclick="location.href='addcart.php?id=<?php echo $item['id'] ?>'">
                            </div>                                                  
                            <div class="clearfix"> </div>
                        </div>
                    </div> 
             <?php endforeach; ?>                                                             
                    
                    <div class="clearfix"></div>            
                <nav class="text-center" style="padding-top: 10px">
                                <ul class="pagination">
                                  <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                                    <li class="page-link"><a href="<?php $path ?>?p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                  <?php endfor ?>
                                </ul>
                              </nav>
         </div>             
         </div>
            <!-- tabs-box -->
            <!-- Comman-js-files -->
            <script>
            $(document).ready(function() {
                $("#tab2").hide();
                $("#tab3").hide();
                $(".tabs-menu a").click(function(event){
                    event.preventDefault();
                    var tab=$(this).attr("href");
                    $(".tab-grid1,.tab-grid2,.tab-grid3").not(tab).css("display","none");
                    $(tab).fadeIn("slow");
                });
                $("ul.tabs-menu li a").click(function(){
                    $(this).parent().addClass("active a");
                    $(this).parent().siblings().removeClass("active a");
                });
            });
            </script>
            <!-- Comman-js-files -->
     </div>
</div>
<!--fotter-->
<div class="fotter">
     <div class="container">
     <div class="col-md-6 contact">
          <form>
             <input type="text" class="text" value="Nhập tên..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name...';}">
             <input type="text" class="text" value="Nhập email..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email...';}">
             <textarea onfocus="if(this.value == 'Message...') this.value='';" onblur="if(this.value == '') this.value='Message...';" >Tin nhắn...</textarea>    
             <div class="clearfix"></div>
             <input type="submit" value="SUBMIT">
         </form>

     </div>
     <div class="col-md-6 ftr-left">
         <div class="ftr-list">
             <ul>
                 <li><a href="#">Trang chủ</a></li>
                 <li><a href="#">Liên hệ</a></li>
                 <li><a href="#">Giới thiệu</a></li>
                 <li><a href="#">Top Seller</a></li>
                 <li><a href="#">Sản phẩm mới</a></li>
             </ul>
         </div>
         <div class="ftr-list2">
             <ul>                
                 <li><a href="#">Địa chỉ : Đại học thủ dầu một</a></li>
                 <li><a href="#">Bảo hành</a></li>
             </ul>
         </div>
         <div class="clearfix"></div>
         <h4>FOLLOW US</h4>
         <div class="social-icons">
         <a href="#"><span class="in"> </span></a>
         <a href="#"><span class="you"> </span></a>
         <a href="#"><span class="be"> </span></a>
         <a href="#"><span class="twt"> </span></a>
         <a href="#"><span class="fb"> </span></a>
         </div>
     </div>  
     <div class="clearfix"></div>
     </div>
</div>
<!--fotter//-->
<div class="fotter-logo">
     <div class="container">
     <div class="ftr-logo"><h3><a href="index.html">CHẤT LƯỢNG CHO TẤT CẢ</a></h3></div>
     <div class="ftr-info">
     <p>&copy; 2019 - Shop mỹ phẩm online BBT.MON Allright Reserved 
        <a href="mongthuong1997@gmail.com">Email: mongthuong1997@gmail.com</a> </p>
    
    </div>
     <div class="clearfix"></div>
     </div>
</div>
<!--fotter//-->

</body>
</html>