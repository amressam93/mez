@extends('admin.layouts.master')

@section('top_title') العرض العلوي @endsection

@section('main_title') العرض العلوي @endsection


@section('sub_title')

    <a href="{{ url('admin_panel/top_offer/create') }}" class="btn btn-light-warning font-weight-bolder btn-sm">
        اضافه عرض جديد
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
                          <a href="{{ url('admin_panel/top_offer'). '/' . $value->id . '/edit'}}" class='m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' title='Edit'>
                          <i class="la la-edit"></i>
                          </a>
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





        });

    </script>


@endsection








