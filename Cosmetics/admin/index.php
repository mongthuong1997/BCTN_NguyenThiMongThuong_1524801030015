
<?php 
require_once __DIR__."/autoload/autoload.php"; 


$kh = $db->fetchAll("user");

$tongdk = count($kh);
?>
<?php require_once __DIR__."/layouts/header.php"; ?>

  <div class="inner-block">
    <div class="blank">
      <h2>Trang admin</h2>
      <div class="market-updates">
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-1">
          <div class="col-md-8 market-update-left">
            <h3><?php echo $tongdk ?></h3>
            <h4>Registered User</h4>
            <p>Other hand, we denounce</p>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-file-text-o"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-2">
         <div class="col-md-8 market-update-left">
          <h3>135</h3>
          <h4>Daily Visitors</h4>
          <p>Other hand, we denounce</p>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-eye"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
      <div class="col-md-4 market-update-gd">
        <div class="market-update-block clr-block-3">
          <div class="col-md-8 market-update-left">
            <h3>23</h3>
            <h4>New Messages</h4>
            <p>Other hand, we denounce</p>
          </div>
          <div class="col-md-4 market-update-right">
            <i class="fa fa-envelope-o"> </i>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
       <div class="clearfix"> </div>
  </div>
      <div class="blankpage-main">

      </div>
    </div>
</div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
<?php require_once __DIR__."/layouts/footer.php"; ?>