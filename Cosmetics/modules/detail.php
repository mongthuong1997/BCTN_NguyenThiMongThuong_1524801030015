<?php require_once __DIR__."/../autoload/autoload.php"; ?>
<?php 
	$id = intval(getInput('id'));
	$product = $db->fetchID("product",$id);
    if(empty($product)){
        echo "<script>alert('Dữ liệu không tồn tại');location.href='index.php'</script>";
      }
	$cateid = intval($product['catalog_id']);
	$sql = "SELECT * FROM product WHERE id != $id && catalog_id = $cateid ";
	$sanphamlienquan = $db->fetchsql($sql);

?>
<?php require_once __DIR__."/../layouts/header.php"; ?>
<div class="product-main">
     <div class="container">
         <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Single</li>
         </ol>
         <div class="ctnt-bar cntnt">
             <div class="content-bar">
                 <div class="single-page">                   
                     <!--Include the Etalage files-->
                        <link rel="stylesheet" href="../public/fe/css/etalage.css">
                        <script src="../public/fe/js/jquery.etalage.min.js"></script>
                     <!-- Include the Etalage files -->
                     <script>
                            jQuery(document).ready(function($){
                    
                                $('#etalage').etalage({
                                    thumb_image_width: 300,
                                    thumb_image_height: 400,
                                    source_image_width: 700,
                                    source_image_height: 800,
                                    show_hint: true,
                                    click_callback: function(image_anchor, instance_id){
                                        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                                    }
                                });
                                // This is for the dropdown list example:
                                $('.dropdownlist').change(function(){
                                    etalage_show( $(this).find('option:selected').attr('class') );
                                });
                    
                            });
                        </script>
                        <!--//details-product-slider-->
                     <div class="details-left-slider">
                          <ul id="etalage">
                             <li>
                                <a href="optionallink.html">
                                <img class="etalage_thumb_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                                <img class="etalage_source_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                                </a>
                             </li>
                             <li>
                                <img class="etalage_thumb_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                                <img class="etalage_source_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>"/>
                             </li>
                             <li>
                                <img class="etalage_thumb_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                                <img class="etalage_source_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                             </li>
                             <li>
                                <img class="etalage_thumb_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                                <img class="etalage_source_image" src="<?php echo uploads()?>product/<?php echo $product['image_link']?>" />
                             </li>
                             <div class="clearfix"></div>
                         </ul>
                     </div>
                     <div class="details-left-info">
                            <h3><?php echo $product['name'] ?></h3>                      
                            <p><?php echo number_format($product['price']) ?></p>
                            <p class="qty">Số lượng :</p><input min="1" type="number" id="quantity" name="quantity" value="1" class="form-control input-small">
                            <div class="btn_form">
                                <a href="addcart.php?id=<?php echo $product['id'] ?>">thêm vào giỏ hàng</a>
                            </div>
                            <h5>mô tả:</h5>
                            <p class="desc"><?php echo $product['content'] ?></p>
                     </div>
                     <div class="clearfix"></div>                   
                 </div>
             </div>
         </div>      
         <div class="clearfix"></div>
         <div class="single-bottom2">
             <h6>Sản phẩm liên quan</h6>
                <?php foreach($sanphamlienquan as $item) : ?>
                    <div class="rltd-posts">
                     <div class="col-md-3 pst1">
                         <img src="<?php echo uploads()?>product/<?php echo $item['image_link']?>" alt=""/>
                         <h4><a href="detail.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a></h4>
                         <a class="pst-crt" href="cart.html">Thêm vào giỏ hàng</a>
                     </div>
                     <div class="clearfix"></div>
                </div>
                <?php endforeach ?>
         </div> 
     </div>
</div>
<?php require_once __DIR__."/../layouts/footer.php"; ?>