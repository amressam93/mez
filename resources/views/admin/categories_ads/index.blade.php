@extends('admin.layouts.master')

@section('top_title') اعلانات الاقسام الرئيسية @endsection

@section('main_title') اضافه اعلان جديد  @endsection

@section('sub_title')

    <a href="{{ url('admin_panel/categories_ads/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه اعلان جديد
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
                        <th>   عنوان الاعلان </th>
                        <th>  الحالة </th>
                        <th> الأدوات </th>
                    </tr>
                </thead>
                <tbody>

                    @php $x = 1; @endphp

                    @foreach($Item as $value)

                    <tr>
                        <td>
                            <input type="number" min="0" style="width: 80px;text-align: center;margin: auto;" value="{{ $value->order }}" name="order"  class="order_input update-order form-control" data-id="{{ $value->id }}">
                        </td>

                        <td> {{ $value->title }} </td>

                        <td> {{ $value->status == 0 ? 'غير فعال' : 'فعال' }} </td>

                        <td>
                            <a href="{{ url('admin_panel/categories_ads/'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                                <i class="la la-edit"></i>
                            </a>

                            <span class='DeletingModal m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='حذف'>
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
                iDisplayLength: 100,
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
                        window.location.href = '{{ url('admin_panel/categories_ads/destroy') }}' + '/' + ID;

                    }
                });
            });


            $(".order_input").on('change', function() {

                var ele = $(this);

                var order = ele.val();

                $.ajax({
                    url: '{{ url('admin_panel/categories_ads/update-order') }}',
                    method: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        order: order
                    },
                    dataType: "json",
                    success: function (response) {
                        ele.val(response.data);
                    }
                });
            });

        });

    </script>




@endsection








