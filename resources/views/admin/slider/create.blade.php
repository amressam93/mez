@extends('admin.layouts.master')

@section('top_title') الاسليدر   @endsection

@section('main_title') اضافه اسليدر جديد  @endsection


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
            <h3 class="card-title">اضافه اسليدر جديد </h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/slider", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 col-sm-6 {{ $errors->has('category_id') ? ' has-error' : '' }}">
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

                    <div class="col-lg-6 col-sm-6 {{ $errors->has('url') ? ' has-error' : '' }}">
                           <label>  الرابط  </label>
                           <input type="text" name="url" value="{{ old('url') }}"  class="form-control" placeholder="الرابط .... ">
                           @if ($errors->has('url'))
                              <span class="help-block" style="color:red">
                                 <strong>{{ $errors->first('url') }} </strong>
                              </span>
                           @endif
                    </div>


                    <div class="col-sm-12 {{ $errors->has('pic1') ? ' has-error' : '' }}">
                        <label>  الصوره (870*432)   <span class="text-danger">*</span> </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input" required  name="pic1" accept="image/*">
                           <label class="custom-file-label" for="customFile"> من فضلك اختر صوره </label>
                        </div>
                        @if ($errors->has('pic1'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic1') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="col-sm-12">
                        <div class="card" style="width: 100%">
                            <img id="output1"  style="max-height: 400px" src="{{ asset('img/no-image.png') }}" class="card-img-top" alt="...">
                        </div>
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
