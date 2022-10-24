@extends('admin.layouts.master')

@section('top_title') المنتجات  @endsection

@section('main_title') اضافه منتج جديد  @endsection

@php
    $setting = App\Models\Setting::first();
@endphp

@section('header')
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6, .card-body .col-sm-4,.card-body .col-md-3 { margin-bottom: 20px }

        .repeater-default , .repeater-default_1 , .repeater-default_2 { width:100% !important; }

        .repeater-default_2 input[type=text] , .repeater-default_2 input[type=number] ,
        .repeater-default_2 select {
            width: 100% !important;
        }

        .repeater-default , .repeater-default_1 , .repeater-default_2 {
            padding-left: 0;
            padding-right: 0;
        }


        .repeater-default_1 .repeater-default_2:nth-child(1) .col-md-1 {
            margin-top: 0 !important;
            display: none
        }

        .btn-add {
            color: #FFF;
            background: #1BC5BD;
        }

        .btn-add i , .btn-add:hover  {
            color: #FFF !important;
        }

    </style>


    <link rel="stylesheet" href="{{ asset('files/tagsinput/tagsinput.css') }}">

    <style>

        .bootstrap-tagsinput {
            min-height: calc(2.95rem + 2px);
            line-height: calc(2.4rem);
        }


        .bootstrap-tagsinput .badge [data-role="remove"] {
            margin-left: 0px;
            margin-right: 10px;
        }

        .bootstrap-tagsinput .badge {
            margin: 2px 0;
            padding: 9px 8px;
            margin-right: 5px
        }

        .bootstrap-tagsinput .badge [data-role="remove"]:after {
            font-size: 11px;
            padding: 1px 7px !important;
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
            <h3 class="card-title">اضافه منتج جديد</h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/products", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">
                    <div class="col-sm-4 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  اسم المنتج  <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ old('title') }}" placeholder=" اسم المنتج">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>


                    <div class="col-md-4 col-sm-4 {{ $errors->has('main_category_id') ? ' has-error' : '' }}">
                        <label>  الاقسام الرئيسية <span class="text-danger">*</span> </label>
                        <select name="main_category_id" id="main_category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true">  اختر قسم </option>
                            @foreach (H_Main_Category() as $key => $value)
                                <option value="{{ $key }}" @if(old('main_category_id') == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('main_category_id'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('main_category_id') }}</strong>
                         </span>
                        @endif
                    </div>

                     <div class="col-sm-4 {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                        <label>  الاقسام الفرعية  <span class="text-danger">*</span> </label>
                        <select name="sub_category_id" id="sub_category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true"> اختر قسم </option>
                        </select>
                        @if ($errors->has('sub_category_id'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('sub_category_id') }}</strong>
                         </span>
                        @endif
                     </div>


                    <div class="col-sm-4 {{ $errors->has('brand') ? ' has-error' : '' }}">
                        <label>  الماركة   </label>

                        <input type="text" name="brand" class="form-control m-input" value="{{ old('brand') }}" placeholder=" الماركة  ">

                        @if ($errors->has('brand'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('brand') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('price_before_discount') ? ' has-error' : '' }}">
                        <label>  السعر  <span class="text-danger">*</span>  </label>

                        <input type="number" min="0" name="price_before_discount" class="form-control m-input" required="required" value="{{ old('price_before_discount') }}" placeholder=" السعر  ">

                        @if ($errors->has('price_before_discount'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('price_before_discount') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('discount') ? ' has-error' : '' }}">
                        <label>  نسبة الخصم  </label>

                        <input type="number" min="0" max="100" name="discount" class="form-control m-input" value="0" placeholder=" نسبة الخصم  ">

                        @if ($errors->has('discount'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('discount') }} </strong>
                             </span>
                        @endif
                    </div>



                </div>


                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('url') ? ' has-error' : '' }}">
                        <label>  اللينك  <span class="text-danger">*</span> </label>

                        <input type="text" name="url" class="form-control m-input" required="required" value="{{ old('url') }}" placeholder=" اللينك">

                        @if ($errors->has('url'))
                            <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('url') }} </strong>
                             </span>
                        @endif
                    </div>


                </div>

                <div class="row">

                    <div class="col-md-4 col-sm-4 {{ $errors->has('color_id') ? ' has-error' : '' }}">
                        <label> الالون <span class="text-danger">*</span> </label>
                        <select name="color_id" id="color_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true">  اختر لون </option>
                            @foreach (H_Colors() as $key => $value)
                                <option value="{{ $key }}" @if(old('color_id') == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('color_id'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('color_id') }}</strong>
                         </span>
                        @endif
                    </div>

                    <div class="col-sm-4 {{ $errors->has('pic') ? ' has-error' : '' }}">
                        <label>  الصورة (460*460) <span class="text-danger">*</span> </label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" required name="pic" accept="image/*">
                           <label class="custom-file-label"> اختر صورة </label>
                        </div>
                        @if ($errors->has('pic'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('pic') }}</strong>
                            </span>
                        @endif
                     </div>

                     <div class="col-sm-4 {{ $errors->has('slider') ? ' has-error' : '' }}">
                        <label>  صور المنتج (460*460) <span class="text-danger">*</span> </label>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" required  name="slider[]" multiple accept="image/*">
                           <label class="custom-file-label"> اختر صوره او اكثر </label>
                        </div>
                        @if ($errors->has('slider'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('slider') }}</strong>
                            </span>
                        @endif
                     </div>
                </div>

                <div class="col-lg-12 col-sm-12 {{ $errors->has('tags') ? ' has-error' : '' }}">
                    <label> التاجات    </label>
                    <input type="text" data-role="tagsinput" name="tags" class="form-control m-input en_tag_input" value="{{ old('tags') }}" placeholder=" التاجات.... ">
                    @if ($errors->has('tags'))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first('tags') }} </strong>
                        </span>
                    @endif
                 </div>



                <div class="m-separator m-separator--dashed" style="display: block;height: 5px;width: 100%;border-bottom: 2px dashed #ebedf2;margin-bottom:30px;margin-top:30px"></div>

                <div class="row">

                    <div class="col-md-6 col-sm-6 {{ $errors->has('size1') ? ' has-error' : '' }}">
                        <label>  المقاسات <span class="text-danger">*</span>  </label>
                        <select name="size1" class="size_id form-control" required>
                            <option value="" disabled selected> اختر مقاس  </option>
                        </select>
                        @if ($errors->has('size1'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('size1') }}</strong>
                         </span>
                        @endif
                     </div>


                      <div class="col-md-6 col-sm-6 {{ $errors->has('quantity1') ? ' has-error' : '' }}">
                        <label>  الكمية   <span class="text-danger">*</span> </label>

                        <input type="number" min="1" name="quantity1" class="quantity form-control m-input" required="required" value="{{ old('quantity1') != null ? old('quantity1') : 0 }}" placeholder="  الكمية ">

                        @if ($errors->has('quantity1'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('quantity1') }} </strong>
                             </span>
                        @endif
                    </div>

                </div>



                <div class="m-separator m-separator--dashed" style="display: block;height: 5px;width: 100%;border-bottom: 2px dashed #ebedf2;margin-bottom:30px;margin-top:30px"></div>

                <div class="row">

                    @for($i=2; $i <= $setting->product_sizes_count; $i++)

                        <div class="col-md-3 col-sm-3 {{ $errors->has('size$i') ? ' has-error' : '' }}">
                            <label>  المقاسات  </label>
                            <select name="size{{$i}}" class="size_id form-control">
                                <option value="" selected> اختر مقاس  </option>
                            </select>
                            @if ($errors->has("size{{$i}}"))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first("size$i") }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="col-md-3 col-sm-3 {{ $errors->has("quantity$i") ? ' has-error' : '' }}">
                            <label>  الكمية   </label>

                            <input type="number" min="0" name="quantity{{$i}}" class="quantity form-control m-input" value="{{ old("quantity$i") != null ? old("quantity$i") : 0 }}" placeholder="  الكمية ">

                            @if ($errors->has("quantity{{$i}}"))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first("quantity$i") }} </strong>
                                </span>
                            @endif
                        </div>

                    @endfor


                </div>








                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('short_description') ? ' has-error' : '' }}" style="margin-top: 30px">
                        <label> وصف مختصر <span class="text-danger">*</span>  </label>
                        <textarea name="short_description" required class="form-control" rows="10" placeholder=" وصف مختصر  ">{{ old('short_description') }}</textarea>
                        @if ($errors->has('short_description'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('short_description') }} </strong>
                            </span>
                        @endif
                     </div>

                     <div class="col-sm-12 {{ $errors->has('long_description') ? ' has-error' : '' }}">
                        <label>  وصف مطول <span class="text-danger">*</span>  </label>
                        <textarea name="long_description" required id="editor1" class="form-control" placeholder=" وصف مطول ">{{ old('long_description') }}</textarea>
                        @if ($errors->has('long_description'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('long_description') }} </strong>
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



@Section('footer')

     <script src="{{ asset('files/admin/ckeditor/ckeditor.js') }}"></script>

     <script>
            CKEDITOR.replace( 'editor1');
     </script>

     <script>

        $(document).ready(function() {

            $('select[name="main_category_id"]').on('change', function() {
                var main_category_id = $(this).val();
                if(main_category_id) {
                    $.ajax({
                        url: '{{ url('admin_panel/ajax_sub_category/') }}' + '/' + main_category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('select[name="sub_category_id"]').empty();
                            $('select[name="sub_category_id"]').append('<option value="" disabled selected> اختر قسم  </option>');

                            $('.size_id').empty();
                            $('.size_id').append('<option value="" disabled selected> اختر مقاس   </option>');

                            $('.quantity').val(0);

                            $.each(data, function(key, value) {
                                $('select[name="sub_category_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                            $('#sub_category_id').selectpicker('refresh');

                        }
                    });
                }else{
                    $('select[name="sub_category_id"]').empty();

                }
            });

            $('select[name="sub_category_id"]').on('change', function() {
                var sub_category_id = $(this).val();
                if(sub_category_id) {
                    $.ajax({
                        url: '{{ url('admin_panel/ajax_sizes/') }}' + '/' + sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {

                            $('.size_id').empty();
                            $('.size_id').append('<option value="" disabled selected> اختر مقاس   </option>');

                            $('.quantity').val(0);

                            $.each(data, function(key, value) {
                                $('.size_id').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                            $('.m_selectpicker').selectpicker('refresh');
                        }
                    });
                }else{
                    $('.size_id').empty();

                }
            });


        });

    </script>


    <script src="{{ asset('files/tagsinput/tagsinput.js') }}"></script>





@endsection





