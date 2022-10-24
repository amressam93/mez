@extends('admin.layouts.master')

@section('top_title') الاقسام الفرعية @endsection

@section('main_title') اضافه قسم جديد  @endsection

@section('sub_title')

    <a href="{{ url('admin_panel/sub_categories/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه قسم جديد
    </a>

@endsection

@section('header')
    <style>
        td,th { text-align: center }

        .feature_catgeory {
            color: blue
        }
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
                        <th>   اسم القسم  </th>
                        <th> القسم الرئيسي </th>
                        <th>  صوره المقاسات </th>
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

                        <td>
                            @if($value->main_category)
                                <a href="{{ url("admin_panel/main_categories/".$value->main_category->id."/edit") }}">
                                    {{ $value->main_category->title }}
                                </a>
                            @endif
                        </td>
                        <td>
                            <img src="{{ Custom_Image_Path('sub_categories_images',$value->pic) }}" style="width: 130px;height:100px;display: block;margin: auto;">
                         </td>

                        <td>

                            <a href="{{ url('admin_panel/sub_categories/'). '/' . $value->id . '/feature'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                                <i class="fa fa-star @if($value->feature == 1) {{ 'feature_catgeory' }} @endif"></i>
                            </a>

                            <a href="{{ url('admin_panel/sub_categories/'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
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
                iDisplayLength: 100,
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
                            window.location.href = '{{ url('admin_panel/sub_categories/un_active') }}' + '/' + ID;

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
                            window.location.href = '{{ url('admin_panel/sub_categories/active') }}' + '/' + ID;

                        }
                    });
            });


            $(".order_input").on('change', function() {

                var ele = $(this);

                var order = ele.val();

                $.ajax({
                    url: '{{ url('admin_panel/sub_categories/update-order') }}',
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








