
<?php require_once __DIR__."/../../autoload/autoload.php"; 
$open = "category";
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
    $sql = "SELECT * FROM catalog WHERE name LIKE '%$searchkey%'";
  }
  else
  {
    $sql = "SELECT * FROM catalog";
  }

  $category = $db->fetchJone('catalog',$sql,$p,10,true);
  if(isset($category['page']))
  {
    $sotrang = $category['page'];
    unset($category['page']);
  }
?>

<style type="text/css">
  input[type=text] {
  border: 2px solid;
  border-radius: 4px;
}
</style>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

<div class="inner-block">
    <?php require_once __DIR__."/../../../partials/notification.php"; ?>
    <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Danh mục <a href="themmoi.php"></a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>STT</th>
                                      <th>Tên</th>
                                      <th>Xử lý</th>
                                      <th>Lệnh</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $stt = 1; foreach ($category as $item): ?>
                                <tr>
                                  <td><?php echo $stt ?></td>
                                  <td><?php echo $item['name'] ?></td>
                                  <td><a href="hienthi.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-default' ?>">
                                    <?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không' ?></a></td>
                                  <td>
                                    <a class="btn btn-xs btn-info" href="sua.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
                                    <a class="btn btn-xs btn-danger" href="xoa.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
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