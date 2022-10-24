@extends('admin.layouts.master')

@section('top_title') المقاسات  @endsection

@section('main_title') تعديل مقاس  @endsection


@section('header') 
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6, .card-body .col-sm-4 { margin-bottom: 20px }

        .un_active { display: none }

        .active { display: block }

        .toggle_form {
            display: none
        }

        th,td {
            text-align: center !important
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
            <h3 class="card-title">تعديل مقاس</h3>
         </div>

        <div class="card-body">
            <!--begin::Form-->
            {!! Form::model($Item, [ 'route' => ['admin_panel.size.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}
                
                <input type="hidden" name="id" value="{{$Item->id}}">
                
                <div class="row">
                    <div class="col-sm-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  اسم المقاس  <span class="text-danger">*</span> </label>
                        
                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ $Item->title }}" placeholder=" اسم المقاس">
                        
                        @if ($errors->has('title'))
                                <span class="help-block" style="color:red">
                                    <strong>{{ $errors->first('title') }} </strong>
                                </span> 
                        @endif
                    </div>
        
                    <div class="col-sm-6 {{ $errors->has('main_category_id') ? ' has-error' : '' }}">
                        <label>  الاقسام الرئيسية <span class="text-danger">*</span> </label>
                        <select name="main_category_id" id="main_category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true">  اختر قسم </option>
                            @foreach (H_Main_Category() as $key => $value)
                                <option value="{{ $key }}" @if($Item->main_category_id == $key) {{ 'selected' }} @endif> {{ $value }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('main_category_id'))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first('main_category_id') }}</strong>
                        </span>
                        @endif
                    </div>
        
                    @php
                        $sub_cats = App\Models\Sub_Category::where('main_category_id',$Item->main_category_id)->pluck('title','id');   
                    @endphp
                    <div class="col-sm-6 {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                        <label>  الاقسام الفرعية  </label>
                        <select name="sub_category_id" id="sub_category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="" disabled selected="true"> اختر قسم </option>
                            @if($sub_cats != null)
                                @foreach ($sub_cats as $key => $value)
                                    <option value="{{ $key  }}" @if($key == $Item->sub_category_id ) selected={{ 'selected' }} @endif> {{ $value  }} </option>
                                @endforeach
                            @endif
                        </select>
                        @if ($errors->has('sub_category_id'))
                         <span class="help-block" style="color:red">
                             <strong>{{ $errors->first('sub_category_id') }}</strong>
                         </span>
                        @endif
                     </div>
            
                   
                   
                </div>
                
                
                <button type="submit" form="edit" class="btn btn-primary mr-2">Save</button>
                        
        
            {!! Form::close() !!}
            <!--end::Form-->
        </div>
    



         


      </div>
      <!--end::Card-->

   </div>


   
</div>
<!-- End Row -->

@endsection


@Section('footer')

     
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
                            $('select[name="product_category_id"]').empty();
                            $('select[name="product_category_id"]').append('<option value="" disabled selected> اختر قسم  </option>');
                          
  
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

        });

     </script>

     
@endsection

