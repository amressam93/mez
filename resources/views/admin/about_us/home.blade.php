@extends('admin.layouts.master')

@section('top_title') من نحن  @endsection

@section('main_title') من نحن  @endsection


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
            <h3 class="card-title">من نحن</h3>
         </div>


         <!--begin::Form-->
         {!! Form::open(['url' => "admin_panel/about_us", 'role'=>'form','id'=>'add', 'files' => true,'method'=>'post']) !!}

            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label>  الوصف      </label>
                        <textarea name="description" required id="editor1" class="form-control" placeholder=" الوصف ">{{ $Item->description }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block" style="color:red">
                                <strong>{{ $errors->first('description') }} </strong>
                            </span>
                        @endif
                    </div>
                </div>




            </div>

            <div class="card-footer">
               <button type="submit" form="add" class="btn btn-primary mr-2"> حفظ ال </button>
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

     <script src="{{ asset('files/ckeditor/ckeditor.js') }}"></script>

     <script>
            CKEDITOR.replace( 'editor1' );
     </script>

@endsection
