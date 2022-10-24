@extends('admin.layouts.master')

@section('top_title') المدن  @endsection

@section('main_title') اضافه مدينة جديدة  @endsection


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
            <h3 class="card-title">اضافه مدينة جديدة </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/cities", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}
            
            <div class="card-body">
              
                <div class="row">
                    
                    <div class="col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>  اسم المدينة  <span class="text-danger">*</span> </label>
                        
                        <input type="text" name="name" class="form-control m-input" required="required" value="{{ old('name') }}" placeholder=" اسم المدينة">
                        
                        @if ($errors->has('name'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('name') }} </strong>
                             </span> 
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 {{ $errors->has('governorate_id') ? ' has-error' : '' }}">
                        <label>  المحافظات <span class="text-danger">*</span> </label>
                        <select name="governorate_id" id="governorate_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true">  اختر مدينة </option>
                            @foreach (H_Governorates() as $key => $value)
                                <option value="{{ $key }}" @if(old('governorate_id') == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('governorate_id'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('governorate_id') }}</strong>
                         </span>
                        @endif
                     </div>

                     <div class="col-sm-12 {{ $errors->has('shipping_value') ? ' has-error' : '' }}">
                        <label>  قيمة الشحن  <span class="text-danger">*</span> </label>
                        
                        <input type="number" min="0" name="shipping_value" class="form-control m-input" required="required" value="0" placeholder="  قيمة الشحن ">
                        
                        @if ($errors->has('shipping_value'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('shipping_value') }} </strong>
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