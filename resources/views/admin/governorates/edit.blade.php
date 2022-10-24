@extends('admin.layouts.master')

@section('top_title') المحافظات  @endsection

@section('main_title') تعديل محافظه  @endsection


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
            <h3 class="card-title">تعديل محافظه</h3>
         </div>


         <!--begin::Form-->
         {!! Form::model($Item, [ 'route' => ['admin_panel.governorates.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}
            
            <div class="card-body">

                <input type="hidden" name="id" value="{{$Item->id}}">
              
                
                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label>  اسم المحافظه   <span class="text-danger">*</span> </label>
                        
                        <input type="text" name="name" class="form-control m-input" required="required" value="{{ $Item->name }}" placeholder=" اسم المحافظه ">
                        
                        @if ($errors->has('name'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('name') }} </strong>
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