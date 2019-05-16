<div class="fotter-logo">
     <div class="container">
     <div class="ftr-logo"><h3><a href="index.html">CHẤT LƯỢNG CHO TẤT CẢ</a></h3></div>
     <div class="ftr-info">
     <p>&copy; 2019 - Shop mỹ phẩm online BBT.MON Allright Reserved 
        <a href="mongthuong1997@gmail.com">Email: mongthuong1997@gmail.com</a> </p>
    
    </div>
     <div class="clearfix"></div>
     </div>
</div>
<!--fotter//-->
<script type="text/javascript">
        $(function(){
            $updatecart = $(".updatecart");
            $updatecart.click(function(e){
                 e.preventDefault;
                 $qty = $(this).parents("div").find("#qty").val();

                 $key = $(this).attr("data-key");
                 $.ajax({
                    url: 'updatecart.php',
                    type: 'GET',
                    data: {'qty':$qty,'key' :$key},
                    success: function(data)
                    {
                        if(data==1)
                        {
                            alert("Cập nhật giỏ hàng thành công");
                            location.href='cart.php';
                        }
                    }
                 });           
            })

        })
    </script>
</body>
</html>