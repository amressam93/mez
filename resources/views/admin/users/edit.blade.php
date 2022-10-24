@extends('admin.layouts.master')

@section('top_title') المستخدمين  @endsection

@section('main_title') تعديل مستخدم  @endsection


@section('header') 
    <style>
        .card-body .col-sm-12 , .card-body .col-sm-6 { margin-bottom: 20px }

        th,td { text-align: center !important;vertical-align:middle !important }

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
            <h3 class="card-title">تعديل مستخدم</h3>
         </div>

         <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_4">
                            <span class="nav-icon">
                                <i class="flaticon2-chat-1"></i>
                            </span>
                            <span class="nav-text">تعديل مستخدم</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_4">
                            <span class="nav-icon">
                                <i class="flaticon2-drop"></i>
                            </span>
                            <span class="nav-text">الفواتير</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            
        </div>
        <div class="card-body">
            <div class="tab-content">
                
                <div class="tab-pane fade show active" id="kt_tab_pane_1_4" role="tabpanel" aria-labelledby="kt_tab_pane_1_4">
                    @include('admin.users.edit_form')
                </div>

                <div class="tab-pane fade" id="kt_tab_pane_2_4" role="tabpanel" aria-labelledby="kt_tab_pane_2_4">
                    
                    <!--begin: Datatable-->
                    <table class="table table-bordered table-checkable" id="m_table_2">
                        <thead>
                            <tr>
                                <th>رقم التسلسل</th>
                                <th>تاريخ الفاتوره</th>
                                <th>عدد القطع</th>
                                <th>الاجمالي</th>
                                <th>التفاصيل</th>
                            </tr>
                        </thead>
                        <tbody>
                                                    
                            @php $invoices = App\Models\Invoice::where('user_id',$Item->id)->get() @endphp
                                                        
                            @foreach ($invoices as $item)
            
                            <tr>
                                <td> {{ $item->id }} </td>
                                <td> 
                                    {{ Carbon\Carbon::parse($item->operation_date)->format('Y-m-d H:i') }}
                                </td>
                                <td> 
                                    {{ $item->count_items }}
                                </td>
                                <td>
                                    {{ $item->shipping +  $item->total }} ج.م
                                </td>
                                <td>
                                    <a href="{{ asset('admin_panel/invoice_details/'.$item->id) }}" style="color: blue;font-weight:bold">
                                    مشاهده التفاصيل
                                    </a>
                                </td>
                                
                            </tr>
            
                            @endforeach
                            
                        </tbody>
                    </table>
                    <!--end: Datatable-->

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

    <script type="text/javascript">

        $(document).ready(function() {
            
            $("#m_table_30").DataTable({
                responsive: !0,
                paging: !0,
            });

        });

    </script>

    <script>

        $(document).ready(function() {

            $('select[name="gov_id"]').on('change', function() {

                var gov_id = $(this).val();

                if(gov_id) {

                    $.ajax({
                        url: '{{ url('admin_panel/ajax_cities/') }}' + '/' + gov_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
        
                            $('select[name="city_id"]').empty();
                            $('select[name="city_id"]').append('<option value="" disabled selected> اختر مدينة  </option>');
                            
                            $.each(data, function(key, value) {
                                $('select[name="city_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
  
                            $('#city_id').selectpicker('refresh');
  
                        }
                    });
                }else{
                    $('select[name="city_id"]').empty();
        
                }
            });

         

        });

    </script>
     
   

     
@endsection





