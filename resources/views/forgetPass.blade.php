<!DOCTYPE html>
<head>
<title>Login-Customer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{ asset("/backend/css/style.css") }}" rel='stylesheet' type='text/css' />
<link href="{{ asset("/backend/css/style-responsive.css") }}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{ asset("/backend/css/font.css") }}" type="text/css"/>
<link href="{{ asset("/backend/css/font-awesome.css") }}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>Lấy lại mật khẩu</h2>
    <?php
    $message = Session::get('message');
    if ($message){
        echo '<span class="text-alert">'. $message .'</span>';
        session()->put('message', null);
    }
    ?>
    <p>Nhập email mà bạn đã đăng ký tài khoản trong hệ thống của chúng tôi</p>
		<form action="{{ URL::to('/postForgetPass') }}" method="POST">
            {{ csrf_field() }}
			<input type="email" class="ggg" name="customer_email" placeholder="Nhập email" required="">
				<div class="clearfix"></div>
				<input type="submit" value="Gửi mail xác nhận" name="login">
		</form>
</div>
</div>
<script src="{{ asset("/backend/js/bootstrap.js") }}"></script>
<script src="{{ asset("/backend/js/jquery.dcjqaccordion.2.7.js") }}"></script>
<script src="{{ asset("/backend/js/scripts.js") }}"></script>
<script src="{{ asset("/backend/js/jquery.slimscroll.js") }}"></script>
<script src="{{ asset("/backend/js/jquery.nicescroll.js") }}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
