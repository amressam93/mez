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
         {!! Form::open(['url' => "admin_panel/footer", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">

                    <div class="col-md-12 col-sm-12 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label>   صفحة رئيسية / قسم رئيسي <span class="text-danger">*</span> </label>
                        <select name="category_id[]" multiple id="category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="0" @if(old('category_id') == 0) {{ 'selected' }} @endif> الصفحة الرئيسية </option>
                            @foreach (H_Main_Category() as $key => $value)
                                <option value="{{ $key }}" @if(old('category_id') == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('category_id') }}</strong>
                         </span>
                        @endif
                     </div>


                    <div class="col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  العنوان    <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ old('title') }}" placeholder="  العنوان ">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('icon') ? ' has-error' : '' }}">
                        <label>  الايقون (50*50)     <span class="text-danger">*</span> </label>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" required name="icon" accept="image/*">
                            <label class="custom-file-label"> اختر صورة </label>
                        </div>

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
