@extends('user.layouts.master')

@section('sub_title')
	استعاده كلمة المرور
@endsection

@section('header')
	<style>

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

		.registered-account {
            margin-top: 70px;
        }

        .primari-box {
            background: #fbfbfb none repeat scroll 0 0;
            border: 1px solid #d6d4d4;
            line-height: 23px;
            padding: 14px 18px 13px;
        }

        .form-control {
            text-align: right;
        }

        .main-content-section {
            min-height: 600px;
            margin-top: 96px !important;
        }

        .custom_breadcrumb , .breadcrumb{
            margin-bottom: 10px !important
        }

        .main-content-section .tab-content .single-product {
            margin-top: 20px !important
        }

        @media (max-width: 767px) {
            .main-content-section {
                margin-top: 136px !important;
                padding-top: 0 !important;
            }
        }

        @media (max-width: 400px) {
            .main-content-section {
                margin-top: 162px !important;
                padding-top: 0 !important;
            }
        }

	</style>



@endsection

@section('content')

<!-- MAIN-CONTENT-SECTION START -->
<section class="main-content-section" style="min-height: 400px;padding-bottom: 50px;padding-top: 50px">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- BSTORE-BREADCRUMB START -->
					<div class="bstore-breadcrumb">
						<a href="{{ url('/') }}">الرئيسية</a>
						<span><i class="fa fa-caret-left"></i></span>
						<span>استعاده كلمة المرور </span>
					</div>

					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<!-- BSTORE-BREADCRUMB END -->
				</div>
			</div>
			<div class="row justify-content-center">


				<div class="col-md-6 col-sm-8 col-12">
					<!-- REGISTERED-ACCOUNT START -->
					<div class="primari-box registered-account">

						<form method="POST" action="{{ route('password.request') }}" class="m-login__form m-form">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

							<div class="form-content">

                                <div class="col-lg-12 col-sm-12  {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email"> البريد الإلكتروني</label>
                                    <input type="email" placeholder=" البريد الإلكتروني" name="email" value="{{ old('email') }}" id="email" class="form-control input-feild" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block" style="color:red">
                                            <strong>{{ $errors->first('email') }} </strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-sm-12  {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label> كلمه المرور   </label>
                                    <input type="password" name="password" required class="form-control m-input" value="" placeholder="  كلمه المرور ">
                                    @if ($errors->has('password'))
                                         <span class="help-block" style="color:red">
                                              <strong>{{ $errors->first('password') }} </strong>
                                         </span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-sm-12  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label> كرر كلمه المرور   </label>
                                    <input type="password" name="password_confirmation" required class="form-control m-input" value="" placeholder="  كرر كلمه المرور ">
                                    @if ($errors->has('password_confirmation'))
                                         <span class="help-block" style="color:red">
                                              <strong>{{ $errors->first('password_confirmation') }} </strong>
                                         </span>
                                    @endif
                                </div>



								<div class="submit-button">
									<button type="submit" id="signinCreate" class="btn main-btn">
										<span>
											<i class="fa fa-lock submit-icon"></i>
											استعاده كلمة المرور
										</span>
									</button>
								</div>




							</div>

						</form>

					</div>
					<!-- REGISTERED-ACCOUNT END -->
				</div>
			</div>
		</div>
	</section>
	<!-- MAIN-CONTENT-SECTION END -->


@endsection

