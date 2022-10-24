@extends('admin.layouts.master')

@section('top_title') الكوبون  @endsection

@section('main_title') اضافه كوبون جديد  @endsection


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
            <h3 class="card-title">اضافه كوبون جديد </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/coupon", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">

                    <div class="col-lg-12 col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  كود الكوبون </label>
                        <input type="text" name="title" class="form-control m-input" value="{{ old('title') }}" placeholder=" كود الكوبون ">
                        @if ($errors->has('title'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('title') }} </strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-lg-12 col-sm-12 {{ $errors->has('value') ? ' has-error' : '' }}">
                        <label>   نسبة الخصم </label>
                        <input type="number" min="1" max="100" name="value" class="form-control m-input" value="{{ old('value') }}" placeholder=" نسبة الخصم  ">
                        @if ($errors->has('value'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('value') }} </strong>
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
