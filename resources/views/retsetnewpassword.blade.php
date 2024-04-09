<!DOCTYPE html>

<head>
    <title>Login-Customer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset("/backend/css/style.css") }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset("/backend/css/style-responsive.css") }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset("/backend/css/font.css") }}" type="text/css" />
    <link href="{{ asset("/backend/css/font-awesome.css") }}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    <style>
form {
    width: 300px; /* Độ rộng của form */
    margin: auto; /* Canh giữa form */
}

.form-group {
    margin-bottom: 10px; /* Khoảng cách giữa các thành phần trong form */
}

label {
    display: block; /* Hiển thị nhãn dưới dạng block để canh lề trái */
}

input[type="password"] {
    width: 100%; /* Độ rộng của input */
    padding: 10px; /* Độ dày của padding */
    border: 1px solid #ccc; /* Độ dày và màu sắc của viền */
    border-radius: 5px; /* Độ cong của góc */
}

button[type="submit"] {
    width: 100%; /* Độ rộng của nút */
    padding: 10px; /* Độ dày của padding */
    background-color: #007bff; /* Màu nền của nút */
    color: #fff; /* Màu chữ của nút */
    border: none; /* Loại bỏ viền */
    border-radius: 5px; /* Độ cong của góc */
    cursor: pointer; /* Đổi con trỏ thành dấu nhấp chuột khi di chuột vào nút */
}

button[type="submit"]:hover {
    background-color: #0056b3; /* Màu nền của nút khi di chuột vào */
}

    </style>
</head>

<body>
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Nhập mật khẩu mới </h2>
            <?php
    $message = Session::get('message');
    if ($message){
        echo '<span class="text-alert">'. $message .'</span>';
        session()->put('message', null);
    }
    ?>
            <form role="form" action="{{route('change-newpassword')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group" style="position: relative;">
                <input type="hidden" name="cus_email" value="{{$email}}">
                    <div class="form-group">
                        <label for="new_password">Mật khẩu mới: </label>   
                        <input type="password" class="form-control" name="new_password" placeholder="********" value=""
                            require>
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation">Nhập lại mật khẩu: </label>
                        <input type="password" class="form-control" name="new_password_confirmation"
                            placeholder="********" value="" require>
                    </div>
                </div>
                <button type="submit" name="update_category_product" class="btn btn-info">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
    <script>
    document.getElementById('otpForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn chặn việc gửi form đi mặc định
        // Lấy giá trị của OTP nhập vào và của $securityCode từ HTML
        var otpEntered = document.getElementById('otpInput').value;
        var securityCode = document.getElementById('securityCode').innerText;
        var email = document.getElementById('email').value;
        // So sánh OTP nhập vào với $securityCode
        if (otpEntered === securityCode) {
            window.location.href = '/retsetnewpassword?email=' + email;
        } else {
            // Nếu không trùng khớp, hiển thị thông báo lỗi
            alert('OTP không chính xác. Vui lòng thử lại.');
        }
    });
    </script>
    <script src="{{ asset("/backend/js/bootstrap.js") }}"></script>
    <script src="{{ asset("/backend/js/jquery.dcjqaccordion.2.7.js") }}"></script>
    <script src="{{ asset("/backend/js/scripts.js") }}"></script>
    <script src="{{ asset("/backend/js/jquery.slimscroll.js") }}"></script>
    <script src="{{ asset("/backend/js/jquery.nicescroll.js") }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="js/jquery.scrollTo.js"></script>
</body>

</html>