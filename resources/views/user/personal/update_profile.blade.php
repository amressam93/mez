@extends('user.layouts.master')

@section('sub_title')
	تعديل المعلومات الشخصية
@endsection

@section('header')

	<style>

		.active_tab {
			background: #BA0202 !important;
			color: #FFF !important
		}

		.active_tab i { color: #FFF !important }

		.active_tab span, .active_tab i {
			border-color: #BA0202 !important;
		}

		.active_tab span { border-right-color: #fff !important;   }

		.col-sm-6 { margin-bottom: 20px }

		.single-account-info ul li {
			display: inline-block;
			min-width: 270px;
		}

        .primari-box {
            background: #fbfbfb none repeat scroll 0 0;
            border: 1px solid #d6d4d4;
            line-height: 23px;
            margin: 0 0 30px;
            padding: 14px 18px 13px;
        }

        .main-btn {
            background: #ff4f4f none repeat scroll 0 0;
            border: 1px solid #ff4f4f;
            border-radius: 0;
            color: #fff;
            font-size: 17px;
            line-height: 21px;
            padding: 0;
            transition: all 500ms ease 0s;
            margin-bottom: 7px;
            margin-top: 20px
        }

        .main-btn span {
            display: block;
            padding: 11px 14px 9px 10px;
        }


        .main-content-section {
            min-height: 600px;
            margin-top: 93px !important;
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

            .single-account-info ul li a {
                font-size: 14px !important
            }
        }

	</style>

    <style>


		.single-account-info ul li {
			display: inline-block;
			min-width: 270px;
		}

        .account-info-text {
            display: block;
            font-size: 13px;
            margin: -4px 0 23px;
            overflow: hidden;
        }

        h2.page-title {
            border-bottom: 1px solid #d6d4d4;
            color: #555454;
            font-size: 18px;
            line-height: 22px;
            font-family: 'Bitter', serif;
            font-weight: 600;
            margin-bottom: 30px;
            margin-top: 0px;
            overflow: hidden;
            padding: 0 0 17px;
            text-transform: uppercase;
        }

        .single-account-info ul li {
            display: inline-block;
            min-width: 270px;
        }

        .single-account-info ul li a {
            border-color: #cacaca #b7b7b7 #9a9a9a;
            border-image: none;
            border-radius: 4px;
            border-style: solid;
            border-width: 1px;
            background: #f7f7f7;
            background: -moz-linear-gradient(#f7f7f7, #ededed);
            background: -webkit-linear-gradient(#f7f7f7, #ededed);
            background: -o-linear-gradient(#f7f7f7, #ededed);
            background: -ms-linear-gradient(#f7f7f7, #ededed);
            background: linear-gradient(#f7f7f7, #ededed);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr='#f7f7f7', endColorstr='#ededed');
            background-size: 100% auto;
            color: #555454;
            display: block;
            font-weight: 600;
            font-size: 16px;
            line-height: 20px;
            font-family: 'Open Sans',sans-serif;
            overflow: hidden;
            text-shadow: 0 1px white;
            text-transform: uppercase;
        }

        .single-account-info ul li a span {
            border-bottom-left-radius: 5px;
            border-color: #fff #c8c8c8 #fff #fff;
            border-image: none;
            border-style: solid;
            border-top-left-radius: 5px;
            border-width: 1px;
            line-height: 48px;
            display: block;
            margin-right: 52px;
            overflow: hidden;
            padding: 0 17px;
        }

        .single-account-info ul li a i {
            border: 1px solid #fff;
            border-bottom-right-radius: 4px;
            border-top-right-radius: 4px;
            color: #fd7e01;
            float: right;
            font-size: 25px;
            line-height: 48px;
            overflow: hidden;
            text-align: center;
            width: 52px;
        }


	</style>

@endsection

@php
	$user = Auth::guard('user')->user();
@endphp

@section('content')

<!-- MAIN-CONTENT-SECTION START -->
	<section class="main-content-section padding_section" style="padding-top: 50px;min-height:500px">
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
                            تعديل الملف الشخصي

                        </li>
                    </ol>
                </nav>


				<div class="col-12">
					<div class="account-info-text">
						مرحبا بك في حسابك. هنا يمكنك إدارة جميع المعلومات والأوامر الشخصية الخاصة بك.
					</div>
				</div>

				<!-- ACCOUNT-INFO-TEXT START -->
				<div class="col-sm-12 col-12">
					<div class="account-info">
						<div class="single-account-info">
							<ul>
								<li>
									<a href="{{ url('update_profile') }}" class="active_tab">
										<i class="fa fa-user"></i>
										<span>تعديل المعلومات الشخصية</span>
									</a>
								</li>


								<li>
									<a href="{{ url('orders') }}">
										<i class="fa fa-list-ol"></i>
										<span>الفواتير</span>
									</a>
								</li>

								<li>
									<a href="{{ url('logout') }}">
										<i class="fa fa-sign-out"></i>
										<span>تسجيل الخروج</span>
									</a>
								</li>


							</ul>
						</div>
					</div>
				</div>




				<div class="col-sm-12 col-12" style="margin-top: 20px;margin-bottom:20px">
					{!! Form::open([ 'url' => 'update_profile', 'role' => 'form' , 'id'=>'create-new-account' , 'method' => 'post', 'class' => 'new-account-box primari-box' ]) !!}
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

								@if($user->type == 1)
								<div class="col-sm-6">
									<label for="email">البريد الالكتروني</label>
									<input type="email" name="email" placeholder="البريد الالكتروني" value="{{ $user->email }}" id="email" class="form-control input-feild" required>
									@if ($errors->has('email'))
										<span class="help-block" style="color:red">
											<strong>{{ $errors->first('email') }} </strong>
										</span>
									@endif
								</div>
								@else
								<div class="col-sm-6">
									<label for="email">البريد الالكتروني</label>
									<input disabled placeholder="البريد الالكتروني" value="{{ $user->email }}" class="form-control input-feild">
								</div>
								@endif

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

								@if($user->type == 1)
								<div class="col-lg-12 col-sm-12  {{ $errors->has('password') ? ' has-error' : '' }}">
									<label> كلمه المرور   </label>
									<input type="password" name="password" class="form-control m-input" value="" placeholder="  كلمه المرور ">
									@if ($errors->has('password'))
											<span class="help-block" style="color:red">
												<strong>{{ $errors->first('password') }} </strong>
											</span>
									@endif
								</div>
								@endif





							</div>


							<div class="submit-button">

								<button type="submit" form="create-new-account" id="SubmitCreate" class="btn main-btn">
									<span>
										<i class="fa fa-user submit-icon"></i>
										تحديث
									</span>
								</button>

							</div>

						</div>
					{!! Form::close() !!}
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


@endsection


