@extends('user.layouts.master')


@section('sub_title')
    اتصل بنا
@endsection


@section('header')
	<style>
        .contact-area {
            padding-right: 2%;
        }


        .contact-area {
            min-height: 600px;
            margin-top: 93px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .contact-area .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .contact-area {
                margin-top: 136px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .contact-area {
                margin-top: 162px !important;
                padding-top: 0 !important;
            }
        }

		.g-recaptcha {
			transform: scale(1) !important;
			margin-right: 15px
		}

		.form-group {
			margin-bottom: 20px
		}

		form.contact-form button.send-message {
			margin-top: 0;
		}

        .contact-form input[type="text"], .contact-form input[type="email"] {
            text-align: right
        }

		@media (max-width: 767px) {
			form.contact-form button.send-message {
				bottom: -40px;
				right: 25px;
			}
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


@php
    $setting = App\Models\Setting::first();
@endphp

</nav>

<!-- contact-area start -->
<div class="contact-area padding_section" style="">



    <div class="container">
        <div class="row">

            <nav class="custom_breadcrumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{asset('/')}}">
                            الرئيسية
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        أتصل بنا
                    </li>
                </ol>
            </nav>

            <!-- contact-info start -->
            <div class="col-lg-6">
                <div class="contact-info">
                    <h3>
                        معلومات الاتصال
                    </h3>
                    <ul>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <strong>
                                البريد الالكتروني
                            </strong>
                            <a href="mailto:{{ $setting->email }}">
                                {{ $setting->email }}
                            </a>
                        </li>
                        @if($setting->mobile != null)
                        <li>
                            <i class="fa fa-mobile"></i>
                            <strong>
                                رقم الموبيل
                            </strong>
                            <a href="tel:{{ $setting->mobile }}">
                                {{ $setting->mobile }}
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- contact-info end -->
            <div class="col-lg-6">
                <div class="contact-form">
                    <h3>
                        <i class="fa fa-envelope-o"></i>
                        أترك رسالة
                    </h3>
                    {!! Form::open([ 'url' => "contact_us",'role'=>'form','id'=>'contacts_form','method'=>'post','class' => 'contact-form' ]) !!}

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="name" placeholder="الاسم بالكامل " value="{{ old('name') }}" required type="text">
                                @if ($errors->has('name'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('name') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="email" placeholder="البريد الالكتروني " value="{{ old('email') }}" required type="email">
                                @if ($errors->has('email'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('email') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input name="mobile" onkeypress="return isNumberKey(event)" placeholder="رقم الموبيل " value="{{ old('mobile') }}" required type="text">
                                @if ($errors->has('mobile'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('mobile') }} </strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <textarea id="message" cols="30" rows="10" placeholder="الرساله " name="message" required>{{old('message')}}</textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block" style="color:red">
                                        <strong>{{ $errors->first('message') }} </strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                {!! NoCaptcha::display() !!}
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" form="contacts_form">
                                    أرسال
                                </button>
                            </div>

                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact-area end -->





@endsection




@section('footer')



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


