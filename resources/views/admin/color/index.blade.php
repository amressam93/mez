@extends('admin.layouts.master')

@section('top_title') الألوان @endsection

@section('main_title') اضافه لون جديد  @endsection

@section('sub_title') 

    <a href="{{ url('admin_panel/color/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه لون جديد
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
                        <th>  اسم اللون </th>
                        <th> الأدوات </th>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $x = 1; @endphp 
                    
                    @foreach($Item as $value)

                    <tr>
                        <td> {{ $x }} </td>
                        <td> {{ $value->title }} </td>
                        
                        <td>
                            <a href="{{ url('admin_panel/color/'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                                <i class="la la-edit"></i>
                            </a>
                            
                            @if($value->status == 0)
                            <span class='active m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='تفعيل'>
                                 <i class="fas fa-check"></i>
                            </span>
                            @else
                            <span class='un_active m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='حذف'>
                                <i class="fas fa-times"></i>
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



            $('#m_table_1').on('click', '.un_active', function () {

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
                            window.location.href = '{{ url('admin_panel/color/un_active') }}' + '/' + ID;
     
                        }
                    });
            });

            $('#m_table_1').on('click', '.active', function () {

                var ID = $(this).attr("name");
               
                         
                swal({
                        title: "هل تريد حقا تفعيل هذا الصف؟",
                        text: "بعد تفعيل هذا الصف لا يمكنك العودة.",
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
                            window.location.href = '{{ url('admin_panel/color/active') }}' + '/' + ID;
     
                        }
                    });
            });

        });

    </script>


@endsection








