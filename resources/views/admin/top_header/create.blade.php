@extends('admin.layouts.master')

@section('top_title') المميزات   @endsection

@section('main_title') اضافه عنصر جديد  @endsection


@section('header')
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6 ,
        .card-body .col-sm-8 , .card-body .col-sm-4 { margin-bottom: 20px }
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
            <h3 class="card-title">اضافه عنصر جديد </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/top_header", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">



                    <div class="col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  العنوان    <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ old('title') }}" placeholder="  العنوان ">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('sub_title') ? ' has-error' : '' }}">
                        <label>  العنوان الفرعي    <span class="text-danger">*</span> </label>

                        <input type="text" name="sub_title" class="form-control m-input" required="required" value="{{ old('sub_title') }}" placeholder="  العنوان الفرعي ">

                        @if ($errors->has('sub_title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('sub_title') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-12 {{ $errors->has('icon') ? ' has-error' : '' }}">
                        <label>  الايقون    <span class="text-danger">*</span> </label>

                        <input type="text" name="icon" class="form-control m-input" required="required" value="{{ old('icon') }}" placeholder="  الايقون ">

                        @if ($errors->has('icon'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('icon') }} </strong>
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



@section('footer')

    <script>

        $(document).ready(function() {

            $('.m_selectpicker').selectpicker('refresh');

        });

    </script>

@endsection
