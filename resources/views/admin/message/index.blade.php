@extends('admin.layouts.master')

@section('top_title') الرسائل @endsection

@section('main_title') الرسائل  @endsection


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
                        <th>  الاسم </th>
                        <th> البريد الالكتروني   </th>
                        <th> رقم الموبيل   </th>
                        <th> الرساله </th>
                        <th>الادوات</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @php $x = 1; @endphp 
                    
                    @foreach($Item as $value)

                        <tr>
                            <td> {{ $x }} </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email  }}</td>
                            <td>{{ $value->mobile  }}</td>
                            
                            <td> 
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$value->id}}">مشاهده الرساله</button>
                            </td>
                        
                            <td>
                                <span class='DeletingModal m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='Delete'>
                                    <i class="fa fa-trash"></i>
                                </span>
                            </td>
                            
                        </tr>

                        <div class="modal fade" id="exampleModal{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title">الرساله</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        {{$value->message}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                </div>
                            </div>
                            </div>
                        </div>

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
                        title: "الادوات",
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
                            window.location.href = '{{ url('admin_panel/messages/destroy') }}' + '/' + ID;
     
                        }
                    });
            });

        });

    </script>


@endsection








