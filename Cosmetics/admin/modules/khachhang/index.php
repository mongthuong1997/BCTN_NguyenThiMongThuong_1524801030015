
<?php require_once __DIR__."/../../autoload/autoload.php"; 
$open = "customer";

  if(isset($_GET['page']))
  {
    $p = $_GET['page'];
  }else
  {
    $p = 1;
  }


$sql = "SELECT * FROM user";

  $user = $db->fetchJone('user',$sql,$p,4,true);
  if(isset($user['page']))
  {
    $sotrang = $user['page'];
    unset($user['page']);
  }


?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

<div class="inner-block">
    <?php require_once __DIR__."/../../../partials/notification.php"; ?>
    <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Danh sách khách hàng 
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>STT</th>
                                      <th>Tên</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Adress</th>
                                  </tr>
                              </thead>
                              <tbody>
                                 <?php $stt = 1; foreach ($user as $item): ?>
                                  <tr>
                                      <td><?php echo $stt ?></td>
                                      <td><?php echo $item['name'] ?></td>
                                      <td><?php echo $item['email'] ?></td>
                                      <td><?php echo $item['phone'] ?></td>
                                      <td><?php echo $item['address'] ?></td>
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