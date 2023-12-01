<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    @yield('title')
    <link href="{{ asset("/fontend/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/fontend/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/fontend/css/prettyPhoto.css") }}" rel="stylesheet">
    <link href="{{ asset("/fontend/css/price-range.css") }}" rel="stylesheet">
    <link href="{{ asset("/fontend/css/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("/fontend/css/main.css") }}" rel="stylesheet">
    <link href="{{ asset("/fontend/css/sweetalert.css") }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    @include('client.components.header')

    @yield('content')
    @include('client.components.footer')
    <script src="{{ asset("/fontend/js/jquery.js") }}"></script>
    <script src="{{ asset("/fontend/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("/fontend/js/jquery.scrollUp.min.js") }}"></script>
    <script src="{{ asset("/fontend/js/price-range.js") }}"></script>
    <script src="{{ asset("/fontend/js/jquery.prettyPhoto.js") }}"></script>
    <script src="{{ asset("/fontend/js/main.js") }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset("/fontend/js/delete.js") }}"></script>

    @yield('js')
    <script>
    function actionWishlist(event) {
        event.preventDefault();
        let urlRequest = $(this).data('url');
        let that = $(this);

        $.ajax({
            type: 'GET',
            url: urlRequest,
            success: function(data) {
                if (data.code == 200) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Yeu thich thanh cong",
                        showConfirmButton: false,
                        timer: 1500
                    });

                }
            },
		error:function(data){
            Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "San pham da them vao yeu thich tu truoc",
});
		}

        });

    }
    $(function() {
        $(document).on('click', '.action_wishlist', actionWishlist);
    });

    $(document).ready(function(){
        $('.add-to-cart').click(function(event){
            event.preventDefault();
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: '{{url('/add-cart-ajax')}}',
                method: 'POST',
                data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},

                success:function(data){
                    Swal.fire({
                        title: "Đã thêm sản phẩm vào giỏ hàng",
                        text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        showCancelButton: true,
                        cancelButtonText: "Xem tiếp",
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Đi đến giỏ hàng",
                        closeOnConfirm: false

                        },
                        function() {
                            window.location.href = "{{url('/gio-hang')}}";
                        }
                    );
                }
            });
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $('#sort').on('change',function(){
            var url = $(this).val();
            //alert(url);
            if(url){
                window.location = url;
            }
            return false;
        });
    });
</script>
<script>
        function remove_background(product_id){
            for (var count = 1; count <= 5 ; count++) {
                 $('#'+product_id+'-'+count).css('color','#ccc');
             }
        }
        //hover danh gia
        $(document).on('mouseenter','.rating', function(){
            var index = $(this).data("index");
           var product_id = $(this).data('product_id');

             remove_background(product_id);
             for (var count = 1; count <= index ; count++) {
                 $('#'+product_id+'-'+count).css('color','#ffcc00');
             }
        });
      //  nha chuot k danh gia
        $(document).on('mouseleave','.rating', function(){
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var rating = $(this).data("rating");
            remove_background(product_id);

             for (var count = 1; count <= rating ; count++) {
                 $('#'+product_id+'-'+count).css('color','#ffcc00');
             }
        });
        //click danh gia sao

        // $(document).on('click','.rating',function(){
        //     var index = $(this).data("index");
        //     var product_id = $(this).data('product_id');
        //     var _token = $('input[name="_token"]').val();

        //     $.ajax({
        //         url:'{{url('/insert-rating')}}',
        //         method:'POST',
        //         data:{index:index, product_id:product_id, _token:_token},
        //         success:function(data){
        //             if(data == 'done'){
        //                 alert("Ban da danh gia"+index+"tren 5");
        //             }else{
        //                 alert("danh gia loi");
        //             }
        //         }
        //     });
        // });

        $(document).ready(function(){
        $('.rating').click(function(event){
            event.preventDefault();
        let urlRequest = $(this).data('url');
        var index = $(this).data("index");

            $.ajax({
                url:urlRequest,
                method:'GET',
                success: function(data) {
                if (data.code == 200) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Bạn đã đánh giá "+index+" trên 5",
                        showConfirmButton: false,
                        timer: 1500
                    });

                }
            }
            });
        });
    });
    </script>
</body>

</html>
