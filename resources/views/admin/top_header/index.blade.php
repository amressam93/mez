@extends('admin.layouts.master')

@section('top_title') الهيدر العلوي @endsection

@section('main_title') الهيدر العلوي @endsection


@section('sub_title')

    <a href="{{ url('admin_panel/top_header/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه عنصر جديد
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
                       <th>العنوان</th>
                       <th> الادوات </th>
                    </tr>
                 </thead>

                 <tbody>

                    @php $x = 1; @endphp

                    @foreach($Item as $value)

                    <tr>
                       <td> {{ $x }} </td>
                       <td>
                          {{ $value->title }}
                       </td>
                       <td nowrap>

                          <a href="{{ url('admin_panel/top_header'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                            <i class="la la-edit"></i>
                          </a>

                          <span class='DeletingModal m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='Delete'>
                            <i class="fa fa-trash"></i>
                       </span>
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
                        window.location.href = '{{ url('admin_panel/top_header/destroy') }}' + '/' + ID;

                    }
                });
            });



        });

    </script>


@endsection








