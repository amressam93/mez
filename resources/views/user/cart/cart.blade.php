@extends('user.layouts.master')

@section('sub_title')
عربه المشريات
@endsection

@section('header')
	<style>


        .primari-box {
            background: #fbfbfb none repeat scroll 0 0;
            border: 1px solid #d6d4d4;
            line-height: 23px;
            margin: 0 0 30px;
            padding: 14px 18px 13px;
        }

		.returne-continue-shop a.procedtocheckout {
			float: right;
		}

		.total-price-container {
			text-align: right !important;
    		padding-top: 13px !important;
		}

		.un_active { display: none }

		#headingThree {
			background: #ff4f4f none repeat scroll 0 0;
			border-radius: 4px;
			color: #fff;
			display: block;
			float: left;
			font-size: 20px;
			line-height: 50px;
			transition: all 500ms ease 0s;
			cursor: pointer;
		}

		.btn-link , .btn-link:hover {
			color: #FFF;
			font-weight: bold;
			font-size: 20px;
			text-decoration: none
		}

		.col-sm-6 , .col-12 { margin-bottom: 20px }


		.cart-plus-minus { text-align: center }

		.media-body a {
		    background:transparent !important;
		}


        .btn-check:focus+.btn, .btn:focus {
            outline: 0;
            box-shadow: none;
        }

        .table-content table td {
            text-align: center !important
        }

        .cart-area {
            min-height: 600px;
            margin-top: 120px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .cart-area .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .cart-area {
                margin-top: 136px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .cart-area {
                margin-top: 162px !important;
                padding-top: 0 !important;
            }
        }


	</style>

	<style>

		.g-recaptcha {
            transform: scale(1) !important;
			margin-right: 15px
        }

        @media (max-width: 600px) {

            .table tbody > tr > td.cart_quantity {
                min-width: 80px;
            }

            .dec , .inc {
    		    display:inline-block
    		}

    		.dec {
    		    margin-top: 3px;
    		}

            .g-recaptcha,.g-recaptcha div:first-of-type  {
                max-width: 100% !important;

                transform-origin: 0 0 !important;
                -webkit-transform-origin: 0 0 !important;
                width: auto !important;
                display: flex;
                justify-content: flex-start;
            }

            #rc-imageselect {

                transform-origin:0 0 !important;
                -webkit-transform-origin:0 0 !important;
            }


        }

    </style>

@endsection

@section('content')


<!-- cart area start -->
<div class="cart-area mt-4 mrgn-40" style="min-height: 500px;padding-bottom: 50px;padding-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="entry-title">
                    <h2>البطاقة</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @if(! Auth::guard('user')->check())

                <div class="col-12" style="margin-bottom: 20px">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed">
                                برجاء تسجيل الدخول اولا لكي تتكمن من استكمال الدفع
                                </button>
                            </h5>
                            </div>
                            <div id="collapseThree" class="collapse">
                            <div class="card-body">


                                <div class="row">

                                    <div class="col-12">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <!-- REGISTERED-ACCOUNT START -->
                                        <div class="primari-box registered-account">

                                            {!! Form::open([ 'url' => 'checkout_login', 'role' => 'form' , 'id'=>'accountLogin' , 'method' => 'post', 'class' => 'new-account-box' ]) !!}

                                                <h3 style="margin-bottom:20px" class="box-subheading">تمتلك حساب بالفعل</h3>

                                                <div class="form-content">
                                                    <div class="col-12">
                                                        <label for="email">الهاتف المحمول أو البريد الإلكتروني</label>
                                                        <input type="text" placeholder="الهاتف المحمول أو البريد الإلكتروني" name="email_or_mobile" value="{{ old('email_or_mobile') }}" id="email" class="form-control input-feild" required>
                                                        @if ($errors->has('email_or_mobile'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('email_or_mobile') }} </strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="password">كلمة المرور</label>
                                                        <input type="password" value="" placeholder="كلمة المرور" name="pass" id="pass" required class="form-control input-feild">
                                                        @if ($errors->has('pass'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('pass') }} </strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="forget-password">
                                                        <p>
                                                            <label style="margin-right: 15px;" class="kaycee-form__label kaycee-form__label-for-checkbox inline">
                                                                <input class="kaycee-form__input kaycee-form__input-checkbox"
                                                                        name="remember" type="checkbox" id="rememberme" value="forever">
                                                                <span>تذكرني</span>
                                                            </label>

                                                            <a style="float: left" href="{{ url('password/reset') }}">نسيت  كلمه المرور ؟ </a>
                                                        </p>
                                                    </div>
                                                    <div class="submit-button" style="margin-right: 15px;">
                                                        <button type="submit" form="accountLogin" id="signinCreate" class="btn main-btn">
                                                            <span>
                                                                <i class="fa fa-lock submit-icon"></i>
                                                                تسجيل الدخول
                                                            </span>
                                                        </button>
                                                    </div>



                                                </div>

                                            {!! Form::close() !!}

                                        </div>
                                        <!-- REGISTERED-ACCOUNT END -->
                                    </div>


                                    <div class="col-md-6 col-12">
                                        <!-- CREATE-NEW-ACCOUNT START -->
                                        <div class="create-new-account">

                                            {!! Form::open([ 'url' => 'checkout_register', 'role' => 'form' , 'id'=>'create-new-account' , 'method' => 'post', 'class' => 'new-account-box primari-box' ]) !!}
                                                <h3 style="margin-bottom: 20px" class="box-subheading">إنشاء حساب</h3>
                                                <div class="form-content">

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label for="name">الاسم بالكامل</label>
                                                            <input type="text" name="name" placeholder="الاسم بالكامل" value="{{ old('name') }}" id="name" class="form-control input-feild" required>
                                                            @if ($errors->has('name'))
                                                                <span class="help-block" style="color:red">
                                                                    <strong>{{ $errors->first('name') }} </strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <label for="email">البريد الالكتروني</label>
                                                            <input type="email" name="email" placeholder="البريد الالكتروني" value="{{ old('email') }}" id="email" class="form-control input-feild" required>
                                                            @if ($errors->has('email'))
                                                                <span class="help-block" style="color:red">
                                                                    <strong>{{ $errors->first('email') }} </strong>
                                                                </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-lg-6 col-sm-6 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                                                            <label>  رقم الموبيل <span class="text-danger">*</span>   </label>
                                                            <input type="text" name="mobile" onkeypress="return isNumberKey(event)" class="form-control m-input" required="required" value="{{ old('mobile') }}" placeholder=" رقم الموبيل   ">
                                                            @if ($errors->has('mobile'))
                                                                    <span class="help-block" style="color:red">
                                                                        <strong>{{ $errors->first('mobile') }} </strong>
                                                                    </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 {{ $errors->has('gender') ? ' has-error' : '' }}">
                                                            <label>  الجنس <span class="text-danger">*</span> </label>
                                                            <select name="gender" id="gender" class="form-control" required>
                                                                <option value="" disabled selected="true">   اختر الجنس </option>
                                                                <option value="ذكر" @if(old('gender') == 'ذكر') {{ 'selected' }} @endif>  ذكر </option>
                                                                <option value="انثي" @if(old('gender') == 'انثي') {{ 'selected' }} @endif>  انثي </option>
                                                            </select>
                                                            @if ($errors->has('gender'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('gender') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-md-6 col-sm-6 {{ $errors->has('gov_id') ? ' has-error' : '' }}">
                                                            <label>  المحافظة <span class="text-danger">*</span> </label>
                                                            <select name="gov_id" id="gov_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                                                                <option value="" disabled selected="true">  اختر محافظه </option>
                                                                @foreach (H_Governorates() as $key => $value)
                                                                    <option value="{{ $key }}" @if(old('gov_id') == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('gov_id'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('gov_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>


                                                        <div class="col-md-6 col-sm-6 {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                            <label>  المدينة <span class="text-danger">*</span> </label>
                                                            <select name="city_id" id="city_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                                                                <option value="" disabled selected="true">  اختر مدينة </option>
                                                            </select>
                                                            @if ($errors->has('city_id'))
                                                            <span class="help-block" style="color:red">
                                                                <strong>{{ $errors->first('city_id') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-lg-6 col-sm-6  {{ $errors->has('password') ? ' has-error' : '' }}">
                                                            <label> كلمه المرور   </label>
                                                            <input type="password" name="password" required class="form-control m-input" value="" placeholder="  كلمه المرور ">
                                                            @if ($errors->has('password'))
                                                                    <span class="help-block" style="color:red">
                                                                        <strong>{{ $errors->first('password') }} </strong>
                                                                    </span>
                                                            @endif
                                                        </div>

                                                        <div class="col-lg-6 col-sm-6  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                            <label> كرر كلمه المرور   </label>
                                                            <input type="password" name="password_confirmation" required class="form-control m-input" value="" placeholder="  كرر كلمه المرور  ">
                                                            @if ($errors->has('password_confirmation'))
                                                                    <span class="help-block" style="color:red">
                                                                        <strong>{{ $errors->first('password_confirmation') }} </strong>
                                                                    </span>
                                                            @endif
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="g-recaptcha" data-sitekey="{{env('RECAPTCHA_KEY')}}"></div>
                                                                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                                        </div>

                                                        <p style="margin-right: 15px">
                                                            <input type="checkbox" id="privacy" required name="privacy" value="1">
                                                            <label for="privacy" style="color: #666;font-weight: normal;cursor:pointer">
                                                                أوافق على شروط الخدمة و
                                                                <a style="font-weight: bold" href="{{ url('privacy') }}" class="kaycee-privacy-policy-link" target="_blank">
                                                                    سياسة الاستخدام
                                                                </a>.
                                                            </label>
                                                            @if ($errors->has('privacy'))
                                                                    <span class="help-block" style="color:red">
                                                                        <strong>{{ $errors->first('privacy') }} </strong>
                                                                    </span>
                                                            @endif
                                                        </p>



                                                    </div>

                                                    <div class="submit-button">

                                                        <button type="submit" form="create-new-account" id="SubmitCreate" class="btn main-btn">
                                                            <span>
                                                                <i class="fa fa-user submit-icon"></i>
                                                                إنشاء حساب
                                                            </span>
                                                        </button>

                                                    </div>

                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <!-- CREATE-NEW-ACCOUNT END -->
                                    </div>



                                </div>


                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            @endif



            <div class="col-xs-12">
                <div class="cart-content">
                    <form action="#">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">الصورة</th>
                                        <th class="product-name">المنتج</th>
                                        <th class="product-price">السعر</th>
                                        <th class="product-quantity">الكمية</th>
                                        <th class="product-subtotal">الأجمالي</th>
                                        <th class="product-remove">الحذف</th>
                                    </tr>
                                </thead>


                                    @php $total = 0; @endphp

                                    @if(session('cart'))

                                        @if(count((array) session('cart')) > 0)

                                            <!-- TABLE BODY START -->
                                            <tbody>

                                                @foreach((array) session('cart') as $id => $details)

                                                    @php
                                                        $total += $details['price'] * $details['quantity'];
                                                        $product = App\Models\Product::where('id',$details['product_id'])->first();

                                                        $color =  App\Models\Color::where('id',$details['color'])->first();
                                                        $size =  App\Models\Size::where('id',$details['size'])->first();

                                                        $check = App\Models\Product_Sizes::where('product_id',$details['product_id'])->where('size_id',$details['size'])->first();

                                                        if($check == null) {
                                                            $max = 0;
                                                        } else {
                                                            $max = $check->quantity;
                                                        }

                                                    @endphp


                                                    <!-- SINGLE CART_ITEM START -->
                                                    <tr class="cart_item">
                                                        <td class="cart-product">
                                                            <a href="{{ $product != null ? url($product->url) : '' }}">
                                                                <img alt="Blouse" src="{{ Custom_Image_Path('products',$details['photo']) }}" style="height:80px">
                                                            </a>
                                                        </td>
                                                        <td class="cart-description">
                                                            <p class="product-name">
                                                                <a href="{{ $product != null ? url($product->url) : '' }}">
                                                                    {{ $details['name'] }}
                                                                </a>
                                                            </p>
                                                            <small>اللون : {{ $color->title  }} </small>
                                                            <small>المقاس : {{ $size->title  }} </small>
                                                        </td>
                                                        <td  class="cart-unit">
                                                            <ul class="price text-right">
                                                                <li class="price">
                                                                    ج.م
                                                                    {{ $details['price'] }}
                                                                </li>
                                                            </ul>
                                                        </td>

                                                        <td class="product-quantity cart_quantity text-center">
                                                            <input class="cart-plus-minus" onkeypress="return isNumberKey(event)" type="text" name="qtybutton" data-id="{{ $id }}" data-product="{{ $details['product_id'] }}" data-max="{{ $max }}" value="{{$details['quantity']}}">
                                                        </td>


                                                        <td class="cart-total">
                                                            <span class="price product_total">
                                                                ج.م
                                                                {{ $details['price'] * $details['quantity'] }}
                                                            </span>
                                                        </td>

                                                        <td class="product-remove cart-delete text-center">
                                                            <a href="javascript:void(0)" data-id="{{ $id }}"  class="cart_quantity_delete" title="حذف">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>


                                                    </tr>
                                                    <!-- SINGLE CART_ITEM END -->

                                                @endforeach

                                            </tbody>
                                            <!-- TABLE BODY END -->

                                            <!-- TABLE FOOTER START -->
                                            <tfoot>

                                                <tr>
                                                    <td class="total-price-container text-right" colspan="4">
                                                        <span>الأجمالي</span>
                                                    </td>
                                                    <td id="total-price-container" class="price" colspan="1">
                                                        <span id="cart_total">
                                                            ج.م
                                                            {{$total}}
                                                        </span>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                            <!-- TABLE FOOTER END -->

                                        @endif

                                    @else

                                    <tbody>
                                        <tr>
                                            <td colspan="6">
                                                عفوا لم يتم اضافه منتجات بعد
                                            </td>
                                        </tr>
                                    </tbody>

                                    @endif




                            </table>
                        </div>


                    </form>
                </div>
            </div>



            @if(Auth::guard('user')->check())
            <div class="col-12" style="padding: 0;margin:0">
                <!-- RETURNE-CONTINUE-SHOP START -->
                <div class="wc-proceed-to-checkout">

                    @if(count((array) session('cart')) > 0)
                    <a href="{{ url('checkout') }}" style="margin-top: 0">
                        ادفع
                    </a>
                    @endif

                </div>
                <!-- RETURNE-CONTINUE-SHOP END -->
            </div>
            @endif


        </div>
    </div>
</div>
<!-- cart area end -->






@endsection






@section('footer')

	<script>
		(function($){

			$(".qtybutton").on("click", function() {

				var $button = $(this);

				var oldValue = $button.parent().find("input").val();

				var Max = $button.parent().find("input").attr("data-max");

				if ($button.text() == "+") {
					var newVal = parseInt(oldValue) + 1;
				} else {
					// Don't allow decrementing below zero
					if (oldValue > 0) {
						var newVal = parseInt(oldValue) - 1;
					} else {
						newVal = 0;
					}
				}

				if(newVal > 0) {

					if(parseInt(newVal) <= parseInt(Max)) {
						$button.parent().find("input").val(newVal);
					} else {
						swal({
							title: "خطاء",
							type: "warning",
							confirmButtonClass: "btn-danger",
							text: "عفوا هذه الكمية اكبر من المتاحه حاليا",
						});
					}

				}

			});


			$(".qtybutton").click( function() {

				var ele = $(this).siblings('.cart-plus-minus');

				var ID = ele.attr("data-product");

				var max = ele.attr("data-max");

				var quantity = ele.val();

				if(parseInt(quantity) > parseInt(max)) {
					swal({
						title: "خطاء",
						type: "warning",
						confirmButtonClass: "btn-danger",
						text: "عفوا هذه الكمية اكبر من المتاحه حاليا",
					});

					return false;
				}


				var parent_row = ele.parents(".cart_item");

				var product_total = parent_row.find('.product_total');

				var cart_total = $("#cart_total");

				if(quantity != null && quantity > 0 ) {

					$.ajax({
						url: '{{ url('update-cart') }}',
						method: "patch",
						data: {
							_token: '{{ csrf_token() }}',
							id: ele.attr("data-id"),
							quantity: quantity,
							main_id:ID
						},
						dataType: "json",
						success: function (response) {

							$("#header-bar").html(response.data);
							$("#header-bar2").html(response.data);

							cart_total.text(' ج.م ' + response.total);
							product_total.text(' ج.م ' + response.subTotal);


						}
					});

				}





			});


			$('.cart-plus-minus').on('change',function() {

				var ele = $(this);

				var ID = ele.attr("data-product");

				var max = ele.attr("data-max");

				var quantity = ele.val();

				if(parseInt(quantity) > parseInt(max)) {

					ele.val(max);

					swal({
						title: "خطاء",
						type: "warning",
						confirmButtonClass: "btn-danger",
						text: "عفوا هذه الكمية اكبر من المتاحه حاليا",
					});

					return false;
				}


				var parent_row = ele.parents(".cart_item");

				var product_total = parent_row.find('.product_total');

				var cart_total = $("#cart_total");

				if(quantity != null && quantity > 0 ) {

					$.ajax({
						url: '{{ url('update-cart') }}',
						method: "patch",
						data: {
							_token: '{{ csrf_token() }}',
							id: ele.attr("data-id"),
							quantity: quantity,
							main_id:ID
						},
						dataType: "json",
						success: function (response) {

							$("#header-bar").html(response.data);
							$("#header-bar2").html(response.data);

							cart_total.text(' ج.م ' + response.total);
							product_total.text(' ج.م ' + response.subTotal);


						}
					});

				}


			});


			$(".cart_quantity_delete").click(function () {

				var element = $(this);

				var parent_row = element.parents(".cart_item");

				var cart_total = $("#cart_total");

				var cart_count = $("#cart_count");

				swal({
					title: "هل تريد حقًا حذف هذا المنتج من سلة التسوق؟",
					text: "بعد حذف هذا المنتج ، لا يمكنك الرجوع.",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "yes",
					cancelButtonText: "no",
					closeOnConfirm: true,
					closeOnCancel: true
				},
				function (isConfirm) {
					if (isConfirm) {

						$.ajax({
							url: '{{ url('remove-from-cart') }}',
							method: "DELETE",
							data: {
								_token: '{{ csrf_token() }}',
								id: element.attr("data-id")},
							dataType: "json",
							success: function (response) {

								parent_row.remove();

								cart_total.text(response.total);
								cart_count.text(response.count);

								$("#header-bar").html(response.data);
								$("#header-bar2").html(response.data);

								if(response.total <= 0) {
									$('tfoot').addClass('un_active');
								}

							}
						});

					}
				});




			});


			$('#headingThree').click(function() {

				$('.collapse').slideToggle();

			})




		})(jQuery);
   </script>


    <script>

		$(document).ready(function() {

			$('select[name="gov_id"]').on('change', function() {

				var gov_id = $(this).val();

				if(gov_id) {

					$.ajax({
						url: '{{ url('ajax_cities/') }}' + '/' + gov_id,
						type: "GET",
						dataType: "json",
						success:function(data) {

							$('select[name="city_id"]').empty();
							$('select[name="city_id"]').append('<option value="" disabled selected> اختر مدينة  </option>');

							$.each(data, function(key, value) {
								$('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
							});

							$('#city_id').selectpicker('refresh');

						}
					});
				}else{
					$('select[name="city_id"]').empty();

				}
			});

		});

	</script>

	<script>
		// is number //
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		}
	</script>

   <script src='https://www.google.com/recaptcha/api.js'></script>

	<script>
		$(function(){
			function rescaleCaptcha(){
				var width = $('.g-recaptcha').parent().width();
				var scale;
				if (width < 302) {
				scale = width / 302;
				} else{
				scale = 1.0;
				}

				$('.g-recaptcha').css('transform', 'scale(' + scale + ')');
				$('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
			}

			rescaleCaptcha();
			$( window ).resize(function() { rescaleCaptcha(); });

		});
	</script>




@endsection
