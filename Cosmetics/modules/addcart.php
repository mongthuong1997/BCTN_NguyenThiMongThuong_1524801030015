<?php 
require_once __DIR__."/../autoload/autoload.php";

 if( !isset($_SESSION['name_id']))
    {
        echo "<script>alert('Bạn phải đăng nhập để thực hiện chức năng này');location.href='index.php'</script>";
    }else
    {
         $id = intval(getInput('id'));
        $product =$db->fetchID("product",$id);

        if( !isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['image_link'] = $product['image_link'];
            $_SESSION['cart'][$id]['price'] = $product['price'];
            $_SESSION['cart'][$id]['qty'] = 1;
        }
        else
        {
            $_SESSION['cart'][$id]['qty'] += 1;
        }

    
        echo "<script>alert('Đã thêm vào giỏ hàng');location.href='index.php'</script>";
    }
?>