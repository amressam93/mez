@extends('user.layouts.master')

@section('header')
<style>

		.single-product-size select {
			border: 1px solid #ccc !important
		}

		.single-qty-btn .sing-pro-qty {
			background: #fff;
			text-align: center;
			margin-bottom: 10px;
		}

		#note {
			color: red;
			font-weight: bold;
			display: block;
			width: 100%;
			overflow: hidden;
		}

		.single-qty-btn .sing-pro-qty {
			width: 100px;
    		margin-right: 10px;
		}

		.single-product-size select {
			width: 100px;
			height: 33px;
		}

		.shopping-cart:hover .shipping-cart-overly {
			overflow-y: scroll;
		}

		.select-product div.bx-wrapper {
			right: -4%;
			max-width: 435px !important;
			width: auto !important;
		}

		.add-cart-text {
            margin-right: 0;
        }

		@media (max-width: 480px) {

		    .select-product div.bx-wrapper {
                right: -1%;
            }

		}

	</style>
@endsection

@section('sub_title')
    {{ $Item->title }}
@endsection

@php
	$setting = App\Models\Setting::first();
	$Banners = App\Models\Banners::first();

	$product_slider = App\Models\Product_Images::where('product_id',$Item->id)->get();

	$x = 1;
	$y = 1;

	$after_15_day = Carbon\Carbon::now()->addDays(-15);
	$after_15_day = Carbon\Carbon::parse($after_15_day)->format('Y-m-d H:i:s');

@endphp


@section('content')

<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section" style="padding-top: 50px">
		<div class="container">

			<div class="row">

				<div class="col-md-12 col-12">
					<!-- SINGLE-PRODUCT-DESCRIPTION START -->
					<div class="row">
						<div class="col-lg-5 col-md-4 col-12">
							<div class="single-product-view">
								<!-- Tab panes -->
								<div class="tab-content">

									@foreach ($product_slider as $item)
									<div class="tab-pane {{$x == 1 ? 'active' : '' }}" id="thumbnail_{{$item->id}}">
										<div class="single-product-image">
											<img src="{{ Custom_Image_Path('product_images',$item->slider) }}" alt="single-product-image" />

											@if($after_15_day <= $Item->created_at)
											<a class="new-mark-box" href="#">جديد</a>
											@endif

											<a class="fancybox" href="{{ Custom_Image_Path('product_images',$item->original_slider) }}" data-fancybox-group="gallery">
												<span class="btn large-btn">
													عرض أكبر
													<i class="fa fa-search-plus"></i>
												</span>
											</a>
										</div>
									</div>
									@php $x = $x + 1; @endphp
									@endforeach


								</div>
							</div>
							<div class="select-product">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs select-product-tab bxslider">
									@foreach ($product_slider as $item)
									<li class="{{ $y == 1 ? 'active' : ''}}">
										<a href="#thumbnail_{{$item->id}}" data-toggle="tab">
											<img src="{{ Custom_Image_Path('product_images',$item->small_slider) }}" alt="pro-thumbnail" /></a>
									</li>
									@php $y = $y + 1; @endphp
									@endforeach
								</ul>
							</div>
						</div>


						<div class="col-lg-7 col-md-8 col-12">
							<div class="single-product-descirption">

								<h2>{{ $Item->title }}</h2>

								<div class="single-product-price">
									<h2>
										@if($Item->discount > 0)
											<span class="price" style="font-size: 25px;color:#BA0202">{{ $Item->price - $Item->discount }} ج.م</span>
											<span class="old-price" style="font-size: 25px">{{ $Item->price }} ج.م</span>
										@else
											<span class="price" style="font-size: 25px;color:#BA0202">{{ $Item->price }} ج.م</span>
										@endif
									</h2>
								</div>
								<div class="single-product-desc">
									<p>
										{{ $Item->short_description }}
									</p>

								</div>


								@php
									$sizes_arr = App\Models\Product_Sizes::where('product_id',$Item->id)->where('quantity','>',0)->pluck('size_id')->toArray();

									if(! empty($sizes_arr)) {
										$sizes = App\Models\Size::whereIn('id',$sizes_arr)->pluck('title','id');
									} else {
										$sizes = null;
									}
								@endphp

								<div class="clearfix"></div>

								<div class="row" style="margin-right:0">

									<div class="single-product-size" style="display: inline-block;position: relative;">
										<p class="small-title">المقاسات  </p>
										<select name="product-size" id="product_size" data-id="{{$Item->id}}">
											<option value="" selected>المقاسات </option>
											@if($sizes != null)
												@foreach($sizes as $key => $value)
												<option value="{{$key}}">{{$value}}</option>
												@endforeach
											@endif
										</select>
										<i class="fa fa-angle-down" style="position: absolute;left: 12%;top: 42%;"></i>
									</div>


									<div class="single-product-quantity" style="display: inline-block;">
										<p class="small-title" style="width:100%;margin-right:10px;margin-bottom: 5px;">الكمية</p>
										<div class="cart-quantity">
											<div class="single-qty-btn">
												<input class="cart-plus-minus sing-pro-qty" id="product_quantity" type="number" value="0" min="0" max="" name="qtybutton">
											</div>
											<br>
										</div>
									</div>

									<p style="color:red;font-weight:bold;margin-bottom: 10px;display: none;" id="note"></p>

								</div>

								@php
									$product_color = App\Models\Product_Colors::where('product_id',$Item->id)->first();

									if($product_color != null) {
										$color = App\Models\Color::where('id',$product_color->color_id)->first();
									} else {
										$color = null;
									}
								@endphp


								<div class="row" style="margin-right:0">
									@if($product_color != null && $color != null)
									<div class="single-product-color" style="width: 100%">
										<p class="small-title"> اللون </p>
										<a href="#">
											<span style="background: {{$color->value}}"></span>
										</a>
									</div>
									@endif
									<div class="single-product-add-cart" style="width: 100%">
										<a class="add-cart-text add-to-cart" data-id="{{$Item->id}}" title="اضف الي السلة" href="javascript:void(0)">
											أضف الي السلة
										</a>
									</div>
								</div>


							</div>
						</div>


					</div>
					<!-- SINGLE-PRODUCT-DESCRIPTION END -->



					<!-- RELATED-PRODUCTS-AREA START -->
					<div class="row">

						<div class="col-md-9 col-12">

							<div class="product-more-info-tab">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs more-info-tab">
									<li class="active">
										<a href="#moreinfo" data-toggle="tab">
											مزيد من التفاصيل
										</a>
									</li>
									<li>
										<a href="#datasheet" data-toggle="tab">
											المقاسات
										</a>
									</li>
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">

									<div class="tab-pane active" id="moreinfo">
										<div class="tab-description">
											<p>
												{!! $Item->long_description !!}
											</p>
										</div>
									</div>

									<div class="tab-pane" id="datasheet">
										@if($Item->sub_category != null)
										<img class="img-responsive" src="{{ Custom_Image_Path('sub_categories_images',$Item->sub_category->pic) }}" alt="product sizes" />
										@endif
									</div>


								</div>
							</div>



							@php

								$arr = H_Main_Products();

								if(! empty($arr)) {
									$related_products = App\Models\Product::whereIn('id',$arr)->where('id','!=',$Item->id)->where('sub_category_id',$Item->sub_category_id)->where('status',1)->take(4)->inRandomOrder()->get();
								} else {
									$related_products = null;
								}

							@endphp


							@if($related_products != null && $related_products->count() > 0)

								<div class="left-title-area">
									<h2 class="left-title">منتجات ذات صله</h2>
								</div>

								<!-- ALL GATEGORY-PRODUCT START -->
								<div class="all-gategory-product">
									<div class="row gategory-product">

										@foreach ($related_products as $item)
										<!-- SINGLE ITEM START -->
										<div class="col-xl-3 col-lg-4 col-md-6 col-12">
											<div class="gategory-product-list">
												@include('user.includes.shop_product',['item' => $item])
											</div>
										</div>
										<!-- SINGLE ITEM END -->
										@endforeach

									</div>
								</div>
								<!-- ALL GATEGORY-PRODUCT END -->

							@endif


						</div>

						<div class="col-md-3 col-12">

							@php
								$tags = App\Models\Product_Tags::where('product_id',$Item->id)->get();
							@endphp

							@if($tags->count() > 0)
							<!-- SINGLE SIDE BAR START -->
							<div class="single-product-right-sidebar clearfix">
								<h2 class="left-title"> التاجات </h2>
								<div class="category-tag">
									@foreach ($tags as $tag)
									<a href="{{ url($tag->url) }}">{{$tag->tag}}</a>
									@endforeach
								</div>
							</div>
							<!-- SINGLE SIDE BAR END -->
							@endif


							@if($Banners->status8 == 1)
							<!-- SINGLE SIDE BAR START -->
							<div class="single-product-right-sidebar">
								<div class="slider-right zoom-img">
									<a href="{{ $Banners->url8 }}">
										<img class="img-responsive" src="{{ Image_Path($Banners->pic8) }}" alt="sidebar left" />
									</a>
								</div>
							</div>
							@endif
						</div>
						<!-- SINGLE SIDE BAR END -->

					</div>
					<!-- RELATED-PRODUCTS-AREA END -->

				</div>



			</div>
		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->


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

			var cart_count = $(".ajax-cart-quantity");

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



 @endsection
