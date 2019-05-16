
<?php require_once __DIR__."/../../autoload/autoload.php"; 
$admin = $db->fetchAll("admin");

  if(isset($_GET['page']))
  {
    $p = $_GET['page'];
  }else
  {
    $p = 1;
  }


  $sql = "SELECT admin.* from admin";
  $nguoidung = $db->fetchJone('admin',$sql,$p,10,true);
  if(isset($nguoidung['page']))
  {
    $sotrang = $nguoidung['page'];
    unset($nguoidung['page']);
  }


?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>
  <div class="inner-block">
    
    <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Danh mục <a href="themmoi.php" class="btn btn-info">Thêm mới</a>
                                  <?php require_once __DIR__."/../../../partials/notification.php"; ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>STT</th>
                                      <th>Tên người dùng</th>
                                      <th>Tên tài khoản</th>
                                      <th>Mật khẩu</th>
                                      <th>Lệnh</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $stt = 1; foreach ($nguoidung as $nd): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $nd['name'] ?></td>
                                    <td><?php echo $nd['username'] ?></td>
                                    <td><?php echo $nd['password'] ?></i></td>
                                    <td>
                                      <a class="btn btn-xs btn-info" href="sua.php?id=<?php echo $nd['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                      <a class="btn btn-xs btn-danger" href="xoa.php?id=<?php echo $nd['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                    </td>
                                </tr>
                              <?php $stt++; endforeach ?>
                          </tbody>
                      </table>
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
                  </div>
    </div> 
</div>
<?php require_once __DIR__."/../../layouts/footer.php"; ?>