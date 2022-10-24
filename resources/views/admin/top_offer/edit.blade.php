@extends('admin.layouts.master')

@section('top_title') العرض العلوي   @endsection

@section('main_title') تعديل عرض  @endsection


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
            <h3 class="card-title">تعديل عرض</h3>
         </div>


         <!--begin::Form-->
         {!! Form::model($Item, [ 'route' => ['admin_panel.top_offer.update' , $Item->id ] , 'method' => 'patch', 'files' => true, 'role'=>'form','id'=>'edit' ]) !!}

            <div class="card-body">

                <input type="hidden" name="id" value="{{$Item->id}}">


                <div class="row">

                    @php
                        $top_offer_categories = App\Models\Top_Offer_Categories::where('top_offer_id',$Item->id)->pluck('category_id')->toArray();
                    @endphp

                    <div class="col-sm-6 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <label>   صفحة رئيسية / قسم رئيسي <span class="text-danger">*</span> </label>
                        <select name="category_id[]" multiple id="category_id" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
                            <option value="0" @if(! empty($top_offer_categories) && in_array(0,$top_offer_categories)) selected={{ 'selected' }} @endif> الصفحة الرئيسية </option>
                            @foreach (H_Main_Category() as $key => $value)
                                <option value="{{ $key  }}" @if(! empty($top_offer_categories) && in_array($key,$top_offer_categories)) selected={{ 'selected' }} @endif> {{ $value  }} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="help-block" style="color:red">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('color') ? ' has-error' : '' }}">
                        <label>  لون الخلفية    <span class="text-danger">*</span> </label>

                        <input type="color" name="color" class="form-control m-input" required="required" value="{{ $Item->color }}" placeholder="  لون الخلفية ">

                        @if ($errors->has('color'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('color') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label>  العنوان    <span class="text-danger">*</span> </label>

                        <input type="text" name="title" class="form-control m-input" required="required" value="{{ $Item->title }}" placeholder="  العنوان ">

                        @if ($errors->has('title'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('title') }} </strong>
                             </span>
                        @endif
                    </div>

                    <div class="col-sm-6 {{ $errors->has('link') ? ' has-error' : '' }}">
                        <label>  الرابط   </label>

                        <input type="text" name="link" class="form-control m-input" value="{{ $Item->link }}" placeholder="  الرابط ">

                        @if ($errors->has('link'))
                             <span class="help-block" style="color:red">
                                  <strong>{{ $errors->first('link') }} </strong>
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



@section('footer')

    <script>

        $(document).ready(function() {

            $('.m_selectpicker').selectpicker('refresh');

        });

    </script>

@endsection
