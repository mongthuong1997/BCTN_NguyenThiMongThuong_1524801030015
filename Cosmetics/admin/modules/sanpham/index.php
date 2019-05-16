
<?php require_once __DIR__."/../../autoload/autoload.php"; 
$open = "product";

  if(isset($_GET['page']))
  {
    $p = $_GET['page'];
  }else
  {
    $p = 1;
  }

  if(isset($_POST['search']))
  {
    $searchkey = $_POST['search'];
    $sql = "SELECT product.*,catalog.name as namecate
        from product LEFT JOIN catalog on catalog.id = product.catalog_id WHERE product.name LIKE '%$searchkey%' ";
  }
  else
  {
    $sql = "SELECT product.*,catalog.name as namecate
        from product LEFT JOIN catalog on catalog.id = product.catalog_id ";
  }



  $Sanpham = $db->fetchJone('product',$sql,$p,8,true);
  if(isset($Sanpham['page']))
  {
    $sotrang = $Sanpham['page'];
    unset($Sanpham['page']);
  }


?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
<div class="inner-block">
    <div class="product-block">
      <div class="pro-head">
        <h2>Danh sách sản phẩm <a href="themmoi.php" class="btn btn-primary">Thêm mới</a></h2>
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
      </div>
      <?php foreach($Sanpham as $sanpham) : ?>
      <div class="col-md-3 product-grid" style="min-height: 430px;">
        <div class="product-items">
          <a href="xoa.php?id=<?php echo $sanpham['id'] ?>"><li class="fa fa-times"></li></a>
              <div class="project-eff">
            <div id="nivo-lightbox-demo"> <p> <a href="sua.php?id=<?php echo $sanpham['id'] ?>" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>  
              <img class="img-responsive" src="<?php echo uploads() ?>product/<?php echo $sanpham['image_link'] ?>" alt="">
          </div>
          <div class="produ-cost">
            <h4><?php echo $sanpham['name'] ?></h4>
            <h5><?php echo number_format($sanpham['price']) ?> VNĐ</h5>
            <h5>Số lượng tồn:<?php echo $sanpham['quantity'] ?> sp</h5>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <div class="clearfix"> </div>
    </div>
</div>
<nav class="text-center">
            <ul class="pagination">
              <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                <?php 
                  if(isset($_GET['page']))
                  {
                    $p = $_GET['page'];
                  }
                  else
                  {
                    $p = 1;
                  }
                ?>
                <li class="page-link <?php echo ($i == $p) ? 'active' : '' ?>">
                  <a href="?page=<?php echo $i ; ?>"><?php echo $i; ?></a>
                </li>
              <?php endfor ?>
            </ul>

          </nav>
          <script type="text/javascript">
            function confirmAction()
            {
              return confirm("bạn có chắc làm điều dại dột này không ?")
            }
          </script>

<?php require_once __DIR__."/../../layouts/footer.php"; ?>