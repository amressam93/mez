   
   
   <table class="table table-bordered table-checkable" id="m_table_1">
      <thead>
         <tr>
            <th>رقم الفاتورة</th>
            <th> اسم المستخدم   </th>
            <th> تاريخ الفاتوره   </th>
            <th>  قيمة الشحن </th>
            <th>   الكوبون </th>
            <th> الاجمالي </th>
            <th>الحالة</th>
            <th> اخر تحديث</th>
            <th>الادوات</th>
         </tr>
      </thead>
      <tbody>
         
         @php $x = 1; @endphp 
         
         @foreach($Item as $value)
            
            @php
               $user = App\Models\Users::where('id',$value->user_id)->first();   
            @endphp

            <tr>
               <td>
                  <a href="{{ url('admin_panel/invoice_details/'.$value->id) }}" style="color:blue;font-weight:bold">
                     {{ $value->serial_number }}
                  </a> 
               </td>
               <td> 
                  @if($user != null)
                  <a href="{{ url('admin_panel/users/'.$user->id.'/edit') }}" style="color:blue;font-weight:bold">
                     {{ $user->name }} 
                  </a> 
                  @endif
               </td>
               <td> {{ Carbon\Carbon::parse($value->created_at)->format('Y-m-d H:i') }} </td>
               <td> {{ $value->shipping_value }} ج.م </td>

               <td> {{ $value->coupon != null ? $value->coupon->title : '' }} ({{ $value->coupon_value }}) </td>


               <td> {{ $value->total  }} ج.م </td>
               <td> {{ $value->status }} </td>
               
               <td> {{ Carbon\Carbon::parse($value->updated_at)->format('Y-m-d H:i') }} </td>
              
               <td nowrap>
                  
                  <a href="{{ url('admin_panel/invoice_details/'.$value->id) }}" style="color:blue;font-weight:bold">
                     <i class="fa fa-eye"></i>
                  </a> 

                  @if($value->status != 'جاري المراجعه')
                     <i class="fa fa-tasks invoice_status" title="جاري المراجعه" data-id="{{ $value->id }}" data-type="1" aria-hidden="true"></i>
                  @else
                     <i class="fa fa-tasks" title="جاري المراجعه" style="color: green" aria-hidden="true"></i>
                  @endif

                  @if($value->status != 'تم الشحن')
                     <i class="fa fa-thumbs-up invoice_status" title="تم الشحن"  data-id="{{ $value->id }}" data-type="2"  aria-hidden="true"></i>
                  @else
                     <i class="fa fa-thumbs-up" title="تم الشحن"  style="color: green"  aria-hidden="true"></i>
                  @endif
                  
                  @if($value->status == 'تم الالغاء' || $value->status == 'تم الالغاء	(مستخدم)')
                     <i class="fa fa-thumbs-down" title="تم الالغاء" style="color: green"  aria-hidden="true"></i>
                  @else
                     <i class="fa fa-thumbs-down invoice_status" title="تم الالغاء" data-id="{{ $value->id }}" data-type="3"  aria-hidden="true"></i>
                  @endif

                  
                  <a href="{{ url("admin_panel/invoices/print/".$value->id) }}">
                     <i class="fa fa-print" aria-hidden="true"></i>
                  </a>


                  
                  <span class='DeletingModal m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill' name="{{ $value->id }}" title='Delete'>
                        <i class="fa fa-trash"></i>
                  </span>
               </td>
               
            </tr>

         @endforeach



         
      </tbody>
   </table>




   