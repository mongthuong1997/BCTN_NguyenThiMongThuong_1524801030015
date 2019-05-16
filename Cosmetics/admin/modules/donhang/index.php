
<?php require_once __DIR__."/../../autoload/autoload.php"; 
$open = "transaction";

  if(isset($_GET['page']))
  {
    $p = $_GET['page'];
  }else
  {
    $p = 1;
  }


  $sql = "SELECT transaction.*, user.name as nameuser, user.phone as phone from transaction LEFT JOIN user ON user.id = transaction.user_id order by id DESC ";
  $transaction = $db->fetchJone('transaction',$sql,$p,10,true);
  if(isset($transaction['page']))
  {
    $sotrang = $transaction['page'];
    unset($transaction['page']);
  }


?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

    <div class="inner-block">
    <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Danh sách đơn hàng
                                  <?php require_once __DIR__."/../../../partials/notification.php"; ?>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>STT</th>
                                      <th>Tên khách hàng</th>
                                      <th>Số điện thoại</th>
                                      <th>Trạng thái</th>
                                      <th>Lệnh</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php $stt = 1; foreach ($transaction as $item): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['nameuser'] ?></td>
                                    <td><?php echo $item['phone'] ?></td>
                                    <td>
                                      <a href="trangthai.php?id=<?php echo $item['id'] ?>" class="btn btn-info <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                                    </td>
                                    <td>
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
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
<?php require_once __DIR__."/../../layouts/footer.php"; ?>