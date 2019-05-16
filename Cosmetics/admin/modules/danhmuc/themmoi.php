
<?php 
  $open = "category";
  require_once __DIR__."/../../autoload/autoload.php";

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $data = 
    [
      "name" => postInput('txtname')
    ];

    $error = [];

    if(postInput('txtname') == ''){
      $error['txtname'] = "Mời bạn nhập đầy đủ tên danh mục";
    }

    if(empty($error))
    {
      $isset =$db->fetchOne("catalog"," name = '".$data['name']."' ");
      if(count($isset) > 0)
      {
        $_SESSION['error'] = "Tên danh mục đã tồn tại ! ";
      }else
      {
        $id_insert = $db->insert("catalog",$data);
        if($id_insert > 0)
        {
          $_SESSION['success'] = "Thêm mới thành công";
          redirectAdmin("danhmuc");
        }else
        {
          $_SESSION['error'] = "Thêm mới thất bại";
        }
      }
    }
  }

 ?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item"><a href="index.php">Danh mục</a></li>
          <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
        <div class="clearfix"></div>
        
       <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        
        <!-- DataTables Example -->
        
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               
                    
                  <tr>
                    <td><div class="card-header">Thêm danh mục</div>
      <div class="card-body">
        <form action="themmoi.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name ="txtname" placeholder="Tên danh mục" autofocus>
              <label for="inputEmail">Tên danh mục</label>
              <?php 
                if(isset($error['txtname'])): ?>
                  <p class="text-danger"><?php echo $error['txtname']; ?></p>
                <?php endif ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <button type="submit" class="btn btn-success">Thêm</button>
              
            </div>
          </div>
          <a class="btn btn-prim"> </a>  
        </form>

        </td>
                   
                  </tr>
               
              </table>
          
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
<?php require_once __DIR__."/../../layouts/footer.php"; ?>