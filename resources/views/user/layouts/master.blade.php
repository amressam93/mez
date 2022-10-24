<!doctype html>
<html class="no-js" lang="ar">


@php
    $setting = App\Models\Setting::first();
@endphp

<head>

	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Donan | @yield('sub_title') </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon
		============================================ -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets')}}/images/favicon.webp">

	<!-- google fonts here -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<!-- CSS
	============================================ -->

	<!-- Icon Font CSS -->
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/font-awesome.min.css">

	<!-- Plugins CSS -->
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/bootstrap.min.css">

	<!-- Rtl -->
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/bootstrap.rtl.min.css">


	<link rel="stylesheet" href="{{asset('user/assets')}}/css/animate.css">
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/jquery-ui.min.css">
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{asset('user/assets')}}/lib/css/nivo-slider.css">

	<!-- Main Style CSS -->
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/style.css">
	<link rel="stylesheet" href="{{asset('user/assets')}}/css/responsive.css">

	<link rel="stylesheet" type="text/css" href="{{asset('user/slick')}}/slick.css"/>

	<link rel="stylesheet" type="text/css" href="{{asset('user/slick')}}/slick-theme.css"/>

    <link href="{{ asset('files/bootstrap-sweetalert') }}/sweetalert.css" rel="stylesheet" >

	<style>



		.top_ul_1 li a:after {
			display: none;
		}

		#link-item1 , #link-item2 , #link-item3 {
			width: 100%;
			background: #FFF;
		}

		#link-item1 a , #link-item2 a  , #link-item3 a {
			color: #000;
		}

		.active_link {
			display: block;
		}

		.un_active_link {
			display: none;
		}

		/*
		.row {
			padding-left: 30px;
			padding-right: 30px;
		}
		*/

		.slider {
			margin-top: 0;
		}

		.header-top-left ul li ul {
			width: 160px;
		}

		.carousel-item {
			float: left !important;
			margin-left: auto !important;
			margin-right: -100% !important;
		}

		.carousel-control-prev {
			right: 85% !important;
		}

		.carousel-control-prev i ,
		.carousel-control-next i {
			font-size: 25px;
		}

		.header-mid-area .title-upper {
			line-height: 1.8;
			font-size: 13px;
		}

		.padding_section {
		  padding-right:2%;
		}

		.padding_section .custom_breadcrumb {
		        margin-right: 1%;
		        padding-right: 0;
		}

		body { direction:rtl !important;text-align:right !important; }

		@font-face{font-family:DroidArabicKufiBold;src:url({{asset('user/arabic_font')}}/DroidArabicKufiBold.ttf) format('truetype');font-weight:700;font-style:normal;font-display: swap;}@font-face{font-family:DroidArabicKufiRegular;src:url({{asset('user/arabic_font')}}/DroidArabicKufiRegular.ttf) format('truetype');font-weight:400;font-style:normal; font-display: swap;}@font-face{font-family:'Droid Arabic Kufi';src:url({{asset('user/arabic_font')}}/DroidArabicKufiBold.ttf) format('truetype');font-weight:700;font-style:normal; font-display: swap;}@font-face{font-family:'Droid Arabic Kufi';src:url({{asset('user/arabic_font')}}/DroidArabicKufiRegular.ttf) format('truetype');font-weight:400;font-style:normal; font-display: swap;}body{direction:rtl;text-align:right}

		a,body,h1,h2,h3,h4,h5,h6,html,li,p {
			font-family:'DroidArabicKufiRegular',sans-serif!important;
		}

        .shop-area .tab-content .single-product {
            border: 1px solid #DDD
        }

        /*
        .shop-area {
            padding-top: 5%;
        }
        */

		.owl-prev {
			transform: rotate(180deg);
		}

		.owl-next {
			transform: rotate(-180deg);
		}

		.home3 .header-bottom-area , .fixed-top {
			background: rgb(247, 248, 247);
		}

		.active_link_item {
			background: #FFF;
		}

		.link_item:hover {
			background: #FFF;
		}

		.mainmenu .link_item_li  {
			/*height: 55px;*/
		}

		.link_item_ul {
			position: absolute !important;
			width: 100% !important;
			right: 0 !important;
		}

		.active_link_item_ul {
			opacity: 1 !important;
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)" !important;
			-webkit-transform: scaleY(1) !important;
			transform: scaleY(1) !important;
		}

		.header-top-area {
			background: #3c3c3c !important;
		}

		.header-top-area a , .header-top-left ul li a{
			color: #fff;
		}

		.mainmenu ul li > ul {
			background: #FFF !important;
		}

		.home3 .header-bottom-area .mainmenu ul li ul li a {
			color: #616161 !important;
		}

		.mainmenu ul li ul li a {
			padding: 15px 10px !important;
		}

		.link_item_ul {
			width: 100%;
			/*
			padding-left: 9%;
			padding-right: 9%
			*/
			padding-left: 2%;
			padding-right: 2%
		}

		.home3 .header-bottom-area .mainmenu ul li ul li a:hover {
			color: #303AB2 !important;
			font-weight: bold;
		}

		.header-mid-inner-icon {
			float: none !important;
			margin:auto !important;
		}

		.header-mid-info {
			text-align: center;
		}

		.fixed-top {
			position: fixed !important;
		}

		 .header-top-left li ul li a {
			color: #666a6e;
		}

		.banner_box2_image img {
			height: 70vh;
		}

		.header-search-box .search-box input {
			height: 35px;
		}

		.header-search-box .search-box button  {
			height: 36px;
            line-height: 36px;
			width: 35px;
			font-size: 14px;
		}

        .header-search-box .search-box button {
            top: 14%
        }

		.mainmenu ul li > ul {
			-webkit-transition: all 0.0s ease 0s !important;
			transition: all 0.0s ease 0s !important;
		}

		body {
			background: #FFF !important;
		}

		.section-title {
			border-bottom: 0;
		}

        .product-price {
            margin-bottom: 0;
        }

        .product-price h2 {
            margin-bottom: 0px;
        }

        .custom_col5 {
            width: 38% !important;
            padding-left: 0;
        }

        .custom_col7 {
            width: 62% !important;
            padding-left: 0;
            padding-right: 0;
        }

        .main_color ,
        .home3 .header-bottom-area .mainmenu ul li ul li a,
        .header-mid-area .title-upper ,
        .section-title h2,
        .single-product .product-content h5.product-name a,
        .product-price h2 del ,
        h2, .breadcrumb-item a,
        .product-details .single-product .product-content h1,
        .breadcrumb-item.active,
        .calc-review span , .calc-review i ,
        .properties_div ,
        .nav-tabs .nav-link,
        .media-list b,
        .product-details .single-product .product-content p,
        .product-details label,
        .color-list-container h5,
        .size select,
        .select2-container--default .select2-search--inline .select2-search__field,
        textarea , .editor_div p ,
        .product-content p,
        .product-name a {
            color:#000 !important
        }

        select ,
        .select2-container--default .select2-selection--multiple ,
        .select2-container--default .select2-selection--single
         {
            border-color: #000 !important
        }

        .form-control {
            border: 1px solid#000 !important
        }

        ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            color:#000 !important
        }
        ::-moz-placeholder {
            /* Firefox 19+ */
            color:#000 !important
        }
        :-ms-input-placeholder {
            /* IE 10+ */
            color:#000 !important
        }
        :-moz-placeholder {
            /* Firefox 18- */
            color:#000 !important
        }
	</style>

	<style>
		.home3 .fproduct-carousel.owl-carousel .owl-nav .owl-prev {
			top: 40%;
			right: -7%;
		}

		.home3 .fproduct-carousel.owl-carousel .owl-nav .owl-next {
			top: 40%;
			left: -7%;
		}

		.single-product {
			border: 0;
		}

		.single-product .product-img {
			padding: 0;
		}

		.single-product .product-img img {
			/*height: 65vh;*/
            height: 55vh;
		}

		body {
			overflow-x: hidden !important;
		}

	</style>

	<style>

        .header-search-box .search-box input {
            height: 38px !important
        }

        ..header-search-box .search-box button {
            top: 16%;
            line-height: 38px;
        }

		.hide_mbbile {
			padding-top: 0px;
			padding-bottom: 0px;
			display: flex !important;
			align-items: center;
		}

		.custom_top_nav_hr {
			position: absolute;
			top: 133%;
			border-bottom: 1px solid #eaeaea;
			width: 100%;
			opacity: 1;
		}

		.offer-strip-container {
			width: 100%;
			background-color: #303AB2;
			text-align: center;
			margin-bottom: 0;
			height: auto;
			align-items: center;
			justify-content: center;
			display: flex;
			padding: 15px;
			flex-wrap: wrap;
			color: #FFF;
			font-weight: bold;
			margin-top: 3.7%;
		}

		.main_slider .row {
			padding-left: 10px;
			padding-right:10px;
		}

		.show_mobile {
			display: none;
		}

		body {
			overflow-x: hidden !important;
		}


		.variable-width-section .slick-slider {
			padding: 0;
		}

		.variable-width-section .row {
			padding: 0px;
		}


		.variable-width-section {
			display: none;
            overflow: hidden;
		}

		.slick-list {
			padding: 0 !important;
		}

        .offer-strip-container {
            margin-bottom: 5px
        }

        .slider_image {
            height: 425px;
        }

        .header-mid-area .col-6 {
            border-right: 1px solid #DDD
        }

        .header-mid-area .row .col-6:first-child    {
             border: 0
        }

        /* **************** */

        .footer_mobile {
            display: none
        }

        .link_item_ul {
            padding-right: 1.8%;
        }

        /*
        .custom_breadcrumb {
            margin-right: 1.3%;
        }
        */

        .custom_breadcrumb {
            border-top: 1px solid #DDD;

        }

        .banner-box2 {
            margin-bottom: 13px;
        }

        .accordion-button:focus {
            border-color: inherit !important;
            outline: 0 !important;
            box-shadow: none !important;
        }

        .mainmenu ul li a {
            font-size: 13px;
            font-weight: bold;
            color: #000 !important;
        }

        .mobile_logo {
            float: right;
            padding-right: 3%;
        }

        .single-product .product-content h5.product-name a {
            font-weight: bold
        }

        .product-name {
            margin-bottom: 5px
        }

        .mainmenu ul li ul li {
            width: auto;
        }

        .mainmenu ul li > ul {
            border-bottom: 1px solid #eaeaea;
            /*padding-right: 9%;*/
        }

        @media (max-width: 1200px) {

            .custom_col5 {
                width: 48% !important;
            }

            .custom_col7 {
                width: 52% !important;
            }
        }

        @media (max-width: 991px) {

            .custom_col5 {
                width: 59% !important;
            }

            .custom_col7 {
                width: 41% !important;
            }
        }

		@media (max-width: 767px) {

            .footer-bottom-area .payment {
                text-align: center;
                margin-top: 5px;
                margin-bottom: 7px;
            }

            .footer-bottom-area-last .row {
                display: flex;
                justify-content: center;
                flex-direction: column-reverse;
                text-align: center;
                margin: auto;
            }

            .header-search-box .search-box button {
                top: 2%;
            }

            .main_filter {
                display: none !important
            }

            #search-form nav {
                margin-bottom: 0 !important
            }

            .header-mid-area .row .col-6:nth-child(3)    {
                border-right: 0px;
            }

            .header-mid-area .row .col-6:first-child    {
                border-bottom: 1px solid #DDD;
            }

            .header-mid-area .row .col-6:nth-child(2)    {
                border-bottom: 1px solid #DDD;
            }

            .header-mid-area .row {
                padding-top: 0 !important;
                padding-bottom: 0 !important;
            }

            #grid .col-6 {
                padding-left: 5px;
                padding-right: 5px;
            }

            #grid  .row {
                padding-left: 7px;
                padding-right: 7px;
            }

            .selec2_div {
                margin-bottom: 20px
            }

            .css3-rating-stars label::before {
                width: 30px !important;
                font-size: 30px !important;
            }

            .footer_desktop {
                display: none;
            }

            .footer_mobile {
                display: block
            }

            .accordion-button::after {
                display: none !important
            }

            .accordion-button    {
                background: #333 !important;
                color: #FFF;
            }

            .accordion-button:focus {
                border-color: none;
                outline: 0;
                box-shadow: 0;
            }

            .accordion-button:not(.collapsed) {
                color: #FFF;
                background-color: #777 !important;
                box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
            }

            .accordion-body {
                padding: 1rem 1.25rem;
                background: #2f2e2e;
            }


            .header-mid-inner-icon {
                height: 35px;
                width: 35px;
            }

            .header-mid-inner-icon i {
                font-size: 15px
            }

            .header-mid-area .container {
                padding: 0 15px
            }

            .slider_image {
                height: 170px;
            }

            .carousel-control-next , .carousel-control-prev {
                display: none
            }

			.variable-width-section {
				display: block;
			}

			.variable-width {
				display: block;
				overflow:hidden;
			}


			body {
				overflow-x: hidden !important;
			}

			.tab-content .tab-pane {
				overflow:hidden !important
			}

			.offcanvas-start {
				right: -5% !important;
			}

			.home3 .fproduct-carousel.owl-carousel .owl-nav button {
				display: none;
			}

			.offcanvas-body {
				padding: 0;
				padding-right: 15px;
			}

			.banner_box2_image img {
				height: 45vh;
			}

			.new-product-area .row {
				padding: 15px;
			}

			.show_desktop {
				display: none;
			}

			.single-product .product-img img {
				height: 45vh;
			}

			.discount_baner .show_mobile img {
				height: 300px !important;
			}

			.home3 .fproduct-carousel.owl-carousel .owl-nav .owl-prev {
				top: 35%;
			}

			.home3 .fproduct-carousel.owl-carousel .owl-nav .owl-next {
				top: 35%;
			}


			.custom-col {
				padding: 1px !important;
			}

			.main_slider .container , .main_slider .row {
				padding: 0px;
			}

			.offer-strip-container {
				margin-top: 0;
			}

			.header-top-right {
				margin-bottom: 16px;
			}

			.header-top-right span {
				display: inline-block;
    			margin-bottom: 10px;
			}

			.hide_mbbile , .header-top-area , .custom_top_nav_hr  {
				display: none !important;
			}

			.show_mobile {
				display: block !important;
                padding: 5px
			}

			.show_mobile .second_li::before {
				display: none;
			}

			.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
				border: 0 !important;
				border-bottom: 3px solid blue !important;
				color: blue !important;
				font-weight: bold !important;
			}

			.nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
				border: 0;
			}

			.offcanvas-menu {
				padding-bottom: 0px;
				border-bottom: 1px solid #EEE;
			}

			.header-search-box .search-box {
				width: auto !important;
			}


			.header-mid-area .row {
				padding: 0;
			}

			.header-mid-area .title-upper {
				font-size: 11px;
			}

			.header-mid-area .col-6 {
				padding: 5px 10px;
			}

			.banner-area .col-3,.banner-area .col-9 {
				padding: 5px;
			}

			.caegories .col-6 {
				padding: 3px;
			}

			.caegories .single-product {
				margin-top: 0 !important;
			}

		}

		@media (max-width: 767px) {

            #myTab .nav-item {
                width: calc(100% / {{ App\Models\Main_Category::where('status',1)->count() }})
            }

            .nav-tabs .nav-link {
                margin: auto
            }

			.variable-width img {
				width: 100% !important;
				height: 250px !important;
				padding: 5px;
			}

			.what_new img {
				width: 100% !important;
				height: 250px !important;
				padding: 5px;
			}

			.test_ads  img {
				width: 270px !important;
				height: 250px !important;
				padding: 5px;
			}

            .test_ads img {
                height: 350px !important;
            }

            .discount_baner .show_mobile img {
                height: 156px !important;
            }

		}

		@media (max-width: 500px) {

			.variable-width img {
				width: 100% !important;
				height: 285px !important;
				padding: 5px;
			}

            .test_ads img {
                height: 350px !important;
            }

            .discount_baner .show_mobile img {
                height: 156px !important;
            }
		}

		@media (max-width: 400px) {

			.variable-width img {
				width: 100% !important;
				height: 285px !important;
				padding: 5px;
			}

            .test_ads img {
                height: 350px !important;
            }

            .discount_baner .show_mobile img {
                height: 156px !important;
            }

            .header-top-left {
                display: flex;
                justify-content: center;
                flex-direction: column;
            }

            .mobile_logo {
                padding-right: 0%;
            }

		}

	</style>

    <style>

        .active_sub_menu ,
        .home3 .header-bottom-area .mainmenu ul li ul li a.active_sub_menu {
            color: #303AB2 !important;
            font-weight: bold !important;
        }

        .single-product {
            border: 1px solid #DDD
        }

        #top_offer .offer-strip-container {
            margin-top: 145px
        }

        .header-area {
            overflow: hidden;
            clear: both;
        }
        .custom_breadcrumb{
            margin-top:30px;
        }
    </style>

    @yield('header')


    <script src="{{asset('user/assets')}}/js/vendor/jquery-1.12.4.min.js"></script>

</head>

<body>

	<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


    @php
        $main_categories = App\Models\Main_Category::where('status',1)->orderBy('order','asc')->get(['id','title','url']);

        $TopHeader = App\Models\TopHeader::get();

        $x = 1;
        $x2 = 1;
        $x3 = 1;
    @endphp


	<header class="header-area home3">


        <div class="fixed-top">

            <div class="header-top-area" >
                <div class="container ">
                    <div class="row" style="padding-left: 30px;padding-right: 30px;">

                        @if($TopHeader != null && $TopHeader->count() > 0)
                        <div class="col-sm-5">
                            <div class="header-top-left text-center text-sm-start">
                                <ul class="top_ul_1">

                                    @foreach ($TopHeader as $top_header)
                                    <li>
                                        <a href="#">
                                            <i class="{{ $top_header->icon }}" aria-hidden="true"></i>
                                            {{ $top_header->title }}
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    {{ $top_header->sub_title }}
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        @endif

                        <div class="col-sm-7">
                            <div class="header-top-right text-center text-sm-end">

                                @if (! Auth::guard('user')->check())
                                    <span style="border-left: 1px solid #DDD;padding-left: 10px;padding-right: 10px;">
                                        <a href="{{ asset('login') }}">
                                            <i class="fa fa-sign-in" aria-hidden="true"></i>
                                            تسجيل الدخول
                                        </a>
                                    </span>
                                    <span style="border-left: 1px solid #DDD;padding-left: 10px;padding-right: 10px;">
                                        <a href="{{ asset('login') }}">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            تسجيل حساب
                                        </a>
                                    </span>
                                @else
                                    <span style="border-left: 1px solid #DDD;padding-left: 10px;padding-right: 10px;">
                                        <a href="{{ asset('profile') }}">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            حسابي
                                        </a>
                                    </span>
                                @endif

                                <span style="padding-left: 10px;padding-right: 10px;">
                                    <a href="{{ asset('cart') }}" style="position: relative">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span id="cart_count" style="position: absolute;right: 3%;background: #FFF;color: #000;border-radius: 50%;width: 15px;height: 15px;text-align: center;top: -14%;line-height: 15px;">
                                            {{ getCartCount() }}
                                        </span>
                                         سلة المشتريات
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Header Top Area -->


            <div class="header-top-area show_mobile" >
                <div class="container ">
                    <div class="row" style="padding: 12px 0px">
                        <div class="col-sm-12">
                            <div class="header-top-left text-center text-sm-start">

                                <label class="mobile_logo">
                                    <a href="{{ asset('/') }}" style="padding-top:0;padding-bottom:0;">
                                        <img src=" {{ Custom_Image_Path('logo',$setting->header_logo) }}" style="height: 35px;width: 100px;"/>
                                    </a>
                                </label>

                                <label style="float: left;margin-top: 2.5%;">

                                    @if (! Auth::guard('user')->check())
                                    <a style="padding-left: 5px" href="{{ asset('login') }}">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                        تسجيل الدخول
                                    </a>
                                    @else
                                    <a style="padding-left: 5px;" href="{{ asset('profile') }}">
                                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                                         حسابي
                                    </a>
                                    @endif

                                    <a style="padding-right: 15px;border-right: 1px solid #FFF;" href="{{ asset('cart') }}">
                                        <i class="fa fa-shopping-cart"></i>
                                         سلة مشتريات
                                    </a>

                                </label>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- End Header Top Area -->


            <div class="header-bottom-area" id="navbar_top" style="position: relative;padding-top: 0;padding-bottom: 0;">

                <div class="container" id="main_top_caontiner">
                    <div class="row align-items-center" style="padding-top: 0px;padding-bottom: 0px;padding-left: 0;padding-right: 0;">


                        <div class="col-3 d-md-none" style="padding-top: 15px;padding-bottom: 15px;">
                            <div class="header-action" style="justify-content: flex-start;">
                                <!-- cart-total end -->
                                <div class="header-toggle">
                                    <button class="toggle" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="col-9 d-md-none" style="padding-left:0px;padding-top: 15px;padding-bottom: 15px;">
                            {!! Form::open([ 'url' => 'search' ,'method'=>'get','class' => 'search-form-cat' ]) !!}
                                <div class="header-search-box" style="margin-left: 10px;">
                                    <div class="search-box">
                                        <input type="text" name="search" value="{{ old('search') }}" required placeholder="ما الذي تبحث عنة" />
                                        <button><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>


                        <div class="col-lg-12 hide_mbbile">

                            <div class="row" style="width: 100%">

                                <div class="col-md-5 custom_col5">
                                    <nav id="top_custom_nav" class=" mainmenu" style="margin-top: 0;">
                                        <ul>

                                            <li class="">
                                                <a href="{{ asset('/') }}" style="text-transform: capitalize;padding-top:0;padding-bottom:0;">
                                                    <img src=" {{ Custom_Image_Path('logo',$setting->header_logo) }}" style="height:48px;width:88px"/>
                                                </a>
                                            </li>

                                            @if($main_categories != null && $main_categories->count() > 0)
                                                @foreach ($main_categories as $main_cat)

                                                    <li  id="nav_link{{ $main_cat->id }}" class="link_item_li {{ isset($currunt_page_url) && $main_cat->url == $currunt_page_url ? 'active_link_item' : '' }}">

                                                        <a href="{{ asset($main_cat->url) }}">
                                                            {{ $main_cat->title }}
                                                        </a>

                                                        @php
                                                            $sub_categories = App\Models\Sub_Category::where('main_category_id',$main_cat->id)->where('status',1)->orderBy('created_at','asc')->get(['id','title','url']);
                                                        @endphp

                                                        @if($sub_categories != null)
                                                            <ul  class="link_item_ul  {{ isset($currunt_page_url) && $main_cat->url == $currunt_page_url ? 'active_link_item_ul' : '' }}">
                                                                <div class="container">
                                                                    <div class="row test">
                                                                        @foreach ($sub_categories as $sub_cat)
                                                                        <li style="display: inline-block">
                                                                            <a class="main_color" href="{{ asset($sub_cat->url) }}" class="{{ isset($active_sub_id) && $active_sub_id == $sub_cat->id ? 'active_sub_menu' : '' }}">
                                                                                {{ $sub_cat->title }}
                                                                            </a>
                                                                        </li>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        @endif

                                                    </li>

                                                    @php $x = $x + 1; @endphp

                                                @endforeach
                                            @endif

                                        </ul>
                                    </nav>
                                </div>

                                <div class="col-md-7 custom_col7">
                                    {!! Form::open([ 'url' => 'search' ,'method'=>'get','class' => 'search-form-cat','id' => 'top_search' ]) !!}
                                        <div class="header-search-box" style="margin-right: 10px;line-height: 50px;">
                                            <div class="search-box">
                                                <input type="text" name="search" value="{{ old('search') }}" required placeholder="ما الذي تبحث عنة" />
                                                <button style=""><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>

                        </div>



                    </div>
                </div>

                {{-- <hr class="custom_top_nav_hr"> --}}

            </div> <!-- End Header Bottom Area 1  -->

        </div>

	</header>
	<!-- End Header Area -->

    @yield('top_offer')



    @php
        $main_categories2 = App\Models\Main_Category::where('status',1)->get(['id','title','url']);
    @endphp

    @if($main_categories2 != null && $main_categories2->count() > 0)
	<!-- offcanvas Start -->
	<div class="offcanvas offcanvas-start" id="offcanvasMenu">

		<div class="offcanvas-header" style="justify-content: end;">
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
		</div>

		<div class="offcanvas-body">
			<ul class="nav nav-tabs" id="myTab" role="tablist">

                @foreach ($main_categories2 as $main_cat)

                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $x2 == 1 ? 'active' : '' }}" id="main_cat_tab{{ $main_cat->id }}" data-bs-toggle="tab" data-bs-target="#main_cat_menu{{ $main_cat->id }}" type="button" role="tab" aria-controls="main_cat_menu{{ $main_cat->id }}" aria-selected="{{ $x2 == 1 ? 'true' : 'false' }}">
                            {{ $main_cat->title }}
                        </button>
                    </li>

                    @php $x2 = $x2 + 1; @endphp

                @endforeach

			</ul>

			<div class="tab-content" id="myTabContent">

                @foreach ($main_categories2 as $main_cat)

                    @php
                        $sub_categories = App\Models\Sub_Category::where('main_category_id',$main_cat->id)->where('status',1)->orderBy('created_at','asc')->get(['id','title','url']);
                    @endphp

                    @if($sub_categories != null && $sub_categories->count() > 0)

                        <div class="tab-pane fade {{ $x3 == 1 ? ' show active' : '' }}" id="main_cat_menu{{ $main_cat->id }}" role="tabpanel" aria-labelledby="main_cat_tab{{ $main_cat->id }}">

                            <nav class="offcanvas-menu">
                                <ul>
                                    @foreach ($sub_categories as $sub_cat)
                                        <li>
                                            <a href="{{ asset($sub_cat->url) }}">
                                                {{ $sub_cat->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>

                        </div>

                        @php $x3 = $x3 + 1; @endphp

                    @endif

                @endforeach

			</div>

			<div class="" style="display: flex;justify-content: center;margin-top: 20px;">
                @if (! Auth::guard('user')->check())
				<a class="btn btn-default" style="border: 1px solid #777;" href="{{ asset('login') }}">
					تسجيل حساب
				</a>
				<a class="btn btn-primary" style="margin-right: 5px;background-color: blue;border-color: blue;" href="{{ asset('login') }}">
					تسجيل الدخول
				</a>
                @else
				<a class="btn btn-default" style="border: 1px solid #777;" href="{{ asset('profile') }}">
                    حسابي
                </a>
                @endif
			</div>

            <div class="social_media_icons">
                <div style="display: flex;justify-content: center;margin-top: 25px;">
                    @if($setting->facebook_link != null)
                    <span style="margin-left: 15px;font-size: 25px;">
                        <a href="{{ $setting->facebook_link }}">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </span>
                    @endif

                    @if($setting->twitter_link != null)
                    <span style="margin-left: 15px;font-size: 25px;">
                        <a href="{{ $setting->twitter_link }}">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </span>
                    @endif

                    @if($setting->instgram_link != null)
                    <span style="margin-left: 15px;font-size: 25px;">
                        <a href="{{ $setting->instgram_link }}">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </span>
                    @endif
                </div>
            </div>

		</div>
	</div>
	<!-- offcanvas End -->
    @endif

    @yield('content')

	<footer class="footer-area home3">


		<div class="footer-middle-area footer_desktop">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 mb-10">
						<div class="footer-widget">
							<h4>
                                {{ $setting->website_name }}
                            </h4>
							<ul>
								<li>
                                    <a href="{{ asset('about_us') }}">من نحن</a>
                                </li>
								<li>
                                    <a href="{{ asset('contact_us') }}">تواصل معنا</a>
                                </li>
								<li>
                                    <a href="{{ asset('privacy') }}">الخصوصية </a>
                                </li>
							</ul>
						</div>
					</div>

                    @php
                        $pages = App\Models\Pages::get(['id','title','url']);
                    @endphp
					<div class="col-md-4 col-sm-6 mb-10">
						<div class="footer-widget">
							<h4>أسئلة واجوبة</h4>
							<ul>
                                @if($pages != null && $pages->count() > 0)
                                    @foreach ($pages as $page)
                                        <li>
                                            <a href="{{ asset($page->url) }}">
                                                {{ $page->title }}
                                            </a>
                                        </li>
                                    @endforeach
                                @endif

                                @if(! Auth::guard('user')->check())
								<li>
                                    <a href="{{ asset('login') }}">تسجيل عضوية </a>
                                </li>
                                @endif
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-6 mb-10">
						<div class="footer-widget">
							<h4> تابعونا </h4>
                            <div class="social_media_icons">
                                <div style="display: flex;justify-content: flex-start;margin-top: 25px;">
                                    @if($setting->facebook_link != null)
                                    <span style="margin-left: 15px;font-size: 25px;">
                                        <a href="{{ $setting->facebook_link }}">
                                            <i class="fa fa-facebook" style="color: #FFF"></i>
                                        </a>
                                    </span>
                                    @endif

                                    @if($setting->twitter_link != null)
                                    <span style="margin-left: 15px;font-size: 25px;">
                                        <a href="{{ $setting->twitter_link }}">
                                            <i class="fa fa-twitter" style="color: #FFF"></i>
                                        </a>
                                    </span>
                                    @endif

                                    @if($setting->instgram_link != null)
                                    <span style="margin-left: 15px;font-size: 25px;">
                                        <a href="{{ $setting->instgram_link }}">
                                            <i class="fa fa-instagram" style="color: #FFF"></i>
                                        </a>
                                    </span>
                                    @endif
                                </div>
                            </div>
						</div>
					</div>

				</div>
			</div>
		</div> <!-- footer-middle-area -->


        <div class="footer-middle-area footer_mobile">
			<div class="container">
				<div class="row">
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button style="position: relative" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    <span>
                                        {{ $setting->website_name }}
                                    </span>
                                    <i class="fa fa-plus" aria-hidden="true" style="position: absolute;left: 4%;top: 40%;"></i>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="footer-widget">
                                        <ul>
                                            <li>
                                                <a href="{{ asset('about_us') }}">من نحن</a>
                                            </li>
                                            <li>
                                                <a href="{{ asset('contact_us') }}">تواصل معنا</a>
                                            </li>
                                            <li>
                                                <a href="{{ asset('privacy') }}">الخصوصية </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button style="position: relative" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span>
                                        أسئلة واجوبة
                                    </span>
                                    <i class="fa fa-plus" aria-hidden="true" style="position: absolute;left: 4%;top: 40%;"></i>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="footer-widget">
                                        <ul>
                                            @if($pages != null && $pages->count() > 0)
                                                @foreach ($pages as $page)
                                                    <li>
                                                        <a href="{{ asset($page->url) }}">
                                                            {{ $page->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif

                                            @if(! Auth::guard('user')->check())
                                            <li>
                                                <a href="{{ asset('login') }}">تسجيل عضوية </a>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button style="position: relative" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     <span>
                                        تابعونا
                                    </span>
                                    <i class="fa fa-plus" aria-hidden="true" style="position: absolute;left: 4%;top: 40%;"></i>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="footer-widget">
                                        <div class="social_media_icons" style="margin-top: -4.5%">
                                            <div style="display: flex;justify-content: flex-start;margin-top: 25px;">
                                                @if($setting->facebook_link != null)
                                                <span style="margin-left: 15px;font-size: 25px;">
                                                    <a href="{{ $setting->facebook_link }}">
                                                        <i class="fa fa-facebook" style="color: #FFF"></i>
                                                    </a>
                                                </span>
                                                @endif

                                                @if($setting->twitter_link != null)
                                                <span style="margin-left: 15px;font-size: 25px;">
                                                    <a href="{{ $setting->twitter_link }}">
                                                        <i class="fa fa-twitter" style="color: #FFF"></i>
                                                    </a>
                                                </span>
                                                @endif

                                                @if($setting->instgram_link != null)
                                                <span style="margin-left: 15px;font-size: 25px;">
                                                    <a href="{{ $setting->instgram_link }}">
                                                        <i class="fa fa-instagram" style="color: #FFF"></i>
                                                    </a>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>


{{--        @php--}}
{{--        $a = 10;--}}
{{--        $b = 20;--}}

{{--        $outbut = $a + $b * ($a) -+ ($b) + ($a * $a * -$a);--}}
{{--        dd($outbut);--}}
{{--        @endphp--}}


        <div class="footer-bottom-area footer-bottom-area-last">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="payment text-center">
                            <a href="#">
                                <img src="{{asset('user/assets')}}/images/payment.webp" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer-bottom-area -->


	</footer>
	<!-- End footer-area -->



	<div id="back-top">
        <i class="fa fa-angle-up"></i>
    </div>




	<!-- JS
    ============================================ -->

    <!-- Modernizer & jQuery JS -->
    <script src="{{asset('user/assets')}}/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{asset('user/assets')}}/js/popper.min.js"></script>
    <script src="{{asset('user/assets')}}/js/bootstrap.min.js"></script>

	<!-- Nivo JS -->
    <script src="{{asset('user/assets')}}/lib/js/jquery.nivo.slider.pack.js"></script>
    <script src="{{asset('user/assets')}}/lib/js/nivo-active.js"></script>

    <!-- Plugins JS -->
    <script src="{{asset('user/assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('user/assets')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('user/assets')}}/js/jquery.countdown.min.js"></script>
    <script src="{{asset('user/assets')}}/js/jquery.counterup.min.js"></script>
    <script src="{{asset('user/assets')}}/js/waypoints.min.js"></script>
    <script src="{{asset('user/assets')}}/js/plugins.js"></script>
    <script src="{{asset('user/assets')}}/js/ajax-mail.js"></script>

    <!-- Main JS -->
    <script src="{{asset('user/assets')}}/js/main.js"></script>

    <script src="{{ asset('files/bootstrap-sweetalert') }}/sweetalert.min.js"></script>

	<script>

        (function($){

            @if ($message = Session::get('success'))

                swal({
                    title: "جيد !",
                    text: "{{ $message }}",
                    imageUrl: '{{ asset('img/sent.jpg') }}'
                });

            @endif

            @if ($message = Session::get('error'))

                swal({
                    title: "خطاء",
                    text: "{{ $message }}",
                    type: "warning",
                    showConfirmButton: true,
                    confirmButtonClass: "btn-danger",
                });

            @endif


        })(jQuery);

    </script>




        {{--
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        document.getElementById('navbar_top').classList.add('fixed-top');
                        // add padding top to show content behind navbar
                        //navbar_height = document.querySelector('.navbar').offsetHeight;
                        //document.body.style.paddingTop = navbar_height + 'px';
                    } else {
                        document.getElementById('navbar_top').classList.remove('fixed-top');
                        // remove padding top from body
                        document.body.style.paddingTop = '0';
                    }
                });
            });
            // DOMContentLoaded  end
        </script>
        --}}


	<script>
		$(document).ready(function() {


            var id = {{ isset($currunt_page_id) ? $currunt_page_id : '0' }};

            $(".mainmenu .link_item_li").hover(function(){
                $(this).siblings().removeClass('active_link_item');
                $(this).addClass('active_link_item');
            }, function(){
                $('.mainmenu .link_item_li').removeClass('active_link_item');
                $('#nav_link'+id).addClass('active_link_item');
            });

            /*
			var top_search = $('#top_search').outerWidth();
			var top_custom_nav = $('#top_custom_nav').outerWidth();
			var main_top_caontiner = $('#main_top_caontiner').outerWidth();

			var calc = (main_top_caontiner - top_custom_nav) - 85;
			$('#top_search').width(calc+'px');
            */


			var link_item_ul = $('.link_item_ul').outerHeight();
            var header_height = $('header .fixed-top').outerHeight();

			$('#top_offer .offer-strip-container').css('marginTop',link_item_ul + header_height);
            $('#top_offer .offer-strip-container').css('marginTop',link_item_ul + header_height);


			// resize
			$(window).resize(function() {

                /*
				var top_search = $('#top_search').outerWidth();
				var top_custom_nav = $('#top_custom_nav').outerWidth();
				var main_top_caontiner = $('#main_top_caontiner').outerWidth();

				var calc = (main_top_caontiner - top_custom_nav) - 85;
				$('#top_search').width(calc+'px');
                */

				var link_item_ul = $('.link_item_ul').outerHeight();
                var header_height = $('header .fixed-top').outerHeight();

				$('#top_offer .offer-strip-container').css('marginTop',link_item_ul + header_height);

			});


            /*
            $('.accordion-button').click(function() {

                $('.accordion-button i').addClass('fa-chevron-down').removeClass('fa-chevron-up');
                $(this).find('i').toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');

            });
            */

		});
	</script>


    <script>

        $(document).ready(function(e)
        {
            var h = $('.active_link_item_ul').height() + 1;
            $('.breadcrumb').animate({ paddingTop: h });
        });

    </script>

    @yield('footer')




</body>

</html>
