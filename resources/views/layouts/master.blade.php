<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Portfolio Work</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{url('theme/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{url('theme/css/icomoon.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{url('theme/css/bootstrap.css')}}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{url('theme/css/flexslider.css')}}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{url('theme/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{url('theme/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

    @include('theme.header_footer')
    @yield('content')
	<!-- jQuery -->
	<script src="{{url('theme/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{url('theme/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{url('theme/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{url('theme/js/jquery.waypoints.min.js')}}"></script>
	<!-- Flexslider -->
	<script src="{{url('theme/js/jquery.flexslider-min.js')}}"></script>
	<!-- Sticky Kit -->
	<script src="{{url('theme/js/sticky-kit.min.js')}}"></script>
	
	
	<!-- MAIN JS -->
	<script src="{{url('theme/js/main.js')}}"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dff1f0a00a9a4c0"></script>
	</body>
</html>

