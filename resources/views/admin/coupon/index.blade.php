@extends('admin.layouts.master')

@section('top_title') الكوبون @endsection

@section('main_title') اضافه كوبون جديد  @endsection

@section('sub_title')

    <a href="{{ url('admin_panel/coupon/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه كوبون جديد
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
                        <th> الكوبون </th>
                        <th> الحاله </th>
                        <th> نسبة الخصم </th>
                        <th> الأدوات </th>
                    </tr>
                </thead>
                <tbody>

                    @php $x = 1; @endphp

                    @php $x = 1; @endphp

                     @foreach($Item as $value)

                     <tr>
                        <td> {{ $x }} </td>
                        <td>
                           {{ $value->title }}
                        </td>
                        <td>
                           {{ $value->status == 0 ? 'غير فعال' : 'فعال' }}
                        </td>
                        <td>
                            {{ $value->value }}
                         </td>


                        <td nowrap>

                            <a href="{{ url('admin_panel/coupon/'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                                <i class="la la-edit"></i>
                            </a>

                           @if($value->status == '0')
                           <span class="accept" data-id="{{ $value->id }}" style="color: green;font-weight:bold;cursor:pointer;text-align: center;">
                              <i class="fa fa-thumbs-up" style="font-size: 20px" aria-hidden="true"></i>
                           </span>

                           @else
                           <span class="refused" data-id="{{ $value->id }}" style="color: red;font-weight:bold;cursor:pointer;text-align: center;">
                              <i class="fa fa-thumbs-down" style="font-size: 20px" aria-hidden="true"></i>
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


            $('#m_table_1').on('click', '.accept', function () {

                var ID = $(this).data("id");


                swal({
                      title: "هل تريد فعلاً تفعيل هذه الكوبون؟",
                      text: "بعد تفعيل هذه الكوبون ، لا يمكنك العودة.",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "yes",
                      cancelButtonText: "no",
                      closeOnConfirm: true,
                      closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.href = '{{ url('admin_panel/coupon_accept') }}' + '/' + ID;

                        }
                    });
            });


            $('#m_table_1').on('click', '.refused', function () {

                var ID = $(this).data("id");


                    swal({
                      title: "هل تريد حقًا رفض هذه الكوبون؟",
                      text: "بعد رفض هذه الكوبون ، لا يمكنك العودة.",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "yes",
                      cancelButtonText: "no",
                      closeOnConfirm: true,
                      closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            window.location.href = '{{ url('admin_panel/coupon_refused') }}' + '/' + ID;

                        }
                    });
            });


        });

    </script>


@endsection








