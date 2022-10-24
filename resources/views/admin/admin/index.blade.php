@extends('admin.layouts.master')

@section('top_title')  أداره الموقع  @endsection

@section('main_title') اضافه مدير جديد  @endsection

@section('sub_title') 

    {{--
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add New Manager </h5>
    --}}

    {{--<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>--}}
    
    <a href="{{ url('admin_panel/admin/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه مدير جديد
    </a>

@endsection

@section('header')
    <style>
        td,th { text-align: center }
    </style>
@endsection

@section('content')

    @include('flash-message')

    <!--begin::Card-->
    <div class="card card-custom">
        
        <div class="card-body">            
           

            <!--begin: Datatable-->
            <table class="table table-bordered table-checkable" id="m_table_1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>  الاسم  </th>
                        <th>  البريد الالكتروني </th>
                        <th>  رقم الموبيل </th>
                        <th> الأدوات </th>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $x = 1; @endphp 
                    
                    @foreach($Item as $value)

                    <tr>
                        <td> {{ $x }} </td>
                        <td> {{ $value->name }} </td>
                        <td> {{ $value->email }} </td>
                        <td> {{ $value->mobile }} </td>
                    
                        <td>
                            <a href="{{ url('admin_panel/admin/'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                                <i class="la la-edit"></i>
                            </a>
                            
                            @if($value->status == 0)
                            <span class='DeletingModal m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='Delete'>
                                 <i class="fa fa-trash"></i>
                            </span>
                            @endif
                        </td>
                        
                        
                    </tr>

                    @php $x = $x + 1; @endphp
               @endforeach

                    
                </tbody>
            </table>
            <!--end: Datatable-->

        </div>
    </div>
    <!--end::Card-->


@endsection

@section('footer')

      <script>

        $(document).ready(function () {

            $("#m_table_1").DataTable({
                responsive: !0,
                paging: !0,
                columnDefs: [ 
                    {
                        targets: -1,
                        title: "الأدوات",
                        orderable: !1
                    }
                ]
            });


            $('#m_table_1').on('click', '.DeletingModal', function () {

                var ID = $(this).attr("name");
               
                         
                swal({
                        title: "هل تريد حقا حذف هذا الصف؟",
                        text: "بعد حذف هذا الصف لا يمكنك العودة.",
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
                            window.location.href = '{{ url('admin_panel/admin/destroy') }}' + '/' + ID;
     
                        }
                    });
            });

        });

    </script>


@endsection








