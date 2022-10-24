@extends('admin.layouts.master')

@section('top_title') الاعدادات  @endsection

@section('main_title')  الاعدادات  @endsection


@section('header')
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6 { margin-bottom: 20px }
    </style>
@endsection


@section('content')

@include('flash-message')

<!-- Start Row -->
<div class="row">

   <div class="col-md-12">

      <!--begin::Card-->
      <div class="card card-custom gutter-b example example-compact">

         <div class="card-header">
            <h3 class="card-title"> الاعدادات </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/setting", 'files'=> true,'role'=>'form','id'=>'update','method'=>'post']) !!}

            <div class="card-body">


               <div class="row">

                  <div class="col-sm-6 {{ $errors->has('website_name') ? ' has-error' : '' }}">
                     <label> اسم الموقع </label>
                     <input type="text" name="website_name" class="form-control m-input" required="required" value="{{ $Setting->website_name }}" placeholder="  اسم الموقع  ">
                     @if ($errors->has('website_name'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('website_name') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('email') ? ' has-error' : '' }}">
                     <label> البريد الالكتروني </label>
                     <input type="email" name="email" class="form-control m-input" required="required" value="{{ $Setting->email }}" placeholder=" البريد الالكتروني ">
                     @if ($errors->has('email'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('email') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('mobile') ? ' has-error' : '' }}">
                     <label> رقم موبيل خدمة العملاء</label>
                     <input type="text" name="mobile"  onkeypress="return isNumberKey(event)" class="form-control m-input" required="required" value="{{ $Setting->mobile }}" placeholder=" رقم موبيل خدمة العملاء ">
                     @if ($errors->has('mobile'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('mobile') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('whatsapp') ? ' has-error' : '' }}">
                     <label> رقم موبيل الواتس </label>
                     <input type="text" name="whatsapp"  onkeypress="return isNumberKey(event)" class="form-control m-input" required="required" value="{{ $Setting->whatsapp }}" placeholder=" رقم موبيل الواتس ">
                     @if ($errors->has('whatsapp'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('whatsapp') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('invoice_total') ? ' has-error' : '' }}">
                     <label> اقصي قيمة فاتوره</label>
                     <input type="text" name="invoice_total"  onkeypress="return isNumberKey(event)" class="form-control m-input" required="required" value="{{ $Setting->invoice_total }}" placeholder=" اقصي قيمة فاتوره ">
                     @if ($errors->has('invoice_total'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('invoice_total') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('product_sizes_count') ? ' has-error' : '' }}">
                     <label> عدد مقاسات المنتجات</label>
                     <input type="text" name="product_sizes_count"  onkeypress="return isNumberKey(event)" class="form-control m-input" required="required" value="{{ $Setting->product_sizes_count }}" placeholder=" عدد مقاسات المنتجات ">
                     @if ($errors->has('product_sizes_count'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('product_sizes_count') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('price_title') ? ' has-error' : '' }}">
                    <label>   عنوان اسعار المنتجات  </label>
                    <input type="text"  name="price_title" class="form-control m-input" value="{{ $Setting->price_title }}" placeholder=" عنوان اسعار المنتجات ">
                    @if ($errors->has('price_title'))
                    <span class="help-block" style="color:red">
                    <strong>{{ $errors->first('price_title') }} </strong>
                    </span>
                    @endif
                 </div>

                 <div class="col-sm-6 {{ $errors->has('add_to_cart_title') ? ' has-error' : '' }}">
                    <label>  عنوان السلة </label>
                    <input type="text" name="add_to_cart_title" class="form-control m-input" value="{{ $Setting->add_to_cart_title }}" placeholder="  عنوان السلة ">
                    @if ($errors->has('add_to_cart_title'))
                    <span class="help-block" style="color:red">
                    <strong>{{ $errors->first('add_to_cart_title') }}</strong>
                    </span>
                    @endif
                 </div>

                  <div class="col-sm-6 {{ $errors->has('facebook_link') ? ' has-error' : '' }}">
                     <label>   لينك صفحه الفيسبوك  </label>
                     <input type="text"  name="facebook_link" class="form-control m-input" value="{{ $Setting->facebook_link }}" placeholder=" لينك صفحه الفيسبوك ">
                     @if ($errors->has('facebook_link'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('facebook_link') }} </strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('twitter_link') ? ' has-error' : '' }}">
                     <label>  لينك تويتر </label>
                     <input type="text" name="twitter_link" class="form-control m-input" value="{{ $Setting->twitter_link }}" placeholder="  لينك تويتر ">
                     @if ($errors->has('twitter_link'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('twitter_link') }}</strong>
                     </span>
                     @endif
                  </div>

                  <div class="col-sm-6 {{ $errors->has('instgram_link') ? ' has-error' : '' }}">
                     <label> لينك انستجرام </label>
                     <input type="text"  name="instgram_link" class="form-control m-input" value="{{ $Setting->instgram_link }}" placeholder=" لينك انستجرام ">
                     @if ($errors->has('instgram_link'))
                     <span class="help-block" style="color:red">
                     <strong>{{ $errors->first('instgram_link') }} </strong>
                     </span>
                     @endif
                  </div>


                 <div class="col-sm-6 {{ $errors->has('header_logo') ? ' has-error' : '' }}">
                     <label> اللوجو العلوي   </label>
                     <div class="custom-file">
                         <input type="file" class="custom-file-input" name="header_logo" accept="image/*">
                         <label class="custom-file-label">  من فضلك اختر صورة </label>
                     </div>
                     @if ($errors->has('header_logo'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('header_logo') }}</strong>
                         </span>
                     @endif
                     <br>
                     <img src=" {{ Custom_Image_Path('logo',$Setting->header_logo) }}"
                         style="width:150px;margin-bottom: 20px;margin-top: 20px"/>
                  </div>







                </div>




            </div>

            <div class="card-footer">
               <button type="submit" form="update" class="btn btn-primary mr-2">تحديث</button>
            </div>

        {!! Form::close() !!}
         <!--end::Form-->


      </div>
      <!--end::Card-->

   </div>



</div>
<!-- End Row -->

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
@endsection













