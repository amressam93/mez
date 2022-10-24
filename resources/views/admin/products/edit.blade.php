@extends('admin.layouts.master')

@section('top_title') المنتجات  @endsection

@section('main_title') تعديل منتج  @endsection

@php
    $setting = App\Models\Setting::first();   
@endphp

@section('header') 
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6, .card-body .col-sm-4,.card-body .col-md-3  { margin-bottom: 20px }

        .un_active { display: none }

        .active { display: block }

        .toggle_form {
            display: none
        }

        th,td {
            text-align: center !important
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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- Start Row -->
<div class="row">

   <div class="col-md-12">

      <!--begin::Card-->
      <div class="card card-custom gutter-b example example-compact">

         <div class="card-header">
            <h3 class="card-title">تعديل منتج</h3>
         </div>

         <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                            <span class="nav-icon">
                                <i class="flaticon2-chat-1"></i>
                            </span>
                            <span class="nav-text">تعديل منتج</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                            <span class="nav-icon">
                                <i class="flaticon2-drop"></i>
                            </span>
                            <span class="nav-text">صور المنتج</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                    @include('admin.products.edit_form')
                </div>
                <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                    @include('admin.products.product_images')
                </div>
            </div>
        </div>
    



         


      </div>
      <!--end::Card-->

   </div>


   
</div>
<!-- End Row -->

@endsection


@Section('footer')

     <script src="{{ asset('files/admin/ckeditor/ckeditor.js') }}"></script>

     <script>
            CKEDITOR.replace( 'editor1' );
     </script>

     <script>

        $(document).ready(function () {
        
            $("#m_table_2").DataTable({
                responsive: !0,
                paging: !0,
                columnDefs: [ {
                    targets: -1,
                    title: "tools",
                    orderable: !1
                    }
                ]
            });
        
        
            $('#m_table_2').on('click', '.DeletingModal', function () {
        
                var ID = $(this).attr("name");
               
                swal({
                        title: "هل تريد حقا حذف هذا الصوره ؟",
                        text: "بعد حذف هذا الصوره لا يمكنك العودة.",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "نعم",
                        cancelButtonText: "لا",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.href = '{{ url('admin_panel/product_images/delete_image') }}' + '/' + ID;
        
                        }
                    });
            });
        

            $('#add_btn').click(function() {

                $('.add_slider').toggleClass('toggle_form');

            });
            
        });
        
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

