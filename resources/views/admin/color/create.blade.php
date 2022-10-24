@extends('admin.layouts.master')

@section('top_title') الألوان  @endsection

@section('main_title') اضافه لون جديد  @endsection


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
            <h3 class="card-title">اضافه لون جديد </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/color", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}
            
            <div class="card-body">
              
                <div class="row">
                    <div class="col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  اسم اللون  <span class="text-danger">*</span> </label>
                        
                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ old('title') }}" placeholder=" اسم اللون">
                        
                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span> 
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('value') ? ' has-error' : '' }}">
                        <label>  اللون    <span class="text-danger">*</span> </label>
                        <input class="form-control m-input" name="value" type="color" value="{{ old('value') }}" placeholder="اللون" id="example-color-input">
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