@php
    $sizes_arr = App\Models\Product_Sizes::where('product_id',$item->id)->where('quantity','>',0)->pluck('size_id')->toArray();

    if(! empty($sizes_arr)) {
        $sizes = App\Models\Size::whereIn('id',$sizes_arr)->pluck('title','id');
    } else {
        $sizes = null;
    }
@endphp


<div class="single-product-item">
    
    <div class="product-image">
        <a href="{{ url($item->url) }}">
            <img src="{{ Custom_Image_Path('products',$item->pic) }}" alt="product-image" />
        </a>
        @if(isset($newest))
        <a href="#" class="new-mark-box">
            جديد
        </a>
        @endif
    </div>
    <div class="product-info" style="margin-top: 5px">
        <a href="{{ url($item->url) }}">
            {{ $item->title }}
        </a>
        <div class="price-box">
            @if($item->discount > 0)
            <span class="price">{{ $item->price - $item->discount }} ج.م</span>
            <span class="old-price">{{ $item->price }} ج.م</span>
            @else
            <span class="price">{{ $item->price }} ج.م</span>
            @endif
        </div>
        
    </div>

    <hr style="margin-bottom: 0">

    <div class="row main_product" style="margin-right:0">

        <div class="single-product-size" style="display: inline-block;position: relative;">
            <p class="small-title" style="margin-bottom: 0">المقاسات  </p>
            <select name="product-size" class="product_size" data-id="{{$item->id}}">
                <option value="" selected>المقاسات </option>
                @if($sizes != null)
                    @foreach($sizes as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                @endif
            </select>
            <i class="fa fa-angle-down" style="position: absolute;left: 12%;top: 50%;"></i>
        </div>


        <div class="single-product-quantity" style="display: inline-block;">
            <p class="small-title" style="width:100%;margin-right:10px;margin-bottom: 5px;">الكمية</p>
            <div class="cart-quantity">
                <div class="single-qty-btn">
                    <input class="cart-plus-minus sing-pro-qty product_quantity"  type="number" value="0" min="0" max="" name="qtybutton">
                </div>
                <br>
            </div>
        </div>

        <p style="color:red;font-weight:bold;margin-bottom: 10px;display: none;" class="note"></p>

    </div>
    
    <div class="single-product-add-cart" style="width: 100%">
        <a class="add-cart-text add-to-cart2" data-id="{{$item->id}}" title="اضف الي السلة" href="javascript:void(0)">
            أضف الي السلة
        </a>
    </div>

    <hr style="border-top: 2px solid red;">


</div>