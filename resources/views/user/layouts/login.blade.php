@extends('user.layouts.master')

@section('sub_title')
	تسجيل الدخول
@endsection

@section('header')
	<style>

        .main-content-section {
            min-height: 600px;
            margin-top: 120px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .main-content-section .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .main-content-section {
                margin-top: 156px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .main-content-section {
                margin-top: 182px !important;
                padding-top: 0 !important;
            }
        }

        .primari-box {
            background: #fbfbfb none repeat scroll 0 0;
            border: 1px solid #d6d4d4;
            line-height: 23px;
            margin: 0 0 30px;
            padding: 14px 18px 13px;
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


	</style>

	<style>

		.g-recaptcha {
            transform: scale(1) !important;
			margin-right: 15px
        }

        @media (max-width: 600px) {

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

    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section" style="min-height: 500px;padding-bottom: 50px;padding-top: 50px">
		<div class="container">


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

						{!! Form::open([ 'url' => 'login', 'role' => 'form' , 'id'=>'accountLogin' , 'method' => 'post', 'class' => 'new-account-box' ]) !!}

							<h3 style="margin-bottom:20px" class="box-subheading">تمتلك حساب بالفعل</h3>

							<div class="form-content">
								<div class="form-group primary-form-group">
									<div class="form-group primary-form-group">
										<label for="email">الهاتف المحمول أو البريد الإلكتروني</label>
										<input type="text" placeholder="الهاتف المحمول أو البريد الإلكتروني" name="email_or_mobile" value="{{ old('email_or_mobile') }}" id="email" class="form-control input-feild" required>
										@if ($errors->has('email_or_mobile'))
											<span class="help-block" style="color:red">
												<strong>{{ $errors->first('email_or_mobile') }} </strong>
											</span>
										@endif
									</div>
								</div>
								<div class="form-group primary-form-group">
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
										<label class="kaycee-form__label kaycee-form__label-for-checkbox inline">
											<input class="kaycee-form__input kaycee-form__input-checkbox"
												   name="remember" type="checkbox" id="rememberme" value="forever">
											<span>تذكرني</span>
										</label>

										<a style="float: left" href="{{ url('password/reset') }}">نسيت  كلمه المرور ؟ </a>
									</p>
								</div>
								<div class="submit-button">
									<button type="submit" form="accountLogin" id="signinCreate" class="btn main-btn">
										<span>
											<i class="fa fa-lock submit-icon"></i>
											تسجيل الدخول
										</span>
									</button>
								</div>

								<div class="form-group primary-form-group">
									<div class="or-seperator"><i>أو</i></div>
									<p style="font-weight: bold" class="text-center">تسجيل الدخول باستخدام حساب وسائل التواصل الاجتماعي الخاص بك</p>
									<div class="text-center social-btn">
										<a href="{{ url('redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
										<a href="{{ url('redirect/google') }}" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
									</div>
								</div>


							</div>

						{!! Form::close() !!}

					</div>
					<!-- REGISTERED-ACCOUNT END -->
				</div>


				<div class="col-md-6 col-12">
					<!-- CREATE-NEW-ACCOUNT START -->
					<div class="create-new-account">

						{!! Form::open([ 'url' => 'register', 'role' => 'form' , 'id'=>'create-new-account' , 'method' => 'post', 'class' => 'new-account-box primari-box' ]) !!}
							<h3 style="margin-bottom: 20px" class="box-subheading">إنشاء حساب</h3>
							<div class="form-content">

						<p style="font-weight: bold" class="text-center">سجل باستخدام حساب وسائل التواصل الاجتماعي الخاص بك</p>

                        <div class="text-center social-btn">
                            <a href="{{ url('redirect/facebook') }}" style="color: #FFF !important" class="btn btn-primary"><i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                            <a href="{{ url('redirect/google') }}" style="color: #FFF !important" class="btn btn-danger"><i class="fa fa-google"></i>&nbsp; Google</a>
                        </div>

                        <div class="or-seperator"><i>أو</i></div>


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
									<div class="g-recaptcha " data-sitekey="{{env('RECAPTCHA_KEY')}}"></div>
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


