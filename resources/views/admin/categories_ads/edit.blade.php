@extends('admin.layouts.master')

@section('top_title') اعلانات الاقسام الرئيسية  @endsection

@section('main_title') تعديل اعلان  @endsection


@section('header')

    <style>

        .card-body .col-sm-12 , .card-body .col-sm-6, .card-body .col-sm-8,
        .card-body .col-sm-3, .card-body .col-sm-4 { margin-bottom: 20px }

        select.form-control {
            padding-top: 0;
            padding-bottom: 0;
        }

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
            <h3 class="card-title">تعديل اعلان</h3>
         </div>


         <!--begin::Form-->
         {!! Form::model($Item, [ 'route' => ['admin_panel.categories_ads.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}

            <div class="card-body">

                <input type="hidden" name="id" value="{{$Item->id}}">


                <div class="row">

                    @php
                        $ads_categories = App\Models\Ads_Categories::where('ads_id',$Item->id)->pluck('category_id')->toArray();
                    @endphp

                    <div class="col-md-4 col-sm-4 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label>  الاقسام الرئيسية <span class="text-danger">*</span> </label>
                        <select name="category_id[]" multiple id="category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled>  اختر قسم </option>
                            @foreach (H_Main_Category() as $key => $value)
                            <option value="{{ $key  }}" @if(! empty($ads_categories) && in_array($key,$ads_categories)) selected={{ 'selected' }} @endif> {{ $value  }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  عنوان الاعلان   <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ $Item->title }}" placeholder=" عنوان الاعلان ">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('status') ? ' has-error' : '' }}">
                        <label>   فعال / غير فعال <span class="text-danger">*</span> </label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="" disabled selected="true">  اختر حاله الاعلان </option>
                            <option value="1" @if($Item->status == 1) {{ 'selected' }} @endif>  فعال </option>
                            <option value="0" @if($Item->status == 0) {{ 'selected' }} @endif> غير فعال </option>
                        </select>
                        @if ($errors->has('status'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('status') }}</strong>
                         </span>
                        @endif
                    </div>


                </div>

                <div class="row">

                    <div class="col-sm-12 {{ $errors->has('url1') ? ' has-error' : '' }}">
                        <label>  الرابط   </label>

                        <input type="text" name="url1" class="form-control m-input" value="{{ $Item->url1 }}" placeholder=" الرابط  ">

                        @if ($errors->has('url1'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('url1') }} </strong>
                             </span>
                        @endif
                    </div>


                    <div class="col-sm-12 {{ $errors->has('pic1') ? ' has-error' : '' }}">
                        <label>  صوره (870*432)  </label>
                        <div class="custom-file">
                           <input type="file" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" class="custom-file-input"  name="pic1" accept="image/*">
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
                            <img id="output1"  style="max-height: 400px" src="{{ Custom_Image_Path('ads',$Item->pic1) }}" class="card-img-top" alt="...">
                        </div>
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


@section('footer')

    <script>

        $(document).ready(function() {

            $('.m_selectpicker').selectpicker('refresh');

        });

    </script>

@endsection

