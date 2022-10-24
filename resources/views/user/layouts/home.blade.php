@extends('user.layouts.master')

@section('sub_title')
    الرئيسية
@endsection

@section('header')
     <style>
     </style>
@endsection



@php
    $Top_Offer_Row  = App\Models\Top_Offer_Categories::where('category_id',0)->first();

    if($Top_Offer_Row != null) {
        $top_offer = App\Models\Top_Offer::where('id',$Top_Offer_Row->top_offer_id)->first();
    } else {
        $top_offer = null;
    }
@endphp


@if($top_offer != null)

    @section('top_offer')
    <div class="header-bottom-area" id="top_offer" style="padding-top: 0;padding-bottom: 0;background: #FFFF;">

        <div class="container-fluid">
            <div class="row" style="padding-left: 0;padding-right: 0;">
                <div class="col-12"  style="padding-top:0px;padding-left: 0;padding-right: 0;">
                    <div class="offer-strip-container ar" style="background: {{ $top_offer->color }}">
                        <a href="{{ $top_offer->link }}" style="color: #fff">
                            <span class="offer-strip-normal">
                                {{ $top_offer->title }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Header Bottom Area 3 -->
    @endsection

@endif



@section('content')


@php
    $Slider_Categories_Arr = App\Models\Slider_Categories::where('category_id',0)->pluck('slider_id')->toArray();

    if(! empty($Slider_Categories_Arr)) {
        $sliders = App\Models\Slider::whereIn('id',$Slider_Categories_Arr)->get();
    } else {
        $sliders = null;
    }

    $x2 = 0;
    $x3 = 0;

@endphp


@if($sliders != null)
<section class="main_slider" style="overflow: hidden;">
    <div class="container">
        <div class="row">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                @if($sliders->count() > 1)
                <div class="carousel-indicators">
                    @foreach ($sliders as $slider)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $x2 }}" @if($x2 == 0) class="active" aria-current="true" @endif aria-label="Slide {{ $x2 }}"></button>
                    @php $x2 = $x2 + 1; @endphp
                    @endforeach
                </div>
                @endif


                <div class="carousel-inner">

                    @foreach ($sliders as $slider)
                        <div class="carousel-item {{ $x3 == 0 ? 'active' : '' }}">

                            <a href="{{ $slider->url }}">
                                <img src="{{ Image_Path($slider->pic1) }}" class="slider_image d-block w-100" alt="...">
                            </a>

                        </div>
                        @php $x3 = $x3 + 1; @endphp
                    @endforeach

                </div>

                @if($sliders->count() > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </button>
                @endif

            </div>
        </div>
    </div>
</section>
@endif



@php
    $Footer_Categories_Arr = App\Models\Footer_Categories::where('category_id',0)->pluck('footer_id')->toArray();

    if(! empty($Footer_Categories_Arr)) {
        $advantages = App\Models\Footer::whereIn('id',$Footer_Categories_Arr)->get();
    } else {
        $advantages = null;
    }
@endphp


@if($advantages != null)
<div class="header-mid-area hidden-xs mrgn-40">
    <div class="container">
        <div class="row" style="border: 1px solid #DDD;padding-top: 10px;padding-bottom: 10px;">

            @foreach ($advantages as $advantage)
            <div class="col-md-3 col-6">
                <div class="header-mid-inner">
                    <div class="header-mid-inner-icon">
                        <img src="{{ Custom_Image_Path('advatage_images',$advantage->icon) }}" style="width: 50px;height: 50px;border-radius: 50%;"/>
                    </div>
                    <div class="header-mid-info">
                        <span class="title-upper">
                            {{ $advantage->title }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Header Mid Area  -->
@endif



@php
    $Home_Ads = App\Models\Home_Ads::first();
@endphp


@if($Home_Ads->status1 == 1)

    <div class="banner-area mrgn-40 hidden-xs show_desktop" style="margin-bottom: 0">
        <div class="container">
            <div class="row">

                @if($Home_Ads->title_v1 != null)
                <div class="col-sm-12">
                    <h2>
                        {{ $Home_Ads->title_v1 }}
                    </h2>
                </div>
                @endif

                <div class="col-md-6">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link1_v1 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v1) }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6" style="padding-right: 0;">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link2_v1 }}">
                            <img  src="{{Custom_Image_Path('ads',$Home_Ads->pic2_v1) }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->


    <section class="what_new variable-width-section show_mobile" style="padding: 0;">
        <div class="container">

            <div class="row">

                @if($Home_Ads->title_v1 != null)
                <div class="col-sm-12">
                    <h2>
                        {{ $Home_Ads->title_v1 }}
                    </h2>
                </div>
                @endif

                <div class="variable-width">
                    <div>
                        <a href="{{ $Home_Ads->link1_v1 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v1) }}" alt="" />
                        </a>
                    </div>
                    <div>
                        <a href="{{ $Home_Ads->link2_v1 }}">
                            <img  src="{{Custom_Image_Path('ads',$Home_Ads->pic2_v1) }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endif





@if($Home_Ads->status4 == 1)

    <!-- old -->
    <div class="banner-area mrgn-40 hidden-xs show_desktop" style="margin-bottom: 0">
        <div class="container">
            <div class="row">

                @if($Home_Ads->title_v4 != null)
                <div class="col-sm-12">
                    <h2>
                        {{ $Home_Ads->title_v4 }}
                    </h2>
                </div>
                @endif

                <div class="col-md-4">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link1_v4 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v4) }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link2_v4 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic2_v4) }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link3_v4 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic3_v4) }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->


    <section class="test_ads variable-width-section show_mobile" style="padding: 0;">
        <div class="container">
            <div class="row">

                @if($Home_Ads->title_v4 != null)
                <div class="col-sm-12">
                    <h2>
                        {{ $Home_Ads->title_v4 }}
                    </h2>
                </div>
                @endif

                <div class="variable-width">
                    <div>
                        <a href="{{ $Home_Ads->link1_v4 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v4) }}" alt="" />
                        </a>
                    </div>
                    <div>
                        <a href="{{ $Home_Ads->link2_v4 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic2_v4) }}" alt="" />
                        </a>
                    </div>
                    <div>
                        <a href="{{ $Home_Ads->link3_v4 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic3_v4) }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif




@if($Home_Ads->status2 == 1)

    <div class="banner-area discount_baner mrgn-40 hidden-xs" style="margin-bottom: 0px !important">
        <div class="container">
            <div class="row">

                @if( $Home_Ads->title_v2 != null)
                <div class="col-sm-12">
                    <h2>
                        {{ $Home_Ads->title_v2 }}
                    </h2>
                </div>
                @endif


                <div class="col-sm-12 show_desktop">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link1_v2 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v2) }}" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 show_mobile">
                    <div class="banner-box2 banner_box2_image">
                        <a href="{{ $Home_Ads->link1_v2 }}">
                            <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v2) }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->

@endif




@php
    $HomeProducts = App\Models\HomeProducts::first();
@endphp

@if($HomeProducts != null && $HomeProducts->status == 1)

    @php
        $products = App\Models\Product::where('status',1)->where('sub_category_id',$HomeProducts->sub_category_id)->inRandomOrder()->get(['id','title','price' , 'discount','url','pic','brand','price_before_discount']);
    @endphp

    @if($products != null && $products->count() > 0)

        <!-- End Header Mid Area  -->
        <div class="new-product-area home3 mrgn-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>
                                {{ $HomeProducts->title }}
                            </h2>
                        </div>
                        <div class="custom-row">
                            <div class="fproduct-carousel owl-carousel">

                                @foreach ($products as $item)
                                    @include('user.includes.product')
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                @if( $HomeProducts->sub_category != null)
                <div class="row justify-content-center" style="margin-top: 30px;">
                    <a href="{{ asset($HomeProducts->sub_category->url) }}" class="btn btn-default" type="button" style="border: 1px solid #303AB2;color: #303AB2;border-radius: 0;padding: 10px 25px;width: auto;">
                        استعراض الكل
                    </a>
                </div>
                @endif

            </div>
        </div>

    @endif

@endif






@if($Home_Ads->status3 == 1)

<div class="banner-area discount_baner mrgn-40 hidden-xs" style="margin-bottom: 10px !important">
    <div class="container">
        <div class="row">

            @if($Home_Ads->title_v3 != null)
            <div class="col-sm-12">
                <h2>
                    {{ $Home_Ads->title_v3 }}
                </h2>
            </div>
            @endif

            <div class="col-sm-12 show_desktop">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $Home_Ads->link1_v3 }}">
                        <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v3) }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-sm-12 show_mobile">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $Home_Ads->link1_v3 }}">
                        <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v3) }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->

@endif




@if($Home_Ads->status5 == 1)

<div class="banner-area discount_baner mrgn-40 hidden-xs show_mobile">
    <div class="container">
        <div class="row">

            @if($Home_Ads->title_v5 != null)
            <div class="col-sm-12">
                <h2>
                    {{ $Home_Ads->title_v5 }}
                </h2>
            </div>
            @endif

            <div class="col-sm-12 show_mobile">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $Home_Ads->link1_v5 }}">
                        <img src="{{Custom_Image_Path('ads',$Home_Ads->pic1_v5) }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->

@endif




@endsection


@section('footer')

    <script type="text/javascript" src="{{asset('user/slick')}}/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.variable-width').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                centerMode: false,
                variableWidth: false,
                rtl:true,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
            });
        });
    </script>

@endsection
