
<?php 
  $open = "product";
  require_once __DIR__."/../../autoload/autoload.php";
  $category = $db->fetchAll("catalog");


  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
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
      $error['catalog_id'] = "Mời bạn chọn tên danh mục";
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

      $id_insert = $db->insert("product",$data);
      if($id_insert)
      {
        move_uploaded_file($file_tmp, $part.$file_name);
        $_SESSION['success'] = "Thêm mới thành công";
        redirectAdmin("sanpham");
      }else
      {
        $_SESSION['error'] = "Thêm mới thất bại";
      }

    }
  }

 ?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

<div class="inner-block">
    <div class="product-block">
      <div class="pro-head">
        <h2>Danh sách sản phẩm</h2>
      </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                 
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  
    <tr>
      <td width="92">Danh mục:</td>
      <td width="233"><label for="select"></label>
        
        <select name="catalog_id" id="select">
          <option value="">- Mời bạn chọn danh mục sản phẩm -</option>
        <?php foreach ($category as $item ) : ?>
          <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
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
      <td><input type="text" id="inputEmail" class="form-control" name ="name" placeholder="Tên sản phẩm" autofocus >
        <?php 
                if(isset($error['name'])): ?>
                  <p class="text-danger"><?php echo $error['name']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Giá sản phẩm</td>
      <td><input type="number" id="inputEmail" class="form-control" name ="price" placeholder="123" autofocus >
        <?php 
                if(isset($error['price'])): ?>
                  <p class="text-danger"><?php echo $error['price']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Số lượng</td>
      <td><input type="number" id="inputEmail" class="form-control" name ="quantity" placeholder="100" autofocus >
        <?php 
                if(isset($error['quantity'])): ?>
                  <p class="text-danger"><?php echo $error['quantity']; ?></p>
                <?php endif ?>
      </td>
    </tr>
    <tr>
      <td>Hình</td>
      <td><label for="image_link"></label>
      <input type="file" name="image_link" />
       <?php 
                if(isset($error['image_link'])): ?>
                  <p class="text-danger"><?php echo $error['image_link']; ?></p>
                <?php endif ?>

    </td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><label for="inputEmail"></label>
      <textarea rows="4" cols="50" name="content" ></textarea>
       <?php 
                if(isset($error['content'])): ?>
                  <p class="text-danger"><?php echo $error['content']; ?></p>
                <?php endif ?>
    </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-success" name="button" id="button" value="Thêm" /></td>
    </tr>
  </table>
</form>
               
</table>
      <div class="clearfix"> </div>
    </div>
</div>

<?php require_once __DIR__."/../../layouts/footer.php"; ?>