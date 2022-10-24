@extends('user.layouts.master')

@section('sub_title')
    {{ $Item->title }}
@endsection


@php
    $Top_Offer_Row  = App\Models\Top_Offer_Categories::where('category_id',$Item->id)->first();

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
    $Slider_Categories_Arr = App\Models\Slider_Categories::where('category_id',$Item->id)->pluck('slider_id')->toArray();

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
    $Footer_Categories_Arr = App\Models\Footer_Categories::where('category_id',$Item->id)->pluck('footer_id')->toArray();

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
    $all_sub_cat = App\Models\Sub_Category::where('main_category_id',$Item->id)->where('status',1)->orderBy('order','asc')->get();

    if($all_sub_cat != null && $all_sub_cat->count() >= 1) {
        $first_sub_cat = $all_sub_cat[0];
    } else {
        $first_sub_cat = null;
    }

    if($all_sub_cat != null && $all_sub_cat->count() >= 2) {
        $next_six_sub_cat = array_slice($all_sub_cat->toArray(),1,6);
    } else {
        $next_six_sub_cat = null;
    }


@endphp





@if($first_sub_cat != null)

    @php
        $products = App\Models\Product::where('status',1)->where('sub_category_id',$first_sub_cat->id)->inRandomOrder()->get(['id','title','price' , 'discount','url','pic','brand','price_before_discount']);
    @endphp

    @if($products != null && $products->count() > 0)
    <!-- End Header Mid Area  -->
    <div class="new-product-area home3 mrgn-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>
                            {{ $first_sub_cat->sub_title }}
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
            <div class="row justify-content-center" style="margin-top: 30px;">
                <a href="{{ asset($first_sub_cat->url) }}" class="btn btn-default" type="button" style="border: 1px solid #303AB2;color: #303AB2;border-radius: 0;padding: 10px 25px;width: auto;">
                    استعراض الكل
                </a>
            </div>
        </div>
    </div>
    @endif

@endif



@php
    $Ads_Categories_Arr = App\Models\Ads_Categories::where('category_id',$Item->id)->pluck('ads_id')->toArray();

    if(! empty($Ads_Categories_Arr)) {
        $all_cat_ads = App\Models\CategoriesAds::whereIn('id',$Ads_Categories_Arr)->orderBy('order','asc')->where('status',1)->get();
    } else {
        $all_cat_ads = null;
    }

    if($all_cat_ads != null && $all_cat_ads->count() >= 1) {
        $first_cat_ads = $all_cat_ads[0];
    } else {
        $first_cat_ads = null;
    }

    if($all_cat_ads != null && $all_cat_ads->count() >= 2) {
        $second_cat_ads = $all_cat_ads[1];
    } else {
        $second_cat_ads = null;
    }

@endphp


@if($first_cat_ads != null)
<div class="banner-area discount_baner hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>
                     {{ $first_cat_ads->title }}
                </h2>
            </div>
            <div class="col-sm-12 show_desktop">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $first_cat_ads->url1 }}">
                        <img src="{{Custom_Image_Path('ads',$first_cat_ads->pic1) }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-sm-12 show_mobile">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $first_cat_ads->url1 }}">
                        <img src="{{Custom_Image_Path('ads',$first_cat_ads->pic1) }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->
@endif


@if($next_six_sub_cat != null && count($next_six_sub_cat) > 0)

<div class="shop-area mt-4 caegories" style="padding-top: 0;margin-top: 0 !important;">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <div class="shop-right-area">

                    <div class="tab-content mrgn-40" style="margin-bottom: 20px !important">

                        <div id="grid" class="tab-pane fade show active">
                            <div class="row" style="padding-left: 0;padding-right: 0;">

                                @foreach ($next_six_sub_cat as $item)
                                <div class="col-md-4 col-6">
                                    <div class="single-product" style="margin-top: 10px !important">
                                        <div class="product-img banner_box2_image" style="padding: 0;">
                                            <a href="{{ asset($item['url']) }}">
                                                <img src="{{ Custom_Image_Path('sub_categories_images',$item['pic']) }}" style="width:100%" alt="" />
                                                <span style="display:none;background: transparent;color: #000;bottom: 12%;top: auto;right: 10%;font-size: 27px;height: auto;font-weight: bold;" class="new-box">
                                                    {{ $item['sub_title'] }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endif




@if($second_cat_ads != null)
<div class="banner-area discount_baner hidden-xs" style="margin-top: 0px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>
                     {{ $second_cat_ads->title }}
                </h2>
            </div>
            <div class="col-sm-12 show_desktop">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $second_cat_ads->url1 }}">
                        <img src="{{Custom_Image_Path('ads',$second_cat_ads->pic1) }}" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-sm-12 show_mobile">
                <div class="banner-box2 banner_box2_image">
                    <a href="{{ $second_cat_ads->url1 }}">
                        <img src="{{Custom_Image_Path('ads',$second_cat_ads->pic1) }}" alt="" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner Area -->
@endif


@php
    $feature_category = App\Models\Sub_Category::where('main_category_id',$Item->id)->where('status',1)->where('feature',1)->first();
@endphp


@if($feature_category != null && ! empty($feature_category))

    @php
        $products = App\Models\Product::where('status',1)->where('sub_category_id',$feature_category->id)->inRandomOrder()->get(['id','title','price' , 'discount','url','pic','brand','price_before_discount']);
    @endphp

    @if($products != null && $products->count() > 0)
    <!-- End Header Mid Area  -->
    <div class="new-product-area home3 mrgn-40" style="margin-top: 20px;margin-bottom: 0px !important">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>
                            {{ $feature_category->sub_title }}
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
            <div class="row justify-content-center" style="margin-top: 30px;">
                <a href="{{ asset($first_sub_cat->url) }}" class="btn btn-default" type="button" style="border: 1px solid #303AB2;color: #303AB2;border-radius: 0;padding: 10px 25px;width: auto;">
                    استعراض الكل
                </a>
            </div>
        </div>
    </div>
    @endif

@endif




@php
    $main_cats = App\Models\Main_Category::where('id','!=',$Item->id)->take(2)->get(['id','title','pic','url']);
@endphp


@if($main_cats != null && $main_cats->count() > 0)
<div class="shop-area mt-4" style="margin-top: 0 !important;padding-top:0 !important">
    <div class="container">

        <div class="row" style="padding-left: 0;padding-right: 0;">

            <div class="col-md-12"></div>
                <div class="section-title" style="margin-top: 20px;margin-bottom: 0;">
                    <h2>
                        قد يعجبك
                    </h2>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="shop-right-area">

                    <div class="tab-content mrgn-40" style="margin-bottom: 10px !important">

                        <div id="grid" class="tab-pane fade show active">
                            <div class="row" style="padding-left: 0;padding-right: 0;">


                                @foreach ($main_cats as $item)
                                <div class="col-md-6 col-6">
                                    <div class="single-product">
                                        <div class="product-img" style="padding: 0;">
                                            <a href="{{ asset($item->url) }}">
                                                <img src="{{Custom_Image_Path('main_categories_images',$item->pic)}}" style="width:100%" style="width: 100%;" alt="" />
                                                <span style="display:none;background: transparent;color: #000;bottom: 40%;top: auto;right: 40%;font-size: 27px;height: auto;font-weight: bold;" class="new-box">
                                                     {{ $item->title }}
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach


                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endif


@endsection
