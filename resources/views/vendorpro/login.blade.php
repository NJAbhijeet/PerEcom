<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="" name="description">
		<meta content="" name="author">
		<meta name="keywords" content=""/>

		<!-- Title -->
		<title>Fruitables</title>

		<!--Favicon -->
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/images/logo/logo1.jpg')}}">


		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

		<!--Style css-->
		<link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">

		<!--Icons css-->
		<link rel="stylesheet" href="{{asset('admin/assets/css/icons.css')}}">

		<!-- P-Scrollbar css-->
		<link rel="stylesheet" href="{{asset('admin/assets/plugins/p-scroll/p-scroll.css')}}">

		<!--Sidemenu css-->
		<link rel="stylesheet" href="{{asset('admin/assets/plugins/sidemenu/sidemenu-1/sidemenu-1.css')}}">

		<!-- Sidemenu-responsive-tabs  css -->
		<link href="{{asset('admin/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">

		<!-- Siderbar css-->
		<link href="{{asset('admin/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- Color-skins css -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('admin/assets/colors/color-skins/color.css')}}" />

        <style>
            .highlight-text {
                color: #c03385;
            }
        </style>
	</head>

	<body class="bg-primary">

	    <!--app open-->
		<div id="app" class="page">
			<div class="page-content">
				<div class="container">
					<!--single-page open-->
					<div class="single-page">
						<div class="wrapper wrapper2">
							<form id="login" class="card-body" tabindex="500"  method="POST" action="{{route('vendor-login')}}">
								@csrf
                                <h3 class="text-dark text-center mb-4">
                                    <span class="highlight-text">Fruitables</span>
                                    <br> Vendor Login
                                </h3>
                                @if(Session::has('error'))<span class="text-danger">{{Session::get('error') }}</span>@endif

								<div class="mail">
									<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
								</div>
								<div class="passwd">
									<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
								</div>

								<div class="submit">
									<button type="submit" class="btn btn-primary btn-block">Login</button>
								</div>

							</form>

						</div>
					</div>
					<!--single-page closed-->
				</div>
			</div>
		</div>
		<!--app closed-->

		<!--Jquery.min js-->
		<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>

		<!--popper js-->
		<script src="{{asset('admin/assets/js/popper.js')}}"></script>

		<!--Bootstrap.min js-->
		<script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Tooltip js-->
		<script src="{{asset('admin/assets/js/tooltip.js')}}"></script>

		<!-- Jquery star rating-->
		<script src="{{asset('admin/assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Moment js-->
		<script src="{{asset('admin/assets/js/moment.min.js')}}"></script>

		<!--Sidemenu js-->
		<script src="{{asset('admin/assets/plugins/sidemenu/sidemenu-1/sidemenu-1.js')}}"></script>

		<!-- Sidemenu-responsive-tabs  js -->
		<script src="{{asset('admin/assets/plugins/sidemenu-responsive-tabs/js/sidemenu-responsive-tabs.js')}}"></script>

		<!-- Sidebar js-->
		<script src="{{asset('admin/assets/plugins/sidebar/sidebar.js')}}"></script>

		<!--P-Scrollbar js-->
		<script src="{{asset('admin/assets/plugins/p-scroll/p-scroll.js')}}"></script>
		<script src="{{asset('admin/assets/js/p-scroll.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('admin/assets/plugins/othercharts/jquery.knob.js')}}"></script>
		<script src="{{asset('admin/assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!--OtherCharts js-->
		<script src="{{asset('admin/assets/js/othercharts.js')}}"></script>

		<!--Showmore js-->
		<script src="{{asset('admin/assets/js/jquery.showmore.js')}}"></script>

		<!--Scripts js-->
		<script src="{{asset('admin/assets/js/scripts1.js')}}"></script>
	</body>
</html>
