@extends('admin.layouts.master')

@section('top_title') الاقسام الرئيسية  @endsection

@section('main_title') اضافه قسم جديد  @endsection


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
            <h3 class="card-title">اضافه قسم جديد </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/main_categories", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  اسم القسم  <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ old('title') }}" placeholder=" اسم القسم">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('url') ? ' has-error' : '' }}">
                        <label>  اللينك  <span class="text-danger">*</span> </label>

                        <input type="text" name="url" class="form-control m-input" required="required" value="{{ old('url') }}" placeholder=" اللينك">

                        @if ($errors->has('url'))
                            <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('url') }} </strong>
                             </span>
                        @endif
                    </div>


                </div>

                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('pic') ? ' has-error' : '' }}">
                        <label>  الصوره (400*300) <span class="text-danger">*</span> </label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" required id="customFile" name="pic" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic') }}</strong>
                            </span>
                        @endif
                     </div>
                </div>




            </div>

            <div class="card-footer">
               <button type="submit" form="add" class="btn btn-primary mr-2">حفظ</button>
            </div>

        {!! Form::close() !!}
         <!--end::Form-->


      </div>
      <!--end::Card-->

   </div>



</div>
<!-- End Row -->

@endsection
