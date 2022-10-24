@extends('user.layouts.master')

@section('sub_title')
	الدفع
@endsection

@php
	$user = Auth::guard('user')->user();
	$setting = App\Models\Setting::first();
@endphp


@section('header')

	<style>

	    #email {
	        text-align:right;
	    }

        .primari-box {
            background: #fbfbfb none repeat scroll 0 0;
            border: 1px solid #d6d4d4;
            line-height: 23px;
            margin: 0 0 30px;
            padding: 14px 18px 13px;
            margin-top: 50px
        }

		div.registered-account .primary-form-group input,
		div.create-new-account .primary-form-group input {
			max-width: none;
		}

		.registered-account a {
			text-decoration: none;
			font-size: unset;
		}

		.form-control {
			margin-bottom: 20px
		}

		.help-block strong { display: block }

		.or-seperator {
            margin-top: 20px;
            text-align: center;
            border-top: 1px solid #ccc;
        }
        .or-seperator i {
            padding: 0 10px;
            background: #f7f7f7;
            position: relative;
            top: -11px;
            z-index: 1;
        }

		.order_table table { width: 100%;}

		thead {
			background: #BA0202;
    		color: #FFF;
		}

		thead tr {
			height: 50px;
    		text-align: center;
		}

		tbody tr {
			height: 110px;
    		text-align: center;
			border-bottom: 1px solid #DDD;
		}

		tfoot tr {
			height: 50px;
    		text-align: center;
			border-bottom: 1px solid #DDD;
		}


		th,td { text-align: right;padding-right: 20px; }

		#create-new-account { width: 100%;}

		.coupon_inner , .submit-button {
			margin-right: 20px
		}

        .main-content-section {
            min-height: 600px;
            margin-top: 80px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .main-content-section .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .main-content-section {
                margin-top: 166px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .main-content-section {
                margin-top: 192px !important;
                padding-top: 0 !important;
            }
        }

	</style>

	<style>

		.g-recaptcha {
			margin-right: 15px
        }

        @media (max-width: 600px) {

			#verify {
				margin-bottom: 20px
			}

            .g-recaptcha,.g-recaptcha div:first-of-type  {
                max-width: 100% !important;
				transform-origin: 50% 50% !important;
				-webkit-transform-origin: 50% 50% !important;
				width: auto !important;
				display: flex;
				justify-content: center;
				margin-top: 10px;
            }

            #rc-imageselect {

                transform-origin:0 0 !important;
                -webkit-transform-origin:0 0 !important;
            }

            td,th {
                padding-left:20px;
                padding-right:20px;
            }

            .form-content label {
                text-align:right;
                width:100%;
            }

            .form-content input[type="checkbox"] {
                float: right;
                margin-right: -20px;
                margin-top: 6px;
            }

            .form-content label {
                float: left;
            }


        }

    </style>

@endsection

@php
	$user = Auth::guard('user')->user();
	$city = App\Models\Cities::where('id',$user->city_id)->first();

	if($city == null) {
		$shipping_value = 0;
	} else {
		$shipping_value = $city->shipping_value;
	}

@endphp

@section('content')

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section"  style="min-height: 500px;padding-bottom: 50px;padding-top: 50px">
		<div class="container">


			{!! Form::open([ 'url' => 'checkout', 'role' => 'form' , 'id'=>'checkout' , 'method' => 'post', 'class' => 'new-account-box primari-box' ]) !!}

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
					<!-- CREATE-NEW-ACCOUNT START -->
					<div class="create-new-account">


							<h3 style="margin-bottom: 20px" class="box-subheading">
								تفاصيل الفاتوره
							</h3>

							<div class="form-content">

								<div class="row">

									<div class="col-sm-6">
										<label for="name">الاسم بالكامل</label>
										<input type="text" name="name" placeholder="الاسم بالكامل" value="{{ $user->name }}" id="name" class="form-control input-feild" required>
										@if ($errors->has('name'))
											<span class="help-block" style="color:red">
												<strong>{{ $errors->first('name') }} </strong>
											</span>
										@endif
									</div>

									<div class="col-sm-6">
										<label for="email">البريد الالكتروني</label>
										<input type="email" name="email" placeholder="البريد الالكتروني" value="{{ $user->email }}" id="email" class="form-control input-feild" required>
										@if ($errors->has('email'))
											<span class="help-block" style="color:red">
												<strong>{{ $errors->first('email') }} </strong>
											</span>
										@endif
									</div>

									<div class="col-lg-6 col-sm-6 {{ $errors->has('mobile') ? ' has-error' : '' }}">
										<label>  رقم الموبيل <span class="text-danger">*</span>   </label>
										<input type="text" name="mobile" onkeypress="return isNumberKey(event)" class="form-control m-input" required="required" value="{{ $user->mobile }}" placeholder=" رقم الموبيل   ">
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
											<option value="ذكر" @if($user->gender == 'ذكر') {{ 'selected' }} @endif>  ذكر </option>
											<option value="انثي" @if($user->gender == 'انثي') {{ 'selected' }} @endif>  انثي </option>
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
												<option value="{{ $key }}" @if($user->gov_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
											@endforeach
										</select>
										@if ($errors->has('gov_id'))
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('gov_id') }}</strong>
										</span>
										@endif
									</div>


									@php
										$cities = App\Models\Cities::where('status',1)->where('governorate_id',$user->gov_id)->pluck('name','id')
									@endphp

									<div class="col-md-6 col-sm-6 {{ $errors->has('city_id') ? ' has-error' : '' }}">
										<label>  المدينة <span class="text-danger">*</span> </label>
										<select name="city_id" id="city_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
											<option value="" disabled selected="true">  اختر مدينة </option>
											@if($cities != null)
												@foreach ($cities as $key => $value)
													<option value="{{ $key }}" @if($user->city_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
												@endforeach
											@endif
										</select>
										@if ($errors->has('city_id'))
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('city_id') }}</strong>
										</span>
										@endif
									</div>


									<div class="col-lg-12 mb-20">
										<label> العنوان بالتفصيل  </label>
										<textarea class="form-control" id="address" name="address" rows="5" placeholder="العنوان بالتفصيل "></textarea>
									</div>

									<div class="col-lg-12 mb-20">
										<label> ملاحظات  </label>
										<textarea class="form-control" id="note" name="notes" rows="5" placeholder="ملاحظات "></textarea>
									</div>






								</div>


							</div>

					</div>
					<!-- CREATE-NEW-ACCOUNT END -->
				</div>


				<div class="col-md-6 col-12">
					<!-- REGISTERED-ACCOUNT START -->
					<div>

							<h3 style="margin-bottom:20px" class="box-subheading">
								طلباتك
							</h3>

							<div class="form-content">

								<div class="order_table">

									<table>

										<thead>
											<tr>
												<th>المنتج</th>
												<th>الاجمالي</th>
											</tr>
										</thead>

										<tbody>
											@php  $total = 0; @endphp

											@if(session('cart') && count((array) session('cart')) > 0)

												@foreach((array) session('cart') as $id => $details)

												@php
													$total += $details['price'] * $details['quantity'];
													$product = App\Models\Product::where('id',$details['product_id'])->first();

													$color =  App\Models\Color::where('id',$details['color'])->first();
													$size =  App\Models\Size::where('id',$details['size'])->first();
												@endphp



												<tr>
													<td>
														{{ $details['name'] }}
														<br>
														<span>الكمية  - </span>
														<span>{{ $details['quantity'] }}</span>

														<br>
														<span>اللون - </span>
														<span>{{ $color != null ? $color->title : '' }}</span>
														<br>
														<span>المقاس - </span>
														<span>{{ $size != null ? $size->title : '' }}</span>
													</td>
													<td> {{ $details['price'] * $details['quantity'] }} ج.م </td>
												</tr>

												@endforeach

											@endif

										</tbody>

										@if(session('cart') && count((array) session('cart')) > 0)

											@php
												$main_total = $shipping_value + $total;
											@endphp

											<tfoot>

												<tr class="order_total">
													<th>الأجمالي  </th>
													<td><strong>{{ $total }} ج.م</strong></td>
												</tr>

												<tr class="order_shipping">
													<th>قيمة الشحن </th>
													<td>
														<input type="hidden" id="order_shipping2" name="order_shipping2" value="{{ $total > $setting->invoice_total ? '0' : $shipping_value }}">
														<strong id="order_shipping">


															@if($total > $setting->invoice_total)
																0 ج.م
																@php $shipping_value = 0; @endphp
															@else
																{{ $shipping_value }} ج.م
															@endif

														</strong>
													</td>
												</tr>

												<tr class="order_shipping">
													<th> خصم خاص </th>
													<td>
														<input type="hidden" id="discount2" name="discount2" value="0">
														<strong id="discount">
															0 ج.م
														</strong>
													</td>
												</tr>


												<tr class="order_total">
													<th> اجمالي الفاتوره  </th>
													<td>
														<strong id="order_total">
															{{ $shipping_value + $total  }} ج.م
														</strong>
													</td>

												</tr>


											</tfoot>



										@endif

									</table>

									<p>
										<b>
											في حاله تخطي قيمة الفاتوره لمبلغ
											{{$setting->invoice_total }} ج.م
											يصبح الشحن مجانا
										</b>
									</p>

								</div>


								<!--coupon code area start-->
								<div class="coupon_area" style="margin-top: 30px;margin-bottom:30px">
									<div class="row">

										<div class="col-lg-12 col-md-12">
											<div class="coupon_code left">
												<h3 style="margin-bottom: 20px;background: #BA0202;color: #FFF;height: 50px;line-height: 50px;padding-right: 20px;">القسيمة</h3>
												<div class="coupon_inner">
													<p>
														أدخل رمز القسيمة الخاص بك إذا كان لديك واحد.
													</p>
													<input placeholder="كود القسيمة" id="coupon" name="coupon" value="" class="item1 form-control" type="text" style="font-size: 18px;width: 70%;display: inline-block;">
													<button type="button" id="verify" class="item2 btn btn-default" style="background:#BA0202;color: #FFF;font-weight: bold;">
														تحقق من الكود
													</button>
												</div>
											</div>
										</div>

										<div class="col-lg-12 col-md-12">
											<div class="g-recaptcha " data-sitekey="{{env('RECAPTCHA_KEY')}}"></div>
											<span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
										</div>

									</div>
								</div>
								<!--coupon code area end-->




								@if(count((array) session('cart')) > 0)

								<p style="margin-right: 20px">
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

								<p style="text-align: center;font-size: 20px;">
									<b style="color: #BA0202;font-weight:bold">
										الدفع عند الأستلام
									</b>
								</p>

								<div class="submit-button" style="text-align: left;">
									<button type="submit" form="checkout" id="signinCreate" style="color:#FFF;min-width: 100px;border-radius: 5px;margin-bottom: 20px;background:#BA0202" class="btn main-btn">
										<span>
											دفع
									</button>
								</div>
								@endif




							</div>


					</div>
					<!-- REGISTERED-ACCOUNT END -->
				</div>

			</div>

			{!! Form::close() !!}


		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->



@endsection



@section('footer')

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


						}
					});
				}else{
					$('select[name="city_id"]').empty();

				}
			});

			$('select[name="city_id"]').on('change', function() {

				var city_id = $(this).val();

				if(city_id) {

					$.ajax({
						url: '{{ url('ajax_shipping/') }}' + '/' + city_id,
						type: "GET",
						dataType: "json",
						success:function(data) {

		                    /*
                            $('#order_shipping').text(data.shipping + ' ج.م');
							$('#order_shipping2').val(data.shipping);
							*/

							var data_shpping = data.shipping;

							@if($total > $setting->invoice_total)
    							$('#order_shipping').text(0 + ' ج.م');
    							$('#order_shipping2').val(0);
    							data_shpping = 0;
							@else
    							$('#order_shipping').text(data.shipping + ' ج.م');
    							$('#order_shipping2').val(data.shipping);
							@endif

							var discount =  $('#discount2').val();

							var total = parseInt(data_shpping) + parseInt({{ $total }}) - parseInt(discount);

                            $('#order_total').text(total + ' ج.م');

						}
					});
				}

			});

			$('#verify').click(function() {

                var val = $('#coupon').val();

                if(val == '' || val == null) {

                    swal({
                        title: "خطاء",
                        text: "يجب ألا تكون القسيمة فارغة",
                        type: "warning",
                        showConfirmButton: true,
                        confirmButtonClass: "btn-danger",
                    });

                } else {

                    $.ajax({
                        url: '{{ url('ajax_check_coupon/') }}' + '/' +val,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            swal({
                                title: "",
                                text: data.data,
                                imageUrl: '{{ asset('img/sent.jpg') }}'
                            });

							if(data.type == true) {

								//alert(parseInt(data.value));

								var shipping_val = $('#order_shipping2').val();

								//alert(shipping_val);

								//var total = parseInt(shipping_val) + parseInt({{ $total }}) -  parseInt(data.value);

                                var shipping_val_plus_total = parseInt(shipping_val) + parseInt({{ $total }});

                                //alert(shipping_val_plus_total);

                                var coupon_val = ((parseInt(shipping_val_plus_total) * parseInt(data.value)) / 100);

                                //alert(coupon_val);

                                var total = parseInt(shipping_val_plus_total) - parseInt(coupon_val);

								$('#order_total').text(total + ' ج.م');

								$('#discount').text(coupon_val + ' ج.م');
								$('#discount2').val(coupon_val);

							} else {


								var shipping_val = $('#order_shipping2').val();

								var total = parseInt(shipping_val) + parseInt({{ $total }});

								$('#order_total').text(total + ' ج.م');

								$('#discount').text(0 + ' ج.م');
								$('#discount2').val(0);


							}

                        }
                    });

                }

            })




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


