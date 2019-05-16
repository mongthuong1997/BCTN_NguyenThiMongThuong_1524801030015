<div class="copyrights">
   <p><p>&copy; 2019 - Shop mỹ phẩm online BBT.MON Allright Reserved 
        <a href="mongthuong1997@gmail.com">Email: mongthuong1997@gmail.com</a> </p></p>
</div>  
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span> 
            <!--<img id="logo" src="" alt="Logo"/>--> 
        </a> </div>     
        <div class="menu">
          <ul id="menu" >
            <li id="menu-home" ><a href="<?php echo base_url() ?>/admin"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li><a href="#"><i class="fa fa-cogs"></i><span>Quản lý sản phẩm</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul>
                <li><a href="/Cosmetics/admin/modules/sanpham/index.php">Danh sách sản phẩm</a></li>    
                <li><a href="/Cosmetics/admin/modules/sanpham/themmoi.php">Thêm sản phẩm</a></li>              
              </ul>
            </li>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Quản lý danh mục</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-comunicacao-sub" >
                <li id="menu-arquivos" ><a href="/Cosmetics/admin/modules/danhmuc/index.php">Dach sách danh mục</a></li>
                 <li id="menu-arquivos" ><a href="/Cosmetics/admin/modules/danhmuc/themmoi.php">Thêm mới danh mục</a></li>
              </ul>
            </li>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Quản lý người dùng</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-comunicacao-sub" >
                <li id="menu-arquivos" ><a href="/Cosmetics/admin/modules/nguoidung/index.php">Dach sách người dùng</a></li>
                 <li id="menu-arquivos" ><a href="/Cosmetics/admin/modules/nguoidung/themmoi.php">Thêm mới người dùng</a></li>
              </ul>
            </li>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Quản lý khách hàng</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-comunicacao-sub" >
                <li id="menu-arquivos" ><a href="/Cosmetics/admin/modules/khachhang/index.php">Dach sách khách hàng</a></li>
              </ul>
            </li>
            <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Quản lý đơn hàng</span><span class="fa fa-angle-right" style="float: right"></span></a>
              <ul id="menu-comunicacao-sub" >
                <li id="menu-arquivos" ><a href="/Cosmetics/admin/modules/donhang/index.php">Dach sách đơn hàng</a></li>
              </ul>
            </li>
          </ul>
        </div>
   </div>
  <div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;
            
$(".sidebar-icon").click(function() {                
  if (toggle)
  {
    $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
    $("#menu span").css({"position":"absolute"});
  }
  else
  {
    $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
    setTimeout(function() {
      $("#menu span").css({"position":"relative"});
    }, 400);
  }               
                toggle = !toggle;
            });
</script>
<link rel="stylesheet" type="text/css" href="/Cosmetics/public/admin/css/magnific-popup.css">
      <script type="text/javascript" src="/Cosmetics/public/admin/js/nivo-lightbox.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            $('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
        });
        </script>
<!--scrolling js-->
    <script src="/Cosmetics/public/admin/js/jquery.nicescroll.js"></script>
    <script src="/Cosmetics/public/admin/js/scripts.js"></script>
    <!--//scrolling js-->
<script src="/Cosmetics/public/admin/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>