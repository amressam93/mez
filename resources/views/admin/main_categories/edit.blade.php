@extends('admin.layouts.master')

@section('top_title') الاقسام الرئيسية  @endsection

@section('main_title') تعديل قسم  @endsection


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
            <h3 class="card-title">تعديل قسم</h3>
         </div>


         <!--begin::Form-->
         {!! Form::model($Item, [ 'route' => ['admin_panel.main_categories.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}

            <div class="card-body">

                <input type="hidden" name="id" value="{{$Item->id}}">


                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  اسم القسم   <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ $Item->title }}" placeholder=" اسم القسم ">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>


                </div>


                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('url') ? ' has-error' : '' }}">
                        <label>   اللينك   <span class="text-danger">*</span> </label>

                        <input type="text" name="url" class="form-control m-input" required="required" value="{{ $Item->url }}" placeholder=" اللينك ">

                        @if ($errors->has('url'))
                            <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('url') }} </strong>
                             </span>
                        @endif
                    </div>


                </div>


                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('pic') ? ' has-error' : '' }}">
                        <label>  الصوره (400*300) </label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="customFile" name="pic" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره  </label>
                        </div>
                        @if ($errors->has('pic'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic') }}</strong>
                            </span>
                        @endif
                        <br>
                        <img src="{{ Custom_Image_Path('main_categories_images',$Item->pic) }}"
                             style="width: 200px;height: 150px;margin-bottom: 20px;margin-top: 20px"/>
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
