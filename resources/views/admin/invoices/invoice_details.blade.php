@extends('admin.layouts.master')

@section('top_title') تفاصيل الفاتوره  @endsection

@section('main_title') تفاصيل الفاتوره  @endsection

@section('header')
    <style>

       td,th { text-align: center }

       .fa , .btn.m-btn--hover-brand:not(.btn-secondary):not(.btn-outline-light) i  {
         color: #898b96;
         cursor: pointer;
         display: inline-block;
         margin-left: 5px;
         margin-right: 5px;
         font-size: 25px;
       }

       .btn.m-btn--hover-brand:not(.btn-secondary):not(.btn-outline-light) { margin-top: -10px }

       label {
         font-size: 18px !important;
         font-weight: 500 !important;
      }


    </style>
@endsection

@section('content')

    @include('flash-message')

    <!--begin::Card-->
    <div class="card card-custom">
        
        <div class="card-body">            
           

         <div class="user_content" style="margin-bottom:30px">

            <h3 style="margin-bottom:50px"><b style="border-bottom: 2px dashed #DDD;padding-bottom:10px">تفاصيل المستخدم</b></h3>

            @php $user_inv = App\Models\Invoice_User::where('id',$invoice->shipping_id)->first(); @endphp

            @if($user_inv != null)

               <label> <b>المستخدم</b> : {{ $user_inv->name }} </label>&nbsp
               <label>&nbsp;,&nbsp;  <b>االبريد الالكتروني</b> : {{ $user_inv->email }} </label>
               <label>&nbsp;,&nbsp;  <b>الموبيل</b> : {{ $user_inv->mobile }} </label>

               <br>

               <label> <b>المحافظه</b> : {{ $user_inv->governorate != null ? $user_inv->governorate->name : '' }} </label>
               <label>&nbsp;,&nbsp;  <b>المدينة</b> : {{ $user_inv->city != null ? $user_inv->city->name : '' }} </label>

            @endif

            <br>

            
            @if($invoice->address != null)
            <label> <b> العنوان بالتفصيل	</b> : {{ $invoice->address }}  &nbsp;,&nbsp;  </label>
            @endif

            @if($invoice->notes != null)
            <label> <b> الملاحظات	</b> : {{ $invoice->notes }} </label>
            @endif

            <br>

            
            <label> <b>رقم الفاتورة	</b> : {{ $invoice->serial_number }} </label>
            <label>&nbsp;,&nbsp;  <b>تاريخ الفاتورة	</b> : {{ $invoice->operation_date }} </label>

         </div>

            <!--begin: Datatable-->

            <table class="table table-bordered table-checkable" id="m_table_1">
               
               <thead>
                  <tr>
                     <th style="font-weight: bold;font-size:15px"> المنتج   </th>
                     <th style="font-weight: bold;font-size:15px">  اللون  </th>
                     <th style="font-weight: bold;font-size:15px">  المقاس  </th>
                     <th style="font-weight: bold;font-size:15px">  الكمية  </th>
                     <th style="font-weight: bold;font-size:15px">  السعر   </th>
                     <th style="font-weight: bold;font-size:15px"> الاجمالي    </th>
                  </tr>
               </thead>


               <tbody>

                  @if($Item->count() > 0)
                     @foreach($Item as $value)

                     <tr>
                        
                        <td> 
                           <a href="{{ url('admin_panel/products/'.$value->product->id.'/edit') }}" style="color:blue;font-weight:bold">
                              {{ $value->product->title }} 
                        </a> 
                        </td>
                        <td> 
                           <b>
                              {{ $value->product_color != null ? $value->product_color->title : '' }} 
                           </b> 
                        </td>
                        <td> 
                           <b>
                              {{ $value->product_size != null ? $value->product_size->title : '' }} 
                           </b> 
                        </td>
                        <td> 
                           <b>
                              {{ $value->quantity }} 
                           </b> 
                        </td>
                        <td> {{ $value->sub_total }} ج.م </td>
                        <td> {{ $value->quantity * $value->sub_total }} ج.م </td>

                     </tr>

                     @endforeach

                    
                     <tr>
                        <th style="font-weight: bold;font-size:15px">الأجمالي </th>
                        <td colspan="5"> {{ $invoice->sub_total }} ج.م </td>
                     </tr>
                     
                      <tr>
                        <th style="font-weight: bold;font-size:15px">قيمة الشحن</th>
                        <td colspan="5"> {{ $invoice->shipping_value }} ج.م </td>
                     </tr>
                     <tr>
                        <th style="font-weight: bold;font-size:15px"> قيمة الخصم </th>
                        <td colspan="5"> 
                           {{ $invoice->coupon != null ? $invoice->coupon->title : '' }} ({{ $invoice->coupon_value }} ) ج.م
                            
                        </td>
                     </tr>
                     
                     <tr>
                        <th style="font-weight: bold;font-size:15px">اجمالي الفاتوره	 </th>
                        <td colspan="5"> {{ $invoice->total  }} ج.م </td>
                     </tr>

                  @endif

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
   
       $("#m_table_100").DataTable({
           responsive: !0,
           paging: !0,
           orderable: !1
       });
   
   

   });
   
</script>

@endsection


















