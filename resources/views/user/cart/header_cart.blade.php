@php 
   $total = 0; 
   $x = 1;
@endphp

@foreach((array) session('cart') as $id => $details)
   @php $total += $details['price'] * $details['quantity']  @endphp
@endforeach

<a  href="{{ url('cart') }}" title="View my shopping cart">
   <i class="fa fa-shopping-cart cart-icon" style="font-size: 25px;display: inline-block;position: relative;top: 5px;"></i>
   <b style="display: inline-block;margin-right: 20px;">عربه المشتريات</b>
   <span class="n_cart_count">{{ count((array) session('cart')) }}</span>
</a>


<div class="main_test_Content">
									
   @if(count((array) session('cart')) == 0)
      <p style="padding-right: 15px;padding-bottom: 19px;border-bottom: 2px solid #DDD;color:#000">حقيبة التسوق  فارغة .</p>
   @else
   
      @if(session('cart'))

         @foreach((array) session('cart') as $id => $details)

            @php 
               $color =  App\Models\Color::where('id',$details['color'])->first();
               $size =  App\Models\Size::where('id',$details['size'])->first();
            @endphp

            <div class="media">
               <img src="{{ Custom_Image_Path('products',$details['photo']) }}" class="align-self-start mr-3" />

               <div class="media-body">

                  <a href="javascript:void(0)" data-id="{{$id}}" style="float: left;margin: 0;margin-top: -14px;" class="cross-icon remove_from_header_cart">
                     <i class="fa fa-times-circle" style="font-size: 18px;color: #000;"></i>
                  </a>

                  <p>
                     <span style="color: #434343"> {{ $details['name'] }}  </span>
                     <span>  * {{ $details['quantity'] }}  </span>
                  </p>
                  
                  @if($color != null)
                  <p>
                     <span style="color: #434343"> اللون :  </span>
                     <span> {{ $color->title  }} </span>
                  </p>
                  @endif

                  @if($size != null)
                  <p>
                     <span style="color: #434343"> المقاس :  </span>
                     <span> {{ $size->title  }} </span>
                  </p>
                  @endif

                  <p>
                     <span style="color: #434343">السعر : </span>
                     <span> {{ $details['price'] * $details['quantity'] }} ج.م </span>
                  </p>

               </div>
            </div>

         @endforeach   

      @endif

   @endif	

   <div class="shipping-total-bill">

      <div class="total-shipping-prices">
         <span class="shipping-total">{{ $total }} جنية</span>
         <span>الاجمالي</span>
      </div>
    </div>

    <div class="shipping-checkout-btn">
      <a href="{{ url('checkout') }}">الدفع </a>
    </div>
   
</div>




<script>
    
   (function($){
   

      $(".remove_from_header_cart").click(function () {
           
         var element = $(this);
   
         var parent_row = element.parents(".media");
   
         //var cart_total = $(".cart-total");
   
         var cart_count = $(".n_cart_count");
   

         $.ajax({
            url: '{{ url('remove-from-cart') }}',
            method: "DELETE",
            data: {
               _token: '{{ csrf_token() }}', 
               id: element.attr("data-id")
            },
            dataType: "json",
            success: function (response) {

               parent_row.remove();

               if(response.msg != null) {
                  swal({
                     title: "جيد",
                     text: response.msg,
                     imageUrl: '{{ asset('img/sent.jpg') }}'
                  });
               }

               $("#header-bar").html(response.data);
               $("#header-bar2").html(response.data);

               //cart_total.text(response.total);

               cart_count.text(response.count);

            }
         });

         

      });
   
    
   })(jQuery);

</script>