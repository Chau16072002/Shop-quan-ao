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
    <link href='//cdn.leanhduc.pro.vn/blogger/codeprovn/template-median/recent-comment/style.css' rel='stylesheet'
        type='text/css' />

    <script type="text/javascript" src="//cdn.leanhduc.pro.vn/blogger/codeprovn/template-median/recent-comment/main.js">
    </script>

    <script type="text/javascript"
        src="//cdn.leanhduc.pro.vn/blogger/codeprovn/template-median/recent-comment/total-comments.js"></script>

    <script type="text/javascript" src="/feeds/comments/default?alt=json&amp;callback=idbcomments&amp;max-results=5">
    </script>
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
            error: function(data) {
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

    // $(document).ready(function() {
    //     $('.add-to-cart').click(function(event) {
    //         event.preventDefault();
    //         var id = $(this).data('id_product');
    //         var cart_product_id = $('.cart_product_id_' + id).val();
    //         var cart_product_name = $('.cart_product_name_' + id).val();
    //         var cart_product_image = $('.cart_product_image_' + id).val();
    //         var cart_product_price = $('.cart_product_price_' + id).val();
    //         var cart_product_qty = $('.cart_product_qty_' + id).val();
    //         var _token = $('input[name="_token"]').val();

    //         $.ajax({
    //             url: '{{url(' / add - cart - ajax ')}}',
    //             method: 'POST',
    //             data: {
    //                 cart_product_id: cart_product_id,
    //                 cart_product_name: cart_product_name,
    //                 cart_product_image: cart_product_image,
    //                 cart_product_price: cart_product_price,
    //                 cart_product_qty: cart_product_qty,
    //                 _token: _token
    //             },

    //             success: function(data) {
    //                 Swal.fire({
    //                         title: "Đã thêm sản phẩm vào giỏ hàng",
    //                         text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
    //                         showCancelButton: true,
    //                         cancelButtonText: "Xem tiếp",
    //                         confirmButtonClass: "btn-success",
    //                         confirmButtonText: "Đi đến giỏ hàng",
    //                         closeOnConfirm: false

    //                     },
    //                     function() {
    //                         window.location.href = "{{url('/gio-hang')}}";
    //                     }
    //                 );
    //             }
    //         });
    //     });
    // });
    </script>
    <script>
    $(document).ready(function() {
        $('#sort').on('change', function() {
            var url = $(this).val();
            //alert(url);
            if (url) {
                window.location = url;
            }
            return false;
        });
    });
    </script>
    <script>
    function remove_background(product_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + product_id + '-' + count).css('color', '#ccc');
        }
    }
    //hover danh gia
    $(document).on('mouseenter', '.rating', function() {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');

        remove_background(product_id);
        for (var count = 1; count <= index; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });
    //  nha chuot k danh gia
    $(document).on('mouseleave', '.rating', function() {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var rating = $(this).data("rating");
        remove_background(product_id);

        for (var count = 1; count <= rating; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });
    //click danh gia sao

    $(document).ready(function() {
        $('.rating').click(function(event) {
            event.preventDefault();
            let urlRequest = $(this).data('url');
            var index = $(this).data("index");

            $.ajax({
                url: urlRequest,
                method: 'GET',
                success: function(data) {
                    if (data.code == 200) {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "Bạn đã đánh giá " + index + " trên 5",
                            showConfirmButton: false,
                            timer: 1500
                        });

                    }
                }
            });
        });
    });

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
            error: function(data) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "San pham da them vao yeu thich tu truoc",
                });
            }

        });

    }
    let _csrf = '{{ csrf_token() }}';
    $('#btn-comment').click(function(ev) {
        ev.preventDefault();
        let content = $('#comment-content').val();
        let productid = $('#productid').val();
        let _commentUrl = "{{route('comment.add')}}";
        console.log(_commentUrl);
        $.ajax({
            url: _commentUrl,
            method: 'POST',
            data: {
                content: content,
                productid: productid,
                _token: _csrf
            },
            success: function(response) {
                if (response.success) {
                    $('#comment-content').val('');
                    location.reload();
                } else {
                    window.location.href = '/dang-nhap';
                }
            }
        });
    })
    $(document).ready(function() {
        $('.delete-comment').click(function(event) {
            event.preventDefault();
            var commentId = $(this).data('comment-id');
            $.ajax({
                url: '/comments/' + commentId,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    //Xóa bình luận khỏi giao diện người dùng
                    alert('Comment deleted successfully');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    //console.error(xhr.responseText);
                    alert('Error deleting comment');
                }
            });
        });
    });
    $(document).ready(function() {
        $('.edit-comment').click(function() {
            var commentId = $(this).data('comment-id');
            if ($('#edit-form-' + commentId).is(":visible")) {
                // Nếu đang hiển thị, ẩn thẻ đi
                $('#edit-form-' + commentId).hide();
                $('#comment-content-' + commentId).show();
            } else {
                // Nếu không hiển thị, hiển thị thẻ lên
                $('#edit-form-' + commentId).show();
                $('#comment-content-' + commentId).hide();
            }
        });
        $('.save-edit').click(function() {
            var commentId = $(this).data('comment-id');
            var editedComment = $('#edited-comment-' + commentId).val();
            $.ajax({
                url: '/commentts/' + commentId,
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    content: editedComment
                },
                success: function(response) {
                    $('#comment-content-' + commentId).text(editedComment).show();
                    $('#edit-form-' + commentId).hide();
                    alert('Comment edited successfully');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error editing comment');
                }
            });
        });
    });
    $('.add-to-cart').click(function(ev) {
        ev.preventDefault();
        var $parent = $(this).closest('form');
        var productid = $parent.find('.product_id').val();
        var productPrice = $parent.find('.product_price').val();
        console.log(productPrice);
        console.log(productid);
        let _commentUrl = "{{route('cart.add')}}";
        console.log(_commentUrl);
        $.ajax({
            url: _commentUrl,
            method: 'POST',
            data: {
                productid: productid,
                productPrice: productPrice,
                _token: _csrf
            },
            success: function(response) {
                if (response.success) {
                    alert('Add cart successfully');
                } else {
                    window.location.href = '/dang-nhap';
                }
            }
        });
    })

    function updateQuantity(cartItemId, change) {
        var quantityInput = document.getElementById('quantity_' + cartItemId);
        var currentValue = parseInt(quantityInput.value);
        var newQuantity = currentValue + change;
        if (newQuantity < 1) {
            return; // Đảm bảo số lượng không nhỏ hơn 1
        }
        quantityInput.value = newQuantity;
        //console.log(cartItemId);
        // Gửi yêu cầu AJAX để cập nhật dữ liệu
        var url = '/update_quantity'; // Đường dẫn đến route cập nhật số lượng sản phẩm
        var data = {
            cart_item_id: cartItemId,
            quantity: newQuantity,
            _token: _csrf
        };
        $.post(url, data, function(response) {
            if (!response.success) {
                alert('Sản phẩm không tồn tại vui lòng thử lại')
                location.reload();
            }
            var total = response.total
            let tong = document.getElementById('totalPrice');
            tong.innerHTML = "Tổng tiền: "+total;
        });
    }
    $('.delete_form_cart').click(function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
        var productId = $(this).data('product-id');
        $.ajax({
            url: '/cart/delete/' + productId, // Đường dẫn đến route xử lý yêu cầu xóa
            type: 'GET',
            _token: _csrf,
            success: function(response) {
                //Xóa bình luận khỏi giao diện người dùng
                location.reload();
            },
            error: function(xhr, status, error) {
                //console.error(xhr.responseText);
                alert('Error deleting cart');
                location.reload();
            }
        });
    });
    </script>
</body>

</html>