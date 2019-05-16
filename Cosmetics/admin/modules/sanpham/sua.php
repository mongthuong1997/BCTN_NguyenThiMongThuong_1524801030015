
<?php 
  $open = "product";
  require_once __DIR__."/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $Editproduct = $db->fetchID("product",$id);
  if(empty($Editproduct)){
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("product");
  }

  $category = $db->fetchAll("catalog");

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = 
    [
      "name" => postInput('name'),
      "price" => postInput('price'),
      "content" => postInput('content'),
      "quantity" =>postInput('quantity'),
      "catalog_id" => postInput('catalog_id'),
      
    ];

    $error = [];

    if(postInput('name') == ''){
      $error['name'] = "Mời bạn nhập đầy đủ tên sản phẩm";
    }

    if(postInput('price') == ''){
      $error['price'] = "Mời bạn nhập giá sản phẩm";
    }

    if(postInput('content') == ''){
      $error['content'] = "Mời bạn nhập nội dung";
    }

    if(postInput('catalog_id') == ''){
      $error['catalog_id'] = "Mời bạn nhập nội dung";
    }

    if(postInput('quantity') == ''){
      $error['quantity'] = "Mời bạn nhập số lượng";
    }

    if( ! isset($_FILES['image_link'])){
      $error['image_link'] = "Mời bạn chọn hình ảnh";
    }

    if(empty($error))
    {    

        if(isset($_FILES['image_link']))
        {
          $file_name = $_FILES['image_link']['name'];
          $file_tmp = $_FILES['image_link']['tmp_name'];
          $file_type = $_FILES['image_link']['type'];
          $file_erro = $_FILES['image_link']['error'];

          if($file_erro == 0)
          {
            $part = ROOT."product/";
            $data['image_link'] = $file_name;
          }
        }

        $update = $db->update("product",$data,array("id"=>$id));
        if($update > 0)
        {
          move_uploaded_file($file_tmp, $part.$file_name);
          $_SESSION['success'] = "Cập nhật thành công";
          redirectAdmin("sanpham");
        }
        else
        {
          $_SESSION['error'] = "Dữ liệu không thay đổi";
          redirectAdmin("sanpham");
        }
    }   
  }

 ?>
<head>
<title>Trang Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="/Cosmetics/public/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="/Cosmetics/public/admin/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!--js-->
<script src="/Cosmetics/public/admin/js/jquery-2.1.1.min.js"></script> 
<!--icons-css-->
<link href="/Cosmetics/public/admin/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
<!--//skycons-icons-->
</head>
  <div class="inner-block">
    <div class="product-block">
      <div class="pro-head">
        <h2>cập nhật sản phẩm</h2>
      </div>
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        
        <!-- DataTables Example -->
     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                    
      <form action="" method="post" enctype="multipart/form-data">
  
      <tr>
      <td width="92">Danh mục:</td>
      <td width="233"><label for="select"></label>
        
        <select name="catalog_id" id="select">
          <option value="">-- Mời bạn chọn danh mục sản phẩm --</option>
        <?php foreach ($category as $item ) : ?>
          <option value="<?php echo $item['id'] ?>" <?php echo $Editproduct['catalog_id'] == $item['id'] ? "selected = 'selected'" : '' ?>><?php echo $item['name'] ?></option>
        <?php endforeach ?>
      </select>
      <?php 
                if(isset($error['catalog_id'])): ?>
                  <p class="text-danger"><?php echo $error['catalog_id']; ?></p>
                <?php endif ?>

    </td>
    </tr>
    <tr>
      <td>Tên sản phẩm</td>
      <td><input type="text" id="inputEmail" class="form-control" name ="name" placeholder="Tên sản phẩm" autofocus value="<?php echo $Editproduct['name'] ?>" >
        <?php 
                if(isset($error['name'])): ?>
                  <p class="text-danger"><?php echo $error['name']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Giá sản phẩm</td>
      <td><input type="number" id="inputEmail" class="form-control" name ="price" placeholder="9.000.000 vnđ" autofocus value="<?php echo $Editproduct['price'] ?>" >
        <?php 
                if(isset($error['price'])): ?>
                  <p class="text-danger"><?php echo $error['price']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="number" id="inputEmail" class="form-control" name ="quantity" placeholder="100" autofocus value="<?php echo $Editproduct['quantity'] ?>" >
        <?php 
                if(isset($error['quantity'])): ?>
                  <p class="text-danger"><?php echo $error['quantity']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Hình</td>
      <td><label for="image_link"></label>
      <input type="file" name="image_link"/>    
       <?php 
          if(isset($error['image_link'])): ?>
          <p class="text-danger"><?php echo $error['image_link']; ?></p>
      <?php endif ?>
        <img src="<?php echo uploads() ?>product/<?php echo $Editproduct['image_link'] ?>" width="50px" height="50px">
    </td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><label for="inputEmail"></label>
      <textarea rows="4" cols="50" name="content"><?php echo $Editproduct['content'] ?></textarea>
       <?php 
                if(isset($error['content'])): ?>
                  <p class="text-danger"><?php echo $error['content']; ?></p>
                <?php endif ?>
    </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-success">Sửa</button></td>
    </tr>
  </table>
</form>
               
              </table>
      <div class="clearfix"> </div>
    </div>
</div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
