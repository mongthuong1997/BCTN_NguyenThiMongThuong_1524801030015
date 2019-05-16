<?php require_once __DIR__."/../autoload/autoload.php";
   

   $id = intval(getInput('id'));
   $editcategory = $db->fetchID("catalog",$id);

   if(isset($_GET['p']))
	{
	    $p = $_GET['p'];
	}else
	{
	    $p = 1;
	}


   $sql = "SELECT * FROM product WHERE catalog_id = $id";

   $total = count($db->fetchsql($sql));
   $product = $db->fetchJones("product",$sql,$total,$p,4,true);
	$sotrang = $product['page'];
	unset($product['page']);

	$path = $_SERVER['SCRIPT_NAME'];

 ?>

  <?php require_once __DIR__."/../layouts/header.php"; ?>
<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li class="active">Danh mục</li>
		 </ol>
			<h2>Danh sách sản phẩm</h2>			
		 <div class="col-md-9 product-model-sec">
		 	<?php foreach($product as $item) : ?>      
					 <a href="detail.php?id=<?php echo $item['id'] ?>"><div class="product-grid love-grid">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="<?php echo uploads() ?>product/<?php echo $item['image_link'] ?>" class="img-responsive" alt=""/>
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button class="btns">Đặt ngay</button>
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name" style="height: 200px;">
								<h4><?php echo $item['name']; ?></h4>
								<span class="item_price"><?php echo number_format($item['price']) ?></span>
								<input type="button" class="item_add items" value="ADD" onclick="location.href='addcart.php?id=<?php echo $item['id'] ?>'">
							</div>			
			 										
							<div class="clearfix"> </div>
						</div>

					</div>	
	<?php endforeach; ?>   
					<nav class="text-center" style="position: relative;width: 100px;">
					            <ul class="pagination">
					              <?php for ($i=1; $i <= $sotrang; $i++) : ?>
					                <li class="page-link"><a href="<?php $path ?>?p=<?php echo $i ?>"><?php echo $i ?></a></li>
					              <?php endfor ?>
					            </ul>
					          </nav>
			</div>

			<div class="rsidebar span_1_of_left">
				 <section  class="sky-form">
					 <div class="product_right">
						 <h3 class="m_2">Danh mục</h3>
						 <?php foreach($danhmuc as $dm) : ?>
						 <div class="tab1">
							 <ul class="place">								
								 <a href="danhmuc.php?id=<?php echo $dm['id'] ?>"><li class="sort"><?php echo $dm['name'] ?></li></a>
								 <li class="by"><img src="../public/fe/images/do.png" alt=""></li>
									<div class="clearfix"> </div>
							  </ul>
					      </div>						  
						  <?php endforeach; ?>
				  
						
				
			 </div>			 
			 <div class="clearfix"></div>

		</div>
</div>	

 <?php require_once __DIR__."/../layouts/footer.php"; ?>