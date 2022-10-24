@extends('user.layouts.master')

@section('header')


	<style>

        .product-details .single-product .product-content p {
            padding-top: 5px
        }

        .btn-primary:active:focus  {
            box-shadow: none;
        }

        .form-control:focus {
            border-color: 0 !important;
            outline: 0 !important;
            box-shadow: none !important;
        }

        .single-product .product-img img {
            /*height: 40vh !important;*/
            width: 100%;
        }

        .editor_div ul {
            list-style: inherit !important;
        }

        .properties_div {
            margin: 0 9px 10px 0;
            display: block;
            line-height: 70px;
            height: 70px;
            padding: 5px 15px;
            font-size: 16px;
            font-style: normal;
            color: #3d3d3d;
            background-color: #f8f8f8;
            position: relative;
            overflow: hidden;
            padding-left: 0
        }

        .product-details-menu {
            justify-content: flex-start;
            margin-top: 10px;
        }

        .product-details-menu li {
            margin-right: 0;
            margin-left: 10px;
            margin-bottom: 10px;
        }

        .product-details-menu li:first-child {
            margin-right: 0
        }

        .product-details-menu li a img {
            height: 85px;
        }

        .size select {
            width: 100px;
            height: 30px;
        }

    </style>



    <style>


		body {
			font-family: Arial;
			margin: 0 auto; /* Center website */
		}

		.heading {
			font-size: 25px;
			margin-right: 25px;
		}

        /*
		.fa {
			font-size: 25px;
		}
        */

		.checked {
			color: orange;
		}

		/* Three column layout */
		.side {
			float: left;
			width: 15%;
			margin-top:10px;
		}

		.middle {
			margin-top:10px;
			float: left;
			width: 70%;
		}

		/* Place text to the right */
		.right {
			text-align: right;
		}

		/* Clear floats after the columns */
		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* The bar container */
		.bar-container {
			width: 100%;
			background-color: #f1f1f1;
			text-align: center;
			color: white;
		}

		/* Individual bars */
		.bar-5 { height: 18px; background-color: #4CAF50;}
		.bar-4 { height: 18px; background-color: #2196F3;}
		.bar-3 { height: 18px; background-color: #00bcd4;}
		.bar-2 { height: 18px; background-color: #ff9800;}
		.bar-1 { height: 18px; background-color: #f44336;}

		/* Responsive layout - make the columns stack on top of each other instead of next to each other */
		@media (max-width: 400px) {
			.side, .middle {
			width: 100%;
			}
			.right {
			display: none;
			}
		}
    </style>

    <style>

		.inner_comment { display: none }

		.panel  {
			margin-bottom: 20px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);
			box-shadow: 0 1px 1px rgba(0,0,0,0.05);
			border-color: #DDD;
		}

		.panel-heading {
			color: #333;
			background-color: #f5f5f5;
			border-color: #ddd;
			padding: 10px 15px;
			border-bottom: 2px solid #DDD;
		}

		.media-body { padding-left: 8px }

		.media-list { padding-top: 20px }


		.active_start , .checked { color: #FFD700 }

		.un_active_start { color: #ddd }


    </style>


    <style>


		.rating {
			border: none;
			float: left;
		}

		.myratings {
			font-size: 85px;
			color: green
		}

		.rating>[id^="star"] {
			display: none
		}



		.rating>label:before {
			margin: 5px;
			font-size: 2.25em;
			font-family: FontAwesome;
			display: inline-block;
			content: "\f005"
		}

		.rating>.half:before {
			content: "\f089";
			position: absolute
		}

		.rating>label {
			color: #ddd;
			float: right
		}

		.rating>[id^="star"]:checked~label,
		.rating:not(:checked)>label:hover,
		.rating:not(:checked)>label:hover~label {
			color: #FFD700
		}

		.rating>[id^="star"]:checked+label:hover,
		.rating>[id^="star"]:checked~label:hover,
		.rating>label:hover~[id^="star"]:checked~label,
		.rating>[id^="star"]:checked~label:hover~label {
			color: #FFED85
		}

		.reset-option {
			display: none
		}


		.card-body { padding: 0 !important }

		.users_rating .rating>label:before {
			font-size: 1.25em !important;
			margin: 2px !important;
		}



    </style>


    <style>
		div.stars {
			width: 270px;
			display: inline-block
		}

		.mt-200 {
			margin-top: 200px
		}

		input.star {
			display: none
		}

		label.star {
			float: right;
			padding: 0;
			font-size: 1.25em !important;
			color: #4A148C;
			transition: all .2s
		}

		input.star:checked~label.star:before {
			content: '\f005';
			color: #FD4;
			transition: all .25s
		}

		/*
		input.star-5:checked~label.star:before {
			color: #FE7;
			text-shadow: 0 0 20px #952
		}
		*/

		input.star-1:checked~label.star:before {
			color: #F62
		}

		label.star:hover {
			transform: rotate(-15deg) scale(1.3)
		}

		label.star:before {
			content: '\f006';
			font-family: FontAwesome
		}
    </style>

    <style>

        .color-list-container ul li {
            height: 35px;
            width: 35px;
        }

        .color-list-container ul li a {
            height: 31px;
            width: 31px;
        }

		.card {
			margin-bottom: 0;
			padding: 0;
			height: 50px;
			min-height: 50px;
		}

        .cart_li {
            width: 68%;
        }

        #sizes_guide {
            color: blue;
            cursor: pointer;
            font-weight: bold;
            text-decoration: underline;
            margin-right: 3%;
            font-size: 15px;
        }

        .editor_div {
            padding-right: 20px
        }

		@media (max-width: 768px) {

            .editor_div {
                padding-right: 0px
            }

            .product_properties_row {
                margin-bottom: 20px
            }

			.login_btn_n {
				font-size: 11px;
				display: inline-block;
				text-align: center;
			}

			.averarge {
				display:block;
				margin-bottom:10px;
			}

			.reviews {
				display:block;
			}

            .properties_div {
                margin: 0;
                margin-bottom: 5px;
                padding: 0;
                padding-right: 10px;
                font-size: 10px;
                line-height: 55px;
                height: 55px;
            }

            .product_properties {
                padding: 0px 2px;
            }

            .properties_div img {
                width: 17px;
            }

		}


        @media (max-width: 500px) {

            .cart_li {
                width: 100%;
            }

            #sizes_guide {
                margin-top: 20px
            }
        }



    </style>


    <style>
        .css3-rating-stars,
		.css3-rating-stars label::before{
			display: inline-block;
		}
		.css3-rating-stars label:hover,
		.css3-rating-stars label:hover ~ label{
			color: #06befb;
		}
		.css3-rating-stars *{
			margin: 0;
			padding: 0;
		}
		.css3-rating-stars input{
			display: none;
		}
		.css3-rating-stars{
			unicode-bidi: bidi-override;
			direction: ltr;
		}
		.css3-rating-stars label{
			color: #ccc;
		}
		.css3-rating-stars label::before{
			content: "\2605";
			width: 48px;
			line-height: 25px;
			text-align: center;
			font-size: 52px;
			cursor: pointer;
		}
		.css3-rating-stars input:checked ~ label{
			color: #f5b301;
		}
		.css3-rating-disabled{
			opacity: .50;
			-webkit-pointer-events: none;
			-moz-pointer-events: none;
			pointer-events: none;
		}

    </style>


@endsection

@section('sub_title')
    {{ $Item->title }}
@endsection

@php
	$setting = App\Models\Setting::first();

	$product_slider = App\Models\Product_Images::where('product_id',$Item->id)->get();

	$x = 1;
	$y = 1;

	$after_15_day = Carbon\Carbon::now()->addDays(-15);
	$after_15_day = Carbon\Carbon::parse($after_15_day)->format('Y-m-d H:i:s');

@endphp

@php
    $reviews_count = App\Models\Review::where('product_id',$Item->id)->count();
    $reviews_sum = App\Models\Review::where('product_id',$Item->id)->sum('rate');

    $review1 = App\Models\Review::where('product_id',$Item->id)->where('rate',1)->count();
    $review2 = App\Models\Review::where('product_id',$Item->id)->where('rate',2)->count();
    $review3 = App\Models\Review::where('product_id',$Item->id)->where('rate',3)->count();
    $review4 = App\Models\Review::where('product_id',$Item->id)->where('rate',4)->count();
    $review5 = App\Models\Review::where('product_id',$Item->id)->where('rate',5)->count();
@endphp

@section('content')

    @php

        $reviews_count = App\Models\Review::where('product_id',$Item->id)->count();
        $reviews_sum = App\Models\Review::where('product_id',$Item->id)->sum('rate');

        $calc_rev = 0;

        if($reviews_count != 0 ) {
            $calc_rev = $reviews_sum / $reviews_count;
            $calc_rev = round($calc_rev);
        }

    @endphp

    <div class="product-details-area mt-4 mrgn-40 padding_section" style="padding-top: 8.8%;">
        <div class="container">
            <div class="row">

                <nav class="custom_breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="{{asset('/')}}">
                                الرئيسية
                            </a>
                        </li>

                        @if($Item->main_category != null)
                        <li class="breadcrumb-item">
                            <a href="{{asset($Item->main_category->url)}}">
                                {{ $Item->main_category->title }}
                            </a>
                        </li>
                        @endif

                        @if($Item->sub_category != null)
                        <li class="breadcrumb-item">
                            <a href="{{asset($Item->sub_category->url)}}">
                                {{ $Item->sub_category->title }}
                            </a>
                        </li>
                        @endif

                        <li class="breadcrumb-item active" aria-current="page">
                             {{ $Item->title }}
                        </li>
                    </ol>
                </nav>

                <div class="col-lg-12">
                    <div class="product-details">
                        <div class="single-product">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="tab-content">

                                        @foreach ($product_slider as $item)

                                            <div class="tab-pane fade {{$x == 1 ? 'show active' : '' }}" id="thumbnail_{{$item->id}}">

                                                <div class="product-img">

                                                    <a href="{{ asset($Item->url) }}">

                                                        <img src="{{ Custom_Image_Path('product_images',$item->slider) }}" alt="single-product-image" />

                                                        @if($after_15_day <= $Item->created_at)
                                                            <span style="top: 5%;left: auto;right: 5%;" class="new-box">جديد</span>
                                                        @endif

                                                        @if($Item->discount > 0)
                                                        <span class="new-box" style="background: #000;left: 5%;top: auto;bottom: 5%;">
                                                            {{ $Item->discount }} %
                                                        </span>
                                                        @endif
                                                    </a>

                                                </div>

                                            </div>

                                            @php $x = $x + 1; @endphp
                                        @endforeach

                                    </div>
                                    <ul class="nav product-details-menu">

                                        @foreach ($product_slider as $item)
                                            <li class="{{ $y == 1 ? 'active' : ''}}">
                                                <a href="#thumbnail_{{$item->id}}" data-bs-toggle="tab">
                                                    <img src="{{ Custom_Image_Path('product_images',$item->small_slider) }}" alt="" />
                                                </a>
                                            </li>
                                            @php $y = $y + 1; @endphp
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">

                                        <p class="productreference" >
                                            <span class="editable" content="demo_1" style="font-weight:bold ">
                                                {{ $Item->brand }}
                                            </span>
                                        </p>

                                        <h1 class="product-name">
                                            {{ $Item->title }}
                                        </h1>

                                        <div class="calc-review" style="margin-bottom: 8px">
                                            @include('user.includes.calc-review')
                                        </div>

                                        <div class="product-price" style="margin-bottom: 8px">
                                            <h2 style="margin-bottom: 15px">
                                                @if($Item->discount > 0)
                                                    {{ $Item->price }} ج.م
                                                    <del> {{ $Item->price_before_discount }} ج.م </del>
                                                @else
                                                    {{ $Item->price }} ج.م
                                                @endif
                                            </h2>

                                            @if($setting->price_title != null)
                                            <span style="display: block;margin-bottom: 10px;">{{ $setting->price_title }}</span>
                                            @endif

                                        </div>


                                        <p>
                                            {{ $Item->short_description }}
                                        </p>

                                        @php
                                            $sizes_arr = App\Models\Product_Sizes::where('product_id',$Item->id)->where('quantity','>',0)->pluck('size_id')->toArray();

                                            if(! empty($sizes_arr)) {
                                                $sizes = App\Models\Size::whereIn('id',$sizes_arr)->pluck('title','id');
                                            } else {
                                                $sizes = null;
                                            }
                                        @endphp


                                        @php
                                            $product_color = App\Models\Product_Colors::where('product_id',$Item->id)->first();

                                            if($product_color != null) {
                                                $color = App\Models\Color::where('id',$product_color->color_id)->first();
                                            } else {
                                                $color = null;
                                            }
                                        @endphp

                                        @if($product_color != null && $color != null)
                                        <div class="color-list-container" style="margin-top: 10px;margin-bottom: 0;">
                                            <h5 style="font-size: 13px;font-style: italic;">اللون</h5>
                                            <ul>
                                                <li>
                                                    <a href="#" style="background: {{$color->value}}" class="color_pick"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endif

                                        <div class="box-info-product clearfix" style="margin-top: 0px">

                                            <form action="#">

                                                <div class="quantity-wanted-p" style="">
                                                    <label for="quantitywanted" style="width: 55px;">
                                                        الكمية
                                                    </label>
                                                    <input id="product_quantity" type="number" value="1" min="1" max="" name="qtybutton" style="text-align: center;border:1px solid #000;width: 80px;" />
                                                </div>

                                                <ul class="usefull-link" style="margin-bottom: 20px;">

                                                    <li>
                                                        <div class="size">
                                                            <label style="width: 55px;">المقاسات</label>
                                                            <select style="width: 80px;" name="product-size" id="product_size" data-id="{{$Item->id}}">
                                                                <option value="" selected>المقاسات </option>
                                                                @if($sizes != null)
                                                                    @foreach($sizes as $key => $value)
                                                                    <option value="{{$key}}">{{$value}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>

                                                            @if($Item->sub_category != null && $Item->sub_category->pic != null)
                                                            <!-- Button trigger modal -->
                                                            <a id="sizes_guide" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                دليل المقاسات
                                                            </a>
                                                            @endif

                                                        </div>
                                                    </li>

                                                </ul>



                                                <div class="product-action">
                                                    <ul>
                                                        <li class="cart cart_li">
                                                            <a class="add-cart-text add-to-cart" data-id="{{$Item->id}}" title="اضف الي السلة" href="javascript:void(0)" style="background: #000;color: #FFF;border: 0;padding: 8px 10px;">
                                                                اضف الي السلة
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                @if($setting->add_to_cart_title != null)
                                                <span style="display: block;margin-top: 10px;">{{ $setting->add_to_cart_title }}</span>
                                                @endif

                                                <p style="color:red;font-weight:bold;margin-bottom: 0px;display: none;" id="note"></p>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-12">
                    <hr style="margin-top: 0">
                </div>

                <div class="col-md-5">
                    <div class="row product_properties_row">
                        <div class="col-md-6 col-6 product_properties">
                            <div class="properties_div">
                                <img src="{{ asset('img/icon1.png') }}">
                                <span>
                                    الدفع عند الاستلام
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 product_properties">
                            <div class="properties_div">
                                <img src="{{ asset('img/icon2.png') }}">
                                <span>
                                    الشحن خلال 24 ساعة
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 product_properties">
                            <div class="properties_div">
                                <img src="{{ asset('img/icon3.png') }}">
                                <span>
                                    عودة سهلة
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6 col-6 product_properties">
                            <div class="properties_div">
                                <img src="{{ asset('img/icon1.png') }}">
                                <span>
                                    للبيع
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="editor_div">
                        {!! $Item->long_description !!}
                    </div>
                </div>


                <div class="col-lg-12" id="reviews">

                    <div class="product-comments">

                        <div class="comments-note" style="margin-top: 10px">

                            <div class="calc-review" style="margin-bottom: 8px">
                                @include('user.includes.calc-review')
                            </div>

                            <ul class="nav nav-tabs comments-advices" id="myTab2" role="tablist" style="margin-top: 20px">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        التقيمات (<span>{{ App\Models\Review::where('product_id',$Item->id)->count() }}</span>)
                                    </a>
                                </li>

                                @php
                                    if(Auth::guard('user')->check()) {
                                        $user = Auth::guard('user')->user();
                                        $user_rating = App\Models\Review::where('user_id',$user->id)->where('product_id',$Item->id)->first();
                                    } else {
                                        $user = null;
                                        $user_rating = null;
                                    }
                                @endphp

                                @if($user == null || ($user != null && $user_rating == null) )
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                            أكتب تقيمك
                                        </a>
                                    </li>
                                @endif

                            </ul>


                            <!-- RH: this is bootstrap 5 tabbed panel -->

                            <div class="tab-content" id="myTab2Content">

                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div id="all_reviews2">
                                        @include('user.includes.reviews')
                                    </div>
                                </div>


                                @if($user == null || ($user != null && $user_rating == null) )
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                                    @if(Auth::guard('user')->check())

                                        @php
                                            $user = Auth::guard('user')->user();
                                            $user_review = App\Models\Review::where('user_id',$user->id)->where('product_id',$Item->id)->first();
                                        @endphp

                                        @if($user_review == null)

                                            {!! Form::open(['url' => "add_review", 'role'=>'form','id'=>'add_review_form','method'=>'post']) !!}

                                                <div class="form-group" style="padding: 20px;padding-bottom:0">

                                                    <input type="hidden" id="product_id" name="product_id" value="{{ $Item->id }}">

                                                    <div class="row" style="margin-bottom: 20px" id="">
                                                        <div class="col-md-12">
                                                            <label style="width: 100%;margin-bottom:15px" class="mt-1"> التقيم </label>
                                                            <div class="css3-rating-stars">
                                                                <input type="radio" name="rate" id="star-rating-v5" value="5" />
                                                                <label for="star-rating-v5"></label>
                                                                <input type="radio" name="rate" id="star-rating-v4" value="4" />
                                                                <label for="star-rating-v4"></label>
                                                                <input type="radio" name="rate" id="star-rating-v3" value="3" />
                                                                <label for="star-rating-v3"></label>
                                                                <input type="radio" name="rate" id="star-rating-v2" value="2" />
                                                                <label for="star-rating-v2"></label>
                                                                <input type="radio" name="rate" id="star-rating-v1"  value="1" />
                                                                <label for="star-rating-v1"></label>
                                                            </div>
                                                            @if ($errors->has('rate'))
                                                                <span class="help-block" style="color:red">
                                                                    <strong>{{ $errors->first('rate') }} </strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <label for="message-text" class="form-control-label">  الملاحظات </label>
                                                            <textarea name="notes" class="rate_notes form-control" placeholder="من فضلك ادخل ملاحظاتك" rows="7">{{ old('notes') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row" style="margin-top: 20px;padding-left: 10px;padding-left: 10px;margin-bottom: 20px;">
                                                        <button type="submit" form="add_review_form" class="btn btn-primary">
                                                            أرسال
                                                        </button>
                                                    </div>

                                                </div>

                                            {!! Form::close() !!}

                                        @endif


                                    @else
                                        <div style="width: 100%;text-align: center;">
                                            <a href="{{ url('login') }}" style="color: #FFF;margin-bottom: 10px;margin-top: 25px;"  class="btn btn-danger m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air login_btn_n">
                                                يجب عليك تسجيل الدخول أولا لتتمكن من إضافة تقيم
                                            </a>
                                        </div>
                                    @endif

                                </div>
                                @endif

                            </div>



                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div>




    @php

        $arr = H_Main_Products();

        if(! empty($arr)) {
            $related_products = App\Models\Product::whereIn('id',$arr)->where('id','!=',$Item->id)->where('sub_category_id',$Item->sub_category_id)->where('status',1)->take(4)->inRandomOrder()->get(['id','title','price' , 'discount','url','pic','brand','price_before_discount']);
        } else {
            $related_products = null;
        }

    @endphp


    @if($related_products != null && $related_products->count() > 0)

    <!-- End Header Mid Area  -->
    <div class="new-product-area home3 mrgn-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>
                            منتجات ذات صله
                        </h2>
                    </div>
                    <div class="custom-row">
                        <div class="fproduct-carousel owl-carousel">

                            @foreach ($related_products as $item)
                                @include('user.includes.product')
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>

            @if( $Item->sub_category != null)
            <div class="row justify-content-center" style="margin-top: 30px;">
                <a href="{{ asset($Item->sub_category->url) }}" class="btn btn-default" type="button" style="border: 1px solid #303AB2;color: #303AB2;border-radius: 0;padding: 10px 25px;width: auto;">
                    استعراض الكل
                </a>
            </div>
            @endif

        </div>
    </div>

    @endif



    @if($Item->sub_category != null && $Item->sub_category->pic != null)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        دليل المقاسات
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-responsive" style="width: 100%;height:80vh" src="{{ Custom_Image_Path('sub_categories_images',$Item->sub_category->pic) }}" alt="product sizes" />
                </div>
                </div>
            </div>
        </div>
    @endif



    @if(Auth::guard('user')->check())

		@php
			$user = Auth::guard('user')->user();
			$user_id = $user->id;
			$edit = App\Models\Review::where('user_id',$user->id)->where('product_id',$Item->id)->first();
		@endphp

		@if(App\Models\Review::where('user_id',$user_id)->where('product_id',$Item->id)->first() !=  null)
			<!--begin::Modal-->
			<div class="modal fade" id="edit_review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel2"> تعديل تقيمك   </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">

							<div class="form-group" id="edit_review_form">

								<input type="hidden" id="hidden" name="hidden" value="{{ $edit->id }}">

								<div class="row" style="margin-bottom: 20px">

                                    <div class="col-md-12">
                                        <label style="width: 100%;margin-bottom:15px" class="mt-1"> التقيم </label>
                                        <div class="css3-rating-stars">
                                            <input type="radio" name="rate" id="edit-star-rating-v5" value="5" @if($edit->rate == 5) {{ 'checked' }} @endif />
                                            <label for="edit-star-rating-v5"></label>
                                            <input type="radio" name="rate" id="edit-star-rating-v4" value="4" @if($edit->rate == 4) {{ 'checked' }} @endif />
                                            <label for="edit-star-rating-v4"></label>
                                            <input type="radio" name="rate" id="edit-star-rating-v3" value="3" @if($edit->rate == 3) {{ 'checked' }} @endif/>
                                            <label for="edit-star-rating-v3"></label>
                                            <input type="radio" name="rate" id="edit-star-rating-v2" value="2" @if($edit->rate == 2) {{ 'checked' }} @endif/>
                                            <label for="edit-star-rating-v2"></label>
                                            <input type="radio" name="rate" id="edit-star-rating-v1"  value="1" @if($edit->rate == 1) {{ 'checked' }} @endif/>
                                            <label for="edit-star-rating-v1"></label>
                                        </div>
                                        @if ($errors->has('rate'))
                                            <span class="help-block" style="color:red">
                                                <strong>{{ $errors->first('rate') }} </strong>
                                            </span>
                                        @endif
                                    </div>
								</div>

								<div class="row">
									<div class="col-md-12">
                                        <label for="message-text" class="form-control-label">  الملاحظات </label>
										<textarea name="notes" id="edit_notes" class="form-control" placeholder="من فضلك ادخل ملاحظاتك" rows="7">{{ $edit->notes }}</textarea>
									</div>
								</div>

							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                الغاء
                            </button>
							<button type="button" id="edit_review_btn" class="btn btn-primary">
                                أرسال
                            </button>
						</div>
					</div>
				</div>
			</div>
			<!--end::Modal-->
		@endif

	@endif


@endsection



@section('footer')


	<script>
		(function($){


            $('#product_size').change(function() {

                var product_size = $('#product_size').val();

                var ele = $(this);

                var ID = ele.attr('data-id');

                if(ID != '' && ID != null && ID > 0 && product_size != '' && product_size != null) {

                    $.ajax({
                        url: '{{ url('change_product_quantity') }}',
                        method: "post",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id : ID,
                            product_size: product_size,
                        },
                        dataType: "json",
                        success: function (response) {

                            $('#product_quantity').val(0)
                            $('#product_quantity').attr('max',response.val)

                            $('#note').text(' الكمية المتاحه من هذا المنتج مع المقاس المختار  '+ response.val + ' قطعه كحد اقصي').css('display','block')

                        }
                    });

                } else {
                    swal({
                        title: "خطاء",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                        text: "لقد حدث خطاء ما برجاء المحاوله ف وقت لاحق",
                    });
                }


            });


            $(".add-to-cart").click(function () {

                var ele = $(this);

                var ID = ele.attr('data-id');

                var product_size = $('#product_size').val();
                var product_quantity = $('#product_quantity').val();

                var cart_count = $("#cart_count");

                if(ID != '' && ID != null && ID > 0 && product_size != '' && product_size != null && product_quantity != '' && product_quantity != null && product_quantity > 0) {

                    $.ajax({
                        url: '{{ url('add-to-cart') }}',
                        method: "post",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id : ID,
                            size: product_size,
                            quantity:product_quantity
                        },
                        dataType: "json",
                        success: function (response) {

                            if(response.msg != null) {
                                swal({
                                    title: "جيد",
                                    text: response.msg,
                                    imageUrl: '{{ asset('img/sent.jpg') }}'
                                });
                            }

                            if(response.error != null) {
                                swal({
                                    title: "خطاء",
                                    type: "warning",
                                    confirmButtonClass: "btn-danger",
                                    text: response.error,
                                });
                            }

                            $('#product_size').val('');
                            $('#product_quantity').val(0);


                            $("#header-bar").html(response.data);
                            $("#header-bar2").html(response.data);
                            cart_count.text(response.count);

                        }
                    });


                } else {
                    swal({
                        title: "خطاء",
                        type: "warning",
                        confirmButtonClass: "btn-danger",
                        text: 'من فضلك اختر مقاس واحد علي الاقل والكمية يجب ان يكون اكبر من او يساوي واحد',
                    });

                }



            });


		})(jQuery);
	</script>


    <script>
        (function($){


            $("#edit_review_btn").click(function () {

                var notes = $('#edit_review_form #edit_notes').val();
                var rate = $("#edit_review_form input[name='rate']:checked").val();
                var hidden = $('#hidden').val();


                $('#edit_review').modal('hide');

                if(hidden != null && rate != null && rate >= 1 && rate <= 5) {

                    $.ajax({
                        url: '{{ url('edit_review') }}',
                        method: "post",
                        data: {
                            _token: '{{ csrf_token() }}',
                            hidden : hidden,
                            notes : notes,
                            rate: rate,
                        },
                        dataType: "json",
                        success: function (response) {

                            if(response.check_validate == true) {
                                $("#all_reviews2").html(response.data);
                                $(".calc-review").html(response.data2);
                            } else {
                                swal({
                                    title: "",
                                    text: response.msg,
                                    type: "warning",
                                    showCancelButton: false,
                                    confirmButtonClass: "btn-danger",
                                    confirmButtonText: "موافق",
                                });
                            }

                        }
                    });

                }


            });


        })(jQuery);
    </script>



 @endsection
