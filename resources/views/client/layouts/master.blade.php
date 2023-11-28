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

</body>

</html>