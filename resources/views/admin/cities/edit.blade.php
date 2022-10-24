@extends('admin.layouts.master')

@section('top_title') المدن  @endsection

@section('main_title') تعديل مدينة  @endsection


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
            <h3 class="card-title">تعديل مدينة</h3>
         </div>


         <!--begin::Form-->
         {!! Form::model($Item, [ 'route' => ['admin_panel.cities.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}
            
            <div class="card-body">

                <input type="hidden" name="id" value="{{$Item->id}}">
              
                
                <div class="row">
                    <div class="col-sm-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>  اسم المدينة   <span class="text-danger">*</span> </label>
                        
                        <input type="text" name="name" class="form-control m-input" required="required" value="{{ $Item->name }}" placeholder=" اسم المدينة ">
                        
                        @if ($errors->has('name'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('name') }} </strong>
                             </span> 
                        @endif
                    </div>

                    <div class="col-md-6 col-sm-6 {{ $errors->has('governorate_id') ? ' has-error' : '' }}">
                        <label>  المحافظات <span class="text-danger">*</span> </label>
                        <select name="governorate_id" id="governorate_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true">  اختر محافظه </option>
                            @foreach (H_Governorates() as $key => $value)
                                <option value="{{ $key }}" @if($Item->governorate_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
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
                        
                        <input type="number" min="0" name="shipping_value" class="form-control m-input" required="required" value="{{ $Item->shipping_value }}" placeholder="  قيمة الشحن ">
                        
                        @if ($errors->has('shipping_value'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('shipping_value') }} </strong>
                             </span> 
                        @endif
                    </div>

                    
                   
                </div>
                
                
        
               
               
            </div>

            <div class="card-footer">
               <button type="submit" form="edit" class="btn btn-primary mr-2">حفظ</button>
            </div>

        {!! Form::close() !!}
         <!--end::Form-->


      </div>
      <!--end::Card-->

   </div>


   
</div>
<!-- End Row -->

@endsection