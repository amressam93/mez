@extends('admin.layouts.master')

@section('top_title') المنتجات @endsection

@section('main_title') اضافه منتج جديد  @endsection

@section('sub_title')

    <a href="{{ url('admin_panel/products/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه منتج جديد
    </a>

@endsection

@section('header')
    <style>
        td,th { text-align: center }
    </style>

    <style>
        .blue_span {
          color:#fff;
          background:blue;
          width:25px;
          height:25px;
          line-height:25px;
          border-radius:50%;
          text-align:center;
          font-weight:bold;
          display:inline-block
        }

        .blue_url {
          color:#fff;
          background:blue;
          width:25px;
          height:25px;
          line-height:25px;
          border-radius:50%;
          text-align:center;
          font-weight:bold;
          display:inline-block
        }

        .blue_url:hover { color: #FFF }

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
                        <th>  اسم المنتج </th>
                        <th>   اجمالي القطع </th>
                        <th> القسم الرئيسي </th>
                        <th> القسم الفرعي </th>
                        <th>  الصوره </th>
                        <th> الادوات </th>
                    </tr>
                </thead>
                <tbody>

                    @php $x = 1; @endphp

                    @foreach($Item as $value)

                    <tr>
                        <td> {{ $x }} </td>
                        <td> {{ $value->title }} </td>
                        <td> <span class="blue_span"> {{ H_Product_Items($value->id) }} </span> </td>
                        <td>
                            @if($value->main_category)
                                <a href="{{ url("admin_panel/main_categories/".$value->main_category->id."/edit") }}">
                                    {{ $value->main_category->title }}
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($value->sub_category)
                                <a href="{{ url("admin_panel/sub_categories/".$value->sub_category->id."/edit") }}">
                                    {{ $value->sub_category->title }}
                                </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ Custom_Image_Path('products',$value->pic) }}">
                                <img src="{{ Custom_Image_Path('products',$value->pic) }}" style="height:200px;width:200px;display: block;margin: auto;">
                            </a>
                         </td>

                        <td>
                            <a href="{{ url('admin_panel/products/'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
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
                        title: "tools",
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
                            window.location.href = '{{ url('admin_panel/products/un_active') }}' + '/' + ID;

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
                            window.location.href = '{{ url('admin_panel/products/active') }}' + '/' + ID;

                        }
                    });
            });

        });

    </script>


@endsection








